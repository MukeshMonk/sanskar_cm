
<style>
.btn-group-sm>.btn, .btn-sm {
   font-size: 10px;
}
 .prev-sign_img .fileupload-preview img
{    width: 100%;
    height: 30px;
}
</style>
<div class="page-content">
<div class="container-fluid mt50 dizzilist-block">
  <div class="col-xxl-12 col-md-12">
    <? $this->app->htmlBuilder->buildTag("form", array("action"=>"","class"=>""), "frm_staff");?>
    <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>"staff_form"), "connector");?>
    <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>$this->app->getGetVar("record_id")), "record_id");?>
    <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>$this->app->getGetVar("item_id")), "update_id");?>
   <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden","value"=>$this->app->last_id),"last_id");?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">Staff Registration Form </h4>
      </div>
      <div class="panel-body">
        <?php
      $studentedit = isset($this->app->rsstudents)?$this->app->rsstudents:'';
      ?>
        <div id="staff_response"></div>
       
        <div class="row">
          <div class="col-md-10">
            <div class="row">
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

              <label for="field-1" class="control-label">Date of Joining <span class="mandatory">*</span></label>

              <div class='input-group date'>

               
                <? $this->app->htmlBuilder->buildTag("input", array("type"=>"text","class"=>"form-control  indatepicker2 required", "title"=>"Please Select Joining Date","placeholder"=>"Date of Joining"), "joining_date");?>

                <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> </div>

            </div>
            </div>   
            <div class="col-md-4">
            <div class="form-group">

              <label for="field-1" class="control-label">Login Id<span class="mandatory">*</span></label>
				 <? $this->app->htmlBuilder->buildTag("input", array("type"=>"text","class"=>"form-control   required", "title"=>"Login Id Required","placeholder"=>"Login Id"), "login_id");?>
              

            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">

              <label for="field-1" class="control-label">Mobile No<span class="mandatory">*</span></label>

               <? $this->app->htmlBuilder->buildTag("input", array("type"=>"text","class"=>"form-control   required number", "title"=>"Valid Mobile No Required","placeholder"=>"Mobile No"), "mobile_no");?>

            </div>
          </div>
              <div class="col-md-4">
              <div class="form-group">

              <label for="field-1" class="control-label">Date of Birth <span class="mandatory">*</span></label>

              <div class='input-group date'>

                
				<? $this->app->htmlBuilder->buildTag("input", array("type"=>"text","class"=>"form-control   required indatepicker2", "title"=>"Date of Birth Required","placeholder"=>"Date of Birth"), "dob");?>
                <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> </div>

            </div>
              </div>
              <div class="col-md-4">
            <div class="form-group"> 
            <label for="field-1" class="control-label">Gender<span class="mandatory">*</span></label>
              <div class="checkbox col-md-6 chk-padding">
                <input type="radio" id="male" name="gender" value="male" <?php echo  (isset($studentedit['gender']) && $studentedit['gender'] == "male" )? "checked" : 'checked'; ?> required="required" title="Please Select Gender">
                <label for="male">Male</label>
              </div>
              <div class="checkbox col-md-6 chk-padding">
                <input type="radio" id="female" name="gender" value="female" <?php echo  (isset($studentedit['gender']) && $studentedit['gender'] == "female" )? "checked" : ''; ?>>
                <label for="female">Female</label>
              </div>
            </div>
          </div> 
              <div class="col-md-4">
            <div class="form-group">

	              <label for="field-1" class="control-label">Personal Email<span class="mandatory">*</span></label>
				<? $this->app->htmlBuilder->buildTag("input", array("type"=>"text","class"=>"form-control   required ", "title"=>"Email Required","placeholder"=>"Email"), "per_email");?>
	              

	            </div>
              
            </div>
              
          
            </div>
          </div>
          <div class="col-md-2">
          <?php
	              if(file_exists(ABS_PATH.$this->app->get_user_config("staff_image").$studentedit['staff_image']) && $studentedit['staff_image']!="")
				  { 
				  	$student_image=SERVER_ROOT.$this->app->get_user_config("staff_image").$studentedit['staff_image'];
				  }
				  else
				  {
				  	$student_image=CMX_ROOT.'/img/avatar-1-256.png';
				  }
	              ?>
          
            <div class="form-group">
              <label class="col-sm-12 control-label">Staff Image</label>
              <div class="col-sm-12">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                  <div class="fileupload-new thumbnail" style="width: 100%;"><img src="<?php echo $student_image;?>" style="width:100%;" > <input type="hidden" name="staff_h_name" value="<?php echo  isset($studentedit['staff_image'])? $studentedit['staff_image'] : ''; ?>"/></div>
                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100%; max-height: 125px; line-height: 20px;"></div>
                  <div> <span class="btn btn-file btn-primary  btn-sm pull-left"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                  
                    <input name="staff_image" id="staff_image" type="file" class="span8 " />
                    </span> <a href="#" class="btn btn-primary fileupload-exists  btn-sm pull-right" data-dismiss="fileupload">Remove</a> </div>
                </div>
              </div>
            </div>
          </div>
          </div>
          <div class="row">
            <div class="col-md-4">
            <div class="form-group">

              <label for="field-1" class="control-label">Biometric Code</label>

              
              <? $this->app->htmlBuilder->buildTag("input", array("type"=>"text","class"=>"form-control ", "title"=>"Biometric code","placeholder"=>"Biometric Code"), "biometricd_code");?>

            </div>
          </div>
           
            
			
            <div class="col-md-6">
            <div class="form-group">

		          <label  class="control-label">Designation<span class="mandatory">*</span></label>

		           <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2 required", "values"=>$this->app->designations_dd,"title"=>"Please Select Designation"), "designation");?>

				</div>
          </div>
            <div class="col-md-2">
          <?php
	              if(file_exists(ABS_PATH.$this->app->get_user_config("staff_image").$studentedit['sing_image']) && $studentedit['sing_image']!="")
				  { 
				  	$student_image=SERVER_ROOT.$this->app->get_user_config("staff_image").$studentedit['sing_image'];
				  }
				  else
				  {
				  	$student_image=CMX_ROOT.'/img/sample_sign.jpg';
				  }
	              ?>
          
            <div class="form-group prev-sign_img">
              <label class="col-sm-12 control-label">Staff Sign Image</label>
              <div class="col-sm-12">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                  <div class="fileupload-new thumbnail" style="width: 100%;"><img src="<?php echo $student_image;?>" style="width:100%;" height="30"><input type="hidden" name="staff_s_h_name" value="<?php echo  isset($studentedit['sing_image'])? $studentedit['sing_image'] : ''; ?>"/> </div>
                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100%; max-height: 125px; line-height: 20px;"></div>
                  <div> <span class="btn btn-file btn-primary  btn-sm pull-left"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span>
                  
                    <input name="sing_image" id="sing_image" type="file" class="span8 " />
                    </span> <a href="#" class="btn btn-primary fileupload-exists  btn-sm pull-right" data-dismiss="fileupload">Remove</a> </div>
                </div>
              </div>
            </div>
          </div>
         
          
            
            <div class="col-md-4">
	            <div class="form-group">

		          <label  class="control-label">Department</label>

		           <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2", "values"=>$this->app->branch_dd), "department");?>

				</div>

            </div>
         
         
            <div class="col-md-4">
              <div class="form-group">

		          <label  class="control-label">User Type</label>
				<? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control", "values"=>array("test1"=>"Test1","test2"=>"Test1")), "user_type");?>
		          


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
         
            
          <div class="col-md-4">
            <div class="form-group">

              <label for="field-1" class="control-label">Sequence No</label>

              
               <? $this->app->htmlBuilder->buildTag("input", array("type"=>"text","class"=>"form-control ", "title"=>"Sequence Required","placeholder"=>"Sequence"), "sequence_no");?>

            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group"> 
            <label for="field-1" class="control-label">Marital Status</label>
              <div class="checkbox col-md-6 chk-padding">
                <input type="radio" id="married" name="marital_status" value="married" <?php echo  (isset($studentedit['marital_status']) && $studentedit['marital_status'] == "married" )? "checked" : ''; ?>  required="required" title="Marital Status required">
                <label for="married">Married</label>
              </div>
              <div class="checkbox col-md-6 chk-padding">
                <input type="radio" id="unmarried" name="marital_status" value="unmarried" <?php echo  (isset($studentedit['marital_status']) && $studentedit['marital_status'] == "unmarried" )? "checked" : 'checked'; ?>>
                <label for="unmarried">UnMarried</label>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">

		          <label  class="control-label">Reporting Authority</label>
				<? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control", "values"=>array("1"=>"Test1","2"=>"Test1")), "reporting_authority");?>
		          
				</div>
          </div>
          
          
            
          
          
          <div id="mapop" style="display:none;"></div>
          
          
         
          <div class="col-md-4">
            <div class="form-group">

              <label for="field-1" class="control-label">Birth Place</label>

              
              <? $this->app->htmlBuilder->buildTag("input", array("type"=>"text","class"=>"form-control ", "title"=>"Birth Place Required","placeholder"=>"Birth Place"), "birth_place");?>

            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">

              <label for="field-1" class="control-label">Nationality</label>

              
               <? $this->app->htmlBuilder->buildTag("input", array("type"=>"text","class"=>"form-control ", "title"=>"Nationality Required","placeholder"=>"Nationality"), "nationality");?>

            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">

              <label for="field-1" class="control-label">Address Line 1<span class="mandatory">*</span></label>

              
              <? $this->app->htmlBuilder->buildTag("input", array("type"=>"text","class"=>"form-control required", "title"=>"Address Line 1 Required","placeholder"=>"Address Line 1"), "address_line1");?>
              

            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">

              <label for="field-1" class="control-label">Address Line 2</label>

              
              <? $this->app->htmlBuilder->buildTag("input", array("type"=>"text","class"=>"form-control ", "title"=>"Address Line 2 Required","placeholder"=>"Address Line 2"), "address_line2");?>

            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">

              <label for="field-1" class="control-label">Address Line 3</label>

             
              <? $this->app->htmlBuilder->buildTag("input", array("type"=>"text","class"=>"form-control ", "title"=>"Address Line 3 Required","placeholder"=>"Address Line 3"), "address_line3");?>

            </div>
          </div>
          
       
        <div class="col-md-4">
            <div class="form-group">

              <label for="field-1" class="control-label">City<span class="mandatory">*</span></label>

             
              <? $this->app->htmlBuilder->buildTag("input", array("type"=>"text","class"=>"form-control required", "title"=>"City Required","placeholder"=>"City"), "city");?>

            </div>
          </div>
          
          <div class="col-md-4">
            <div class="form-group">

              <label for="field-1" class="control-label">State<span class="mandatory">*</span></label>

             
              <? $this->app->htmlBuilder->buildTag("input", array("type"=>"text","class"=>"form-control required", "title"=>"State Required","placeholder"=>"State"), "state");?>

            </div>
          </div>
          
          <div class="col-md-4">
            <div class="form-group">

              <label for="field-1" class="control-label">Country<span class="mandatory">*</span></label>

             
              <? $this->app->htmlBuilder->buildTag("input", array("type"=>"text","class"=>"form-control required", "title"=>"Country Required","placeholder"=>"Country"), "country");?>

            </div>
          </div>
       
          
          <div class="col-md-4">
	            <div class="form-group">

              <label for="field-1" class="control-label">PAN No</label>

              
              <? $this->app->htmlBuilder->buildTag("input", array("type"=>"text","class"=>"form-control", "title"=>"PAN No Required","placeholder"=>"PAN No"), "pan_no");?>

            </div>
            </div>
       
            <div class="col-md-4">
              <div class="form-group">

              <label for="field-1" class="control-label">Election Card No</label>

              
              <? $this->app->htmlBuilder->buildTag("input", array("type"=>"text","class"=>"form-control ", "title"=>"Election Card No Required","placeholder"=>"Election Card No"), "election_card_no");?>

            </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">

              <label for="field-1" class="control-label">Aadhar No<span class="mandatory">*</span></label>

              
              
			  <? $this->app->htmlBuilder->buildTag("input", array("type"=>"text","class"=>"form-control required", "title"=>"Aadhar No Required","placeholder"=>"Aadhar No"), "aadhar_card_no");?>

            </div>
            </div>
            <div class="col-md-4">
		        <div class="form-group">

              <label for="field-1" class="control-label">Date of Aniversary</label>

              <div class='input-group date'>

                
                 <? $this->app->htmlBuilder->buildTag("input", array("type"=>"text","class"=>"form-control indatepicker2", "title"=>"Date of Aniversary Required","placeholder"=>"Date of Aniversary"), "date_aniversary");?>

                <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> </div>

            </div>
	        </div>
            <div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">Father Name</label>

             
              <? $this->app->htmlBuilder->buildTag("input", array("type"=>"text","class"=>"form-control", "title"=>"Father Name Required","placeholder"=>"Father Name"), "father_name");?>

            </div>

          </div>
          <div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">Father Contact No</label>

              
              <? $this->app->htmlBuilder->buildTag("input", array("type"=>"text","class"=>"form-control", "title"=>"Father Contact No Required","placeholder"=>"Father Contact No"), "f_contact_no");?>

            </div>

          </div>
          <?php /*?><div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">Mother Name</label>

              <input type="text" class="form-control" id="mother_name" name="mother_name" title="Mother Nam Required" placeholder="Mother Nam">
              <? $this->app->htmlBuilder->buildTag("input", array("type"=>"text","class"=>"form-control", "title"=>"Father Name Required","placeholder"=>"Father Name"), "father_name");?>

            </div>

          </div>
          <div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">Mother Contact No</label>

              <input type="text" class="form-control" id="m_contact_no" name="m_contact_no" title="Mother Contact No Required" placeholder="Mother Contact No">
              <? $this->app->htmlBuilder->buildTag("input", array("type"=>"text","class"=>"form-control", "title"=>"Father Name Required","placeholder"=>"Father Name"), "father_name");?>

            </div>

          </div><?php */?>
          <div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">Spouse Name</label>

             
              <? $this->app->htmlBuilder->buildTag("input", array("type"=>"text","class"=>"form-control", "title"=>"Spouse Name Required","placeholder"=>"Spouse Name"), "spouce_name");?>

            </div>

          </div>
          <div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">Spouse Contact No</label>

             
              <? $this->app->htmlBuilder->buildTag("input", array("type"=>"text","class"=>"form-control", "title"=>"Spouse Contact No Required","placeholder"=>"Spouse Contact No"), "s_contact_no");?>

            </div>

          </div>
          

          <div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">Bank Branch</label>

              <? $this->app->htmlBuilder->buildTag("input", array("type"=>"text","class"=>"form-control", "title"=>"Bank Branch Required","placeholder"=>"Bank Branch"), "bank_branch");?>

            </div>

          </div>
          <div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">Bank Name<span class="mandatory">*</span></label>
              <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2 required", "values"=>$this->app->bank_dd), "bank_name");?>
            </div>
          </div>

           <div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">Account No<span class="mandatory">*</span></label>

              
              <? $this->app->htmlBuilder->buildTag("input", array("type"=>"text","class"=>"form-control required", "title"=>"Account No Required","placeholder"=>"Account No"), "acc_no");?>

            </div>

          </div>      
<div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">PF No</label>

             
              <? $this->app->htmlBuilder->buildTag("input", array("type"=>"text","class"=>"form-control", "title"=>"PF No Required","placeholder"=>"PF No"), "pf_no");?>

            </div>

          </div>
          <div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">Salary Payment Type</label>

              <select id="salary_p_type" name="salary_p_type" class="form-control required">

              	<option value="test1">Test1</option>

              	<option value="test2">Test2</option>

              </select>

            </div>

          </div>


          <div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">ESIC No</label>

             
              <? $this->app->htmlBuilder->buildTag("input", array("type"=>"text","class"=>"form-control", "title"=>"ESIC No Required","placeholder"=>"ESIC No"), "esic_no");?>

            </div>

          </div>

               

          <div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">Is Intercommunication</label>

              

              <input type="checkbox" class="form-control" id="is_intercommunication" name="is_intercommunication" value="on" <?php echo  (isset($studentedit['is_intercommunication']) && $studentedit['is_intercommunication'] == "on" )? 'checked="checked" ' : ''; ?> />

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



