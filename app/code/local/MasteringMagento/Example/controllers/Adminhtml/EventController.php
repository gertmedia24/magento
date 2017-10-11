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

        //$block = $this->getLayout()->createBlock('example/adminhtml_event_edit');
        $block = $this->getLayout()->createBlock('example/adminhtml_event');

        $this->_addContent(
            $block
        );

        return $this->renderLayout();
    }

    public function editAction()
    {
        if ($eventId = $this->getRequest()->getParam('event_id')) {
            // store globally for now
            Mage::register('current_event', Mage::getModel('example/event')->load($eventId));
        }

        $this->loadLayout();
        $this->_setActiveMenu('example/events');

        $this->_addContent(
            $this->getLayout()->createBlock('example/adminhtml_event_edit')
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
                // Used by Mage::getSingleton('adminhtml/session')->getData('event_form_data', true) in Form::_initFormValues() fxn
                Mage::getSingleton('adminhtml/session')->setEventFormData($data);
                Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
                $this->_redirect('*/*/edit', ['_current' => true]);
            }
        }

        $this->_redirect('*/*/index');
    }

    public function deleteAction()
    {
        $eventId = $this->getRequest()->getParam('event_id');
        $eventModel = Mage::getModel('example/event')->load($eventId);

        try {
            $eventModel->delete();
            Mage::getSingleton('adminhtml/session')->addSuccess(
                $this->__("Your event has been deleted!")
            );
        } catch ( Exception $e ) {
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
            return $this->_redirect('*/*/edit', array('_current' => true));
        }

        return $this->_redirect('*/*/index');
    }
}