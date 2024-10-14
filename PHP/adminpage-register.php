<?php
session_start();
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

    $pattern = "/^[a-zA-Z0-9\s\-]+$/";

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
                header('Location: membership.php');
                exit(); 
            } else {
                $message = "Registration failed. Please try again.";
            }
        }

        $stmt->close();
    }
}

if (!isset($_SESSION['login_email']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['change_role'])) {
    $userId = filter_input(INPUT_POST, 'user_id', FILTER_SANITIZE_NUMBER_INT);
    $newRole = filter_input(INPUT_POST, 'role', FILTER_SANITIZE_STRING);

    if ($newRole === 'user' || $newRole === 'admin') {
        $sql = "UPDATE registerdb SET role = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $newRole, $userId);
        
        if ($stmt->execute()) {
            $message = "User role updated successfully.";
        } else {
            $message = "Error updating user role.";
        }

        $stmt->close();
    } else {
        $message = "Invalid role selected.";
    }
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

$sql = "SELECT id, email, firstname, lastname, role FROM registerdb";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Nunito:wght@200..900&family=Roboto:wght@100..900&display=swap" rel="stylesheet">
    <link rel="icon" href="../assets/logs.png">
    <link rel="stylesheet" href="../CSS/adminpage-register.css"> <!-- External CSS file for better organization -->
    <title>Admin Portal</title>
</head>
<body>
    <head>
        <link rel="icon" href="../assets/logs.png">
    </head>
    <div class="sidebar">
        <h2>Admin Panel</h2>
        <a href="adminpage.php">Manage Users</a>
        <a href="adminpage-register.php">Register a New User</a>
        <a href="admin_reports.php">View Reports</a>
            <a href="dashboard.php">Dashboard</a>
        <a href="#">Settings</a>
        <form method="POST" style="text-align: center; margin-top: 20px;">
            <button type="submit" name="logout" style="padding: 10px 20px; border: none; background-color: #dc3545; color: white; border-radius: 5px; cursor: pointer;">Logout</button>
        </form>
    </div>

    <div class="content">
        <div class="container">
            <div class="conts1">
                <div class="form-wrap">
                    <form action="adminpage-register.php" method="post">
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

                                <label>Gender</label>
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
    </div>
</body>
</html>
