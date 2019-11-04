<?php 

	$jsonclass = $app->load_module("Services_JSON");



	$page=$app->getPostVar('page');

	$method=$app->getPostVar('method');

	$sb=$app->getPostVar('sb');

	$sbv=$app->getPostVar('sbv');

	$sort_field=$app->getPostVar('sort_field');

	$sort_field_value=$app->getPostVar('sort_field_value');
	$acd_year_sel=$app->getPostVar('acd_year_sel');
	$class_sel=$app->getPostVar('class_sel');
	$name_sel=$app->getPostVar('name_sel');
	$city_sel=$app->getPostVar('city_sel');
	$fiter_condition="";
	if($acd_year_sel!="")
	{
		$fiter_condition.=" and student.cm_academic_year='".$acd_year_sel."'";
	}
	if($class_sel!="")
	{
		$fiter_condition.=" and student.cm_class_id='".$class_sel."'";
	}
	if($name_sel!="")
	{
		$fiter_condition.=" and student.name like '%".$name_sel."%'";
	}
	if($city_sel!="")
	{
		$fiter_condition.=" and student.city='".$city_sel."'";
		//$fiter_condition2=" where merit_master.total_merit='".$total_merit."'";
	}
	

	if($sort_field!="" && $sort_field_value!="")

	{

		$ord_cond=" order by ". $sort_field." ".$sort_field_value;

	}

	else

	{

		$ord_cond='';

	}

	

	if($sb!="" && $sbv!="")

	{

		$cond=' and '.$sb.' like "%'.$sbv.'%"';

	}

	else

	{

		$cond='';

	}



	 $cond.=$fiter_condition;

	 $sql="SELECT `student`.*,cm_categories.name as cat_name,cm_religions.name as religion_name,

	 		cm_semesters.name as semester_name FROM `student`

	 	   LEFT JOIN cm_categories ON cm_categories.id = student.category	 

	 	   LEFT JOIN cm_religions ON cm_religions.id = student.religion

	 	   LEFT JOIN cm_semesters ON cm_semesters.id = student.sem	 

	 		 WHERE student.id!=0 and student.status!=2".$cond.$ord_cond;



	 $obj_model_hm = $app->load_model("student");

	 $result = $obj_model_hm->execute("SELECT",false,$sql);

	 

	 if(count($result)>0)

	 {

		 	$app->no_html=true;

			$obj_excel = $app->load_module("PHPExcel");

			//SETUP EXCEL HEADS

			$ExeclHeads=array("Sr.","Name","Mother Name","Gender",

			"Category","Blood Group","Religion","Cast","Branch","Sem","ID No","Division"

			,"Date of birth","Birth Place","Email","Permanent Address Line 1","Permanent Address Line 2","Permanent City","Permanent Taluka","Permanent District","Permanent Pin Code","Current Address Line 1","Current Address Line 2","Current City","Current Taluka","Current District","Current Pin Code","Parents Office No","Parents Residence No","Parents Mobile No","Student Mobile No","Fee Status","Fee Amount","Fee Last Date","Fee Late Charge","Transaction ID","Transaction Date","Payment Status"		

			,"Status","Added On","Last Updated");

			

			$i=0+1;

			$full_price_total=0;

			$nights_total=0;

			$nr_pax=0;

			foreach($result as $row)

			{

				$status=$row["status"];

				

				if($status==0)

				{

					$statustext='Active';

				}

				else

				{

					$statustext='Inactive';

				}

				

				if($row["last_updated"]>0)

				{

					$last_updated=date('d-m-Y',$row["last_updated"]);

				}

				else

				{

					$last_updated="";

				}

				$report_array[]=array(

						"sr"=>$i,

						"name"=>$row["name"],

						"mothername"=>$row["mothername"],

						"gender"=>$row["gender"],

						"cat_name"=>$row["cat_name"],

						"blood_group"=>$row["blood_group"],

						"religion_name"=>$row["religion_name"],

						"cast"=>$row["cast"],

						"course_name"=>$row["branch"],

						"semester_name"=>$row["semester_name"],

						"id_no"=>$row["id_no"],

						"division"=>$row["division"],

						"dob"=>$row["dob"],

						"birth_place"=>$row["birth_place"],

						"email"=>$row["email"],

						"address"=>$row["cm_permenent_address_line1"],
						"address2"=>$row["cm_permenent_address_line2"],

						"city"=>$row["cm_permenent_city"],

						"taluka"=>$row["cm_permenent_taluka"],

						"district"=>$row["cm_permenent_district"],

						"pin_code"=>$row["cm_permenent_zipcode"],
						"current_address"=>$row["cm_current_address_line1"],
						"current_address2"=>$row["cm_current_address_line2"],

						"current_city"=>$row["cm_current_city"],

						"current_taluka"=>$row["cm_current_taluka"],

						"current_district"=>$row["cm_current_district"],

						"current_pin_code"=>$row["cm_current_zipcode"], 

						"parents_office_no"=>$row["parents_office_no"],

						"parents_residence_no"=>$row["parents_residence_no"],

						"parents_mobile_no"=>$row["parents_mobile_no"],

						"student_mobile_no"=>$row["student_mobile_no"],

						"fee_status"=>$row["fee_status"],

						"fee_amount"=>$row["fee_amount"],

						"fee_last_date"=>$row["fee_last_date"],

						"fee_late_charge"=>$row["fee_late_charge"],

						"transaction_id"=>$row["transaction_id"],

						"transaction_date"=>$row["transaction_date"],

						"payment_status"=>$row["payment_status"],

						"status"=>$statustext,

						"added_on"=>date('d-m-Y',$row["added_on"]),

						"last_updated"=>$last_updated,

						);

			$i++;

			}

			

			$array_field=array();

			

	$data_array=$report_array;

	$fields=array("sr","name","mothername","gender"

	,"cat_name","blood_group","religion_name"

	,"cast","course_name","semester_name"

	,"id_no","division","dob"

	,"birth_place","email","address","address2"

	,"city","taluka","district"

	,"pin_code","current_address","current_address2"

	,"current_city","current_taluka","current_district"

	,"current_pin_code","parents_office_no","parents_residence_no"

	,"parents_mobile_no","student_mobile_no","fee_status"

	,"fee_amount","fee_last_date","fee_late_charge"

	,"transaction_id","transaction_date","payment_status","status","added_on","last_updated");

		

		$excel_postfix="student_".time();

		$filename="report_".$excel_postfix;

		

		$app->cmx->export_excel($ExeclHeads,$data_array,$fields,$filename,$array_field);

		

		$path=ABS_PATH.'/'.$app->get_user_config("table_backups").$filename.'.xls';

		

		$url=SERVER_ROOT.'/cm/download.php?f='.$path;

		

				echo $jsonclass->encode(array("RESULT"=>"OK","url"=>$url));			 	

			

			

			

	 }

	

	

	

	?>