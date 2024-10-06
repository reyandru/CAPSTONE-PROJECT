<?php
session_start();
include 'database.php'; // Include the database connection

$message = "";

// Check if signup email exists in session
if (!isset($_SESSION['signup_email'])) {
    // If session email is not set, redirect to signup page or show a message
    $message = "Session expired or signup email not found. Please sign up again.";
    echo "<script>alert('$message'); window.location.href='signup.php';</script>";
    exit(); // Stop further execution
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $register_email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    // Check if the email matches the one used in signup
    if ($register_email !== $_SESSION['signup_email']) {
        $message = "Email does not match the one used in sign-up. Please try again.";
    } else {
        // Proceed with updating user information
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_SPECIAL_CHARS);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_SPECIAL_CHARS);
        $age = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
        $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_SPECIAL_CHARS);
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_SPECIAL_CHARS);
        $contactNo = filter_input(INPUT_POST, 'contactNo', FILTER_SANITIZE_SPECIAL_CHARS);

        // Prepare the SQL statement to update user data
        $sql = "UPDATE registerdb SET firstname=?, lastname=?, age=?, gender=?, address=?, contactNo=? WHERE email=?";
        
        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind the parameters
            mysqli_stmt_bind_param($stmt, "ssissss", $firstname, $lastname, $age, $gender, $address, $contactNo, $register_email);

            // Execute the statement
            if (mysqli_stmt_execute($stmt)) {
                // Redirect to the login page
                header("Location: login.php");
                exit();
            } else {
                $message = "Error updating record: " . mysqli_error($conn);
            }
            mysqli_stmt_close($stmt);
        } else {
            $message = "Failed to prepare statement: " . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
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
  <link rel="stylesheet" href="../CSS/Register.css" />
</head>
<body>

<div class="container">
  <div class="conts1">
    <div class="form-wrap">
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div class="ttl-wrap">
          <p id="login-ttl">Register Form</p>
        </div>
        <div class="inputs-wrap">
          <div class="left">
            <label for="fn">First Name</label>
            <input type="text" name="firstname" id="fn" class="ins" required>

            <label for="age">Age</label>
            <input type="number" name="age" id="age" class="ins" required>

            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="ins" required> 
          </div>

          <div class="right">
            <label for="ln">Last Name</label>
            <input type="text" name="lastname" id="ln" class="ins" required>

            <Label>Gender</Label>
            <div class="sex">
              <input type="radio" name="gender" id="m" value="Male" required>
              <label for="m">Male</label>
              <input type="radio" name="gender" id="fm" value="Female" required>
              <label for="fm">Female</label>
            </div>

            <label for="cn">Contact Number</label>
            <input type="text" name="contactNo" id="contactNo" class="ins" required>
          </div>
        </div>

        <div class="bot">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" required>

          <div class="two-btn">
            <button type="submit">Submit</button>
            <p>Already have an account? <a href="login.php" target="_self">Log In</a></p>
          </div>
          <div id="messageAlert">
            <p style="color:black; text-align: center; " class="errorMsg"><?php echo $message; ?></p>
           </div>
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
<script src="../Javascript/message.js"></script>
</body>
</html>
