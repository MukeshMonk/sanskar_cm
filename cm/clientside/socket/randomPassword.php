<?php 
	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$password=$app->cmx->generateRandomString(6);
	echo $obj_JSON->encode(array("RESULT"=>"OK", "password"=>$password));					

	?>