<?php
include('./connection/dbcon.php');

if (isset($_POST['floor_id'])) {
    $floor_id = $_POST['floor_id'];
    $sql = "SELECT room_id, room_name FROM rooms WHERE floor_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $floor_id);
    $stmt->execute();
    $result = $stmt->get_result();

    echo '<option value="">Select Room</option>';
    while ($room = $result->fetch_assoc()) {
        echo '<option value="' . $room['room_id'] . '">' . $room['room_name'] . '</option>';
    }

    $stmt->close();
    $conn->close();
}
?>