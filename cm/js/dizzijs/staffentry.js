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
		first_name: {required: true},			
		},
		messages: 
		{		
			first_name: {required: "Please Enter FirstName"},		
		},
	
		submitHandler: function (form) 
		{
			$("#save_staff").attr("disabled","disabled");
			$("#save_staff").text("Processing..");
	   $("#frm_staff").ajaxSubmit({
        url:"clientside/socket/call.php",
        data:$(form).serialize(),
        dataType: 'json',
        success: function(response) {
			if (response.RESULT == 'SUCCESS')
			 {      var s_msg='<div class="alert alert-success alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Success</h4><p>'+response.MSG+'</p></div>';
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


	$("#department").SumoSelect({search: true, okCancelInMulti: true});
	$(".sumo-select").SumoSelect({search: true,});
	studententrySubmissions.init();
/***START THIS CODE FOR ENABLE DISABLE SOME FIELD WHEN SELECTED ANY ONE STATUS */
	if($('#unmarried').is(":checked"))
	{
		$("#date_aniversary").attr("disabled",true); 
		$("#spouce_name").attr("disabled",true); 
		$("#s_contact_no").attr("disabled",true); 
	}
	$("#unmarried").click(function(){
		$("#date_aniversary").attr("disabled",true); 
		$("#spouce_name").attr("disabled",true); 
		$("#s_contact_no").attr("disabled",true); 
	});
	$("#married").click(function(){
		$("#date_aniversary").attr("disabled",false); 
		$("#spouce_name").attr("disabled",false); 
		$("#s_contact_no").attr("disabled",false); 
	});
	/***END THIS CODE FOR ENABLE DISABLE SOME FIELD WHEN SELECTED ANY ONE STATUS */

});
$(document).on("click",".btn-default-custom",function(){
	$("#con-close-modal .modal-title span").text("Add");

});
function edit_staff(act_id)
{
	
	$("#con-close-modal .modal-title span").text("Edit");

	$.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: "connector=edit_staff&act_id="+act_id,
                    success: function(data)
					{
						 //$("#frm_staff #department").val(data.result.department).trigger("change");
						var res_dep=data.result.department;
					   	var dep_arr = res_dep!="" ? res_dep.split(",") : "" ;
						$("#sel_depart_1").val(dep_arr);
						
						for(i=0;i<dep_arr.length;i++)
							{
					   			$('#department').find('option[value="'+dep_arr[i]+'"]').attr("selected",true);
							}					  
						
						    $('#department')[0].sumo.unload();
							$("#department").SumoSelect({search: true, okCancelInMulti: true});
							$("#frm_staff #department").trigger("change");					

						

							var sub_dd=data.result.subject;
							//alert(sub_dd);
							var sub_arr = sub_dd!="" ? sub_dd.split(",") : "" ;
					   
						 for(i=0;i<sub_arr.length;i++)
							 {
								 //alert(sub_arr.length);
									$('#sel_subject').find('option[value="'+sub_arr[i]+'"]').attr("selected",true);
							 }					  
						 
							 $('#sel_subject')[0].sumo.unload();
							 $("#sel_subject").SumoSelect({search: true});
						//	 $("#frm_staff #sel_subject").trigger("change");




						 $("#frm_staff #designation").val(data.result.designation).trigger("change");
					 	//$("#frm_staff #subject").val(data.result.subject).trigger("change");
						$("#frm_staff #sel_cls_inchrg").val(data.result.class_incharge);
						$('#sel_cls_inc').val(data.result.class_incharge);
						var res_cls=data.result.class_incharge;
						   var cls_arr = res_cls!="" ? res_cls.split(",") : "" ;
						   
						  // console.log("cls_arr"+cls_arr);
						   setTimeout(function(){ 
							for(i=0;i<cls_arr.length;i++)
							{
					   			$('#sel_cls_inc').find('option[value="'+cls_arr[i]+'"]').attr("selected",true);
							}	
							$('#sel_cls_inc')[0].sumo.unload();
							$("#sel_cls_inc").SumoSelect({search: true});
						    }, 1000);

						    		
						
					
						$("#frm_staff #sel_sub_1").val(data.result.subject);
						//$("#frm_staff #class_incharge").val(data.result.class_incharge).trigger("change");
						
						$("#frm_staff #record_id").val(act_id);
						$("#con-close-modal").modal("show");
					 }
			     });
}
$('#department').on('change', function (e) {
	//alert("hello");
   // var optionSelected = $("option:selected", this);
   var optionSel = $("#department").val();
   if(optionSel!=""){

  
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
							
						 	// for(i=0;i<sub_arr.length;i++)
							//  {
							// 		$('#sel_cls_inc').find('option[value="'+sub_arr[i]+'"]').attr("selected",true);
							//  }		
							// $('#sel_subject').html(data.sub_text);
							$('#sel_cls_inc').html(data.class_text);
							//$('#sel_cls_inc').html(sel_rem);
							// var res_sem=data.class_text;
							// console.log(res_sem);

					   		// var sem_arr = res_dep!="" ? res_dep.split(",") : "" ;
							//$("#frm_staff #sel_depart_1").val(data.class_text);
						
							// $('#sel_subject')[0].sumo.unload();
							// $("#sel_subject").SumoSelect({search: true,});

							//$("#frm_staff #class_incharge").val($("#sel_cls_inchrg").val()).trigger("change");
							// if($("#sel_cls_inchrg").val()!='')
							// {
							// 	alert("hi");
							// 	var res = $("#sel_cls_inchrg").val().split(",");
								
							// 	$.each(res,function(i){
							// 	   $("#frm_staff #sel_cls_inc option[value='" + res[i] + "']").prop("selected", true);
							// 	});
							// }
							// if($("#sel_sub_1").val()!='')
							// {
							// 	var res = $("#sel_sub_1").val().split(",");
							// 	$.each(res,function(i){
							// 	   $("#frm_staff #sel_subject option[value='" + res[i] + "']").prop("selected", true);
							// 	});
							// }

							var de_sel = $('#department').val();
							var sel_dep = $('#sel_depart_1').val(de_sel);
							//alert(sel_dep);
							if($("#sel_cls_inchrg").val()!=""){
								var class_val=$("#sel_cls_inchrg").val();
								console.log(class_val);
								var class_val_arr = class_val!="" ? class_val.split(",") : "" ;
								for(i=0;i<class_val_arr.length;i++)
								{
									$('#sel_cls_inc').find('option[value="'+class_val_arr[i]+'"]').attr("selected",true);
								}
								$('#sel_cls_inc')[0].sumo.unload();
								$("#sel_cls_inc").SumoSelect({search: true,});	
								//$("#frm_staff #sel_cls_inc").trigger("change");

							} else{
								$('#sel_cls_inc')[0].sumo.unload();
								$("#sel_cls_inc").SumoSelect({search: true,});
							}
						
						}
					 }
				 });
				}
				else{
					$('#sel_cls_inc').html('<option value="">Select Class</option>');
					$('#sel_cls_inc')[0].sumo.unload();
					$("#sel_cls_inc").SumoSelect({search: true,});
					$('#sel_subject').html('<option value="">Select Subject</option>');
					$('#sel_subject')[0].sumo.unload();
					$("#sel_subject").SumoSelect({search: true,});
				}
});
$(document).on("change","#sel_cls_inc",function(){
	
	var optionSel = $("#sel_cls_inc").val();
	var optionSel2 = $("#department").val();
	// var selected_depart = $('#sel_depart_1').val();	
	// 				console.log(selected_depart);
	$.ajax(
		{
			type: "POST",
			dataType: 'json',
			cache: false,
			url: "clientside/socket/call.php",
			data: "connector=getSemesterBySubject&class_id="+optionSel+"&course_id="+optionSel2,
			success: function(data)
			{
				if(data.success!='1')
				{
						console.log("subject options:"+data.sub_text);	
					
					$('#sel_subject').html(data.sub_text);
						if($("#sel_sub_1").val()!=""){
						var sub_val=$("#sel_sub_1").val();
						var sub_val_arr = sub_val!="" ? sub_val.split(",") : "" ;
						for(i=0;i<sub_val_arr.length;i++)
						{
							$('#sel_subject').find('option[value="'+sub_val_arr[i]+'"]').attr("selected",true);
						}	
					
					}

					$('#sel_subject')[0].sumo.unload();
					$("#sel_subject").SumoSelect({search: true,});
				}
			
				
			 }
		 });

});
$('#con-close-modal').on('hidden.bs.modal', function () {
	$(this).find('form').trigger('reset');
	//$("#subject").html('');
	$("#department option:selected").removeAttr("selected");
	// $('#sel_subject')[0].sumo.reset();
	// $('#department')[0].sumo.remove();
	// $('#sel_cls_inc')[0].sumo.reload();
})
