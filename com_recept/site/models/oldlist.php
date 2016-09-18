<?php

defined('_JEXEC') or die('Restricted access');

class ReceptModelOldlist extends JModelList {

    public function getTable($name = 'Basket', $prefix = 'ReceptTable', $options = array()) {
        return parent::getTable($name, $prefix, $options);
    }

    protected function getListQuery() {
        $query=parent::getListQuery();
        $user = JFactory::getUser();
        $input=JFactory::getApplication()->input;
            $query->select('min(id) as id, min(datestart) as datestart, datefinish, count(id) as count_recept');
            $query->from("`#__ingredients_basket`");
        if (!$user->guest && isset($user->id) && ($user->id>0)) {
            $query->where("user_id=".(int)$user->id);
        } else {
            $query->where("`user_session`='".$_COOKIE["a181863e93a14f3d7d6c9f40b7c63aa1"]."'");
        }
            $query->where("datefinish is not null");
            $query->group("datefinish");            
            $this->setState('list.ordering', $input->get('filter_order'));
            $this->setState('list.direction',  $input->get('filter_order_Dir'));
            $orderCol = $this->getState('list.ordering', 'id');
            $orderDirn = $this->getState('list.direction', 'asc');
            $query->order($orderCol . ' ' . $orderDirn);
        return $query;
    }
    
}