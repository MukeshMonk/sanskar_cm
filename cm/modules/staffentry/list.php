<style>
.select2-selection__choice
{
	word-break: break-all;
}
</style>
<div class="page-content">

  <div class="container-fluid mt50 dizzilist-block">

    <div class="col-xxl-12 col-md-12">

      <div class="panel panel-default">

        <div class="panel-heading">

          <h4 class="panel-title mb0">Staffs </h4>

          <ol class="breadcrumb breadcrumb-simple">

            <li><a href="javascript:void(0);"><?php echo $this->app->module_title?></a></li>

            <li><a href="javascript:void(0);">Setup</a></li>

            <li class="active">Staff</li>

          </ol>

        </div>

        <div class="panel-body">

          <div class="row mb20">

            <div class="col-md-6 col-sm-12 search-container padding-bottom15">

              <div class="input-group"> <span class="input-group-btn ui-select">

                <select class="form-control" id="search_by">

                  <option value="name">Name</option>

                </select>

                </span>

                <input type="text" id="serach_string" name="input1-group3" class="form-control" placeholder="Serach word">

                <span class="input-group-btn">

                <button type="button" class="btn btn-primary" id="filter_search"><i class="fa fa-search"></i> </button>

                </span> </div>

            </div>

            <div class="col-md-6 col-sm-12 actions-container padding-bottom15"> <?php /*?><a class="btn btn-success btn-default-custom md-trigger pull-left" href="javascript:void(0)" data-toggle="modal" data-target="#con-close-modal"><i class="fa fa-plus"></i> Add New</a><?php */?><a class="btn btn-success btn-default-custom md-trigger pull-left" href="<?php echo CMX_ROOT . '/staffentry/staff/add/'; ?>" ><i class="fa fa-plus"></i> Add New</a> <a class="btn btn-danger btn-default-custom pull-right"  id="delete_action"  href="javascript:void(0);" data-act="muliple_delete" data-connector="delselected_staff"  title="Delete"><i class="fa fa-trash-o"></i></a> <a class="btn btn-default btn-default-custom pull-right"  id="delete_action"  href="javascript:void(0);" onclick="dizzi_exporter('1','staff_export');"><i class="fa fa-download"></i></a> </div>

          </div>

          <table class="table table-striped table-bordered" id="cf_table_list" data-method="staff">

            <thead>

              <tr>

                <th  style="width:1%;"> <label class="custom-checkbox-item">

                    <input name="checkbox" type="checkbox" class="custom-checkbox checkAll" />

                    <span class="custom-checkbox-mark"></span> </label>

                  <input type="hidden" name="filters" id="filters" value="" />

                  <input type="hidden" name="sort_colums" id="sort_colums" value="" />

                  <input type="hidden" name="sort_field" id="sort_field" value="" />

                  <input type="hidden" name="sort_field_value" id="sort_field_value" value="" />

                </th>

                <th style="width:5%;" class="sort-column">Sr.</th>

                <th style="width:12%;" class="sort-column">Image <span class="sort-wrap"> <a href="#" class="asc" data-field="name" ><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="name" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>

                <th style="width:12%;" class="sort-column">Name <span class="sort-wrap"> <a href="#" class="asc" data-field="name" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="name" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>

                <th style="width:12%;" class="sort-column">Login Id <span class="sort-wrap"> <a href="#" class="asc" data-field="gender" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="gender" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>

                <th style="width:12%;" class="sort-column">Mobile No <span class="sort-wrap"> <a href="#" class="asc" data-field="religion" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="religion" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>

                

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

  <div class="modal-dialog">

    <div class="modal-content">

      <? $this->app->htmlBuilder->buildTag("form", array("action"=>"","class"=>""), "frm_staff");?>

      <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>"staff_form"), "connector");?>

      <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>$this->record_id), "record_id");?>

      <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>$this->record_id), "staff_h_name");?>

       <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>$this->record_id), "staff_s_h_name");?>

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

        <h4 class="modal-title"><span>Add</span> <strong>Staff</strong> </h4>

      </div>

      <div class="modal-body">

        <div id="staff_response"></div>

            <div class="row">

          <div class="col-md-6">

            <div class="form-group">

              <label for="field-1" class="control-label">Name<span class="mandatory">*</span></label>

              <input type="text" class="form-control required" id="name" name="name" title="Name Required" placeholder="Name">

            </div>

          </div>

          <div class="col-md-6">

            <div class="form-group">

              <label for="field-1" class="control-label">Login Id<span class="mandatory">*</span></label>

              <input type="text" class="form-control required" id="login_id" name="login_id" title="Login Id Required" placeholder="Login Id">

            </div>

          </div>

      

             

          <div class="col-md-6">

            <div class="form-group">

              <label for="field-1" class="control-label">Mobile No<span class="mandatory">*</span></label>

              <input type="text" class="form-control required" id="mobile_no" name="mobile_no" title="Mobile No Required" placeholder="Name">

            </div>

          </div>

          <div class="col-md-6">

            <div class="form-group">

              <label for="field-1" class="control-label">Phone No<span class="mandatory">*</span></label>

              <input type="text" class="form-control" id="phone_no" name="phone_no" title="Login Id Required" placeholder="Login Id">

            </div>

          </div>

        

        

        

          <div class="col-md-3">

            <div class="form-group">

              <div class="checkbox">

                <input type="radio" id="male" name="gender" value="Male" required="">

                <label for="male">Male</label>

              </div>

            </div>

          </div>

          <div class="col-md-3">

            <div class="form-group">

              <div class="checkbox">

                <input type="radio" id="female" name="gender" value="Female" required="">

                <label for="female">Female</label>

              </div>

            </div>

          </div>

                

          <div class="col-md-6">

            <div class="form-group">

              <label for="field-1" class="control-label">Date of Birth <span class="mandatory">*</span></label>

              <div class='input-group date'>

                <input id="dob" name="dob"type="text" value="" class="form-control indatepicker">

                <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> </div>

            </div>

          </div>

          <div class="col-md-6">

            <div class="form-group">

              <label for="field-1" class="control-label">Date of Joining <span class="mandatory">*</span></label>

              <div class='input-group date'>

                <input id="joining_date" name="joining_date"type="text" value="" class="form-control indatepicker">

                <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> </div>

            </div>

          </div>

          <!---->         

       

	        <div class="col-md-12">

		        <div class="form-group">

	              <label for="field-1" class="control-label">Image<span class="mandatory">*</span></label>

	              <input type="file" class="form-control" id="staff_image" name="staff_image">

	            </div>

	        </div>	       

       

	        <div class="col-md-12">

		        <div class="form-group">

	              <label for="field-1" class="control-label">Signature Image<span class="mandatory">*</span></label>

	              <input type="file" class="form-control" id="sing_image" name="sing_image">

	            </div>

	        </div>	       

       

	        <div class="col-md-6">

		        <div class="form-group">

		          <label  class="control-label">User Type<span class="mandatory">*</span></label>

		          <select id="user_type" name="user_type" class="form-control required">

              	<option value="test1">Test1</option>

              	<option value="test2">Test2</option>

              </select>

                   <? /*$this->app->htmlBuilder->buildTag("select", array("class"=>"select2", "values"=>$this->app->category_dd), "category1");*/?>

				</div>

	        </div>

	        <div class="col-md-6">

	            <div class="form-group">

	              <label for="field-1" class="control-label">Blood Group<span class="mandatory">*</span></label>

	              <input type="text" class="form-control required" id="blood_group" name="blood_group" title="Blood Group Required" placeholder="Blood Group">

	            </div>

            </div>

        

	        <div class="col-md-6">

		        <div class="form-group">

		          <label  class="control-label">Designation<span class="mandatory">*</span></label>

		           <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2", "values"=>$this->app->designations_dd), "designation");?>

				</div>

	        </div>

	        <div class="col-md-6">

	            <div class="form-group">

	              <label for="field-1" class="control-label">Personal Email<span class="mandatory">*</span></label>

	              <input type="email" class="form-control required" id="per_email" name="per_email" title="Email Required" placeholder="Email">

	            </div>

            </div>

       

	        <div class="col-md-6">

		        <div class="form-group">

		          <label  class="control-label">Department<span class="mandatory">*</span></label>

		           <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2", "values"=>$this->app->branch_dd,"id"=>"department" ,"name"=>"depart_sel[]"));?>

				</div>

	        </div>

	        <div class="col-md-6">

	            <div class="form-group">

		          <label  class="control-label">Reporting Authority<span class="mandatory">*</span></label>

		          <select id="reporting_authority" name="reporting_authority" class="form-control">

              	<option value="1">Test1</option>

              	<option value="2">Test2</option>

              </select>

                   <? /*$this->app->htmlBuilder->buildTag("select", array("class"=>"select2", "values"=>$this->app->sem_dd), "sem");*/?>

				</div>

            </div>

       

          <div class="col-md-3">

            <div class="form-group"> 

              <div class="checkbox">

                <input type="radio" id="married" name="marital_status" value="married" required="">

                <label for="married">Married</label>

              </div>

            </div>

          </div>

          <div class="col-md-3">

            <div class="form-group">

              <div class="checkbox">

                <input type="radio" id="unmarried" name="marital_status" value="unmarried" required="">

                <label for="unmarried">UnMarried</label>

              </div>

            </div>

          </div>

                

          <div class="col-md-6">

            <div class="form-group">

              <label for="field-1" class="control-label">Biometric Code<span class="mandatory">*</span></label>

              <input type="text" class="form-control" id="biometricd_code" name="biometricd_code" title="Biometric code" placeholder="Biometric Code">

            </div>

          </div>

          

             

          <div class="col-md-6">

            <div class="form-group">

              <label for="field-1" class="control-label">Sequence No<span class="mandatory">*</span></label>

              <input type="text" class="form-control" id="sequence_no" name="sequence_no" title="Sequence Required" placeholder="Sequence">

            </div>

          </div>

          

             

          <div class="col-md-12">

            <div class="form-group">

              <label for="field-1" class="control-label">Address<span class="mandatory">*</span></label>

              <textarea class="form-control" id="address" name="address"></textarea>

            </div>

          </div>          

               

          <div class="col-md-6">

            <div class="form-group">

              <label for="field-1" class="control-label">City<span class="mandatory">*</span></label>

              <input type="text" class="form-control required" id="city" name="city" title="City Required" placeholder="City">

            </div>

          </div>

          <div class="col-md-6">

            <div class="form-group">

              <label for="field-1" class="control-label">State<span class="mandatory">*</span></label>

              <input type="text" class="form-control required" id="state" name="state" title="State Required" placeholder="State">

            </div>

          </div>

               

          <div class="col-md-6">

            <div class="form-group">

              <label for="field-1" class="control-label">Country<span class="mandatory">*</span></label>

              <input type="text" class="form-control required" id="country" name="country" title="Country Required" placeholder="Country">

            </div>

          </div>

          <div class="col-md-6">

            <div class="form-group">

              <label for="field-1" class="control-label">Birth Place<span class="mandatory">*</span></label>

              <input type="text" class="form-control" id="birth_place" name="birth_place" title="Birth Place Required" placeholder="Birth Place">

            </div>

          </div>

             

          <div class="col-md-12">

            <div class="form-group">

              <label for="field-1" class="control-label">Nationality<span class="mandatory">*</span></label>

              <input type="text" class="form-control" id="nationality" name="nationality" title="Nationality Required" placeholder="Nationality">

            </div>

          </div>          

             

          <div class="col-md-6">

            <div class="form-group">

              <label for="field-1" class="control-label">PAN No<span class="mandatory">*</span></label>

              <input type="text" class="form-control" id="pan_no" name="pan_no" title="PAN No Required" placeholder="PPAN No">

            </div>

          </div>

          <div class="col-md-6">

            <div class="form-group">

              <label for="field-1" class="control-label">Election Card No<span class="mandatory">*</span></label>

              <input type="text" class="form-control" id="election_card_no" name="election_card_no" title="Election Card No" placeholder="Election Card No">

            </div>

          </div>

               

          <div class="col-md-6">

            <div class="form-group">

              <label for="field-1" class="control-label">Aadhar No<span class="mandatory">*</span></label>

              <input type="text" class="form-control required number" id="aadhar_card_no" name="aadhar_card_no" title="Aadhar No Required" placeholder="Aadhar No">

            </div>

          </div>

          <div class="col-md-6">

            <div class="form-group">

              <label for="field-1" class="control-label">Date of Aniversary<span class="mandatory">*</span></label>

              <div class='input-group date'>

                <input id="date_aniversary" name="date_aniversary"type="text" value="" class="form-control indatepicker">

                <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> </div>

            </div>

          </div>

              

          <div class="col-md-6">

            <div class="form-group">

              <label for="field-1" class="control-label">Father Name<span class="mandatory">*</span></label>

              <input type="text" class="form-control" id="father_name" name="father_name" title="Father Name Required" placeholder="Father Name">

            </div>

          </div>

          <div class="col-md-6">

            <div class="form-group">

              <label for="field-1" class="control-label">Father Contact No<span class="mandatory">*</span></label>

              <input type="text" class="form-control" id="f_contact_no" name="f_contact_no" title="Father Contact No Required" placeholder="Father Contact No">

            </div>

          </div>

                

          <div class="col-md-6">

            <div class="form-group">

              <label for="field-1" class="control-label">Mother Name<span class="mandatory">*</span></label>

              <input type="text" class="form-control" id="mother_name" name="mother_name" title="Mother Nam Required" placeholder="Mother Nam">

            </div>

          </div>

          <div class="col-md-6">

            <div class="form-group">

              <label for="field-1" class="control-label">Mother Contact No<span class="mandatory">*</span></label>

              <input type="text" class="form-control" id="m_contact_no" name="m_contact_no" title="Mother Contact No Required" placeholder="Mother Contact No">

            </div>

          </div>

                

          <div class="col-md-6">

            <div class="form-group">

              <label for="field-1" class="control-label">Spouse Name<span class="mandatory">*</span></label>

              <input type="text" class="form-control" id="spouce_name" name="spouce_name" title="Spouse Name Required" placeholder="Spouse Name">

            </div>

          </div>

          <div class="col-md-6">

            <div class="form-group">

              <label for="field-1" class="control-label">Spouse Contact No<span class="mandatory">*</span></label>

              <input type="text" class="form-control" id="s_contact_no" name="s_contact_no" title="Spouse Contact No Required" placeholder="Spouse Contact No">

            </div>

          </div>

            

          <div class="col-md-6">

            <div class="form-group">

              <label for="field-1" class="control-label">Bank Name<span class="mandatory">*</span></label>

              <select id="bank_name" name="bank_name" class="form-control required">

              	<option value="test1">Test1</option>

              	<option value="test2">Test2</option>

              </select>

            </div>

          </div>

          <div class="col-md-6">

            <div class="form-group">

              <label for="field-1" class="control-label">Bank Branch<span class="mandatory">*</span></label>

              <input type="text" class="form-control required" id="bank_branch" name="bank_branch" title="Bank Branch Required" placeholder="Bank Branch">

            </div>

          </div>

                 

          <div class="col-md-6">

            <div class="form-group">

              <label for="field-1" class="control-label">Salary Payment Type<span class="mandatory">*</span></label>

              <select id="salary_p_type" name="salary_p_type" class="form-control required">

              	<option value="test1">Test1</option>

              	<option value="test2">Test2</option>

              </select>

            </div>

          </div>

          <div class="col-md-6">

            <div class="form-group">

              <label for="field-1" class="control-label">Account No<span class="mandatory">*</span></label>

              <input type="text" class="form-control required" id="acc_no" name="acc_no" title="Account No Required" placeholder="Account No">

            </div>

          </div>

               

          <div class="col-md-6">

            <div class="form-group">

              <label for="field-1" class="control-label">PF No<span class="mandatory">*</span></label>

              <input type="text" class="form-control" id="pf_no" name="pf_no" title="PF No Required" placeholder="PF No">

            </div>

          </div>

          <div class="col-md-6">

            <div class="form-group">

              <label for="field-1" class="control-label">ESIC No<span class="mandatory">*</span></label>

              <input type="text" class="form-control" id="esic_no" name="esic_no" title="ESIC No Required" placeholder="ESIC No">

            </div>

          </div>

               

          <div class="col-md-12">

            <div class="form-group">

              <label for="field-1" class="control-label">Is Intercommunication<span class="mandatory">*</span></label>

              

              <input type="checkbox" class="form-control" id="is_intercommunication" name="is_intercommunication" value="on" />

            </div>

          </div>

          

       

        

        

        

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

