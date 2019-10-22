// JavaScript Document
$(document).on("change",".gen_conditionalval",function()
{
	
							//so, the date is changed;
							//Do your works here...
							var data_field=$(this).attr('id');
							var mysort_colums=$('#conditional_val').val();
							var str = mysort_colums;
							var myArr ={};
							 if(str!='')
							 {
							  myArr = JSON.parse(str);
							 }
							var myJsonString='';
							var nkey = data_field;
							myArr[nkey] = $(this).val();
							myJsonString =  JSON.stringify(myArr);
							$("#conditional_val").val(myJsonString);
							console.log(myJsonString);
				
});

function cf_datapager(pageno, gocallthis) {
  //$('#retrieved-data').html('<p><img src="assets/images/bx_loader.gif" /></p>');        
  //$('#retrieved-data').load( targetURL ).hide().fadeIn('slow');
  var sb_str = $("#serach_string").val();
  var sb = $("#search_by").val();
  if (sb != "" && sb_str != "")
  {
    var apnd = "&sb=" + sb + '&sbv=' + sb_str;
    var object_search = {
      "sb": sb,
      "sbv": sb_str
    };
  } else
  {
    var apnd = '';
    var object_search = ''
  }
  var filter_val = $("#filters").val();
  var sort_colums_val = $("#sort_colums").val();
  if ($("#conditional_val").length)
  {
    var conditional_val = $("#conditional_val").val();
  } else
  {
    var conditional_val = '';
  }
  if (filter_val != "")
  {
    var object_filter = jQuery.parseJSON(filter_val)
  }
  if (sort_colums_val != "")
  {
    var object_sort_colums = jQuery.parseJSON(sort_colums_val)
  }
  if (conditional_val != "")
  {
    var object_con_colums = jQuery.parseJSON(conditional_val)
  }
  var sort_field = $("#sort_field").val();
  var sort_field_value = $("#sort_field_value").val();
  var object1 = {
    "connector": gocallthis,
    "page": pageno,
    "sort_field": sort_field,
    "sort_field_value": sort_field_value
  };
  if (object_search != "" && filter_val != "")
  {
    var data_object = $.extend({}, object1, object_search, object_filter);
  } else if (object_search == "" && filter_val != "")
  {
    var data_object = $.extend({}, object1, object_filter);
  } else if (object_search != "" && filter_val == "")
  {
    var data_object = $.extend({}, object1, object_search);
  } else
  {
    var data_object = object1;
  }
  if (conditional_val != "")
  {
    var data_object_final = $.extend({}, data_object, object_con_colums);;
  } else
  {
    var data_object_final = data_object;
  }
  $('.dizzilist-block').append('<div id="cf_loader"><span class="cf_spin_wrap"></span></div>');
  $.ajax(
    {
      type: "POST",
      dataType: 'json',
      cache: false,
      url: "clientside/socket/call.php",
      data: data_object_final || [],
      success: function(data) {
        if (data.RESULT == 'OK')
        {
          if(data.qry2!=''){
            $("#total_student").val("Total Student("+data.qry2+")");
          }
          else{
            $("#total_student").val(data.qry2);
          }
          // $('#retrieved-data').html(data.HTML).hide().fadeIn('slow');
          if ($("#cf_table_list #tbody").length)
          {
            $("#cf_table_list #tbody").html(data.HTML);
          } else
          {
            $("#cf_table_list tbody").html(data.HTML);
          }
          $("#paginate_me").html(data.pagi_btn);
          $("#paginate_counter").html(data.page_counter);
          $("#cf_loader").show().fadeOut('slow', function() {
            $("#cf_loader").remove();
          });
         $('[data-toggle="tooltip"]').tooltip({
				html: true
				});

        } else
        {
          console.log("nothing found");
          $("#cf_loader").remove();
        }
		
		
      }
    });
}
$(document).ready(function() {
  $("input:radio[name=nva]").click(function() {
    var v = $(this).val();
    $(".rmp").each(function() {
      //$(this).val("");
      $(this).attr("disabled", "disabled");
    });
    for (i = 0; i <= v; i++)
    {
      $("#rmp_" + i).removeAttr("disabled", "disabled");
    }
  });
  $(".sort-column a").click(function() {
    var data_field = $(this).attr("data-field");
    var data_val = $(this).attr("data-val");
    var mysort_colums = $("#sort_colums").val();
    var str = mysort_colums;
    var myArr = {};
    var myJsonString = "";
    if (str != "")
    {
      myArr = JSON.parse(str);
    }
    var nkey = data_field;
    myArr[nkey] = data_val;
    myJsonString = JSON.stringify(myArr);
    $("#sort_colums").val(myJsonString);
    $("#sort_field").val(data_field);
    $("#sort_field_value").val(data_val);
    var method = $(this).closest("table").attr("data-method");
    //alert(method);
    cf_datapager(1, method);
    return false;
  });
  $(".filter_result select").change(function() {
    var data_field = $(this).attr("data-field");
    var data_val = $(this).val();
    var mysort_colums = $("#filters").val();
    var str = mysort_colums;
    var myArr = {};
    var myJsonString = "";
    if (str != "")
    {
      myArr = JSON.parse(str);
    }
    var nkey = data_field;
    myArr[nkey] = data_val;
    myJsonString = JSON.stringify(myArr);
    $("#filters").val(myJsonString);
    var method = $(this).closest("table").attr("data-method");
    //alert(method);
    cf_datapager(1, method);
    return false;
  });
  $('.checkAll').click(function() {
    if ($(this).is(':checked')) {
      $('.delAll').prop('checked', true);
    } else {
      $('.delAll').prop('checked', false);
    }
  });
});

