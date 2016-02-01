<?php
defined('_JEXEC') or die('Restricted access');

class ReceptController extends JControllerLegacy {

    public function remove($cachable = false, $urlparams = array()) {
        $model=$this->getModel('Ingredient',"ReceptModel");
        $ids =& $this->input->get('cid', array(), 'array');
        $model->delete($ids);
        return parent::display($cachable, $urlparams);
    }

    public function add($cachable = false, $urlparams = array()) {
        $this->input->set('view','ingredient');
        return parent::display($cachable, $urlparams);
    }
    
    public function join($cachable = false, $urlparams = array()) {
        $ids =& $this->input->get('cid',array(),'array');
        $id=$ids[0];
        unset($ids[0]);
        $model=$this->getModel('Ingredients',"ReceptModel");
        if (!$model->join($id,$ids)) {
            $this->setMessage("Ошибка объединения");
        }
        return parent::display($cachable, $urlparams);
    }
    
    public function cancel($cachable = false, $urlparams = array()) {
        $this->input->set('view','ingredients');
        return parent::display($cachable, $urlparams);
    }
        
}