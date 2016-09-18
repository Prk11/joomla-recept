<?php
defined('_JEXEC') or die('Restricted access');

class ReceptViewCompositions extends JViewLegacy
{
    public $msg;
    
    function display($tpl = null)
    {
        $this->state = $this->get('State');
        $this->pagination = $this->get('Pagination');

        JToolBarHelper::title(JText::_('COM_RECEPT_COMPONENT_TITLE'));
        JToolbarHelper::addNew('composition.add'); 
        JToolbarHelper::editList('composition.edit');
        JToolbarHelper::custom('join','','','COM_RECEPT_JOIN');
        JToolbarHelper::trash('composition.remove');
        $model = &$this->getModel();
        $modelData = $model->getItems();
        $this->assignRef('CompositionList', $modelData );
        $this->setLayout("compositions");
        JHtmlSidebar::addEntry(JText::_("COM_RECEPT_TAB_INGREDIENTS"), JRoute::_('index.php?option=com_recept&layout=ingredients&view=ingredients'));
        JHtmlSidebar::addEntry(JText::_("COM_RECEPT_TAB_COMPOSITIONS"), JRoute::_('index.php?option=com_recept&layout=compositions&view=compositions'), TRUE);
        $this->sidebar = JHtmlSidebar::render();
        parent::display($tpl);
    }       
        
}

