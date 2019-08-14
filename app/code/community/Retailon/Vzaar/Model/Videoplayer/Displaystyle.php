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

class Retailon_Vzaar_Model_Videoplayer_Displaystyle
{
    public function toOptionArray(){
        return array(
            array('value'=>1,'label'=>'Inline (in image box)'),
            array('value'=>0,'label'=>'Popup Lightbox')
        );
    }
}