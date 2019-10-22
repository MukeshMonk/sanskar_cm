<?php
if($this->app->getGetVar("record_id")!="")
{
	
	include('editTermMarks.php');
}
else {
	
	include('termMarks_list.php');
}

?>