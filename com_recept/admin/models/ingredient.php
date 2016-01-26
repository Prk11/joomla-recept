<?php
defined('_JEXEC') or die('Restricted access2');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ingredient
 *
 * @author prk
 */
class ReceptModelIngredient extends JModelAdmin {
    
    protected $text_prefix = 'COM_RECEPT';
    
    public function getTable($name = 'Ingredient', $prefix = 'ReceptTable', $options = array()) {
        return parent::getTable($name, $prefix, $options);
    }
    
    public function getForm($data = array(), $loadData = true) {
        $form = $this->loadForm('com_recept.ingredient', 'ingredient', array('control' => 'jform', 'load_data' => $loadData));
        if (empty($form))
        {
                return false;
        }
        return $form;
    }
//
//    protected function loadFormData() {        
//		// Check the session for previously entered form data.
//		$data = array_merge((array) $this->getItem(), (array) JFactory::getApplication()->getUserState('com_recept.ingredient.ingredient.data', array()));
//		$this->preprocessData('com_menus.item', $data);
//
//		return $data;
//    }

}
