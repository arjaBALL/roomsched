<?php 
include('./connection/dbcon.php');
include('./connection/session.php');

if (isset($_POST['id'])) {
    $id = mysqli_real_escape_string($conn, $_POST['id']); // Sanitize input

    // Fetch data to log the school year
    $result = mysqli_query($conn, "SELECT * FROM sy WHERE sy_id='$id'") or die(mysqli_error($conn));
    $row = mysqli_fetch_array($result);
    $f = $row['sy'];

    // Delete the record
    $delete_query = mysqli_query($conn, "DELETE FROM sy WHERE sy_id='$id'") or die(mysqli_error($conn));

    if ($delete_query) {
        // Log the action
        $user_name = 'YourUserName'; // Replace this with actual username logic
        mysqli_query($conn, "INSERT INTO history (data, action, date, user) VALUES ('$f', 'Delete School Year', NOW(), '$user_name')") or die(mysqli_error($conn));
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "invalid";
}
?>
