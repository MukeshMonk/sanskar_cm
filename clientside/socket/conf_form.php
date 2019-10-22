<?php 

	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$status=$app->getPostVar("status");
	$record_id=$app->getPostVar("record_id");
	$mm_id=$app->getPostVar("mm_id");
	$mm_id_decy=$app->cmx->decrypt($mm_id,ency_key);
	$record_id_decy=$app->cmx->decrypt($record_id,ency_key);
	$data = array();
	$item_id=$app->getPostVar("update_id");
	$updated_id=$app->cmx->decrypt($item_id,ency_key);
		if($item_id=="")
		{
			$sql_ml="SELECT * from cm_register where id = '".$record_id_decy."'";
			$obj_ml  = $app->load_model("cm_register");
			$rs_ml = $obj_ml->execute("SELECT",false,$sql_ml);
			if(($app->getPostVar('status')=='Admission Granted' && $rs_ml[0]['status']=='Registration Done - Fees Paid') || $app->getPostVar('status')=='Admission Rejected')
			{
			$obj_mlnew  = $app->load_model("cm_meritlist");
			$obj_mlnew->join_table("merit_master","left",array("id","init_no","total_merit"),array("merit_master"=>"id"));
			$rs_obj_mlnew = $obj_mlnew->execute("SELECT",false,"","cm_meritlist.reg_no='".$record_id_decy."'","cm_meritlist.id DESC");
					$res_admission = 'false';
					if($app->getPostVar('status')=='Admission Granted')
					{
						$res_admission = $app->cmx->checkadmission($rs_obj_mlnew[0]['merit_master_init_no'],$app->getPostVar('quota')); 
					}
					if(($app->getPostVar('status')=='Admission Granted' && $res_admission=='true') || $app->getPostVar('status')=='Admission Rejected')
					{
					$data["class_no"] = $rs_ml[0]['enq_class'];
					$data["reg_id"] = $rs_ml[0]['id'];
					$data["merit_master_id"] = $rs_obj_mlnew[0]['merit_master_id'];
					$data["merit_master_no"] = $rs_obj_mlnew[0]['merit_master_total_merit'];
					$data["init_no"] = $rs_obj_mlnew[0]['merit_master_init_no'];
					$data["acd_year"] = $rs_ml[0]['cm_academic_year'];
					$data['added_on'] = time();
					$data['added_by'] = $_SESSION['StaffID'];			
					$obj_model_log = $app->load_model("cm_confirmation");
					$obj_model_log->map_fields($data); 
					$lastid=$obj_model_log->execute("INSERT");
					if($app->getPostVar('status')=='Admission Granted')
					{
						$update_field_cnf_no = "CNF" . date('y').date('y', strtotime('+1 year')) . "-" . $lastid;
						$obj_model_log  = $app->load_model("cm_confirmation", $lastid);
						$obj_model_log->execute("UPDATE",false,"UPDATE cm_confirmation SET cnf_no='".$update_field_cnf_no."' WHERE id='".$lastid."'");
						$student_id = $app->cmx->addStudenEntry($lastid); 
						$msg="Admission Granted.";
					}
					else
					{
						$update_field_cnf_no = "CAN" . date('y').date('y', strtotime('+1 year')) . "-" . $lastid;
						$obj_model_log  = $app->load_model("cm_confirmation", $lastid);
						$obj_model_log->execute("UPDATE",false,"UPDATE cm_confirmation SET cnf_no='".$update_field_cnf_no."' WHERE id='".$lastid."'");
						$msg="Admission Rejected.";
					}
					
			/**/
				$obj_mlu  = $app->load_model("cm_meritlist", $record_id_decy);
				$obj_mlu->execute("UPDATE",false,"UPDATE cm_meritlist SET status='".$app->getPostVar('status')."' WHERE reg_no='".$record_id_decy."'");
				$obj_reg  = $app->load_model("cm_register",$record_id_decy);
				$obj_reg->execute("UPDATE",false,"UPDATE cm_register SET status='".$app->getPostVar('status')."' WHERE id='".$record_id_decy."'");
				if($rs_ml[0]['enq_no']!='')
				{
						$obj_model_enq = $app->load_model("cm_enquiries",$rs_ml[0]['enq_no']);
						$obj_model_enq->execute("UPDATE",false,"UPDATE cm_enquiries SET status='".$app->getPostVar('status')."' WHERE id='".$rs_ml[0]['enq_no']."'");
				}
				$app->utility->set_message($msg,"SUCCESS");	
		 	echo $obj_JSON->encode(array("RESULT"=>"SUCCESS","MSG"=>$msg,"retriver"=>"confirm","URL"=>CMX_ROOT.'/admissionentry/confirm/'));
					}
					else
					{
						$app->utility->set_message("Admission Not available in this Quota","ERROR");	
				 		echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Admission Not available in this Quota"));
					}
			}
			else
			 {
				 $app->utility->set_message("Feed Pending","ERROR");	
				 echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Feed Pending"));	
			 }	
		}
		else
		{
			$obj_conf  = $app->load_model("cm_confirmation", $updated_id);
			$rs_conf = $obj_conf->execute("SELECT");
			$res_admission = 'false';
			if($app->getPostVar('status')=='Admission Granted' && $rs_conf[0]['status']!='Admission Granted')
			{
				$res_admission = $app->cmx->checkadmission($rs_conf[0]['init_no'],$app->getPostVar('quota'));
			}
			elseif($app->getPostVar('status')=='Admission Granted' && $rs_conf[0]['status']=='Admission Granted' && $app->getPostVar('quota')!=$rs_conf[0]['quota']) 
			{
				$res_admission = $app->cmx->checkadmission($rs_conf[0]['init_no'],$app->getPostVar('quota'));
			}
			
			if($app->getPostVar('status')=='Admission Granted' && $res_admission=='true')
			{
				$data['last_updated'] = time();	
				$data['updated_by'] = $_SESSION['StaffID'];	
				$data['cnf_no'] = "CNF" . date('y').date('y', strtotime('+1 year')) . "-" . $updated_id;						
				$obj_model_log = $app->load_model("cm_confirmation",$updated_id);
				$obj_model_log->map_fields($data);
				$ins=$obj_model_log->execute("UPDATE");
				$msg="Updated:: Admission Granted";	
				$obj_mlu  = $app->load_model("cm_meritlist");
			$obj_mlu->execute("UPDATE",false,"UPDATE cm_meritlist SET status='".$app->getPostVar('status')."' WHERE reg_no='".$rs_conf[0]['reg_id']."'");
				
				$obj_reg  = $app->load_model("cm_register", $rs_conf[0]['reg_id']);
				$obj_reg->execute("UPDATE",false,"UPDATE cm_register SET status='".$app->getPostVar('status')."' WHERE id='".$rs_conf[0]['reg_id']."'");
				$rs_reg = $obj_reg->execute("SELECT");
				if($rs_reg[0]['enq_no']!='')
				{
						$obj_model_enq = $app->load_model("cm_enquiries",$rs_reg[0]['enq_no']);
						$obj_model_enq->execute("UPDATE",false,"UPDATE cm_enquiries SET status='".$app->getPostVar('status')."' WHERE id='".$rs_reg[0]['enq_no']."'");
				}
				$app->utility->set_message($msg,"SUCCESS");	
		 			echo $obj_JSON->encode(array("RESULT"=>"SUCCESS","MSG"=>$msg,"retriver"=>"confirm","URL"=>CMX_ROOT.'/admissionentry/confirm/'));	
			}
			elseif($app->getPostVar('status')=='Admission Rejected')
			{
				$data['last_updated'] = time();	
				$data['updated_by'] = $_SESSION['StaffID'];	
				if($app->getPostVar('status')=='Admission Granted' && $rs_conf[0]['status']=='Admission Granted' && $app->getPostVar('quota')==$rs_conf[0]['quota'])
				{
					$data['cnf_no'] = "CNF" . date('y').date('y', strtotime('+1 year')) . "-" . $updated_id;						
				}
				else
				{
					$data['cnf_no'] = "CAN" . date('y').date('y', strtotime('+1 year')) . "-" . $updated_id;
				}
				
				$obj_model_log = $app->load_model("cm_confirmation",$updated_id);
				$obj_model_log->map_fields($data);
				$ins=$obj_model_log->execute("UPDATE");
				$msg="Updated Successfully";
				$obj_mlu  = $app->load_model("cm_meritlist");
			$obj_mlu->execute("UPDATE",false,"UPDATE cm_meritlist SET status='".$app->getPostVar('status')."' WHERE reg_no='".$rs_conf[0]['reg_id']."'");
				
				$obj_reg  = $app->load_model("cm_register", $rs_conf[0]['reg_id']);
				$obj_reg->execute("UPDATE",false,"UPDATE cm_register SET status='".$app->getPostVar('status')."' WHERE id='".$rs_conf[0]['reg_id']."'");
				$rs_reg = $obj_reg->execute("SELECT");
				if($rs_reg[0]['enq_no']!='')
				{
						$obj_model_enq = $app->load_model("cm_enquiries",$rs_reg[0]['enq_no']);
						$obj_model_enq->execute("UPDATE",false,"UPDATE cm_enquiries SET status='".$app->getPostVar('status')."' WHERE id='".$rs_reg[0]['enq_no']."'");
				}	
				$app->utility->set_message($msg,"SUCCESS");	
		 		echo $obj_JSON->encode(array("RESULT"=>"SUCCESS","MSG"=>$msg,"retriver"=>"confirm","URL"=>CMX_ROOT.'/admissionentry/confirm/'));	
			}
			else
			{
				$app->utility->set_message("Admission Not available in this Quota","ERROR");	
				echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Admission Not available in this Quota"));
			}
		}	
?>