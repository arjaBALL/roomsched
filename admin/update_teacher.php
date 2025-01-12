<?php
include('./connection/session.php');
include('connection/dbcon.php');

// Check if the request is via AJAX (POST method)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if POST data exists and retrieve the posted data
    if (isset($_POST['TeacherID']) && isset($_POST['FirstName']) && isset($_POST['LastName'])) {
        $get_id = $_POST['TeacherID'];
        $FirstName = $_POST['FirstName'];
        $LastName = $_POST['LastName'];

        // Check if any of the fields are empty
        if (empty($FirstName) || empty($LastName)) {
            echo json_encode([
                'status' => 'error',
                'message' => 'Both First Name and Last Name are required!'
            ]);
            exit;
        }

        // Check if the teacher already exists in the database
        $check_sql = "SELECT * FROM teachers WHERE FirstName = ? AND LastName = ? AND TeacherID != ?";
        $stmt_check = $conn->prepare($check_sql);
        $stmt_check->bind_param("ssi", $FirstName, $LastName, $get_id);
        $stmt_check->execute();
        $result_check = $stmt_check->get_result();

        if ($result_check->num_rows > 0) {
            // Teacher already exists in the database
            echo json_encode([
                'status' => 'error',
                'message' => 'Teacher with the same name already exists in the database.'
            ]);
            exit;
        }

        // Update query using prepared statements for security
        $update_sql = "UPDATE teachers SET FirstName = ?, LastName = ? WHERE TeacherID = ?";
        $stmt = $conn->prepare($update_sql);
        $stmt->bind_param("ssi", $FirstName, $LastName, $get_id);

        // Execute the update query and check for success
        if ($stmt->execute()) {
            // Get the user type of the current session
            $logout_query = mysqli_query($conn, "SELECT * FROM users WHERE User_id='$id_session'");
            $row = mysqli_fetch_array($logout_query);
            $type = $row['User_Type'];

            // Insert action into history table with correct user
            $history_sql = "INSERT INTO history (date, action, data, user) VALUES (NOW(), 'Update Entry Teacher', CONCAT('FirstName: ', ?, ', LastName: ', ?), ?)";
            $history_stmt = $conn->prepare($history_sql);
            $history_stmt->bind_param("sss", $FirstName, $LastName, $type);
            $history_stmt->execute();

            // Send a success response
            echo json_encode([
                'status' => 'success',
                'message' => 'Teacher details updated successfully!'
            ]);
        } else {
            // If query execution failed
            echo json_encode([
                'status' => 'error',
                'message' => 'Error updating teacher details: ' . $stmt->error
            ]);
        }

        $stmt->close();
        $stmt_check->close();
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Missing required fields.'
        ]);
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'Invalid request method.'
    ]);
}
?>