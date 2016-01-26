<?php
defined('_JEXEC') or die('Restricted access');

class ReceptTableIngredient extends JTable {
    
    public function __construct(&$db) {
        parent::__construct('#__ingredients_list', 'id', $db);
    }
}