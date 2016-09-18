<?php
defined('_JEXEC') or die('Restricted access');
 
/**
 * HTML View class for the HelloWorld Component
 *
 * @since  0.0.1
 */
class ReceptViewIngredients extends JViewLegacy
{
    public $msg;
    /**
	 * Display the Hello World view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null)
	{
            $this->state = $this->get('State');
            $this->pagination = $this->get('Pagination');
            
            JToolBarHelper::title(JText::_('COM_RECEPT_COMPONENT_TITLE'));
            JToolbarHelper::addNew('ingredient.add'); 
            JToolbarHelper::editList('ingredient.edit');
            JToolbarHelper::custom('ingredient.join','','','COM_RECEPT_JOIN');
            JToolbarHelper::trash('ingredient.remove');
            $model = &$this->getModel();
            $modelData = $model->getItems();
            $this->assignRef('IngredientList', $modelData );
            $this->setLayout("ingredients");
            JHtmlSidebar::addEntry(JText::_("COM_RECEPT_TAB_INGREDIENTS"), JRoute::_('index.php?option=com_recept&layout=ingredients&view=ingredients'), TRUE);
            JHtmlSidebar::addEntry(JText::_("COM_RECEPT_TAB_COMPOSITIONS"), JRoute::_('index.php?option=com_recept&layout=compositions&view=compositions'));
            $this->sidebar = JHtmlSidebar::render();
            parent::display($tpl);
	}
        
        
}