<?php 
include('./connection/dbcon.php');
include('./connection/session.php'); 


$Title=$_POST['Title'];
$Person=$_POST['Person'];
$Department=$_POST['Department'];


mysqli_query($conn,"insert into departmet (title,person_incharge,department)
VALUES('$Title','$Person','$Department')")or die(mysqli_error());




$logout_query=mysqli_query($conn,"select * from users where User_id=$id_session");
$row=mysqli_fetch_array($logout_query);
$type=$row['User_Type'];


mysqli_query($conn,"insert into history (date,action,data,user)
VALUES (NOW(),'Add Entry Department','$Department','$type')") or die(mysqli_error());

?>