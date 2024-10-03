<?php
include "database.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Acme&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <title>Dr. ACE Fitness Gym</title>
  <link rel="icon" href="assets/logs.png">
  <link rel="stylesheet" href="../CSS/login.css" />
</head>
<body>

<div class="container">


  <div class="conts1">

    <div class="form-wrap">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
      <div class="ttl-wrap">
      <p id="login-ttl">LOG IN</p>
      </div>

      <div class="inputs-wrap">
      <label for="email"> <ion-icon name="mail-outline"></ion-icon>Email</label>
      <input type="email" name="email" id="email" class="in" required>

      <label for="passw"><ion-icon name="lock-closed"></ion-icon> Password</label>
      <input type="password" name="password" id="passw" class="in" required>
      <a href="#">Forgot your password?</a>
      <div> <input type="submit" name="submitBtn" value="Log in" class="SU"></div>
      <p>Don’t have an account? <a href="signup.php"> Sign in</a></p>
      </div>
      </form>
    </div>
    </div>
  <div class="conts2">
    <img src="../assets/logs.png" alt="" height="150">
  </div>

</div>


  <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

<?php
// Start the session at the top before any output
session_start();
include "database.php"; // Make sure this path is correct

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

    if (empty($email) || empty($password)) {
        echo "<script>alert('Please enter an email and password');</script>";
    } else {
        // Check for the user
        $sql = "SELECT * FROM signupdb WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) === 1) {
            $user = mysqli_fetch_assoc($result);
            
            if (password_verify($password, $user['password'])) {
                // Login successful, store session
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];

                // Insert attendance record
                $user_id = $user['id'];
                $ip_address = $_SERVER['REMOTE_ADDR']; // Get user's IP address

                $sql_attendance = "INSERT INTO attendance (user_id, ip_address) VALUES (?, ?)";
                $stmt_attendance = mysqli_prepare($conn, $sql_attendance);
                mysqli_stmt_bind_param($stmt_attendance, "is", $user_id, $ip_address);
                mysqli_stmt_execute($stmt_attendance);
                mysqli_stmt_close($stmt_attendance);

                // Redirect to the home page
                header("Location: Home.php");
                exit();
            } else {
                echo "<script>alert('Incorrect email or password');</script>";
            }
        } else {
            echo "<script>alert('Incorrect email or password');</script>";
        }

        mysqli_stmt_close($stmt);
    }

    mysqli_close($conn);
}
?>
