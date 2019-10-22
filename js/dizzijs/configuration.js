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
	
	


var handleBlacklistsForm = function() {
	$().ready(function() {
	// validate the comment form when it is submitted
	var validator =$("#frm_blacklists").validate({
	rules: {
			library_hours1: {required: true},
			assignment1: {required: true},
			percentage1: {required: true},			
		},
		messages: 
		{
		library_hours1:{required: "Please Enter Library Hours"},
		assignment1: {required: "Please Enter Assignment"},
		percentage1: {required: "Please Select Percentage"},		
        },
		submitHandler: function (form) 
		{
			$("#save_blacklists").attr("disabled","disabled");
			$("#save_blacklists").text("Processing..");
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
					$("#blacklists_response").html(s_msg); 
					$(form)[0].reset();
					$("#save_blacklists").removeAttr("disabled");
				    $("#save_blacklists").text("Save");
				    $("#record_id").val("");
					
					cf_datapager(1,response.retriver);
					window.setTimeout(function()
					{
						$("#blacklists_response").html('');
					}, 5000);
					
					                      
				} else {
						var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';
					$("#blacklists_response").html(s_msg); 
					$("#save_blacklists").removeAttr("disabled");
				    $("#save_blacklists").text("Save");
				}
				
			});
		return false; // required to block normal submit since you used ajax
      }

		
   });
   
});
}

	
	
	
var handleCollegesForm = function() {
	$().ready(function() {
	// validate the comment form when it is submitted
	var validator =$("#frm_colleges").validate({
	rules: {
			name: {required: true},
			email: {required: true},
			website: {required: true},
			phonenumber: {required: true},
			affiliation_number: {required: true},			
		},
		messages: 
		{
		name:{required: "Please Enter Name"},
		email: {required: "Please Enter Email"},
		website: {required: "Please Enter Website"},
		phonenumber: {required: "Please Enter Phone"},
		affiliation_number: {required: "Please Enter Affiliation"},
        },
		submitHandler: function (form) 
		{
			$("#save_colleges").attr("disabled","disabled");
			$("#save_colleges").text("Processing..");
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
					$("#colleges_response").html(s_msg); 
					$(form)[0].reset();
					$("#save_colleges").removeAttr("disabled");
				    $("#save_colleges").text("Save");
				    $("#record_id").val("");
					
					cf_datapager(1,response.retriver);
					window.setTimeout(function()
					{
						$("#colleges_response").html('');
					}, 5000);
					
					                      
				} else {
						var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';
					$("#colleges_response").html(s_msg); 
					$("#save_colleges").removeAttr("disabled");
				    $("#save_colleges").text("Save");
				}
				
			});
		return false; // required to block normal submit since you used ajax
      }

		
   });
   
});
}	
	



var handleSmssendersForm = function() {
	$().ready(function() {
	// validate the comment form when it is submitted
	var validator =$("#frm_smssenders").validate({
	rules: {
			url: {required: true},
			xml_url: {required: true},
			prefix_xml: {required: true},
			dynamic_student_xml: {required: true},
			postfix_xml: {required: true},			
		},
		messages: 
		{
		url:{required: "Please Enter Url"},
		xml_url: {required: "Please Enter Xml Url"},
		prefix_xml: {required: "Please Enter Prefix Xml"},
		dynamic_student_xml: {required: "Please Enter Dynamic Student Xml"},
		postfix_xml: {required: "Please Enter Postfix Xml"},
        },
		submitHandler: function (form) 
		{
			$("#save_smssenders").attr("disabled","disabled");
			$("#save_smssenders").text("Processing..");
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
					$("#smssenders_response").html(s_msg); 
					$(form)[0].reset();
					$("#save_smssenders").removeAttr("disabled");
				    $("#save_smssenders").text("Save");
				    $("#record_id").val("");
					
					cf_datapager(1,response.retriver);
					window.setTimeout(function()
					{
						$("#smssenders_response").html('');
					}, 5000);
					
					                      
				} else {
						var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';
					$("#smssenders_response").html(s_msg); 
					$("#save_smssenders").removeAttr("disabled");
				    $("#save_smssenders").text("Save");
				}
				
			});
		return false; // required to block normal submit since you used ajax
      }

		
   });
   
});
}	





var handleQualificationsForm = function() {
	$().ready(function() {
	// validate the comment form when it is submitted
	var validator =$("#frm_qualifications").validate({
	rules: {
			name: {required: true},					
		},
		messages: 
		{
		name:{required: "Please Enter Name"},		
        },
		submitHandler: function (form) 
		{
			$("#save_qualifications").attr("disabled","disabled");
			$("#save_qualifications").text("Processing..");
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
					$("#qualifications_response").html(s_msg); 
					$(form)[0].reset();
					$("#save_qualifications").removeAttr("disabled");
				    $("#save_qualifications").text("Save");
				    $("#record_id").val("");
					
					cf_datapager(1,response.retriver);
					window.setTimeout(function()
					{
						$("#qualifications_response").html('');
					}, 5000);
					
					                      
				} else {
						var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';
					$("#qualifications_response").html(s_msg); 
					$("#save_qualifications").removeAttr("disabled");
				    $("#save_qualifications").text("Save");
				}
				
			});
		return false; // required to block normal submit since you used ajax
      }

		
   });
   
});
}	




var handleCategoriesForm = function() {
	$().ready(function() {
	// validate the comment form when it is submitted
	var validator =$("#frm_categories").validate({
	rules: {
			name: {required: true},					
		},
		messages: 
		{
		name:{required: "Please Enter Name"},		
        },
		submitHandler: function (form) 
		{
			$("#save_categories").attr("disabled","disabled");
			$("#save_categories").text("Processing..");
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
					$("#categories_response").html(s_msg); 
					$(form)[0].reset();
					$("#save_categories").removeAttr("disabled");
				    $("#save_categories").text("Save");
				    $("#record_id").val("");
					
					cf_datapager(1,response.retriver);
					window.setTimeout(function()
					{
						$("#categories_response").html('');
					}, 5000);
					
					                      
				} else {
						var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';
					$("#categories_response").html(s_msg); 
					$("#save_categories").removeAttr("disabled");
				    $("#save_categories").text("Save");
				}
				
			});
		return false; // required to block normal submit since you used ajax
      }

		
   });
   
});
}	



