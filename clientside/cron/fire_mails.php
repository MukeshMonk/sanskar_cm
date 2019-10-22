<?php
	define("VIR_DIR","scripts/cron/");
	require("../../core/app.php");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	
	$app = & app::get_instance();
	$app->initialize();
	
	$obj_gqueue = $app->load_model("mail_queue");
	$rs_q = $obj_gqueue->execute("SELECT", false, "","mail_status='Pending'", "mail_queue.id ASC LIMIT 20");
	
	$melements=$app->utility->mail_elements();

	$mail_head=	$melements['header'];
	$mail_footer=	$melements['footer'];

	
for($i=0; $i<count($rs_q); $i++)
{
		
$row=$rs_q[$i];
$id=$row['id'];
$primary_email=$row['primary_email'];
//$primary_email="k.vasudeva@trueandfair.co.in";
$cc_email=$row['cc_email'];
$bcc_email=$row['bcc_email'];


$mail_type=$row['mail_type'];

if($mail_type=='gen')
{
	
	$subject_str=$row['mail_subject'];
	$body_str=$row['mail_body'];
	
	$service_id=$row['service_id'];
	$client_id=$row['client_id'];
	
	$month=$row['month'];
 	$monthName = date("F", mktime(0, 0, 0, $month, 10));
	$month_prev=$row['month']-1;
 	$monthprevName = date("F", mktime(0, 0, 0, $month_prev, 10));
 	$day=str_pad($row['day'],2,'0',STR_PAD_LEFT);
	$duedate=$day.'-'.$month.'-'.date('Y');
	
	$monthpad=str_pad($row['month'],2,'0',STR_PAD_LEFT);
	
	$duedate=$day.'-'.$monthpad.'-'.date('Y');
	
	
	$dura_tion=$monthprevName;
	$holdduration="";
	$holdreason="";
	$closedate="";
	$close_attributes="";
}
elseif($mail_type=='due')
{
	
	$subject_str=$row['mail_subject'];
	$body_str=$row['mail_body'];
	$service_id=$row['service_id'];
	$client_id=$row['client_id'];
	$month=$row['month'];
	
 	$monthName = date("F", mktime(0, 0, 0, $month, 10));
	
	$month_prev=$row['month']-1;
 	$monthprevName = date("F", mktime(0, 0, 0, $month_prev, 10));
	
 	$day=str_pad($row['day'],2,'0',STR_PAD_LEFT);
	
	$monthpad=str_pad($row['month'],2,'0',STR_PAD_LEFT);
	$duedate=$day.'-'.$monthpad.'-'.date('Y');
	
	$dura_tion=$monthprevName;
	
	$holdduration="";
	$holdreason="";
	$closedate="";
	$close_attributes="";
}
elseif($mail_type=='after_due')
{
	$subject_str=$row['mail_subject'];
	$body_str=$row['mail_body'];
	
	$service_id=$row['service_id'];
	$client_id=$row['client_id'];
	
	$month=$row['month'];
 	$monthName = date("F", mktime(0, 0, 0, $month, 10));
	$month_prev=$row['month']-1;
 	$monthprevName = date("F", mktime(0, 0, 0, $month_prev, 10));
 	$day=str_pad($row['day'],2,'0',STR_PAD_LEFT);
	
	$monthpad=str_pad($row['month'],2,'0',STR_PAD_LEFT);
	$duedate=$day.'-'.$monthpad.'-'.date('Y');
	
	$dura_tion=$monthprevName;
	$holdduration="";
	$holdreason="";
	$closedate="";
	$close_attributes="";
}
elseif($mail_type=='hold')
{
	$subject_str=$row['mail_subject'];
	$body_str=$row['mail_body'];
	
	$service_id=$row['service_id'];
	$client_id=$row['client_id'];
	
	$month=$row['month'];
 	$monthName = date("F", mktime(0, 0, 0, $month, 10));
	$month_prev=$row['month']-1;
 	$monthprevName = date("F", mktime(0, 0, 0, $month_prev, 10));
 	$day=str_pad($row['day'],2,'0',STR_PAD_LEFT);
	$duedate="";
	$dura_tion="";
	
$hold_data=$app->utility->check_service_hold($client_id,$service_id,$row['day'],$row['month'],date('Y'));
	
	if(count($hold_data)>0)
	{
		$holdduration=date('d-m-Y',$hold_data[0]['hold_date']);
		$holdreason=$hold_data[0]['val'];
	
		$holdmonth_prev=$hold_data[0]["for_month"]-1;
 		$holdmonthprevName = date("F", mktime(0, 0, 0, $holdmonth_prev, 10));
		
		$holdduration=$holdmonthprevName;
	}
	else
	{
		$holdduration="";
		$holdreason="";
		$holdduration="";
	}
	
	
	$closedate="";
	$close_attributes="";
	
	
}
elseif($mail_type=='hold_release')
{
	$subject_str=$row['mail_subject'];
	$body_str=$row['mail_body'];
	
	$service_id=$row['service_id'];
	$client_id=$row['client_id'];
	
	$month=$row['month'];
 	$monthName = date("F", mktime(0, 0, 0, $month, 10));
	$month_prev=$row['month']-1;
 	$monthprevName = date("F", mktime(0, 0, 0, $month_prev, 10));
 	$day=str_pad($row['day'],2,'0',STR_PAD_LEFT);
	$duedate="";
	$dura_tion="";
	
$hold_data=$app->utility->check_service_hold($client_id,$service_id,$row['day'],$row['month'],date('Y'));
	
	if(count($hold_data)>0)
	{
		$holddate=date('d-m-Y',$hold_data[0]['hold_date']);
		$holdreason=$hold_data[0]['val'];
	
		$holdmonth_prev=$hold_data[0]["for_month"]-1;
 		$holdmonthprevName = date("F", mktime(0, 0, 0, $holdmonth_prev, 10));
		
		$holdduration=$holdmonthprevName;
	}
	else
	{
		$holddate="";
		$holdreason="";
		$holdduration="";
	}
	
	
	$closedate="";
	$close_attributes="";
	
	
}
elseif($mail_type=='close')
{
	
	$subject_str=$row['mail_subject'];
	$body_str=$row['mail_body'];
	
	$service_id=$row['service_id'];
	$client_id=$row['client_id'];
	
	$month=$row['month'];
 	$monthName = date("F", mktime(0, 0, 0, $month, 10));
	$month_prev=$row['month']-1;
 	$monthprevName = date("F", mktime(0, 0, 0, $month_prev, 10));
 	$day=str_pad($row['day'],2,'0',STR_PAD_LEFT);
	$duedate=$day.'-'.$month.'-'.date('Y');
	$dura_tion="";
	$holddate="";
	$holdreason="";
	$holdduration="";
	
$close_data=$app->utility->check_service_close($client_id,$service_id,$row['day'],$row['month'],date('Y'));
	
	if(count($close_data)>0)
	{
		$closedate=date('d-m-Y',$close_data[0]['added_on']);
		
		$all_fields=$app->utility->alldetail_service_close($client_id,$service_id,$row['month'],$row['day'],date('Y'));
		$close_attrs=array();
		
		foreach($all_fields as $f)
	    {
					$f_type=$f['type'];
					$f_val=$f['val'];
					if($f_type=='file')
					{
						$val='<a href="'.SERVER_ROOT.$app->get_user_config('client_files').$f_val.'" target="_blank">'.$f_val.'</a>';
					}
					else
					{
						$val=$f_val;
					}
					
				    if($f_type!="" && $f_val!="")
					{
						$close_attrs[]=$val;
					}
		}
		
		$close_attributes=$close_attrs;		
		
		
		
	}
	else
	{
		$closedate="";
		$close_attributes="";
	}
	
	
	
	$closedate="";
	$close_attributes="";
}



// parse_string($str,$service_id,$client_id,$duedate="",$dura_tion="",$holdduration="",$holddate="",$holdreason="",$closedate="",$close_attributes="")


$subject_text=$app->utility->parse_string($subject_str,$service_id,$client_id,$duedate,$dura_tion,$holdduration,$holddate,$holdreason,$closedate,$close_attributes);

$body_text=$app->utility->parse_string($body_str,$service_id,$client_id,$duedate,$dura_tion,$holdduration,$holddate,$holdreason,$closedate,$close_attributes);

		
$message_body=$mail_head.$body_text.$mail_footer;

$headers  = "From: True & Fair <info@trueandfair.co>\r\n";
$headers.= "Content-type: text/html\r\n";
if($cc_email!="")
{
$headers.= "CC :{$cc_email}\r\n" ; 
}
if($bcc_email!="")
{
$headers.= "BCC :{$bcc_email}\r\n";
}

//$headers.="<img src=\"http://trueandfair.co/clientside/system/update_mail_status.php?id=".$id."\"  />";

		
$flag=mail($primary_email,$subject_text,$message_body,$headers,'-finfo@trueandfair.co');

/**
$to  = $email;
$subject = 'MyDomain Activate Account';
$message .='<img src="http://mydomain.com/images/securedownload.jpg"/>';
$message = 'Welcome,<br/> '.$_POST['username'].'. You must activate your account via   this       message to log in. Click the following link to do so:   http://'.$domain.'/'.$activation;

$headers = 'From: Mydomain<'.$your_email.'@'.$domain.'>\r\n'; //MODIFY TO YOUR SETTINGS
$headers .=  "BCC: email@domain.com;\r\n"
$headers .= 'Content-type: text/html\r\n';
mail($to, $subject, $message,  $headers);

*/



		if($flag){
			$obj_model_mq = $app->load_model("mail_queue");
			$where_clause= "mail_queue.id='".$id."'";
			$edit_field['mail_status']="Sent";
			$edit_field['sent_on']=time();
			$obj_model_mq->map_fields($edit_field);
			$rs = $obj_model_mq->execute("UPDATE", false, "", $where_clause);
		}else{
			$obj_model_mq = $app->load_model("mail_queue");
			$where_clause= "mail_queue.id='".$id."'";
			$edit_field['mail_status']="Failed";
			$edit_field['sent_on']=time();
			$obj_model_mq->map_fields($edit_field);
			$rs = $obj_model_mq->execute("UPDATE", false, "", $where_clause);
		}
	}
	
	
	
?>