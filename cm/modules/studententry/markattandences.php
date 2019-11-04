<?php 

$action=$this->app->getGetVar("action");
	$subaction=$this->app->getGetVar("subaction");
if($this->app->getGetVar("subaction")!="")
{
	
	include($action.'/'.$subaction.'.php');
}
else
{
		
	include($action.'/list.php');
}
?>

