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

class Retailon_Vzaar_Model_Observer
{
    private $_processFlag;
    public function  setActiveVideos($observer){

        if(!$this->_processFlag):
        $this->_processFlag=true;
        $_proid = $observer->getProduct()->getId();
        $_product = Mage::getModel('catalog/product')->load($_proid);
        $videos = $_product->getAttributeText('vzaarvid');
        $active='';
        if($videos==NULL) $active="None selected";
        else if(!is_array($videos)) $active=$videos;
        else{
        foreach ($videos as $vid){
            $active.=$vid.', ';
        }}
        $_store = $observer->getStoreId();
        $action = Mage::getModel('catalog/resource_product_action');
        $action->updateAttributes(array($_proid), array('vzaaractive'=>$active),$_store);
        $_product->save();
        endif;
    }

/*    public function setActiveVideos($observer){
        $_product = $observer->getProduct()->getId();
        $pro = Mage::getModel('catalog/product')->load($_product);
        $attr = $pro->getResource()->getAttribute('vzaarvid');
        if($attr->usesSource()){
            $avid = $attr->getSource()->getOptionId('hashid');
            $pro->setData('vzaaractive',$avid);
        }
        $haz = $pro->getAttributeText('vzaarvid');
        //print_r( $_product->getAttributeText('vzaarvid'));
/*        $pro->setData('name', "Hashid");
        $pro->setData('vzaaractive', "Hashid");
        $pro->setVzaaractive("Hashid");
        //$pro->save();
        //print_r($vid);
        //print_r($haz);
        //die();
    }*/
}