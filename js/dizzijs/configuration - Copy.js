// JavaScript Document
// JavaScript Document
// JavaScript Document
// Configuration
var ConfigurationFormSubmissions = function() 
{
	"use strict";
	// Handle Academic Form
	var handleAcademicyearsForm = function() {
	$().ready(function() {
	// validate the comment form when it is submitted
	var validator =$("#frm_academicyears").validate({
	rules: {
			short_name: {required: true},
			name: {required: true},
			frm_date: {required: true},
			to_date: {required: true},
		},
		messages: 
		{
		short_name:{required: "Please Enter Short Name"},
		name: {required: "Please Enter Name"},
		frm_date: {required: "Please Select From Date"},
		to_date: {required: "Please Select To Date"},
        },
		submitHandler: function (form) 
		{
			$("#save_academicyears").attr("disabled","disabled");
			$("#save_academicyears").text("Processing..");
			var server_root=$("#server_root").val();
			
			$.ajax({
				type: $(form).attr('method'),
				url: "clientside/socket/call.php",
				data: $(form).serialize(),
				dataType : 'json'
			})
			.done(function (response) {
				if (response.RESULT == 'SUCCESS') {               
					
					var s_msg='<div class="alert alert-success alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Success</h4><p>'+response.MSG+'</p></div>';
					$("#academicyears_response").html(s_msg); 
					$(form)[0].reset();
					$("#save_academicyears").removeAttr("disabled");
				    $("#save_academicyears").text("Save");
				    $("#record_id").val("");
					
					cf_datapager(1,response.retriver);
					window.setTimeout(function()
					{
						$("#academicyears_response").html('');
					}, 5000);
					
					                      
				} else {
						var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';
					$("#academicyears_response").html(s_msg); 
					$("#save_academicyears").removeAttr("disabled");
				    $("#save_academicyears").text("Save");
				}
				
			});
		return false; // required to block normal submit since you used ajax
      }

		
   });
   
});
}
	
	
	// Handle Classes Form
	var handleClassesForm = function() {
	$().ready(function() {
	// validate the comment form when it is submitted
	var validator =$("#frm_classes").validate({
	rules: {
			seq: {required: true},
			abbreviation: {required: true},
			name: {required: true},
			asses_structid: {required: true},
			course_id: {required: true}
		},
		messages: 
		{
		seq:{required: "Please Enter Short Name"},
		abbreviation: {required: "Please Enter Abbreviation"},
		name: {required: "Please Enter Name"},
		name: {required: "Please Select Assessment Structure"},
		course_id: {required: "Please Select Course"}
        },
		submitHandler: function (form) 
		{
			$("#frm_classes").attr("disabled","disabled");
			$("#frm_classes").text("Processing..");
			//var server_root=$("#server_root").val();
			
			$.ajax({
				type: $(form).attr('method'),
				url: "clientside/socket/call.php",
				data: $(form).serialize(),
				dataType : 'json'
			})
			.done(function (response) {
				if (response.RESULT == 'SUCCESS') {               
					
					var s_msg='<div class="alert alert-success alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Success</h4><p>'+response.MSG+'</p></div>';
					$("#academicyears_response").html(s_msg); 
					$(form)[0].reset();
					$("#save_classes").removeAttr("disabled");
				    $("#save_classes").text("Save");
				    $("#record_id").val("");
					
					cf_datapager(1,response.retriver);
					window.setTimeout(function()
					{
						$("#classes_response").html('');
					}, 5000);
					
					                      
				} else {
						var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';
					$("#classes_response").html(s_msg); 
					$("#save_classes").removeAttr("disabled");
				    $("#save_classes").text("Save");
				}
				
			});
		return false; // required to block normal submit since you used ajax
      }

		
   });
   
});
}
			
				return {
					init: function() {
						handleAcademicyearsForm(); // initial setup for comment form
						handleClassesForm(); // initial setup for comment form
					}
				}
			}();
				
				$(document).ready(function() {
   				 ConfigurationFormSubmissions.init();
				});
				
function edit_academicyears(act_id)
{
	$.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: "connector=edit_academicyears&act_id="+act_id,
                    success: function(data)
					 {
						$("#frm_academicyears #short_name").val(data.result.short_name);
						$("#frm_academicyears #name").val(data.result.name);
						$("#frm_academicyears #t_date").val(data.result.t_date);
						$("#frm_academicyears #f_date").val(data.result.f_date);
						if(data.result.status==0)
						{
						$("#frm_academicyears #status").prop('checked',true);
						}
						$('.indatepicker').daterangepicker({
				singleDatePicker: true,
				showDropdowns: true,
				 locale: {
           			 format: 'DD-MM-YYYY',
					 separator:' - '
       				 }
			});

						$("#frm_academicyears #record_id").val(act_id);
						$("#con-close-modal").modal("show");
						
						
                        //$("#table_" + data.menu_id + ' tbody').html(data.html);
                        //window.location.reload();
                    }
                });
}


