<?php
	include "DAO/FunctionDAO.php";
	$select_input=$_POST['select_input'];
	$action= new FunctionDAO();
	
	$action->option_search($select_input);


?>