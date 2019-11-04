<style>
label {
	text-transform: capitalize;
}
.md-input-container label.error {
	position: absolute;
	top: -13px;
	font-size: 12px;
	color: #ff0000;
	opacity: 1 !important;
	font-weight: 500;
}
.md-input-container label {
	position: absolute;
	top: 0px;
	left: 2px;
	opacity: 0.8;
	font-size: 12px;
	color: #1a1a1a;
}
.panel-body .hidden {
	display: none;
}
.panel-body .md-input-container .md-input {
	display: block;
	border-color: #e8e8e8 !important;
}
.import-data-sample .table-bordered > tbody > tr > td, .import-data-sample .table-bordered > thead > tr > th {
	border: 1px solid #c5c5c5;
}
.import-data-sample .table-bordered > thead > tr > th {
	border-top: 1px solid #c5c5c5 !important;
	background: #edf0f5;
}
.note-box {
	padding: 10px;
	border: 1px solid #c5c5c5;
	margin-bottom: 20px;
	background: #fff;
	border-radius: 3px;
}
.import-data-sample {
	padding: 10px;
	background: #fff;
	border: 1px solid #ddd;
	border-radius: 3px;
}
form.form-horizontal .bottom-form-container label.control-label.text-left {
	text-align: left !important;
	/* display: inline-block; */
	width: 100%;
}
.loading_file_area {
	width: 70%;
	float: left;
	vertical-align: top;
}
#progress-div {
	border: #188ae2 1px solid;
	padding: 0px 0px;
	margin: 10px 0px 10px 10px;
	border-radius: 0px;
	text-align: center;
}
#progress-bar {
	background-color: #12CC1A;
	height: 10px;
	color: #FFFFFF;
	width: 0%;
	-webkit-transition: width .3s;
	-moz-transition: width .3s;
	transition: width .3s;
}
#progress-status {
	font-size: 10px;
	line-height: 10px;
}
#targetLayer {
	width: 100%;
	text-align: center;
}
#excelPreview .table-responsive {
	max-height: 400px;
}
div#excelPreview {
	padding: 20px;
	background: #fff;
	border-radius: 5px;
	border: 1px solid #ddd;/* padding-top: 0px; */
}
#excelPreview h4 {
	margin-top: 0px;
	/* background: #ddd; */
	border-bottom: 1px solid #2196f3;
	padding-bottom: 15px;
	margin-bottom: 20px;
	text-transform: uppercase;
	font-size: 14px;
	font-weight: 400;
}
div#excelPreview p {
	font-size: 12px;
	color: #f37d18;
}
#import_data {
	display: none;
}
#generate_pdf {
	display: none;
}
</style>
<style>
div#addressdiv {
	border: 1px solid rgba(142, 159, 167, 0.26);
	padding: 20px;
	margin: 20px 0;
}
.addressheading {
	color: #16b4fc;
}
input#permenentaddresscheckbox {
	float: left;
	width: 20px;
	margin: 0px;
}
</style>

<div class="page-content">
 <div class="container-fluid mt50 dizzilist-block">
  <div class="col-xxl-12 col-md-12">
   <? $this->app->htmlBuilder->buildTag("form", array("action"=>"","class"=>""), "frm_students_import");?>
   <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>"import_students"), "connector");?>
   <? $this->app->htmlBuilder->buildTag("input", array("type"=>"hidden", "value"=>""), "fnm");?>
   
   
   
   
   <div class="panel panel-default">
    <div class="panel-heading">
     <h4 class="panel-title">Student Import </h4>
    </div>
    <div class="panel-body">
     <div class="invoice-wrap">
      <div class="top-form-container">
       <h3 class="title-md">Import Students</h3>
       <div class="clearfix" id="excelUploadInfo">
        <div class="note-box">
         <p>Your Excel data should be in the format below. The first line of your Excel file should be the column headers as in the table example. Also make sure that your file is UTF-8 to avoid unnecessary encoding problems.</p>
         <p>If the column you are trying to import is date make sure that is formated in format d-m-Y ( <?php echo date('d-m-Y');?>)</p>
         <p><strong style="color:#ff0000;">Note:</strong><strong>You Can Upload 1000 Enteries at a time.System will skip enteries after once 1000 Rows.</strong></p>
        </div>
        <div class="import-data-sample">
         <div class="table-responsive">
         
