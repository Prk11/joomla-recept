<?php 
defined('_JEXEC') or die('Restricted access');
JFactory::getDocument()->addScriptDeclaration('
	Joomla.submitbutton = function(task)
	{		
            Joomla.submitform(task, document.getElementById("default-form"));		
	};
');
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn  = $this->escape($this->state->get('list.direction'));
?>
<h1><?php echo $this->msg; ?></h1>
<form action="<?php echo JRoute::_('index.php?option=com_recept&layout=compositions&view=compositions'); ?>" method="post" name="adminForm" id="adminForm" class="form-validate form-horizontal" enctype="multipart/form-data">
    <div id="j-sidebar-container" class="span2">
        <?php echo $this->sidebar; ?>
    </div>
    <div id="j-main-container" class="span10">
    <fieldset class="filter">
		<div class="btn-toolbar">
			<div class="btn-group">
				<label for="filter_search">
					<?php echo JText::_('JSEARCH_FILTER_LABEL'); ?>
				</label>
			</div>
			<div class="btn-group">
				<input type="text" name="filter_search" id="filter_search" value="<?php echo $this->escape($this->state->get('filter.search')); ?>" size="30" title="<?php echo JText::_('COM_CONTENT_FILTER_SEARCH_DESC'); ?>" />
			</div>
			<div class="btn-group">
				<button type="submit" class="btn hasTooltip" title="<?php echo JHtml::tooltipText('JSEARCH_FILTER_SUBMIT'); ?>" data-placement="bottom">
					<span class="icon-search"></span><?php echo JText::_('JSEARCH_FILTER_SUBMIT'); ?></button>
				<button type="button" class="btn hasTooltip" title="<?php echo JHtml::tooltipText('JSEARCH_FILTER_CLEAR'); ?>" data-placement="bottom" onclick="document.getElementById('filter_search').value='';this.form.submit();">
					<span class="icon-remove"></span><?php echo JText::_('JSEARCH_FILTER_CLEAR'); ?></button>
			</div>
		</div>
		<hr class="hr-condensed" />
		<div class="filters">
			<select name="filter_published" class="input-medium" onchange="this.form.submit()">
				<option value=""><?php echo JText::_('JOPTION_SELECT_PUBLISHED');?></option>
				<?php echo JHtml::_('select.options', JHtml::_('jgrid.publishedOptions'), 'value', 'text', $this->state->get('filter.published'), true);?>
			</select>

		</div>
	</fieldset>

    
    <table class="adminlist table table-striped" id="receptCompositionList">
        <thead>
            <tr>
                <th class="center">#</th>
                <th class="center">
                    <?php echo JHtml::_('grid.checkall'); ?>
		</th>
                <th class="center"><?php echo JHtml::_('grid.sort', 'JGLOBAL_TITLE', 'name', $listDirn, $listOrder); ?></th>
                <th class="center"><?php echo JHtml::_('grid.sort', 'JSTATUS', 'published', $listDirn, $listOrder); ?></th>
                <th class="center"><?php echo JHtml::_('grid.sort', 'JGRID_HEADING_ID', 'id', $listDirn, $listOrder); ?></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="6">
                    <?php 
                     echo $this->pagination->getListFooter(); 
                    ?>
                </td>
            </tr>
        </tfoot>
        <tbody>
            <?php foreach ($this->CompositionList as $i=>$composition) { ?>
            <tr>
                <td class="center"><?=$this->pagination->getRowOffset($i) ?>.</td>
                <td class="center"><?php echo JHtml::_('grid.id', $this->pagination->getRowOffset($i), $composition->id); ?></td>
                <td class="center"><?=$composition->name ?></td>
                <td class="center">
                    <div class="btn-group">
                        <?php echo JHtml::_('jgrid.published', $composition->published, $this->pagination->getRowOffset($i), $composition->id, true); ?>                            
                    </div>

                </td>
                <td class="center"><?=$composition->id ?></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    </div>
    <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
    <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>" />
    <input type="hidden" name="view" value="<?php echo JRequest::getVar('view'); ?>" />
    <input type="hidden" name="task" value="<?php echo JRequest::getVar('task'); ?>" />
    <input type="hidden" name="boxchecked" value="0">
    <?php echo JHtml::_('form.token'); ?>
</form>