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
	var validator =$("#frm_enquiries").validate({
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
		
	 
	 
	   $("#frm_enquiries").ajaxSubmit({
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
	  $('.indatepicker').daterangepicker({
							singleDatePicker: true,
							showDropdowns: true,							
							 locale: {
			           			 format: 'DD-MM-YYYY',
								 separator:'-'
			       				 }
						});
	 return false; 
	 
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
    //$("#record_id").val("");								
	//cf_datapager(1,"lastschool");				
	window.setTimeout(function()				
	{						$("#lastschool_response").html('');	
	
	}, 5000);	
	
	$("#name_last").append('<option value="'+response.id+'">'+response.name+'</option>');
	$("#name_last").val(response.id);
	
	$("#con-close-modal2").modal("hide");
	
										        
	} else {
	
	var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';					$("#lastschool_response").html(s_msg); 	
	$("#save_lastschool").removeAttr("disabled");	
	$("#save_lastschool").text("Save");		
	}							});	
	return false; 
	// required to block normal submit since you used ajax  
    }		   });   });}
return {
		init: function() {
			handlestaffForm();
			handleLastSchoolForm();				
		}
	}
}();


$( ".age_change" ).change(function() {
//alert($(this).val());
var dob=$(this).val();
var dt = dob.split("-");
var n_date=dt[2];

//dob = new Date($(this).val());

var d_year = n_date;
var today = new Date();

var t_year = today.getFullYear() ;
var age = Math.floor((t_year-d_year));
$('#today_age').html(age+' years old');
$('#age_today').val(age+' years old');

});
	
