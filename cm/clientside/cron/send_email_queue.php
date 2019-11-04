<?php
	define("VIR_DIR","scripts/cron/");
	require("../../core/app.php");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	
	$app = & app::get_instance();
	$app->initialize();
	

	$obj_gqueue = $app->load_model("genemail_queue");
	$obj_gqueue->join_table("genmail_body","left",array('subject','body'),array("gen_id"=>"id"));
	$sql_where_clause= "genemail_queue.mail_status='Pending'";
	$rs_q = $obj_gqueue->execute("SELECT", false, "", $sql_where_clause, "genemail_queue.id ASC LIMIT 50");
	
	$melements=$app->utility->mail_elements();
	$mail_head=	$melements['header'];
	$mail_footer=	$melements['footer'];
	
	for($i=0; $i<count($rs_q); $i++){
		$row=$rs_q[$i];
		
		$mail_type='gen';
		
		$id=$row['id'];
		$receiveremail=$row['email'];
		$mail_subject=stripslashes($row['genmail_body_subject']);
		$body=stripslashes($row['genmail_body_body']);
		
		$message_body=$mail_head.$body.$mail_footer;
		
		
		$headers  = "From: Xclusive match <info@xclusivematch.com>\r\n";
		$headers .= "Content-type: text/html\r\n";
		$headers.="<img src=\"https://www.xclusivematch.com/clientside/system/update_mail_status.php?mail_type=".$mtype."&id=".$id."\" width=\"1\" height=\"1\" />";
		
		
		$flag=mail($receiveremail,$mail_subject,$message_body,$headers);
		if($flag){
			$obj_model_mq = $app->load_model("genemail_queue");
			$where_clause= "genemail_queue.id='".$id."'";
			$edit_field['mail_status']="Sent";
			$edit_field['sent_on']=time();
			$obj_model_mq->map_fields($edit_field);
			$rs = $obj_model_mq->execute("UPDATE", false, "", $where_clause);
		}else{
			$obj_model_mq = $app->load_model("genemail_queue");
			$where_clause= "genemail_queue.id='".$id."'";
			$edit_field['mail_status']="Failed";
			$edit_field['sent_on']=time();
			$obj_model_mq->map_fields($edit_field);
			$rs = $obj_model_mq->execute("UPDATE", false, "", $where_clause);
		}
	}
	
	//user_mailview
	$obj_sm = $app->load_model("sent_match");
	$rs_q = $obj_sm->execute("SELECT", false, "SELECT sent_match.* ,
group_concat(sent_match.match_id) as mids,group_concat(sent_match.id) as ids,
user.email as user_email ,user.id as user_id from sent_match left join user
on sent_match.user_id=user.id and sent_match.msent='0' group by sent_match.user_id having msent=0 order by sent_match.id ASC  limit 0,50");
	
	for($i=0; $i<count($rs_q); $i++)
	{
		$row=$rs_q[$i];
		$mail_type='match';
		$id=$row['id'];
		$receiveremail=$row['user_email'];
		
		$mids=$row['mids'];
		
		$marr=explode(',',$mids);
		$user_block='';
		if(count($marr)>0)
		{
			if(count($marr)>4)
			{
				for($i=0;$i<4;$i++)
				{
					$user_block.=$app->utility->user_mailview($marr[$i]);
				}
				$more=$marr-4;
				$more_url=SERVER_ROOT.'/user/matches.html';
				$user_block.='<a href="'.$more_url.'" style="color:#00bcd5;text-decoration:none;outline:none" target="_blank" ><span>'.$more.'</span> more matches</a>';
			}
			else
			{
				for($i=0;$i<count($marr);$i++)
				{
					$user_block.=$app->utility->user_mailview($marr[$i]);
				}
			}
			
		}
		
		
		$mail_subject='New Matches Sent For You By Your Matchmaker - Xclusive match';
		
		$user_name=$app->utility->user_info($row['user_id']);
		
		$body='<h2>Hi '.$user_name[0]['first_name'].', here are your Recommended Matches for today</h2>';
		$body.=$user_block;
		
		$message_body=$mail_head.$body.$mail_footer;
		
		
		$headers  = "From: Xclusive match <info@xclusivematch.com>\r\n";
		$headers .= "Content-type: text/html\r\n";
		//$headers.="<img src=\"https://www.xclusivematch.com/clientside/system/update_mail_status.php?mail_type=".$mtype."&id=".$id."\" width=\"1\" height=\"1\" />";
		
		
		$flag=mail($receiveremail,$mail_subject,$message_body,$headers);
		if($flag){
			$ids=$row['ids'];
			$id_arr=explode(',',$ids);
			
			foreach($id_arr as $ar)
			{
			$obj_model_mq = $app->load_model("sent_match");
			$where_clause= "sent_match.id='".$ar."'";
			$edit_field['msent']="1";
			$edit_field['mail_status']="Sent";
			$obj_model_mq->map_fields($edit_field);
			$rs = $obj_model_mq->execute("UPDATE", false, "", $where_clause);
			}
			
			
		
		}else{
			$ids=$row['ids'];
			$id_arr=explode(',',$ids);
			foreach($id_arr as $ar)
			{
			$obj_model_mq = $app->load_model("sent_match");
			$where_clause= "sent_match.id='".$ar."'";
			$edit_field['msent']="1";
			$edit_field['mail_status']="Failed";
			$obj_model_mq->map_fields($edit_field);
			$rs = $obj_model_mq->execute("UPDATE", false, "", $where_clause);
			}
		}
		
	}
	
?>