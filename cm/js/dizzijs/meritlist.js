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
