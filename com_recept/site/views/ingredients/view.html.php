<?php

defined('_JEXEC') or die('Restricted access');

/**
 * HTML View class for the HelloWorld Component
 *
 * @since  0.0.1
 */
class ReceptViewIngredients extends JViewLegacy {

    public function display($tpl = null) {
        $this->state = $this->get('State');
        $model = $this->getModel();
        $this->items = $model->getItems();
        $this->pagination = $model->getPagination();
        return parent::display($tpl);
    }

}
