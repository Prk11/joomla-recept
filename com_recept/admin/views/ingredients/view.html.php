<?php
defined('_JEXEC') or die('Restricted access');
 
/**
 * HTML View class for the HelloWorld Component
 *
 * @since  0.0.1
 */
class ReceptViewIngredients extends JViewLegacy
{
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
            JToolbarHelper::addNew(); 
            JToolbarHelper::custom('edit','edit','edit_unpublished','COM_RECEPT_EDIT');
            JToolbarHelper::trash();
            $model = &$this->getModel();
            $modelData = $model->getItems();
            $this->assignRef('IngredientList', $modelData );
            $this->setLayout("ingredients");
            parent::display($tpl);
	}
        
        
}