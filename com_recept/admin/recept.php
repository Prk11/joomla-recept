<?php
defined('_JEXEC') or die('Restricted access');
JTable::addIncludePath(JPATH_COMPONENT.'/tables');

$app = JFactory::getApplication();
$input = $app->input;
$controller = $input->get('controller','default');
require_once (JPATH_COMPONENT.'/controllers/'.$controller.'.php');
$classname = 'ReceptController'.ucfirst($controller);
$controller = new $classname();
$input->set('view', "default");
$controller->execute($input->getCmd('task'));
        
$controller->redirect();