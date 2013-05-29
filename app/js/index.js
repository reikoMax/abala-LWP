
	 $(document).ready(function(){
	 $("#password_mismatched").hide();
	 $("#invalid_information").hide();
	 $("#registration_finished").hide();	
	 $("#register_div").hide();	
	 $("#user_greeting").hide();
	 $("#log_in_div").hide();
	   view_festivals();

	 /*-------------------tabs------------------------*/
	$(".tabContent").hide(); 
	$(".tabContent:first").show();
	$("#tabs ul li a").click(function(){ //Fire the click event
	 var activeTab =$(this).attr("href"); // Catch the click link
	 $(".BodyContent ul li a").removeClass("active"); // Remove pre-highlighted link
	 $(this).addClass("active"); // set clicked link to highlight state
	 $(".tabContent").hide(); // hide currently visible tab content div
	 $(activeTab).fadeIn(); // show the target tab content div by matching clicked link.
	});

	/*-----------------log_in_dialog---------------------------------------*/
	$("#log_in").click(function(){
		$('#log_in_div').dialog({
			show:"bounce",
			hide:"bounce",
			heigth: 200,
			width: 350,
			dragable: false,
			resizable: false,
	        modal: true,
	        buttons:{
	        	"Cancel":function(){
	        		$(this).dialog("close");
	        	}
	        }
		
		})
	});
	/*--------------------------admin_sign_in_dialog------------------------------------------*/
	$("#admin").click(function(){
		$('#admin_div').dialog({
			show:"bounce",
			hide:"bounce",
			heigth: 200,
			width: 350,
			dragable: false,
			resizable: false,
	        modal: true,
	        buttons:{
	        	"Cancel":function(){
	        		$(this).dialog("close");
	        	}
	        }
		
		})
	});
	
/*--------------------register_dialog---------------------------------------------*/

	$("#register").click(function(){
		$('#register_div').dialog({
			show:"bounce",
			hide:"bounce",
			heigth: 500,
			width: 500,
			dragable: false,
			resizable: false,
	        modal: true,
	        buttons: {

					"Close": function(){
					$(this).dialog("close");
					}
				}
		
		});
	});
	  
		function view_festivals(){
		 	$.ajax({
		 		type:"POST",
		 		url:"view_fiesta.php",
		 		success:function(data){
		 			$("#fiesta_body").append(data);
		 		},
		 		error:function(data){
		 			alert(data);
		 		}
		 	});
		 }
		 $("#local_events").click(function(){
		 	 $.ajax({
		 	 		type:"POST",
		 	 		url:"view_events.php",
		 	 		success:function(data){
		 	 			$("#fiesta_body").empty().append(data);
		 	 		},
		 	 		error:function(data){
		 	 			alert(data);
		 	 		}
		 	 });
		 });
		/*-------------register_add------------------------------------*/
		$("#submit_button").click(function(){
			  var obj={"firstname":$("input[name='firstname']").val(),
	                "lastname" :$("input[name='lastname']").val(),
	                "address" :$("input[name='address']").val(),
	                "contact_info" :$("input[name='contact_info']").val(),
	                "email" :$("input[name='email']").val(),
	                "username" :$("input[name='register_username']").val(),
	                "password" :$("input[name='register_password']").val(),
	                "retype-password" :$("input[name='retype-password']").val()};
	              $.ajax({
	              	type:'POST',
	              	url:'add_user.php',
	              	data:obj,
	              	sucess:function(data){
	              		if(data=="null"){
	              			alert("Warning: please check if your password match and complete all fields ");
					      
				}else{					
					alert("Congratsulations!You have successfully register!");

				}
	              	},
	              	error:function(data){
	              		alert(data);
	              	}
	              });
	         });
		
	});

		
		