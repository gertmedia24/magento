<?php
/**
 * Sect 6: Cart item behavior
 */

class MasteringMagento_Example_Model_Observer_Catalog_Product
{
    /**
     * Observes:
     * app/code/core/Mage/Catalog/Model/Product/Type/Price.php::getFinalPrice(): 83
     * Mage::dispatchEvent('catalog_product_get_final_price', array('product' => $product, 'qty' => $qty));
     *
     * @param $observer Varien_Event_Observer
     * @return $this
     */
    public function getFinalPrice($observer)
    {
        /* @var $product Mage_Catalog_Model_Product */
        $product = $observer->getEvent()->getProduct();

        if ($buyRequest = $product->getCustomOption('info_buyRequest')) {
            // $buyRequest->getValue() == the form values submitted in serialized form:
            /*
             * DEBUG (7): a:6:{s:4:"uenc";s:48:"aHR0cDovL2dpem1vLmNvbS90ZXN0LWV2ZW50LTEuaHRtbA,,";s:7:"product";s:1:"1";s:8:"form_key";s:16:"labeHSvmagjUGN38";s:15:"related_product";s:0:"";s:6:"ticket";a:2:{i:1;a:1:{s:3:"qty";s:1:"1";}i:2;a:1:{s:3:"qty";s:1:"1";}}s:3:"qty";d:1;}
             */
            $buyRequest = new Varien_Object(unserialize($buyRequest->getValue()));

            // Add ticket prices to the event base price (final price)
            $price = $product->getFinalPrice();

            if ($tickets = $buyRequest->getTicket()) {
                foreach ($tickets as $ticketId=>$data) {
                    /* @var $_ticket MasteringMagento_Example_Model_Event_Ticket */
                    $_ticket = Mage::getModel('example/event_ticket')->load($ticketId);
                    $price += ($data['qty'] * $_ticket->getData('price'));
                }
            }

            $product->setFinalPrice($price);
        }

        return $this;
    }
}