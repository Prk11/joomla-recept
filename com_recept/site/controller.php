<?php
defined('_JEXEC') or die('Restricted access');

class ReceptController extends JControllerLegacy 
{
    public function display($cachable = false, $urlparams = array()) {
        $user = JFactory::getUser();       
        $plugin = &JPluginHelper::getPlugin('k2', 'receptbutton');
        $params = new JRegistry();
        $params->loadString($plugin->params);
        $accept_unauth_users = $params->get('accept_unauth_users', 0);
        if (!$accept_unauth_users && $user->guest)
        {
            $uri = JFactory::getURI();
            $url = 'index.php?option=com_users&view=login&return='.base64_encode($uri->toString());
            $application = JFactory::getApplication();
            $application->enqueueMessage(JText::_('COM_RECEPT_NEED_TO_LOGIN_FIRST'), 'notice');
            $application->redirect(JRoute::_($url, false));
        }    
        return parent::display($cachable, $urlparams);
    }

    public function add($cachable = false, $urlparams = array()) {
        $input = JFactory::getApplication()->input;
        $model=  $this->getModel("Basket","ReceptModel");
        $model->add($input->getInt('id'));
        $this->setRedirect(base64_decode($input->getString('return')));
        return parent::display($cachable, $urlparams);
    }
    
    public function setsize($cachable = false, $urlparams = array()) {
        $app = JFactory::getApplication();
        JResponse::setHeader('Content-Type', 'text/plain', TRUE);        
        $input = $app->input;
        $model=  $this->getModel("Basket","ReceptModel");
        $model->setsize($input->getInt('id'),  $input->getFloat('size'));
        echo "OK";
        $app->close();
    }
    
    public function dec($cachable = false, $urlparams = array()) {
        $input = JFactory::getApplication()->input;
        $model=  $this->getModel("Basket","ReceptModel");
        $model->dec($input->getInt('id'));
        $this->setRedirect(base64_decode($input->getString('return')));
        return parent::display($cachable, $urlparams);
    }
    
    public function remove($cachable = false, $urlparams = array()) {
        $input = JFactory::getApplication()->input;
        $model=  $this->getModel("Basket","ReceptModel");
        $model->remove($input->getInt('id'));
        $this->setRedirect(base64_decode($input->getString('return')));
        return parent::display($cachable, $urlparams);
    }
    
    public function clear($cachable = false, $urlparams = array()) {
        $input = JFactory::getApplication()->input;
        $user = JFactory::getUser();
        $model=  $this->getModel("Basket","ReceptModel");
        $model->clearActiveList();
        $this->setRedirect(base64_decode($input->getString('return')));
        return parent::display($cachable, $urlparams);
    }
    
    public function close($cachable = false, $urlparams = array()) {
        $input = JFactory::getApplication()->input;
        $model=  $this->getModel("Basket","ReceptModel");
        $model->closeActiveList();        
        $this->setRedirect(base64_decode($input->getString('return')));
        return parent::display($cachable, $urlparams);
    }
}