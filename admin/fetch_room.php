<?php
include('./connection/dbcon.php');
include('./connection/session.php');

// Fetch floors from the database
$sql_rooms = "SELECT floor_id, floor_number FROM floors";
$rooms_result = $conn->query($sql_floors);

// Check if floors were retrieved
if ($rooms_result->num_rows > 0) {
    // Output floor options for the dropdown
    while ($row = $rooms_result->fetch_assoc()) {
        echo "<option value='" . $row['room_id'] . "'>" . "Floor " . $row['floor_number'] . "</option>";
    }
} else {
    echo "<option>No floors available</option>";
}

// Handle AJAX request to fetch rooms based on floor
if (isset($_GET['floor_id'])) {
    $floor_id = (int) $_GET['floor_id'];  // Sanitize input to ensure it's an integer

    // Prepare SQL query using a prepared statement
    $sql_rooms = $conn->prepare("SELECT room_id, room_name FROM rooms WHERE floor_id = ?");
    $sql_rooms->bind_param("i", $floor_id);
    $sql_rooms->execute();

    // Fetch rooms
    $room_result = $sql_rooms->get_result();

    if ($room_result->num_rows > 0) {
        // Initialize an array to hold rooms data
        $rooms = [];
        while ($row = $room_result->fetch_assoc()) {
            $rooms[] = [
                'room_id' => $row['room_id'],
                'room_name' => $row['room_name']
            ];
        }
        // Return rooms as JSON response
        echo json_encode($rooms);
    } else {
        echo json_encode([['room_id' => '', 'room_name' => 'No rooms available']]);
    }

    exit; // Terminate script after AJAX response
}
?>