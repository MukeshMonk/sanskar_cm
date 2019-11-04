function download_sample(act)
{
	 var frm = $("<form>", {
                'method': 'post'
            });
						 $("<input>", {
                    'type': 'hidden',
                    'name': 'act',
                    'value': act
                }).appendTo(frm);
						 frm.appendTo("body");
            frm.submit();
}
$(document).on('click','#uploadimpfile', function() {
      $("#uploadimpfile").hide();
      $("#import_data").hide();
      $(".loading_file_area").show();
    var fnm=$(this).data("fname");
		 $("#"+fnm).ajaxSubmit({
        url: 'clientside/socket/call.php',
        data: {
          connector: 'import_students'
        },
        dataType: 'json',
        beforeSubmit: function() {
          $("#progress-bar").width('0%');
        },
        uploadProgress: function(event, position, total, percentComplete) {
          $("#progress-bar").width(percentComplete + '%');
          console.log(percentComplete);
          $("#progress-bar").html('<div id="progress-status">' + percentComplete + ' %</div>')
        },
        success: function(data) {
          $('#loader-icon').hide();
          $(".loading_file_area").hide();
					console.log(data);
				 if(data.RESULT!="OK")
				 {
					jAlert(data.MSG, 'Error!');
				 $("#uploadimpfile").show();
      		$(".loading_file_area").hide();
				 
				 }
				 else
				 {
					 $("#fnm").val(data.filename);
					 $("#excelPreview .table-responsive").html(data.excel_preview);
					 $("#excelUploadInfo").fadeOut(function(){
 						 $('#excelPreview').fadeIn();
 						 $('#bottom-form-container').fadeOut();
						 
						});
					
				 $("#import_data").show();
						
				 }
        },
				 error: function(data) 
				 {
					jAlert("Somthing Went Wrong", 'Error!');
				 $("#uploadimpfile").show();
      		$(".loading_file_area").hide();
				 },

        resetForm: true
      });
			
			return false;
		
		
});
$(document).on('click','#import_data', function() {
	$('#import_data').attr("disabled","disabled");
	$('#import_data').text('Importing records please Wait');
	
		var fnm=$("#fnm").val();
		$.ajax({
    type: 'POST',
        url: 'clientside/socket/call.php',
    data: {'connector':'uploadStudents','fnm':fnm},
    dataType: 'json',
    success: function(data) {
			if(data.RESULT=='SUCCESS')
			{
				  $("#salesinvs").val(data.licenserecords);
			    var msg=data.msg;	
					jAlert(msg, 'Congratulations');
			   // $("#generate_pdf").show();
				 $('#import_data').text('Import');
					$('#import_data').removeAttr("disabled");
					$('#import_data').hide();
			}
			else
			{
					$('#import_data').removeAttr("disabled");
				  $('#import_data').text('Import');
					jAlert(data.msg, 'Error!')
			}
      /*$("#edit-todo-modal").modal('hide');
      loadcomments(data.actid, data.activityid);
      $("#edit-todo-modal .modal-body").html('');*/
    }
  });
	return false;	
		
});