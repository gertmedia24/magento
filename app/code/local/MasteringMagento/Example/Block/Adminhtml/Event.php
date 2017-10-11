<?php
/**
 * Sect 4: Grids
 */
class MasteringMagento_Example_Block_Adminhtml_Event extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'example';
        $this->_controller = 'adminhtml_event';
        $this->_headerText = Mage::helper('example')->__('Events');
        $this->_addButtonLabel = Mage::helper('example')->__('Add New Event');

        parent::__construct();
    }
}
