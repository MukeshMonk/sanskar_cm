<style>
.w150
{
	width:150px;
}
#dateheaqding
{	
    background: #5dca73 none repeat scroll 0 0;
    color: white;
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 10px;
    padding: 6px 25px;
}
.leavespan {
    background: #5DCA73 none repeat scroll 0 0;
    color: white;
    font-size: 15px;
    height: 92px;
    padding: 6px 9px;
    font-weight: bold;
}	
</style>
<div class="page-content">
  <div class="container-fluid mt50 dizzilist-block">
    <div class="col-xxl-12 col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title mb0">Mark Attendance</h4>
          <ol class="breadcrumb breadcrumb-simple">
            <li><a href="javascript:void(0);"><?php echo $this->app->module_title?></a></li>
            <li><a href="javascript:void(0);">Setup</a></li>
            <li class="active">Mark Attendance</li>
          </ol>
        </div>
        <div class="panel-body">
          <? $this->app->htmlBuilder->buildTag("form", array("action"=>"","class"=>""), "frm_attendance");?>
          <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>"save_attendance"), "act");?>
          <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>$this->app->markattandence_id),"record_id");?>
          <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>$this->app->cmx->curPageURL()),"returnUrl");?>
        
         <div class="panel-heading pull-right" id="dateheaqding">
         	<span><?php echo date('j F Y',$this->app->atten[0]['add_date']); ?></span>
         </div>	

          <div class="panel-default">
          	
          	 <div class="panel-body">

<!-----START MARK ATTENDANCE SECTION ----->

<div class="row mb20">
            <div class="col-md-6 col-sm-12 search-container padding-bottom15">
              <div class="input-group"> <span class="input-group-btn ui-select">
                <select class="form-control" id="search_by">
                  <option value="name">Student name</option>
                </select>
                </span>
                <input type="text" id="serach_string" name="input1-group3" class="form-control" placeholder="Serach word">
                <span class="input-group-btn">
                <button type="button" class="btn btn-primary" id="filter_search"><i class="fa fa-search"></i> </button>
                </span> </div>
            </div>
            
          </div>
          <table class="table table-striped table-bordered" id="cf_table_list" data-method="entermarkattendance">
		  	<thead>
				<tr>
					<th style="width:2%;" class="sort-column">Sr.
					<input type="hidden" name="filters" id="filters" value="" />
					<input type="hidden" name="sort_colums" id="sort_colums" value="" />
					<input type="hidden" name="sort_field" id="sort_field" value="" />
					<input type="hidden" name="sort_field_value" id="sort_field_value" value="" />
					<input type="hidden" name="conditional_val" id="conditional_val" value='{"markattandence_id":"<?php echo $this->app->markattandence_id;?>","class_id":"<?php echo $this->app->class_id;?>","add_date":"<?php echo $this->app->add_date;?>"}' />
					
					</th>
					<th style="width:15%;" class="sort-column">Admission No.</th>
					<th style="width:15%;" class="sort-column">Student Name</th>
					<th style="width:15%;" class="sort-column">Date</th>
					<th style="width:15%;" class="sort-column">Status</th>
					<th style="width:38%;" class="sort-column">Remarks</th>
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

