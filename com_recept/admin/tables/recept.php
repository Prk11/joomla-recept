<?php
defined('_JEXEC') or die('Restricted access');

class ReceptTableRecept extends JTable {
    
    public function __construct(&$db) {
        parent::__construct('#__ingredients_article', 'id', $db);
    }
}