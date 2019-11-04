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

	var validator =$("#frm_conf").validate({

	rules: {			

						
				certificate_no: {
				required: function(element) {
						return $("#quota").val() != 'open';
					}
				},
			},

		messages: 

		{		

			certificate_no: {required: "Please Enter Cerificate No"},		

        },

		submitHandler: function (form) 

		{

			$("#save-conf").attr("disabled","disabled");

			$("#save-conf").text("Processing..");

			var server_root=$("#server_root").val();


	   $("#frm_conf").ajaxSubmit({

        url:"clientside/socket/call.php",

        data:$(form).serialize(),

        dataType: 'json',

        success: function(response) {

			if (response.RESULT == 'SUCCESS')

			 {       			var s_msg='<div class="alert alert-success alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Success</h4><p>'+response.MSG+'</p></div>';

					$("#students_confirm_response").html(s_msg); 

					$(form)[0].reset();

					$("#save-conf").removeAttr("disabled");

				    $("#save-conf").text("Save");

				    $("#record_id").val("");

					

					//cf_datapager(1,response.retriver);

					window.setTimeout(function()

					{
						$("#students_confirm_response").html('');
						window.location.href = response.URL;
					}, 2000);

			 }

			 else

			 {

				 	var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';

					$("#students_confirm_response").html(s_msg); 

					$("#save-conf").removeAttr("disabled");

				    $("#save-conf").text("Save");
					
					window.setTimeout(function()
					{
						$("#students_confirm_response").html('');
						window.location.reload();
					}, 2000);
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

$('input[name="filter_date"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('DD-MM-YYYY'));
	  $('input[name="filter_date"]').trigger("change");
  });
  $('input[name="filter_date2"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('DD-MM-YYYY'));
	  $('input[name="filter_date2"]').trigger("change");
  });
	

$(document).ready(function() {

	//alert(new Date().getFullYear().toString().substr(-2));	
	studententrySubmissions.init();

});

















