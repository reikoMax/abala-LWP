<?php
	session_start();
	include 'DAO/FunctionDAO.php';	

	if(isset($_REQUEST['username']) && isset($_REQUEST['password'])){
		$LogIn = new FunctionDAO();
		$verrified = $LogIn->LogInUser($_REQUEST['username'],$_REQUEST['password']);		
		if($verrified){
			$_SESSION['username']=$_REQUEST['username'];
			header('Location: user_interface.php');			
		}else{
			$errMsg = "Unknown User!";
		
			
			
		}
	}
?>


<!DOCTYPE html>
<html>
<head>
	<link rel="shortcut icon" href="./img/leyte_seal.jpeg">
<title>LeyTe WeB PoRtAL</title>
	<meta charset="utf-8"/>
<script src="./js/jquery.js"></script>
<script src="./js/jquery-ui.js"></script>
<script src="./js/index.js"></script>
<script src="./js/slider.js"></script>
<script src = "./js/jquery-ui-1.9.0.custom.min.js"></script>
	<link rel="stylesheet" href="./css/bootstrap.min.css" style="text/css" />
	<link rel="stylesheet" href="./css/jquery-ui1.css" style="text/css" />
	<link rel="stylesheet" href="./css/index.css" style="text/css"/>
	<link rel="stylesheet" href="./css/reset.css" style="text/css"/>
</head>
<body>

<?php
 include 'class/header.php';
?>

<div class="wrapper">
<div class="menu_tabs" id="menu_tabs">
<div class="tabs" id="tabs">
   <ul>
      <li><a href="#home"><span>Home</span></a></li>
      <li><a href="#about_us_tab"><span>About Us</span></a></li>
      <li><a href="#maps_pics_tab"><span>Maps & Pictures</span></a></li>
      <li><a href="#fiesta_tab"><span>Fiesta And Events</a></span></li>
   </ul>
</div><!--tabs-->
   </div><!--menu_tabs-->
   <div class='BodyContent'>
   
			<fieldset class='BodyContent_field'>
				<h1>LeyTe WeB PoRtAL</h1>
				<div id="home" class="tabContent">
				<p>
				<img src="./img/tacloban.jpg"  alt="tacloban City"/>  
				<p id="introduction">
				<b> <strong>The City of Tacloban</strong></b>(Waray: Syudad han Tacloban, Tagalog or Filipino: Lungsod ng Tacloban) is located approximately 360 miles (580 km) southeast of Manila. It is the first city in Eastern Visayas to be classified as "highly urbanized." It is the former capital of the Philippine province of Leyte, and is the largest city in terms of population[4] in Eastern Visayas. It is also the regional center of the Region VIII. Tacloban was briefly the seat of the Philippine Commonwealth Government, from 20 October 1944 to 27 February 1945.<br />
                        </p>

In an extensive survey conducted by the Asian Institute of Management Policy Center and released in July 2010, Tacloban City was ranked among the top ten most competitive cities in the Philippines. Tacloban ranked fifth overall, and second in the emerging cities category.
        <h3>History</h3>

   <p>Tacloban was first known as Kankabatok, an allusion to the first inhabitants of the place – Kabatok. They established their dwelling in the vicinity of the present day Sto. Niño Church. Others who came later were Gumoda, Haraging and Huraw who erected their own settlements in nearby sites. Huraw’s domain is the hill where the city hall now sits. The combined settlements acquired the name Kankabatok, meaning Kabatok’s property.

By the end of the 16th century, Kankabatok was under the political administration of Palo and part of the parish of Basey, Samar. It was discovered in 1770, by the Augustinian Mission, who were superseded by the Franciscans in 1813. During this period, Kankabatok was renamed to Tacloban.</p>
	<img src="./img/welcome_to_samar.jpg" alt="Samar" id="samar" ><h2>SAMAR</h2>
	<p>Many names (Samal, Ibabao, Tandaya) were given to Samar Island prior to the coming of the Spaniards in 1596.  The name Samar was derived from the local dialect “samad”, meaning wound or cut, which aptly describes the rough physical features of the island that is rugged and deeply dissected by streams.

