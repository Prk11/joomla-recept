<?php

defined('_JEXEC') or die('Restricted access');

class ReceptModelBasket extends JModelList {

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
            $query->where("b.datefinish is null");
            $this->setState('list.ordering', $input->get('filter_order'));
            $this->setState('list.direction',  $input->get('filter_order_Dir'));
            $orderCol = $this->getState('list.ordering', 'id');
            $orderDirn = $this->getState('list.direction', 'asc');
            $query->order($orderCol . ' ' . $orderDirn);
        }
        return $query;
    }

    public function remove($id) {
        $db = $this->getDbo();
	$db->setQuery("DELETE FROM `#__ingredients_basket` WHERE id=".(int)$id);
        $db->execute();
    }
    
    public function add($id) {
        $user = JFactory::getUser();
        if (!$user->guest && isset($user->id) && ($user->id>0)) {
            $db = $this->getDbo();
            $db->setQuery("SELECT `count` FROM `#__ingredients_basket` WHERE (`user_id`=".(int)$user->id.") and (`article_id`=".(int)$id.") and (datefinish is null)");
            $count=$db->loadResult();
            if (!isset($count) || $count==0) {
                $db->setQuery("INSERT INTO `#__ingredients_basket` (`user_id`,`article_id`) VALUES(".(int)$user->id.",".(int)$id.")");
                $db->execute();      
            } else {
                $db->setQuery("UPDATE `#__ingredients_basket` SET `count`=".(int)($count+1)." WHERE (`user_id`=".(int)$user->id.") and (`article_id`=".(int)$id.") and (datefinish is null)");
                $db->execute();
            }
        }
    }
    
    public function setsize($id, $size) {
        $user = JFactory::getUser();
        if (!$user->guest && isset($user->id) && ($user->id>0)) {
            $db = $this->getDbo();
            $db->setQuery("SELECT `count` FROM `#__ingredients_basket` WHERE (`user_id`=".(int)$user->id.") and (`article_id`=".(int)$id.") and (datefinish is null)");
            $count=$db->loadResult();
            if (!isset($count) || $count==0) {
                $db->setQuery("INSERT INTO `#__ingredients_basket` (`user_id`,`article_id`,`count`) VALUES(".(int)$user->id.",".(int)$id.",".str_replace(",",".",(float)$size).")");
                $db->execute();      
            } else {
                $db->setQuery("UPDATE `#__ingredients_basket` SET `count`=".str_replace(",",".",(float)$size)." WHERE (`user_id`=".(int)$user->id.") and (`article_id`=".(int)$id.") and (datefinish is null)");
                $db->execute();
            }
        }
    }
    
    public function dec($id) {
        $user = JFactory::getUser();
        if (!$user->guest && isset($user->id) && ($user->id>0)) {
            $db = $this->getDbo();
            $db->setQuery("SELECT `count` FROM `#__ingredients_basket` WHERE (`user_id`=".(int)$user->id.") and (`article_id`=".(int)$id.") and (datefinish is null)");
            $count=$db->loadResult();
            if (!isset($count) || $count<=1) {
                $db->setQuery("DELETE FROM `#__ingredients_basket` WHERE (`user_id`=".(int)$user->id.") and (`article_id`=".(int)$id.") and (datefinish is null)");
                $db->execute();      
            } else {
                $db->setQuery("UPDATE `#__ingredients_basket` SET `count`=".(int)($count-1)." WHERE (`user_id`=".(int)$user->id.") and (`article_id`=".(int)$id.") and (datefinish is null)");
                $db->execute();
            }
        }
    }
        
    public function isPositive($id) {
        $user = JFactory::getUser();
        if (!$user->guest && isset($user->id) && ($user->id>0)) {
            $db = $this->getDbo();
            $db->setQuery("SELECT `count` FROM `#__ingredients_basket` WHERE (`user_id`=".(int)$user->id.") and (`article_id`=".(int)$id.") and (datefinish is null)");
            $count=$db->loadResult();
            if (!isset($count) || $count<=0) {
                return FALSE;     
            } else {
                return TRUE;
            }
        }
    }            
    
    public function closeActiveList() {
        $user = JFactory::getUser();
        if (!$user->guest && isset($user->id) && ($user->id>0)) {
            $db = $this->getDbo();
//            $current_date=date("Y-m-d H:i:s");
            $db->setQuery("UPDATE `#__ingredients_basket` SET `datefinish`=now() WHERE (`datefinish` is null) and (`user_id`=".(int)$user->id.")");
            $db->execute();      
        }
    }
    
    public function clearActiveList() {
        $user = JFactory::getUser();
        if (!$user->guest && isset($user->id) && ($user->id>0)) {
            $db = $this->getDbo();
            $db->setQuery("DELETE FROM `#__ingredients_basket` WHERE (`datefinish` is null) and (`user_id`=".(int)$user->id.")");
            $db->execute();      
        }        
    }
    
    
}