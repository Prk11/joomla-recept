<?php
defined('_JEXEC') or die('Restricted access');

class ReceptModelComposition extends JModelAdmin {
    
    protected $text_prefix = 'COM_RECEPT';
    
    public function getTable($name = 'Composition', $prefix = 'ReceptTable', $options = array()) {
        return parent::getTable($name, $prefix, $options);
    }
    
    public function getForm($data = array(), $loadData = true) {
        $form = $this->loadForm('com_recept.composition', 'composition', array('control' => 'jform', 'load_data' => $loadData));
        if (empty($form))
        {
                return false;
        }
        return $form;
    }

}
