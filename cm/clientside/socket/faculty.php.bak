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

	

	

	if($sort_field!="" && $sort_field_value!="")

	{

		$ord_cond=" order by ". $sort_field." ".$sort_field_value;

	}

	else

	{

		$ord_cond='  order by staff.id DESC ';

	}

	

	if($sb!="" && $sbv!="")

	{

		$cond=' and '.$sb.' like "%'.$sbv.'%"';

	}

	else

	{

		$cond='';

	}



	$ipp=10;

	

	//'$sql="SELECT staff.*,cm_course.course_name from staff LEFT JOIN cm_course ON  cm_course.id IN(staff.department) where staff.designation in (select id from cm_designations  where staff_type='Faculty') and staff.id!=0".$cond.$ord_cond;
	

	$sql="SELECT staff.*  from staff where staff.designation in (select id from cm_designations  where staff_type='Faculty') and staff.id!=0" .$cond.$ord_cond;
	
	// echo $sql;exit;

	/*$sql="SELECT `student`.*,cm_religions.name as religion_name,cm_semesters.name as sem_name,cm_course.course_name FROM `student` 

		  LEFT JOIN  cm_religions ON cm_religions.id = student.religion

		  LEFT JOIN  cm_semesters ON cm_semesters.id = student.sem

		  LEFT JOIN  cm_course ON cm_course.id = student.branch				

		  WHERE student.id!=0 and student.status!=2".$cond.$ord_cond; */

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

	

	while($row = mysql_fetch_array( $rs ))
	{

		//echo"<pre>"; print_r($row);

		$sr=$i;

		$id=$row['id'];

		$id_enc=$app->cmx->encrypt($row['id'],ency_key);

		//
		if($row['department']!=""){
			$obj_cs = $app->load_model("cm_course");
			$rs_cs=$obj_cs->execute("SELECT",false,"SELECT GROUP_CONCAT(course_name) as cs_names from cm_course where id IN(".$row['department'].")");
		}
	

		$name=$row['first_name']." ".$row['middle_name']." ".$row['last_name'];
		$subject=$row['subject'];
		$course_name=$row['course_name'];
		$sub_text='';
		if($subject!='')
		{
			$exp_subjects = explode(",",$subject);
			$im=0;
			foreach($exp_subjects as $sub)
			{
				if($im!=0)
				{
					$sub_text.=', ';
				}
				$sub1 = $app->cmx->getAnyfield($sub,'cm_subjects','subject_code');
				$sub_text.=$sub1;
				$im++;
			}
		}

		

		 if($row["staff_image"]!="")

			{

			$hlbogo=$row["staff_image"];

			$hltb=explode('.',$hlbogo);

			$hltb_path=SERVER_ROOT.'/uploads/staff_image/'.$hltb[0].'.'.$hltb[1];

			}

			else

			{

			$hltb_path="images/no-icon.png";

			}

			$img="<img src='".$hltb_path."' style=\"width:50px;\"/>";

		

		

				

		

		

		$action='<div class="btn-group">

                                        <button type="button" class="btn btn-xs btn-primary">Action</button>

                                        <button type="button" class="btn btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">

                                          <span class="caret"></span>

                                          <span class="sr-only">Toggle Dropdown</span>

                                        </button>

                                        <ul class="dropdown-menu pull-right" role="menu">
<li><a href="'.CMX_ROOT . '/staffentry/staff/add/facultyedit/'.$id_enc.'/"  

										><i class="glyphicon glyphicon-edit"></i> Edit</a></li>
                                        <li><a href="javascript:void(0);"  

										onclick="javascript:edit_staff(\''.$id_enc.'\')"><i class="glyphicon glyphicon-edit"></i> Add/Edit Subjects</a></li>

                                          <li><a href="javascript:void(0);"  onclick="javascript:confrim_del_ajax({\'ac_id\':\''.$id_enc.'\', \'connector\':\'delete_staff\'})"><i class="glyphicon glyphicon-trash"></i> Delete</a></li>

                                        </ul>

                                      </div>';

			

			

		

	



		$html.="<tr>";

$html.=" <td><label class=\"custom-checkbox-item\">";

        $html.=" <input class=\"custom-checkbox bulk-checkbox delAll\" name=\"del[]\" type=\"checkbox\" data-stat=\"".$stat."\" name=\"inv_select\" value=\"".$id_enc."\">";

        $html.="<span class=\"custom-checkbox-mark\"></span></label></td>";

		$html.="<td>{$sr}</td>";
		$html.="<td>{$img}</td>";
		
        $html.="<td>{$name}</td>";
		$html.="<td>{$rs_cs[0]['cs_names']}</td>";

        $html.="<td>{$sub_text}</td>";

       

       

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