During the early days of Spanish occupation, Samar was under the jurisdiction of Cebu.  In 1735, Samar and Leyte were united into one province with Carigara, Leyte as the capital town and again Samar became a separate province in 1768.</p>

				
				
				</div>
				  <div id="about_us_tab" class="tabContent">
				  <p>
								<h2>ABOUT US<h2>
			<p>Description:  Help to promote tourism in our region .you can find  list where you can find most suggested places that you can go in our region.</p>
		             <p>   Features:</p>
			<p>Log-in /Registration system
			-users who want to contribute in the system must register and log-in.
			the user can freely add events that are happening and will happen and places that are well known in a specific place in Tacloban and Leyte.they can edit and delete the data they enter.
			This system can be use by the user as promoting an event.
			Thus this system can give you list that other users enter in our database.unlike the phonebook System  which the data you can see is the data you only  enter in your account.</p>

						<p>Future Features:</p>
				<p>the users can upload pictures which can be saved in the database and  can retrieve in the database.
				The users can upload videos of the places they traveled,to share their experience.</p>

				</p>
				  </div><!--Hang_outs_tab-->
				  
				  
				  <div id="maps_pics_tab" class="tabContent">
				  	<p>
				  		<h2><strong>The Twin Islands Of The Pacific</strong></h2>
				  		<p>Both provinces have great history but there’s very few written about it online.

John and I was given the chance to see both during our Philippine Road Trip. Yes, we did this on our own, with John driving. Of course, we slept in hotels at nights and start again after breakfast. Never have we felt unsafe on the road despite the fact that the place had a lot of undeveloped area. Honestly, that’s what gave Samar and Leyte its mystique. Their untouched beauty.

I saw beautiful sea and mountain landscapes that makes the Philippines a great place for a vacation, specially if one’s purpose is to enjoy nature at its best.

More than that, both provinces like I said have rich history. In fact, artifacts like ceramics, gold jewelries, large earthware jars have been found there. It is believed to be coming from traders in Siam , Vietnam and China which dates back to as far as the 13th century.</p>
				<div id="slideshow">

					<ul class="slides">
				    	<li><img src="./img/sanjuanico.jpeg" width="620" height="320" alt="Marsa Alam underawter close up" /></li>
				        <li><img src="./img/fiesta.jpeg" width="620" height="320" alt="Turrimetta Beach - Dawn" /></li>
				        <li><img src="./img/niyog.jpeg" width="620" height="320" alt="Power Station" /></li>
				        <li><img src="./img/santo nino.jpeg" width="620" height="320" alt="Colors of Nature" /></li>
				        <li><img src="./img/sea.jpeg" width="620" height="320" alt="Sea of Leyte" /></li>
				        <li><img src="./img/seashore.jpg" width="620" height="320" alt="Leyte's Seashore" /></li>
				    </ul>

				    <span class="arrow previous"></span>
				    <span class="arrow next"></span>
				</div>
				<div id="introduction">
					<h2>Leyte</h2>
					<p>The east Visayan island of Leyte (“LAY-tay”), separated from Samar to the north by a mere slither of ocean, the San Juanico Strait, is another sizeable chunk of the Philippines that has a great deal to offer visitors but is often overlooked. You could spend months on this island and still only scratch the surface: the coastline is immense, the interior rugged and there are lakes and mountains that are well off the tourist map, known only to farmers who have tilled their shores and foothills for generations.

In the sixteenth century, Magellan passed through Leyte on his way to Cebu, making a blood compact with the local chieftain as he did so. But to many Filipinos and war historians, Leyte will always be associated with World War II, when its jungled hinterlands became the base for a formidable force of guerrillas who fought a number of bloody encounters with the Japanese. It was because of this loyalty among the inhabitants that General Douglas MacArthur landed at Leyte on October 20, 1944, fulfilling the famous promise he had made to Filipinos, “I shall return.”

