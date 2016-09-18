<?php 
defined('_JEXEC') or die('Restricted access');
JFactory::getDocument()->addScriptDeclaration('
	Joomla.submitbutton = function(task)
	{		
            Joomla.submitform(task, document.getElementById("default-form"));		
	};
');

?>
<h1><?php echo $this->msg; ?></h1>
<div class="form-horizontal">
    <form action="<?php echo JRoute::_('index.php?option=com_recept&layout=composition&view=composition&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="adminForm" class="form-validate form-horizontal" enctype="multipart/form-data">
        <?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'general')); ?>
        <?php echo JHtml::_('bootstrap.addTab', 'myTab', 'general', JText::_('COM_RECEPT_TAB_GENERAL', true)); ?>
        
        <?php foreach ($this->form->getFieldset() as $field) {  ?>
        <div class="row-fluid form-horizontal-desktop">
            <?php echo $field->renderField(); ?>
        </div>
        <?php } ?>
        <?php echo JHtml::_('bootstrap.endTab'); ?>	
        <?php echo JHtml::_('bootstrap.endTabSet'); ?>
        <input type="hidden" name="view" value="<?php echo JRequest::getVar('view'); ?>" />
        <input type="hidden" name="task" value="<?php echo JRequest::getVar('task'); ?>" />    
        <?php echo JHtml::_('form.token'); ?>
    </form>
</div>