/**---MULTIPLE DELETE FUNCTION---**/

$("#delete_action").click(function() {
  var data_act = $(this).attr("data-act");
  var data_connector = $(this).attr("data-connector");
  var del = new Array();
  $("input[name='del[]']:checked").each(function() {
    del.push($(this).val());
  });
  if (del.length > 0)
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
                    data: {'connector':data_connector,'delids':del},
                    success: function(data)
					 {
						if(data.RESULT=='SUCCESS')
						{
    							jAlert(data.MSG);
								cf_datapager(1,data.retriver);
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
  } else
  {
    jAlert("No Record Selected.");
    return false;
  }
});


/**---SINGLE DELETE FUNCTION---**/

function confrim_del_ajax(optns) {
  jConfirm('Are you sure you want to delete record?', 'Confirmation Dialog', function(r) {
    if (r == true) {
    
	
	$.ajax(
                {
                    type: "POST",
                    dataType: 'json',
                    cache: false,
                    url: "clientside/socket/call.php",
                    data: optns,
                    success: function(data)
					 {
						if(data.RESULT=='SUCCESS')
						{
    							jAlert(data.MSG);
								cf_datapager(1,data.retriver);
						}
						else
						{
    							jAlert(data.MSG);
						}
						

						
                    }
                });
     
	 
	 
	 
	 
    } else {
      return false;
    }
  });
}



/*---Export Excel Data---*/
function dizzi_exporter(pageno,gocallthis)
{
	         
	//$('#retrieved-data').html('<p><img src="assets/images/bx_loader.gif" /></p>');        
	//$('#retrieved-data').load( targetURL ).hide().fadeIn('slow');
	var sb_str=$("#serach_string").val();
	var sb=$("#search_by").val();
	if(sb!="" && sb_str!="")
	{
		var apnd="&sb="+sb+'&sbv='+sb_str;
		var object_search={"sb":sb,"sbv":sb_str};
	}
	else
	{
		var apnd='';
		var object_search=''
	}
	
	var filter_val=$("#filters").val();
	var sort_colums_val=$("#sort_colums").val();
	if($("#conditional_val").length)
	{
		var conditional_val=$("#conditional_val").val();
	}
	else
	{
		var conditional_val='';
	}
	
	if(filter_val!="")
	{
	var object_filter=jQuery.parseJSON( filter_val )
	}
	if(sort_colums_val!="")
	{
	var object_sort_colums=jQuery.parseJSON( sort_colums_val )
	}
	if(conditional_val!="")
	{
	var object_con_colums=jQuery.parseJSON( conditional_val )
	}
	
	 var sort_field=$("#sort_field").val();
	 var sort_field_value=$("#sort_field_value").val();
	 var object1={"connector":gocallthis,"page":pageno,"sort_field":sort_field,"sort_field_value":sort_field_value};
	
	if(object_search!="" && filter_val!="")
	{
		var data_object = $.extend({}, object1, object_search,object_filter);
	}
	else if(object_search=="" && filter_val!="")
	{
		var data_object = $.extend({}, object1,object_filter);
	}
	
	else if(object_search!="" && filter_val=="")
	{
		var data_object = $.extend({}, object1,object_search);
	}
	else
	{
		var data_object=object1;
	}
	
	if(conditional_val!="")
	{
		var data_object_final=$.extend({}, data_object,object_con_colums);;
	}
	else
	{
		var data_object_final=data_object;
	}
		
$('.dizzilist-block').append('<div id="cf_loader"><span class="cf_spin_wrap"></span></div>');
  $.ajax(
    {
      type: "POST",
      dataType: 'json',
      cache: false,
      url: "clientside/socket/call.php",
      data: data_object_final || [],
      success: function(data) {
        if (data.RESULT == 'OK')
        {
		          $("#cf_loader").remove();
				  window.location.href=data.url;

		
		} else
        {
          console.log("nothing found");
          $("#cf_loader").remove();
		  alert(data.MSG);
        }
      }
    }); 
		  
		  
		  
}
function dizzi_exporter_merit(pageno,gocallthis)
{
	//$('#retrieved-data').html('<p><img src="assets/images/bx_loader.gif" /></p>');        
	//$('#retrieved-data').load( targetURL ).hide().fadeIn('slow');
	var sb_str=$("#class_sel").val();
	var sb=$("#acd_year_sel").val();
	if(sb_str!="" && sb!="")
	{
	var cat=$("#category").val();
	if(sb!="" && sb_str!="" && cat!="")
	{
		var apnd="&sb="+sb+'&sbv='+sb_str+'&cat'+cat;
		var object_search={"sb":sb,"sbv":sb_str,"cat":cat};
	}
	else
	{
		var apnd='';
		var object_search=''
	}
	
	var filter_val=$("#filters").val();
	var sort_colums_val=$("#sort_colums").val();
	if($("#conditional_val").length)
	{
		var conditional_val=$("#conditional_val").val();
	}
	else
	{
		var conditional_val='';
	}
	
	if(filter_val!="")
	{
	var object_filter=jQuery.parseJSON( filter_val )
	}
	if(sort_colums_val!="")
	{
	var object_sort_colums=jQuery.parseJSON( sort_colums_val )
	}
	if(conditional_val!="")
	{
	var object_con_colums=jQuery.parseJSON( conditional_val )
	}
	
	 var sort_field=$("#sort_field").val();
	 var sort_field_value=$("#sort_field_value").val();
	 var object1={"connector":gocallthis,"page":pageno,"sort_field":sort_field,"sort_field_value":sort_field_value};
	
	if(object_search!="" && filter_val!="")
	{
		var data_object = $.extend({}, object1, object_search,object_filter);
	}
	else if(object_search=="" && filter_val!="")
	{
		var data_object = $.extend({}, object1,object_filter);
	}
	
	else if(object_search!="" && filter_val=="")
	{
		var data_object = $.extend({}, object1,object_search);
	}
	else
	{
		var data_object=object1;
	}
	
	if(conditional_val!="")
	{
		var data_object_final=$.extend({}, data_object,object_con_colums);;
	}
	else
	{
		var data_object_final=data_object;
	}
		
$('.dizzilist-block').append('<div id="cf_loader"><span class="cf_spin_wrap"></span></div>');
  $.ajax(
    {
      type: "POST",
      dataType: 'json',
      cache: false,
      url: "clientside/socket/call.php",
      data: data_object_final || [],
      success: function(data) {
        if (data.RESULT == 'OK')
        {
		          $("#cf_loader").remove();
				  window.location.href=data.url;

		
		} else
        {
          console.log("nothing found");
		  alert(data.MSG);
          $("#cf_loader").remove();
        }
      }
    }); 
		  
	}
	else
	{
		alert("Class and Year Must be Selected");
	}
		  
}
