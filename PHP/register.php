<?php
include 'database.php';  

$message = '';  

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $contactNo = $_POST['contactNo'];
    $email = $_POST['email'];
    $password = $_POST['passw'];

    // Define the regex pattern to allow only letters, numbers, spaces, and hyphens
    $pattern = "/^[a-zA-Z0-9\s\-]+$/";

    // Validate special characters in firstname, lastname, and address
    if (!preg_match($pattern, $firstname)) {
        $message = "Firstname contains invalid characters.";
    } elseif (!preg_match($pattern, $lastname)) {
        $message = "Lastname contains invalid characters.";
    } elseif (!preg_match($pattern, $address)) {
        $message = "Address contains invalid characters.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format";
    } else {
        $stmt = $conn->prepare("SELECT * FROM registerdb WHERE email = ?");
        $stmt->bind_param('s', $email);  
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $message = "Email already exists.";
        } else {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $sql = "INSERT INTO registerdb (firstname, lastname, age, gender, address, contactNo, email, password)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssisssss', $firstname, $lastname, $age, $gender, $address, $contactNo, $email, $hashedPassword);
            
            if ($stmt->execute()) {
                $message = "Registration successful!";
                header('Location: login.php');
            } else {
                $message = "Registration failed. Please try again.";
            }
        }

        $stmt->close();
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Acme&family=Nunito:wght@200;600;700;800&family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../CSS/register.css">
  <title>Dr. ACE Fitness Gym</title>
  <link rel="icon" href="../assets/logs.png">
</head>
<body>
  <div class="container">
    <div class="conts1">
      <div class="form-wrap">
        <form action="register.php" method="post">
          <div class="ttl-wrap">
          <img src="../assets/logs.png" alt="logo" height="120">
            <p id="register-title">Register Form</p>
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
              <input type="text" name="contactNo" id="cn" class="ins" required>
            </div>
          </div>

          <div class="bot">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>

            <label for="passw">Password</label>
            <input type="password" name="passw" id="password" required>

            <div class="two-btn">
              <button type="submit">Submit</button>
            </div>
            <div id="messageAlert">
              <p class="errorMsg"><?php echo $message; ?></p>
            </div>
          </div>
        </form>
      </div>
    </div>

  </div>


<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script src="../Javascript/message.js"></script>
</body>
</html>