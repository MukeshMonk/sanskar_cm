<?php
	define("VIR_DIR","scripts/cron/");
	require("../../core/app.php");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	
	$app = & app::get_instance();
	$app->initialize();
	
$star_date="01-08-2016";

$obj_client = $app->load_model("client");
$rs_q = $obj_client->execute("SELECT", false, "","mailing='Enable'", "id ASC LIMIT 50");

$curr_day=date("d");
$curr_day=intval($curr_day);




$curr_month=date("m");
$curr_month=intval($curr_month);
$curr_year=date("Y");
$curr_year=intval($curr_year);

$curr_year=date("Y");

foreach($rs_q as $client)
{
	$type="Payment";
	$client_id=$client['id'];
	
	
	//After Due Date Check
	$d=$curr_day;
	$m=$curr_month;	
	$mail2=$app->utility->client_services_mailing_after_due($type,$client_id,$d,$m);
	
	
	
	
	//Day 3 Mail
	$d3=$curr_day+3;
	
	$m3=$curr_month;	
	$mail3=$app->utility->client_services_mailing($type,$client_id,3,$d3,$m3);
	
	$d2=$curr_day+1;
	$m2=$curr_month;	
	$mail2=$app->utility->client_services_mailing($type,$client_id,2,$d2,$m2);
	
	$d=$curr_day;
	$m=$curr_month;	
	$mail2=$app->utility->client_services_mailing_due($type,$client_id,$d,$m);
	
	
	
	//After Due Date Check
	
	$d=$curr_day;
	$m=$curr_month;	
	$mail2=$app->utility->client_services_mailing_after_hold($type,$client_id,$d,$m);
	
	
	$type2="Return";
	//Day 3 Mail
	$d3=$curr_day+3;
	$m3=$curr_month;	
	$mail3=$app->utility->client_services_mailing($type,$client_id,3,$d3,$m3);
	
	$d2=$curr_day+1;
	$m2=$curr_month;	
	$mail2=$app->utility->client_services_mailing($type2,$client_id,2,$d2,$m2);
	
	$d=$curr_day;
	$m=$curr_month;	
	$mail2=$app->utility->client_services_mailing_due($type2,$client_id,$d,$m);
	
	//After Due Date Check
	$d=$curr_day;
	$m=$curr_month;	
	$mail2=$app->utility->client_services_mailing_after_due($type2,$client_id,$d,$m);
	
	//After Due Date Check
	$d=$curr_day;
	$m=$curr_month;	
	$mail2=$app->utility->client_services_mailing_after_hold($type2,$client_id,$d,$m);
	
	
	
	
	

	
}





?>