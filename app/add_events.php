<?php
session_start();
include 'DAO/FunctionDAO.php';
	$username = $_SESSION['username'];
	$event_name = $_POST['event_name'];
	$organizer = $_POST['organizer'];
	$people = $_POST['people'];
	$event_date = $_POST['event_date'];
	$event_held = $_POST['event_held'];
	$id=$_POST['id'];
		
		if ($event_name != "" && $organizer != "" && $people != "" && $event_date !="" && $event_held != "" &&  $username!=""){
			$action = new FunctionDAO();
			$action -> add_events($id,$event_name,$organizer,$people,$event_date,$event_held,$username);	
			
		}else{
			echo "f";
	
		};
		
	
?>
