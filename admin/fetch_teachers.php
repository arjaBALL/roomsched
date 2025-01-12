<?php
include('./connection/dbcon.php');
include('./connection/session.php');

$sql = "SELECT id, CONCAT(first_name, ' ', last_name) AS TeacherName FROM teaching_faculty_information";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['TeacherID'] . "'>" . $row['TeacherName'] . "</option>";
    }
} else {
    echo "<option value=''>No teachers available</option>";
}
?>