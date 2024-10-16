<?php
include 'database.php'; 

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $new_password = $_POST['password'];

    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("UPDATE registerdb SET password = ? WHERE email = ?");
    $stmt->bind_param("ss", $hashed_password, $email);

    if ($stmt->execute()) {
      $message = "Password updated successfully.";
    } else {
      $message = "Error updating password: " . $stmt->error;
    }

    $stmt->close();
}
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@600&family=Roboto:wght@400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../CSS/changePass.css">
    <title>REAL DEAL GYM</title>
    <link rel="icon" href="assets/logs.png">
</head>
<body>

<div class="container">
    <div class="form-wrap">
        <div class="ttl-wrap">
            <img src="../assets/logs.png" alt="logo" height="120">
            <p>CHANGE PASSWORD</p>
        </div>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" onsubmit="return validateForm()">
            <div class="inputs-wrap">
                <label for="email"><ion-icon name="mail-outline"></ion-icon>Email</label>
                <input type="email" name="email" id="email" required>

                <label for="new_passw"><ion-icon name="lock-closed-outline"></ion-icon> Enter New Password</label>
                <input type="password" name="password" id="new_passw" required>

                <label for="confirm_passw"><ion-icon name="lock-closed-outline"></ion-icon> Re-enter New Password</label>
                <input type="password" name="confirm_password" id="confirm_passw" required>

                <a class="linkLogin" href="login.php">Log in</a>
                
                <input type="submit" name="submitBtn" value="Submit" class="SU">
            </div>
        </form>
        <p id="message" ><?php echo $message ?></p>
    </div>
</div>

<script src="https://unpkg.com/ionicons@5.5.2/dist/ionicons.js"></script>
<script>
function validateForm() {
    const password = document.getElementById('new_passw').value;
    const confirmPassword = document.getElementById('confirm_passw').value;

    if (password !== confirmPassword) {
        alert("Passwords do not match!");
        return false; 
    }
    return true; 
}
</script>
</body>
</html>
