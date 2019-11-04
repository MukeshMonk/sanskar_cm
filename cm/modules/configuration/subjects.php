<div class="page-content">
  <div class="container-fluid mt50 dizzilist-block">
    <div class="col-xxl-12 col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title mb0">Subjects</h4>
          <ol class="breadcrumb breadcrumb-simple">
            <li><a href="javascript:void(0);"><?php echo $this->app->module_title?></a></li>
            <li><a href="javascript:void(0);">Setup</a></li>
            <li class="active">Subjects</li>
          </ol>
        </div>
        <div class="panel-body">
          <div class="row mb20">
            <div class="col-md-6 col-sm-12 search-container padding-bottom15">
              <div class="input-group"> <span class="input-group-btn ui-select">
                <select class="form-control" id="search_by">
                  <option value="cm_course

.course_name">Course</option>
                  <option value="subject_name">Subject Name</option>
                  <option value="subject_code">Subject Code</option>
                </select>
                </span>
                <input type="text" id="serach_string" name="input1-group3" class="form-control" placeholder="Serach word">
                <span class="input-group-btn">
                <button type="button" class="btn btn-primary" id="filter_search"><i class="fa fa-search"></i> </button>
                </span> </div>
            </div>
            <div class="col-md-6 col-sm-12 actions-container padding-bottom15"> <a class="btn btn-success btn-default-custom md-trigger pull-left" href="javascript:void(0)" data-toggle="modal" data-target="#con-close-modal"><i class="fa fa-plus"></i> Add New</a> <a class="btn btn-danger btn-default-custom pull-right"  id="delete_action"  href="javascript:void(0);" data-act="muliple_delete" data-connector="delselected_subjects"  title="Delete"><i class="fa fa-trash-o"></i></a> <a class="btn btn-default btn-default-custom pull-right"  id="delete_action"  href="javascript:void(0);" onclick="dizzi_exporter('1','subjects_export');"><i class="fa fa-download"></i></a> </div>
          </div>
          <table class="table table-striped table-bordered" id="cf_table_list" data-method="subjects">
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
                <th style="width:5%;" class="sort-column">Seq <span class="sort-wrap"> <a href="#" class="asc" data-field="name" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="name" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
                <th style="width:8%;" class="sort-column">Name <span class="sort-wrap"> <a href="#" class="asc" data-field="subject_name" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="subject_name" data-val="desc"><i class="fa fa-caret-down"></i></a> </span> </th>
                <th style="width:10%;" class="sort-column">Code <span class="sort-wrap"> <a href="#" class="asc" data-field="subject_code" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="subject_code" data-val="desc"><i class="fa fa-caret-down"></i></a> </span> </th>
                <th style="width:10%;" class="sort-column">Course <span class="sort-wrap"> <a href="#" class="asc" data-field="cm_course

.course_name" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_course

.course_name" data-val="desc"><i class="fa fa-caret-down"></i></a> </span> </th>
                <th style="width:12%;" class="sort-column">Asses. Structure <span class="sort-wrap"> <a href="#" class="asc" data-field="cm_asses_structure.asses_name" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_asses_structure.asses_name" data-val="desc"><i class="fa fa-caret-down"></i></a> </span> </th>
                <th style="width:12%;" class="sort-column">Uni. InternalMarks <span class="sort-wrap"> <a href="#" class="asc" data-field="minimum_passing_marks" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="minimum_passing_marks" data-val="desc"><i class="fa fa-caret-down"></i></a> </span> </th>
                <th style="width:12%;" class="sort-column">Min. PassingMarks <span class="sort-wrap"> <a href="#" class="asc" data-field="university_internal_marks" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="university_internal_marks" data-val="desc"><i class="fa fa-caret-down"></i></a> </span> </th>
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
      <? $this->app->htmlBuilder->buildTag("form", array("action"=>"","class"=>""), "frm_subjects");?>
      <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>"subjects_form"), "connector");?>
      <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>$this->record_id), "record_id");?>
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title"><span>Add</span> <strong>Subject</strong> </h4>
      </div>
      <div class="modal-body">
        <div id="subjects_response"></div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label  class="control-label">Seq</label>
              <input type="text" class="form-control required number" id="seq" name="seq" title="Sequence Required" placeholder="Sequence">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label  class="control-label">Course<span class="mandatory">*</span></label>
              <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select21 form-control", "values"=>$this->app->course_dd), "course");?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label  class="control-label">Sem<span class="mandatory">*</span></label>
              <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select21 form-control", "values"=>$this->app->semesters_dd), "sem");?>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Subject Name<span class="mandatory">*</span></label>
              <input type="text" class="form-control required" id="subject_name" name="subject_name" title="Name Required" placeholder="Name">
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label class="control-label">Subject Code<span class="mandatory">*</span></label>
              <input type="text" class="form-control required" id="code" name="code" title="Code Required" placeholder="Code">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label  class="control-label">Assessment Type<span class="mandatory">*</span></label>
              <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select21 form-control", "values"=>$this->app->asses_dd), "assessment_type");?>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label  class="control-label">University Internal Marks<span class="mandatory">*</span></label>
              <input type="number" class="form-control required number" id="university_internal_marks" name="university_internal_marks">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label  class="control-label">Minimum Passing Marks<span class="mandatory">*</span></label>
              <input type="number" class="form-control required number" id="minimum_passing_marks" name="minimum_passing_marks" >
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info waves-effect waves-light" id="save_subjects">Save</button>
      </div>
      <?=$this->app->htmlBuilder->closeForm()?>
    </div>
  </div>
</div>
