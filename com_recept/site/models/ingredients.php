<?php

defined('_JEXEC') or die('Restricted access');

class ReceptModelIngredients extends JModelList {

    public function getListQuery() {
        
        $query=parent::getListQuery();
        $input=JFactory::getApplication()->input;
        $user = JFactory::getUser();
        $query->select('l.id as id, l.name as name, l.unit as unit, sum(a.ingredient_count*b.count) as count');
        $query->from("`#__ingredients_basket` b");
        $query->join("INNER", "`#__ingredients_article` a ON (a.`article_id`=b.`article_id`)");
        $query->join("INNER", "`#__ingredients_list` l ON (a.`ingredient_id`=l.`id`)");
        if (!$user->guest && isset($user->id) && ($user->id>0)) {
            $query->where("b.user_id=".(int)$user->id);
        } else {
            $query->where("b.`user_session`='".$_COOKIE["a181863e93a14f3d7d6c9f40b7c63aa1"]."'");
        }
        $query->where("b.datefinish is null");
        $query->group("l.id");
        $this->setState('list.ordering', $input->get('filter_order'));
        $this->setState('list.direction',  $input->get('filter_order_Dir'));
        $orderCol = $this->getState('list.ordering', 'id');
        $orderDirn = $this->getState('list.direction', 'asc');
        $query->order($orderCol . ' ' . $orderDirn);
        return $query;
    }

}