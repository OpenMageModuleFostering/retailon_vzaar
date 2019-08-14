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

class Retailon_Vzaar_Model_Vzaarlist extends Mage_Core_Model_Abstract
{
    public function _construct(){
        parent::_construct();
        $this->_init('vzaar/vzaarlist');
    }
}