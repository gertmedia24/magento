<?php
/**
 * Sect 5: Custom product type
 */

class MasteringMagento_Example_Model_Product_Type_Event extends Mage_Catalog_Model_Product_Type_Abstract
{
    public function getTickets($product = null)
    {
        $product = $this->getProduct($product);
        $collection = Mage::getModel("example/event_ticket")->getCollection()
            ->addFieldToFilter('event_id', $product->getEventId())
            ->addFieldToFilter('product_id', $product->getId())
            ->setOrder('sort_order', 'asc');

        return $collection;
    }

    /**
     * Save product event type information
     *
     * @param Mage_Catalog_Model_Product $product
     * @return MasteringMagento_Example_Model_Product_Type_Event
     */
    public function save($product = null) // magic fxn being called (no observers necessary)
    {
        parent::save($product);

        $product = $this->getProduct($product); // in Mage_Catalog_Model_Product_Type_Abstract
        /* @var Mage_Catalog_Model_Product $product */

        // getEventData() ? magic ?
        // On frontend (admin form), [event_data] automatically added to fields:
        // <input type="text" class="required-entry input-text" name="product[event_data][ticket][0][title]" value="Front row seat ">
        // Also see controller:
        // app/code/core/Mage/Adminhtml/controllers/Catalog/ProductController.php :: saveAction > _initProductSave():
        // $productData = $this->getRequest()->getPost('product');
        // $product->addData($productData);
        // This means we can access anything submitted via the POST on the model (even if not one of the member fields)
        if ($eventData = $product->getEventData()) {
//            Mage::log("DBG: eventData=");
//            Mage::log($eventData);

            if ($eventData['ticket']) {
                foreach ($eventData['ticket'] as $ticket) {
                    // Load the model
                    $ticketModel = Mage::getModel('example/event_ticket')->load($ticket['ticket_id']);
                    unset($ticket['ticket_id']);

                    if ($ticket['is_delete'] == 1) {
                        $ticketModel->delete();
                    } else {
                        unset($ticket['is_delete']);

                        // Set the ticket's event id
                        $ticket['event_id'] = $product->getEventId();
                        $ticket['product_id'] = $product->getId();

                        // Save new data to the ticket
                        $ticketModel->addData($ticket);
                        $ticketModel->save();
                    }
                }
            }
        }

        return $this;
    }

    /**
     * Determines if options wrapper will load on frontend (used by catalog > view template somewhere)
     */
    public function hasOptions($product = null)
    {
        return true;
    }

}




























