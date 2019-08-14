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

class Retailon_Vzaar_Block_Adminhtml_Renderer extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row){
        $value = $row->getId();
        $val = "<a class='vzaar fancybox.iframe' rel='group' href='http://view.vzaar.com/".$value."/player?autoplay=true'>Watch</a>";
        return $val;
    }
}