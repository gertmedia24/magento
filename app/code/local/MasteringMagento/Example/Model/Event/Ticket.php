<?php
/**
 * Created by PhpStorm.
 * User: gert.vantonder
 * Date: 2017/10/12
 * Time: 4:05 PM
 */

class MasteringMagento_Example_Model_Event_Ticket extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        $this->_init('example/event_ticket');
    }
}