<?php
    defined('JPATH_PLATFORM') or die;
    jimport('joomla.installer.installer');
    jimport('joomla.installer.helper');
    
    class com_receptInstallerScript {
        
        function install($parent) {
            try {
                echo JText::_('COM_RECEPT_INSTALL_START_STEP1')."<br />";
                $db=  & JFactory::getDbo();    
                $db->transactionStart();
                echo JText::_('COM_RECEPT_INSTALL_START_STEP2')."<br />";
                $db->setQuery("select distinct name from #__k2_tags");
                $rows = $db->loadRowList();
                echo JText::_('COM_RECEPT_INSTALL_START_STEP3')."<br />";
                foreach ($rows as $row) {
                    $db->setQuery("insert into #__ingredients_list (`name`) values ('".$row[0]."')");
                    $db->execute();
                }
                // Загружаем по тегам
                echo JText::_('COM_RECEPT_INSTALL_START_STEP4')."<br />";
                $sql ='select distinct ingredient.`id` ingredient_id, k2item.`id` k2item_id 
                from 
                    #__ingredients_list ingredient inner join 
                    #__k2_tags k2tags on (ingredient.`name` = k2tags.`name`) inner join
                    #__k2_tags_xref xref on (k2tags.`id`=xref.`tagID`) inner join
                    #__k2_items k2item on (xref.itemID=k2item.id)';
                $db->setQuery($sql);
                $rows = $db->loadRowList();
                foreach ($rows as $row) {                    
                    $db->setQuery("insert into #__ingredients_article (`article_id`, `ingredient_id`, `ingredient_count`) values ($row[1],$row[0],0)");
                    $db->execute();
                                    
                }
                // Загрузка по анализу текста
                echo JText::_('COM_RECEPT_INSTALL_START_STEP5')."<br />";
                $sql ="select distinct ingredient.`id` ingredient_id, k2item.`id` k2item_id
                from 
                    #__ingredients_list ingredient inner join 
                    #__k2_items k2item on (k2item.introtext like CONCAT('%' , ingredient.`name` , '%')) 
                where ingredient.id not in
                    (select article.`ingredient_id` 
                    from #__ingredients_article article 
                    where (article.`article_id`=k2item.`id`))";
                $db->setQuery($sql);
                $rows = $db->loadRowList();
                foreach ($rows as $row) {                    
                    $db->setQuery("insert into #__ingredients_article (`article_id`, `ingredient_id`, `ingredient_count`) values ($row[1],$row[0],0)");
                    $db->execute();
                                    
                }
                echo JText::_('COM_RECEPT_INSTALL_SUCCESSFULL')."<br />";  
                $db->transactionCommit();
            } catch (Exception $ex) {
                echo JText::_('COM_RECEPT_INSTALL_FAILED')."<br /><i>".$ex->getMessage()."</i>";
                $db->transactionRollback();
            }
        }
        
        function uninstall($parent) {
            echo JText::_('COM_RECEPT_UNINSTALL_SUCCESSFULL')."<br />";
        }
    }