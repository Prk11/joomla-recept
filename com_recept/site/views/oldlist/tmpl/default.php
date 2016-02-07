<?php 
defined('_JEXEC') or die('Restricted access');
$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn = $this->escape($this->state->get('list.direction'));
$uri = JFactory::getURI();
?>
<form action="<?php echo JRoute::_('index.php?option=com_recept&view=oldlist'); ?>" method="post" name="adminForm" id="adminForm" class="form-validate form-horizontal" enctype="multipart/form-data">

    <ul class="nav nav-tabs" id="myTabTabs">
        <li class="">
            <a href="<?= JRoute::_('index.php?option=com_recept&view=basket')?>" ><?= JText::_('COM_RECEPT_BASKET_TITLE')?></a>
        </li>
        <li class="">
            <a href="<?= JRoute::_('index.php?option=com_recept&view=ingredients')?>"><?= JText::_('COM_RECEPT_INGREDIENTS_TITLE')?></a>
        </li>
        <li class=" active">
            <a href="#oldlist" data-toggle="tab"><?= JText::_('COM_RECEPT_OLDLIST_TITLE') ?></a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <div id="oldlist" class="tab-pane active" >
            <table class="adminlist table table-striped" id="receptOldlist">
                <thead>
                    <tr>
                        <th class="center">#</th>
                        <th class="center"><?= JHtml::_('grid.sort', 'COM_RECEPT_OLDLIST_DATEFINISH', 'datefinish', $listDirn, $listOrder) ?></th>
                        <th class="center"><?= JHtml::_('grid.sort', 'COM_RECEPT_OLDLIST_DATESTART', 'datestart', $listDirn, $listOrder) ?></th>
                        <th class="center"><?= JHtml::_('grid.sort', 'COM_RECEPT_OLDLIST_COUNTRECEPT', 'count_recept', $listDirn, $listOrder) ?></th>                       
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td colspan="5">
                            <nav class="pagination">
                            <?= $this->pagination->getPagesLinks() ?>       
                            </nav>
                        </td>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($this->items as $i=>$position) { ?>
                    <tr>
                        <td class="center"><?=$this->pagination->getRowOffset($i) ?>.</td>
                        <td class="center"><a href="<?= JRoute::_('index.php?option=com_recept&view=basketold&datefinish='.base64_encode($position->datefinish))?>"><?=$position->datefinish ?></a></td>
                        <td class="center"><?= $position->datestart ?></td>
                        <td class="center"><?= $position->count_recept ?></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
    <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>" />
    <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn ?>" />
    <input type="hidden" name="view" value="<?php echo JRequest::getVar('view'); ?>" />
    <input type="hidden" name="task" value="<?php echo JRequest::getVar('task'); ?>" />
    <input type="hidden" name="boxchecked" value="0">
    <?php echo JHtml::_('form.token'); ?>
</form>
