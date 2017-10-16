<?php
/**
 * Sect 3: Creating Models
 */

class MasteringMagento_Example_Model_Event extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        $this->_init('example/event');
    }
}