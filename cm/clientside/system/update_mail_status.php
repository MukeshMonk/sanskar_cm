<?
	define("VIR_DIR","scripts/system/");
	include("../../core/app.php");
	header("Expires: 0");
	header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	
	$app = & app::get_instance();
	$app->initialize();

			$obj_mq=$app->load_model('mail_queue');
			$rs_mail=$obj_mq->execute("SELECT",false,"","id=".$app->getGetVar('id'));
			
			if(count($rs_mail)>0)
			{
				$edit_field=array();
				if($rs_mail[0]['view_count']==0)
				{
					$edit_field['read_on']=time();
				}
			$edit_field['view_count']=$rs_mail[0]['view_count']+1;
			$edit_field['is_read']="Yes";
			$edit_field['last_read_on']=time();
			$obj_model_sent_emails_to->map_fields($edit_field);
			$rs_mail_queue=$obj_model_sent_emails_to->execute("UPDATE",false,"","id=".$app->getGetVar('id'));
	}
	
		


	$app->unload();
?>