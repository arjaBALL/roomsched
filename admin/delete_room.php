<?php
include('./connection/dbcon.php');
include('./connection/session.php');

// Validate and sanitize the 'id' parameter
$id = intval($_GET['id']);

// Get the current user information
$logout_query = mysqli_query($conn, "SELECT * FROM room_users WHERE User_id = $id_session") or die(mysqli_error($conn));
$user_row = mysqli_fetch_array($logout_query);

if (!$user_row) {
    die("User session not found.");
}

$user_name = $user_row['User_Type'];

// Fetch the room to delete
$result = mysqli_query($conn, "SELECT * FROM rooms WHERE room_id = '$id'") or die("Error fetching room: " . mysqli_error($conn));
$row = mysqli_fetch_array($result);

if (!$row) {
    die("Room with ID $id not found.");
}

$room_name = $row['room_name'];

// Delete the room
$delete_query = mysqli_query($conn, "DELETE FROM rooms WHERE room_id = '$id'") or die("Error deleting room: " . mysqli_error($conn));


// Redirect back to room.php
header('location:room.php');
exit;
?>