var handleReligionsForm = function() {
	$().ready(function() {
	// validate the comment form when it is submitted
	var validator =$("#frm_religions").validate({
	rules: {
			name: {required: true},					
		},
		messages: 
		{
		name:{required: "Please Enter Name"},		
        },
		submitHandler: function (form) 
		{
			$("#save_religions").attr("disabled","disabled");
			$("#save_religions").text("Processing..");
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
					$("#religions_response").html(s_msg); 
					$(form)[0].reset();
					$("#save_religions").removeAttr("disabled");
				    $("#save_religions").text("Save");
				    $("#record_id").val("");
					
					cf_datapager(1,response.retriver);
					window.setTimeout(function()
					{
						$("#religions_response").html('');
					}, 5000);
					
					                      
				} else {
						var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';
					$("#religions_response").html(s_msg); 
					$("#save_religions").removeAttr("disabled");
				    $("#save_religions").text("Save");
				}
				
			});
		return false; // required to block normal submit since you used ajax
      }
  });   
});
}	





var handleSalutationsForm = function() {
	$().ready(function() {
	// validate the comment form when it is submitted
	var validator =$("#frm_salutations").validate({
	rules: {
			name: {required: true},					
		},
		messages: 
		{
		name:{required: "Please Enter Name"},		
        },
		submitHandler: function (form) 
		{
			$("#save_salutations").attr("disabled","disabled");
			$("#save_salutations").text("Processing..");
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
					$("#salutations_response").html(s_msg); 
					$(form)[0].reset();
					$("#save_salutations").removeAttr("disabled");
				    $("#save_salutations").text("Save");
				    $("#record_id").val("");
					
					cf_datapager(1,response.retriver);
					window.setTimeout(function()
					{
						$("#salutations_response").html('');
					}, 5000);				
				} else {
					var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';
					$("#salutations_response").html(s_msg); 
					$("#save_salutations").removeAttr("disabled");
				    $("#save_salutations").text("Save");
				}
				
			});
		return false; // required to block normal submit since you used ajax
      }

		
   });
   
});
}	





	
	
	var handleSmstemplatesForm = function() {
	$().ready(function() {
	// validate the comment form when it is submitted
	var validator =$("#frm_smstemplates").validate({
	rules: {
			name: {required: true},
			message: {required: true},					
		},
		messages: 
		{
		name:{required: "Please Enter Name"},
		message: {required: "Please Enter Message"},
		
        },
		submitHandler: function (form) 
		{
			$("#save_smstemplates").attr("disabled","disabled");
			$("#save_smstemplates").text("Processing..");
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
					$("#smstemplates_response").html(s_msg); 
					$(form)[0].reset();
					$("#save_smstemplates").removeAttr("disabled");
				    $("#save_smstemplates").text("Save");
				    $("#record_id").val("");
					
					cf_datapager(1,response.retriver);
					window.setTimeout(function()
					{
						$("#smstemplates_response").html('');
					}, 5000);
					
					                      
				} else {
						var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';
					$("#smstemplates_response").html(s_msg); 
					$("#save_smstemplates").removeAttr("disabled");
				    $("#save_smstemplates").text("Save");
				}
				
			});
		return false; // required to block normal submit since you used ajax
      }

		
   });
   
});
}	
	
	