<table cellspacing="0" cellpadding="0" class="table table-bordered">
<thead>
  <tr>
  <th width="64">ID</th>
  <th width="123">First Name</th>
  <th width="128">Middle Name</th>
  <th width="121">Last Name</th>
  <th width="112">Mother Name</th>
  <th width="69">Gender</th>
  <th width="102">Student Image</th>
  <th width="78">Category</th>
  <th width="102">Blood Group</th>
  <th width="100">Religion</th>
  <th width="130">Cast</th>
  <th width="68">Course</th>
  <th width="82">Semester</th>
  <th width="72">Division</th>
  <th width="68">id no</th>
  <th width="87">Class</th>
  <th width="147">Mobile Number</th>
  <th width="163">Residence Number</th>
  <th width="146">Parents Mobile Number</th>
  <th width="138">Parents Office Number</th>
  <th width="147">Occupation of Father</th>
  <th width="125">Guardian Annual Income</th>
  <th width="146">Physically Handicaped</th>
  <th width="98">Academic Year</th>
  <th width="88">Fee Status</th>
  <th width="99">Fee Amount</th>
  <th width="109">Fee Last Date</th>
  <th width="124">Late Fee Charges</th>
  <th width="112">Transaction Id</th>
  <th width="128">Transaction Date</th>
  <th width="123">Status</th>
  <th width="122">Date of Admission</th>
  <th width="137">Enrolment Form Number</th>
  <th width="132">PRN No</td>
  <th width="224">Name of Previous school / College</th>
 </tr>
</thead>
<tbody>
 <tr>
  <td align="right">490</td>
  <td>SUJAT</td>
  <td>MAHEBUBALI</td>
  <td>ALWANI</td>
  <td>YASMIN</td>
  <td>Male</td>
  <td>15BBA001.jpg</td>
  <td>OPEN</td>
  <td>B +ve</td>
  <td>Islam (Muslim)</td>
  <td></td>
  <td>B.B.A.</td>
  <td align="right">6</td>
  <td align="right">1</td>
  <td>15BBA001</td>
  <td>B.B.A. SEM. 6</td>
  <td align="right">9979916037</td>
  <td></td>
  <td align="right">9909220411</td>
  <td></td>
  <td>Shopkeeper</td>
  <td align="right">90000</td>
  <td>No</td>
  <td>2017-18</td>
  <td>Unpaid</td>
  <td align="right">7415</td>
  <td align="right">5-12-16</td>
  <td align="right">50</td>
  <td align="right">0</td>
  <td align="right">0</td>
  <td>Active</td>
  <td></td>
  <td align="right">11</td>
  <td>2015032700010567</td>
  <td></td>
 </tr>
 <tr>
  <td align="right">491</td>
  <td>FORAM</td>
  <td>DILIP</td>
  <td>BHANUSHALI</td>
  <td>DEEPABEN</td>
  <td>Female</td>
  <td>15BBA002.jpg</td>
  <td>OPEN</td>
  <td>O -ve</td>
  <td>Hindu</td>
  <td>BHANUSHALI</td>
  <td>B.B.A.</td>
  <td align="right">6</td>
  <td align="right">1</td>
  <td>15BBA002</td>
  <td>B.B.A. SEM. 6</td>
  <td align="right">8141363172</td>
  <td></td>
  <td align="right">9825789940</td>
  <td></td>
  <td>Businessman</td>
  <td align="right">200000</td>
  <td>No</td>
  <td>2017-18</td>
  <td>Unpaid</td>
  <td align="right">7415</td>
  <td align="right">5-12-16</td>
  <td align="right">50</td>
  <td align="right">0</td>
  <td align="right">0</td>
  <td>Active</td>
  <td></td>
  <td align="right">2</td>
  <td>2015032700010575</td>
  <td></td>
 </tr>
 <tr>
  <td align="right">493</td>
  <td>BHAVIKA</td>
  <td>BHIMJI</td>
  <td>BHUDIYA</td>
  <td>LALILABEN</td>
  <td>Female</td>
  <td>15BBA004.jpg</td>
  <td>OPEN</td>
  <td>O +ve</td>
  <td>Hindu</td>
  <td>PATEL</td>
  <td>B.B.A.</td>
  <td align="right">6</td>
  <td align="right">1</td>
  <td>15BBA004</td>
  <td>B.B.A. SEM. 6</td>
  <td align="right">7069364548</td>
  <td></td>
  <td align="right">9825633697</td>
  <td></td>
  <td>Farmer</td>
  <td align="right">300000</td>
  <td>No</td>
  <td>2017-18</td>
  <td>Unpaid</td>
  <td align="right">7415</td>
  <td align="right">5-12-16</td>
  <td align="right">50</td>
  <td align="right">0</td>
  <td align="right">0</td>
  <td>Active</td>
  <td></td>
  <td align="right">3</td>
  <td>2015032700010591</td>
  <td></td>
 </tr>
 <tr>
  <td align="right">495</td>
  <td>BHOOMI</td>
  <td>RAJENDRABHAI</td>
  <td>BODHA</td>
  <td>UMA</td>
  <td>Female</td>
  <td>15BBA006.jpg</td>
  <td>OPEN</td>
  <td>A -ve</td>
  <td>Hindu</td>
  <td>BRAHMIN</td>
  <td>B.B.A.</td>
  <td align="right">6</td>
  <td align="right">1</td>
  <td>15BBA006</td>
  <td>B.B.A. SEM. 6</td>
  <td align="right">9978722858</td>
  <td align="right">2832275786</td>
  <td align="right">9426789374</td>
  <td></td>
  <td>Service</td>
  <td align="right">500000</td>
  <td>No</td>
  <td>2017-18</td>
  <td>Unpaid</td>
  <td align="right">7415</td>
  <td align="right">5-12-16</td>
  <td align="right">50</td>
  <td align="right">0</td>
  <td align="right">0</td>
  <td>Active</td>
  <td></td>
  <td align="right">26</td>
  <td>2015032700010625</td>
  <td></td>
 </tr>
 </tbody>
