<?php
/**
 * Sect 4: Building admin forms
 */
class MasteringMagento_Example_Block_Adminhtml_Event_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    protected function _initFormValues()
    {
        // Edit existing event
        /* @var $event MasteringMagento_Example_Model_Event */
        if ($event = Mage::registry('current_event')) {
            $data = $event->getData();
            $this->getForm()->setValues($data);
        }

        // In order to keep post data during a failed save (bool=true for also clearing the data)
        if ($data = Mage::getSingleton('adminhtml/session')->getData('event_form_data', true)) {
            $this->getForm()->setValues($data);
        }

    }

    public function _prepareForm()
    {
        // Create new form
        $form = new Varien_Data_Form(
            array('id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post')
        );


        $fieldset = $form->addFieldset('base_fieldset', array('legend' => Mage::helper('example')->__('General Information'), 'class' => 'fieldset-wide'));

        /**
         * The 'type' is used by Varien_Data_Form_Abstract::addField(...) as follows:
         * $className = 'Varien_Data_Form_Element_'.ucfirst(strtolower($type));
         *
         * See lib/Varien/Data/Form/Element for all the diff types of form elements that can be added
         *
         */
        $fieldset->addField('name', 'text', array(
            'name'      => 'name',
            'label'     => Mage::helper('example')->__('Event Name'),
            'title'     => Mage::helper('example')->__('Event Name'),
            'required'  => true
        ));

        $dateFormatIso = Mage::app()->getLocale()->getDateFormat(Mage_Core_Model_Locale::FORMAT_TYPE_SHORT);
        $fieldset->addField('start', 'date',
            // Date field requires further info to be passed in, format, etc
            array(
            'name'      => 'start',
            'format'    => $dateFormatIso,
            'image'     => $this->getSkinUrl('images/grid-cal.gif'),
            'label'     => Mage::helper('example')->__('Start Date'),
            'title'     => Mage::helper('example')->__('Start Date'),
            'required'  => true
        ));

        $fieldset->addField('end', 'date', array(
            'name'      => 'end',
            'format'    => $dateFormatIso,
            'image'     => $this->getSkinUrl('images/grid-cal.gif'),
            'label'     => Mage::helper('example')->__('End Date'),
            'title'     => Mage::helper('example')->__('End Date'),
            'required'  => true
        ));

        $form->setUseContainer(true);
        $this->setForm($form);
    }
}
