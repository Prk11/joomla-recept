<?php

/**
 * @package     Joomla.Plugin
 * @subpackage  Editors.none
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
defined('_JEXEC') or die;


JLoader::register('K2Plugin', JPATH_ADMINISTRATOR . DS . 'components' . DS . 'com_k2' . DS . 'lib' . DS . 'k2plugin.php');
JLoader::register('ReceptModelBasket', JPATH_ROOT . DS . 'components' . DS . 'com_recept' . DS . 'models' . DS . 'basket.php');

/**
 * Plain Textarea Editor Plugin
 *
 * @since  1.5
 */
class plgK2Receptbutton extends K2Plugin {

    public $pluginName = "receptbutton";
    protected $_name = "receptbutton";
//    public $pluginNameHumanReadable;
    protected $autoloadLanguage = true;
    protected $_type = "k2";

    function __construct(&$subject, $config = array()) {
        $this->loadLanguage();
        $this->pluginNameHumanReadable = JText::_('PLG_RECEPTBUTTON_PLUGIN_HUMANNAME');
        parent::__construct($subject, $config);
    }

    function onK2BeforeDisplayContent(&$item, &$params, $limitstart) {
        $list_category = $this->params->get("list_category");
        if ($list_category != NULL && !array_search($item->catid, $list_category)) {
            return;
        }
        $txt = "";
        $visible_ingredients = $this->params->get('visible_ingredients', 1);
        if ($visible_ingredients) {
            $label_ingredients = $this->params->get('label_ingredients');
            $label_style_ingredients = $this->params->get('label_style_ingredients');
            $list_style_ingredients = $this->params->get('list_style_ingredients');
            $txt.="<br /><span style='$label_style_ingredients'>$label_ingredients</span> ";
            $sql.="select l.`name`, a.`ingredient_count`, l.`unit` ";
            $sql.="from `#__ingredients_article` as a inner join `#__ingredients_list` as l ";
            $sql.="on (a.`ingredient_id`=l.`id`) where (a.`published`='1') and ";
            $sql.="(a.`article_id`=" . $item->id . ")";
            $query = JFactory::getDbo();
            $query = &$query;
            $query->setQuery($sql);
            $rows = $query->loadRowList();
            $txt.="<span style='$list_style_ingredients'>";
            foreach ($rows as $row) {
                if ((float) $row[1] == 0.0) {
                    $txt.=$row[0] . "; ";
                } else {
                    $txt.=$row[0] . ": " . (float) $row[1] . " " . $row[2] . "; ";
                }
            }
            $txt.="</span>";
        }
        return $txt;
    }

    function onK2AfterDisplayContent(&$item, &$params, $limitstart) {
        $list_category = $this->params->get("list_category");
        if ($list_category != NULL && !array_search($item->catid, $list_category)) {
            return;
        }
        $user = JFactory::getUser();
        if (!$user->guest) {
            $uri = JFactory::getURI()->toString() . "#btngroup" . $item->id;
            $txt = '<div class="btn-group">';
            $txt.='<a class="btn btn-success button" href="' . JRoute::_("index.php?option=com_recept&task=add&id=" . (int) $item->id . "&return=" . base64_encode($uri)) . '"><span class="icon-plus"></span>' . JText::_('PLG_RECEPTBUTTON_PLUGIN_BASKET_ADD') . '</a>';
            $model = new ReceptModelBasket();
            if ($model->isPositive($item->id)) {
                $txt.='<a class="btn btn-danger button" href="' . JRoute::_("index.php?option=com_recept&task=dec&id=" . (int) $item->id . "&return=" . base64_encode($uri)) . '"><span class="icon-minus"></span>' . JText::_('PLG_RECEPTBUTTON_PLUGIN_BASKET_DEL') . '</a>';
            }
            $txt.='</div>';
            return $txt;
        }
        return "";
    }

    function onK2BeforeDisplay(&$item, &$params, $limitstart) {
        return '<div id="btngroup' . $item->id . '" />';
    }

    function onRenderAdminForm(&$item, $type, $tab = '') {
        $list_category = $this->params->get("list_category");
        if ($list_category != NULL && !array_search($item->catid, $list_category)) {
            return;
        }
        $manifest = JPATH_SITE . DS . 'plugins' . DS . 'k2' . DS . $this->pluginName . DS . $this->pluginName . '.xml';
        if (!empty($tab)) {
            $path = $type . '-' . $tab;
        } else {
            $path = $type;
        }
        if (!isset($item->plugins)) {
            $item->plugins = NULL;
        }
        jimport('joomla.form.form');
        $form = JForm::getInstance('plg_k2_' . $this->pluginName . '_' . $path, $manifest, array(), true, 'fields[@group="' . $path . '"]');
        $values = array();
        if (!is_null($item->id)) {
            $sql.="select a.`ingredient_id`, a.`ingredient_count` ";
            $sql.="from `#__ingredients_article` as a where (a.`published`='1') and ";
            $sql.="(a.`article_id`=" . $item->id . ")";
            $query = JFactory::getDbo();
            $query = &$query;
            $query->setQuery($sql);
            $rows = $query->loadRowList();
            $unit = " ";
            $count = " ";
            $values = [];
            foreach ($rows as $row) {
                $unit.="\"" . $row[0] . "\",";
                $count.="\"" . $row[1] . "\",";
            }
            $values["receptbutton"] = "{\"unit\":[" . substr($unit, 0, -1) . "], \"count\":[" . substr($count, 0, -1) . "]}";
            $form->bind($values);
        }
        $fields = $form->getField("receptbutton")->label . ' ' . $form->getField("receptbutton")->input;
        if (count($form->getFieldset()) > 0) {
            $plugin = new JObject;
            $plugin->name = $this->pluginNameHumanReadable;
            $plugin->fields = $fields;
            return $plugin;
        }
    }

    function onAfterK2Save(&$row, $isNew) {
        $receptbutton = JRequest::getVar('receptbutton');
        $sql = "DELETE FROM `#__ingredients_article` WHERE (`article_id`={intval(" . $row->id . ")})";
        $query = JFactory::getDbo();
        $query = &$query;
        $query->setQuery($sql);
        $query->execute();
        $unit = [];
        $count = [];
        foreach (json_decode($receptbutton) as $key => $value) {
            switch ($key) {
                case "unit":
                    $unit = $value;
                    break;
                case "count":
                    $count = $value;
                    break;
            }
        }
        foreach ($unit as $index => $item) {
            $sql = "insert into #__ingredients_article (`article_id`, `ingredient_id`, `ingredient_count`) values ({intval(" . $row->id . ")},{intval(" . $item . ")}," . $count[$index] . ")";
            $query->setQuery($sql);
            $query->execute();
        }
    }

    function onK2AfterDeleteItem($row) {
        $db = JFactory::getDBO();
        $query = "DELETE FROM #__ingredients_article WHERE `article_id`= {intval($row->id)}";
        $db->setQuery($query);
        $db->query();
    }

}
