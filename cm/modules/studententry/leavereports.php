<?php
if(isset($this->app->leavereportrecords) && $this->app->leavereportrecords!='')
{
	
?>
<div class="page-content">
  <div class="container-fluid mt50 dizzilist-block">
    <div class="col-xxl-12 col-md-12">
    	<?php 
    	if($this->app->leavereportrecords == "notfound")
		{				
    		echo "<div style='border: 1px solid #b9b9b9;padding: 10px;'> Data Not Found. </div>"; 
		}else
		{ 			
		?>
	    	<? $this->app->htmlBuilder->buildTag("form", array("action"=>"","class"=>""), "frm_leavereportexcelexport");?>
	      	<? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>"frm_leavereportexcelexport"), "act");?>
	        <input type="hidden" name="leavereportexcelexport" value='<?php echo $this->app->getGetVar('record_id'); ?> ' />
			
	    	<?php echo $this->app->leavereportrecords; ?>
	    	
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
      <? $this->app->htmlBuilder->buildTag("form", array("action"=>"","class"=>""), "frm_leavereport");?>
      <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>"frm_leavereport"), "act");?>
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
		              <div class='input-group date'>
		              	<label for="field-1" class="control-label">From Date </label>
						<input id="from_date" name="from_date"type="text" value="" class="form-control indatepicker">
		                <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> 
		              </div>
		            </div>
		          </div>
		          <div class="col-md-12">
		            <div class="form-group">
		              <div class='input-group date'>
		              	<label for="field-1" class="control-label">To Date</label>
						<input id="to_date" name="to_date"type="text" value="" class="form-control indatepicker">
		                <span class="input-group-addon"> <i class="font-icon font-icon-calend"></i> </span> 
		              </div>
		            </div>
		          </div>
		          <div class="col-md-12">
		            <div class="form-group">
		              <div class='input-group date'>
		              	<label for="field-1" class="control-label">Leave</label>
			          	<select class="select2 select2-hidden-accessible" name="leavetype">
							<option value=""> Leave Type </option>
							<option value="ml"> Medical Leave </option>
							<option value="ol"> Official Leave </option>
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
                  		<button type="submit" class="btn btn-info waves-effect waves-light" id="">Detail Report</button>
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

