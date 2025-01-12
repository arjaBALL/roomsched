<?php
include('./connection/session.php');
include('./connection/dbcon.php');

// Fetch POST data
$get_id = $_POST['get_id'];
$room_name = $_POST['room_name'];
$Description = $_POST['floor_id'];

// Check for duplication of room name on the specified floor
$check_sql = "SELECT * FROM rooms WHERE room_name = '$room_name' AND floor_id = '$Description' AND room_id != '$get_id'";
$check_result = mysqli_query($conn, $check_sql);

if ($check_result && mysqli_num_rows($check_result) > 0) {
    // Duplicate room found, return error
    echo json_encode(["status" => "error", "message" => "The room already exists on this floor."]);
    exit;
}

// Proceed with updating the room details
$update_sql = "UPDATE rooms SET room_name='$room_name', floor_id='$Description' WHERE room_id='$get_id'";
if (mysqli_query($conn, $update_sql)) {
    // Success response
    echo json_encode(["status" => "success", "message" => "Room updated successfully."]);
} else {
    // Error response for updating the room
    echo json_encode(["status" => "error", "message" => "Error updating room: " . mysqli_error($conn)]);
}
?>