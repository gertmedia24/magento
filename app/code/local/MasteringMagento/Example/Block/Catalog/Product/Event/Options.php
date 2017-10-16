<?php
/**
 * Sect 5: Product Frontend views
 *
 * This extends our view for the product page (to show tickets instead of the default qty with the product
 */

class MasteringMagento_Example_Block_Catalog_Product_Event_Options extends Mage_Core_Block_Template
{
    /**
     * Retrieve product
     *
     * @return Mage_Catalog_Model_Product
     */
    public function getProduct()
    {
        return Mage::registry('current_product');
    }

    /**
     * Return array of tickets
     *
     * @return array
     */
    public function getTicketData()
    {
        $ticketArr = array();
        $tickets = $this->getProduct()->getTypeInstance(true)->getTickets($this->getProduct());
        foreach ($tickets as $ticket) {
            $tmpTicketItem = array(
                'ticket_id' => $ticket->getId(),
                'title' => $this->escapeHtml($ticket->getTitle()),
                'price' => $this->getPriceValue($ticket->getPrice()),
                'sort_order' => $ticket->getSortOrder(),
            );
            $ticketArr[] = new Varien_Object($tmpTicketItem);
        }
        return $ticketArr;
    }

    /**
     * Return formated price with two digits after decimal point
     *
     * @param decimal $value
     * @return decimal
     */
    public function getPriceValue($value)
    {
        return number_format($value, 2, null, '');
    }
}