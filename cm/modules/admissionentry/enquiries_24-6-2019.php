<style>
.pac-container
{
z-index:9999 !important;	
}
input[type=text]:focus {
    border: 1px solid #00a8ff;
}
input[type=text]:active {
    border: 1px solid #00a8ff;
}
input[type=text]:hover {
    border: 1px solid #00a8ff;
}
</style>
<div class="page-content">

  <div class="container-fluid mt50 dizzilist-block">

    <div class="col-xxl-12 col-md-12">

      <div class="panel panel-default">

        <div class="panel-heading">

          <h4 class="panel-title mb0">Enquiries </h4>

          <ol class="breadcrumb breadcrumb-simple">

            <li><a href="javascript:void(0);"><?php echo $this->app->module_title?></a></li>

            <li><a href="javascript:void(0);">Setup</a></li>

            <li class="active">List</li>

          </ol>

        </div>

       

        <div class="panel-body">
			<div class="filters-top">
      <div class="row">
       <div class="col-md-2">
        <div class="form-group">
         <label for="field-1" class="control-label">Academic Year</label>
          <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control sel_year gen_conditionalval", "values"=>$this->app->academic_year_dd), "acd_year_sel");?>
        </div>
       </div>
       <div class="col-md-3">
        <div class="form-group">
         <label for="field-1" class="control-label">Class.</label>
           <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control sel_class gen_conditionalval", "values"=>$this->app->class_dd), "class_sel");?>

        </div>
       </div>
       
       <div class="col-md-3">
        <div class="form-group">
         <label class="control-label">Status</label>
         <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control sel_class gen_conditionalval", "values"=>array(""=>"Select Status","Enquire Done"=>"Enquire Done","Online Pending"=>"Online Pending","Deleted"=>"Deleted")), "status_sel");?>

        </div>
       </div>
	   <?php /*?><div class="col-md-3">
        <div class="form-group">
         <label class="control-label">Student Type</label>
         <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control sel_class gen_conditionalval", "values"=>array("A"=>"A","B"=>"B")), "stud_type");?>

        </div>
       </div><?php */?>
       
       <div class="col-md-2">
        <div class="form-group">
         <label for="field-1" class="control-label">From Date</label>
         <div class="input-group date">
          <input id="filter_date" name="filter_date" type="text" value="" class="form-control indatepicker2 gen_conditionalval">
          <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> </div>
        </div>
       </div>
	   <div class="col-md-2">
        <div class="form-group">
         <label for="field-1" class="control-label">To Date</label>
         <div class="input-group date">
          <input id="filter_date2" name="filter_date2" type="text" value="" class="form-control indatepicker2 gen_conditionalval">
          <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> </div>
        </div>
       </div>
       
       
      </div>
     </div>
          <div class="row mb20">

            <div class="col-md-8 col-sm-12 search-container padding-bottom15">

              <div class="input-group"> <span class="input-group-btn ui-select">
                <select class="form-control" id="search_by">
				  <option value="cm_enquiries.first_name">Name</option>
				  <option value="cm_enquiries.enq_date">Enquiry Date</option>
                </select>
                </span>
                <input type="text" id="serach_string" name="input1-group3" class="form-control" placeholder="Serach Name or Date(DD-MM-YYYY)">

                <span class="input-group-btn">

                <button type="button" class="btn btn-primary" id="filter_search"><i class="fa fa-search"></i> </button>

                </span> </div>

            </div>

            

            <div class="col-md-4 col-sm-12 actions-container padding-bottom15"> <a class="btn btn-success btn-default-custom md-trigger pull-left" href="javascript:voide()" data-toggle="modal" data-target="#con-close-modal"><i class="fa fa-plus"></i> Add New</a> <a class="btn btn-danger btn-default-custom pull-right"  id="delete_action"  href="javascript:void(0);" data-act="muliple_delete" data-connector="delselected_enquiries"  title="Delete"><i class="fa fa-trash-o"></i></a> <a class="btn btn-default btn-default-custom pull-right"  id="delete_action"  href="javascript:void(0);" onclick="dizzi_exporter('1','enquiries_export');"><i class="fa fa-download"></i></a> </div>

          </div>

          <table class="table table-striped table-bordered" id="cf_table_list" data-method="enquiries">

            <thead>

              <tr>

                <th  style="width:1%;"> <label class="custom-checkbox-item">

                    <input name="checkbox" type="checkbox" class="custom-checkbox checkAll" />

                    <span class="custom-checkbox-mark"></span> </label>

                  <input type="hidden" name="filters" id="filters" value="" />

                  <input type="hidden" name="sort_colums" id="sort_colums" value="" />

                  <input type="hidden" name="sort_field" id="sort_field" value="" />

                  <input type="hidden" name="sort_field_value" id="sort_field_value" value="" />
					<input type="hidden" name="conditional_val" id="conditional_val" value='{"acd_year_sel":"<?php echo $this->app->academic_year_default_int;?>"}' />
                </th>

                <th style="width:5%;" class="sort-column">Sr.</th>

                <th style="width:12%;" class="sort-column">Status<span class="sort-wrap"> <a href="#" class="asc" data-field="cm_enquiries.status" ><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_enquiries.status" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>

                <th style="width:12%;" class="sort-column">Academic Year</th>

                <th style="width:12%;" class="sort-column">Class Name<span class="sort-wrap"> <a href="#" class="asc" data-field="cm_classes.name" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_classes.name" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>

                <th style="width:12%;" class="sort-column">Enquiries No<span class="sort-wrap"> <a href="#" class="asc" data-field="cm_enquiries.id" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_enquiries.id" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>

                <th style="width:12%;" class="sort-column">Name<span class="sort-wrap"> <a href="#" class="asc" data-field="cm_enquiries.last_name" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_enquiries.last_name" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>

                <th style="width:12%;" class="sort-column">Mobile</th>

                <th style="width:12%;" class="sort-column">Enquiry Date<span class="sort-wrap"> <a href="#" class="asc" data-field="cm_enquiries.enq_date" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_enquiries.enq_date" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>

                

                <th style="width:5%;">Action</th>

              </tr>

            </thead>

            <tbody>

            </tbody>

          </table>

          <div class="row">

            <div class="col-xs-6">

              <div class="dataTables_info" id="paginate_counter"></div>

            </div>

            <div class="col-xs-6">

              <div class="dataTables_paginate paging_simple_numbers" id="paginate_me"> </div>

            </div>

          </div>

        </div>

        

        <!-- panel-body --> 

        

      </div>

    </div>

  </div>

  <!--.container-fluid--> 

