<?php
if(isset($this->app->absentreportrecords) && $this->app->absentreportrecords!='')
{
?>
<div class="page-content">
  <div class="container-fluid mt50 dizzilist-block">
    <div class="col-xxl-12 col-md-12">
    	<?php 
    	if($this->app->absentreportrecords == "notfound")
		{			
    		echo "<div style='border: 1px solid #b9b9b9;padding: 10px;'> Data Not Found. </div>"; 
		}else
		{
    	?>
    	<? $this->app->htmlBuilder->buildTag("form", array("action"=>"","class"=>""), "frm_absentreportexcelexport");?>
      	<? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>"frm_absentreportexcelexport"), "act");?>
        <input type="hidden" name="absentreportexcelexport" value='<?php echo $this->app->getGetVar('record_id'); ?> ' />


    	<table class='table table-striped'>
    		<tr>
    			<th>Sr No.</th>
    			<th>Class</th>
    			<th>Division</th>
    			<th>ID No.</th>
    			<th>Student Name</th>
    			<th>Mobile</th>
    		</tr>
    		<?php
    		foreach($this->app->absentreportrecords as  $k => $absentreportrecords)
			{
    		?>
    		<tr>
    			<td><?php echo $k+1; ?></td>
    			<td><?php echo $absentreportrecords['class_name']; ?></td>
    			<td><?php echo $absentreportrecords['divisionname']; ?></td>
    			<td><?php echo $absentreportrecords['studentidno']; ?></td>
    			<td><?php echo $absentreportrecords['studentname']; ?></td>
    			<td><?php echo $absentreportrecords['student_mobile_no']; ?></td>
    		</tr>
    		<?php } ?>
    		<tr>
    			<td><span style="color: red" > Total Students </span></td>
    			<td><span style="color: red" ><?php echo count($this->app->absentreportrecords); ?></span></td>
    		</tr>
    	</table>
    	
    	<div class="col-md-12">
      		<button type="submit" class="btn btn-info waves-effect waves-light" id="">Export Excel</button>
        </div> 
    	<?=$this->app->htmlBuilder->closeForm()?>
    	<?php } ?>
    </div>
  </div>
</div>
<?php }else{ ?>


<div class="page-content">
  <div class="container-fluid mt50 dizzilist-block">
    <div class="col-xxl-12 col-md-12">
    <?php if($this->app->display_table==""){ ?>	
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title mb0">Leave Report</h4>
          <ol class="breadcrumb breadcrumb-simple">
            <li><a href="javascript:void(0);"><?php echo $this->app->module_title?></a></li>
            <li><a href="javascript:void(0);">Setup</a></li>
            <li class="active">Leave Report</li>
          </ol>
        </div>
        <?php echo $this->app->utility->get_message();?>
        <div class="panel-body">
      <? $this->app->htmlBuilder->buildTag("form", array("action"=>"","class"=>""), "frm_absentreport");?>
      <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>"frm_absentreport"), "act");?>
          <div class="row mb20">
            <div class="col-md-6 col-sm-12 search-container padding-bottom15">
              <div class="input-group">               	
                  <div class="col-md-12">
		            <div class="form-group">
		              <label  class="control-label">Academy Year</label>
		      		  <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2", "values"=>$this->app->academic_year_dd), "academicyear1");?>
		            </div>
		          </div>
		          <div class="col-md-12">
		            <div class="form-group">
		              <label  class="control-label">Course</label>
		      		  <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2", "values"=>$this->app->course_dd), "course1");?>
		            </div>
		          </div>
		          <div class="col-md-12">
		            <div class="form-group">
		              <label  class="control-label">Semester</label>
		      		  <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2", "values"=>$this->app->sem_dd), "sem1");?>
		            </div>
		          </div>
		          <div class="col-md-12">
		            <div class="form-group">
		              <label  class="control-label">Division</label>
		      		  <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2", "values"=>$this->app->division_dd), "division1");?>
		            </div>
		          </div>		          
		          <div class="col-md-12">
		            <div class="form-group">
		              <div class='input-group date'>
		              	<label for="field-1" class="control-label">Date</label>
						<input type="text" class="form-control required" id="date" name="date" readonly="" value="<?php echo date('Y-m-d'); ?>">
						<!-- <input id="date" name="date"type="text" value="" readonly="" class="form-control indatepicker"> -->		                <!-- <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span>  -->		              </div>
		            </div>
		          </div>		          
		          <div class="col-md-12">
		            <div class="form-group">
		              <div class='input-group date'>
		              	<label for="field-1" class="control-label">Leave</label>
			          	<select class="select2 select2-hidden-accessible" name="lastdate" required>
							<option value=""> Last Days </option>
							<option value="1"> 1 </option>
							<option value="2"> 2 </option>
							<option value="3"> 3 </option>
							<option value="4"> 4 </option>
							<option value="5"> 5 </option>
							<option value="6"> 6 </option>
							<option value="7"> 7 </option>
							<option value="8"> 8 </option>
							<option value="9"> 9 </option>
							<option value="10"> 10 </option>
							<option value="11"> 11 </option>
							<option value="12"> 12 </option>
							<option value="13"> 13 </option>
							<option value="14"> 14 </option>
							<option value="15"> 15 </option>1
						</select>
					  </div>
		            </div>
		          </div>	          
		          <!-- <div class="col-md-12">
		            <div class="form-group">
		              <div class="checkbox">
		                <input id="downloadreport" name="downloadreport" value="1" type="checkbox">
		                <label for="downloadreport">Download Report</label>
		              </div>
		            </div>
		          </div> -->		                         
                  <div class="col-md-12">
                  		<button type="submit" class="btn btn-info waves-effect waves-light" id="">Show Students</button>
	              </div>               
               </div>
            </div>
            
          </div>
                <?=$this->app->htmlBuilder->closeForm()?>
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
      <?php }else{ ?>
      	<?php echo $this->app->display_table;?>
      	<?php } ?>
    </div>
  </div>
  <!--.container-fluid--> 
</div>
<!--.page-content--> 

<?php } ?>

