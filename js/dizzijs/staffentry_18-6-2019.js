// JavaScript Document
// Configuration
var studententrySubmissions = function() 
{
	"use strict";
	// Handle Academic Form
	var handlestaffForm = function() {
	$().ready(function() {
	// validate the comment form when it is submitted
	var validator =$("#frm_staff").validate({
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
	   $("#frm_staff").ajaxSubmit({
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
					//cf_datapager(1,response.retriver);
					window.setTimeout(function()
					{
						$("#staff_response").html('');	
						window.location.href = response.URL;	
					}, 2000);
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
	studententrySubmissions.init();
});
function edit_staff(act_id)
{
	$.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: "connector=edit_staff&act_id="+act_id,
                    success: function(data)
					{
					 	$("#frm_staff #department").val(data.result.department).trigger("change");
					 	$("#frm_staff #designation").val(data.result.designation).trigger("change");
					 	//$("#frm_staff #subject").val(data.result.subject).trigger("change");
						$("#frm_staff #sel_cls_inchrg").val(data.result.class_incharge);
						$("#frm_staff #sel_sub_1").val(data.result.subject);
						$("#frm_staff #class_incharge").val(data.result.class_incharge).trigger("change");
						
						$("#frm_staff #record_id").val(act_id);
						$("#con-close-modal").modal("show");
					 }
			     });
}
$('#department').on('change', function (e) {
	//alert("hello");
   // var optionSelected = $("option:selected", this);
   var optionSel = $("#department").val();
//var optionSel2 = $("#sem").val();
  $.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: "connector=getSubjectClassbyCourse&act_id="+optionSel,
                    success: function(data)
					{
						if(data.success!='1')
						{
							$('#sel_subject').html(data.sub_text);
							$('#sel_cls_inc').html(data.class_text);
							//$("#frm_staff #class_incharge").val($("#sel_cls_inchrg").val()).trigger("change");
							if($("#sel_cls_inchrg").val()!='')
							{
								var res = $("#sel_cls_inchrg").val().split(",");
								$.each(res,function(i){
								 // alert(res[i]);
								   $("#frm_staff #sel_cls_inc option[value='" + res[i] + "']").prop("selected", true);
								  //$("#frm_staff #sel_subject").val(res[i]).trigger("change");
								});
							}
							if($("#sel_sub_1").val()!='')
							{
								var res = $("#sel_sub_1").val().split(",");
								$.each(res,function(i){
								 // alert(res[i]);
								   $("#frm_staff #sel_subject option[value='" + res[i] + "']").prop("selected", true);
								  //$("#frm_staff #sel_subject").val(res[i]).trigger("change");
								});
							}
							
						}
						else
						{
							
						}
					 	
						
					 }
			     });
    
});