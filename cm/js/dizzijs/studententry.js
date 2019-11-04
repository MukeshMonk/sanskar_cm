// JavaScript Document

// JavaScript Document

// JavaScript Document

// Configuration







var studententrySubmissions = function() 

{

	"use strict";

	// Handle Academic Form

	var handleStudentsForm = function() {

	$().ready(function() {

	// validate the comment form when it is submitted

	var validator =$("#frm_students").validate({

	rules: {			

						

		},

		messages: 

		{		

					

        },

		submitHandler: function (form) 

		{

			$("#save_students").attr("disabled","disabled");

			$("#save_students").text("Processing..");

			var server_root=$("#server_root").val();

		

     

	 

	 

	   $("#frm_students").ajaxSubmit({

        url:"clientside/socket/call.php",

        data:$(form).serialize(),

        dataType: 'json',

        success: function(response) 

        {

			if (response.RESULT == 'SUCCESS')

			{       			

			 		var s_msg='<div class="alert alert-success alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Success</h4><p>'+response.MSG+'</p></div>';

					$("#students_response").html(s_msg); 

					$(form)[0].reset();

					$("#save_students").removeAttr("disabled");

				    $("#save_students").text("Save");

				    $("#record_id").val("");

					

					//cf_datapager(1,response.retriver);

					/*window.setTimeout(function()

					{

						$("#students_response").html('');	

						window.location.href = response.URL;					

					}, 5000);*/

					

					window.location.href = response.URL;					



					

			 }

			 else

			 {

				 	var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';

					$("#students_response").html(s_msg); 

					$("#save_students").removeAttr("disabled");

				    $("#save_students").text("Save");

			 }					

		},

        resetForm: true

      });	  

	 	return false; 	 

	  }

	});

   

});

}

	

	

	

	var handleMarkattandencesForm = function() {

	$().ready(function() {

	// validate the comment form when it is submitted

	var validator =$("#frm_markattandences").validate({

	rules: {			

			academic_year: {required: true},

			section: {required: true},

			course: {required: true},

			sem: {required: true},

			division: {required: true},

			default_status: {required: true},

			date: {required: true},			

		},

		messages: 

		{		

			academic_year: {required: "Please Enter Academic Year"},

			section: {required: "Please Enter Section"},

			course: {required: "Please Enter Course"},

			sem: {required: "Please Enter Semester"},

			division: {required: "Please Enter Division"},

			default_status: {required: "Please Enter Default Status"},

			date: {required: "Please Enter Date"},		

        },

		submitHandler: function (form) 

		{

			$("#save_markattandences").attr("disabled","disabled");

			$("#save_markattandences").text("Processing..");

			var server_root=$("#server_root").val();

		

     

	 

	 

	   $("#frm_markattandences").ajaxSubmit({

        url:"clientside/socket/call.php",

        data:$(form).serialize(),

        dataType: 'json',

        success: function(response) {

			if (response.RESULT == 'SUCCESS')

			 {       			var s_msg='<div class="alert alert-success alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Success</h4><p>'+response.MSG+'</p></div>';

					$("#markattandences_response").html(s_msg); 

					$(form)[0].reset();

					$("#save_markattandences").removeAttr("disabled");

				    $("#save_markattandences").text("Save");

				    $("#record_id").val("");

					

					cf_datapager(1,response.retriver);

					window.setTimeout(function()

					{

						$("#markattandences_response").html('');

					}, 5000);

			 }

			 else

			 {

				 	var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';

					$("#markattandences_response").html(s_msg); 

					$("#save_markattandences").removeAttr("disabled");

				    $("#save_markattandences").text("Save");

			 }

					

		

		

        },

        resetForm: true

      });

	  

	 return false; 

	 

	  }

	});

   

});

}	







var handleRepresentationalattandencesForm = function() {

	$().ready(function() {

	// validate the comment form when it is submitted

	var validator =$("#frm_representationalattandences").validate({

	rules: {			

			start_date1: {required: true},

			end_date1: {required: true},

			event: {required: true},					

		},

		messages: 

		{		

			start_date1: {required: "Please Enter Start Date"},

			end_date1: {required: "Please Enter End Date"},

			event: {required: "Please Enter Event"},				

        },

		submitHandler: function (form) 

		{

			$("#save_representationalattandences").attr("disabled","disabled");

			$("#save_representationalattandences").text("Processing..");

			var server_root=$("#server_root").val();

		

     		$("#frm_representationalattandences").ajaxSubmit({

	        url:"clientside/socket/call.php",

	        data:$(form).serialize(),

	        dataType: 'json',

	        success: function(response) {

			if (response.RESULT == 'SUCCESS')

			 {       			var s_msg='<div class="alert alert-success alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Success</h4><p>'+response.MSG+'</p></div>';

					$("#representationalattandences_response").html(s_msg); 

					$(form)[0].reset();

					$("#save_representationalattandences").removeAttr("disabled");

				    $("#save_representationalattandences").text("Save");

				    $("#record_id").val("");

					

					cf_datapager(1,response.retriver);

					window.setTimeout(function()

					{

						$("#representationalattandences_response").html('');

					}, 5000);

			 }

			 else

			 {

				 	var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';

					$("#representationalattandences_response").html(s_msg); 

					$("#save_representationalattandences").removeAttr("disabled");

				    $("#save_representationalattandences").text("Save");

			 }

		},

        resetForm: true

      });

	  

	 return false; 

	 

	  }

	});

   

});

}	

	

	



var handleMedicalleavesForm = function() {

	$().ready(function() {

	// validate the comment form when it is submitted

	var validator =$("#frm_medicalleaves").validate({

	rules: {			

			start_date1: {required: true},

			end_date1: {required: true},

			doctor_name1: {required: true},					

		},

		messages: 

		{		

			start_date1: {required: "Please Enter Start Date"},

			end_date1: {required: "Please Enter End Date"},

			doctor_name1: {required: "Please Enter Doctor Name"},				

        },

		submitHandler: function (form) 

		{

			$("#save_medicalleaves").attr("disabled","disabled");

			$("#save_medicalleaves").text("Processing..");

			var server_root=$("#server_root").val();

		

     		$("#frm_medicalleaves").ajaxSubmit({

	        url:"clientside/socket/call.php",

	        data:$(form).serialize(),

	        dataType: 'json',

	        success: function(response) {

			if (response.RESULT == 'SUCCESS')

			 {       			var s_msg='<div class="alert alert-success alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Success</h4><p>'+response.MSG+'</p></div>';

					$("#medicalleaves_response").html(s_msg); 

					$(form)[0].reset();

					$("#save_medicalleaves").removeAttr("disabled");

				    $("#save_medicalleaves").text("Save");

				    $("#record_id").val("");

					

					cf_datapager(1,response.retriver);

					window.setTimeout(function()

					{

						$("#medicalleaves_response").html('');

					}, 5000);

			 }

			 else

			 {

				 	var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';

					$("#medicalleaves_response").html(s_msg); 

					$("#save_medicalleaves").removeAttr("disabled");

				    $("#save_medicalleaves").text("Save");

			 }

		},

        resetForm: true

      });

	  

	 return false; 

	 

	  }

	});

   

});

}
var handleLastSchoolForm1 = function() {	$().ready(function() {	// validate the comment form when it is submitted
	var validator =$("#frm_lastschool1").validate({	rules: {			name: {required: true},		},		messages: 		{		name: {required: "Please Enter Name"},		},		submitHandler: function (form) 		{			$("#save_lastschool1").attr("disabled","disabled");			$("#save_lastschool1").text("Processing..");			var server_root=$("#server_root").val();						$.ajax({				type: $(form).attr('method'),		
	url: "clientside/socket/call.php",	
	data: $(form).serialize(),		
	dataType : 'json'		
	})		
	.done(function (response) {	
	
	if (response.RESULT == 'SUCCESS') { 
	    
	var s_msg='<div class="alert alert-success alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Success</h4><p>'+response.MSG+'</p></div>';
	$("#lastschool_response1").html(s_msg); 				
	$(form)[0].reset();					
	$("#save_lastschool1").removeAttr("disabled");	
	$("#save_lastschool1").text("Save");				
    //$("#record_id").val("");								
	//cf_datapager(1,"lastschool");				
	window.setTimeout(function()				
	{						$("#lastschool_response1").html('');	
	
	}, 5000);	
	
	$(".sch-get-new").append('<option value="'+response.id+'">'+response.name+'</option>');
	//$("#name_last").val(response.id);
	
	$("#con-close-modal3").modal("hide");
	
										        
	} else {
	
	var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';					$("#lastschool_response1").html(s_msg); 	
	$("#save_lastschool1").removeAttr("disabled");	
	$("#save_lastschool1").text("Save");		
	}							});	
	return false; 
	// required to block normal submit since you used ajax  
    }		   });   });
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
    //$("#record_id").val("");								
	//cf_datapager(1,"lastschool");				
	window.setTimeout(function()				
	{						$("#lastschool_response").html('');	
	
	}, 5000);	
	
	$(".brd-get-new").append('<option value="'+response.id+'">'+response.name+'</option>');
	//$("#name_last").val(response.id);
	
	$("#con-close-modal2").modal("hide");
	
										        
	} else {
	
	var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';					$("#lastschool_response").html(s_msg); 	
	$("#save_lastschool").removeAttr("disabled");	
	$("#save_lastschool").text("Save");		
	}							});	
	return false; 
	// required to block normal submit since you used ajax  
    }		   });   });
	}






	

			

