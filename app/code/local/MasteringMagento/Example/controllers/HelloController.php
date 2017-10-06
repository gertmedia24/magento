<?php
/**
 * Created by PhpStorm.
 * User: gert.vantonder
 * Date: 2017/10/06
 * Time: 4:05 PM
 */

class MasteringMagento_Example_HelloController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        echo "Hello, controller: index";
    }

    public function worldAction()
    {
        echo "Hello, world!";
    }
}