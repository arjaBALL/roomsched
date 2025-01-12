<?php
include('./connection/session.php');
include('connection/dbcon.php');

// Check if 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Perform deletion query
    $delete_query = mysqli_query($conn, "DELETE FROM schedules WHERE schedule_id='$id'") or die(mysqli_error($conn));

    // Redirect to schedule page after deletion
    header('location:schedule.php');
} else {
    // If 'id' is not set, redirect to the schedule page with an error
    header('location:schedule.php?error=NoScheduleId');
}
?>