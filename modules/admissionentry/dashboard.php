<div class="page-content">

  <div class="container-fluid mt50 dizzilist-block">

    <div class="col-xxl-12 col-md-12">

      <div class="panel panel-default">

        <div class="panel-heading">

          <h4 class="panel-title mb0">Dashboard</h4>

        </div>

        

        <div class="panel-body">

          

        <? $this->app->htmlBuilder->buildTag("form", array("action"=>"","class"=>""), "frm_monthlyaveragereport");?>

        <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>"frm_monthlyaveragereport"), "act");?>

   

        <div class="row">

          <div class="col-md-3">

	        <div class="form-group">

	          <label  class="control-label">Academy Year<span class="mandatory">*</span></label>

              <? $this->app->htmlBuilder->buildTag("select", array("class"=>"select2", "values"=>$this->app->academic_year_dd,"onchange"=>"change_sel_year();"), "academicyear1");?>

            </div>

          </div>

	        

        </div>

        <?=$this->app->htmlBuilder->closeForm()?>  

          

          

          <section class="card">

            <header class="card-header">

                Admission Summary

            </header>

            <div class="card-block">

                <div id="bar-chart1"></div>

            </div>

        </section>
        <section class="card">

            <header class="card-header">

                Class Admission Summary

            </header>

            <div class="card-block">

                <div id="bar-chart2"></div>

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





