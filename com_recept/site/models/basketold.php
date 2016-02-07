<?php

defined('_JEXEC') or die('Restricted access');

class ReceptModelBasketold extends JModelList {

    public function getTable($name = 'Basket', $prefix = 'ReceptTable', $options = array()) {
        return parent::getTable($name, $prefix, $options);
    }

    protected function getListQuery() {
        $query=parent::getListQuery();
        $user = JFactory::getUser();
        $input=JFactory::getApplication()->input;
        if (!$user->guest && isset($user->id) && ($user->id>0)) {
            $query->select('b.id, b.datestart, b.datefinish, a.title, b.count, a.id as article_id');
            $query->from("`#__ingredients_basket` b");
            $query->join("INNER", "`#__k2_items` a ON (a.id=b.`article_id`)");
            $query->where("b.user_id=".(int)$user->id);
            $datefinish=base64_decode($input->getString("datefinish"));
            $query->where("b.datefinish = '$datefinish'");
            $this->setState('list.ordering', $input->get('filter_order'));
            $this->setState('list.direction',  $input->get('filter_order_Dir'));
            $orderCol = $this->getState('list.ordering', 'id');
            $orderDirn = $this->getState('list.direction', 'asc');
            $query->order($orderCol . ' ' . $orderDirn);
        }
        return $query;
    }
    
}