<?php
include('./connection/dbcon.php');
include('./connection/session.php');

$id = $_GET['id']; // Get the subject ID from the URL parameter

// Get the session data of the logged-in user
$logout_query = mysqli_query($conn, "SELECT * FROM users WHERE User_id = $id_session") or die(mysqli_error($conn));
$user_row = mysqli_fetch_array($logout_query);
$user_name = $user_row['User_Type'];

// Retrieve the subject details based on the ID
$result = mysqli_query($conn, "SELECT * FROM subjects WHERE SubjectID = '$id'") or die(mysqli_error($conn));
$row = mysqli_fetch_array($result);
$f = $row['SubjectName']; // Store the subject name for logging purposes

// Delete the subject from the database
mysqli_query($conn, "DELETE FROM subjects WHERE SubjectID = '$id'") or die(mysqli_error($conn));

// Log the deletion action in the history table
mysqli_query($conn, "INSERT INTO history (data, action, date, user) VALUES ('$f', 'Delete Subject', NOW(), '$user_name')") or die(mysqli_error($conn));

// Redirect back to the subject page after deletion
header('Location: subject.php');
exit;
?>