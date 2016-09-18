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
        $query->select('b.id, b.datestart, b.datefinish, a.title, b.count, a.id as article_id');
        $query->from("`#__ingredients_basket` b");
        $query->join("INNER", "`#__k2_items` a ON (a.id=b.`article_id`)");
        if (!$user->guest && isset($user->id) && ($user->id>0)) {
            $query->where("b.user_id=".(int)$user->id);
        } else {
            $query->where("b.`user_session`='".$_COOKIE["a181863e93a14f3d7d6c9f40b7c63aa1"]."'");
        }
        $query->where("b.datefinish is null");
        $this->setState('list.ordering', $input->get('filter_order'));
        $this->setState('list.direction',  $input->get('filter_order_Dir'));
        $orderCol = $this->getState('list.ordering', 'id');
        $orderDirn = $this->getState('list.direction', 'asc');
        $query->order($orderCol . ' ' . $orderDirn);
        return $query;
    }

    public function remove($id) {
        $db = $this->getDbo();
	$db->setQuery("DELETE FROM `#__ingredients_basket` WHERE id=".(int)$id);
        $db->execute();
    }
    
    public function add($id) {
        $user = JFactory::getUser();
        $db = $this->getDbo();
        if (!$user->guest && isset($user->id) && ($user->id>0)) {
           $sql="SELECT `count` FROM `#__ingredients_basket` WHERE (`user_id`=".(int)$user->id.") and (`article_id`=".(int)$id.") and (datefinish is null)" ;
        } else {
           $sql="SELECT `count` FROM `#__ingredients_basket` WHERE (`user_session`='".$_COOKIE["a181863e93a14f3d7d6c9f40b7c63aa1"]."') and (`article_id`=".(int)$id.") and (datefinish is null)";
        }
        $db->setQuery($sql);
        $count=$db->loadResult();
        if (!$user->guest && isset($user->id) && ($user->id>0)) {
           $sql1="INSERT INTO `#__ingredients_basket` (`user_id`,`article_id`) VALUES(".(int)$user->id.",".(int)$id.")";
           $sql2="UPDATE `#__ingredients_basket` SET `count`=".(int)($count+1)." WHERE (`user_id`=".(int)$user->id.") and (`article_id`=".(int)$id.") and (datefinish is null)";
        } else {
           $sql1="INSERT INTO `#__ingredients_basket` (`user_session`,`article_id`) VALUES('".$_COOKIE["a181863e93a14f3d7d6c9f40b7c63aa1"]."',".(int)$id.")";
           $sql2="UPDATE `#__ingredients_basket` SET `count`=".(int)($count+1)." WHERE (`user_session`='".$_COOKIE["a181863e93a14f3d7d6c9f40b7c63aa1"]."') and (`article_id`=".(int)$id.") and (datefinish is null)";
        }
        if (!isset($count) || $count==0) {
            $db->setQuery($sql1);
            $db->execute();      
        } else {
            $db->setQuery($sql2);
            $db->execute();
        }
    }
    
    public function setsize($id, $size) {
        $user = JFactory::getUser();
        $db = $this->getDbo();
        if (!$user->guest && isset($user->id) && ($user->id>0)) {
            $sql = "SELECT `count` FROM `#__ingredients_basket` WHERE (`user_id`=".(int)$user->id.") and (`article_id`=".(int)$id.") and (datefinish is null)";
        } else {
            $sql = "SELECT `count` FROM `#__ingredients_basket` WHERE (`user_session`='".$_COOKIE["a181863e93a14f3d7d6c9f40b7c63aa1"]."') and (`article_id`=".(int)$id.") and (datefinish is null)";
        }
        $db->setQuery($sql);
        $count=$db->loadResult();
        if (!$user->guest && isset($user->id) && ($user->id>0)) {
            $sql1="INSERT INTO `#__ingredients_basket` (`user_id`,`article_id`,`count`) VALUES(".(int)$user->id.",".(int)$id.",".str_replace(",",".",(float)$size).")";
            $sql2="UPDATE `#__ingredients_basket` SET `count`=".str_replace(",",".",(float)$size)." WHERE (`user_id`=".(int)$user->id.") and (`article_id`=".(int)$id.") and (datefinish is null)";
        } else {
            $sql1="INSERT INTO `#__ingredients_basket` (`user_session`,`article_id`,`count`) VALUES('".$_COOKIE["a181863e93a14f3d7d6c9f40b7c63aa1"]."',".(int)$id.",".str_replace(",",".",(float)$size).")";
            $sql2="UPDATE `#__ingredients_basket` SET `count`=".str_replace(",",".",(float)$size)." WHERE (`user_session`='".$_COOKIE["a181863e93a14f3d7d6c9f40b7c63aa1"]."') and (`article_id`=".(int)$id.") and (datefinish is null)";
        }
        if (!isset($count) || $count==0) {
            $db->setQuery($sql1);
            $db->execute();      
        } else {
            $db->setQuery($sql2);
            $db->execute();
        }
    }
    
    public function dec($id) {
        $user = JFactory::getUser();
        $db = $this->getDbo();
        if (!$user->guest && isset($user->id) && ($user->id>0)) {
           $sql="SELECT `count` FROM `#__ingredients_basket` WHERE (`user_id`=".(int)$user->id.") and (`article_id`=".(int)$id.") and (datefinish is null)" ;
        } else {
           $sql="SELECT `count` FROM `#__ingredients_basket` WHERE (`user_session`='".$_COOKIE["a181863e93a14f3d7d6c9f40b7c63aa1"]."') and (`article_id`=".(int)$id.") and (datefinish is null)";
        }
        $db->setQuery($sql);
        $count=$db->loadResult();
        if (!$user->guest && isset($user->id) && ($user->id>0)) {
           $sql1="DELETE FROM `#__ingredients_basket` WHERE (`user_id`=".(int)$user->id.") and (`article_id`=".(int)$id.") and (datefinish is null)";
           $sql2="UPDATE `#__ingredients_basket` SET `count`=".(int)($count-1)." WHERE (`user_id`=".(int)$user->id.") and (`article_id`=".(int)$id.") and (datefinish is null)";
        } else {
           $sql1="DELETE FROM `#__ingredients_basket` WHERE (`user_session`='".$_COOKIE["a181863e93a14f3d7d6c9f40b7c63aa1"]."') and (`article_id`=".(int)$id.") and (datefinish is null)";
           $sql2="UPDATE `#__ingredients_basket` SET `count`=".(int)($count-1)." WHERE (`user_session`='".$_COOKIE["a181863e93a14f3d7d6c9f40b7c63aa1"]."') and (`article_id`=".(int)$id.") and (datefinish is null)";
        }
        if (!isset($count) || $count==0) {
            $db->setQuery($sql1);
            $db->execute();      
        } else {
            $db->setQuery($sql2);
            $db->execute();
        }

    }
        
    public function isPositive($id) {
        $user = JFactory::getUser();
        $db = $this->getDbo();
        if (!$user->guest && isset($user->id) && ($user->id>0)) {
            $sql="SELECT `count` FROM `#__ingredients_basket` WHERE (`user_id`=".(int)$user->id.") and (`article_id`=".(int)$id.") and (datefinish is null)";                        
        } else {
            $sql="SELECT `count` FROM `#__ingredients_basket` WHERE (`user_session`='".$_COOKIE["a181863e93a14f3d7d6c9f40b7c63aa1"]."') and (`article_id`=".(int)$id.") and (datefinish is null)";                        
        }
        $db->setQuery($sql);
        $count=$db->loadResult();
        if (!isset($count) || $count<=0) {
            return FALSE;     
        } else {
            return TRUE;
        }
    }            
    
    public function closeActiveList() {
        $user = JFactory::getUser();
        $db = $this->getDbo();
        if (!$user->guest && isset($user->id) && ($user->id>0)) {
            $sql="UPDATE `#__ingredients_basket` SET `datefinish`=now() WHERE (`datefinish` is null) and (`user_id`=".(int)$user->id.")";
        } else {
            $sql="UPDATE `#__ingredients_basket` SET `datefinish`=now() WHERE (`datefinish` is null) and (`user_session`='".$_COOKIE["a181863e93a14f3d7d6c9f40b7c63aa1"]."')";
        }
        $db->setQuery($sql);
        $db->execute();      
    }
    
    public function clearActiveList() {
        $user = JFactory::getUser();
        $db = $this->getDbo();
        if (!$user->guest && isset($user->id) && ($user->id>0)) {
            $sql="DELETE FROM `#__ingredients_basket` WHERE (`datefinish` is null) and (`user_id`=".(int)$user->id.")";           
        } else {
            $sql="DELETE FROM `#__ingredients_basket` WHERE (`datefinish` is null) and (`user_session`='".$_COOKIE["a181863e93a14f3d7d6c9f40b7c63aa1"]."')"; 
        }   
        $db->setQuery($sql);
        $db->execute();      
    }
    
    
}