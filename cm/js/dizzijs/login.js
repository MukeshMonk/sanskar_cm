// JavaScript Document
// JavaScript Document
// Login
var Login = function() 
{
	"use strict";
	// Handle Login Form
	var handleLoginForm = function() {
	$().ready(function() {
	// validate the comment form when it is submitted
	var validator =$("#login-in").validate({
	rules: {
			uname: {required: true},
			pwd: {required: true},
		},
		messages: 
		{
		uname:{required: "Please Enter Login Id"},
		pwd: {required: "Please Enter Your Password"},
        },
		submitHandler: function (form) 
		{
			$("#signup_btn").attr("disabled","disabled");
			$("#signup_btn").text("Processing..");
			var server_root=$("#server_root").val();
			
			$.ajax({
				type: $(form).attr('method'),
				url: server_root+"/clientside/socket/call.php",
				data: $(form).serialize(),
				dataType : 'json'
			})
			.done(function (response) {
				if (response.RESULT == 'success') {               
					
					var s_msg='<div class="alert alert-success alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Success</h4><p>'+response.MSG+'</p></div>';
					$("#signup_response").html(s_msg); 
					$(form)[0].reset();
					$("#signup_btn").removeAttr("disabled");
				    $("#signup_btn").text("Sign In");
					window.setTimeout(function()
					{
						window.location.href = response.URL;
					}, 2000);
					                      
				} else {
						var s_msg='<div class="alert alert-danger alert-custom alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><h4 class="alert-title">Opps..</h4><p>'+response.MSG+'</p></div>';
					$("#signup_response").html(s_msg); 
					$("#signup_btn").removeAttr("disabled");
				    $("#signup_btn").text("Sign In");
				}
				
			});
		return false; // required to block normal submit since you used ajax
      }

		
   });
   
});
}
			
				return {
					init: function() {
						handleLoginForm(); // initial setup for comment form
					}
				}
			}();
				
				$(document).ready(function() {
   				 Login.init();
				});