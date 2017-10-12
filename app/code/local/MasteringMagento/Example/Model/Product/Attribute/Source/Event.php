<?php
/**
 * Sect 5: Custom product attributes
 */

class MasteringMagento_Example_Model_Product_Attribute_Source_Event extends Mage_Eav_Model_Entity_Attribute_Source_Abstract
{
    /**
     * Retrieve attribute options. Used by Mange Products > New Product > Select Event Type
     *
     * @return array
     */
    public function getAllOptions()
    {
        $collection = Mage::getModel('example/event')->getCollection();
        $options = [];

        foreach ($collection as $event) {
            $options[] = [
                'value' => $event->getId(),
                'label' => $event->getName()
            ];
        }
        return $options;
    }
}
