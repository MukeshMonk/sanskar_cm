<?php
	define("VIR_DIR","scripts/cron/");
	require("../../core/app.php");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	
	$app = & app::get_instance();
	$app->initialize();
	
	$obj_model_sent_emails_to = $app->load_model("sent_emails_to");
	$obj_model_sent_emails_to->join_table("sent_emails","left",array('title','mail_body'),array("sent_emails_id"=>"id"));
	$sql_where_clause= "sent_emails_to.status='Pending'";
	$rs_user = $obj_model_sent_emails_to->execute("SELECT", false, "", $sql_where_clause, "sent_emails_to.id ASC LIMIT 50");
	for($i=0; $i<count($rs_user); $i++){
		$id=$rs_user[$i]['id'];
		$receiveremail=$rs_user[$i]['sent_to'];
		$mail_subject=stripslashes($rs_user[$i]['sent_emails_title']);
		$body=stripslashes($rs_user[$i]['sent_emails_mail_body']);
		$message_body=str_replace("{name}",stripslashes($rs_user[$i]['name']),$body);
		$headers  = "From: Realxpress <greetings@realxpress.in>\r\n";
		$headers .= "Content-type: text/html\r\n";
		$headers.="<img src=\"http://www.thedezineindia.com/crm/scripts/system/update_mail_status.php?id=".$id."\" width=\"1\" height=\"1\" />";
		$flag=mail($receiveremail,$mail_subject,$message_body,$headers);
		if($flag){
			$obj_model_sent_emails_to = $app->load_model("sent_emails_to");
			$where_clause= "sent_emails_to.id='".$id."'";
			$edit_field['status']="Delivered";
			$obj_model_sent_emails_to->map_fields($edit_field);
			$rs = $obj_model_sent_emails_to->execute("UPDATE", false, "", $where_clause);
		}else{
			$obj_model_sent_emails_to = $app->load_model("sent_emails_to");
			$where_clause= "sent_emails_to.id='".$id."'";
			$edit_field['status']="Failed";
			$obj_model_sent_emails_to->map_fields($edit_field);
			$rs = $obj_model_sent_emails_to->execute("UPDATE", false, "", $where_clause);
		}
	}
?>