</div>

<!--.page-content--> 



<!--****##### MODALS ######****-->



<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">

  <div class="modal-dialog dialog-width-max">

    <div class="modal-content">

      <? $this->app->htmlBuilder->buildTag("form", array("action"=>"","class"=>""), "frm_enquiries");?>

      <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>"enquiries_form"), "connector");?>

      <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>$this->record_id), "record_id");?>

     

        <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden","value"=>$this->app->last_id1),"last_id");?>

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

        <h4 class="modal-title"><span>Add</span> <strong>enquiries Admission</strong> </h4>

      </div>

      <div class="modal-body">

        <div id="staff_response"></div>

        <div class="row"> 

        <div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">Enquiry Date<span class="mandatory">*</span></label>

              <div class='input-group date'>

                <input id="enq_date" name="enq_date"type="text" value="" class="form-control indatepicker" readonly="readonly">

                <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> </div>

            </div>

          </div>         

            <div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">Enquiries No.</label>

              <input type="text" class="form-control " id="enq_no" name="enq_no" title="Enquiries No Required" placeholder="Auto Generate" readonly="readonly" >

            </div>

          </div>

          <div class="col-md-4">

		        <div class="form-group">

		          <label  class="control-label">Academic Year<span class="mandatory">*</span></label>

		           <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control required", "values"=>$this->app->academic_year_dd,"title"=>"Academic Year Required"), "acd_year");?>

				</div>

	        </div>

        </div> 

        <div class="row"> 

        <div class="col-md-4">

		        <div class="form-group">

		          <label  class="control-label">Class<span class="mandatory">*</span></label>

		           <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control required", "values"=>$this->app->class_dd,"title"=>"Class Required"), "enq_class");?>

				</div>

	        </div>         

        </div>

        <div class="row">
		<div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">Last Name<span class="mandatory">*</span></label>

              <input type="text" class="form-control required" id="last_name" name="last_name1" title="Last Name Required" placeholder="Last Name" >

            </div>

          </div>
        <div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">First Name<span class="mandatory">*</span></label>

              <input type="text" class="form-control required" id="first_name" name="first_name1" title="First Name Required" placeholder="First Name">

            </div>

          </div>

          <div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">Middle Name</label>

              <input type="text" class="form-control" id="middle_name" name="middle_name1"  placeholder="Middle Name">

            </div>

          </div>

          

        </div>

        <div class="row">          

          

          <div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">Date of Birth<span class="mandatory">*</span></label>

              <div class='input-group date'>

                <input id="dob" name="dob"type="text" value="" class="form-control indatepicker age_change">

                <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> </div>

            </div>

          </div>

          

          <div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">Age as on Today</label>

              <label for="field-1" class="control-label " id="today_age"></label>

              <input type="hidden"  id="age_today" name="age_today"   >

            </div>

          </div>

          <div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">Email Id</label>

              <input type="text" class="form-control" id="email_id" name="email_id" title="Email Id Required" placeholder="Email Id" >

            </div>

          </div>

        </div>

        <div class="row">

          <div class="col-md-4">

	            <div class="form-group">

		          <label  class="control-label">Student Type</label>

		          <select id="student_type" name="student_type" class="form-control">

              	<option value="A">A</option>

              	<option value="B">B</option>

              </select>

                  

				</div>

            </div>

          <div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">Mobile No.<span class="mandatory">*</span></label>

              <input type="text" class="form-control required" id="mobile_no" name="mobile_no" title="Mobile No Required" placeholder="Mobile No">

            </div>

          </div>

          <div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">Phone No</label>

              <input type="text" class="form-control " id="phone_no" name="phone_no" title="Phone No" placeholder="Phone No">

            </div>

          </div>

        </div> 

        <div class="row">          

          <div class="col-md-4">

	            <div class="form-group">

		          <label  class="control-label">Gender</label>

		          <select id="gender" name="gender" class="form-control">

              	<option value="Male">Male</option>

              	<option value="Female">Female</option>

              </select>

				</div>

            </div>

            <div class="col-md-4">

	            <div class="form-group">

		          <label  class="control-label">Category</label>

		          <select id="category" name="category" class="form-control">

              	<option value="open">Open</option>

              	<option value="sc">SC</option>

                <option value="st">ST</option>

              	<option value="sebc">SEBC</option>

                <option value="ob">Other Board</option>
			
              </select>

				</div>

            </div>

         <div class="col-md-4">

            <div class="form-group">

            <label  class="control-label">Physically Handicapped</label>

              <div class="checkbox col-md-6 chk-padding">

                <input type="radio" id="ph_yes" name="ph_status" value="ph_yes" >

                <label for="ph_yes">Yes</label>

              </div>

              <div class="checkbox col-md-6 chk-padding">

                <input type="radio" id="ph_no" name="ph_status" value="ph_no" >

                <label for="ph_no">No</label>

              </div>

            </div>

          </div>

        </div>

        <div class="row">

        <!--<div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">Father Name<span class="mandatory">*</span></label>

              <input type="text" class="form-control required" id="father_name" name="father_name" title="Father Name Required" placeholder="Father Name">

            </div>

          </div>-->

          <div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">Profession</label>

              <input type="text" class="form-control" id="profession" name="profession1" title="Profession Required" placeholder="Father Profession" >

            </div>

          </div>

            <div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">Mother Name<span class="mandatory">*</span></label>

              <input type="text" class="form-control required" id="mother_name" name="mother_name1" title="Mother Name Required" placeholder="Mother Name" >

            </div>

          </div>

        </div> 
        <div class="row">

          <div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">Address<span class="mandatory">*</span></label>

              <textarea class="form-control required" id="address" name="address1"></textarea>

            </div>

          </div>

          <div class="col-md-4">
			<div class="form-group">

              <label for="field-1" class="control-label">City<span class="mandatory">*</span></label>

              <input type="text" class="form-control required"   autocomplete="off"  id="city" name="city1" title="City Required" placeholder="City" onkeyup="loadcity('city','profile');" >

            </div>

          </div>
		<div id="mapop" style="display:none;"></div>
            
          <div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">District<span class="mandatory">*</span></label>

              <input type="text" class="form-control required" autocomplete="off" id="district" name="district1" title="District Required" placeholder="District" onkeyup="loadcity('district','profile');" >

            </div>

          </div>

        </div>

        <div class="row">

          <div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">State<span class="mandatory">*</span></label>

              <input type="text" class="form-control required"  id="profile_state" name="state1" title="State Required" placeholder="State" >

            </div>

          </div>

          <div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">Country<span class="mandatory">*</span></label>

              <input type="text" class="form-control required" id="profile_country" name="country1" title="Country Required" placeholder="Country" >

            </div>

          </div>

          <div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">PIN<span class="mandatory">*</span></label>

              <input type="text" class="form-control required" id="pin" name="pin" title="PIN Required" placeholder="PIN" >

            </div>

          </div>

        </div>

        <div class="row">

          <div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">Name of Last/Current school/college</label>
				
              <!--<input type="text" class="form-control required" id="name_last" name="name_last" title="Name Required" placeholder="Name of Last/Current school/college" >-->
			  <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control", "values"=>$this->app->sch_dd,"title"=>"Class Required"), "name_last");?>