return {

		init: function() {

			handleStudentsForm();
			handleLastSchoolForm();
			handleMarkattandencesForm();
			handleLastSchoolForm1
			handleRepresentationalattandencesForm();

			handleMedicalleavesForm();						

		}

	}

}();

	

$(document).ready(function() {	

	studententrySubmissions.init();

});


$('#cm_cnf_id').on('change', function (e) {
   // var optionSelected = $("option:selected", this);
   var optionSel = $(this).val();
  $.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: "connector=data_admission&act_id="+optionSel,
                    success: function(data)
					{
						if(data.success!='1')
						{
						 $("#frm_students #first_name1").val(data.result.first_name);
						$("#frm_students #middle_name1").val(data.result.middle_name);
					 	$("#frm_students #last_name1").val(data.result.last_name);
						$("#frm_students #birth_place1").val(data.result.birth_place);
						$("#frm_students #mother_name1").val(data.result.mother_name);
						$("#frm_students #blood_group1").val(data.result.blood_group);
						$("#frm_students #cm_course").val(data.result.cm_course).trigger("change");
						$("#frm_students #sem").val(data.result.sem).trigger("change");
						$("#frm_students #cm_class_id").val(data.result.classid).trigger("change");
						$("#frm_students #cm_academic_year").val(data.result.cm_academic_year1).trigger("change");
						$("#frm_students #mobile_no1").val(data.result.mobile_no);
						$("#frm_students #email1").val(data.result.email_id);
						$("#frm_students #residence_no1").val(data.result.phone_no);
						$("#frm_students #parents_mobile_no1").val(data.result.parent_mobile_no);
						$("#frm_students #guardian_annual_income1").val(data.result.g_annual_income);
						$("#frm_students #permenent_address_line11").val(data.result.address);
						$("#frm_students #permenent_city1").val(data.result.city);
						$("#frm_students #permenent_district1").val(data.result.District);
						$("#frm_students #permenent_state1").val(data.result.state);
						$("#frm_students #country").val(data.result.country);
						$("#frm_students #permenent_zipcode1").val(data.result.pin);
					 	$("#frm_students #dob1").val(data.result.dob);
						$("#frm_students #date_of_admission1").val(data.result.adm_date);
						$("#frm_students #enrollment_no1").val(data.result.en_form_no);
						$("#frm_students #gender").val(data.result.gender).trigger("change");
						for (i = 0; i < data.result.last_exam.length; i++) { 
							//text += cars[i] + "<br>";
							//alert(data.result.last_exam[i].exam_name1)
								if(i==0)
								{//prop("color", "FF0000");
									$("#regtable tr:last .exmname").val(data.result.last_exam[i].exam_name1).trigger("change");
									$("#regtable tr:last .brdname").val(data.result.last_exam[i].board_name1).trigger("change");
									$("#regtable tr:last .sch-get-new").val(data.result.last_exam[i].school_name1).trigger("change");
									$("#regtable tr:last .str-cls-name").val(data.result.last_exam[i].stream_name).trigger("change");
									var arr_year = data.result.last_exam[i].pass_year1.split('-');
									$("#regtable tr:last .mnth-cls-name").val(arr_year[0]).trigger("change");
									$("#regtable tr:last .year-cls-name").val(arr_year[1]).trigger("change");
									$("#regtable tr:last input[name*='exam_seat_no[]']").val(data.result.last_exam[i].exam_no1);
									$("#regtable tr:last input[name*='cert_no[]']").val(data.result.last_exam[i].certi_no1);
									$("#regtable tr:last input[name*='total_marks[]']").val(data.result.last_exam[i].total_marks1);
									$("#regtable tr:last input[name*='obtaine_marks[]']").val(data.result.last_exam[i].obtained_marks_new);
									$("#regtable tr:last input[name*='percen[]']").val(data.result.last_exam[i].percen_new);
									$("#regtable tr:last input[name*='pec_no[]']").val(data.result.last_exam[i].pec_no_new);
									$("#regtable tr:last input[name*='grade[]']").val(data.result.last_exam[i].cgpa_grade);
								}
								else
								{
									//alert( key + ": " + value );
									$("#regtable tr:last .exmname").val(data.result.last_exam[i].exam_name1).trigger("change");
									$("#regtable tr:last .brdname").val(data.result.last_exam[i].board_name1).trigger("change");
									$("#regtable tr:last .sch-get-new").val(data.result.last_exam[i].school_name1).trigger("change");
									$("#regtable tr:last .str-cls-name").val(data.result.last_exam[i].stream_name).trigger("change");
									var arr_year = data.result.last_exam[i].pass_year1.split('-');
									$("#regtable tr:last .mnth-cls-name").val(arr_year[0]).trigger("change");
									$("#regtable tr:last .year-cls-name").val(arr_year[1]).trigger("change");
									$("#regtable tr:last input[name*='exam_seat_no[]']").val(data.result.last_exam[i].exam_no1); 
									$("#regtable tr:last input[name*='cert_no[]']").val(data.result.last_exam[i].certi_no1);
									$("#regtable tr:last input[name*='total_marks[]']").val(data.result.last_exam[i].total_marks1);
									$("#regtable tr:last input[name*='obtaine_marks[]']").val(data.result.last_exam[i].obtained_marks_new);
									$("#regtable tr:last input[name*='percen[]']").val(data.result.last_exam[i].percen_new);
									$("#regtable tr:last input[name*='pec_no[]']").val(data.result.last_exam[i].pec_no_new);
									$("#regtable tr:last input[name*='grade[]']").val(data.result.last_exam[i].cgpa_grade);
								}
								  
								
						}
						
						if(data.result.profile_img!="")
						{
							//$('#frm_students input:radio[name="gender"][value="Male"]').attr('checked',true);
							$('#frm_students #std_img_jq').attr('src', data.result.profile_img);
						}
						/*if(data.result.gender=="Male")
						{
							$('#frm_students input:radio[name="gender"][value="Male"]').attr('checked',true);
							
						}
						if(data.result.gender=="Female")
						{
							$('#frm_students input:radio[name="gender"][value="Female"]').attr('checked',true);
						}*/
						$('.indatepicker').daterangepicker({
							singleDatePicker: true,
							showDropdowns: true,							
							 locale: {
			           			 format: 'DD-MM-YYYY',
								 separator:'-'
			       				 }
						});
						}
						else
						{
							//$('#frm_students')[0].reset();
							var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+data.MSG+'</p></div>';
					$("#students_response").html(s_msg);
					 $("#frm_students #cm_cnf_id").val('').trigger("change"); 
					 $('#frm_students').selectmenu("refresh", true);
					
							//$("#students_response").html(data.MSG);//students_response
						}
					 }
			     });
    
});

