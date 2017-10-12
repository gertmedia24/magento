<?php

/* @var $this Mage_Core_Model_Resource_Setup */
$this->startSetup();

// Has all the EAV-related functions
$catalogInstaller = new Mage_Catalog_Model_Resource_Setup($this->_resourceName);

// Apply all simple attributes to subscription (event) products
$additionalTable = $catalogInstaller->getEntityType('catalog_product', 'additional_attribute_table');
// additionalTable=catalog/eav_attribute

// CONCAT_WS = concatenate with separator
$this->run("
  UPDATE `{$this->getTable($additionalTable)}`
  SET apply_to = CONCAT_WS(',', apply_to, 'event')
  WHERE apply_to LIKE '%simple%' AND apply_to NOT LIKE '%event%'
");

// Add a title for the event
$catalogInstaller->addAttribute('catalog_product', 'event_title', [
    'label' => 'Event Title',
    'required' => true,
    'group' => 'Event Settings' // new tab on LHS product edit screen
]);

// Add a select list for the event
$catalogInstaller->addAttribute('catalog_product', 'event_id', [
    'label' => 'Event ID',
    'required' => true,
    'group' => 'Event Settings',
    'input' => 'select',
    'source' => 'example/product_attribute_source_event', // points to model in module
    'apply_to' => 'event',
    'note' => 'Select your event from the list'
]);


$this->endSetup();

