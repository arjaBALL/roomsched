<?php
// update_room.php
include('./connection/dbcon.php');

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $room_id = $_POST['get_id'];  // Hidden room ID from form
    $room_name = $_POST['room_name'];  // Room name from form
    $floor_id = $_POST['floor_id'];  // Selected floor ID from form

    // Check if the room already exists on the selected floor
    $check_sql = "SELECT * FROM rooms WHERE room_name = ? AND floor_id = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param("si", $room_name, $floor_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // If room already exists on the selected floor
        echo json_encode(['status' => 'error', 'message' => 'The selected room on this floor is already used. Choose another.']);
    } else {
        // Update the room details
        $update_sql = "UPDATE rooms SET room_name = ?, floor_id = ? WHERE room_id = ?";
        $stmt = $conn->prepare($update_sql);
        $stmt->bind_param("sii", $room_name, $floor_id, $room_id);
        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Room has been successfully updated.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error updating room.']);
        }
    }

    $stmt->close();
    $conn->close();
}
?>