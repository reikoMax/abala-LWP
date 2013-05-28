$(document).ready(function(){
  autoDisp();
  dataDisp();
  census();
  $("#users_census").hide();
/*---------------------tabs------------------------------*/
  $("#BodyContent div").hide(); // Initially hide all content
  $("#tabs li:first").attr("id","current"); // Activate first tab
  $("#BodyContent div:first").fadeIn(); // Show first tab content
    
   $('#tabs a').click(function(e) {
        e.preventDefault();
        if ($(this).closest("li").attr("id") == "current"){ //detection for current tab
         return       
        }
        else{             
        $("#BodyContent div").hide(); //Hide all content
        $("#tabs li").attr("id",""); //Reset id's
        $(this).parent().attr("id","current"); // Activate this
        $('#' + $(this).attr('name')).fadeIn(); // Show content for current tab
        }
    });
   /*----------------display data----------------------*/
   function dataDisp(){
        $.ajax({
            type:"POST",
            url:"view_data.php",
            succes:function(data){
              $("#dataViewer").append(data);
               
            },
            error:function(data){
              alert(data);
            }
        });

      }
   function autoDisp(){
     $.ajax({
                 type:"POST",
                 url: "viewindex.php",
                 success: function(data){
                    $("#usersViewer").append(data);
                 },
                 error: function(data){
                    alert("sayop");           
                 }

              });
     
     }
    $("#count_btn").click(function(){
        $("#users_census").dialog({
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
     function census(){
      $.ajax({
        type:"POST",
        url:'user_count.php',
        success:function(data){
          $("#users_census").append(data);
        },
        error: function(data){
          alert("sayop");
        }
      });
     }
      
    
      
     
  
     
});