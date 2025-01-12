<?php
include('connection/dbcon.php');

// Get the floor ID from the AJAX request
if (isset($_GET['floor_id'])) {
    $floor_id = $_GET['floor_id'];

    // Query to fetch rooms based on floor_id
    $query = mysqli_query($conn, "SELECT * FROM rooms WHERE floor_id = '$floor_id'");

    // Check if rooms are found
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_array($query)) {
            echo '<option value="' . $row['room_id'] . '">' . $row['room_name'] . '</option>';
        }
    } else {
        echo '<option>No rooms available</option>';
    }
}
?>