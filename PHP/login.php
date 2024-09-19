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
      <div> <input type="submit" name="submitBtn" value="Sign Up" class="SU"></div>
      <p>Don’t have an account? <a href="signup.php"> Log in</a></p>
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
// Start the session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Get and sanitize user inputs
  $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);
  $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);

  // Debugging output
  // var_dump($_POST); // Uncomment this line to check what is being received

  // Validate inputs
  if (empty($email) || empty($password)) {
      echo "<script>alert('Please enter an email or password');</script>";
  } else {
      // Proceed with login checks
      $sql = "SELECT * FROM signupdb WHERE email = ?";
      $stmt = mysqli_prepare($conn, $sql);
      mysqli_stmt_bind_param($stmt, "s", $email);
      mysqli_stmt_execute($stmt);
      $result = mysqli_stmt_get_result($stmt);

      if (mysqli_num_rows($result) === 1) {
          // Fetch user data
          $user = mysqli_fetch_assoc($result);

          // Verify the password
          if (password_verify($password, $user['password'])) {
              // Password matches
              $_SESSION['username'] = $user['username']; // Store username in session

              // Set a cookie (for example, to remember the user for 30 days)
              $cookie_name = "user";
              $cookie_value = $user['username'];
              $cookie_expiration = time() + (30 * 24 * 60 * 60); // 30 days from now
              setcookie($cookie_name, $cookie_value, $cookie_expiration, "/"); // "/" means available throughout the entire website

              header("Location: Home.php"); // Redirect to the home page
              exit();
          } else {
              // Password does not match
              echo "<script>alert('Incorrect email or password');</script>";
          }
      } else {
          // Email does not exist
          echo "<script>alert('Incorrect email or password');</script>";
      }

      // Close the statement
      mysqli_stmt_close($stmt);
  }

  // Close the database connection
  mysqli_close($conn);
}

?>
