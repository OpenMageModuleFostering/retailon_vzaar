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

class Retailon_Vzaar_Block_Adminhtml_Alpha extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct(){
        $this->_blockGroup = 'retailon_vzaar';
        $this->_controller = 'adminhtml_alpha';
        $this->_headerText = 'Videos from Vzaar';
        $this->_addButtonLabel = $this->__('Reindex Videos');
        parent::__construct();
    }

    public function getCreateUrl(){
        return $this->getUrl('*/*/reload');
    }
}