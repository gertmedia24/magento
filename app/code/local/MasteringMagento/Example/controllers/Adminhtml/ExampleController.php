<?php
/**
 * Sect 3: Extending the admin with a controller
 */

class MasteringMagento_Example_Adminhtml_ExampleController extends Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout();

        return $this->renderLayout();
    }
}