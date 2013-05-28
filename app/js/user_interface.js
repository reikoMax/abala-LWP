$(document).ready(function(){
   autoDisp();
   listDisp();
   view_events();
   profile();
   $("#edit_form").hide();
   $("#profiles").hide();
  $("#status").hide();
  $("#alert_confirmation").hide();
  $("#notification_div").hide();
  $("#list_div").hide();
  $("#add_events_div").hide();
  $("#events_list_div").hide();
  $("#date").datepicker({dateFormat:"yy-mm-dd", howAnim: "slide", showOn: "both"});
  $('#search_image').click(function(){
    doSearch();
  });
  //Keypress event to see if enter was pressed in text input
  $('#search_name').keydown(function(e){
      if(e.keyCode == 13){
        doSearch();
      }
  });
/*-----------------------------add_data------------------------------------*/
     $("#btn_submit").click(function(){
      var obj={ "places_id":$("input[name='places_id']").val(),
        "place_name":$("input[name='place_name']").val(),
                "place_location" :$("input[name='place_location']").val(),
                "place_description" :$("textarea[name='place_description']").val(),
                "place_classification" :$("select[name='place_classification']").val()};

     	$.ajax({
     		type:"POST",
     		url:"add_validation.php",
     		data:obj,
     		success:function(data){
     			var trial=confirm('ARE YOU sure?');
     			if(trial){
     				alert("success adding!"); 
		      		$(".listViewer").append(data);
		 		
     			}
     		},
     		error:function(data){
              alert(data.error);

     		}

     	});
    
     	
     });
     $("#ok_btn").click(function(){
        var mostpap="most popular";
        var all="all";
        var obj={"select_input":$("select[name='select_input']").val()};
      if(obj===mostpap){
        alert("hello");
      }else if(obj===all){
          listDisp();
          autoDisp();
        }else{
          $.ajax({
            type:"POST",
            url:"select_search.php",
            data:obj,
            success:function(data){
              $('#view').empty().append(data);

            },
            error:function(data){

            }
          });
        }
        
     });
     $("#notification_btn").click(function(){
      $("#notification_div").dialog({
              show:"slidedown",
              hide:"puff",
              heigth:200,
              width:350,
              dragable:false,
              resizable:false,
              modal: true,
              buttons:{
                "Cancel":function(){
                $(this).dialog("close");
            }
          }

      });


     });
     $("#viewlisted_btn").click(function(){
        $("#list_div").dialog({
            show:"explode",
              hide:"explode",
              heigth:350,
              width:550,
              dragable:false,
              resizable:false,
              modal: true,
              buttons:{
                "Cancel":function(){
                $(this).dialog("close");
            }
          }

        });

     });
     $("#events_btn").click(function(){
      $("#add_events_div").dialog({
             show:"explode",
              hide:"explode",
              heigth:350,
              width:550,
              dragable:false,
              resizable:false,
              modal: true,
              buttons:{
                "Cancel":function(){
                $(this).dialog("close");
            }
          }
      })
     });
     $("#events_save_btn").click(function(){
      alert("success!");
          var obj={"event_name":$("input[name='event_name']").val(),
                    "organizer":$("input[name='organizer']").val(),
                    "people":$("input[name='people']").val(),
                    "event_date":$("input[name='event_date']").val(),
                    "event_held":$("input[name='event_held']").val(),
                    "id":$("input[name='id']").val()};
            $.ajax({
                    type:"POST",
                    url:"add_events.php",
                    data:obj,
                    success:function(data){
                      alert("success");
                      },
                      error:function(data){

                        alert(data.error);
                      }
               });
     });
     $("#view_events").click(function(){
      $("#events_list_div").dialog({
              show:"explode",
              hide:"explode",
              heigth:500,
              width:1000,
              dragable:false,
              resizable:false,
              modal: true,
              buttons:{
                "Cancel":function(){
                $(this).dialog("close");
            }
          }
      });
     });
   
     function view_events(){
      $.ajax({
        type:"POST",
        url:"view_events.php",
        success: function(data){
          $("#events_list_viewer").append(data);
        },
        error:function(data){
          alert(data);

        }


      });
     }
    
     $("#profile_btn").click(function(){
        $("#profiles").dialog({
           show:"explode",
              hide:"explode",
              heigth:500,
              width:1000,
              dragable:false,
              resizable:false,
              modal: true,
              buttons:{
                "Cancel":function(){
                $(this).dialog("close");
            }
          }

        });
      
     });
     function profile(){
     $.ajax({
          type:"POST",
          url:"viewprofile.php",
          success:function(data){
            $("#myprofiles").append(data);
          },
          error:function(data){

          }
        });
   }
  $('#search').keyup(function(){
    var searchObj = {"search":$(this).val()};
    $.ajax({
      type: "POST",
      url: "search.php",
      data: searchObj,
      success: function(data){
        console.log(data);
        $(document.getElementById("view")).html(data);
      },
      error: function(data){
        alert(data);
      }
    });
  });




});
/*---------------------------outside the $(Document) function------------------------------------*/
/*----------------------usersfunction------------------------*/ 
 function user_delete(id){
      var obj={'id':id};
      var con=confirm('Are YOu Sure You Want To Delete This Data?');
      if(con==true){
         $.ajax({
          type:"POST",
          data:obj,
          url: "user_deletedata.php",
          success: function(data){
            alert('data has been terminated .. .. 3:)');
			$(document.location.reload(true));
          },
          complete:function(data){
         	/*else{
         			alert('data deleting failed!!! insufficient balance .. ..');
         	} */
          },
        error:function(data){
          alert("sayop " + data);
        }

      });
     }
   }
   function user_edit(id){
      var obj={'id':id};
      $("#edit_form").dialog({
        hide:"bounce",
        show:"fold",
        height:500,
        width:350,
        draggable:false,
        resizable:false,
        modal:true,buttons:{
          "Cancel":function(){
            $(this).dialog("close");
          }
        }
      });
      
   }
   function like(id){
    var obj={'id':id};
    var ctr=1;
    var like;
    if(obj){
      $.ajax({
      type:'POST',
      url:'likes.php',
      data:obj,
      success:function(data){
          alert("success");
        like =ctr++;
           alert(like);

      },
      error:function(data){

      }
          });


    }
    
   }
   
   function accept_event(id){
   	var obj={'id':id};
   	var con=confirm("Confirmation will be sent to the organizer!");
   	$.ajax({
   	type:"POST",
   	url:"accept.php",
   	data:obj,
   	success:function(data){
   		$("#messages").append(data);
   		alert("success!");
   		
   	},
   	error:function(data){
   		alert(data);
   	}
   		
   	});
   }
   function view_notification(){
    $.ajax({
      type:"POST",
      url:"view_notifications.php",
      success:function(data){
        $("#messages").append(data);

      },
      error:function(data){
        alert(data);
      }
    });
   }

  
/*------------------------viewing_data--------------------------------*/
 function autoDisp(){
     $.ajax({
                 type:"POST",
                 url: "view.php",
                 data:{data:JSON.stringify($("#add_places").serializeArray())},
                 success: function(data){
                    $(".listViewer").append(data);
                 },
                 error: function(data){
                    alert("sayop");           
                 }

              });
     
     }
 function listDisp(){
     $.ajax({
                 type:"POST",
                 url: "viewAll.php",
                 success: function(data){
                    $("#view").append(data);
                 },
                 error: function(data){
                    alert("sayop");           
                 }

              });
     
     } 
     /*-----------------------------------search----------------------------------------*/
     
     
  /*$("#settings_profile").dialog({
    show:"bounce",
    hide:"puff",
    resizeble:false,
    modal:true,
    width:550,
    buttons{
      "Back":function(){
        $(this).dialog("close");
      }
    }

  });

});*/
/*$("#search_image").keyup(function(){
  var obj={"search_name":$("input[name='search_name']").val()};
  $.ajax({
    type:"POST",
    url:"search.php",
    data:obj;
    success:function(data){
      $("#view").append(data);
    },
    error:function(data){

    }

  }
});*/