function open_student(act_id)
{
	$.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: "connector=edit_students&act_id="+act_id,
                    success: function(data)
					{
					 	$("#con-close-modal #name").text(data.result.name);
						$("#student_image").attr("src",data.result.student_image);
						$("#con-close-modal #gender").text(data.result.gender);
					 	$("#con-close-modal #category").text(data.result.category);
					 	$("#con-close-modal #religion").text(data.result.religion);
					 	$("#con-close-modal #sem").text(data.result.sem);
					 	$("#con-close-modal #id_no").text(data.result.id_no);
					 	$("#con-close-modal #class1_id").text(data.result.classid);
					 	$("#con-close-modal #email").text(data.result.email);
					 	$("#con-close-modal #address_s").text(data.result.address);					 	
					 	$("#con-close-modal #parents_mobile_no").text(data.result.parents_mobile_no);
					 	$("#con-close-modal #student_mobile_no").text(data.result.student_mobile_no);
					 	$("#con-close-modal").modal("show");
					 }
			     });
}

function edit_students(act_id)

{

	$.ajax(

                {

                    type: "POST",

                    dataType: 'json',

                    cache: false,

                    url: "clientside/socket/call.php",

                    data: "connector=edit_students&act_id="+act_id,

                    success: function(data)

					{

					 						 	

					 	

					 	$("#frm_students #name").val(data.result.name);

					 	$("#frm_students #mothername").val(data.result.mothername);

					 	

					 	$("#frm_students #category1").val(data.result.category_id).trigger("change");

					 	$("#frm_students #blood_group").val(data.result.blood_group);

					 	

					 	$("#frm_students #religion1").val(data.result.religion_id).trigger("change");



					 	$("#frm_students #cast").val(data.result.cast);

					 	$("#frm_students #branch1").val(data.result.course_id).trigger("change");

					 	$("#frm_students #sem").val(data.result.sem).trigger("change");

					 	$("#frm_students #id_no").val(data.result.id_no);

					 	$("#frm_students #division").val(data.result.division);

					 	$("#frm_students #class1_id").val(data.result.classid).trigger("change");

					 	$("#frm_students #birth_place").val(data.result.birth_place);

					 	$("#frm_students #email").val(data.result.email);

					 	$("#frm_students #address").val(data.result.address);					 	

					 	$("#frm_students #city").val(data.result.city);

					 	$("#frm_students #taluka").val(data.result.taluka);					 	

					 	$("#frm_students #district").val(data.result.district);

					 	$("#frm_students #pin_code").val(data.result.pin_code);

					 	$("#frm_students #parents_office_no").val(data.result.parents_office_no);

					 	$("#frm_students #parents_residence_no").val(data.result.parents_residence_no);

					 	$("#frm_students #parents_mobile_no").val(data.result.parents_mobile_no);

					 	$("#frm_students #student_mobile_no").val(data.result.student_mobile_no);

					 	$("#frm_students #fee_status").val(data.result.fee_status);

					 	$("#frm_students #fee_amount").val(data.result.fee_amount);

					 	$("#frm_students #fee_late_charge").val(data.result.fee_late_charge);

					 	$("#frm_students #transaction_id").val(data.result.transaction_id);

					 	$("#frm_students #payment_status").val(data.result.payment_status);

				

					 	

					 	

					 	if(data.result.gender=="Male")

						{

							$('#frm_students input:radio[name="gender"][value="Male"]').attr('checked',true);

							

						}

						

						if(data.result.gender=="Female")

						{

							$('#frm_students input:radio[name="gender"][value="Female"]').attr('checked',true);

						}

					 	

					 	$('.indatepicker').daterangepicker({

							singleDatePicker: true,

							showDropdowns: true,

														

							 locale: {

			           			 format: 'DD-MM-YYYY',

								 separator:' - '

			       				 }

						});

						

						$("#frm_students #transaction_date").val(data.result.transaction_date);

						$("#frm_students #fee_last_date").val(data.result.fee_last_date);

						$("#frm_students #dob").val(data.result.dob);



						

						

						$("#frm_students #record_id").val(act_id);

						$("#con-close-modal").modal("show");

					 }

			     });

}





