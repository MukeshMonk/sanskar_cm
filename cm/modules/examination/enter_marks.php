<?php
if($this->app->getGetVar("record_id")!="")
{
	include('addMarks.php');
}
else {
	include('enter_marks_list.php');
}

?>