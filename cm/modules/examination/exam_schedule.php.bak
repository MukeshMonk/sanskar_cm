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
/* #subject {
    display: none;
} */
#subject .col-md-1 {
    text-align: center;
    position: relative;
    top: 10px;
}
div#subject {
    border-top: 1px solid #e5e5e5;
}

div#subject h3 {
    margin-top: 15px;
    font-size: 20px;
    font-weight: 700;
}

subject ul li div p {}

p {
    font-size: 14px;
}

.sub_name {
    font-size: 14px;
}
</style>
<div class="page-content">

  <div class="container-fluid mt50 dizzilist-block">

    <div class="col-xxl-12 col-md-12">

      <div class="panel panel-default">

        <div class="panel-heading">

          <h4 class="panel-title mb0">Exam Schedule </h4>

          <ol class="breadcrumb breadcrumb-simple">

            <li><a href="javascript:void(0);"><?php echo $this->app->module_title?></a></li>

            <li><a href="javascript:void(0);">Setup</a></li>

            <li class="active">List</li>

          </ol>

        </div>

       

        <div class="panel-body">

          <div class="row mb20">

            <div class="col-md-8 col-sm-12 search-container padding-bottom15">

              <div class="input-group"> <span class="input-group-btn ui-select">

                <select class="form-control" id="search_by">

                  <option value="cm_course.course_name">Course</option>
				  
				  <option value="cm_subjects.subject_name">Subject</option>
				  <option value="exam_schedule.act_date">Activity Date</option>
				  
                </select>

                </span>

               

                <input type="text" id="serach_string" name="input1-group3" class="form-control" placeholder="Serach word">

                <span class="input-group-btn">

                <button type="button" class="btn btn-primary" id="filter_search"><i class="fa fa-search"></i> </button>

                </span> </div>

            </div>

            

            <div class="col-md-4 col-sm-12 actions-container padding-bottom15"> <a class="btn btn-success btn-default-custom md-trigger pull-left" href="javascript:voide()" data-toggle="modal" data-target="#con-close-modal"><i class="fa fa-plus"></i> Add New</a> <a class="btn btn-danger btn-default-custom pull-right"  id="delete_action"  href="javascript:void(0);" data-act="muliple_delete" data-connector="delselected_exam_sch"  title="Delete"><i class="fa fa-trash-o"></i></a> <a class="btn btn-default btn-default-custom pull-right"  id="delete_action"  href="javascript:void(0);" onclick="dizzi_exporter('1','exam_sch_export');"><i class="fa fa-download"></i></a> </div>

          </div>

          <table class="table table-striped table-bordered" id="cf_table_list" data-method="exam_sch">

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
                <th style="width:5%;" class="sort-column">Subjects</th>
				 <th style="width:12%;" >Activity Name</th>
                <th style="width:12%;" class="sort-column">Class<span class="sort-wrap"> <a href="#" class="asc" data-field="cm_course.course_name" ><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="cm_course.course_name" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>

                <th style="width:12%;" >Academic Year</th>

                

                <th style="width:12%;" class="sort-column">Max Marks<span class="sort-wrap"> <a href="#" class="asc" data-field="max_mark" data-val="asc"><i class="fa fa-caret-up"></i></a> <a href="#" class="desc" data-field="max_mark" data-val="desc"><i class="fa fa-caret-down"></i></a> </span></th>
                

               

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

      <? $this->app->htmlBuilder->buildTag("form", array("action"=>"","class"=>""), "frm_exam_sch");?>

      <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>"exam_sch_form"), "connector");?>

      <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>$this->record_id), "record_id");?>

     

        <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden","value"=>$this->app->last_id1),"last_id");?>

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>

        <h4 class="modal-title"><span>Add</span> <strong>Exam Schedule</strong> </h4>

      </div>

      <div class="modal-body">

        <div id="exam_response"></div>

        <div class="row"> 

          <div class="col-md-4">

		        <div class="form-group">

		          <label  class="control-label">Academic Year<span class="mandatory">*</span></label>

		           <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control required", "values"=>$this->app->academic_year_dd,"title"=>"Academic Year Required"), "a_year");?>

				</div>

	        </div>
		<div class="col-md-4">

		        <div class="form-group">

		          <label  class="control-label">Class<span class="mandatory">*</span></label>

		           <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control required change_cource change_class", "values"=>$this->app->branch_dd,"title"=>"Class Required","data-term"=>""), "branch");?>

				</div>

	        </div>
				
        
          <?php /*?><div class="col-md-4">

		        <div class="form-group">

		          <label  class="control-label">Division<span class="mandatory">*</span></label>

		           <? //$this->app->htmlBuilder->buildTag("select", array("class"=>"form-control required", "values"=>$this->app->div_dd,"title"=>"Academic Year Required"), "div1");?>
                    <select id="div1" name="div1[]" class="form-control required" title="Section Required" multiple="multiple">
                     
                  </select>
					<input type="hidden" name="sec_temp" id="sec_temp" />
				</div>

	        </div><?php */?>
		<?php /*?><div class="col-md-4">

		        <div class="form-group">

		          <label  class="control-label">Subject<span class="mandatory">*</span></label>

		           <? //$this->app->htmlBuilder->buildTag("select", array("class"=>"form-control required", "values"=>$this->app->sub_dd,"title"=>"Class Required"), "sub");?>
                   <select id="sub" name="sub" class="form-control required" title="Subject Required" >
                      <option value="">Select Subject</option>
                  </select>
					<input type="hidden" name="sub_temp" id="sub_temp" />
                    
				</div>

	        </div><?php */?>
		<div class="col-md-4">

		        <div class="form-group">

		          <label  class="control-label">Term</label>

		           <? //$this->app->htmlBuilder->buildTag("select", array("class"=>"form-control", "values"=>$this->app->trm_dd,"title"=>"Class Required"), "trm");?>
					<select id="trm" name="trm" class="form-control " title="Term Required" >
                      <option value="">Select Term</option>
                  </select>
                  <input type="hidden" name="term_temp" id="term_temp" />
				</div>

	        </div>		
       
                

        </div>

        <div class="row">

        <div class="col-md-4">

            <div class="form-group">

              <label for="field-1" class="control-label">Activity Name</label>

              <input type="text" class="form-control " id="a_name" name="a_name" title="First Name " placeholder="First Name">

            </div>

          </div>

          <div class="col-md-4">  

            <div class="form-group">

              <label for="field-1" class="control-label">Max Marks<span class="mandatory">*</span></label>

              <input type="text" class="form-control required" id="m_marks" name="m_marks"  placeholder="Middle Name">

            </div>

          </div>
          <div class="col-md-4">

		        <div class="form-group">

		          <label  class="control-label">Is Attendance<span class="mandatory">*</span></label>

		           <? $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control required", "values"=>array("No"=>"No","Yes"=>"Yes")), "is_attendance");?>

				</div>

	        </div>

          <?php ?>
         


        </div>

        <div id="subject"></div>

      </div>

      <div class="modal-footer">

        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>

        <button type="submit" class="btn btn-info waves-effect waves-light" id="save_exam">Save</button>

      </div>

      <?=$this->app->htmlBuilder->closeForm()?>

    </div>

  </div>

</div>

<div id="exam-subject-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">�</button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">
      <div class="sub-list-div"></div>
      <form name="frm_subjects" id="frm_subjects" method="post" enctype="multipart/form-data" action="" class="">

      <input name="connector" id="connector" type="hidden" value="examsubjects_form">

	  <input name="examid" id="examid" type="hidden" value="">

	  <input name="record_id" id="record_id" type="hidden" value="">

        <div id="terms_response"></div>

        

    <!-- <div class="row">

          <div class="col-md-12">

            <div class="form-group">

              <label class="control-label">Subject Name<span class="mandatory">*</span></label>
			        <div class="sub-div"></div>
			  <? // $this->app->htmlBuilder->buildTag("select", array("class"=>"form-control required", "values"=>$this->app->sub_dd,"title"=>"Class Required"), "sub");?>

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

      </form> </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button>
      </div>
    </div> -->
  </div>
</div>
