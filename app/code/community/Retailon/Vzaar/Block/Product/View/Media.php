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

class Retailon_Vzaar_Block_Product_View_Media extends Mage_Catalog_Block_Product_View_Media
{
    public function _toHtml()
    {
        if(Mage::getStoreConfig('vzaar_section/vzaar_group/beta_enable')){
        $html = parent::_toHtml();
        $html.=$this->getChildHtml('media_video');
        return $html;
        }
        else return parent::_toHtml();
    }
}