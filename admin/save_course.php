<?php 
include('./connection/dbcon.php');
include('./connection/session.php'); 


$CYS=$_POST['CYS'];
$Major=$_POST['Major'];
$Department=$_POST['Department'];


mysqli_query($conn,"insert into course (course_year_section,major,Department)
VALUES('$CYS','$Major','$Department')")or die(mysqli_error());




$logout_query=mysqli_query($conn,"select * from users where User_id=$id_session");
$row=mysqli_fetch_array($logout_query);
$type=$row['User_Type'];


mysqli_query($conn,"insert into history (date,action,data,user)
VALUES (NOW(),'Add Entry Course','$CYS','$type')") or die(mysqli_error());


header('location:course.php');
?>