<a class="btn btn-success btn-default-custom md-trigger pull-left" href="javascript:void()" data-toggle="modal" data-target="#con-close-modal2"><i class="fa fa-plus"></i></a>
            </div>

          </div>

          <!--<div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">School/Collage Address</label>

              <textarea class="form-control" id="last_address" name="last_address"></textarea>

            </div>

          </div>-->

          <div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">Percentage/Grade obtained</label>

              <input type="text" class="form-control" id="pr_grade" name="pr_grade" title="Percentage/Grade Required" placeholder="Percentage/Grade obtained" >

            </div>

          </div>
          <div class="col-md-4">

	            <div class="form-group">

		          <label  class="control-label">Status</label>

		          <select id="status" name="status" class="form-control">

              	<option value="Enquire Done">Enquire Done</option>

              	<option value="Online Pending">Online Pending</option>
                <!-- <option value="Registration Done - Fees Pending">Registration Done - Fees Pending</option>

              	<option value="Registration Done - Fees Paid">Registration Done - Fees Paid</option>
                <option value="Admission Granted">Admission Granted</option>

              	<option value="Admission Rejected">Admission Rejected</option> -->
                <option value="Deleted">Deleted</option>

              </select>

                  

				</div>

            </div>

	        

        </div>

        <div class="row">

          <div class="col-md-4">

	            <div class="form-group">

		          <label  class="control-label">Preferred mode of communication</label>

		          <select id="pre_comm" name="pre_comm" class="form-control">

              	<option value="Phone">Phone</option>

              	<option value="SMS">SMS</option>

                <option value="Email">Email</option>

              </select>

                  

				</div>

            </div>
			<div class="col-md-4">

	            <div class="form-group">

		          <label  class="control-label">Source of information</label>

		          <select id="src_info" name="src_info" class="form-control">

              	<option value="Friends">Friends</option>

              	<option value="Faculties">Faculties</option>

                <option value="News-papers">News-papers</option>

                 <option value="Hoardings">Hoardings</option>

                  <option value="Hoardings">Webiste</option>

                  <option value="Hoardings">Other</option>

              </select>

                  

				</div>

            </div>

          <div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">Remarks:</label>

              <textarea class="form-control" id="remarks" name="remarks1"></textarea>

            </div>

          </div>

	        

        </div>

        <div class="row">

          

          

	        

        </div>

       

      

        

          

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>

        <button type="submit" class="btn btn-info waves-effect waves-light" id="save_staff">Save</button>

      </div>

      <?=$this->app->htmlBuilder->closeForm()?>

    </div>

  </div>

</div>
<div id="con-close-modal2" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">

  <div class="modal-dialog">

    <div class="modal-content">

      <? $this->app->htmlBuilder->buildTag("form", array("action"=>"","class"=>""), "frm_lastschool");?>

      <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>"lastschool_form"), "connector");?>

      <? //$this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>$this->record_id), "record_id");?>

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

        <h4 class="modal-title"><span>Add</span> <strong>Last School/Collage</strong> </h4>

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

