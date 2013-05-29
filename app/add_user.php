<?php
	
	include "DAO/FunctionDAO.php";
	
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$address = $_POST['address'];
	$contact_info = $_POST['contact_info'];
	$email = $_POST['email'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$retyped_password = $_POST['retype-password'];
	
	if($password==$retyped_password && $firstname!="" && $lastname!="" && $address!="" && $contact_info!="" && $email!="" && $username!="" && $password!="" ){ 
    $execute_add = new FunctionDAO();
	$execute_add->add_user($firstname,$lastname,$address,$contact_info,$email,$username,$password);

	}else{
		echo "null";
	}

	
	
?>
