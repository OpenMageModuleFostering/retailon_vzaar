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

require_once(Mage::getBaseDir('lib').'/Vzaar/Vzaar.php');
Vzaar::$token = Mage::getStoreConfig('vzaar_section/vzaar_group/beta_api');
Vzaar::$secret = Mage::getStoreConfig('vzaar_section/vzaar_group/beta_user');

class Retailon_Vzaar_Helper_Data extends Mage_Core_Helper_Abstract
{

    public function getApiKey(){
        return Mage::getStoreConfig('vzaar_section/vzaar_group/beta_api');
    }

    public function getUsername(){
        return Mage::getStoreConfig('vzaar_section/vzaar_group/beta_user');
    }

    public function getVideoList($page=1){
        return Vzaar::getVideoList($this->getUsername(), true,100,$page);
    }

    public function getVideoDetails($id){
        return Vzaar::getVideoDetails($id,true,100);
    }

    public function getVideoNames(){
        $collection=Mage::getModel('vzaar/vzaarlist')->getCollection();
        //$listarr = array();
        foreach ($collection as $video)
        {
            //$listarr[] = $video->getData('title');
            $listarr[] = array("label"=>$video->getData('title'), "value"=>$video->getData('id'));
        }
        return $listarr;
    }

    public function getPages(){
        $count = Vzaar::getUserDetails($this->getUsername());
        return ceil($count->videoCount/100);
    }
}