var handleOccupationoffatherForm = function() {
	$().ready(function() {
	// validate the comment form when it is submitted
	var validator =$("#frm_occupationoffather").validate({
	rules: {
			name: {required: true},							
		},
		messages: 
		{
		name:{required: "Please Enter Name"},		
		
        },
		submitHandler: function (form) 
		{
			$("#save_occupationoffather").attr("disabled","disabled");
			$("#save_occupationoffather").text("Processing..");
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
					$("#occupationoffather_response").html(s_msg); 
					$(form)[0].reset();
					$("#save_occupationoffather").removeAttr("disabled");
				    $("#save_occupationoffather").text("Save");
				    $("#record_id").val("");
					
					cf_datapager(1,response.retriver);
					window.setTimeout(function()
					{
						$("#occupationoffather_response").html('');
					}, 5000);
					
					                      
				} else {
						var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';
					$("#occupationoffather_response").html(s_msg); 
					$("#save_occupationoffather").removeAttr("disabled");
				    $("#save_occupationoffather").text("Save");
				}
				
			});
		return false; // required to block normal submit since you used ajax
      }

		
   });
   
});
}	

	
	
	
	
	
	var handlePeriodsForm = function() {
	$().ready(function() {
	// validate the comment form when it is submitted
	var validator =$("#frm_periods").validate({
	rules: {
			seq: {required: true},
			display_name: {required: true},
			name: {required: true},
			start_time: {required: true},
			end_time: {required: true},
		},
		messages: 
		{
		seq:{required: "Please Enter sequence"},
		display_name:{required: "Please Enter Display Name"},
		name: {required: "Please Enter Name"},
		start_time: {required: "Please Select Start Time"},
		end_time: {required: "Please Select End Time"},
        },
		submitHandler: function (form) 
		{
			$("#save_periods").attr("disabled","disabled");
			$("#save_periods").text("Processing..");
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
					$("#periods_response").html(s_msg); 
					$(form)[0].reset();
					$("#save_periods").removeAttr("disabled");
				    $("#save_periods").text("Save");
				    $("#record_id").val("");
					
					cf_datapager(1,response.retriver);
					window.setTimeout(function()
					{
						$("#periods_response").html('');
					}, 5000);
					
					                      
				} else {
						var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';
					$("#periods_response").html(s_msg); 
					$("#save_periods").removeAttr("disabled");
				    $("#save_periods").text("Save");
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
		seq:{required: "Please Enter Sequence"},
		abbreviation: {required: "Please Enter Abbreviation"},
		name: {required: "Please Enter Name"},
		asses_structid: {required: "Please Select Assessment Structure"},
		course_id: {required: "Please Select Course"}
        },
		submitHandler: function (form) 
		{
			$("#save_classes").attr("disabled","disabled");
			$("#save_classes").text("Processing..");
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
					$("#classes_response").html(s_msg); 
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

//Section From

var handleSectionForm = function() {
	$().ready(function() {
	// validate the comment form when it is submitted
	var validator =$("#frm_sections").validate({
	rules: {
			section_name: {required: true},
			capacity: {required: true}
		},
		messages: 
		{
		section_name: {required: "Please Enter Section Name"},
		capacity: {required: "Please Enter Capacity"}
		
		},
		submitHandler: function (form) 
		{
			$("#save_sections").attr("disabled","disabled");
			$("#save_sections").text("Processing..");
			
			$.ajax({
				type: $(form).attr('method'),
				url: "clientside/socket/call.php",
				data: $(form).serialize(),
				dataType : 'json'
			})
			.done(function (response) {
				if (response.RESULT == 'SUCCESS') {               
					
					var s_msg='<div class="alert alert-success alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Success</h4><p>'+response.MSG+'</p></div>';
					$("#designations_response").html(s_msg); 
					$(form)[0].reset();
					$("#save_sections").removeAttr("disabled");
				    $("#save_sections").text("Save");
				    $("#record_id").val("");
					
					refreshSectionModal(response.clsid);
					window.setTimeout(function()
					{
						$("#sections_response").html('');
					}, 5000);
					
					                      
				} else {
						var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';
					$("#sections_response").html(s_msg); 
					$("#save_sections").removeAttr("disabled");
				    $("#save_sections").text("Save");
				}
				
			});
		return false; // required to block normal submit since you used ajax
      }

		
   });
   
});
}	


var handleRolesForm = function() {
	$().ready(function() {
	// validate the comment form when it is submitted
	var validator =$("#frm_roles").validate({
	rules: {
			name: {required: true},
		},
		messages: 
		{
		name: {required: "Please Enter Role"},
		},
		submitHandler: function (form) 
		{
			$("#save_roles").attr("disabled","disabled");
			$("#save_roles").text("Processing..");
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
					$("#roles_response").html(s_msg); 
					$(form)[0].reset();
					$("#save_roles").removeAttr("disabled");
				    $("#save_roles").text("Save");
				    $("#record_id").val("");
					
					cf_datapager(1,response.retriver);
					window.setTimeout(function()
					{
						$("#roles_response").html('');
					}, 5000);
					
					                      
				} else {
						var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';
					$("#roles_response").html(s_msg); 
					$("#save_roles").removeAttr("disabled");
				    $("#save_roles").text("Save");
				}
				
			});
		return false; // required to block normal submit since you used ajax
      }

		
   });
   
});
}


	var handleDesignationsForm = function() {
	$().ready(function() {
	// validate the comment form when it is submitted
	var validator =$("#frm_designations").validate({
	rules: {
			name: {required: true},
		},
		messages: 
		{
		name: {required: "Please Enter Name"},
		},
		submitHandler: function (form) 
		{
			$("#save_designations").attr("disabled","disabled");
			$("#save_designations").text("Processing..");
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
					$("#designations_response").html(s_msg); 
					$(form)[0].reset();
					$("#save_designations").removeAttr("disabled");
				    $("#save_designations").text("Save");
				    $("#record_id").val("");
					
					cf_datapager(1,response.retriver);
					window.setTimeout(function()
					{
						$("#designations_response").html('');
					}, 5000);
					
					                      
				} else {
						var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';
					$("#designations_response").html(s_msg); 
					$("#save_designations").removeAttr("disabled");
				    $("#save_designations").text("Save");
				}
				
			});
		return false; // required to block normal submit since you used ajax
      }

		
   });
   
});
}
	var handleLastSchoolForm = function() {	$().ready(function() {	// validate the comment form when it is submitted
	var validator =$("#frm_lastschool").validate({	rules: {			name: {required: true},		},		messages: 		{		name: {required: "Please Enter Name"},		},		submitHandler: function (form) 		{			$("#save_lastschool").attr("disabled","disabled");			$("#save_lastschool").text("Processing..");			var server_root=$("#server_root").val();						$.ajax({				type: $(form).attr('method'),		
	url: "clientside/socket/call.php",	
	data: $(form).serialize(),		
	dataType : 'json'		
	})		
	.done(function (response) {	
	
	if (response.RESULT == 'SUCCESS') { 
	    
	var s_msg='<div class="alert alert-success alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Success</h4><p>'+response.MSG+'</p></div>';
	$("#lastschool_response").html(s_msg); 				
	$(form)[0].reset();					
	$("#save_lastschool").removeAttr("disabled");	
	$("#save_lastschool").text("Save");				
    $("#record_id").val("");								
	cf_datapager(1,response.retriver);				
	window.setTimeout(function()				
	{						$("#lastschool_response").html('');	
	
	}, 5000);										        
	} else {
	
	var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';					$("#lastschool_response").html(s_msg); 	
	$("#save_lastschool").removeAttr("disabled");	
	$("#save_lastschool").text("Save");		
	}							});	
	return false; 
	// required to block normal submit since you used ajax  
    }		   });   });}
	
	
	
