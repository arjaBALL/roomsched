<?php
// Include necessary files
include('./connection/session.php');
include('./connection/dbcon.php');

// Set response header for JSON
header('Content-Type: application/json');

// Ensure the schedule ID is provided in the URL
if (!isset($_GET['id'])) {
    echo json_encode(['status' => 'error', 'message' => 'No schedule ID provided.']);
    exit();
}

// Retrieve the schedule ID from the URL
$schedule_id = $_GET['id'];

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $floor_id = $_POST['floor_id'];
    $room_id = $_POST['room_id'];
    $day_of_week = $_POST['day_of_week'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $teacher_id = $_POST['teacher'];
    $subject_id = $_POST['subject'];

    // Validate that all fields are filled
    if (empty($floor_id) || empty($room_id) || empty($day_of_week) || empty($start_time) || empty($end_time) || empty($teacher_id) || empty($subject_id)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        exit();
    }

    // Validate the time slots
    if ($start_time >= $end_time) {
        echo json_encode(['status' => 'error', 'message' => 'Start time must be earlier than end time.']);
        exit();
    }

    // Check if the room is available during the selected time slot
    $check_availability_query = "
        SELECT * 
        FROM schedules 
        WHERE room_id = ? 
        AND day_of_week = ? 
        AND ((start_time < ? AND end_time > ?) OR (start_time < ? AND end_time > ?))
        AND schedule_id != ? 
    ";
    $stmt = $conn->prepare($check_availability_query);
    $stmt->bind_param("isssssi", $room_id, $day_of_week, $end_time, $start_time, $start_time, $end_time, $schedule_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // If the room is already booked, return an error
    if ($result->num_rows > 0) {
        echo json_encode(['status' => 'error', 'message' => 'Room is already booked for the selected time slot.']);
        exit();
    }

    // Update the schedule
    $update_schedule_query = "
        UPDATE schedules SET 
            floor_id = ?, 
            room_id = ?, 
            day_of_week = ?, 
            start_time = ?, 
            end_time = ?, 
            subject_id = ?, 
            id = ? 
        WHERE schedule_id = ? 
    ";
    $stmt = $conn->prepare($update_schedule_query);
    $stmt->bind_param("iisssiii", $floor_id, $room_id, $day_of_week, $start_time, $end_time, $subject_id, $teacher_id, $schedule_id);

    // Execute the update and handle the result
    if ($stmt->execute()) {
        echo json_encode(['status' => 'success', 'message' => 'Schedule updated successfully.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error updating schedule: ' . $conn->error]);
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>