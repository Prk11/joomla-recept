<?php
defined(_JEXEC) or die('Restricted access');

class ReceptIListTable extends JTable {
    
    public function __construct(&$db) {
        parent::__construct('#__recept_ingredient_list', 'id', $db);
    }
}