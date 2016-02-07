<?php 
defined('_JEXEC') or die('Restricted access');
$listOrder= $this->escape($this->state->get('list.ordering'));
$listDirn  = $this->escape($this->state->get('list.direction'));
JFactory::getDocument()->addScriptDeclaration('
    
    function setsize(id, size) {                
        jQuery(size).animate({"opacity" : 0}, 400);
        var url="http://'.$_SERVER['SERVER_NAME'].JRoute::_("index.php?option=com_recept&task=setsize&id={0}&size={1}").'";
        url=url.replace(/{(\d+)}/g, 
                function(match, number) { 
                    switch(number) {
                        case "0":
                            return id;
                            break;
                        case "1":
                            return size.value;
                            break;
                        default : 
                            return match;
                    }
                }
            ); 
        jQuery.ajax({
            url: url, 
            success: 
                function (data, status) {
                    if (data="OK") {
                        jQuery(size).animate({"opacity" : 1}, 400);
                    }
                }
            }
        );
    }
');
$uri = JFactory::getURI();
?>
<form action="<?php echo JRoute::_('index.php?option=com_recept'); ?>" method="post" name="adminForm" id="adminForm" class="form-validate form-horizontal" enctype="multipart/form-data">

    <ul class="nav nav-tabs" id="myTabTabs">
        <li class=" active">
            <a href="#basket" data-toggle="tab"><?= JText::_('COM_RECEPT_BASKET_TITLE')?></a>
        </li>
        <li class="">
            <a href="<?= JRoute::_('index.php?option=com_recept&view=ingredients')?>"><?= JText::_('COM_RECEPT_INGREDIENTS_TITLE')?></a>
        </li>
        <li class="">
            <a href="<?= JRoute::_('index.php?option=com_recept&view=oldlist') ?>" ><?= JText::_('COM_RECEPT_OLDLIST_TITLE') ?></a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">    
        <div id="basket" class="tab-pane active">
            <table class="adminlist table table-striped" id="receptBasket">
                <thead>
                    <tr>
                        <th class="center">#</th>
                        <th class="center"><?php echo JHtml::_('grid.sort', 'COM_RECEPT_ARTICLE', 'title', $listDirn, $listOrder); ?></th>
                        <th class="center"><?php echo JHtml::_('grid.sort', 'COM_RECEPT_UNIT', 'count', $listDirn, $listOrder); ?></th>
                        <th class="center"><?php echo JText::_('COM_RECEPT_ACTION'); ?></th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <td colspan="4">
                            <nav class="pagination">
                            <?= $this->pagination->getPagesLinks() ?>
                            </nav>
                            <br />
                            <div class="btn-group">
                                <a class="btn button btn-danger" href="<?= JRoute::_("index.php?option=com_recept&task=clear&return=".base64_encode($uri->toString())) ?>">
                                    <?= JText::_("COM_RECEPT_BASKET_CLEAR") ?>
                                </a>
                                <a class="btn button btn-warning" href="<?= JRoute::_("index.php?option=com_recept&task=close&return=".base64_encode($uri->toString())) ?>">
                                    <?= JText::_("COM_RECEPT_BASKET_CLOSE") ?>
                                </a>
                            </div>
                        </td>
                    </tr>
                </tfoot>
                <tbody>
                    <?php foreach ($this->items as $i=>$position) { ?>
                    <tr>
                        <td class="center"><?=$this->pagination->getRowOffset($i) ?>.</td>
                        <td class="center"><a href="<?= JRoute::_('index.php?option=com_k2&view=item&id='.$position->article_id)?>"><?=$position->title ?></a></td>
                        <td class="center">
                            <input type="number" min="0.0" step="0.5" value="<?=(float)$position->count ?>"
                                   onblur="setsize(<?= $position->article_id ?>,this)" />
                        </td>
                        <td class="center">
                            <div class="btn-group">
                                <a class="btn button btn-danger" href="<?= JRoute::_("index.php?option=com_recept&task=remove&id=".(int)$position->id."&return=".base64_encode($uri->toString())) ?>"><span class="icon-minus"></span><?= JText::_("COM_RECEPT_BASKET_DEL") ?></a>
                            </div>
                        </td>
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