var handleSemestersForm = function() {
	$().ready(function() {
	// validate the comment form when it is submitted
	var validator =$("#frm_semesters").validate({
	rules: {
			name: {required: true},
		},
		messages: 
		{
		name: {required: "Please Enter Name"},
		},
		submitHandler: function (form) 
		{
			$("#save_semesters").attr("disabled","disabled");
			$("#save_semesters").text("Processing..");
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
					$("#semesters_response").html(s_msg); 
					$(form)[0].reset();
					$("#save_semesters").removeAttr("disabled");
				    $("#save_semesters").text("Save");
				    $("#record_id").val("");
					
					cf_datapager(1,response.retriver);
					window.setTimeout(function()
					{
						$("#semesters_response").html('');
					}, 5000);
					
					                      
				} else {
						var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';
					$("#semesters_response").html(s_msg); 
					$("#save_semesters").removeAttr("disabled");
				    $("#save_semesters").text("Save");
				}
				
			});
		return false; // required to block normal submit since you used ajax
      }

		
   });
   
});
}
		
	
var handleUserForm = function() {
	$().ready(function() {
	// validate the comment form when it is submitted
	var validator =$("#frm_users").validate({
	rules: {
			firstname: {required: true},
			role_id: {required: true},
			password: {required: true},
			email: {required: true},
			username: {required: true},
			
		},
		messages: 
		{
			firstname: {required: "Please Enter Firstname"},
			role_id: {required: "Please select role"},
			password: {required: "Please Enter password"},
			email: {required: "Please Enter email"},
			username: {required: "Please Enter Username"},
		},
		submitHandler: function (form) 
		{
			$("#save_users").attr("disabled","disabled");
			$("#save_users").text("Processing..");
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
					$("#assessments_response").html(s_msg); 
					$(form)[0].reset();
					$("#save_users").removeAttr("disabled");
				    $("#save_users").text("Save");
				    $("#record_id").val("");
					
					cf_datapager(1,response.retriver);
					window.setTimeout(function()
					{
						$("#users_response").html('');
					}, 5000);
					
					                      
				} else {
						var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';
					$("#users_response").html(s_msg); 
					$("#save_users").removeAttr("disabled");
				    $("#save_users").text("Save");
				}
				
			});
		return false; // required to block normal submit since you used ajax
      }

		
   });
   
});
}	
	
	
var handleAssessmentsForm = function() {
	$().ready(function() {
	// validate the comment form when it is submitted
	var validator =$("#frm_assessments").validate({
	rules: {
			asses_name: {required: true},
			course: {required: true},
			marks: {required: true},
		},
		messages: 
		{
			asses_name: {required: "Please Enter Name"},
			course: {required: "Please Enter course"},
			marks: {required: "Please Enter Marks"},
		},
		submitHandler: function (form) 
		{
			$("#save_assessments").attr("disabled","disabled");
			$("#save_assessments").text("Processing..");
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
					$("#assessments_response").html(s_msg); 
					$(form)[0].reset();
					$("#save_assessments").removeAttr("disabled");
				    $("#save_assessments").text("Save");
				    $("#record_id").val("");
					
					cf_datapager(1,response.retriver);
					window.setTimeout(function()
					{
						$("#assessments_response").html('');
					}, 5000);
					
					                      
				} else {
						var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';
					$("#assessments_response").html(s_msg); 
					$("#save_assessments").removeAttr("disabled");
				    $("#save_assessments").text("Save");
				}
				
			});
		return false; // required to block normal submit since you used ajax
      }

		
   });
   
});
}	
	
	
	
	
	
var handleDocumentsForm = function() {
	$().ready(function() {
	// validate the comment form when it is submitted
	var validator =$("#frm_documents").validate({
	rules: {
			name: {required: true},
		},
		messages: 
		{
		name: {required: "Please Enter Name"},
		},
		submitHandler: function (form) 
		{
			$("#save_documents").attr("disabled","disabled");
			$("#save_documents").text("Processing..");
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
					$("#documents_response").html(s_msg); 
					$(form)[0].reset();
					$("#save_documents").removeAttr("disabled");
				    $("#save_documents").text("Save");
				    $("#record_id").val("");
					
					cf_datapager(1,response.retriver);
					window.setTimeout(function()
					{
						$("#documents_response").html('');
					}, 5000);
					
					                      
				} else {
						var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';
					$("#documents_response").html(s_msg); 
					$("#save_documents").removeAttr("disabled");
				    $("#save_documents").text("Save");
				}
				
			});
		return false; // required to block normal submit since you used ajax
      }

		
   });
   
});
}	
	
	
var handleCoursesForm = function() {
	$().ready(function() {
	// validate the comment form when it is submitted
	var validator =$("#frm_courses").validate({
	rules: {
			course_name: {required: true},
		},
		messages: 
		{
		course_name: {required: "Please Enter Name"},
		},
		submitHandler: function (form) 
		{
			$("#save_courses").attr("disabled","disabled");
			$("#save_courses").text("Processing..");
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
					$("#courses_response").html(s_msg); 
					$(form)[0].reset();
					$("#save_courses").removeAttr("disabled");
				    $("#save_courses").text("Save");
				    $("#record_id").val("");
					
					cf_datapager(1,response.retriver);
					window.setTimeout(function()
					{
						$("#documents_response").html('');
					}, 5000);
					
					                      
				} else {
						var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';
					$("#courses_response").html(s_msg); 
					$("#save_courses").removeAttr("disabled");
				    $("#save_courses").text("Save");
				}
				
			});
		return false; // required to block normal submit since you used ajax
      }

		
   });
   
});
}	



