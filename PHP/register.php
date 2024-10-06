<?php
include "database.php";

// Start a session
session_start();

$message = ""; // Variable to store alert messages

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get and sanitize user inputs
    $firstname = filter_input(INPUT_POST, "firstname", FILTER_SANITIZE_SPECIAL_CHARS);
    $lastname = filter_input(INPUT_POST, "lastname", FILTER_SANITIZE_SPECIAL_CHARS);
    $age = filter_input(INPUT_POST, "age", FILTER_SANITIZE_NUMBER_INT);
    $gender = filter_input(INPUT_POST, "gender", FILTER_SANITIZE_SPECIAL_CHARS);
    $address = filter_input(INPUT_POST, "address", FILTER_SANITIZE_SPECIAL_CHARS);
    $contact = filter_input(INPUT_POST, "contactNo", FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_EMAIL);

    // Function to validate no special characters except for spaces
    function validate_no_special_characters($input) {
        return preg_match('/^[a-zA-Z0-9\s]*$/', $input); // Allow letters, numbers, and spaces
    }

    // Validate inputs
    if (!validate_no_special_characters($firstname)) {
        $message = "First name contains invalid characters.";
    } elseif (!validate_no_special_characters($lastname)) {
        $message = "Last name contains invalid characters.";
    } elseif (!validate_no_special_characters($address)) {
        $message = "Address contains invalid characters.";
    } elseif (!validate_no_special_characters($contact)) {
        $message = "Contact number contains invalid characters.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format";
    } else {
        // Check if the email already exists in the registerdb table
        $email_check_query = "SELECT * FROM registerdb WHERE email = ?";
        $stmt = mysqli_prepare($conn, $email_check_query);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (mysqli_num_rows($result) > 0) {
            // Email already exists, set message
            $message = "Email already registered. Please use a different email.";
        } else {
            // Email does not exist, proceed to insert the registration details into registerdb
            $insert_query = "INSERT INTO registerdb (firstname, lastname, age, gender, address, contactNo, email) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $insert_query);
            
            // Bind parameters
            mysqli_stmt_bind_param($stmt, "ssissss", $firstname, $lastname, $age, $gender, $address, $contact, $email);
            
            if (mysqli_stmt_execute($stmt)) {
                // Registration successful, redirect to home.php
                header("Location: login.php");
                exit;
            } else {
                $message = "Error registering user";
            }
        }
    }

    // Close the statement and connection
    mysqli_close($conn);
}
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
