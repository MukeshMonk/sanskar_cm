<div class="page-content">
 <div class="container-fluid mt50 dizzilist-block">
  <div class="col-xxl-12 col-md-12">
   <div class="panel panel-default">
    <div class="panel-heading">
     <h4 class="panel-title mb0">Students </h4>
     <ol class="breadcrumb breadcrumb-simple">
      <li><a href="javascript:void(0);"><?php echo $this->app->module_title?></a></li>
      <li><a href="javascript:void(0);">Setup</a></li>
      <li class="active">Students</li>
     </ol>
    </div>
    <div class="panel-body">
     <div class="row mb20">
      <?php /*?><div class="col-md-6 col-sm-12 search-container padding-bottom15">
       <div class="input-group"> <span class="input-group-btn ui-select">
        <select class="form-control" id="search_by">
         <option value="name">Name</option>
        </select>
        </span>
        <input type="text" id="serach_string" name="input1-group3" class="form-control" placeholder="Serach word">
        <span class="input-group-btn">
        <button type="button" class="btn btn-primary" id="filter_search"><i class="fa fa-search"></i> </button>
        </span> </div>
      </div><?php */?>
      <div class="col-md-3">
        <div class="form-group"> 
         <label for="field-1" class="control-label">Academic Year</label>
          <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control gen_conditionalval", "values"=>$this->app->academic_year_dd), "acd_year_sel");?>
        </div>
       </div>
	   <div class="col-md-3">
        <div class="form-group">
         <label class="control-label">Class</label>
         <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control gen_conditionalval", "values"=>$this->app->class_dd), "class_sel");?>
        </div>
        </div>
        <div class="col-md-2">
        <div class="form-group">
         <label class="control-label">ID Number</label>
         <? $this->app->htmlBuilder->buildTag("input", array("class"=>"form-control gen_conditionalval", "type"=>"text"), "idnum_sel");?>
        </div>
        </div>
        <div class="col-md-2">
        <div class="form-group">
         <label class="control-label">Name</label>
         <? $this->app->htmlBuilder->buildTag("input", array("class"=>"form-control gen_conditionalval", "type"=>"text"), "name_sel");?>
        </div>
        </div>
        <div class="col-md-2">
        <div class="form-group">
         <label class="control-label">City</label>
         <? $this->app->htmlBuilder->buildTag("input", array("class"=>"form-control gen_conditionalval", "type"=>"text"), "city_sel");?>
        </div>
        </div>
      <div class="col-md-12 col-sm-12 actions-container padding-bottom15"> 
       
       <!-- <a class="btn btn-success btn-default-custom md-trigger pull-left" href="javascript:void(0)" data-toggle="modal" data-target="#con-close-modal"><i class="fa fa-plus"></i> Add New</a>  --> 
       <a class="btn btn-success btn-default-custom md-trigger pull-left view-cnf-list" href="javascript:void(0);" onclick="cf_datapager('1','students');" >Search</a>
       <a class="btn btn-success btn-default-custom md-trigger pull-left" href="<?php echo CMX_ROOT . '/studententry/students/add/'; ?>"><i class="fa fa-plus"></i> Add New</a> 
       
       <a class="btn btn-primary btn-default-custom md-trigger pull-left" href="<?php echo CMX_ROOT . '/studententry/import/'; ?>"><i class="fa fa-plus"></i> Import Students</a>  
       
       
       
       <a class="btn btn-danger btn-default-custom pull-right"  id="delete_action"  href="javascript:void(0);" data-act="muliple_delete" data-connector="delselected_students"  title="Delete"><i class="fa fa-trash-o"></i></a> <a class="btn btn-default btn-default-custom pull-right"  id="delete_action"  href="javascript:void(0);" onclick="dizzi_exporter('1','students_export');"><i class="fa fa-download"></i></a> </div>
     </div>
     <table class="table table-striped table-bordered" id="cf_table_list" data-method="students">
      <thead>
       <tr>
        <th  style="width:1%;"> <label class="custom-checkbox-item">
          <input name="checkbox" type="checkbox" class="custom-checkbox checkAll" />
          <span class="custom-checkbox-mark"></span> </label>
         <input type="hidden" name="filters" id="filters" value="" />
         <input type="hidden" name="sort_colums" id="sort_colums" value="" />
         <input type="hidden" name="sort_field" id="sort_field" value="" />
         <input type="hidden" name="sort_field_value" id="sort_field_value" value="" />
         <input type="hidden" name="conditional_val" id="conditional_val" value='' />
        </th>
        <th style="width:5%;" class="sort-column">Sr.</th>
        <th style="width:12%;" class="sort-column">Name <span class="sort-wrap"> <a href="#" class="asc" data-field="name" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="name" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
        <th style="width:12%;" class="sort-column">IdNo <span class="sort-wrap"> <a href="#" class="asc" data-field="id_no" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="id_no" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
        <th style="width:12%;" class="sort-column">Gender <span class="sort-wrap"> <a href="#" class="asc" data-field="gender" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="gender" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
        <th style="width:12%;" class="sort-column">Semester <span class="sort-wrap"> <a href="#" class="asc" data-field="sem" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="sem" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
        <th style="width:12%;" class="sort-column">Branch <span class="sort-wrap"> <a href="#" class="asc" data-field="branch" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="branch" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
         <th style="width:12%;" class="sort-column">City <span class="sort-wrap"> <a href="#" class="asc" data-field="city" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="city" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
        <th style="width:10%;" class="sort-column">Status <span class="sort-wrap"> <a href="#" class="asc" data-field="last_updatedon" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="last_updatedon" data-val="desc"><i class="fa fa-caret-down"></i></a> </span> </th>
        <th style="width:10%;">Action</th>
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

      
      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>

        <h4 class="modal-title"><span>Student</span> <strong>Detail</strong> </h4>

      </div>

      <div class="modal-body">

        <div id="academicyears_response"></div>

        <div class="row">
		<div class="col-md-8">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              <span>Name: </span>
				<span id="name"></span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <span>Gender: </span>
				<span id="gender"></span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
             <span>Category: </span>
				<span id="category"></span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
             <span>Religion: </span>
				<span id="religion"></span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <span>Semester: </span>
				<span id="sem"></span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <span>Id Number: </span>
				<span id="id_no"></span>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <span>Class: </span>
				<span id="class1_id"></span>
            </div>
          </div>
          </div>
          </div>
          <div class="col-md-4">
		<div class="form-group">
              <label class="col-sm-12 control-label">Student Image</label>
              <div class="col-sm-12">
                <div class="fileupload fileupload-new" data-provides="fileupload">
                  <div class="fileupload-new thumbnail" style="width: 100%;"><img id="student_image" src="" style="width:100%;"> </div>
                  <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 100%; max-height: 125px; line-height: 20px;"></div>
                 
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
		<div class="col-md-12">
        <div class="form-group">
              <span>Address: </span>
				<span id="address_s"></span>
            </div>
        </div>
        </div>
        <div class="row">
		<div class="col-md-12">
        <div class="form-group">
              <span>Email: </span>
				<span id="email"></span>
            </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
               <span>Parent Mobile No: </span>
				<span id="parents_mobile_no"></span>
            </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
              <span>Student Mobile No.: </span>
				<span id="student_mobile_no"></span>
            </div>
        </div>
        </div>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>

       <!-- <button type="submit" class="btn btn-info waves-effect waves-light" id="save_academicyears">Save</button>-->

      </div>

    

    </div>

  </div>

</div>
