// JavaScript Document
// JavaScript Document
// JavaScript Document
// Configuration
var examinationSubmissions = function() 
{
	"use strict";
	// Handle Academic Form
	var handleexamForm = function() {
	$().ready(function() {
	// validate the comment form when it is submitted
	var validator =$("#frm_exam_sch").validate({
	rules: {			
			name: {required: true},			
		},
		messages: 
		{		
			name: {required: "Please Enter Name"},		
        },
		submitHandler: function (form) 
		{
			$("#save_exam").attr("disabled","disabled");
			$("#save_exam").text("Processing..");
			var server_root=$("#server_root").val();
		
	 
	 
	   $("#frm_exam_sch").ajaxSubmit({
        url:"clientside/socket/call.php",
        data:$(form).serialize(),
        dataType: 'json',
        success: function(response) {
			if (response.RESULT == 'SUCCESS')
			 {       			var s_msg='<div class="alert alert-success alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Success</h4><p>'+response.MSG+'</p></div>';
					$("#exam_response").html(s_msg); 
					$(form)[0].reset();
					$("#save_exam").removeAttr("disabled");
				    $("#save_exam").text("Save");
				    $("#record_id").val("");
					
					cf_datapager(1,response.retriver);
					window.setTimeout(function()
					{
						$("#exam_response").html('');
					}, 5000);
			 }
			 else
			 {
				 	var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';
					$("#exam_response").html(s_msg); 
					$("#save_exam").removeAttr("disabled");
				    $("#save_exam").text("Save");
			 }
					
		
		
        },
        resetForm: true
      });
	  
	 return false; 
	 
	  }
	});
   
});
}

return {
		init: function() {
			handleexamForm();
							
		}
	}
}();

$('.change_cource').on('change', function (e) {
	//alert("hello");
   // var optionSelected = $("option:selected", this);
   var optionSel = $("#branch").val();
    var optionSel2 = $("#sem").val();
  $.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: "connector=data_cource_exam_schedule&act_id="+optionSel+"&sem_id="+optionSel2,
                    success: function(data)
					{
						if(data.success!='1')
						{
							$('#div1').html(data.sec_text);
							$('#sub').html(data.sub_text);
							$('#trm').html(data.term_text);
							//$("#frm_reg #first_name").val(data.result.first_name);
							//$("#frm_reg #gender").val(data.result.gender).trigger("change");
						}
						else
						{
							//$('#frm_reg')[0].reset();
							/*var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+data.MSG+'</p></div>';
					$("#students_response").html(s_msg);
					 $('#enq_no').selectmenu("refresh", true); */
							//$("#students_response").html(data.MSG);//students_response
						}
					 	
						
					 }
			     });
    
});

	
$(document).ready(function() {	
examinationSubmissions.init();
});
$('#con-close-modal').on('hidden.bs.modal', function () {
    $(this).find('form').trigger('reset');
})

function edit_exam_sch(act_id)
{
	
	$.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: "connector=edit_exam_sch&act_id="+act_id,
                    success: function(data)
					{
						
						$("#frm_exam_sch #a_year").val(data.result.acd_year_id).trigger("change");
						$("#frm_exam_sch #branch").val(data.result.cource_id).trigger("change");
					 	$("#frm_exam_sch #sem").val(data.result.sem_id).trigger("change");
						//$("#frm_exam_sch #div1").val(data.result.div_id).trigger("change");
					 	//$("#frm_exam_sch #trm").val(data.result.term_id).trigger("change");
						//$("#frm_exam_sch #sub").val(data.result.sub_id).trigger("change");
						$("#frm_exam_sch #sub_temp").val(data.result.sub_id);
						$("#frm_exam_sch #term_temp").val(data.result.term_id);
						$("#frm_exam_sch #sec_temp").val(data.result.div_id);
						//$("#frm_exam_sch #sub").val(data.result.sub_id);
						//alert(data.result.div_id);
						//new_edit_exam(data.result.sub_id);
						/*$.each(data.result.div_id.split(","), function(i,e){
							//alert($("#frm_exam_sch #div1").val());
							$("#frm_exam_sch #div1 option[value='" + e + "']").prop("selected", true);
						});*/
						$('#frm_exam_sch #div1').val(data.result.div_id.split(','));
					 	
						$("#frm_exam_sch #a_name").val(data.result.act_name);
						$("#frm_exam_sch #m_marks").val(data.result.max_mark);
						$("#frm_exam_sch #a_date").val(data.result.act_date);
					 	$("#frm_exam_sch #m_s_date").val(data.result.m_sub_date);
						$('.indatepicker').daterangepicker({
							singleDatePicker: true,
							showDropdowns: true,							
							 locale: {
			           			 format: 'DD-MM-YYYY',
								 separator:'-'
			       				 }
						});
						
						$("#frm_exam_sch #record_id").val(act_id);
						$("#con-close-modal").modal("show");
					 }
			     });

}
$('#con-close-modal').on('shown.bs.modal', function (e) {
  // do cool stuff here all day… no need to change bootstrap
  //alert("hello");
  var temp_sub = $("#frm_exam_sch #sub_temp").val();
   var temp_term = $("#frm_exam_sch #term_temp").val();
   var temp_sec = $("#frm_exam_sch #sec_temp").val();
  $("#frm_exam_sch #sub").val(temp_sub).trigger("change");
  $("#frm_exam_sch #trm").val(temp_term).trigger("change");
  $.each(temp_sec.split(","), function(i,e){
		//alert($("#frm_exam_sch #div1").val());
		$("#frm_exam_sch #div1 option[value='" + e + "']").prop("selected", true);
	});
})

$(document).on("blur",".edit_marks",function(){

    var max = $(this).attr("data-marks");
    var cur = $(this).attr("data-cmarks");
    var remarks = $(this).closest('tr').find('.e-remark').val();
    var v = $(this).val();
   
	if(remarks==''){
        jAlert("Please Enter Remarks");
    }
    if(parseInt(v) > parseInt(max))
    {
        jAlert("Please Enter Marks Less then "+max+" Marks");
        $(this).val(cur);
    }
    
    
 
});