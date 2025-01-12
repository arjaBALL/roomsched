<?php
include('./connection/dbcon.php');
include('./connection/session.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize the floor number
    $floor_number = $conn->real_escape_string($_POST['floor_number']);

    // Validate inputs
    if (empty($floor_number)) {
        // Return JSON response indicating the error
        echo json_encode(['status' => 'error', 'message' => 'Floor number is required.']);
        exit;
    }

    // Check if the floor already exists in the database
    $sql_check = "SELECT COUNT(*) FROM floors WHERE floor_number = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $floor_number);
    $stmt_check->execute();
    $stmt_check->bind_result($count);
    $stmt_check->fetch();
    $stmt_check->close();

    if ($count > 0) {
        // Floor already exists
        echo json_encode(['status' => 'error', 'message' => 'Floor already exists.']);
    } else {
        // Insert new floor into the database
        $sql_insert = "INSERT INTO floors (floor_number) VALUES (?)";
        $stmt_insert = $conn->prepare($sql_insert);
        $stmt_insert->bind_param("s", $floor_number);

        if ($stmt_insert->execute()) {
            // Floor added successfully
            echo json_encode(['status' => 'success', 'message' => 'Floor added successfully.']);
        } else {
            // Failed to add floor
            echo json_encode(['status' => 'error', 'message' => 'Failed to add floor. Please try again.']);
        }

        $stmt_insert->close();
    }
}
?>