var handleCalendarsForm = function() {
	$().ready(function() {
	// validate the comment form when it is submitted
	var validator =$("#frm_calendars").validate({
	rules: {
			name: {required: true},
		},
		messages: 
		{
		name: {required: "Please Enter Name"},
		},
		submitHandler: function (form) 
		{
			$("#save_calendars").attr("disabled","disabled");
			$("#save_calendars").text("Processing..");
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
					$("#calendars_response").html(s_msg); 
					$(form)[0].reset();
					$("#save_calendars").removeAttr("disabled");
				    $("#save_calendars").text("Save");
				    $("#record_id").val("");
					
					cf_datapager(1,response.retriver);
					window.setTimeout(function()
					{
						$("#calendars_response").html('');
					}, 5000);
					
					                      
				} else {
						var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';
					$("#calendars_response").html(s_msg); 
					$("#save_calendars").removeAttr("disabled");
				    $("#save_calendars").text("Save");
				}
				
			});
		return false; // required to block normal submit since you used ajax
      }

		
   });
   
});
}	





	
	
	
var handleSubjectsForm = function() {
	$().ready(function() {
	// validate the comment form when it is submitted
	var validator =$("#frm_subjects").validate({
	rules: {
			course: {required: true},
			sem: {required: true},
			subject_name: {required: true},
			code: {required: true},
			assessment_type: {required: true},
			university_internal_marks: {required: true},
			minimum_passing_marks: {required: true},
		},
		messages: 
		{
		course: {required: "Please Select A Course"},
		sem: {required: "Please Select Semester"},
		subject_name: {required: "Please Enter Subject Name"},
		code: {required: "Please Enter Subject Code"},
		assessment_type: {required: "Please Select assessment type"},
		university_internal_marks: {required: "Please Enter University internal marks"},
		minimum_passing_marks: {required: "Please Enter minimum passing marks"},
		},
		submitHandler: function (form) 
		{
			$("#save_subjects").attr("disabled","disabled");
			$("#save_subjects").text("Processing..");
			
			$.ajax({
				type: $(form).attr('method'),
				url: "clientside/socket/call.php",
				data: $(form).serialize(),
				dataType : 'json'
			})
			.done(function (response) {
				if (response.RESULT == 'SUCCESS') {               
					
					var s_msg='<div class="alert alert-success alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Success</h4><p>'+response.MSG+'</p></div>';
					$("#subjects_response").html(s_msg); 
					$(form)[0].reset();
					$("#save_subjects").removeAttr("disabled");
				    $("#save_subjects").text("Save");
				    $("#record_id").val("");
					
					cf_datapager(1,response.retriver);
					window.setTimeout(function()
					{
						$("#subjects_response").html('');
					}, 5000);
					
					                      
				} else {
						var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';
					$("#subjects_response").html(s_msg); 
					$("#save_subjects").removeAttr("disabled");
				    $("#save_subjects").text("Save");
				}
				
			});
		return false; // required to block normal submit since you used ajax
      }

		
   });
   
});
}	
	
var handleTermsForm = function() {
	$().ready(function() {
	// validate the comment form when it is submitted
	var validator =$("#frm_terms").validate({
	rules: {
			name: {required: true},
			marks: {required: true}
		},
		messages: 
		{
		name: {required: "Please Enter Name"},
		marks: {required: "Please Enter Marks"}
		
		},
		submitHandler: function (form) 
		{
			$("#save_terms").attr("disabled","disabled");
			$("#save_terms").text("Processing..");
			
			$.ajax({
				type: $(form).attr('method'),
				url: "clientside/socket/call.php",
				data: $(form).serialize(),
				dataType : 'json'
			})
			.done(function (response) {
				if (response.RESULT == 'SUCCESS') {               
					
					var s_msg='<div class="alert alert-success alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Success</h4><p>'+response.MSG+'</p></div>';
					$("#terms_response").html(s_msg); 
					$(form)[0].reset();
					$("#save_terms").removeAttr("disabled");
				    $("#save_terms").text("Save");
				    $("#record_id").val("");
					
					refreshTermsModal(response.clsid);
					window.setTimeout(function()
					{
						$("#terms_response").html('');
					}, 5000);
					
					                      
				} else {
						var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';
					$("#terms_response").html(s_msg); 
					$("#save_terms").removeAttr("disabled");
				    $("#save_terms").text("Save");
				}
				
			});
		return false; // required to block normal submit since you used ajax
      }

		
   });
   
});
}		
	
	
	
	
	
	
			
				return {
					init: function() {
						handleAcademicyearsForm(), // initial setup for comment form
						handleClassesForm(), // initial setup for comment form
						handleSectionForm(),
						handleSubjectsForm(),
						handleRolesForm();
						handleDesignationsForm();						handleLastSchoolForm();// initial setup for comment form
						handlePeriodsForm();
						handleDocumentsForm();
						handleCalendarsForm();
						handleCoursesForm();
						handleUserForm();
						handleAssessmentsForm();
						handleTermsForm();
						handleCollegesForm();
						handleSmstemplatesForm();
						handleOccupationoffatherForm();
						handleQualificationsForm();
						handleSalutationsForm();
						handleCategoriesForm();
						handleReligionsForm();
						handleSmssendersForm();
						handleBlacklistsForm();
						handleSemestersForm();
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


function edit_roles(act_id)
{
	$.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: "connector=edit_roles&act_id="+act_id,
                    success: function(data)
					 {
						$("#frm_roles #name").val(data.result.name);
						if(data.result.status==0)
						{
						$("#frm_roles #status").prop('checked',true);
						}
						$('.indatepicker').daterangepicker({
				singleDatePicker: true,
				showDropdowns: true,
				 locale: {
           			 format: 'DD-MM-YYYY',
					 separator:' - '
       				 }
			});

						$("#frm_roles #record_id").val(act_id);
						$("#con-close-modal").modal("show");
					}
                });
}



