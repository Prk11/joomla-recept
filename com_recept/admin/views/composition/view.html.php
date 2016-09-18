<?php
defined('_JEXEC') or die('Restricted access');

class ReceptViewComposition extends JViewLegacy
{
    protected $form;

    protected $item;
    
    protected $state;
    
    function display($tpl = null)
    {
        $this->form  = $this->get('Form');
	$this->item  = $this->get('Item');
        $this->state = $this->get('State');
        $this->form->bind($this->item);

        JToolBarHelper::title(JText::_('COM_RECEPT_COMPONENT_TITLE'));
        JToolbarHelper::apply('composition.apply');
        JToolbarHelper::save('composition.save');
        JToolbarHelper::save2new('composition.save2new');
        JToolbarHelper::cancel();    
        $this->setLayout("composition");
        
        parent::display($tpl);
    }
        
        
}