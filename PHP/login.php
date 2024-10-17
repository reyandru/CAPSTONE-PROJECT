<?php
session_start();
include 'database.php'; 
$message = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($email) || empty($password)) {
        $message = "Please enter email and password.";
    } else {
        // First, check if the email is for the admin
        if ($email == "admin@admin.com" && $password == "admin@123") { 
            $_SESSION['login_email'] = $email;
            header("Location: ../adminPHP/adminAttendance.php");
            exit();
        }

        // If not admin, proceed with regular user login
        $sql = "SELECT * FROM registerdb WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['login_email'] = $email;
                $_SESSION['role'] = $user['role']; 

                if ($user['role'] == 'admin') {
                    header("Location: adminpage.php"); 
                } else {
                    header("Location: home.php"); 
                }
                exit();
            } else {
                $message = "Incorrect email or password";
            }
        } else {
            $message = "This email is not signed up yet.";
        }

        $stmt->close();
    }
}

$conn->close();
?>
<!-- admin@admin.com 
Admin@1234

User@user.com     
User@1234 -->


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&family=Roboto:wght@400&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../CSS/login.css">
  <title>REAL DEAL GYM</title>
  <link rel="icon" href="../assets/logs.png">
</head>
<body>

<div class="container">
  <div class="form-wrap">
    <div class="ttl-wrap">
      <img src="../assets/logs.png" alt="logo" height="120">
      <p>LOG IN</p>
    </div>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
      <div class="inputs-wrap">
        <label for="email"><ion-icon name="mail-outline"></ion-icon>Email</label>
        <input type="email" name="email" id="email">

        <label for="passw"><ion-icon name="lock-closed-outline"></ion-icon> Password</label>
        <input type="password" name="password" id="passw">

        <a class="changepasslink" href="changePassword.php">Change password?</a>
        <input type="submit" name="submitBtn" value="Log in" class="SU">
      </div>
    </form>

    
    <p id="message" ><?php echo $message ?></p>
  </div>
</div>

<script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons.js"></script>
</body>
</html>

