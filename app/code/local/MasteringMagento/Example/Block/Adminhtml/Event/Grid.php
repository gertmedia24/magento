<?php
/**
 * Sect 4: Grids
 */
class MasteringMagento_Example_Block_Adminhtml_Event_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    /**
     * Make each row in grid clickable
     *
     * @param $item  Model for the row
     * @return string
     */
    public function getRowUrl($item)
    {
        return $this->getUrl('*/event/edit', ['event_id' => $item->getId()]);
    }

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

        $this->addExportType('*/*/exportCsv', 'CSV');
        $this->addExportType('*/*/exportExcel', 'Excel XML');

        return $this;
    }

    protected function _prepareMassaction()
    {
        $this->setMassactionIdField('event_id');
        $this->getMassactionBlock()->setFormFieldName('event_ids');


        // these gonna show up in the toolbar
        $this->getMassactionBlock()->addItem('delete_event', [
                'label' => "Delete",
                'url' => $this->getUrl('*/*/massDelete'),
                'confirm' => $this->__('Are you sure you wanna delete?')
            ]
        );

        return $this;
    }
}