function edit_markattandences(act_id)

{

	$.ajax(

                {

                    type: "POST",

                    dataType: 'json',

                    cache: false,

                    url: "clientside/socket/call.php",

                    data: "connector=edit_markattandences&act_id="+act_id,

                    success: function(data)

					{

					 	$("#frm_markattandences #academic_year").val(data.result.academic_year).trigger("change");

					 	$("#frm_markattandences #section").val(data.result.section).trigger("change");

					 	$("#frm_markattandences #course").val(data.result.course).trigger("change");

					 	$("#frm_markattandences #sem").val(data.result.sem).trigger("change");

					 	$("#frm_markattandences #division").val(data.result.division).trigger("change");

						$("#frm_markattandences #default_status").val(data.result.default_status).trigger("change");

					 	$("#frm_markattandences #class1").val(data.result.class1).trigger("change");



					 	

					 						 	

					 	$('.indatepicker').daterangepicker({

							singleDatePicker: true,

							showDropdowns: true,							

							 locale: {

			           			 format: 'DD-MM-YYYY',

								 separator:' - '

			       				 }

						});

						$("#frm_markattandences #add_date").val(data.result.add_date);

						

						$("#frm_markattandences #record_id").val(act_id);

						$("#con-close-modal").modal("show");

					 }

			     });

}







