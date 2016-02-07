<?php
defined('_JEXEC') or die('Restricted access');

class ReceptTableBasket extends JTable {
    
    public function __construct(&$db) {
        parent::__construct('#__ingredients_basket', 'id', $db);
    }
}