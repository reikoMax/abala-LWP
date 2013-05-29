<?php
	session_start();
	 

	if(!isset($_SESSION['username'])){
	 header('Location: index.php');
	 
	}else{
		$username = $_SESSION['username'];
	} 
?>
<!DOCTYPE html>
<html>
<head>
 	<meta charset="utf-8"/>
	<link rel="shortcut icon" href="./img/leyte_seal.jpeg">
 	<title>LeyTe WeB PoRtAL</title>
	<link rel="stylesheet" href="./css/bootstrap-datetimepicker.min.css" style="text/css" />
	<link rel="stylesheet" href="./css/jquery-ui1.css" style="text/css" />
	<link rel="stylesheet" href="./css/bootstrap.min.css"  style="text/css" />
	<link rel="stylesheet" href="./css/bootstrap-responsive.css"  style="text/css" />
	<link rel="stylesheet" href="./css/user_interface.css"  style="text/css" />
	<link rel="stylesheet" href="./css/jquery-ui-timepicker-addon.css"  style="text/css" />
<script src="./js/jquery.js"></script>
<script src="./js/jquery-ui.js"></script>
<script src="./js/index.js"></script>
<script src="./js/user_interface.js"></script>
<script src="./js/bootstrap-datetimepicker.min.js"></script>
<script src="./js/jquery-ui-1.9.0.custom.min.js"></script>
<script src="./js/jquery-ui-timepicker-addon.js"></script>
</head>
<body >
<div id="wrapper">
	<?php
 	include 'class/header_user_interface.php';
	?>

	<h1>Welcome  <span id ="username"><?php if(isset($username)){ echo $username; }?></span>.<h1>
<div id="wrapper">
		<div class="tabs" id="tabs">
   			<ul>
      			<li class="home"><a href="#home">Home</a></li>
      			<li class="data"><a href="#data">Add</a></li>
      			<li class="profiles"><a href="#settings_profile">Messages&Profiles</a></li>
     
   			</ul>
   	</div><!--tabs-->
   	<div class="BodyContent">
   		<fieldset class="BodyContent_field" id="BodyContent_field">
   			<h2>LeyTe WeB PoRtAL</h2>
   	<div id="tabContents">
   		<div id="home" class="tabContent">
   			<p>
   			 Others users added suggestion of places<br /> 
   			 </p>
   			 <div class="input-append">
   			<select name="select_input">
 				 <option value="most popular">Most Popular</option>
				 <option>Hotels</option>
  				 <option>Beaches</option>
  				 <option>Restaurants</option>
  				 <option>Adventure</option>
  				 <option>Others</option>
  				 <option>All</option>
			</select>
			<button id="ok_btn" class="btn btn-info">Select</button>
		</div><!--input-append-->
			<p>
				<input type='text' id='search' name='search_name' placeholder="Search" class="input-medium search-query" /><img src="img/search.png" id="search_image" />
			</p>
						
			<center>
			<div class="view">
			<table id="places_tbl" class="table">
				<thead>
					<th scope="col">Name</th>
					<th scope="col">Location</th>
					<th scope="col">Description</th>
					<th scope="col">Classification</th>
			        <th scope="col"></th>
				</thead>
				<tbody id="view"></tbody>
			</table><br />
	
		</center>
		<iframe width="450px" height="350"
 frameborder="0" scrolling="no"
 marginheight="0" marginwidth="0"
 allowtransparency="true"
 src="http://chatroll.com/embed/chat/icotp-ict-tambayan?id=Ds8347ZRhG1&platform=blogger&w=$0">
 </iframe>
 <br/>
 <div style="font-size:0.9em;text-align:center;">
 <a href="http://chatroll.com/">Blogger Chat</a></div>



	</div><!--search-->

   		    
   			</p>
   			</div><!--home-->
    <div id="data" class="tabContent">
    	<div id="options_menu">
    	<button id="viewlisted_btn" class="btn btn-success" data-toggle="modal" data-target="#list_div">View Data</button>
    	<button id="events_btn" class="btn btn-warning">Add Events</button>
    	<button id="view_events" class="btn btn-primary">View Events</button>
    	 </div><!--options_menu--><br />
    	 <br />
    	<fieldset name="add" title="ADD PLACES" id="places_div">
    	<form id="add_places" name="data">		
    	<legend>ADD PLACES</legend>	
						<label for='place_name'>Place Name:</label>
						<input type='text' id='place_name' name='place_name'  placeholder="Name"/>
					
				
						<label for='location'>Location:</label>
						<input type='text' id='place_location' name='place_location' placeholder="Location" />
					
								
						<label for='place_description'>Place Description:</label>
						<textarea id='place_description' name='place_description'  placeholder="Description"></textarea><br />
					
						<label for='place_classification'>
						<select name="place_classification">Place Classification</label>
							 <option>Hotels</option>
			  				 <option>Beaches</option>
			  				 <option>Restaurants</option>
			  				 <option>Adventures</option>
			  				 <option>Others</option>
						</select>
					<input type="hidden" name="places_id"/>
					<br />
					
						<button type='submit' value='submit' id="btn_submit" class="btn btn-info">Submit</button>

    	 </form>

    	</fieldset>
    
    </div><!--data-->
   
    <div id="maps_places" class="tabContent">
				  	
	</div><!--list-->
	<div id="settings_profile" class="tabContent">
		<button id="notification_btn" class="btn btn-danger">Message Notifications</button>
		<button id="profile_btn" class="btn btn-primary" ><i class="icon-user"></i>Profile</button>
		<div id="profiles" title="My Profiles">
			<img src="./img/baybayview.jpg" id="baybay" />
			<div id="myprofiles">

			</div><!--myprofiles-->
	</div><!--profiles-->
	</div><!--settings_profile-->  
	<div id="notification_">    
  </fieldset><!--BodyContent_field-->
    </div><!--tabContent-->
   </div><!--BodyContent-->
