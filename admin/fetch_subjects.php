<?php
// Include database connection (assuming you're using config.php)
include('./connection/dbcon.php');


// Query to fetch teachers from the database
$sql = "SELECT subject_id, subject_code FROM subjects"; // Replace with your actual table and fields
$subject_result = $conn->query($sql);


?>