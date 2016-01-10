<?php

defined('_JEXEC') or die('Restricted access');
?>
<h1><?php echo $this->msg; ?></h1>
<?php
echo "Name: ".$this->getName()."<br />";
echo "View: ".$this->get("view")."<br />";
echo "Form: ".$this->getForm()."<br />";
echo "Layout: ".$this->getLayout()."<br />";
echo "LayoutTemplate: ".$this->getLayoutTemplate()."<br />";
echo "Model: ".$this->getModel()."<br />";