function edit_designations(act_id)
{
	$.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: "connector=edit_designations&act_id="+act_id,
                    success: function(data)
					 {
						$("#frm_designations #name").val(data.result.name);
						/*if(data.result.staff_type==0)
						{
						$("#frm_designations #staff_type").prop('checked',true);
						}*/
						$("#frm_designations #staff_type").val(data.result.staff_type).trigger("change");	
						$('.indatepicker').daterangepicker({
				singleDatePicker: true,
				showDropdowns: true,
				 locale: {
           			 format: 'DD-MM-YYYY',
					 separator:' - '
       				 }
			});

						$("#frm_designations #record_id").val(act_id);
						$("#con-close-modal").modal("show");
					}
                });
}
function edit_lastschool(act_id){	$.ajax(                {                    type: "POST",                    dataType: 'json',                    cache: false,                    url: "clientside/socket/call.php",                    data: "connector=edit_lastschool&act_id="+act_id,                    success: function(data)					 {						$("#frm_lastschool #name").val(data.result.name);						if(data.result.status==0)						{						$("#frm_designations #status").prop('checked',true);						}						$('.indatepicker').daterangepicker({				singleDatePicker: true,				showDropdowns: true,				 locale: {           			 format: 'DD-MM-YYYY',					 separator:' - '       				 }			});						$("#frm_lastschool #record_id").val(act_id);						$("#con-close-modal").modal("show");					}                });}


function edit_semesters(act_id)
{
	$.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: "connector=edit_semesters&act_id="+act_id,
                    success: function(data)
					 {
						$("#frm_semesters #name").val(data.result.name);
						if(data.result.status==0)
						{
						$("#frm_semesters #status").prop('checked',true);
						}
						$('.indatepicker').daterangepicker({
				singleDatePicker: true,
				showDropdowns: true,
				 locale: {
           			 format: 'DD-MM-YYYY',
					 separator:' - '
       				 }
			});

						$("#frm_semesters #record_id").val(act_id);
						$("#con-close-modal").modal("show");
					}
                });
}




function loadclassections(class_id)
{
				$.ajax(
                {
                    type: "POST",
                    cache: false,
                    dataType: 'json',
                    url: "clientside/socket/call.php",
                    data: "connector=class_sections&clsid="+class_id,
                    success: function(data)
					 {
							$("#class-section-modal .modal-body").html(data.HTML);
							$("#class-section-modal .modal-title").html(data.title_modal);
							$("#class-section-modal").modal("show");
							ConfigurationFormSubmissions.init();
					 }
				})
}

function edit_sections(act_id)
{
	$.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: "connector=edit_sections&act_id="+act_id,
                    success: function(data)
					 {
						$("#frm_sections #section_name").val(data.result.section_name);
						$("#frm_sections #capacity").val(data.result.capacity);
						$("#frm_sections #record_id").val(act_id);
					}
                });
}

function del_sections(act_id,class_id)
{
			
	jConfirm('Are you sure you want to delete record?', 'Confirmation Dialog', function(r) {
      if (r == true)
      {
	  	$.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: {'connector':'delete_section','ac_id':act_id},
                    success: function(data)
					 {
						if(data.RESULT=='SUCCESS')
						{
    							jAlert(data.MSG);
								refreshSectionModal(class_id);
								
						}
						else
						{
    							jAlert(data.MSG);
						}
                    }
                });
	  
	  } else
      {
        return false;
      }
    });

			
}






function refreshSectionModal(class_id)
{
				$.ajax(
                {
                    type: "POST",
                    cache: false,
                    dataType: 'json',
                    url: "clientside/socket/call.php",
                    data: "connector=class_sections&clsid="+class_id,
                    success: function(data)
					 {
							$("#class-section-modal .modal-body").html(data.HTML);
							$("#class-section-modal .modal-title").html(data.title_modal);
							ConfigurationFormSubmissions.init();
					 }
				})
}







function edit_subjects(act_id)
{
	$.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: "connector=edit_subjects&act_id="+act_id,
                    success: function(data)
					 {

						
						
						$("#frm_subjects #seq").val(data.result.seq);
						$("#frm_subjects #course").val(data.result.course);
						$("#frm_subjects #course").val(data.result.course).trigger("change");						
						
						$("#frm_subjects #sem").val(data.result.sem);
						$("#frm_subjects #sem").val(data.result.sem).trigger("change");						
						
						
						$("#frm_subjects #subject_name").val(data.result.subject_name);
						$("#frm_subjects #code").val(data.result.subject_code);
						$("#frm_subjects #assessment_type").val(data.result.assessment_type);
						$("#frm_subjects #assessment_type").val(data.result.assessment_type).trigger("change");						
						
						
						$("#frm_subjects #university_internal_marks").val(data.result.university_internal_marks);
						
						$("#frm_subjects #minimum_passing_marks").val(data.result.minimum_passing_marks);
						
						
						$("#frm_subjects #record_id").val(act_id);
						$("#con-close-modal").modal("show");
					}
                });
}





function edit_periods(act_id)
{
	$.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: "connector=edit_periods&act_id="+act_id,
                    success: function(data)
					 {
					 	$("#frm_periods #seq").val(data.result.seq);
						$("#frm_periods #display_name").val(data.result.display_name);
						$("#frm_periods #name").val(data.result.name);
						$("#frm_periods #start_time").val(data.result.start_time);
						$("#frm_periods #end_time").val(data.result.end_time);
						if(data.result.status==0)
						{
						$("#frm_periods #status").prop('checked',true);
						}
						$('.indatepicker').daterangepicker({
							singleDatePicker: true,
							showDropdowns: true,
							 locale: {
			           			 format: 'DD-MM-YYYY',
								 separator:' - '
			       				 }
						});
			
							$("#frm_periods #record_id").val(act_id);
							$("#con-close-modal").modal("show");
						}
			     });
}






function edit_documents(act_id)
{
	$.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: "connector=edit_documents&act_id="+act_id,
                    success: function(data)
					 {
						$("#frm_documents #name").val(data.result.name);
						if(data.result.status==0)
						{
						$("#frm_documents #status").prop('checked',true);
						}
						$('.indatepicker').daterangepicker({
				singleDatePicker: true,
				showDropdowns: true,
				 locale: {
           			 format: 'DD-MM-YYYY',
					 separator:' - '
       				 }
			});

						$("#frm_documents #record_id").val(act_id);
						$("#con-close-modal").modal("show");
					}
                });
}