$(document).ready(function() {	/*var cy = new Date().getFullYear().toString().substr(-2);//getFullYear() + 1
		var ny= parseInt(cy) + 1;	if($("#last_id").val()=='')	{		var no1 = 1;			}	else{		var no1 = parseInt($("#last_id").val()) + 1;			}	$("#enq_no").val("ENQ-"+cy+"-"+ny+"-"+no1);	*/
		studententrySubmissions.init();
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
$('#con-close-modal').on('hidden.bs.modal', function () {
    $(this).find('form').trigger('reset');
	//$("#enq_date").load("hello");
	$('.indatepicker').daterangepicker({
							singleDatePicker: true,
							showDropdowns: true,							
							 locale: {
			           			 format: 'DD-MM-YYYY',
								 separator:'-'
			       				 }
						});
})
$('#con-close-modal2').on('hidden.bs.modal', function () {
    $(this).find('form').trigger('reset');
})
$('input[name="filter_date"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('DD-MM-YYYY'));
	  $('input[name="filter_date"]').trigger("change");
  });
$('input[name="filter_date2"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('DD-MM-YYYY'));
	  $('input[name="filter_date2"]').trigger("change");
});
function edit_enquiries(act_id)
{
	$.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: "connector=edit_enquiries&act_id="+act_id,
                    success: function(data)
					{
						
						/*`enq_date`, `enq_no`, `acd_year`, `enq_class`, `first_name`, `middle_name`, `last_name`, `dob`, `age_today`, `email_id`, `student_type`, `mobile_no`, `phone_no`, `gender`, `category`, `ph_status`, `father_name`, `profession`, `mother_name`, `address`, `city`, `district`, `state`, `country`, `pin`, `name_last`, `last_address`, `pr_grade`, `poi`, `sem_adm`, `pre_comm`, `src_info`, `remarks`*/
					 	$("#frm_enquiries #enq_no").val(data.result.enq_no);
						$("#frm_enquiries #first_name").val(data.result.first_name);
						$("#frm_enquiries #middle_name").val(data.result.middle_name);
					 	$("#frm_enquiries #acd_year").val(data.result.acd_year).trigger("change");
						$("#frm_enquiries #enq_class").val(data.result.enq_class).trigger("change");
					 	$("#frm_enquiries #last_name").val(data.result.last_name);
						$("#frm_enquiries #age_today").val(data.result.age_today);
						$("#frm_enquiries #email_id").val(data.result.email_id);
						$("#frm_enquiries #student_type").val(data.result.student_type).trigger("change");
						$("#frm_enquiries #mobile_no").val(data.result.mobile_no);
						$("#frm_enquiries #phone_no").val(data.result.phone_no);
						$("#frm_enquiries #gender").val(data.result.gender).trigger("change");
						$("#frm_enquiries #category").val(data.result.category).trigger("change");
						$("#frm_enquiries #father_name").val(data.result.father_name);
						$("#frm_enquiries #profession").val(data.result.profession);
						$("#frm_enquiries #mother_name").val(data.result.mother_name);
						$("#frm_enquiries #address").val(data.result.address);
						$("#frm_enquiries #city").val(data.result.city);
						$("#frm_enquiries #district").val(data.result.district);
						$("#frm_enquiries #profile_state").val(data.result.state);
						$("#frm_enquiries #profile_country").val(data.result.country);
						$("#frm_enquiries #pin").val(data.result.pin);
						$("#frm_enquiries #name_last").val(data.result.name_last).trigger("change");;
						$("#frm_enquiries #last_address").val(data.result.last_address);
						$("#frm_enquiries #pr_grade").val(data.result.pr_grade);
					 	$("#frm_enquiries #poi").val(data.result.poi).trigger("change");
						$("#frm_enquiries #sem_adm").val(data.result.sem_adm).trigger("change");
						$("#frm_enquiries #pre_comm").val(data.result.pre_comm).trigger("change");
						$("#frm_enquiries #status").val(data.result.status).trigger("change");
						$("#frm_enquiries #src_info").val(data.result.src_info).trigger("change");
					 	$("#frm_enquiries #remarks").val(data.result.remarks);
						
					 	
					 	$("#frm_enquiries #enq_date").val(data.result.enq_date);
						$("#frm_enquiries #dob").val(data.result.dob);
						
						if(data.result.ph_status=="ph_yes")
						{
							$('#frm_enquiries input:radio[name="ph_status"][value="ph_yes"]').attr('checked',true);
							
						}
						
						if(data.result.ph_status=="ph_no")
						{
							$('#frm_enquiries input:radio[name="ph_status"][value="ph_no"]').attr('checked',true);
						}
						$('.indatepicker').daterangepicker({
							singleDatePicker: true,
							showDropdowns: true,							
							 locale: {
			           			 format: 'DD-MM-YYYY',
								 separator:'-'
			       				 }
						});
						
						$("#frm_enquiries #record_id").val(act_id);
						$("#con-close-modal").modal("show");
					 }
			     });
}
function loadcity(f,p)
{
			var options = {
											types: ['(cities)'] //this should work !
										};
			
            var places = new google.maps.places.Autocomplete(document.getElementById(f),options);
            google.maps.event.addListener(places, 'place_changed', function () {
                var place = places.getPlace();
								
								var address_text=place.adr_address
								$("#mapop").html(address_text);
								var city_text=$(".locality").text();
								var state_text=$(".region").text();
								var country_text=$(".country-name").text();
							  console.log(place);
								//$("iframe").attr("src",place.url);
								
               // var address = place.formatted_address;
                //var city = place.address_components[4].long_name;
               // var latitude = place.geometry.location.A;
               // var longitude = place.geometry.location.F;
								console.log(place.geometry['location'].lat());
			    			console.log(place.geometry['location'].lng());
								alert(state_text);
								
									    $("#"+f).val(city_text);
										$("#profile_state").val(state_text);
										$("#profile_country").val(country_text);
										/*$("#profile_state").val(state_text);
										$("#profile_country").val(country_text);
										$("#profile_lat").val(place.geometry['location'].lat());
										$("#profile_lng").val(place.geometry['location'].lng());*/
										
				         
				
              /*  var mesg = "Address: " + address;
                mesg += "\City: " + city;
                mesg += "\nLatitude: " + place.geometry['location'].lat();
                mesg += "\nLongitude: " + place.geometry['location'].lng();*/
               // alert(mesg);
            });
				
}

$(document).on('blur','#noofstudent',function(){	
	var value = $(this).val();	
	for(var i=0;i<value;i++)
	{
		var appendstudent = '<div class="row"><div class="col-md-12"><div class="form-group"><label for="field-1" class="control-label">Student ID<span class="mandatory"></span></label><input type="text" name="student_id1[]" class="form-control student_id1 required"/><i class="fa fa-times deletestudentiddiv"></i></div></div></div>';
		$(this).closest('.row').after(appendstudent);
	}	
});

$(document).on('click','.deletestudentiddiv',function(){
		//$("#enq_no").val("ENQ-");
		//
	$(this).closest('.row').remove();	
});
