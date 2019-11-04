

<div class="page-content">
<div class="container-fluid mt50 dizzilist-block">
  <div class="col-xxl-12 col-md-12">
    <? $this->app->htmlBuilder->buildTag("form", array("action"=>"","class"=>""), "frm_reg");?>
    <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>"reg_form"), "connector");?>
    <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>$this->app->getGetVar("record_id")), "record_id");?>
    <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>$this->app->getGetVar("item_id")), "update_id");?>
   <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden","value"=>$this->app->last_id),"last_id");?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">Registration Form </h4>
      </div>
      <div class="panel-body">
        <?php
      $studentedit = isset($this->app->rsstudents)?$this->app->rsstudents:'';
      ?>
        <div id="students_response"></div>
       
        <div class="row">
          <div class="col-md-10">
            <div class="row">
            <div class="col-md-4">
            <div class="form-group">
              <label for="field-1" class="control-label">Registration Date<span class="mandatory">*</span></label>
              <div class='input-group date'>
                <input id="reg_date" name="reg_date"type="text" value="<?php echo  isset($studentedit['reg_date'])? $studentedit['reg_date'] : ''; ?>" class="form-control indatepicker">
                <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> </div>
            </div>
          </div>         
            <div class="col-md-4">
            <div class="form-group">
              <label for="field-1" class="control-label">Registration No.<span class="mandatory">*</span></label>
              <input type="text" class="form-control required" id="reg_no" name="reg_no" title="Registration No Required" placeholder="Registration No" value="<?php echo  isset($studentedit['reg_no'])? $studentedit['reg_no'] : 'Auto Generate'; ?>" readonly>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="field-1" class="control-label">Enquiry No.<span class="mandatory"></span></label>
             <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2", "values"=>$this->app->enq_dd), "enq_no");?>
            </div>
          </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="field-1" class="control-label">Last Name<span class="mandatory">*</span></label>
                  <input type="text" value="<?php echo  isset($studentedit['last_name'])? $studentedit['last_name'] : ''; ?>" class="form-control  required " id="last_name" name="last_name" title="Last Name  required " placeholder="Last Name">
                </div>
              </div>
			  <div class="col-md-4">
                <div class="form-group">
                  <label for="field-1" class="control-label">First Name<span class="mandatory">*</span></label>
                  <input type="text" value="<?php echo  isset($studentedit['first_name'])? $studentedit['first_name'] : ''; ?>" class="form-control  required " id="first_name" name="first_name" title="First Name required" placeholder="First Name">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="field-1" class="control-label">Middle Name<span class="mandatory">*</span></label>
                  <input type="text" value="<?php echo  isset($studentedit['middle_name'])? $studentedit['middle_name'] : ''; ?>" class="form-control  required " id="middle_name" name="middle_name" title="Middle Name required" placeholder="Middle Name">
                </div>
              </div>
              
              <div class="col-md-4">
                <div class="form-group">
                  <label for="field-1" class="control-label">Mother Name</label>
                  <input type="text" value="<?php echo  isset($studentedit['mother_name'])? $studentedit['mother_name'] : ''; ?>" class="form-control" id="mother_name" name="mother_name" title="Mother Name  required " placeholder="Mother Name">
                </div>
              </div>
              <div class="col-md-4">
            <div class="form-group">
              <label for="field-1" class="control-label">Email Id</label>
              <input type="text" class="form-control" id="email_id" name="email_id" title="Email Id Required" placeholder="Email Id" value="<?php echo  isset($studentedit['email_id'])? $studentedit['email_id'] : ''; ?>" >
            </div>
          </div>
          <div class="col-md-4">
	            <div class="form-group">
		          <label  class="control-label">Gender</label>
		          <select id="gender" name="gender" class="form-control">
              	<option value="Male" <?php echo  (isset($studentedit['gender']) && $studentedit['gender'] == "Male" )? 'selected="selected"' : ''; ?>>Male</option>
              	<option value="Female" <?php echo  (isset($studentedit['gender']) && $studentedit['gender'] == "Female" )? 'selected="selected"' : ''; ?>>Female</option>
              </select>
				</div>
            </div>
            </div>
          </div>
          <div class="col-md-2">
          <?php
	              if(file_exists(ABS_PATH.$this->app->get_user_config("student_image").$studentedit['profile_img']) && $studentedit['profile_img']!="")
				  { 
				  	$student_image=SERVER_ROOT.$this->app->get_user_config("student_image").$studentedit['profile_img'];
				  }
				  else
				  {
				  	$student_image=CMX_ROOT.'/img/avatar-1-256.png';
				  }
	              ?>
          
            <div class="form-group">
              <label class="col-sm-12 control-label">Student Image</label>
              <div class="col-sm-12">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                  <div class="fileupload-new thumbnail" style="width: 100%;"><img src="<?php echo $student_image;?>" style="width:100%;"> </div>
                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100%; max-height: 125px; line-height: 20px;"></div>
                  <div> <span class="btn btn-file btn-primary  btn-sm pull-left"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                  <input type="hidden" name="hiddenimageprofile" value="<?php echo  isset($studentedit['profile_img'])? $studentedit['profile_img'] : ''; ?>"/>
                    <input name="profile_img" id="profile_img" type="file" class="span8 " />
                    </span> <a href="#" class="btn btn-primary fileupload-exists  btn-sm pull-right" data-dismiss="fileupload">Remove</a> </div>
                </div>
              </div>
            </div>
          </div>
          </div>
          <div class="row">
            <!--<div class="col-md-4">
              <div class="form-group">
                <label  class="control-label">Course<span class="mandatory">*</span></label>
                <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2", "values"=>$this->app->branch_dd), "cm_course");?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label  class="control-label">Semester<span class="mandatory">*</span></label>
                <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2", "values"=>$this->app->sem_dd), "sem");?>
              </div>
            </div>-->
           
            <div class="col-md-4">
              <div class="form-group">
                <label  class="control-label">Academic year<span class="mandatory">*</span></label>
                <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2", "values"=>$this->app->academic_year_dd), "cm_academic_year");?>
              </div>
            </div>
			<div class="col-md-4">
              <div class="form-group">
                <label for="field-1" class="control-label">Date of Birth <span class="mandatory">*</span></label>
                <div class='input-group date'>
                  <input id="dob" name="dob"type="text" value="<?php echo  isset($studentedit['dob'])? $studentedit['dob'] : ''; ?>" class="form-control indatepicker age_change">
                  <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> </div>
              </div>
            </div>
            <div class="col-md-4">
            <div class="form-group">
              <label for="field-1" class="control-label">Age as on Today</label>
              <label for="field-1" class="control-label " id="today_age"></label>
              <input type="hidden"  id="age_today" name="age_today" >
            </div>
          </div>
          </div>
          <div class="row">
          
            <div class="col-md-4">
              <div class="form-group">
                <label for="field-1" class="control-label">Birth Place</label>
                <input type="text" class="form-control " value="<?php echo  isset($studentedit['birth_place'])? $studentedit['birth_place'] : ''; ?>" id="birth_place" name="birth_place" title="Birth Place " placeholder="Birth Place">
              </div>
            </div>
            <div class="col-md-4">
	            <div class="form-group">
		          <label  class="control-label">Status</label>
		          <select id="status" name="status" class="form-control">
              		<option value="Online Pending" <?php echo  (isset($studentedit['status']) && $studentedit['status'] == "open" )? 'selected="selected"' : ''; ?>>Online Pending</option>
                	<option value="Registration Done - Fees Pending" <?php echo  (isset($studentedit['status']) && $studentedit['status'] == "Registration Done - Fees Pending" )? 'selected="selected"' : ''; ?>>Registration Done - Fees Pending</option>
              		<option value="Registration Done - Fees Paid"  <?php echo  (isset($studentedit['status']) && $studentedit['status'] == "Registration Done - Fees Paid" )? 'selected="selected"' : ''; ?>>Registration Done - Fees Paid</option>
                	<option value="Admission Granted" <?php echo  (isset($studentedit['status']) && $studentedit['status'] == "Admission Granted" )? 'selected="selected"' : ''; ?>>Admission Granted</option>
              		<option value="Admission Rejected" <?php echo  (isset($studentedit['status']) && $studentedit['status'] == "Admission Rejected" )? 'selected="selected"' : ''; ?>>Admission Rejected</option>
                    <option value="Deleted" <?php echo  (isset($studentedit['status']) && $studentedit['status'] == "Deleted" )? 'selected="selected"' : ''; ?>>Deleted</option>
              </select>

                  

				</div>

            </div>
          </div>
          <div class="row">
         <div class="col-md-4">
            <div class="form-group"> 
            <label for="field-1" class="control-label">Marital Status</label>
              <div class="checkbox col-md-6 chk-padding">
                <input type="radio" id="married" name="marital_status" value="married" <?php echo  (isset($studentedit['marital_status']) && $studentedit['marital_status'] == "married" )? "checked" : ''; ?>>
                <label for="married">Married</label>
              </div>
              <div class="checkbox col-md-6 chk-padding">
                <input type="radio" id="unmarried" name="marital_status" value="unmarried" <?php echo  (isset($studentedit['marital_status']) && $studentedit['marital_status'] == "unmarried" )? "checked" : ''; ?>>
                <label for="unmarried">UnMarried</label>
              </div>
            </div>
          </div>
            <div class="col-md-4">
              <div class="form-group">
                <label  class="control-label">Category<span class="mandatory">*</span></label>
                <select id="category" name="category" class="form-control exam-chnage-pec">
              	<option value="open" <?php echo  (isset($studentedit['category']) && $studentedit['category'] == "open" )? 'selected="selected"' : ''; ?> >Open</option>
              	<option value="sc" <?php echo  (isset($studentedit['category']) && $studentedit['category'] == "sc" )? 'selected="selected"' : ''; ?>>SC</option>
                <option value="st" <?php echo  (isset($studentedit['category']) && $studentedit['category'] == "st" )? 'selected="selected"' : ''; ?>>ST</option>
              	<option value="sebc" <?php echo  (isset($studentedit['category']) && $studentedit['category'] == "sebc" )? 'selected="selected"' : ''; ?>>SEBC</option>
                <option value="ob" <?php echo  (isset($studentedit['category']) && $studentedit['category'] == "ob" )? 'selected="selected"' : ''; ?>>Other Board</option>
                <option value="mgmt" <?php echo  (isset($studentedit['category']) && $studentedit['category'] == "mgmt" )? 'selected="selected"' : ''; ?>>Management Quota</option>
              </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="field-1" class="control-label">Blood Group</label>
                <!--<input type="text" class="form-control " value="<?php echo  isset($studentedit['blood_group'])? $studentedit['blood_group'] : ''; ?>" id="blood_group" name="blood_group" title="Blood Group required" placeholder="Blood Group">-->
				<select id="blood_group" name="blood_group" class="form-control">
              	<option value="" <?php echo  (isset($studentedit['blood_group']) && $studentedit['blood_group'] == "" )? 'selected="selected"' : ''; ?> >Select Blood Group</option>
				<option value="O+" <?php echo  (isset($studentedit['blood_group']) && $studentedit['blood_group'] == "O+" )? 'selected="selected"' : ''; ?> >O+</option>
              	<option value="O-" <?php echo  (isset($studentedit['blood_group']) && $studentedit['blood_group'] == "O-" )? 'selected="selected"' : ''; ?>>O-</option>
                <option value="A+" <?php echo  (isset($studentedit['blood_group']) && $studentedit['blood_group'] == "A+" )? 'selected="selected"' : ''; ?>>A+</option>
              	<option value="A-" <?php echo  (isset($studentedit['blood_group']) && $studentedit['blood_group'] == "A-" )? 'selected="selected"' : ''; ?>>A-</option>
                <option value="B+" <?php echo  (isset($studentedit['blood_group']) && $studentedit['blood_group'] == "B+" )? 'selected="selected"' : ''; ?>>B+</option>
                <option value="B-" <?php echo  (isset($studentedit['blood_group']) && $studentedit['blood_group'] == "B-" )? 'selected="selected"' : ''; ?>>B-</option>
				<option value="AB+" <?php echo  (isset($studentedit['blood_group']) && $studentedit['blood_group'] == "AB+" )? 'selected="selected"' : ''; ?>>AB+</option>
				<option value="AB-" <?php echo  (isset($studentedit['blood_group']) && $studentedit['blood_group'] == "AB-" )? 'selected="selected"' : ''; ?>>AB-</option>
              </select>
              </div>

          </div>
          </div>
          <div class="row">
            <div class="col-md-4">
            <div class="form-group">
            <label  class="control-label">Physically Handicapped</label>
              <div class="checkbox col-md-6 chk-padding">
                <input type="radio" id="ph_yes" name="ph_status" value="ph_yes" <?php echo  (isset($studentedit['ph_status']) && $studentedit['ph_status'] == "ph_yes" )? "checked" : ''; ?>>
                <label for="ph_yes">Yes</label>
              </div>
              <div class="checkbox col-md-6 chk-padding">
                <input type="radio" id="ph_no" name="ph_status" value="ph_no" <?php echo  (isset($studentedit['ph_status']) && $studentedit['ph_status'] == "ph_no" )? "checked" : ''; ?>>
                <label for="ph_no">No</label>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="field-1" class="control-label">Mother Tongue</label>
              <input type="text" class="form-control " id="mother_tongue" name="mother_tongue" title="Mother Tongue Required" placeholder="Mother Tongue" value="<?php echo  isset($studentedit['mother_tongue'])? $studentedit['mother_tongue'] : ''; ?>">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="field-1" class="control-label">Nationality<span class="mandatory">*</span></label>
              <input type="text" class="form-control required" id="nationality" name="nationality" title="Nationality Required" placeholder="Nationality" value="<?php echo  isset($studentedit['nationality'])? $studentedit['nationality'] : ''; ?>">
            </div>
          </div>
            
          </div>
          
          
          <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="field-1" class="control-label">Address<span class="mandatory">*</span></label>
              <textarea class="form-control required" id="address" name="address"><?php echo  isset($studentedit['address'])? $studentedit['address'] : ''; ?></textarea>
            </div>
          </div>
          <div id="mapop" style="display:none;"></div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="field-1" class="control-label">City<span class="mandatory">*</span></label>
              <input type="text" class="form-control required" id="city" name="city" title="City Required" placeholder="City" value="<?php echo  isset($studentedit['city'])? $studentedit['city'] : ''; ?>" onkeyup="loadcity('city','profile');" autocomplete="off">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="field-1" class="control-label">Tehsil<span class="mandatory">*</span></label>
              <input type="text" class="form-control required" id="tehsil" name="tehsil" title="Tehsil Required" placeholder="Tehsil"  value="<?php echo  isset($studentedit['tehsil'])? $studentedit['tehsil'] : ''; ?>" onkeyup="loadcity('tehsil','profile');" autocomplete="off" >
            </div>
          </div>
         
          
        </div>
        <div class="row">
        <div class="col-md-4">
            <div class="form-group">
              <label for="field-1" class="control-label">District<span class="mandatory">*</span></label>
              <input type="text" class="form-control required" id="district" name="district" title="District Required" placeholder="District" value="<?php echo  isset($studentedit['District'])? $studentedit['District'] : ''; ?>" onkeyup="loadcity('district','profile');" autocomplete="off">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="field-1" class="control-label">State<span class="mandatory">*</span></label>
              <input type="text" class="form-control required" id="profile_state" name="state" title="State Required" placeholder="State" value="<?php echo  isset($studentedit['state'])? $studentedit['state'] : ''; ?>">
            </div>
          </div>
          
          <div class="col-md-4">
            <div class="form-group">
              <label for="field-1" class="control-label">PIN<span class="mandatory">*</span></label>
              <input type="text" class="form-control required" id="pin" name="pin" title="PIN Required" placeholder="PIN" value="<?php echo  isset($studentedit['pin'])? $studentedit['pin'] : ''; ?>">
            </div>
          </div>
        </div>
          
          <div class="row">
          
          <div class="col-md-4">
            <div class="form-group">
              <label for="field-1" class="control-label">Mobile No.<span class="mandatory">*</span></label>
              <input type="text" class="form-control required" id="mobile_no" name="mobile_no" title="Mobile No Required" placeholder="Mobile No" value="<?php echo  isset($studentedit['mobile_no'])? $studentedit['mobile_no'] : ''; ?>">
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="field-1" class="control-label">Phone No</label>
              <input type="text" class="form-control " id="phone_no" name="phone_no" title="Phone No" placeholder="Phone No" value="<?php echo  isset($studentedit['phone_no'])? $studentedit['phone_no'] : ''; ?>">
            </div>
          </div>
          <div class="col-md-4">
	            <div class="form-group">
		          <label  class="control-label">Parent Mobile No. </label>
		           <input type="text" class="form-control" id="parent_mobile_no" name="parent_mobile_no" title="Parent No" placeholder="Parent No" value="<?php echo  isset($studentedit['parent_mobile_no'])? $studentedit['parent_mobile_no'] : ''; ?>">
                  
				</div>
            </div>
        </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label  class="control-label">Occupation of father</label>
                <input type="text" class="form-control" id="father_occupation" name="father_occupation" title="Profession Required" placeholder="Father Profession" value="<?php echo  isset($studentedit['father_occupation'])? $studentedit['father_occupation'] : ''; ?>">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="field-1" class="control-label">Guardian annual income</label>
                <input type="text" class="form-control number" value="<?php echo isset($studentedit['g_annual_income'])? $studentedit['g_annual_income'] : ''; ?>" id="g_annual_income" name="g_annual_income" title="Enter Numeric Value" placeholder="Guardian annual income">
              </div>
            </div>
            <div class="col-md-4">
		        <div class="form-group">
		          <label  class="control-label">Class<span class="mandatory">*</span></label>
		           <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2 required", "values"=>$this->app->class_dd,"title"=>"Class Required"), "enq_class");?>
				</div>
	        </div>
          </div>
          
          
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label  class="control-label">Last Exam Pass<span class="mandatory">*</span></label>
                <div style="margin: 10px 0;">
                  <button type="button" id="regtable-addrow" class="btn btn-primary btn-sm">Add row</button>
                  <button type="button" id="regtable-removerow" class="btn btn-danger btn-sm">Remove row</button>
                </div>
                <div class="table-responsive">
                  <table border="1" id="regtable" class="table table-bordered">
                    <tr>
                      <!--<th>SR.NO.</th>-->
                      <th>EXAM NAME</th>
					  <th>STREAM NAME</th>
                      <th>NAME OF BOARD/UNIVERSITY</th>
                      <th>NAME OF THE SCHOOL / COLLEGE</th>
                     	<th>MONTH AND YEAR OF PASSING</th>
                      <th>EXAM SEAT NO.</th>
                      <th>CERTIFICATE NUMBER</th>
                      <th>TOTAL MARKS</th>
                      <th>OBTAINED MARKS</th>
					  <th>PERCENTAGE</th>
                      <th>GRADE/CGPA</th>
					  <th>PEC NO.</th>
                    </tr>
                    <?php
					 $months = array(1 => 'Jan.', 2 => 'Feb.', 3 => 'Mar.', 4 => 'Apr.', 5 => 'May', 6 => 'Jun.', 7 => 'Jul.', 8 => 'Aug.', 9 => 'Sep.', 10 => 'Oct.', 11 => 'Nov.', 12 => 'Dec.');
					 $stream = array(1 => 'SCIENCE.', 2 => 'COMMERCE', 3 => 'ARTS');
                	if(isset($studentedit['id']) && $studentedit['id'] != '')
                	{
	                	$exampasssql="SELECT * from cm_last_exam where reg_id = ".$studentedit['id'];
	                	$$exampasssql_detail = $this->app->load_model("cm_last_exam");
						$exampasssql_result = $$exampasssql_detail->execute("SELECT",false,$exampasssql);
						if(count($exampasssql_result) > 0)
						{
							foreach($exampasssql_result as $k => $examdata)
							{		
								$new_pass_data=explode("-",$examdata['pass_year1']);
						?>
                    <tr id="klon<?php echo $k+1;?>">
                      <!--<td><?php //echo $k+1; ?></td>-->
                      <td><? $this->app->htmlBuilder->buildTag("select", array("class"=>" exam-chnage-pec exmname required","name"=>"exam_name[]", "values"=>$this->app->qlf_dd,"title"=>"Class Required","data-cid"=>$k+1,"selected"=>$examdata['exam_name1']) );?><?php /*?><input type="text" name="exam_name[]" id="exam_name_<?php echo $k+1;?>" value="<?php echo (isset($examdata['exam_name1'])) ? $examdata['exam_name1']:''; ?>"/><?php */?></td>
					  <td><? $this->app->htmlBuilder->buildTag("select", array("class"=>"required","name"=>"str_name[]", "values"=>$stream,"title"=>"Stream Required","data-cid"=>$k+1,"selected"=>$examdata['stream_name']) );?></td>
                      <td><? $this->app->htmlBuilder->buildTag("select", array("class"=>"brd-get-new exam-chnage-pec brdname required","name"=>"board_name[]", "values"=>$this->app->brd_dd,"data-cid"=>1,"title"=>"Board Required","selected"=>$examdata['board_name1']));?><!--<input type="text" name="board_name[]" id="board_name_<?php echo $k+1;?>" value="<?php echo (isset($examdata['board_name1'])) ? $examdata['board_name1']:''; ?>" />--><a class="btn btn-success btn-default-custom md-trigger pull-left" href="javascript:void()" data-toggle="modal" data-target="#con-close-modal2"><i class="fa fa-plus"></i></a></td>
                      <td><? $this->app->htmlBuilder->buildTag("select", array("class"=>"sch-get-new required","name"=>"school_name[]", "values"=>$this->app->sch_dd,"data-cid"=>1,"title"=>"School Required","selected"=>$examdata['school_name1']));?><!--<input type="text" name="school_name[]" id="school_name_<?php echo $k+1;?>" value="<?php echo (isset($examdata['school_name1'])) ? $examdata['school_name1']:''; ?>" />--><a class="btn btn-success btn-default-custom md-trigger pull-left" href="javascript:void()" data-toggle="modal" data-target="#con-close-modal3"><i class="fa fa-plus"></i></a></td>
                      <td><!--<input type="text" name="pass_year[]" id="pass_year_<?php echo $k+1;?>" value="<?php echo (isset($examdata['pass_year1'])) ? $examdata['pass_year1']:''; ?>" class="indatepicker1" />-->
					  <? $this->app->htmlBuilder->buildTag("select", array("name"=>"range_month[]","values"=>$months,"selected"=>$new_pass_data[0]));?>
						<? $this->app->htmlBuilder->buildTag("select", array("name"=>"range_year[]", "values"=>range(1989,date("Y")),"selected"=>$new_pass_data[1]));?></td>
                      <td><input type="text" name="exam_seat_no[]" id="exam_seat_no_<?php echo $k+1;?>" value="<?php echo (isset($examdata['exam_no1'])) ? $examdata['exam_no1']:''; ?>" /></td>
                      <td><input type="text" name="cert_no[]" id="cert_no_<?php echo $k+1;?>"  value="<?php echo (isset($examdata['certi_no1'])) ? $examdata['certi_no1']:''; ?>"/></td>
                      <td><input type="text" name="total_marks[]" id="total_marks_<?php echo $k+1;?>" class="change-perc"  value="<?php echo (isset($examdata['total_marks1'])) ? $examdata['total_marks1']:''; ?>"/></td>
					  <td><input type="text" name="obtaine_marks[]" id="obtaine_marks_<?php echo $k+1;?>" class="change-perc" data-cid="<?php echo $k+1;?>" value="<?php echo (isset($examdata['obtained_marks_new'])) ? $examdata['obtained_marks_new']:''; ?>" /></td>
                      <td><input type="text" name="percen[]" id="percen_<?php echo $k+1;?>"  value="<?php echo (isset($examdata['percen_new'])) ? $examdata['percen_new']:''; ?>" readonly /></td>
					  <td><input type="text" name="grade[]" id="grade_<?php echo $k+1;?>" value="<?php echo (isset($examdata['cgpa_grade'])) ? $examdata['cgpa_grade']:''; ?>" /></td>
					  <td><input type="text" class="chng-pec" name="pec_no[]" id="pec_no_<?php echo $k+1;?>" value="<?php echo (isset($examdata['pec_no_new'])) ? $examdata['pec_no_new']:''; ?>" readonly /></td>
                    </tr>
                    <?php	
						}
						}else
						{
							?>
                            <tr id="klon1">
                      <!--<td>1</td>-->
                      <td><? $this->app->htmlBuilder->buildTag("select", array("class"=>"required exam-chnage-pec exmname","name"=>"exam_name[]", "values"=>$this->app->qlf_dd,"data-cid"=>1,"title"=>"Class Required") );?><!--<input type="text" name="exam_name[]" id="exam_name_1"   />--></td>
                      <td><? $this->app->htmlBuilder->buildTag("select", array("class"=>"required","name"=>"str_name[]", "values"=>$stream,"title"=>"Stream Required") );?></td>
					  <td><? $this->app->htmlBuilder->buildTag("select", array("class"=>"brd-get-new exam-chnage-pec brdname required","name"=>"board_name[]", "values"=>$this->app->brd_dd,"data-cid"=>1,"title"=>"Board Required"));?><!--<input type="text" name="board_name[]" id="board_name_1"  />--><a class="btn btn-success btn-default-custom md-trigger pull-left" href="javascript:void()" data-toggle="modal" data-target="#con-close-modal2"><i class="fa fa-plus"></i></a></td>
                      <td><? $this->app->htmlBuilder->buildTag("select", array("class"=>"sch-get-new required","name"=>"school_name[]", "values"=>$this->app->sch_dd,"data-cid"=>1,"title"=>"School Required","selected"=>$examdata['school_name']));?><!--<input type="text" name="school_name[]" id="school_name_1"  />--><a class="btn btn-success btn-default-custom md-trigger pull-left" href="javascript:void()" data-toggle="modal" data-target="#con-close-modal3"><i class="fa fa-plus"></i></a></td>
                      <td><!--<input type="text" name="pass_year[]" id="pass_year_1" class="indatepicker1" />--><? $this->app->htmlBuilder->buildTag("select", array("name"=>"range_month[]","values"=>$months));?>
						<? $this->app->htmlBuilder->buildTag("select", array("name"=>"range_year[]", "values"=>range(1989,date("Y"))));?></td>
                      <td><input type="text" name="exam_seat_no[]" id="exam_seat_no_1"  /></td>
                      <td><input type="text" name="cert_no[]" id="cert_no_1"  /></td>
                      <td><input type="text" name="total_marks[]" id="total_marks_1" class="change-perc" /></td>
                      <td><input type="text" name="obtaine_marks[]" id="obtaine_marks_1" class="change-perc" data-cid="1" /></td>
					  <td><input type="text" name="percen[]" id="percen_1" readonly /></td>
                      <td><input type="text" name="grade[]"  id="grade_1"  /></td>
					  <td><input type="text" class="chng-pec" name="pec_no[]"  id="pec_no_1" readonly /></td>
                    </tr>
                            <?php						
						}
					}else
					{
                	?>
                    <tr id="klon1">
                      <!--<td>1</td>-->
                      <td><? $this->app->htmlBuilder->buildTag("select", array("class"=>"required exam-chnage-pec exmname","name"=>"exam_name[]", "values"=>$this->app->qlf_dd,"data-cid"=>1,"title"=>"Class Required") );?><!--<input type="text" name="exam_name[]" id="exam_name_1"   />--></td>
                      <td><? $this->app->htmlBuilder->buildTag("select", array("class"=>"required","name"=>"str_name[]", "values"=>$stream,"title"=>"Stream Required") );?></td>
					  <td><? $this->app->htmlBuilder->buildTag("select", array("class"=>"brd-get-new exam-chnage-pec brdname required","name"=>"board_name[]", "values"=>$this->app->brd_dd,"data-cid"=>1,"title"=>"Board Required") );?><!--<input type="text" name="board_name[]" id="board_name_1"  />--><a class="btn btn-success btn-default-custom md-trigger pull-left" href="javascript:void()" data-toggle="modal" data-target="#con-close-modal2"><i class="fa fa-plus"></i></a></td>
                      <td><? $this->app->htmlBuilder->buildTag("select", array("class"=>"sch-get-new required","name"=>"school_name[]", "values"=>$this->app->sch_dd,"data-cid"=>1,"title"=>"School Required"));?><!--<input type="text" name="school_name[]" id="school_name_1"  />--><a class="btn btn-success btn-default-custom md-trigger pull-left" href="javascript:void()" data-toggle="modal" data-target="#con-close-modal3"><i class="fa fa-plus"></i></a></td>
                      <td>
					  <!--<input type="text" name="pass_year[]" id="pass_year_1" class="indatepicker1"/>-->
					  
						<? $this->app->htmlBuilder->buildTag("select", array("name"=>"range_month[]","values"=>$months));?>
						<? $this->app->htmlBuilder->buildTag("select", array("name"=>"range_year[]", "values"=>range(1989,date("Y"))));?>
					  
					  </td>
                      <td><input type="text" name="exam_seat_no[]" id="exam_seat_no_1"  /></td>
                      <td><input type="text" name="cert_no[]" id="cert_no_1"  /></td>
                      <td><input type="text" name="total_marks[]" id="total_marks_1" class="change-perc"  /></td>
                      <td><input type="text" name="obtaine_marks[]" id="obtaine_marks_1" class="change-perc" data-cid="1"  /></td>
					  <td><input type="text" name="percen[]" id="percen_1" readonly /></td>
                      <td><input type="text" name="grade[]"  id="grade_1"  /></td>
					  <td><input type="text" class="chng-pec" name="pec_no[]"  id="pec_no_1" readonly /></td>
                    </tr>
                    <?php } ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="panel-footer">
          <button class="btn btn-primary mr5" type="submit" id="save-reg">Submit</button>
          <button type="reset" class="btn btn-default">Reset</button>
        </div>
      </div>
      <?=$this->app->htmlBuilder->closeForm()?>
    </div>
  </div>