function edit_calendars(act_id)
{
	$.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: "connector=edit_calendars&act_id="+act_id,
                    success: function(data)
					 {
						$("#frm_calendars #name").val(data.result.name);
						if(data.result.status==0)
						{
						$("#frm_calendars #status").prop('checked',true);
						}
						$('.indatepicker').daterangepicker({
				singleDatePicker: true,
				showDropdowns: true,
				 locale: {
           			 format: 'DD-MM-YYYY',
					 separator:' - '
       				 }
			});

						$("#frm_calendars #record_id").val(act_id);
						$("#con-close-modal").modal("show");
					}
                });
}








function edit_courses(act_id)
{
	$.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: "connector=edit_courses&act_id="+act_id,
                    success: function(data)
					 {
						$("#frm_courses #course_name").val(data.result.course_name);
						if(data.result.status==0)
						{
						$("#frm_courses #status").prop('checked',true);
						}
						$('.indatepicker').daterangepicker({
				singleDatePicker: true,
				showDropdowns: true,
				 locale: {
           			 format: 'DD-MM-YYYY',
					 separator:' - '
       				 }
			});

						$("#frm_courses #record_id").val(act_id);
						$("#con-close-modal").modal("show");
					}
                });
}





function edit_users(act_id)
{
	$.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: "connector=edit_users&act_id="+act_id,
                    success: function(data)
					 {
						$("#frm_users #firstname").val(data.result.firstname);
						$("#frm_users #lastname").val(data.result.lastname);
						$("#frm_users #username").val(data.result.username);
						$("#frm_users #email").val(data.result.email);
						$("#frm_users #password").val(data.result.password);
						$("#frm_users #phone").val(data.result.phone);
						$("#frm_users #role_id").val(data.result.role_id).trigger("change");
						$("#frm_users #status").val(data.result.status).trigger("change");
						$("#frm_users #record_id").val(act_id);
						$("#con-close-modal").modal("show");
					}
                });
}
function edit_assessments(act_id)
{
	$.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: "connector=edit_assessments&act_id="+act_id,
                    success: function(data)
					 {
						$("#frm_assessments #asses_name").val(data.result.asses_name);
					
						
						$("#frm_assessments #course").val(data.result.course);
						$("#frm_assessments #course").val(data.result.course).trigger("change");
						
						$("#frm_assessments #marks").val(data.result.marks);
						
						if(data.result.status==0)
						{
						$("#frm_assessments #status").prop('checked',true);
						}
						$('.indatepicker').daterangepicker({
				singleDatePicker: true,
				showDropdowns: true,
				 locale: {
           			 format: 'DD-MM-YYYY',
					 separator:' - '
       				 }
			});

						$("#frm_assessments #record_id").val(act_id);
						$("#con-close-modal").modal("show");
					}
                });
}


















function refreshTermsModal(assetid)
{
	$.ajax(
                {
                    type: "POST",
                    cache: false,
                    dataType: 'json',
                    url: "clientside/socket/call.php",
                    data: "connector=class_terms_assessment&clsid="+assetid,
                    success: function(data)
					 {
							$("#class-terms_assessment-modal .modal-body").html(data.HTML);
							$("#class-terms_assessment-modal .modal-title").html(data.title_modal);
							ConfigurationFormSubmissions.init();
					 }
				})
}





function loadterms_assessment(terms_id)
{
	$.ajax(
    {
        type: "POST",
        cache: false,
        dataType: 'json',
        url: "clientside/socket/call.php",
        data: "connector=class_terms_assessment&clsid="+terms_id,
        success: function(data)
		 {
				$("#class-terms_assessment-modal .modal-body").html(data.HTML);
				$("#class-terms_assessment-modal .modal-title").html(data.title_modal);
				$("#class-terms_assessment-modal").modal("show");
				ConfigurationFormSubmissions.init();
		 }
	})
}

function edit_terms(act_id)
{
	$.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: "connector=edit_terms&act_id="+act_id,
                    success: function(data)
					 {
						$("#frm_terms #name").val(data.result.name);
						$("#frm_terms #marks").val(data.result.marks);
						$("#frm_terms #record_id").val(act_id);
					}
                });
}

function del_terms(act_id,class_id)
{
			
	jConfirm('Are you sure you want to delete record?', 'Confirmation Dialog', function(r) {
      if (r == true)
      {
	  	$.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: {'connector':'delete_terms','ac_id':act_id},
                    success: function(data)
					 {
						if(data.RESULT=='SUCCESS')
						{
    							jAlert(data.MSG);
								refreshTermsModal(class_id);
								
						}
						else
						{
    							jAlert(data.MSG);
						}
                    }
                });
	  
	  } else
      {
        return false;
      }
    });

			
}


function edit_colleges(act_id)
{
	$.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: "connector=edit_colleges&act_id="+act_id,
                    success: function(data)
					 {
					 	$("#frm_colleges #name").val(data.result.name);
						$("#frm_colleges #email").val(data.result.email);
						$("#frm_colleges #website").val(data.result.website);
						$("#frm_colleges #phonenumber").val(data.result.phonenumber);
						$("#frm_colleges #affiliation_number").val(data.result.affiliation_number);
						$("#frm_colleges #address").val(data.result.address);
						
						if(data.result.status==0)
						{
						$("#frm_colleges #status").prop('checked',true);
						}
						$('.indatepicker').daterangepicker({
							singleDatePicker: true,
							showDropdowns: true,
							 locale: {
			           			 format: 'DD-MM-YYYY',
								 separator:' - '
			       				 }
						});
			
							$("#frm_colleges #record_id").val(act_id);
							$("#con-close-modal").modal("show");
						}
			     });
}





