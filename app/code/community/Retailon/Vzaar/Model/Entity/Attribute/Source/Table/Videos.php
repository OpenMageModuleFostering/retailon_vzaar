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

class Retailon_Vzaar_Model_Entity_Attribute_Source_Table_Videos extends Mage_Eav_Model_Entity_Attribute_Source_Table
{
    public function getAllOptions(){
        $helper = Mage::helper('vzaarhelper');
        $options = $helper->getVideoNames();
        usort($options,array($this,'sortedVideos'));
        return $options;
    }

   public function sortedVideos($a, $b){
       return strcmp($a['label'],$b['label']);
   }
}