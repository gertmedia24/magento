<?php
/**
 * Sect 4: Building admin forms
 */

class MasteringMagento_Example_Block_Adminhtml_Event_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        $this->_objectId = 'event_id'; // used later when form is saved to db
        /**
         * The below 2 params determine which BLOCK gets loaded (Form_Container::_prepareLayout:
         * $this->setChild('form', $this->getLayout()->createBlock($this->_blockGroup
            . '/'
            . $this->_controller
            . '_'
            . $this->_mode
            . '_form'
            )
            );
         *
         * In above: Mage::log(this->mode) == 'edit'
         */
        $this->_blockGroup = 'example';
        $this->_controller = 'adminhtml_event';

        parent::__construct();
    }

    public function getHeaderText()
    {
        /* @var $helper MasteringMagento_Example_Helper_Data */
        $helper = Mage::helper('example');
        return $helper->__('New Event');
    }

    public function getSaveUrl() // tells form which action to run
    {
        return $this->getUrl('*/event/save'); // points to our event controller
    }

}