<?php
/**
 * Created by PhpStorm.
 * User: gert.vantonder
 * Date: 2017/10/06
 * Time: 4:05 PM
 */

class MasteringMagento_Example_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        // Must first load the layout
        $this->loadLayout();

        // Always last thing to do in controller action
        return $this->renderLayout();
    }
}