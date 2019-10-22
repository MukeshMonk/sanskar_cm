<?php
	$jsonclass = $app->load_module("Services_JSON");
	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);
    $course_id=$app->getPostVar("course_id");
    $class_id=$app->getPostVar("class_id");
	$sub_text='<option value="">Select Subject</option>';


			
			$obj_sub = $app->load_model("cm_subjects");
            $rs_sub = $obj_sub->execute("SELECT",false,"","course IN(".$course_id.") and sem IN(SELECT sem_id from cm_classes where id IN(".$class_id.")) and status!='2'");
           // echo "<pre>"; print_r($rs_sub); exit;
			foreach($rs_sub as $sub)
			{
				
				$sub_text.='<option value="'.$sub['id'].'">'.$sub['subject_name'].'('.$sub['course'].' '.$sub['sem'].')'.'</option>';
			}		
		
		echo $obj_JSON->encode(array("success"=>"0","sub_text"=>$sub_text,"sql"=>$obj_sub->sql));
	
?>