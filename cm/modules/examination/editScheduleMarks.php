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
          <? $this->app->htmlBuilder->buildTag("form", array("action"=>"","class"=>""), "frm_marks");?>
          <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>"update_sch_marks"), "act");?>
          <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>$this->app->exam_sch_id),"record_id");?>
          <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>$this->app->cmx->curPageURL()),"returnUrl");?>
          <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>$this->app->class_id),"class_id");?>
          <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>$this->app->acd_year_id),"acd_year_id");?>
          <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>$this->app->sub_id),"sub_id");?>
         <?php /*?><div class="panel-heading pull-right" id="dateheaqding">
         	<span><?php echo date('j F Y',$this->app->atten[0]['add_date']); ?></span>
         </div>	<?php */?>

          <div class="panel-default">
          	
          	 <div class="panel-body">
      
          <table class="table table-striped table-bordered"  >
            <thead>
              <tr>
                <th style="width:2%;" class="sort-column">Sr.</th>
                <th style="width:7%;" class="sort-column">Class Section</th>
                <th style="width:7%;" class="sort-column">Roll No.</th>
                <th style="width:15%;" class="sort-column">Student Name</th>
                <?php 
                    if(count($this->app->ent_terms)>0)
                    {
                      foreach($this->app->ent_terms as $terms)
                      {
                        echo '<th style="width:8%;" class="sort-column">'.$terms['act_name'].'('.$terms['max_mark'].')</th>';
                      

                      }
                      
                    }
                    
                    ?>
        <p id="error_message"></p>
               
                <!-- <?php ?><th style="width:15%;" class="sort-column">Total Marks</th> -->
                <!-- <th style="width:15%;" class="sort-column">Grade</th><?php ?> -->
                <th style="width:38%;" class="sort-column">Remarks</th>
              </tr>
            </thead>
            <tbody>
            	<?php 
				
        $status_array1=array(""=>"Select","AB"=>"AB","NA"=>"NA","EX"=>"EX","ML"=>"ML","OL"=>"OL");
       
				
					
				foreach($this->app->students as $k => $student)
				{
         
				?>
				<input type="hidden" name="student_id1[]" value="<?php echo $student['id']; ?>"/>
			
				
        
				<tr>					
					<td><?php echo $k+1; ?></td>
					<td><?php echo $this->app->class_namenew;?></td>
					<td><?php echo $student['id_no']; ?><input type="hidden" name="stud_id_no1[]" value="<?php echo $student['id_no']; ?>"/></td>
					<td>
                    <?php echo $student['name']; ?>
                    <input type="hidden" name="stud_name1[]" value="<?php echo $student['name']; ?>"/>
                    </td>

          
         
         
                    <?php 
						foreach($this->app->ent_terms as $terms)
					{
            $marks_txt=$this->app->cmx->get_marks($terms['sub_id'],$student['id'],$terms['id'],$terms['exam_id']);
            ?> 
						<td>
            <?php 
  $this->app->htmlBuilder->buildTag("select", array("class"=>"select2 select2-hidden-accessible w150 sch_mark_enter",  "name"=>"default_status_".$student['id'].'[]',"values"=>$status_array1,"selected"=>$marks_txt['default_status']),"");
            ?>
           <?php echo'<input type="text" class="form-control edit_marks" data-marks="'.$terms['max_mark'].'"  data-cmarks="'.$marks_txt['marks'].'" name="marks1_'.$student['id'].'[]" value="'.$marks_txt['marks'].'"  /></td>';
            echo '<input type="hidden" class="form-control" name="marks_id_'.$student['id'].'[]" value="'.$marks_txt['id'].'"  />';
            //echo '<input type="hidden" class="form-control" name="default_status_'.$student['id'].'[]" value="'.$marks_txt['default_status'].'"  />';
            // echo '<td><input type="text" class="form-control a_mark" data-marks="'.$terms['max_mark'].'"  data-cmarks="'.$marks_txt['marks'].'" name="marks1_'.$student['id'].'[]" value="'.$marks_txt['default_status'].'"  /></td>';
          }
          
					?>
                    <?php ?>
                    <!-- <td><input type="text" class="form-control" name="tot_marks1[]" value="<?php echo $total['marks'];?>"  /></td>
                    <td><input type="text" class="form-control" name="grade1[]" value="<?php echo $remark;?>"/></td> -->
                    <?php ?>
                     <td><input type="text" class="form-control e-remark" name="remarks1[]" value="<?php echo $remark;?>"  /></td>
				</tr>	
				<?php } 
				?>
            </tbody>
          </table>
          </div>
          <div class="panel-footer">          	
          	<button type="submit" class="btn btn-success btn-md" name="save" value="save">Save</button>          	
          	<button type="submit" class="btn btn-danger btn-md" name="saveandclose" value="savenclose">Save & Close</button>
          	
          </div>
               
	
          </div>
           <?=$this->app->htmlBuilder->closeForm()?>
        </div>
        
        <!-- panel-body --> 
        
      </div>
    </div>
  </div>
  <!--.container-fluid--> 
</div>
<!--.page-content--> 
