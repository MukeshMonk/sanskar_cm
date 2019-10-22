<?php
if($this->app->getGetVar("record_id")!="")
{
	include('admissionconfirm.php');
}
else {
	
	include('admissionlist.php');
}

?>