function edit_smstemplates(act_id)
{
	$.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: "connector=edit_smstemplates&act_id="+act_id,
                    success: function(data)
					 {
					 	$("#frm_smstemplates #name").val(data.result.name);
						$("#frm_smstemplates #message").val(data.result.message);
						
						if(data.result.status==0)
						{
						$("#frm_smstemplates #status").prop('checked',true);
						}
						$('.indatepicker').daterangepicker({
							singleDatePicker: true,
							showDropdowns: true,
							 locale: {
			           			 format: 'DD-MM-YYYY',
								 separator:' - '
			       				 }
						});
			
							$("#frm_smstemplates #record_id").val(act_id);
							$("#con-close-modal").modal("show");
						}
			     });
}




function edit_occupationoffather(act_id)
{
	$.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: "connector=edit_occupationoffather&act_id="+act_id,
                    success: function(data)
					 {
					 	$("#frm_occupationoffather #name").val(data.result.name);
						
						if(data.result.status==0)
						{
						$("#frm_occupationoffather #status").prop('checked',true);
						}
						$('.indatepicker').daterangepicker({
							singleDatePicker: true,
							showDropdowns: true,
							 locale: {
			           			 format: 'DD-MM-YYYY',
								 separator:' - '
			       				 }
						});
			
							$("#frm_occupationoffather #record_id").val(act_id);
							$("#con-close-modal").modal("show");
						}
			     });
}






function edit_qualifications(act_id)
{
	$.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: "connector=edit_qualifications&act_id="+act_id,
                    success: function(data)
					 {
					 	$("#frm_qualifications #name").val(data.result.name);
						
						if(data.result.status==0)
						{
						$("#frm_qualifications #status").prop('checked',true);
						}
						$('.indatepicker').daterangepicker({
							singleDatePicker: true,
							showDropdowns: true,
							 locale: {
			           			 format: 'DD-MM-YYYY',
								 separator:' - '
			       				 }
						});
			
							$("#frm_qualifications #record_id").val(act_id);
							$("#con-close-modal").modal("show");
						}
			     });
}







function edit_salutations(act_id)
{
	$.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: "connector=edit_salutations&act_id="+act_id,
                    success: function(data)
					 {
					 	$("#frm_salutations #name").val(data.result.name);
						
						if(data.result.status==0)
						{
						$("#frm_salutations #status").prop('checked',true);
						}
						$('.indatepicker').daterangepicker({
							singleDatePicker: true,
							showDropdowns: true,
							 locale: {
			           			 format: 'DD-MM-YYYY',
								 separator:' - '
			       				 }
						});
			
							$("#frm_salutations #record_id").val(act_id);
							$("#con-close-modal").modal("show");
						}
			     });
}




function edit_categories(act_id)
{
	$.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: "connector=edit_categories&act_id="+act_id,
                    success: function(data)
					 {
					 	$("#frm_categories #name").val(data.result.name);
						
						if(data.result.status==0)
						{
						$("#frm_categories #status").prop('checked',true);
						}
						$('.indatepicker').daterangepicker({
							singleDatePicker: true,
							showDropdowns: true,
							 locale: {
			           			 format: 'DD-MM-YYYY',
								 separator:' - '
			       				 }
						});
			
							$("#frm_categories #record_id").val(act_id);
							$("#con-close-modal").modal("show");
						}
			     });
}



function edit_religions(act_id)
{
	$.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: "connector=edit_religions&act_id="+act_id,
                    success: function(data)
					 {
					 	$("#frm_religions #name").val(data.result.name);
						
						if(data.result.status==0)
						{
						$("#frm_religions #status").prop('checked',true);
						}
						
						$("#frm_religions #record_id").val(act_id);
						$("#con-close-modal").modal("show");
					 }
			     });
}





function edit_smssenders(act_id)
{
	$.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: "connector=edit_smssenders&act_id="+act_id,
                    success: function(data)
					 {
					 	$("#frm_smssenders #url").val(data.result.url);
					 	$("#frm_smssenders #xml_url").val(data.result.xml_url);
					 	$("#frm_smssenders #prefix_xml").val(data.result.prefix_xml);
					 	$("#frm_smssenders #dynamic_student_xml").val(data.result.dynamic_student_xml);
					 	$("#frm_smssenders #postfix_xml").val(data.result.postfix_xml);
					 	
						
						if(data.result.status==0)
						{
							$("#frm_smssenders #status").prop('checked',true);
						}
						
						if(data.result.is_xml==0)
						{
							$("#frm_smssenders #is_xml").prop('checked',true);
						}
						
						
						$("#frm_smssenders #record_id").val(act_id);
						$("#con-close-modal").modal("show");
					 }
			     });
}









function edit_classes(act_id)
{
	$.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: "connector=edit_classes&act_id="+act_id,
                    success: function(data)
					 {
					 	$("#frm_classes #seq").val(data.result.seq);
					 	$("#frm_classes #abbreviation").val(data.result.abbreviation);
					 	$("#frm_classes #name").val(data.result.name);
					 	$("#frm_classes #max_optional_subject").val(data.result.max_optional_subject);
					 	$("#frm_classes #asses_structid").val(data.result.asses_structid);
					 	$("#frm_classes #course_id").val(data.result.course_id);
					 	$("#frm_classes #sem_id").val(data.result.sem_id);
						
						$("#frm_classes #record_id").val(act_id);
						$("#con-close-modal").modal("show");
					 }
			     });
}


function edit_blacklists(act_id)
{
	
	$.ajax({
        type: "POST",
        dataType: 'json',
        cache: false,
        url: "clientside/socket/call.php",
        data: "connector=edit_blacklists&act_id="+act_id,
        success: function(data)
		 {		 	
		 	$("#frm_blacklists #library_hours1").val(data.result.library_hours1);
		 	$("#frm_blacklists #assignment1").val(data.result.assignment1);
		 	$("#frm_blacklists #percentage1").val(data.result.startpercentage + '-' + data.result.endpercentage);
		 
			$("#frm_blacklists #record_id").val(act_id);
			$("#con-close-modal").modal("show");
		 }
     });
}



