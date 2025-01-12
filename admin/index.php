<?php
// Start session
session_start();
ob_start();
include('./connection/dbcon.php');

if (isset($_POST['Login'])) {
    function clean($str) {
        global $conn;
        $str = trim($str);
        $str = stripslashes($str);
        return mysqli_real_escape_string($conn, $str);
    }

    $UserName = clean($_POST['UserName']);
    $Password = clean($_POST['Password']);

    // Query for login
    $login_query = mysqli_query($conn, "SELECT * FROM room_users WHERE UserName='$UserName' AND Password='$Password'");
    $count = mysqli_num_rows($login_query);
    $row = mysqli_fetch_array($login_query);

    if ($count == 1) {
        $_SESSION['id'] = $row['User_id'];
        $fullName = $row['FirstName'] . " " . $row['LastName'];
        $userType = $row['User_Type'];
        $college = $row['College'];

        // Insert login history
        $query = "INSERT INTO history (data, action, date, user) VALUES ('$fullName', 'Login', NOW(), '$userType')";
        mysqli_query($conn, $query) or die(mysqli_error($conn));

        // Redirect based on User_Type and College
        if ($userType === 'Admin') {
            header('Location: schedule.php');
        } elseif ($userType === 'User') {
            switch ($college) {
                case 'CIT':
                    header('Location: user_home.php');
                    break;
                case 'COE':
                    header('Location: user_COE.php');
                    break;
                case 'SAS':
                    header('Location: user_SAS.php');
                    break;
                default:
                    header('Location: home.php');
            }
        }
        exit();
    } else {
        $errorMessage = "Invalid username or password. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./css/login.css">
</head>
<body>
<main id="main">
    <div id="login-right">
      <div class="card-body">
      <?php if (isset($errorMessage)) echo "<p class='error'>$errorMessage</p>"; ?>
        <form id="login-form" method="POST">
          <h1 class="text-center">Hi Admin!!</h1>
          <div class="form-group">
            <label for="username" class="control-label">Username</label>
            <input type="text" id="UserName" name="UserName" class="form-control" placeholder="Enter your username" required>
          </div>
          <div class="form-group">
            <label for="password" class="control-label">Password</label>
            <input type="password" id="Password" name="Password" class="form-control" placeholder="Enter your password" required>
          </div>
          <button type="submit" name="Login" class="btn btn-primary">Login</button>

        </form>
      </div>
    </div>
  </main>
</body>
</html>
