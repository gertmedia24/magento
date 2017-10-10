<?php
/**
 * Sect 3: Extending the admin with a controller
 */

class MasteringMagento_Example_Adminhtml_ExampleController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        // Create & save new event
        $event = Mage::getModel('example/event');
        $event->setName('Test Event ' . random_bytes(8))->save();
        // or $event->setData('name', 'Test Event 3');

        Mage::getSingleton('adminhtml/session')->addSuccess(
            'Event saved. ID=' . $event->getId()
        );

        $this->loadLayout();

        return $this->renderLayout();
    }
}