<?php

defined('_JEXEC') or die('Restricted access');
//JLoader::register('PHPRtfLite_Autoloader', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'Autoloader.php');
JLoader::register('PHPRtfLite', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite.php');
JLoader::register('PHPRtfLite_Unit', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'Unit.php');
JLoader::register('PHPRtfLite_Container', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'Container.php');
JLoader::register('PHPRtfLite_Container_Section', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'Container'.DS.'Section.php');
JLoader::register('PHPRtfLite_Container_Base', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'Container'.DS.'Base.php');
JLoader::register('PHPRtfLite_Container_Footer', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'Container'.DS.'Footer.php');
JLoader::register('PHPRtfLite_Container_Header', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'Container'.DS.'Header.php');
JLoader::register('PHPRtfLite_Container_Section', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'Container'.DS.'Section.php');
JLoader::register('PHPRtfLite_Font', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'Font.php');
JLoader::register('PHPRtfLite_ParFormat', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'ParFormat.php');
JLoader::register('PHPRtfLite_Element', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'Element.php');
JLoader::register('PHPRtfLite_DocHead_FontTable', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'DocHead'.DS.'FontTable.php');
JLoader::register('PHPRtfLite_DocHead_ColorTable', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'DocHead'.DS.'ColorTable.php');
JLoader::register('PHPRtfLite_DocHead_Note', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'DocHead'.DS.'Note.php');
JLoader::register('PHPRtfLite_Writer_String', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'Writer'.DS.'String.php');
JLoader::register('PHPRtfLite_Writer_Interface', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'Writer'.DS.'Interface.php');
JLoader::register('PHPRtfLite_StreamOutput', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'StreamOutput.php');
JLoader::register('PHPRtfLite_Element_Plain', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'Element'.DS.'Plain.php');
JLoader::register('PHPRtfLite_Element_Hyperlink', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'Element'.DS.'Hyperlink.php');
JLoader::register('PHPRtfLite_Utf8', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'Utf8.php');
JLoader::register('PHPRtfLite_ParFormat', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'ParFormat.php');
JLoader::register('PHPRtfLite_Exception', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'Exception.php');
JLoader::register('PHPRtfLite_Border', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'Border.php');
JLoader::register('PHPRtfLite_Border_Format', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'Border'.DS.'Format.php');
JLoader::register('PHPRtfLite_Endnote', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'Endnote.php');
JLoader::register('PHPRtfLite_Footnote', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'Footnote.php');
JLoader::register('PHPRtfLite_FormField', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'FormField.php');
JLoader::register('PHPRtfLite_FormField_Checkbox', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'FormField'.DS.'Checkbox.php');
JLoader::register('PHPRtfLite_FormField_Dropdown', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'FormField'.DS.'Dropdown.php');
JLoader::register('PHPRtfLite_FormField_Text', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'FormField'.DS.'Text.php');
JLoader::register('PHPRtfLite_Image', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'Image.php');
JLoader::register('PHPRtfLite_Image_Wmf', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'Image'.DS.'Wmf.php');
JLoader::register('PHPRtfLite_Image_Gd', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'Image'.DS.'Gd.php');
JLoader::register('PHPRtfLite_List', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'List.php');
JLoader::register('PHPRtfLite_List_Enumeration', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'List'.DS.'Enumeration.php');
JLoader::register('PHPRtfLite_List_Numbering', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'List'.DS.'Numbering.php');
JLoader::register('PHPRtfLite_Table', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'Table.php');
JLoader::register('PHPRtfLite_Table_Cell', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'Table'.DS.'Cell.php');
JLoader::register('PHPRtfLite_Table_Column', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'Table'.DS.'Column.php');
JLoader::register('PHPRtfLite_Table_Nested', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'Table'.DS.'Nested.php');
JLoader::register('PHPRtfLite_Table_Row', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'helper'.DS.'PHPRtfLite'.DS.'Table'.DS.'Row.php');

JLoader::register('ReceptModelBasket', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'models'.DS.'basket.php');
JLoader::register('ReceptModelIngredients', JPATH_ROOT.DS.'components'.DS.'com_recept'.DS.'models'.DS.'ingredients.php');

/**
 * HTML View class for the HelloWorld Component
 *
 * @since  0.0.1
 */
class ReceptViewRtf extends JViewLegacy {
    public function display($tpl = null) {
        $app = JFactory::getApplication();
       
        header('Content-Type: text/rtf');
        header('Content-Disposition: attachment; filename=downloaded.rtf');
        header('Expires: 0');
        $rtf = new PHPRtfLite();

        $section = $rtf->addSection();
        $font=new PHPRtfLite_Font();
        $fontBold=new PHPRtfLite_Font(11);
        $fontBold->setBold();
        $fontSubject=new PHPRtfLite_Font(14);
        $fontSubject->setUnderline();
        $fontTitle=new PHPRtfLite_Font(16);
        $fontTitle->setBold();
        $parformat=new PHPRtfLite_ParFormat();
        
        $border = new PHPRtfLite_Border($rtf);
        $borderFormat= new PHPRtfLite_Border_Format(1, "#000000",  PHPRtfLite_Border_Format::TYPE_SINGLE);
        $border->setBorders($borderFormat);
        
        $textPart1 = PHPRtfLite_Utf8::getUnicodeEntities(PHPRtfLite::quoteRtfCode("Выгрузка с сайта: "),$rtf->getCharset());
        $textPart2 = PHPRtfLite_Utf8::getUnicodeEntities(PHPRtfLite::quoteRtfCode(">Готовим вкусно<"),$rtf->getCharset());
        $section->writeRtfCode(
                $textPart1.'{\field {\*\fldinst {HYPERLINK "http://cookbook.od.ua/""}}{\\fldrslt {'.$textPart2.'}}}',
                $fontTitle);
        $section->addEmptyParagraph();
        $section->writeText("Список сформирован: ".date("Y-m-d H:i"), $font);
        $section->addEmptyParagraph();
        $section->writeText("Список блюд: ", $fontSubject);
        $basket_model=new ReceptModelBasket();
        $basket_model->setState('list.start',0);
        $basket_model->setState('list.limit',$basket_model->getTotal());
        $basket = $basket_model->getItems();
        $table=$section->addTable();
        $table->addColumnsList([2,8,3]);
        $row=$table->addRow();
        $row->getCellByIndex(1)->writeText("#",$fontBold);
        $row->getCellByIndex(2)->writeText("Рецепт",$fontBold);
        $row->getCellByIndex(3)->writeText("Порции",$fontBold);
        
        foreach ($basket as $i => $value) {
            $row=$table->addRow();
            $row->getCellByIndex(1)->writeText($i+1,$font);
            $row->getCellByIndex(2)->writeText($value->title,$font);
            $row->getCellByIndex(3)->writeText((float)$value->count,$font);            
        }
        $table->setBorderForCellRange($border, 1, 1, $basket_model->getTotal()+1, 3);
        
        $section->writeText("Список ингредиентов:", $fontSubject);
        $ingredients_model = new ReceptModelIngredients();
        $ingredients_model->setState('list.start',0);
        $ingredients_model->setState('list.limit',$ingredients_model->getTotal());
        $ingredients = $ingredients_model->getItems();
        $table=$section->addTable();
        $table->addColumnsList([2,8,3]);
        $row=$table->addRow();
        $row->getCellByIndex(1)->writeText("#",$fontBold);
        $row->getCellByIndex(2)->writeText("Ингредиент",$fontBold);
        $row->getCellByIndex(3)->writeText("Количество",$fontBold);
        
        foreach ($ingredients as $i => $value) {
            $row=$table->addRow();
            $row->getCellByIndex(1)->writeText($i+1,$font);
            $row->getCellByIndex(2)->writeText($value->name,$font);
            $row->getCellByIndex(3)->writeText((float)$value->count." ".$value->unit,$font);            
        }
        $table->setBorderForCellRange($border, 1, 1, $ingredients_model->getTotal()+1, 3);
        
        echo $rtf->getContent();
        $app->close();
//        echo mb_strlen($rtf->getContent(),'8bit');
    }

}