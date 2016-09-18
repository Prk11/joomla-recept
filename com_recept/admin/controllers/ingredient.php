<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ingredient
 *
 * @author prk
 */
class ReceptControllerIngredient extends JControllerForm {
    public function remove($cachable = false, $urlparams = array()) {
        $model=$this->getModel($this->view_item,"ReceptModel");
        $ids =& $this->input->get('cid', array(), 'array');
        $model->delete($ids);
        return parent::display($cachable, $urlparams);
    }
    
    public function join($cachable = false, $urlparams = array()) {
        $ids =& $this->input->get('cid',array(),'array');
        $id=$ids[0];
        unset($ids[0]);
        $model=$this->getModel($this->view_list,"ReceptModel");
        if (!$model->join($id,$ids)) {
            $this->setMessage("Ошибка объединения");
        }
        return parent::display($cachable, $urlparams);
    }
    

}
