<?php 

	$jsonclass = $app->load_module("Services_JSON");

	$obj_JSON = new $jsonclass(SERVICES_JSON_LOOSE_TYPE);

	$clsid=$app->getPostVar("clsid");
	$examid=$app->getPostVar("examid");

	$class_id=$app->cmx->decrypt($clsid,ency_key);
	$exam_id=$app->cmx->decrypt($examid,ency_key);

	

	$class_name=$app->cmx->class_name($class_id);



	$obj_cm = $app->load_model("cm_exam_subjects");

	$rs = $obj_cm->execute("SELECT",false,"SELECT cm_exam_subjects.*,cm_subjects.subject_name from cm_exam_subjects LEFT JOIN cm_subjects ON cm_exam_subjects.sub_id=cm_subjects.id where cm_exam_subjects.exam_id='".$exam_id."' and cm_exam_subjects.status!=2");
	$obj_class = $app->load_model("cm_classes");
	$rs_class = $obj_class->execute("SELECT",false,"","id='".$class_id."' and status!=2");
	

	$tr_html=' <table class="table table-bordered">

	                            <tr>

	                                <th>Sr.</th>	                                

	                                <th>Name</th>	                                

	                                <th>Exam Date</th>

	                                <th>Marks Submission Date</th>

	                                <th>Action</th>

	                            </tr>';

	

	

	if(count($rs)>0)

	{

		$i=0;

		foreach($rs as $s)

		{

		$id=$s["id"];		

		$name=$s["subject_name"];		

		$exam_date=$s["exam_date"];

		$m_sub_date=$s['m_sub_date'];
		$ex_id=$s['exam_id'];
		$ex_id_enc=$app->cmx->encrypt($ex_id,ency_key);	

		

		//$lastupdated=$last_updated==0?date('d-m-Y',$s['added_on']):date('d-m-Y',$s['last_updated']);

		$secid_enc=$app->cmx->encrypt($id,ency_key);	

		

		$edit_btn='<a href="javascript:void(0);" onclick="javascript:edit_exam_sch(\''.$ex_id_enc.'\')" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>';

	//	$del_btn='<a href="javascript:void(0);" onclick="javascript:edit_exam_sch(\''.$ex_id_enc.'\')" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>';


		

		$tr_html.='<tr>

	              <td>'.($i+1).'</td>	              

	              <td>'.$name.'</td>	             

	              <td>'.$exam_date.'</td>

	              <td>'.$m_sub_date.'</td>

	              <td>'.$edit_btn.' '.$del_btn.'</td>

	           </tr>';

		$i++;

		}

	}

	else

	{

		$tr_html.='<tr>

	              <td colspan="5">No Terms Added.</td>

	           </tr>';

	}

	

	$tr_html.='</table>';

	$sub_html='<select id="sub_id" name="sub_id" class="form-control required" title="Subject Required" >
                      <option value="">Select Subject</option>';
					  $obj_sub = $app->load_model("cm_subjects");

						$rs_sub = $obj_sub->execute("SELECT",false,"","course='".$rs_class[0]["course_id"]."' and sem='".$rs_class[0]["sem_id"]."' and status!=2");
						if(count($rs_sub)>0)
						{
							foreach($rs_sub as $rs1)
							{
								//echo $rs1["id"];
								//exit;
								 $sub_html.='<option value="'.$rs1["id"].'">'.$rs1["subject_name"].'</option>';
							}
							
						}
						
                  $sub_html.='</select>';

	

	/*$tr_html.='<form name="frm_subjects" id="frm_subjects" method="post" enctype="multipart/form-data" action="" class="">

      <input name="connector" id="connector" type="hidden" value="examsubject_form">

	  <input name="exam_id" id="exam_id" type="hidden" value="'.$clsid.'">

	  <input name="record_id" id="record_id" type="hidden" value="">

        <div id="terms_response"></div>

        

        <div class="row">

          <div class="col-md-12">

            <div class="form-group">

              <label class="control-label">Subject Name<span class="mandatory">*</span></label>

			  		<select id="sub_id" name="sub_id" class="form-control required" title="Subject Required" >
                      <option value="">Select Subject</option>';
					  $obj_sub = $app->load_model("cm_subjects");

						$rs_sub = $obj_sub->execute("SELECT",false,"","course='".$rs_class[0]["course_id"]."' and sem='".$rs_class[0]["sem_id"]."' and status!=2");
						if(count($rs_sub)>0)
						{
							foreach($rs_sub as $rs1)
							{
								//echo $rs1["id"];
								//exit;
								 $tr_html.='<option value="'.$rs1["id"].'">'.$rs1["subject_name"].'</option>';
							}
							
						}
						
                  $tr_html.='</select>

            </div>

          </div>          

        </div>

        <div class="row">          

          <div class="col-md-6">

            <div class="form-group">

              <label class="control-label">Exam Date<span class="mandatory">*</span></label>
				<div class="input-group date">

                <input id="exam_date" name="exam_date"type="text" value="" class="form-control indatepicker">

                <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> </div>
			 
            </div>

          </div>
		   <div class="col-md-6">

            <div class="form-group">

              <label class="control-label">Marks Submission Date<span class="mandatory">*</span></label>
				<div class="input-group date">

                <input id="m_sub_date" name="m_sub_date"type="text" value="" class="form-control indatepicker">

                <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> </div>
			 
            </div>

          </div>

        </div>        

      

        <button type="submit" class="btn btn-info waves-effect waves-light" id="save_terms">Save</button>

      </form>';*/

	  $title_modal=$class_name.' Subjects';

	 echo $obj_JSON->encode(array("RESULT"=>"SUCCESS","HTML"=>$tr_html,"subhtml"=>$sub_html,"title_modal"=>$title_modal));			 	

