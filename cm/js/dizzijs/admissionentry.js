// JavaScript Document
// JavaScript Document
// JavaScript Document
// Configuration
var studententrySubmissions = function() 
{
	"use strict";
	
	// Handle Academic Form
	var handlestaffForm = function() {
	$().ready(function() {
	// validate the comment form when it is submitted
	var validator =$("#frm_initiate").validate({
	rules: {			
			name: {required: true},			
		},
		messages: 
		{		
			name: {required: "Please Enter Name"},		
        },
		submitHandler: function (form) 
		{
			$("#save_staff").attr("disabled","disabled");
			$("#save_staff").text("Processing..");
			var server_root=$("#server_root").val();
		
     
	 
	 
	   $("#frm_initiate").ajaxSubmit({
        url:"clientside/socket/call.php",
        data:$(form).serialize(),
        dataType: 'json',
        success: function(response) {
			if (response.RESULT == 'SUCCESS')
			 {       			var s_msg='<div class="alert alert-success alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Success</h4><p>'+response.MSG+'</p></div>';
					$("#staff_response").html(s_msg); 
					$(form)[0].reset();
					$("#save_staff").removeAttr("disabled");
				    $("#save_staff").text("Save");
				    $("#record_id").val("");
					
					cf_datapager(1,response.retriver);
					window.setTimeout(function()
					{
						$("#staff_response").html('');
					}, 5000);
			 }
			 else
			 {
				 	var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';
					$("#staff_response").html(s_msg); 
					$("#save_staff").removeAttr("disabled");
				    $("#save_staff").text("Save");
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
			handlestaffForm();
							
		}
	}
}();

	
$(document).ready(function() {
	//alert(new Date().getFullYear().toString().substr(-2));	
	studententrySubmissions.init();
	
	$( ".tot_change" ).change(function() {
 var no_seat = parseInt($("#g_seat").val()) + parseInt($("#sc_seat").val()) + parseInt($("#st_seat").val()) + parseInt($("#sebc_seat").val()) + parseInt($("#ph_seat").val()) + parseInt($("#obq_seat").val()) + parseInt($("#mgmt_seat").val());
 // alert( "Handler for .change() called." );
 $("#no_seat").val(no_seat);
});
});
$( ".sel_class" ).change(function() {
 // alert($(this).val());
 $("#adm_code").val($(this).val()+"("+$(".sel_year").val()+")"); 
  $("#class_id").val($(this).val()); 
});
$( ".sel_year" ).change(function() {
  //alert($(this).val());
   $("#adm_code").val($(".sel_class").val()+"("+$(this).val()+")");
   $("#acd_year").val($(this).val());  
});


function edit_initiate(act_id)
{
	$.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: "connector=edit_initiate&act_id="+act_id,
                    success: function(data)
					{
						
						
					 	$("#frm_initiate #adm_code").val(data.result.adm_code);
						$("#frm_initiate #acd_year").val(data.result.acd_year);
						$("#frm_initiate #class_id").val(data.result.class_id);
					 	$("#frm_initiate #status").val(data.result.status).trigger("change");
					 	$("#frm_initiate #no_seat").val(data.result.no_seat);
						$("#frm_initiate #g_seat").val(data.result.g_seat);
						$("#frm_initiate #sc_seat").val(data.result.sc_seat);
						$("#frm_initiate #st_seat").val(data.result.st_seat);
						$("#frm_initiate #sebc_seat").val(data.result.sebc_seat);
						$("#frm_initiate #ph_seat").val(data.result.ph_seat);
						$("#frm_initiate #obq_seat").val(data.result.obq_seat);						$("#frm_initiate #mgmt_seat").val(data.result.mgmt_seat);
						$("#frm_initiate #inq_fees").val(data.result.inq_fees);
						$("#frm_initiate #adm_form_fees").val(data.result.adm_form_fees);
						$("#frm_initiate #adm_fees").val(data.result.adm_fees);
					 	$("#frm_initiate #int_acd_year").val(data.result.int_acd_year).trigger("change");
						$("#frm_initiate #int_class").val(data.result.int_class).trigger("change");
					 	$("#frm_initiate #sms").val(data.result.sms);
						$("#frm_initiate #inq_sms").val(data.result.inq_sms);
						$("#frm_initiate #adm_app_sms").val(data.result.adm_app_sms);
						$("#frm_initiate #adm_cnf_sms").val(data.result.adm_cnf_sms);
					 	
					 	$("#frm_initiate #dop").val(data.result.dop);
						$("#frm_initiate #un_date").val(data.result.un_date);
						$('.indatepicker').daterangepicker({
							singleDatePicker: true,
							showDropdowns: true,							
							 locale: {
			           			 format: 'DD-MM-YYYY',
								 separator:' - '
			       				 }
						});
						
						$("#frm_initiate #record_id").val(act_id);
						$("#con-close-modal").modal("show");
					 }
			     });
}






