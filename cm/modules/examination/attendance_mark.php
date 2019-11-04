<?php
if($this->app->getGetVar("record_id")!="")
{
	
	include('addAttendanceMark.php');
}
else {
	
	include('attendance_mark_list.php');
}

?>