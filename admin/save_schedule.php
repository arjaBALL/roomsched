<?php
include('./connection/session.php');
include('./connection/dbcon.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize inputs
    $floor_id = intval($_POST['floor']);
    $room_id = intval($_POST['room']);
    $days = $_POST['day_of_week'] ?? ''; // Use null coalescing to handle missing fields
    $start_time = $conn->real_escape_string($_POST['start_time']);
    $end_time = $conn->real_escape_string($_POST['end_time']);
    $subject_id = intval($_POST['subject']);
    $teacher_id = intval($_POST['teacher']);

    // Validate inputs
    if (empty($floor_id) || empty($room_id) || empty($days) || empty($start_time) || empty($end_time) || empty($subject_id) || empty($teacher_id)) {
        http_response_code(400);
        echo json_encode(["status" => "error", "message" => "All fields are required."]);
        exit;
    }

    if ($start_time >= $end_time) {
        http_response_code(400);
        echo json_encode(["status" => "error", "message" => "Start time must be earlier than end time."]);
        exit;
    }

    // Check room availability
    $sql_check = "
        SELECT * 
        FROM schedules 
        WHERE room_id = ? AND day_of_week = ? 
        AND ((start_time < ? AND end_time > ?) OR (start_time < ? AND end_time > ?))
    ";
    $stmt = $conn->prepare($sql_check);
    $stmt->bind_param("isssss", $room_id, $days, $end_time, $start_time, $start_time, $end_time);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // If room is already booked for the selected time slot, return error message
        http_response_code(409);
        echo json_encode(["status" => "error", "message" => "Room is already booked for the selected time slot."]);
        exit;
    }

    // Insert new schedule entry
    $sql_insert = "
        INSERT INTO schedules (floor_id, room_id, day_of_week, start_time, end_time, subject_id, id) 
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ";
    $stmt = $conn->prepare($sql_insert);
    $stmt->bind_param("iisssii", $floor_id, $room_id, $days, $start_time, $end_time, $subject_id, $teacher_id);

    if ($stmt->execute()) {
        // Schedule added successfully
        http_response_code(201);
        echo json_encode(["status" => "success", "message" => "Schedule added successfully."]);
    } else {
        // Failed to add schedule
        http_response_code(500);
        echo json_encode(["status" => "error", "message" => "Failed to add the schedule. Please try again."]);
    }

    $stmt->close();
}
?>