function edit_representationalattandences(act_id)

{

	$.ajax(

        {

            type: "POST",

            dataType: 'json',

            cache: false,

            url: "clientside/socket/call.php",

            data: "connector=edit_representationalattandences&act_id="+act_id,

            success: function(data)

			{

			 	$("#frm_representationalattandences #event").val(data.result.event);

			 	

			 	

			 	$(".student_id1").closest('.row').remove();

			 	

				var student_idno = data.result.student_id.split(",");

				

				$("#frm_representationalattandences #noofstudent").val(student_idno.length);

				

				for(var i=0;i<student_idno.length;i++)

				{

					var appendstudent = '<div class="row"><div class="col-md-12"><div class="form-group"><label for="field-1" class="control-label">Student ID<span class="mandatory"></span></label><input type="text" name="student_id1[]" class="form-control student_id1 required" value="'+student_idno[i]+'"/><i class="fa fa-times deletestudentiddiv"></i></div></div></div>';

					$("#frm_representationalattandences #noofstudent").closest('.row').after(appendstudent);

				}

			 	

			 	

			 	$('.indatepicker').daterangepicker({

					singleDatePicker: true,

					showDropdowns: true,							

					 locale: {

	           			 format: 'DD-MM-YYYY',

						 separator:' - '

	       				 }

				});

				$("#frm_representationalattandences #start_date").val(data.result.start_date);

				$("#frm_representationalattandences #end_date").val(data.result.end_date);

				

				$("#frm_representationalattandences #record_id").val(act_id);

				$("#con-close-modal").modal("show");

			 }

	     });

}







