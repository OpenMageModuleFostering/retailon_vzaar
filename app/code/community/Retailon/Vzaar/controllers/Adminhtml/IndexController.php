<?php
/**
 * This magento extension is created by RetailOn Inc for Vzaar.
 * Visit us at http://www.retailon.net
 * Author: Hashid Hameed
 * Email: me@hashid.in
 * Date: 25/2/14
 * Time: 1:03 PM
 *
 * Please do not reproduce any part of the extension without prior permission.
 */

class Retailon_Vzaar_Adminhtml_IndexController extends Mage_Adminhtml_Controller_Action
{

    protected function _initAction(){
        $this->loadLayout()->_setActiveMenu('betamenu');
    }
    public function indexAction(){
        $this->_initAction();
        $this->getLayout()->getBlock('head')->setTitle('Vzaar Video List');
        $this->renderLayout();
    }

    public function reloadAction(){
        try{
            Mage::getSingleton('core/resource')->getConnection('core_write')->query('truncate table vzaarvideos'); //delete all existing videos

            $newvideos=array();
            $helper = Mage::helper('vzaarhelper');

        $db = Mage::getModel('vzaar/vzaarlist');
        $pages = $helper->getPages(); //get number of pages
        while($pages!=0):
        $newvideos= array_merge($newvideos,$helper->getVideoList($pages--)); //loop all pages and save in array
        endwhile;
        foreach ($newvideos as $video)
        {
            //Inserting videos one by one into database
            $db->setData('id',$video->id);
            $db->setData('title',$video->title);
            $db->setData('description',$video->description);
            $duration = date('H:i:s', mktime(0, 0, $video->duration)); //converting seconds to HH:MM:SS format.
//            $db->setData('duration',$video->duration);
            $db->setData('duration',$duration);
            $db->save();
        }
            Mage::getSingleton('adminhtml/session')->addSuccess('Reindexed videos from vzaar successfully');
        }
        catch(Exception $e){
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage().': Looks like the API credentials you entered in Vzaar Settings are incorrect!');
        }

        $this->_redirect('retailonvzaar/adminhtml_index/index');
    }

    public function truncateAction(){
        Mage::getSingleton('core/resource')->getConnection('core_write')->query('truncate table vzaarvideos');
        $this->_redirect('retailonvzaar/adminhtml_index/index');
    }

}