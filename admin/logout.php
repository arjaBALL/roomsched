<?php 
include('./connection/session.php'); 
include('./connection/dbcon.php');



$logout_query=mysqli_query($conn,"select * from room_users where User_id=$id_session");
$row=mysqli_fetch_array($logout_query);
$f=$row['FirstName'];
$l=$row['LastName'];
$type=$row['User_Type'];

session_start();
session_destroy();

mysqli_query($conn,"INSERT INTO history (data,action,date,user)VALUES('$f $l', 'Logout', NOW(),'$type')")or die(mysqli_error($conn));

header('location: index.php');
?>