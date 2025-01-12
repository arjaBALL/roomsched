<?php
// Include database connection (assuming you're using config.php)
include('./connection/dbcon.php');


// Query to fetch teachers from the database
$sql = "SELECT id, CONCAT(first_name, ' ', last_name) AS teacher_name FROM teaching_faculty_information"; // Replace with your actual table and fields
$teachers_result = $conn->query($sql);


?>