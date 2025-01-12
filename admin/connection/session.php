<?php
//Start session
	session_start();
	session_regenerate_id();
	// var_dump($_SESSION);
	// exit;
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) {
		header("location: index.php");
		exit();
	}
        $id_session=$_SESSION['id'];

?>