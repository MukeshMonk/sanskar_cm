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
	var validator =$("#frm_reg").validate({
	rules: {			
			name: {required: true},			
		},
		messages: 
		{		
			name: {required: "Please Enter Name"},		
        },
		submitHandler: function (form) 
		{
			$("#save-reg").attr("disabled","disabled");
			$("#save-reg").text("Processing..");
			var server_root=$("#server_root").val();
		
	 
	 
	   $("#frm_reg").ajaxSubmit({
        url:"clientside/socket/call.php",
        data:$("#frm_reg").serialize(),
        dataType: 'json',
        success: function(response) {
			if (response.RESULT == 'SUCCESS')
			 {       			var s_msg='<div class="alert alert-success alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Success</h4><p>'+response.MSG+'</p></div>';
					$("#students_response").html(s_msg); 
					$(form)[0].reset();
					$("#save-reg").removeAttr("disabled");
				    $("#save-reg").text("Save");
				    $("#record_id").val("");
					
					/*cf_datapager(1,response.retriver);
					window.setTimeout(function()
					{
						$("#students_response").html('');
					}, 5000);*/
					window.location.href = response.URL;
			 }
			 else
			 {
				 	var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';
					$("#students_response").html(s_msg); 
					$("#save-reg").removeAttr("disabled");
				    $("#save-reg").text("Save");
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
			handlestaffForm();
			handleLastSchoolForm();	
			handleLastSchoolForm1();									
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
/*dob = new Date($(this).val());

var today = new Date();

var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
$('#today_age').html(age+' years old');
$('#age_today').val(age+' years old');*/

});
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
$(document).ready(function() {
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
								
								
									    $("#"+f).val(city_text);
										$("#profile_state").val(state_text);
										//$("#profile_country").val(country_text);
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
$('#enq_no').on('change', function (e) {
   // var optionSelected = $("option:selected", this);
   var optionSel = $(this).val();
  $.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: "connector=data_enquiries&act_id="+optionSel,
                    success: function(data)
					{
						if(data.success!='1')
						{
							$("#frm_reg #first_name").val(data.result.first_name);
						$("#frm_reg #middle_name").val(data.result.middle_name);
					 	$("#frm_reg #last_name").val(data.result.last_name);
						$("#frm_reg #age_today").val(data.result.age_today);
						$("#frm_reg #today_age").text(data.result.age_today);
						$("#frm_reg #email_id").val(data.result.email_id);
						$("#frm_reg #mobile_no").val(data.result.mobile_no);
						$("#frm_reg #phone_no").val(data.result.phone_no);
						$("#frm_reg #gender").val(data.result.gender).trigger("change");
						$("#frm_reg #category").val(data.result.category).trigger("change");
						$("#frm_reg #cm_course").val(data.result.poi).trigger("change");
						$("#frm_reg #sem").val(data.result.sem_adm).trigger("change");
						$("#frm_reg #cm_academic_year").val(data.result.acd_year).trigger("change");
						$("#frm_reg #enq_class").val(data.result.enq_class).trigger("change");
						$("#frm_reg #father_occupation").val(data.result.profession);
						$("#frm_reg #mother_name").val(data.result.mother_name);
						$("#frm_reg #address").val(data.result.address);
						$("#frm_reg #city").val(data.result.city);
						$("#frm_reg #district").val(data.result.district);
						$("#frm_reg #state").val(data.result.state);
						$("#frm_reg #country").val(data.result.country);
						$("#frm_reg #pin").val(data.result.pin);
					 	
					 	$("#frm_reg #dob").val(data.result.dob);
						
						if(data.result.ph_status=="ph_yes")
						{
							$('#frm_reg input:radio[name="ph_status"][value="ph_yes"]').attr('checked',true);
							
						}
						
						if(data.result.ph_status=="ph_no")
						{
							$('#frm_reg input:radio[name="ph_status"][value="ph_no"]').attr('checked',true);
						}
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
							//$('#frm_reg')[0].reset();
							var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+data.MSG+'</p></div>';
					$("#students_response").html(s_msg);
					 //$('#enq_no').selectmenu("refresh", true); 
					 $("#frm_reg #enq_no").val("").trigger("change");
							//$("#students_response").html(data.MSG);//students_response
							
						}
					 	
						
					 }
			     });
    
});
$('input[name="filter_date"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('DD-MM-YYYY'));
	  $('input[name="filter_date"]').trigger("change");
  });
  $('input[name="filter_date2"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('DD-MM-YYYY'));
	  $('input[name="filter_date2"]').trigger("change");
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
		//$('#regtable tr').eq(1).clone().appendTo( "#regtable" );
		//$('#regtable tr:last input[type="text"]').val('');
		//$('#regtable tr:last').find('.chng-pec').attr('readonly', true);
	});
	
	$(document).on('click','#regtable-removerow',function(){
		// var srno = $('#regtable tr').length;
		// alert(srno);
		// if(srno != 2)
		// {
		// 	$('#regtable tr:last').remove();
		// }		
	});
	
});

