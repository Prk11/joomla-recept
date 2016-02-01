<?php
defined('_JEXEC') or die('Restricted access4');
 
/**
 * HTML View class for the HelloWorld Component
 *
 * @since  0.0.1
 */
class ReceptViewIngredient extends JViewLegacy
{
    protected $form;

    protected $item;
    
    protected $state;
    
    /**
     * Display the Hello World view
     *
     * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
     *
     * @return  void
     */
    function display($tpl = null)
    {
        $this->form  = $this->get('Form');
	$this->item  = $this->get('Item');
        $this->state = $this->get('State');
        $this->form->bind($this->item);

        JToolBarHelper::title(JText::_('COM_RECEPT_COMPONENT_TITLE'));
        JToolbarHelper::apply('ingredient.apply');
        JToolbarHelper::save('ingredient.save');
        JToolbarHelper::save2new('ingredient.save2new');
        JToolbarHelper::cancel();    
        $this->setLayout("ingredient");
        
        parent::display($tpl);
    }
        
        
}