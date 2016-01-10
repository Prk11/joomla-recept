<?php
defined('_JEXEC') or die('Restricted access');

class ReceptControllerDefault extends JControllerLegacy {
    public function display($cachable = false, $urlparams = array()) {
        echo 'taskMap: <pre>';
        var_dump($this->taskMap);
        echo '</pre>';
        echo 'input: <pre>';
        var_dump($this->input);
        echo '</pre>';
        echo 'paths: <pre>';
        var_dump($this->paths);
        echo '</pre>';
        echo 'methods: <pre>';
        var_dump($this->methods);
        echo '</pre>';
        echo 'name: <pre>';
        var_dump($this->name);
        echo '</pre>';
        return parent::display($cachable, $urlparams);
    }

    public function execute($task) {
        echo 'execute task='.$task;
//        $app = JFactory::getApplication();
//        $viewName = $app->input->get('view');
//        $app->input->set('layout','content');
//        $app->input->set('view', $viewName);
        return parent::execute($task);
    }

}