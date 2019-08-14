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

$installer = $this;
$installer->startSetup();
$setup = new Mage_Eav_Model_Entity_Setup('core_setup');
try{
    $installer->run("SELECT * FROM {$this->getTable('vzaar/vzaarlist')}");
}
catch (Exception $e){
    $installer->run("CREATE TABLE IF NOT EXISTS {$this->getTable('vzaar/vzaarlist')} (
    `id` int(10) NOT NULL,
    `title` varchar(100) NOT NULL,
    `duration` time,
    PRIMARY KEY (`id`)
    )ENGINE=InnoDB DEFAULT CHARSET=utf8");
}

$setup->addAttributeGroup('catalog_product','Default','Vzaar Video',1000);
$setup->addAttribute('catalog_product','vzaarvid',array(
                                                       'group'=>'Vzaar Video',
                                                       'input'=>'multiselect',
                                                       'sort_order'=>0,
                                                       'label'=>'Video',
                                                       'note'=>'Select multiple videos by holding CTRL key',
                                                       'visible'=>1,
                                                       'backend'=>'eav/entity_attribute_backend_array',
                                                       'required'=>0,
                                                       'user_defined'=>1,
                                                       'searchable'=>0,
                                                       'filterable'=>0,
                                                       'visible_on_front'=>0,
                                                       'visible_in_advanced_search' => 0,
                                                       'is_html_allowed_on_front' => 0,
                                                       'global'=>Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
                                                       'source'=>'vzaar/entity_attribute_source_table_videos'
                                                  ));

$setup->addAttribute('catalog_product','vzaarvidid',array(
                                                       'group'=>'Vzaar Video',
                                                       'input'=>'text',
                                                       'label'=>'Video IDs',
                                                       'sort_order'=>1,
                                                       'note'=>'Enter Video IDs separated by comma. Eg: 14234,143563,134567',
                                                       'visible'=>1,
                                                       'backend'=>'eav/entity_attribute_backend_array',
                                                       'required'=>0,
                                                       'user_defined'=>1,
                                                       'searchable'=>0,
                                                       'filterable'=>0,
                                                       'visible_on_front'=>0,
                                                       'visible_in_advanced_search' => 0,
                                                       'is_html_allowed_on_front' => 0,
                                                       'global'=>Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
                                                       'source'=>'vzaar/entity_attribute_source_table_videos'
                                                  ));

$setup->addAttribute('catalog_product','vzaaractive',array(
                                                       'group'=>'Vzaar Video',
                                                       'input'=>'label',
                                                       'type'=>'varchar',
                                                       'sort_order'=>2,
                                                       'label'=>'Currently Selected Videos',
                                                       'visible'=>1,
                                                       'backend'=>'',
                                                       'required'=>0,
                                                       'user_defined'=>1,
                                                       'searchable'=>0,
                                                       'filterable'=>0,
                                                       'visible_on_front'=>0,
                                                       'visible_in_advanced_search' => 0,
                                                       'is_html_allowed_on_front' => 0,
                                                       'global'=>Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE
                                                  ));

$setup->addAttribute('catalog_category','vzaarcat',array(
                                                       'group'=>'Vzaar Video',
                                                       'input'=>'text',
                                                       'type'=>'varchar',
                                                       'label'=>'Video IDs',
                                                       'note'=>'Enter Video IDs separated by comma. Eg: 14234,143563,134567',
                                                       'visible'=>1,
                                                       'backend'=>'',
                                                       'required'=>0,
                                                       'user_defined'=>1,
                                                       'searchable'=>0,
                                                       'filterable'=>0,
                                                       'visible_on_front'=>0,
                                                       'visible_in_advanced_search' => 0,
                                                       'is_html_allowed_on_front' => 0,
                                                       'global'=>Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE
                                                  ));
$installer->endSetup();