<!------- END MARK ATTENDANCE SECTION ----->
			   
			   <!-- <div class="col-md-6 col-sm-12 search-container padding-bottom15">
				<div class="input-group"> <span class="input-group-btn ui-select">
					<select class="form-control" id="search_by">
						<option value="name">Name</option>
					</select>
					</span>
					<input type="text" id="serach_string" name="input1-group3" class="form-control" placeholder="Serach word">
					<span class="input-group-btn">
						<button type="button" class="btn btn-primary" id="filter_search"><i class="fa fa-search"></i> </button>
					</span>
				</div> -->
            </div>
          <!-- <table class="table table-striped table-bordered"  >
            <thead>
              <tr>
                <th style="width:2%;" class="sort-column">Sr.</th>
                <th style="width:15%;" class="sort-column">Admission No.</th>
                <th style="width:15%;" class="sort-column">Student Name</th>
                <th style="width:15%;" class="sort-column">Date</th>
                <th style="width:15%;" class="sort-column">Status</th>
                <th style="width:38%;" class="sort-column">Remarks</th>
              </tr>
            </thead>
            <tbody>
            	<?php 
            	$default_status=$this->app->cmx->get_status_for_attandenace($this->app->markattandence_id); 
				foreach($this->app->students as $k => $student)
				{
					$student_atten_check=$this->app->cmx->check_student_attendence($student['id'],date('Y-m-d',$this->app->atten[0]['add_date']));		
					$check_leave=count($student_atten_check);
				?>
				<input type="hidden" name="student_id1[]" value="<?php echo $student['id']; ?>"/>
				<input type="hidden" name="course1[]" value="<?php echo $student['cm_course']; ?>"/>
				<input type="hidden" name="sem1[]" value="<?php echo $student['sem']; ?>"/>
				<input type="hidden" name="add_date1[]" value="<?php echo date('Y-m-d',$this->app->atten[0]['add_date']); ?>"/>
				<tr>					
					<td><?php echo $k+1; ?></td>
					<td><?php echo $student['id_no']; ?></td>
					<td><?php echo $student['name']; ?></td>
					<td><?php echo date('Y-m-d',$this->app->atten[0]['add_date']); ?></td>
					<td>
					<?php
					$status_array1=array(""=>"Select Status","Present"=>"Present","Absent"=>"Absent","Official Leave"=>"Official Leave","Medical Leave"=>"Medical Leave");
					$status_array=array(""=>"Select Status","Present"=>"Present","Absent"=>"Absent");
					?>
                    <?php 
					if($check_leave>0)
					{						
						$selected_vallue=$student_atten_check[0]['default_status']; 
						$maxatten_id=$student_atten_check[0]['id']; 
						
						if($selected_vallue=='Official Leave' || $selected_vallue=='Medical Leave')
						{				
							$disabled="disabled";
						}
						else
						{
							$disabled="";
						}
							$remark=$student_atten_check[0]['remarks'];
					}
					else
					{
						$selected_vallue=$default_status;$disabled="";					
						$remark="";
						$maxatten_id="";
					}
					?>
					<? 
					if($disabled!="")
					{
						$this->app->htmlBuilder->buildTag("select", array("class"=>"select2 select2-hidden-accessible w150","id"=>"default_status",  "name"=>"default_status11[]","values"=>$status_array1,"selected"=>$selected_vallue,"disabled"=>"disabled"),"");
						$this->app->htmlBuilder->buildTag("input",array("type"=>"hidden","name"=>"default_status1[]","id"=>"default_status_".$maxatten_id,"value"=>"NA"),"");
					}
					else
					{
						$this->app->htmlBuilder->buildTag("select", array("class"=>"select2 select2-hidden-accessible w150","id"=>"default_status",  "name"=>"default_status1[]","values"=>$status_array,"selected"=>$selected_vallue),"");
					}
					?>
					 <?php if($maxatten_id>0)
					{?>
						<input type="hidden" name="edit_id[]" value="<?php echo $maxatten_id; ?>"/>
				    <?php } ?>
                    </td>
					<td><input type="text" class="form-control" name="remarks1[]" value="<?php echo $remark;?>"  /></td>
				</tr>	
				<?php } ?>
            </tbody>
          </table> -->
          </div>
          <div class="panel-footer">          	
          	<button type="submit" class="btn btn-success btn-md" name="save" value="save">Save</button>          	
          	<button type="submit" class="btn btn-danger btn-md" name="saveandclose" value="savenclose">Save & Close</button>
          	
          </div>
               
	
          </div>
           <?= $this->app->htmlBuilder->closeForm() ?>
        </div>
        
        <!-- panel-body --> 
        
      </div>
    </div>
  </div>
  <!--.container-fluid--> 
</div>
<!--.page-content--> 
