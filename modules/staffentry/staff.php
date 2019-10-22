<?php

if($this->app->getGetVar("record_id")!="")

{

	include('add.php');

}

else {

	include('list.php');

}



?>