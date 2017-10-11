<?php
/**
 * Sect 4: Grids
 */
class MasteringMagento_Example_Block_Adminhtml_Event_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function _prepareCollection()
    {
        $collection = Mage::getModel('example/event')->getCollection();
        $this->setCollection($collection);

        return parent::_prepareCollection();
    }

    protected function _prepareColumns()
    {
        $this->addColumn('name', array(
            'type' => 'text',
            'index' => 'name',
            'header' => $this->__('Name')
        ));

        $this->addColumn('start', array(
            'type' => 'date',
            'index' => 'start',
            'header' => $this->__('Start Date')
        ));

        $this->addColumn('end', array(
            'type' => 'date',
            'index' => 'end',
            'header' => $this->__('End Date')
        ));

        return $this;
    }
}