Around the provincial capital of Tacloban, the usual arrival point, there are a number of sights associated with the war, notably the Leyte Landing Memorial, marking the spot where MacArthur waded ashore to liberate the archipelago. To the north of Tacloban is the beautiful island of Biliran and, a short bangka ride away from Biliran, the islands of Maripipi and Higatangan, which both have terrific beaches, rock formations and caves. To the south of Ormoc the coastal road takes you through Baybay and Maasin, both ferry ports, before reaching Padre Burgos, renowned for its scuba diving. Off the southern tip of Leyte is Limasawa Island, an isolated outcrop where some believe Magellan conducted the first Catholic Mass in the Philippines.</p>

<p>Read more:<a href="http://www.roughguides.com/destinations/asia/philippines/visayas/leyte/#ixzz2UZ5mLYyx">http://www.roughguides.com/destinations/asia/philippines/visayas/leyte/#ixzz2UZ5mLYyx</a></p>

				</div><!--introduction-->
				  
				</p>					  
					</div><!--maps_pics_tabs-->
					
					
				   <div id="fiesta_tab" class="tabContent">
				   							<h2>Let'S FiEsTA</h2>
				   						<button id="local_events" class="btn-primary">What's Going On ?</button><br />

				   	<p><strong>Leyte</strong> are rich in traditions which they celebrated here are an all year round date of events here in <strong>Leyte</strong></p>
				   		<table id="fiesta_list" class="table">
				   			<thead>
				   			<th>Name Of Fiesta</th>
				   				<th>Location</th>
				   				<th>Date(when will be held)</th>
				   				<th></th>
				   			</thead>
				   		<tbody id="fiesta_body"></tbody>
				   			</table>
				
			</fieldset><!--BodyContent_field-->
			<?php 
			include 'class/footer.php';
				?>
			<div><!--BodyContent-->

<div id='log_in_div' title='Log-In Form'>
		<p class='status'>
			<?php 
				if(isset($errMsg)){
					echo $errMsg;
				}
			?>
		</p>
			<div class='log-in_Cont'>
				<form action='index.php' method='POST'>
					<p>			
						<label for='username'>Username:</label>
						<input type='text' id='username' name='username' placeholder="Username" />
					</p>
					<p>
						<label for='password'>Password:</label>
						<input type='password' id='password' name='password'  placeholder="Password" />
					</p>
						<input type='submit' value='Log-In' class="btn btn-info"/>
				</form>
				
			</div><!--log_in_Cont-->
<div id="register_div" title='ReGisTrAtIoN FoRm'>
		<legend>ReGisTrAtIoN FoRm</legend>
		<form id="registr<fieldset>ation_form">
		<fieldset>
		<p>Name:<input type="text" name="firstname" id="firstname" placeholder="Firstname" /></p>
		<p>Last Name:<input type="text" name="lastname" id="lastname" placeholder="Lastname" /></p>
	 	<p>Address:<input type="text" name="address" id="address" placeholder="Address" /></p>
		<p>Contact Info:<input type="text" name="contact_info" id="contact_info" placeholder="Contact Info" /></p>
		<p>Email:<input type="text" name="email" id="email" placeholder="Email Address" ></p>
		<p>Username:<input type="text" name="register_username" id="username" placeholder="Username" /></p>
		<p>Password:<input type="password" name="register_password" id="password" placeholder="Password" /></p>
		<p>ReType-Password:<input type="password" name="retype-password" id="retype-password" placeholder="Retype-Password" />
			<p id ="password_mismatched">Password didn't matched! Please try again.</p>
			<p id ="invalid_information">Please check and fill up the required information. Thank you!</p>
			<br />
			<br />
			<button type="submit" value="submit" id="submit_button" class="btn btn-info">Submit</button>
		</form>
	</fieldset>
</div><!--register_div-->
<div id = "registration_finished" title = "CONFIRMATION"><span>>Congratulations! You're already registered </span>.
</div><!--registration_finished-->
<!--<div id="admin_div">
	<form action="sign_in_admin">
		<p>
		<label for='admin_username'>Username:</label>
			<input type='text' id='admin_username' name='admin_username' placeholder="Username" />
		</p>
		<p>
		<label for='username'>Username:</label>
			<input type='text' id='admin_password' name='admin_password' placeholder="Password" />
		</p>
		<button id="admin_btn" class="btn btn-info">Sign In </button>
	</form>
	</div>--><!--admin_div-->
   </div><!--wrapper-->

</body>
</html>
