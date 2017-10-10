<?php
/**
 * Sect 3: Creating Models
 */

class MasteringMagento_Example_Model_Event extends Mage_Core_Model_Abstract
{
    public function __construct()
    {
        $this->_init('example/event');
    }
}