<?php
include 'DAO/FunctionDAO.php';

$search=$_POST['search'];

$action=new FunctionDAO();
$action->search_name($search);
?>