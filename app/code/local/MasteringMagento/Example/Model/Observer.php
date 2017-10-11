<?php
/**
 * Sect 3: Events + observers
 */

class MasteringMagento_Example_Model_Observer // dont inherit from anything
{
    public function controllerActionPredispatch($observer)
    {
        /* @var $observer Mage_Core_Model_Observer */
        $controllerAction = $observer->getEvent()->getControllerAction();

//        Mage::log(__METHOD__ . " DBG: here");
//        Mage::log($controllerAction->getRequest()->getParams()); // log all request params (GET + POST) to system log
    }
}