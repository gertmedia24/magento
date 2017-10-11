<?php
/**
 * Sect 4: Building admin forms
 */

class MasteringMagento_Example_Adminhtml_EventController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();
        $this->_setActiveMenu('example/events');

        $block = $this->getLayout()->createBlock('example/adminhtml_event_edit');
        //Mage::log(__METHOD__ . " DBG: block=");

        $this->_addContent(
            $block
        );

        return $this->renderLayout();
    }

    public function saveAction()
    {
        $eventId = $this->getRequest()->getParam('event_id');
        $eventModel = Mage::getModel('example/event')->load($eventId); // allows to edit event models in future (this must create new one if not exist)

        if ($data = $this->getRequest()->getPost()) {
            try {
                $eventModel->addData($data)->save();
                Mage::getSingleton('adminhtml/session')->addSuccess("Your event has been saved!");
            } catch (Exception $e) {
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            }
        }

        $this->_redirect('*/*/index');
    }
}