</table>

         
          
         </div>
         <!--<div class="mt20 text-right"> <a class="btn btn-info waves-effect" href="javascript:void(0);" onclick="download_sample('export_sampleexcel')"><i class="fa fa-download"></i> Download Sample File</a> </div>-->
        </div>
       </div>
       <div class="clearfix" id="excelPreview" style="display:none;">
        <h4>Excel Sheet Preview</h4>
        <div class="table-responsive"> </div>
       </div>
       <hr style="border:0px;" />
      </div>
      <div class="bottom-form-container" id="bottom-form-container">
       <div class="clearfix text-right total-sum mb30">
        <div class="row">
         <div class="col-md-6 pull-left">
          <div class="form-group">
           <label for="file_csv" class="control-label text-left"> <small class="req text-danger">* </small>Choose Excel File</label>
           <input type="file" id="file_import" name="file_import" class="form-control" value="">
          </div>
          <div class="loading_file_area" style="display:none;">
           <div id="progress-div">
            <div id="progress-bar"></div>
           </div>
           <div id="targetLayer"></div>
          </div>
         </div>
        </div>
       </div>
      </div>
     </div>
    </div>
   <div class="panel-footer">
 <button class="btn btn-info mr5" type="button" data-fname="frm_students_import" id="uploadimpfile">Upload</button>
 <button class="btn btn-success mr5" type="button" data-fname="frm_students_import" id="import_data">Import Data</button>
 <button class="btn btn-success mr5" type="button" data-fname="frm_students_import" id="generate_pdf">Generate PDF</button>
 <a href="<?php echo SERVER_ROOT;?>/cm/studententry/" class="btn btn-default">Cancel</a> </div>
   </div>
   <?=$this->app->htmlBuilder->closeForm()?>
  </div>
 </div>
</div>

<!-- panel-body -->


