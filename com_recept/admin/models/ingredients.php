<?php
defined('_JEXEC') or die('Restricted access');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


/**
 * Description of default
 *
 * @author prk
 */
class ReceptModelIngredients extends JModelList {    

    function __construct($config = array()) {
        if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'id', 'id',
				'name', 'name',
				'unit', 'unit',
				'ordering', 'ordering',
				'publish_up', 'publish_up',
				'publish_down', 'publish_down',
				'published', 'published'
			);

		}

		parent::__construct($config);
    }

    protected function populateState($ordering = null, $direction = null) {
        $app = JFactory::getApplication();

        // Adjust the context to support modal layouts.
        if ($layout = $app->input->get('layout'))
        {
                $this->context .= '.' . $layout;
        }

        $search = $this->getUserStateFromRequest($this->context . '.filter.search', 'filter_search');
        $this->setState('filter.search', $search);

        $access = $this->getUserStateFromRequest($this->context . '.filter.access', 'filter_access');
        $this->setState('filter.access', $access);

        $published = $this->getUserStateFromRequest($this->context . '.filter.published', 'filter_published', '');
        $this->setState('filter.published', $published);

        // List state information.
        parent::populateState($ordering, $direction);
		
    }

    
    protected function getListQuery() {  
        $query = parent::getListQuery();
        $query->select("*");
        $query->from("#__ingredients_list");
        $published = $this->getState('filter.published');
        if (is_numeric($published)) {
            $query->where('published = ' . (int) $published);
        }
        $query->where("name like '" .  $this->getState('filter.search') . "%'");
        
        $orderCol = $this->state->get('list.ordering', 'id');
        $orderDirn = $this->state->get('list.direction', 'desc');
        $query->order($orderCol . ' ' . $orderDirn);
        return $query;
    }

    
}