function edit_medicalleaves(act_id)

{

	$.ajax(

        {

            type: "POST",

            dataType: 'json',

            cache: false,

            url: "clientside/socket/call.php",

            data: "connector=edit_medicalleaves&act_id="+act_id,

            success: function(data)

			{

			 	$("#frm_medicalleaves #form_no").val(data.result.form_no);

			 	$("#frm_medicalleaves #doctor_name").val(data.result.doctor_name);

			 	$("#frm_medicalleaves #student_id1").val(data.result.student_id);

				

				

			 	

			 	//$(".student_id1").closest('.row').remove();

			 	

				//var student_idno = data.result.student_id.split(",");

				

				//$("#frm_medicalleaves #noofstudent").val(student_idno.length);

				

				// for(var i=0;i<student_idno.length;i++)

				// {

					// var appendstudent = '<div class="row"><div class="col-md-12"><div class="form-group"><label for="field-1" class="control-label">Student ID<span class="mandatory"></span></label><input type="text" name="student_id1[]" class="form-control student_id1 required" value="'+student_idno[i]+'"/><i class="fa fa-times deletestudentiddiv"></i></div></div></div>';

					// $("#frm_medicalleaves #noofstudent").closest('.row').after(appendstudent);

				// }			 	

			 	

			 	$('.indatepicker').daterangepicker({

					singleDatePicker: true,

					showDropdowns: true,							

					 locale: {

	           			 format: 'DD-MM-YYYY',

						 separator:' - '

	       				 }

				});

				$("#frm_medicalleaves #start_date").val(data.result.start_date);

				$("#frm_medicalleaves #end_date").val(data.result.end_date);

				

				$("#frm_medicalleaves #record_id").val(act_id);

				$("#con-close-modal").modal("show");

			 }

	     });

}









$(document).on('blur','#noofstudent',function(){		

	var value = $(this).val();	

	$(".student_id1").closest('.row').remove();

	for(var i=0;i<value;i++)

	{

		var appendstudent = '<div class="row"><div class="col-md-12"><div class="form-group"><label for="field-1" class="control-label">Student ID<span class="mandatory"></span></label><input type="text" name="student_id1[]" class="form-control student_id1 required"/><i class="fa fa-times deletestudentiddiv"></i></div></div></div>';

		$(this).closest('.row').after(appendstudent);

	}	

});







$(document).on('click','.deletestudentiddiv',function(){	

	$(this).closest('.row').remove();	

});





