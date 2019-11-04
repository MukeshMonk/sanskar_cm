$(document).on("blur",".edit_marks",function(){

    var max = $(this).attr("data-marks");
    var cur = $(this).attr("data-cmarks");
    var remarks = $(this).closest('tr').find('.e-remark').val();
    var v = $(this).val();
   
   
    if(parseInt(v) > parseInt(max))
    {
        jAlert("Please Enter Marks Less then "+max+" Marks");
        $(this).val(cur);
    }
    if(remarks==''){
        jAlert("Please Enter Remarks");
    }
    
 
});
$(".sch_mark_enter").on('change',function(e){
	$(this).closest('td').find('.edit_marks').val('0');
});