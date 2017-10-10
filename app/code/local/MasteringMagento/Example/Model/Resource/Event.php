<?php
/**
 * Created by PhpStorm.
 * User: gert.vantonder
 * Date: 2017/10/10
 * Time: 3:46 PM
 */

class MasteringMagento_Example_Model_Resource_Event extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct()
    {
        // Init the primary key of the table (to be created)
        $this->_init('example/event', 'event_id');

        /*
         * CREATE TABLE `example_event`
            (
                `event_id` INT AUTO_INCREMENT PRIMARY KEY,
                `name` VARCHAR(255)
            );
         */
    }
}
