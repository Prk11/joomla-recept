<?php

defined('_JEXEC') or die('Restricted access');
 
/**
 * HTML View class for the HelloWorld Component
 *
 * @since  0.0.1
 */
class ReceptViewOldlist extends JViewLegacy {
    public function display($tpl = null) {
        $this->state = $this->get('State');
        $this->pagination = $this->get('Pagination');
        $model=$this->getModel();
        $this->items=$model->getItems();
        return parent::display($tpl);
    }

}