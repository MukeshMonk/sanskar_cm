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
var handleSubjectForm = function() {
	$().ready(function() {
	// validate the comment form when it is submitted
	var validator =$("#frm_subjects").validate({
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
			handleexamForm();
			handleSubjectForm();
							
		}
	}
}();
$(document).on('change', '.change_cource', function() {

	//alert("hello");
   // var optionSelected = $("option:selected", this);
   var term_temp = $(this).attr("data-term");
   var optionSel = $("#branch").val();
   
  $.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: "connector=data_cource_exam_schedule&act_id="+optionSel+"&term_temp="+term_temp,
                    success: function(data)
					{
						if(data.success!='1')
						{
							//$('#div1').html(data.sec_text);
							//$('#sub').html(data.sub_text);
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
                    data: {'connector':'delete_exam_sub','ac_id':act_id},
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
function loadexam_subject(terms_id,exam_id)
{
	$.ajax(
    {
        type: "POST",
        cache: false,
        dataType: 'json',
        url: "clientside/socket/call.php",
        data: "connector=loadexam_subject&clsid="+terms_id+"&examid="+exam_id,
        success: function(data)
		 {
				//$("#exam-subject-modal .modal-body").html(data.HTML);
				$("#exam-subject-modal .sub-list-div").html(data.HTML);
				$("#exam-subject-modal .sub-div").html(data.subhtml);
				$("#exam-subject-modal #examid").val(exam_id);
				$("#exam-subject-modal .modal-title").html(data.title_modal);
				$("#exam-subject-modal").modal("show");
				examinationSubmissions.init();
		 }
	})
}
function del_exam_sub(terms_id,exam_id)
{
	$.ajax(
    {
        type: "POST",
        cache: false,
        dataType: 'json',
        url: "clientside/socket/call.php",
        data: "connector=loadexam_subject&clsid="+terms_id+"&examid="+exam_id,
        success: function(data)
		 {
				//$("#exam-subject-modal .modal-body").html(data.HTML);
				$("#exam-subject-modal .sub-list-div").html(data.HTML);
				$("#exam-subject-modal .sub-div").html(data.subhtml);
				$("#exam-subject-modal #examid").val(exam_id);
				$("#exam-subject-modal .modal-title").html(data.title_modal);
				$("#exam-subject-modal").modal("show");
				examinationSubmissions.init();
		 }
	})
}
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
						$("#frm_exam_sch #branch").attr('data-term',data.result.term_id);
						$("#frm_exam_sch #branch").val(data.result.cource_id).trigger("change");
						 $("#frm_exam_sch #sem").val(data.result.sem_id).trigger("change");
						 $("#frm_exam_sch #is_attendance").val(data.result.is_attendance).trigger("change");
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
						//$('#frm_exam_sch #div1').val(data.result.div_id.split(','));
					 	
						$("#frm_exam_sch #a_name").val(data.result.act_name);
						$("#frm_exam_sch #m_marks").val(data.result.max_mark);
						//$("#frm_exam_sch #a_date").val(data.result.act_date);
					 	//$("#frm_exam_sch #m_s_date").val(data.result.m_sub_date);
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
/*
$('#con-close-modal').on('shown.bs.modal', function (e) {
  // do cool stuff here all day… no need to change bootstrap
  
  var temp_sub = $("#frm_exam_sch #sub_temp").val();
   var temp_term = $("#frm_exam_sch #term_temp").val();
   var temp_sec = $("#frm_exam_sch #sec_temp").val();
   //alert(temp_term);
  $("#frm_exam_sch #sub").val(temp_sub).trigger("change");
 $("#frm_exam_sch #trm").val(temp_term).trigger("change");
 // $("#frm_exam_sch #sub").val(temp_sub);
 // $("#frm_exam_sch #trm").val(temp_term);
  $.each(temp_sec.split(","), function(i,e){
		//alert($("#frm_exam_sch #div1").val());
		$("#frm_exam_sch #div1 option[value='" + e + "']").prop("selected", true);
	});
})*/
