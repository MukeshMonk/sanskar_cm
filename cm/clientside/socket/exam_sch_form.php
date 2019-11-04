<?php 

	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
	$a_year=$app->getPostVar("a_year");
	$branch=$app->getPostVar("branch");
	$sem=$app->getPostVar("sem");
	$div1=$app->getPostVar("div1");
	$sub=$app->getPostVar("sub");
	$counting_formula=$app->getPostVar("counting_formula");
	$trm=$app->getPostVar("trm");
	$a_name=$app->getPostVar("a_name");
	$m_marks=$app->getPostVar("m_marks");
	$a_date=$app->getPostVar("a_date");
	$m_s_date=$app->getPostVar("m_s_date");
	$record_id=$app->getPostVar("record_id");
	$exam_sub = $app->getPostVar("sub_exam");
	//echo '<pre>'.print_r($app->getPostVars(),true).'</pre>'; exit;
	
	  if($a_year!= "")
	  {
		if($record_id=="")
		{
			$update_field=array();
			$update_field['acd_year_id'] = $a_year;
			$update_field['cource_id'] =$branch;
			$update_field['sem_id'] =$sem;
			$update_field['div_id'] = implode(",",$div1);
			$update_field['term_id'] = $trm;
			$update_field['sub_id'] = $sub;
			$update_field['act_name'] = strtoupper($a_name);
			$update_field['max_mark'] = $m_marks;
			$update_field['act_date'] = $a_date;
			$update_field['m_sub_date'] = $m_s_date;
			$update_field['added_on'] = time();
			
			$obj_model_log = $app->load_model("exam_schedule");
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("INSERT");
			if($ins>0){
				 if(count($exam_sub)>0){
					 foreach($exam_sub as $ex_sub){
						 if($ex_sub['sub'] !=''){
							$update_field=array();
							$update_field['exam_id'] = $ins;
							$update_field['sub_id'] = $ex_sub['sub'];
							$update_field['exam_date'] = $ex_sub['exam_date'];
							$update_field['m_sub_date'] = $ex_sub['ms_date'];		
							$update_field['added_on'] = time();
							$update_field['added_by'] = $_SESSION['StaffID'];			
							$obj_model_log = $app->load_model("cm_exam_subjects");
							$obj_model_log->map_fields($update_field);
							$obj_model_log->execute("INSERT");
						 }
						
					 }
				 }
				
			}

			
			$msg="Admission Enquiries Added Successfully.";
		}
		else
		{
		    $record_id=$app->cmx->decrypt($record_id,ency_key);
			$update_field=array();
			$update_field['acd_year_id'] = $a_year;
			$update_field['cource_id'] =$branch;
			$update_field['sem_id'] =$sem;
			$update_field['div_id'] = implode(",",$div1);
			$update_field['term_id'] = $trm;
			$update_field['sub_id'] = $sub;
			$update_field['act_name'] = strtoupper($a_name);
			$update_field['max_mark'] = $m_marks;
			$update_field['act_date'] = $a_date;
			$update_field['m_sub_date'] = $m_s_date;
			$update_field['last_updated'] = time();
			$obj_model_log = $app->load_model("exam_schedule",$record_id);
			
			$obj_model_log->map_fields($update_field);
			$ins=$obj_model_log->execute("UPDATE");

			if($record_id>0){
				if(count($exam_sub)>0){
					foreach($exam_sub as $ex_sub){

						if($ex_sub['es_id']!=''){
							$update_field=array();
							
							$update_field['last_updated'] = time();
							$update_field['added_by'] = $_SESSION['StaffID'];
							if($ex_sub['act_sub_id']!="" && $ex_sub['sub']==""){
								$update_field['status'] =2;
							}
							else{
								$update_field['exam_date'] = $ex_sub['exam_date'];
								$update_field['m_sub_date'] = $ex_sub['ms_date'];
								$update_field['status'] =1;
	
							}
							$obj_model_log = $app->load_model("cm_exam_subjects",$ex_sub['es_id']);
							$obj_model_log->map_fields($update_field);
							$obj_model_log->execute("UPDATE");   

						   } else{
							if($ex_sub['sub'] !=''){
								$update_field=array();
								$update_field['exam_id'] = $record_id;
								$update_field['sub_id'] = $ex_sub['sub'];
								$update_field['exam_date'] = $ex_sub['exam_date'];
								$update_field['m_sub_date'] = $ex_sub['ms_date'];		
								$update_field['added_on'] = time();
								$update_field['added_by'] = $_SESSION['StaffID'];			
								$obj_model_log = $app->load_model("cm_exam_subjects");
								$obj_model_log->map_fields($update_field);
								$obj_model_log->execute("INSERT");
							}
						   }	


					   
					}
				}
			   
		   }


			
			$msg="Admission Enquiries Updated Successfully.";
			
		}
		
		 echo $obj_JSON->encode(array("RESULT"=>"SUCCESS","MSG"=>$msg,"retriver"=>"exam_sch"));			 	


	 }
	 else
	 {
		 echo $obj_JSON->encode(array("RESULT"=>"ERROR","MSG"=>"Please Fill All Required Fields"));	
	 }

	

?>