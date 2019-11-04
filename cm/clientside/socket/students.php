<?php 

	$jsonclass = $app->load_module("Services_JSON");

	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);

	$conn = mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);

	$page=$app->getPostVar('page');

	$method=$app->getPostVar('connector');

	$sb=$app->getPostVar('sb');

	$sbv=$app->getPostVar('sbv');

	$sort_field=$app->getPostVar('sort_field');

	$sort_field_value=$app->getPostVar('sort_field_value');
	
	$acd_year_sel=$app->getPostVar('acd_year_sel');
	$class_sel=$app->getPostVar('class_sel');
	$name_sel=$app->getPostVar('name_sel');
	$city_sel=$app->getPostVar('city_sel');
	$idnum_sel=$app->getPostVar('idnum_sel');
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
	if($idnum_sel!="")
	{
		$fiter_condition.=" and student.id_no='".$idnum_sel."'";
		//$fiter_condition2=" where merit_master.total_merit='".$total_merit."'";
	}
	

	

	if($sort_field!="" && $sort_field_value!="")

	{

		$ord_cond=" order by ". $sort_field." ".$sort_field_value;

	}

	else

	{

		$ord_cond=" order by student.id DESC";

	}

	

	if($sb!="" && $sbv!="")

	{

		$cond=' and student.'.$sb.' like "%'.$sbv.'%"';

	}

	else

	{

		$cond='';

	}



	$ipp=10;

	

	// $sql="SELECT `student`.*,cm_religions.name as religion_name,cm_semesters.name as sem_name,cm_course.course_name FROM `student` 

		  // LEFT JOIN  cm_religions ON cm_religions.id = student.religion

		  // LEFT JOIN  cm_semesters ON cm_semesters.id = student.sem

		  // LEFT JOIN  cm_course ON cm_course.id = student.branch				

		  // WHERE student.id!=0 and student.status!=2".$cond.$ord_cond;

	

	$cond.=$fiter_condition;

	$sql="SELECT `student`.*,cm_religions.name as religion_name,cm_semesters.name as sem_name,cm_course.course_name FROM `student` 

		  LEFT JOIN  cm_religions ON cm_religions.id = student.religion

		  LEFT JOIN  cm_semesters ON cm_semesters.id = student.sem

		  LEFT JOIN  cm_course ON cm_course.id = student.branch				

		  WHERE student.id!=0 and student.status='Active'".$cond.$ord_cond;

	$obj_page = $app->load_module("PS_Pagination");

	$pager=$obj_page->PS_Pagination( $conn, $sql, 10, 4, null,$page ,$method);

	$rs = $obj_page->paginate(); 

	//get retrieved rows to check if

	//there are retrieved data

	

	

	

	$num = mysql_num_rows( $rs );

	

	if($num >= 1 ){     

	//creating our table header

	

	$html='';

	if($page==1)

	{

	$i=1;

	}

	else

	{

	$i=($ipp*($page-1))+1;	

	}

	//looping through the records retrieved

	

	while($row = mysql_fetch_assoc( $rs ))

	{	

		

		$sr=$i;

		$id=$row['id'];

		$id_enc=$app->cmx->encrypt($row['id'],ency_key);

		

		$fullname= ucwords($row['first_name'].' '.$row['middle_name'].' '.$row['last_name']);

		$name=$row['name'];

		$gender=$row['gender'];

		$category=$row['category'];

		$blood_group=$row['blood_group'];

		$religion=$row['religion'];

		$cast=$row['cast'];

		$course=$row['branch'];

		$sem=$row['sem_name'];

		$id_no=$row['id_no'];

		$division=$row['division'];		

		$birth_place=$row['birth_place'];

		$email=$row['email'];

		$password=$row['password'];

		$address=$row['address'];

		$city=($row['city']!=''?$row['city']:$row['cm_permenent_city']);

		$taluka=$row['taluka'];

		$district=$row['district'];

		$pin_code=$row['pin_code'];

		$parents_office_no=$row['parents_office_no'];

		$parents_residence_no=$row['parents_residence_no'];

		$parents_mobile_no=$row['parents_mobile_no'];

		$student_mobile_no=$row['student_mobile_no'];

		$fee_status=$row['fee_status'];

		$fee_amount=$row['fee_amount'];		

		$fee_late_charge=$row['fee_late_charge'];

		$transaction_id=$row['transaction_id'];		

		$payment_status=$row['payment_status'];			

		$dob=date('d-m-Y',$row['dob']);		

		$fee_last_date=date('d-m-Y',$row['fee_last_date']);

		$transaction_date=date('d-m-Y',$row['transaction_date']);

		

		

		$status=$row['status'];

		

		if($status==0)

		{

			$status_btn='<button type="button" class="btn btn-xs btn-success">Active</button>';

		}

		else

		{

			$status_btn='<button type="button" class="btn btn-xs btn-default">Inactive</button>';

		}

		

		$last_updated=$row['last_updated'];

		$lastupdated=$last_updated==0?date('d-m-Y',$row['added_on']):date('d-m-Y',$row['last_updated']);



				

		

		

		$action='<div class="btn-group">

                                        <button type="button" class="btn btn-xs btn-primary">Action</button>

                                        <button type="button" class="btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">

                                          <span class="caret"></span>

                                          <span class="sr-only">Toggle Dropdown</span>

                                        </button>

                                        <ul class="dropdown-menu pull-right" role="menu">

                                        <li><a href="'.CMX_ROOT.'/studententry/students/add/edit/'.$id_enc.'/"  

										><i class="glyphicon glyphicon-edit"></i> Edit</a></li>

                                          <li><a href="javascript:void(0);"  onclick="javascript:confrim_del_ajax({\'ac_id\':\''.$id_enc.'\', \'connector\':\'delete_students\'})"><i class="glyphicon glyphicon-trash"></i> Delete</a></li>

                                        </ul>

                                      </div>';

		$html.="<tr>";
$html.=" <td><label class=\"custom-checkbox-item\">";
        $html.=" <input class=\"custom-checkbox bulk-checkbox delAll\" name=\"del[]\" type=\"checkbox\" data-stat=\"".$stat."\" name=\"inv_select\" value=\"".$id_enc."\">";
        $html.="<span class=\"custom-checkbox-mark\"></span></label></td>";
		$html.="<td>{$sr}</td>";
        $html.='<td><a href="javascript:void(0);" onclick="javascript:open_student(\''.$id_enc.'\')">'.$name.'</a></td>';
		$html.="<td>{$id_no}</td>";
        $html.="<td>{$gender}</td>";
        $html.="<td>{$sem}</td>";
        $html.="<td>{$course}</td>";
		 $html.="<td>{$city}</td>";
        $html.="<td>{$status_btn}</td>";
		$html.="<td>{$action}</td>";
		$html.="</tr>";
	$i++;	

	}       

			$counter=$obj_page->pagination_counters();

			$total_pages=$counter['total_pages'];

			$current_page=$counter['current_page'];

			$page_counter='Showing '.$current_page.' of '.$total_pages;





	

}else{

	//if no records found

	$html="<td colspan=\"9\" style=\"padding:15px 30px\">No records found!</td>";

	$page_counter='';

}

//page-nav class to control

//the appearance of our page 

//number navigation

$pagination.= "<div class='page-nav'>";

//display our page number navigation

$pagination.= $obj_page->renderFullNav();

$pagination.= "</div>";



	

echo $obj_JSON->encode(array("RESULT"=>"OK", "HTML"=>$html,"pagi_btn"=>$pagination,'page_counter'=>$page_counter,"qry"=>$sql));					

	

?>