$(".sumo-select").SumoSelect({search: true,});
$(document).on('click','.call_export',function()
{
        var data_id=$(this).attr('data-id');
        $.ajax(
        {
            type: 'POST',
            dataType: 'json',
            cache: false,
            url: 'clientside/socket/call.php',
            data: {'connector':'export_month_wise_attend_report','exp_id':data_id},
            success: function(data)
                {
                if(data.RESULT=='SUCCESS')
                {
                        window.location.href=data.url;
                        
                }
                else
                {
                        jAlert(data.MSG);
                }
            }
        });				
});


$(document).on('click','.call_export_daily',function()
{
        var data_id=$(this).attr('data-id');
        $.ajax(
        {
            type: 'POST',
            dataType: 'json',
            cache: false,
            url: 'clientside/socket/call.php',
            data: {'connector':'export_daily_attend_report','exp_id':data_id},
            success: function(data)
                {
                if(data.RESULT=='SUCCESS')
                {
                        window.location.href=data.url;
                        
                }
                else
                {
                        jAlert(data.MSG);
                }
            }
        });				
});
