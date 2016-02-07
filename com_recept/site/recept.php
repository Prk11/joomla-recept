<?php

defined('_JEXEC') or die('Restricted access');
JTable::addIncludePath(JPATH_COMPONENT.'/tables');
$input = JFactory::getApplication()->input;
$controller = JControllerLegacy::getInstance('Recept');
$input->set('view', $input->get('view',"Basket"));
$controller->execute($input->get('task'));       
$controller->redirect();