</div><!--wrapper-->
<!----------------------------------------DIALOGS HIDDEN------------------------------------------------------------------------------>
<div id="edit_form">
	<fieldset name="add" title="ADD PLACES">
    		<legend>Add Places</legend>
    	<form id="add_places" name="data">			
			<label for='place_name'>Place Name:</label>
			<input type='text' id='place_name' name='edit_place_name'  placeholder="Name"/>
					
				
			<label for='location'>Location:</label>
			<input type='text' id='place_location' name='edit_place_location' placeholder="Location" />
					
								
			<label for='place_description'>Place Description:</label>
			<input type='text' id='place_description' name='edit_place_description'  placeholder="Description"/>
					
								
			<label for='place_classification'>Place Classification:</label>
			<input type='text' id='place_classification' name='edit_place_classification' placeholder="Classification" />
					
					<input type="hidden" name="places_id"/>
					<br />
					
						<button type='submit' value='submit' id="btn_submit" class="btn btn-info">Submit</button>
    	 </form>
    	</fieldset>
    	<div id="notification_div" title="Notifications">
    		<blink><span>Notifications</span></blink>
    		<div id="messages">
    		</div><!--messages-->

    	</div><!--messages-->
	</div>
	<div id="list_div" title="The places you saved">
				  	<center>
				      <table id="listTbl" class="table table-hover">
					    <th scope="col">Name Of Place</th>
						<th scope="col">Location</th>
						<th scope="col">Description</th>
						<th scope="col">Classifacation</th>
						<th scope="col"></th>
						<th scope="col"></th>
					<tbody class='listViewer'></tbody>					
				</table>
			</center>
	</div><!--list-->
	<div id="add_events_div" title="Events">
		<fieldset id="events">
		<form>
		<label for="What">What is the event about:</label>
		<input type="text" id="event_name" name="event_name" placeholder="Event" />

		<label for="Who">Who organized the said event:</label>
		<input type="text" id="organizer" name="organizer" placeholder="Organizer"/>

		<label for="people">Who is invited in this event:</label>
		<input type="text" id="people" name="people" placeholder="Invited people"/><br />
		
		<label for="when">When will the event be held:</label>
		<input type="text" name="event_date" id="date" placeholder="Date"/>

		<label for="where">Where will it be held</label>
		<input type="text" id="event_held" name="event_held" placeholder="Place" />	

		<input type="hidden"  id="id" name="id" />
			</br>
			<button type="submit" value="submit" id="events_save_btn" class="btn btn-info">Save</button>
		</form>
	</fieldset><!--events-->
	</div><!--add_events_div-->
	<div id="events_list_div" title="Whats Going On?">
				  	<center>
				      <table id="eventsTbl" class="table table-hover">
					    <th scope="col">Events Name</th>
						<th scope="col">Organizer</th>
						<th scope="col">People</th>
						<th scope="col">Date</th>		
						<th scope="col">Place Held</th>
						<th scope="col">Date Posted</th>
						<th scope="col"></th>
						<th scope="col"></th>
					<tbody id='events_list_viewer'></tbody>					
				</table>
			</center>
	</div><!--list-->
	<?php
   		include 'class/footer.php';
  	 ?>
  	 </div><!--wrapper-->
</body>
</html>
