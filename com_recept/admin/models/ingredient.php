<?php
defined('_JEXEC') or die('Restricted access');
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

}
