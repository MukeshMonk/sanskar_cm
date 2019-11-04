<div class="page-content">
  <div class="container-fluid mt50 dizzilist-block">
    <div class="col-xxl-12 col-md-12">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h4 class="panel-title mb0">Monthly Average Report</h4>
          <ol class="breadcrumb breadcrumb-simple">
            <li><a href="javascript:void(0);"><?php echo $this->app->module_title?></a></li>
            <li><a href="javascript:void(0);">Setup</a></li>
            <li class="active">Monthly Average Report</li>
          </ol>
        </div>
        
        <div class="panel-body">
          
        <? $this->app->htmlBuilder->buildTag("form", array("action"=>"","class"=>""), "frm_monthlyaveragereport");?>
        <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>"frm_monthlyaveragereport"), "act");?>
   
        <div class="row">
          <div class="col-md-3">
	        <div class="form-group">
	          <label  class="control-label">Academy Year<span class="mandatory">*</span></label>
              <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2", "values"=>$this->app->academic_year_dd), "academicyear1");?>
            </div>
          </div>
         <div class="col-md-3">
	        <div class="form-group">
	          <label  class="control-label">Section<span class="mandatory">*</span></label>
	          <select name="report_month" id="report_month" class="select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
				<option value="">Select Month</option>
				<option value="1">Jan</option>
				<option value="2">Fen</option>
				<option value="3">Mar</option>
				<option value="4">Apr</option>
				<option value="5">May</option>
				<option value="6">Jun</option>
				<option value="7">July</option>
				<option value="8">Aug</option>
				<option value="9">Sep</option>
				<option value="10">Oct</option>
				<option value="11">Nov</option>
				<option value="12">Dec</option>
			  </select>
			</div>
         </div>
         <div class="col-md-3">
	        <div class="form-group">
	          <label  class="control-label">Year<span class="mandatory">*</span></label>
              <input type="text" class="form-control required" id="year" name="year">
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
                Bar Chart
            </header>
            <div class="card-block">
                <div id="bar-chart1"></div>
            </div>
        </section>
          
        </div>
        
        <!-- panel-body --> 
        
      </div>
    </div>
  </div>
  <!--.container-fluid--> 
</div>
<!--.page-content--> 


<!-- <script>
	$(document).ready(function() {

    var barChart = c3.generate({
        bindto: '#bar-chart',
        data: {
            columns: [
                ['data1', 30, 200, 100, 400, 150, 250],
                ['data2', 130, 100, 140, 200, 150, 50]
            ],
            type: 'bar'
        },
        bar: {
            width: {
                ratio: 0.5
            }
        }
    });
});
</script> -->


