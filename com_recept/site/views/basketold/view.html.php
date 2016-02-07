<?php

defined('_JEXEC') or die('Restricted access');
 
/**
 * HTML View class for the HelloWorld Component
 *
 * @since  0.0.1
 */
class ReceptViewBasketold extends JViewLegacy {
    public function display($tpl = null) {
        $this->state = $this->get('State');
        $this->pagination = $this->get('Pagination');
        $model=$this->getModel();
        $this->def("datefinish",  JFactory::getApplication()->input->get("datefinish"));
        $this->items=$model->getItems();
        return parent::display($tpl);
    }

}