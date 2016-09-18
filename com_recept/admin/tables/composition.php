<?php
defined('_JEXEC') or die('Restricted access');

class ReceptTableComposition extends JTable {
    
    public function __construct(&$db) {
        parent::__construct('#__ingredients_composition', 'id', $db);
    }
}