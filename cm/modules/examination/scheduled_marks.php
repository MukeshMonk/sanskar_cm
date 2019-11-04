<?php
if($this->app->getGetVar("record_id")!="")
{
	
	include('editScheduleMarks.php');
}
else {
	
	include('scheduleMarks_list.php');
}

?>