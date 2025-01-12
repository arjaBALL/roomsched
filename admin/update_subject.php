<?php
// Include the database connection
include('./connection/dbcon.php');

// Initialize the response array
$response = array();

// Check if the form is submitted via POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the form data
    $id_get = $_POST['id_get']; // SubjectID to identify the record
    $subjectname = $_POST['subjectname']; // Subject Name
    $subjectdescription = $_POST['subjectdescription']; // New Subject Description
    $teacher = $_POST['teacher']; // New TeacherID

    // Check for existing duplicate subject (same SubjectName, SubjectDescription, TeacherID, but excluding the current subject)
    $check_query = "SELECT * FROM subjects WHERE SubjectName='$subjectname' AND SubjectDescription='$subjectdescription' AND TeacherID='$teacher' AND SubjectID != '$id_get'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Duplicate found, return error response
        $response['status'] = 'error';
        $response['message'] = 'Error: Duplicate subject name, description, and teacher found.';
    } else {
        // No duplicates, proceed to update the subject
        $query = "UPDATE subjects SET SubjectName='$subjectname', SubjectDescription='$subjectdescription', TeacherID='$teacher' WHERE SubjectID='$id_get'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            // Success: Return a success message
            $response['status'] = 'success';
            $response['message'] = 'Subject has been successfully updated.';
        } else {
            // Error: Return an error message
            $response['status'] = 'error';
            $response['message'] = 'Error: Unable to update subject. Please try again.';
        }
    }
} else {
    // Handle case if the form was not submitted correctly
    $response['status'] = 'error';
    $response['message'] = 'Invalid request.';
}

// Send the response as JSON
echo json_encode($response);
?>