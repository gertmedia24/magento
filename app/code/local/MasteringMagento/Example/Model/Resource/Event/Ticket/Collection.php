<?php
/**
 * Created by PhpStorm.
 * User: gert.vantonder
 * Date: 2017/10/10
 * Time: 3:46 PM
 */

class MasteringMagento_Example_Model_Resource_Event_Ticket_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct()
    {
        // Init the primary key of the table (to be created)
        $this->_init('example/event_ticket', 'ticket_id');
    }
}
