<style>
div#addressdiv {
	border: 1px solid rgba(142, 159, 167, 0.26);
	padding: 20px;
	margin: 20px 0;
}
.addressheading {
	color: #16b4fc;
}
input#permenentaddresscheckbox {
	float: left;
	width: 20px;
	margin: 0px;
}
</style>
<div class="page-content">
<div class="container-fluid mt50 dizzilist-block">
  <div class="col-xxl-12 col-md-12">
    <? $this->app->htmlBuilder->buildTag("form", array("action"=>"","class"=>""), "frm_students");?>
    <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>"students_form"), "connector");?>
    <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>$this->app->getGetVar("record_id")), "record_id");?>
    <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>$this->app->getGetVar("item_id")), "update_id");?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">Student Entry Form </h4>
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
                  <label for="field-1" class="control-label">First Name<span class="mandatory">*</span></label>
                  <input type="text" value="<?php echo  isset($studentedit['cm_first_name'])? $studentedit['cm_first_name'] : ''; ?>" class="form-control  required " id="first_name1" name="first_name1" title="First Name required" placeholder="First Name">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="field-1" class="control-label">Middle Name<span class="mandatory">*</span></label>
                  <input type="text" value="<?php echo  isset($studentedit['cm_middle_name'])? $studentedit['cm_middle_name'] : ''; ?>" class="form-control  required" id="middle_name1" name="middle_name1" title="Middle Name required" placeholder="Middle Name">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="field-1" class="control-label">Last Name<span class="mandatory">*</span></label>
                  <input type="text" value="<?php echo  isset($studentedit['cm_last_name'])? $studentedit['cm_last_name'] : ''; ?>" class="form-control  required " id="last_name1" name="last_name1" title="Last Name  required " placeholder="Last Name">
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label for="field-1" class="control-label">Mother Name<span class="mandatory">*</span></label>
                  <input type="text" value="<?php echo  isset($studentedit['mothername'])? $studentedit['mothername'] : ''; ?>" class="form-control   required" id="mother_name1" name="mother_name1" title="Mother Name  required " placeholder="Mother Name">
                </div>
              </div>
              <div class="col-md-4">
            <div class="form-group">
              <label for="field-1" class="control-label">Admission No.<span class="mandatory"></span></label>
             <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2", "values"=>$this->app->cnf_dd), "cm_cnf_id");?>
            </div>
          </div>
          <div class="col-md-4">
              <div class="form-group">
                <label  class="control-label">Class<span class="mandatory">*</span></label>
                <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2 required", "values"=>$this->app->class_dd), "cm_class_id");?>
              </div>
            </div>
              <div class="col-md-4">
              <div class="form-group">
                <label  class="control-label">Academic year<span class="mandatory">*</span></label>
                <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control required", "values"=>$this->app->academic_year_dd), "cm_academic_year");?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="field-1" class="control-label">Status</label>
                <select id="status1" name="status1" class="form-control   ">
                  <option value="Active" <?php echo (isset($studentedit['status']) && $studentedit['status'] == "Active") ? "selected":''; ?>>Active</option>
                  <option value="Inactive" <?php echo (isset($studentedit['status']) && $studentedit['status'] == "Inactive") ? "selected":''; ?>>Inactive</option>
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="field-1" class="control-label">Gender</label>
                <select id="gender" name="gender" class="form-control  required ">
                  <option value="Male" <?php echo (isset($studentedit['gender']) && $studentedit['gender'] == "Male") ? "selected":''; ?>>Male</option>
                  <option value="Female" <?php echo (isset($studentedit['gender']) && $studentedit['gender'] == "Female") ? "selected":''; ?>>Female</option>
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
          <div class="col-md-4">
              <div class="form-group">
                <label  class="control-label">Category<span class="mandatory">*</span></label>
                <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control required", "values"=>$this->app->category_dd), "cm_category");?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label  class="control-label">Religion<span class="mandatory">*</span></label>
                <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control required", "values"=>$this->app->religion_dd), "cm_religion");?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="field-1" class="control-label">Cast</label>
                <input type="text" class="form-control" value="<?php echo  isset($studentedit['cast'])? $studentedit['cast'] : ''; ?>" id="cast1" name="cast1" title="Cast required" placeholder="Cast">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label  class="control-label">Course<span class="mandatory">*</span></label>
                <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control required", "values"=>$this->app->branch_dd), "cm_course");?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label  class="control-label">Semester<span class="mandatory">*</span></label>
                <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control required", "values"=>$this->app->sem_dd), "sem");?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="field-1" class="control-label">Division<span class="mandatory">*</span></label>
                <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control required", "values"=>$this->app->division_dd), "division");?>
              </div>
            </div>
          </div>
         
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="field-1" class="control-label">Date of Birth <span class="mandatory">*</span></label>
                <div class='input-group date'>
                  <input id="dob1" name="dob1"type="text" value="<?php echo  isset($studentedit['dob'])? date('d-m-Y',strtotime($studentedit['dob'])) : ''; ?>" class="form-control indatepicker required">
                  <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="field-1" class="control-label">Birth Place<span class="mandatory">*</span></label>
                <input type="text" class="form-control required" value="<?php echo  isset($studentedit['birth_place'])? $studentedit['birth_place'] : ''; ?>" id="birth_place1" name="birth_place1" title="Birth Place required" placeholder="Birth Place">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="field-1" class="control-label">Blood Group</label>
                <input type="text" class="form-control"  value="<?php echo  isset($studentedit['blood_group'])? $studentedit['blood_group'] : ''; ?>" id="blood_group1" name="blood_group1" title="Blood Group  required " placeholder="Blood Group">
              </div>
            </div>
          </div>
          <div class="row">
          <div class="col-md-4">
              <div class="form-group">
                <label for="field-1" class="control-label">ID NO.<span class="mandatory">*</span></label>
                <input type="text" class="form-control required" value="<?php echo  isset($studentedit['id_no'])? $studentedit['id_no'] : ''; ?>" id="id_no1" name="id_no1" title="ID required" placeholder="ID NO.">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="field-1" class="control-label">Email<span class="mandatory">*</span></label>
                <input type="email" class="form-control required" value="<?php echo  isset($studentedit['email'])? $studentedit['email'] : ''; ?>" id="email1" name="email1" title="Email required" placeholder="Email">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="field-1" class="control-label">E-connect Password<span class="mandatory">*</span></label>
                <input type="text" class="form-control <?php if($this->app->getGetVar("item_id") == ''){ echo "required"; }else {echo ""; } ?>" value="<?php echo  isset($studentedit['password'])? $studentedit['password'] : ''; ?>" id="password1" name="password1" title="Password <?php if($this->app->getGetVar("item_id") == ''){ echo "required"; }else {echo ""; } ?>" placeholder="Password">
                <button type="button" class="btn btn-primary btn-sm mt10"  onClick="randomPassword();" tabindex="2">Generate</button>
              </div>
            </div>
          </div>
          <div id="addressdiv">
            <div class="row" >
              <div class="col-md-6">
                <div class="form-group">
                  <h4 class="addressheading">Permanent Address</h4>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <h4 class="addressheading">Current Address</h4>
                  <input type="checkbox" class="form-control" id="permenentaddresscheckbox">
                  Same as Permanent Address </div>
              </div>
            </div>
            <div class="row" >
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Address Line 1<span class="mandatory">*</span></label>
                  <textarea class="form-control required" id="permenent_address_line11" name="permenent_address_line11"><?php echo  isset($studentedit['cm_permenent_address_line1'])? $studentedit['cm_permenent_address_line1'] : ''; ?></textarea>
                  
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Address Line 1<span class="mandatory">*</span></label>
                  <textarea class="form-control required"  id="current_address_line11" name="current_address_line11"><?php echo  isset($studentedit['cm_current_address_line1'])? $studentedit['cm_current_address_line1'] : ''; ?></textarea>
                </div>
              </div>
            </div>
            <div class="row" >
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Address Line 2</label>
                  <textarea class="form-control " id="permenent_address_line21" name="permenent_address_line21"><?php echo isset($studentedit['cm_permenent_address_line2'])? $studentedit['cm_permenent_address_line2'] : ''; ?></textarea>
                </div>  
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">Address Line 2</label>
                  <textarea class="form-control" id="current_address_line21" name="current_address_line21"><?php echo isset($studentedit['cm_current_address_line2'])? $studentedit['cm_current_address_line2'] : ''; ?></textarea>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">City<span class="mandatory">*</span></label>
                  <input type="text" class="form-control required" value="<?php echo isset($studentedit['cm_permenent_city'])? $studentedit['cm_permenent_city'] : ''; ?>" id="permenent_city1" name="permenent_city1" title="City required" placeholder="City">
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label for="field-1" class="control-label">City<span class="mandatory">*</span></label>
                  <input type="text" class="form-control required" value="<?php echo isset($studentedit['cm_current_city'])? $studentedit['cm_current_city'] : ''; ?>" id="current_city1" name="current_city1" title="City" placeholder="City">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="field-1" class="control-label">Taluka<span class="mandatory">*</span></label>
                  <input type="text" class="form-control required" value="<?php echo isset($studentedit['cm_permenent_taluka'])? $studentedit['cm_permenent_taluka'] : ''; ?>" id="permenent_taluka1" name="permenent_taluka1" title="Taluka required" placeholder="Taluka">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="field-1" class="control-label">District<span class="mandatory">*</span></label>
                  <input type="text" class="form-control required" value="<?php echo isset($studentedit['cm_permenent_district'])? $studentedit['cm_permenent_district'] : ''; ?>" id="permenent_district1" name="permenent_district1" title="District required" placeholder="District">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="field-1" class="control-label">Taluka<span class="mandatory">*</span></label>
                  <input type="text" class="form-control required" id="current_taluka1" value="<?php echo isset($studentedit['cm_current_taluka'])? $studentedit['cm_current_taluka'] : ''; ?>" name="current_taluka1" title="Taluka   " placeholder="Taluka">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="field-1" class="control-label">District<span class="mandatory">*</span></label>
                  <input type="text" class="form-control required" id="current_district1" value="<?php echo isset($studentedit['cm_current_district'])? $studentedit['cm_current_district'] : ''; ?>" name="current_district1" title="District" placeholder="District">
                </div>
              </div>
            </div>
           
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="field-1" class="control-label">State<span class="mandatory">*</span></label>
                  <input type="text" class="form-control required" value="<?php echo isset($studentedit['cm_permenent_state'])? $studentedit['cm_permenent_state'] : ''; ?>" id="permenent_state1" name="permenent_state1" title="State required" placeholder="State">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="field-1" class="control-label">Zip Code<span class="mandatory">*</span></label>
                  <input type="text" class="form-control required number" id="permenent_zipcode1" value="<?php echo isset($studentedit['cm_permenent_zipcode'])? $studentedit['cm_permenent_zipcode'] : ''; ?>" name="permenent_zipcode1" title="Zip Code required" placeholder="Zip code">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="field-1" class="control-label">State<span class="mandatory">*</span></label>
                  <input type="text" class="form-control required" value="<?php echo isset($studentedit['cm_current_state'])? $studentedit['cm_current_state'] : ''; ?>" id="current_state1" name="current_state1" title="State" placeholder="State">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="field-1" class="control-label">Zip Code<span class="mandatory">*</span></label>
                  <input type="text" class="form-control number" id="current_zipcode1" value="<?php echo isset($studentedit['cm_current_zipcode'])? $studentedit['cm_current_zipcode'] : ''; ?>" name="current_zipcode1" title="Zip Code   " placeholder="Zip code">
                </div>
              </div>
            </div>
            
          </div>
          
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="field-1" class="control-label">Mobile Number<span class="mandatory">*</span></label>
                <input type="text" class="form-control required   number" value="<?php echo isset($studentedit['student_mobile_no'])? $studentedit['student_mobile_no'] : ''; ?>" id="mobile_no1" name="mobile_no1" title="Mobile Number required" placeholder="Mobile Number">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="field-1" class="control-label">Residence Number<span class="mandatory">*</span></label>
                <input type="text" class="form-control  number" value="<?php echo isset($studentedit['parents_residence_no'])? $studentedit['parents_residence_no'] : ''; ?>" id="residence_no1" name="residence_no1" title="Residence Number required" placeholder="Residence Number">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="field-1" class="control-label">Parents Mobile Number<span class="mandatory">*</span></label>
                <input type="text" class="form-control required  number" value="<?php echo isset($studentedit['parents_mobile_no'])? $studentedit['parents_mobile_no'] : ''; ?>" id="parents_mobile_no1" name="parents_mobile_no1" title="Parents Mobile Number required" placeholder="Parents Mobile Number">
              </div>
            </div>
          </div>
          <div class="row">
            
            <div class="col-md-4">
              <div class="form-group">
                <label for="field-1" class="control-label">Parents office number</label>
                <input type="text" class="form-control number" value="<?php echo isset($studentedit['parents_office_no'])? $studentedit['parents_office_no'] : ''; ?>" id="parents_office_no1" name="parents_office_no1" title="Parents office number required" placeholder="Parents office number">
              </div>
            </div>
         
            <div class="col-md-4">
              <div class="form-group">
                <label  class="control-label">Occupation of father<span class="mandatory">*</span></label>
                <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control required", "values"=>$this->app->occupation_dd), "cm_occupation_of_father");?>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="field-1" class="control-label">Guardian annual income</label>
                <input type="text" class="form-control number" value="<?php echo isset($studentedit['cm_guardian_annual_income'])? $studentedit['cm_guardian_annual_income'] : ''; ?>" id="guardian_annual_income1" name="guardian_annual_income1" title="Guardian annual income required" placeholder="Guardian annual income">
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="field-1" class="control-label">Fee Status<span class="mandatory">*</span></label>
                <select id="fee_status1" name="fee_status1" class="form-control   ">
               		 <option value="Unpaid" <?php echo (isset($studentedit['fee_status']) && $studentedit['fee_status'] == "Unpaid") ? "selected":''; ?>>Unpaid</option>
                  <option value="Paid" <?php echo (isset($studentedit['fee_status']) && $studentedit['fee_status'] == "Paid") ? "selected":''; ?>>Paid</option>
                  
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="field-1" class="control-label">Fee Amount</label>
                <input type="text" class="form-control number" value="<?php echo isset($studentedit['fee_amount'])? $studentedit['fee_amount'] : ''; ?>" id="fee_amount1" name="fee_amount1" title="Fee Amount required" placeholder="Fee Amount">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="field-1" class="control-label">Fee Last Date </label>
                <div class='input-group date'>
                  <input id="fee_last_date1" name="fee_last_date1"type="text" value="<?php echo  isset($studentedit['fee_last_date'])? date('d-m-Y',strtotime($studentedit['fee_last_date'])) : ''; ?>" class="form-control indatepicker">
                  <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="field-1" class="control-label">Late Fee Charges</label>
                <input type="text" class="form-control number" value="<?php echo isset($studentedit['fee_late_charge'])? $studentedit['fee_late_charge'] : ''; ?>" id="fee_late_charge1" name="fee_late_charge1" title="Late Fee Charges required" placeholder="Late Fee Charges">
              </div>
            </div>
         
            <div class="col-md-4">
              <div class="form-group">
                <label for="field-1" class="control-label">Transaction Id</label>
                <input type="text" class="form-control " value="<?php echo isset($studentedit['transaction_id'])? $studentedit['transaction_id'] : ''; ?>" id="transaction_id1" name="transaction_id1" title="Transaction Id required" placeholder="Transaction Id">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="field-1" class="control-label">Transaction Date </label>
                <div class='input-group date'>
                  <input id="transaction_date1" name="transaction_date1"type="text" value="<?php echo  isset($studentedit['transaction_date'])? date('d-m-Y',strtotime($studentedit['transaction_date'])) : ''; ?>" class="form-control indatepicker">
                  <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> </div>
              </div>
            </div>
          </div>
          <div class="row">
          <div class="col-md-4">
              <div class="form-group">
                <label for="field-1" class="control-label">Physically handicapped<span class="mandatory">*</span></label>
                <select id="physically_handicap1" name="physically_handicap1" class="form-control   ">
                <option value="no" <?php echo (isset($studentedit['cm_physically_handicap']) && $studentedit['cm_physically_handicap'] == "no") ? "selected":''; ?>>No</option>
                  <option value="yes" <?php echo (isset($studentedit['cm_physically_handicap']) && $studentedit['cm_physically_handicap'] == "yes") ? "selected":''; ?>>Yes</option>
                  
                </select>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="field-1" class="control-label">Date of admission </label>
                <div class='input-group date'>
                  <input id="date_of_admission1" value="<?php echo isset($studentedit['cm_date_of_admission'])? date('d-m-Y',strtotime($studentedit['cm_date_of_admission'])) : ''; ?>" name="date_of_admission1"type="text" value="" class="form-control indatepicker">
                  <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="field-1" class="control-label">Enrolment form number</label>
                <input type="text" class="form-control " value="<?php echo isset($studentedit['cm_enrollment_no'])? $studentedit['cm_enrollment_no'] : ''; ?>" id="enrollment_no1" name="enrollment_no1" title="Enrolment form number required" placeholder="Enrolment form number">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="field-1" class="control-label">PRN No.</label>
                <input type="text" class="form-control number" value="<?php echo isset($studentedit['cm_prn_no'])? $studentedit['cm_prn_no'] : ''; ?>" id="prn_no1" name="prn_no1" title="PRN No. " placeholder="PRN No.">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label  class="control-label">Name of Previous School / College</label>
                <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2", "values"=>$this->app->college_dd), "cm_prev_school_college");?>
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
	                	$exampasssql="SELECT * from cm_last_exam where student_id = ".$studentedit['id'];
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
					  <td><? $this->app->htmlBuilder->buildTag("select", array("class"=>"required str-cls-name","name"=>"str_name[]", "values"=>$stream,"title"=>"Stream Required","data-cid"=>$k+1,"selected"=>$examdata['stream_name']) );?></td>
                      <td><? $this->app->htmlBuilder->buildTag("select", array("class"=>"brd-get-new exam-chnage-pec brdname required","name"=>"board_name[]", "values"=>$this->app->brd_dd,"data-cid"=>1,"title"=>"Board Required","selected"=>$examdata['board_name1']));?><!--<input type="text" name="board_name[]" id="board_name_<?php echo $k+1;?>" value="<?php echo (isset($examdata['board_name1'])) ? $examdata['board_name1']:''; ?>" />--><a class="btn btn-success btn-default-custom md-trigger pull-left" href="javascript:void()" data-toggle="modal" data-target="#con-close-modal2"><i class="fa fa-plus"></i></a></td>
                      <td><? $this->app->htmlBuilder->buildTag("select", array("class"=>"sch-get-new required","name"=>"school_name[]", "values"=>$this->app->sch_dd,"data-cid"=>1,"title"=>"School Required","selected"=>$examdata['school_name1']));?><!--<input type="text" name="school_name[]" id="school_name_<?php echo $k+1;?>" value="<?php echo (isset($examdata['school_name1'])) ? $examdata['school_name1']:''; ?>" />--><a class="btn btn-success btn-default-custom md-trigger pull-left" href="javascript:void()" data-toggle="modal" data-target="#con-close-modal3"><i class="fa fa-plus"></i></a></td>
                      <td><!--<input type="text" name="pass_year[]" id="pass_year_<?php echo $k+1;?>" value="<?php echo (isset($examdata['pass_year1'])) ? $examdata['pass_year1']:''; ?>" class="indatepicker1" />-->
					  <? $this->app->htmlBuilder->buildTag("select", array("name"=>"range_month[]","class"=>"mnth-cls-name","values"=>$months,"selected"=>$new_pass_data[0]));?>
						<? $this->app->htmlBuilder->buildTag("select", array("name"=>"range_year[]","class"=>"year-cls-name", "values"=>range(1989,date("Y")),"selected"=>$new_pass_data[1]));?></td>
                      <td><input type="text" name="exam_seat_no[]" id="exam_seat_no_<?php echo $k+1;?>" value="<?php echo (isset($examdata['exam_no1'])) ? $examdata['exam_no1']:''; ?>" class=" required" /></td>
                      <td><input type="text" name="cert_no[]" id="cert_no_<?php echo $k+1;?>"  value="<?php echo (isset($examdata['certi_no1'])) ? $examdata['certi_no1']:''; ?>" class=" required"/></td>
                      <td><input type="text" name="total_marks[]" id="total_marks_<?php echo $k+1;?>" class="change-perc required"  value="<?php echo (isset($examdata['total_marks1'])) ? $examdata['total_marks1']:''; ?>"/></td>
					  <td><input type="text" name="obtaine_marks[]" id="obtaine_marks_<?php echo $k+1;?>" class="change-perc required" data-cid="<?php echo $k+1;?>" value="<?php echo (isset($examdata['obtained_marks_new'])) ? $examdata['obtained_marks_new']:''; ?>" /></td>
                      <td><input type="text" name="percen[]" id="percen_<?php echo $k+1;?>"  value="<?php echo (isset($examdata['percen_new'])) ? $examdata['percen_new']:''; ?>" class=" required" readonly /></td>
					  <td><input type="text" name="grade[]" id="grade_<?php echo $k+1;?>" value="<?php echo (isset($examdata['cgpa_grade'])) ? $examdata['cgpa_grade']:''; ?>" class=" required" /></td>
					  <td><input type="text" class="chng-pec " name="pec_no[]" id="pec_no_<?php echo $k+1;?>" value="<?php echo (isset($examdata['pec_no_new'])) ? $examdata['pec_no_new']:''; ?>" readonly /></td>
                    </tr>
                    <?php	
						}
						}else
						{
							?>
                            <tr id="klon1">
                      <!--<td>1</td>-->
                      <td><? $this->app->htmlBuilder->buildTag("select", array("class"=>"required exam-chnage-pec exmname","name"=>"exam_name[]", "values"=>$this->app->qlf_dd,"data-cid"=>1,"title"=>"Class Required") );?><!--<input type="text" name="exam_name[]" id="exam_name_1"   />--></td>
                      <td><? $this->app->htmlBuilder->buildTag("select", array("class"=>"required str-cls-name","name"=>"str_name[]", "values"=>$stream,"title"=>"Stream Required") );?></td>
					  <td><? $this->app->htmlBuilder->buildTag("select", array("class"=>"brd-get-new exam-chnage-pec brdname required","name"=>"board_name[]", "values"=>$this->app->brd_dd,"data-cid"=>1,"title"=>"Board Required"));?><!--<input type="text" name="board_name[]" id="board_name_1"  />--><a class="btn btn-success btn-default-custom md-trigger pull-left" href="javascript:void()" data-toggle="modal" data-target="#con-close-modal2"><i class="fa fa-plus"></i></a></td>
                      <td><? $this->app->htmlBuilder->buildTag("select", array("class"=>"sch-get-new required","name"=>"school_name[]", "values"=>$this->app->sch_dd,"data-cid"=>1,"title"=>"School Required","selected"=>$examdata['school_name']));?><!--<input type="text" name="school_name[]" id="school_name_1"  />--><a class="btn btn-success btn-default-custom md-trigger pull-left" href="javascript:void()" data-toggle="modal" data-target="#con-close-modal3"><i class="fa fa-plus"></i></a></td>
                      <td><!--<input type="text" name="pass_year[]" id="pass_year_1" class="indatepicker1" />--><? $this->app->htmlBuilder->buildTag("select", array("name"=>"range_month[]","class"=>"mnth-cls-name","values"=>$months));?>
						<? $this->app->htmlBuilder->buildTag("select", array("name"=>"range_year[]","class"=>"year-cls-name", "values"=>range(1989,date("Y"))));?></td>
                      <td><input type="text" name="exam_seat_no[]" id="exam_seat_no_1" class=" required"  /></td>
                      <td><input type="text" name="cert_no[]" id="cert_no_1" class=" required" /></td>
                      <td><input type="text" name="total_marks[]" id="total_marks_1" class="change-perc required" /></td>
                      <td><input type="text" name="obtaine_marks[]" id="obtaine_marks_1" class="change-perc required" data-cid="1" /></td>
					  <td><input type="text" name="percen[]" id="percen_1" class=" required" readonly /></td>
                      <td><input type="text" name="grade[]"  id="grade_1" class=" required"  /></td>
					  <td><input type="text" class="chng-pec " name="pec_no[]"  id="pec_no_1" readonly /></td>
                    </tr>
                            <?php						
						}
					}else
					{
                	?>
                    <tr id="klon1">
                      <!--<td>1</td>-->
                      <td><? $this->app->htmlBuilder->buildTag("select", array("class"=>"required exam-chnage-pec exmname","name"=>"exam_name[]", "values"=>$this->app->qlf_dd,"data-cid"=>1,"title"=>"Class Required") );?><!--<input type="text" name="exam_name[]" id="exam_name_1"   />--></td>
                      <td><? $this->app->htmlBuilder->buildTag("select", array("class"=>"required str-cls-name","name"=>"str_name[]", "values"=>$stream,"title"=>"Stream Required") );?></td>
					  <td><? $this->app->htmlBuilder->buildTag("select", array("class"=>"brd-get-new exam-chnage-pec brdname required","name"=>"board_name[]", "values"=>$this->app->brd_dd,"data-cid"=>1,"title"=>"Board Required") );?><!--<input type="text" name="board_name[]" id="board_name_1"  />--><a class="btn btn-success btn-default-custom md-trigger pull-left" href="javascript:void()" data-toggle="modal" data-target="#con-close-modal2"><i class="fa fa-plus"></i></a></td>
                      <td><? $this->app->htmlBuilder->buildTag("select", array("class"=>"sch-get-new required","name"=>"school_name[]", "values"=>$this->app->sch_dd,"data-cid"=>1,"title"=>"School Required"));?><!--<input type="text" name="school_name[]" id="school_name_1"  />--><a class="btn btn-success btn-default-custom md-trigger pull-left" href="javascript:void()" data-toggle="modal" data-target="#con-close-modal3"><i class="fa fa-plus"></i></a></td>
                      <td>
					  <!--<input type="text" name="pass_year[]" id="pass_year_1" class="indatepicker1"/>-->
					  
						<? $this->app->htmlBuilder->buildTag("select", array("name"=>"range_month[]","class"=>"mnth-cls-name","values"=>$months));?>
						<? $this->app->htmlBuilder->buildTag("select", array("name"=>"range_year[]","class"=>"year-cls-name", "values"=>range(1989,date("Y"))));?>
					  
					  </td>
                      <td><input type="text" name="exam_seat_no[]" id="exam_seat_no_1" class=" required" /></td>
                      <td><input type="text" name="cert_no[]" id="cert_no_1" class=" required" /></td>
                      <td><input type="text" name="total_marks[]" id="total_marks_1" class="change-perc required"  /></td>
                      <td><input type="text" name="obtaine_marks[]" id="obtaine_marks_1" class="change-perc required" data-cid="1"  /></td>
					  <td><input type="text" name="percen[]" id="percen_1" class=" required" readonly /></td>
                      <td><input type="text" name="grade[]"  id="grade_1" class=" required" /></td>
					  <td><input type="text" class="chng-pec " name="pec_no[]"  id="pec_no_1" readonly /></td>
                    </tr>
                    <?php } ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="panel-footer">
          <button class="btn btn-primary mr5" type="submit">Submit</button>
          <button type="reset" class="btn btn-default">Reset</button>
        </div>
      </div>
      <?=$this->app->htmlBuilder->closeForm()?>
    </div>
  </div>
</div>
