<div class="page-content">
  <div class="container-fluid mt50 dizzilist-block">
    <div class="col-xxl-12 col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title mb0">School Attandence Report</h4>
          <ol class="breadcrumb breadcrumb-simple">
            <li><a href="javascript:void(0);"><?php echo $this->app->module_title?></a></li>
            <li><a href="javascript:void(0);">Setup</a></li>
            <li class="active">School Attandence Report</li>
          </ol>
        </div>
        
        <div class="panel-body">
          
        <? $this->app->htmlBuilder->buildTag("form", array("action"=>"","class"=>""), "frm_schoolattandencereport");?>
        <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>"frm_schoolattandencereport"), "act");?>
   
        <div class="row">
          <div class="col-md-3">
            <div class="form-group">
            	              	<label for="field-1" class="control-label"> Date </label>

              <div class='input-group date'>
				<input id="report_date" name="report_date"type="text" value="" class="form-control indatepicker">
                <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> 
              </div>
            </div>
          </div>
          <div class="col-md-3">
	        	<div class="form-group">
	        	<label  class="control-label"><span class="mandatory">*</span></label>
				<button type="submit" class="btn btn-info waves-effect waves-light" id="">Generate</button>
	        	</div>
	     </div>
        </div>
        <?=$this->app->htmlBuilder->closeForm()?>  
          
          
          <section class="card">
            <header class="card-header">
                School Attandence Report
            </header>
            <div class="card-block">
                <div id="combination-chart"></div>
            </div>
        </section>        
        </div>
        
        
        
        <div class="row">
          <div class="col-md-6">
	        <table class="table table-bordered">
	        	<tr>
	        		<th>Class Section</th>
	        		<th>Admission No.</th>
	        		<th>Student Name</th>
	        		<th>Mobile Number</th>
	        	</tr>
	        	<?php
	        	$obj_classes = $this->app->load_model("cm_classes");
				$obj_classes->join_table("cm_sections","left",array("id","section_name"),array("id"=>"class_id"));
				$rs_classesarray=$obj_classes->execute("SELECT", false, ""," cm_classes.status != 2 and cm_classes.id!=0 ","","cm_classes.id");
				
				
				foreach($rs_classesarray as $classname)
				{												
					// continue three days leave student
					$cont_three_days_leave_students = $this->app->cmx->continue_three_days_leave_students_sql($classname['id'],$this->app->schoolattandencedate); 							
					//echo count($cont_three_days_leave_students);
					
					if(count($cont_three_days_leave_students) > 0)
					{						
						foreach($cont_three_days_leave_students as $cont_three_days_leave_student)
						{				
				?>
	        	<tr>
	        		<td style="width: 30%"><?php echo $classname['name'].' '.$classname['cm_sections_section_name']; ?></td>
	        		<td style="width: 5%"><?php echo $cont_three_days_leave_student['student_id_no']; ?></td>	
	        		<td style="width: 45%"><?php echo $cont_three_days_leave_student['student_name']; ?></td>	
	        		<td style="width: 20%"><?php echo $cont_three_days_leave_student['student_student_mobile_no']; ?></td>		        			        		
	        	</tr>
	        	<?php } ?>
	        	<tr>
	        		<td style="color: red;">Total Students</td>
	        		<td></td>
	        		<td style="color: red;"><?php echo count($cont_three_days_leave_students); ?></td>	
	        		<td></td>
	        	</tr>
				<?php }} ?>
	        </table>
	      </div>
	      
	      
	      
	      <!-- zero attandence class -->
	      
	      
	      <div class="col-md-6">
	        <table class="table table-bordered">
	        	<tr>
	        		<th>Sr No.</th>
	        		<th>Class Section</th>
	        		<th>Staff Code</th>
	        		<th>Class Teacher</th>
	        	</tr>
	        	<?php
	        	
	        	$not_mark_class = $this->app->not_marked_class;
				$not_marked_class = implode("','", $not_mark_class);
	        	
	        	$obj_not_mark_classes = $this->app->load_model("cm_classes");
				$obj_not_mark_classes->join_table("cm_sections","left",array("id","section_name"),array("id"=>"class_id"));
				$rs_classesarray = $obj_not_mark_classes->execute("SELECT", false, ""," cm_classes.status != 2 and cm_classes.id IN ('".$not_marked_class."')  ","","");
				
				foreach($rs_classesarray as $k => $classname)
				{											
								
				?>
	        	<tr>
	        		<td style="width: 5%"><?php echo $k+1; ?></td>
	        		<td style="width: 30%"><?php echo $classname['name'].' '.$classname['cm_sections_section_name']; ?></td>	
	        		<td style="width: 45%">--</td>	
	        		<td style="width: 20%">--</td>		        			        		
	        	</tr>
	        	<?php } ?>	        	
	        </table>
	      </div>
	      
	      
	      
	    </div>  
        <!-- panel-body --> 
        
      </div>
    </div>
  </div>
  <!--.container-fluid--> 
</div>
<!--.page-content--> 


