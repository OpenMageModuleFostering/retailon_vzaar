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

class Retailon_Vzaar_Block_Adminhtml_Alpha_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

    public function __construct(){
        parent::__construct();
        $this->setDefaultSort('id');
        $this->setId('retailon_vzaar_alpha_grid');
        $this->setDefaultDir('asc');
        $this->_emptyText = 'No videos available';
        $this->setSaveParametersInSession(true);
    }

    public function getButtonHtml(){

    }

    protected function _getCollectionClass(){
        return 'vzaar/vzaarlist';
    }

    protected function _prepareCollection(){
        //$collection = Mage::getModel('vzaar/vzaarlist')->getCollection();
        $collection = Mage::getModel('vzaar/vzaarlist')->getCollection();
        $this->setCollection($collection);
        return parent::_prepareCollection();
    }

    protected function _prepareColumns(){
        $this->addColumn('id',
            array(
                 'header' => $this->__('ID'),
                 'align' => 'right',
                 'width' => '50px',
                 'index' => 'id'
            )
        );
        $this->addColumn('title',
        array(
             'header' => 'Title',
             'index' => 'title'
        ));

        $this->addColumn('duration',
        array(
             'header' => 'Duration',
             'index' => 'duration',
             'width' => '50px'
        ));

        $this->addColumn('video',
        array(
             'header' => 'Action',
             'type' => 'text',
             'renderer' => 'Retailon_Vzaar_Block_Adminhtml_Renderer',
             'index' => 'duration',
             'width' => '50px',
             'sortable'=>false
        ));

        return parent::_prepareColumns();
    }

/*    public function getRowUrl($row){
        return 'http://view.vzaar.com/'.$row->getId().'/player?autoplay=true';
    }*/

}