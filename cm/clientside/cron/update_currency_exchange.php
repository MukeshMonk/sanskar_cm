<?php
	include("../../core/app.php");
	$app = &app::get_instance();
	$app->initialize();
	$obj_eExchangeRate = $app->load_module("eExchangeRate");
	$obj_eExchangeRate->api_key = "ggjZL-wRGQb-LBN4D";
	
	$currencies = array("USD", "GBP", "AUD", "EUR","CAD","CNY","DKK","ZAR","NZD");
	
	foreach($currencies as $currency){
		$obj_model_exchange_rate = $app->load_model("exchange_rate");
		$rate = $obj_eExchangeRate->get_conversion_rate("INR", $currency);	
		$obj_model_exchange_rate->map_fields(array("value"=>$rate));
		$obj_model_exchange_rate->execute("UPDATE", false, "", "currency='".$currency."'");
		sleep(5);
	}
	$app->unload();
?>