function randomPassword()

{



$.ajax(

        {

            type: "POST",

            dataType: 'json',

            cache: false,

            url: "clientside/socket/call.php",

            data: "connector=randomPassword",

            success: function(data)

			{

				$("#password1").val(data.password);

			}

			

			 

			 	

	     });

}




$(document).on('change', '.change-perc', function() {
	
	var marks = $(this).parent().parent().find('input[id=obtaine_marks_1]').val();
	var total = $(this).parent().parent().find('input[id=total_marks_1]').val();
	
	var per = 0;
	
	if (total)
		per = marks * 100 / total;
	
	$(this).parent().parent().find('input[id=percen_1]').val(per.toFixed(2));
	
	return false;
	
	
	
});
$(document).on('change', '.exam-chnage-pec', function() {
	//var cid = $(this).data("cid");
	var exm1 = $(this).parent().parent().find('.exmname').val();
	var brd1 = $(this).parent().parent().find('.brdname').val();
	if($('#category').val()=='ob' && brd1!='1' && exm1=='3' && exm1!='' && brd1!='')
	{
		$(this).parent().parent().find('.chng-pec').attr('readonly', false);
	}
	else{
		$(this).parent().parent().find('.chng-pec').attr('readonly', true);
	}
	
	
});




$(document).ready(function(){

	var tbody = $('#studenttable').children('tbody');	

	var table = tbody.length ? tbody : $('#studenttable');

	$(document).on('click','#studenttable-addrow',function(){

		var srno = $('#studenttable tr').length;

		table.append('<tr><td>'+srno+'</td><td><input type="text" name="exam_name[]" /></td><td><input type="text" name="school_name[]" /></td><td><input type="text" name="exam_seat_no[]" /></td><td><input type="text" name="total_marks[]" /></td><td><input type="text" name="obtaine_marks[]" /></td><td><input type="text" name="precentage[]" /></td><td><input type="text" name="steam[]" /></td><td><input type="text" name="grade[]" /></td></tr>');

	});

	

	$(document).on('click','#studenttable-removerow',function(){

		var srno = $('#studenttable tr').length;

		if(srno != 2)

		{

			$('#studenttable tr:last').remove();

		}		

	});

	

});









$(document).ready(function(){

	$(document).on('change','#permenentaddresscheckbox',function(){

		if ($(this).is(':checked')) {

			$("#current_address_line11").val($("#permenent_address_line11").val());

			$("#current_address_line21").val($("#permenent_address_line21").val());

			$("#current_city1").val($("#permenent_city1").val());

			$("#current_taluka1").val($("#permenent_taluka1").val());

			$("#current_district1").val($("#permenent_district1").val());

			$("#current_state1").val($("#permenent_state1").val());

			$("#current_zipcode1").val($("#permenent_zipcode1").val());

		}else{

			$("#current_address_line11").val('');

			$("#current_address_line21").val('');

			$("#current_city1").val('');

			$("#current_taluka1").val('');

			$("#current_district1").val('');

			$("#current_state1").val('');

			$("#current_zipcode1").val('');

		}

	});

});
$(document).ready(function(){
	$('.chng-pec').attr('readonly', true);
	/*if($("#update_id").val()==''){
	var cy = new Date().getFullYear().toString().substr(-2);//getFullYear() + 1
	var ny= parseInt(cy) + 1;
		if($("#last_id").val()=='1'){
			var no1 = $("#last_id").val();
		}
		else{
			var no1 = parseInt($("#last_id").val()) + 1;
		}
	$("#reg_no").val("REG"+cy+""+ny+""+no1)	
	}*/
	$("#exam_name_1").val("12-th");
	$("#exam_name_1").attr('readonly','readonly');
	
	var tbody = $('#regtable').children('tbody');	
	var table = tbody.length ? tbody : $('#regtable');
	$(document).on('click','#regtable-addrow',function(){
		$('#regtable tr').eq(1).clone().appendTo( "#regtable" );
		$('#regtable tr:last input[type="text"]').val('');
		$('#regtable tr:last').find('.chng-pec').attr('readonly', true);
	});
	
	$(document).on('click','#regtable-removerow',function(){
		var srno = $('#regtable tr').length;
		if(srno != 2)
		{
			$('#regtable tr:last').remove();
		}		
	});
	
});



