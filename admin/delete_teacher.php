<?php
include('./connection/session.php');
include('connection/dbcon.php');

$id = $_GET['id'];

// Fetch the session user information
$logout_query = mysqli_query($conn, "SELECT * FROM users WHERE User_id = '$id_session'") or die(mysqli_error($conn));
$user_row = mysqli_fetch_array($logout_query);
$user_name = $user_row['User_Type'];

// Fetch the teacher details to be deleted
$result = mysqli_query($conn, "SELECT * FROM teachers WHERE TeacherID= '$id'") or die(mysqli_error($conn));
$row = mysqli_fetch_array($result);
$f = $row['FirstName'];
$l = $row['LastName'];

// Delete the teacher (schedules will be automatically deleted due to ON DELETE CASCADE)
mysqli_query($conn, "DELETE FROM teachers WHERE TeacherID= '$id'") or die(mysqli_error($conn));

// Insert a record into the history table
mysqli_query($conn, "INSERT INTO history (data, action, date, user) 
                     VALUES ('$f $l', 'Delete Teacher', NOW(), '$user_name')") or die(mysqli_error($conn));

// Redirect to record.php
header('Location: record.php');
exit();
?>