</div>
<div id="con-close-modal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">

  <div class="modal-dialog">

    <div class="modal-content">

      <? $this->app->htmlBuilder->buildTag("form", array("action"=>"","class"=>""), "frm_lastschool");?>

      <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>"boardUni_form"), "connector");?>

      <? //$this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>$this->record_id), "record_id");?>

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

        <h4 class="modal-title"><span>Add</span> <strong>Board/University</strong> </h4>

      </div>

      <div class="modal-body">

        <div id="lastschool_response"></div>

        <div class="row">          

          <div class="col-md-12">

            <div class="form-group">

              <label for="field-1" class="control-label">Name<span class="mandatory">*</span></label>

              <input type="text" class="form-control required" id="name" name="name" title="Name Required" placeholder="Name">

            </div>

          </div>

        </div>        

       

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>

        <button type="submit" class="btn btn-info waves-effect waves-light" id="save_lastschool">Save</button>

      </div>

      <?=$this->app->htmlBuilder->closeForm()?>

    </div>

  </div>

</div>
<div id="con-close-modal3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">

  <div class="modal-dialog">

    <div class="modal-content">

      <? $this->app->htmlBuilder->buildTag("form", array("action"=>"","class"=>""), "frm_lastschool1");?>

      <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>"lastschool_form"), "connector");?>

      <? //$this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>$this->record_id), "record_id");?>

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

        <h4 class="modal-title"><span>Add</span> <strong>Last School/Collage</strong> </h4>

      </div>

      <div class="modal-body">

        <div id="lastschool_response1"></div>

        <div class="row">          

          <div class="col-md-12">

            <div class="form-group">

              <label for="field-1" class="control-label">Name<span class="mandatory">*</span></label>

              <input type="text" class="form-control required" id="name" name="name" title="Name Required" placeholder="Name">

            </div>

          </div>

        </div>        

       

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>

        <button type="submit" class="btn btn-info waves-effect waves-light" id="save_lastschool1">Save</button>

      </div>

      <?=$this->app->htmlBuilder->closeForm()?>

    </div>

  </div>

</div>

