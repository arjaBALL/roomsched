<?php
include('./connection/dbcon.php');
include('./connection/session.php');

// Initialize response array
$response = array();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $subjectName = $conn->real_escape_string($_POST['subjectName']);
    $subjectDescription = $conn->real_escape_string($_POST['subjectDescription']);
    $teacherID = $_POST['teacherID'];

    // Check for duplicate subject
    $check_subject_sql = "SELECT * FROM subjects WHERE SubjectName = '$subjectName'";
    $subject_result = $conn->query($check_subject_sql);

    if ($subject_result->num_rows > 0) {
        // Subject already exists, return error message
        $response['status'] = 'error';
        $response['message'] = 'Error: The subject is already added.';
    } else {
        // Insert new subject into database
        $sql = "INSERT INTO subjects (SubjectName, SubjectDescription, TeacherID) 
                VALUES ('$subjectName', '$subjectDescription', '$teacherID')";

        if ($conn->query($sql) === TRUE) {
            // Successfully inserted subject
            $response['status'] = 'success';
            $response['message'] = 'Subject has been successfully added.';
        } else {
            // Error in insertion
            $response['status'] = 'error';
            $response['message'] = 'Error: Could not add the subject. Please try again later.';
        }
    }

    // Output the response in JSON format
    echo json_encode($response);
    exit();
}

// Fetch teachers for the dropdown
$teachers_query = "SELECT TeacherID, CONCAT(FirstName, ' ', LastName) AS TeacherName FROM teachers";
$teachers_result = $conn->query($teachers_query);
?>