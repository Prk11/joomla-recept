<?php
    defined('JPATH_PLATFORM') or die;
    jimport('joomla.installer.installer');
    jimport('joomla.installer.helper');
    
    class com_receptInstallerScript {
        function install($parent) {
            echo JText::_('COM_RECEPT_INSTALL_SUCCESSFULL');
        }
        function uninstall($parent) {
            echo JText::_('COM_RECEPT_UNINSTALL_SUCCESSFULL');
        }
    }