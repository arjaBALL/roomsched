<?php 
include('./connection/dbcon.php');
include('./connection/session.php'); 

if (isset($_POST['save'])) {
    $sy = $_POST['sy'];

    // Server-side validation: ensure the input matches the format "YYYY-YYYY"
    if (!preg_match('/^\d{4}-\d{4}$/', $sy)) {
        ?>
        <script type="text/javascript">
        alert('Invalid format. Please enter the school year as YYYY-YYYY.');
        window.location="add_school_year.php";
        </script>
        <?php  
        exit;
    }

    // Check if the school year entry already exists
    $query = mysqli_query($conn, "SELECT * FROM sy WHERE sy='$sy'") or die('Query error.');
    $count = mysqli_num_rows($query);

    if ($count == 1) {
        ?>
        <script type="text/javascript">
        alert('Entry Already Exists');
        window.location="add_school_year.php";
        </script>
        <?php  
    } else {
        // Insert the new school year into the database
        mysqli_query($conn, "INSERT INTO sy (sy) VALUES ('$sy')") or die(mysqli_error($conn));

        // Log the action into the history table
        $logout_query = mysqli_query($conn, "SELECT * FROM users WHERE User_id=$id_session");
        $row = mysqli_fetch_array($logout_query);
        $type = $row['User_Type'];

        mysqli_query($conn, "INSERT INTO history (date, action, data, user)
        VALUES (NOW(), 'Add Entry School Year', '$sy', '$type')") or die(mysqli_error($conn));

        header('location: school_year.php');
    }
}
?>
