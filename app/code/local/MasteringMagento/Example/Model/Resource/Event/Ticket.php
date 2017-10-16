<?php
/**
 * Sect 5: advanced product editing
 */

class MasteringMagento_Example_Model_Resource_Event_Ticket extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct()
    {
        $this->_init('example/event_ticket', 'ticket_id');
    }
}