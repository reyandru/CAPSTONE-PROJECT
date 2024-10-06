<?php
session_start();
include 'database.php'; 

// Check if the user is logged in
if (!isset($_SESSION['login_email'])) {
    header("Location: login.php"); 
    exit();
}

$login_email = $_SESSION['login_email'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['profile_pic']['tmp_name'];
        $file_name = basename($_FILES['profile_pic']['name']);
        $upload_dir = 'uploads/'; 
        $target_file = $upload_dir . uniqid() . '_' . $file_name; 

        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        if (move_uploaded_file($file_tmp, $target_file)) {
            $sql = "UPDATE registerdb SET profile_pic = ? WHERE email = ?";
            if ($stmt = mysqli_prepare($conn, $sql)) {
                mysqli_stmt_bind_param($stmt, "ss", $target_file, $login_email);
                if (mysqli_stmt_execute($stmt)) {
                    header("Location: profile.php");
                    exit();
                } else {
                    echo "Error updating profile picture: " . mysqli_error($conn);
                }
                mysqli_stmt_close($stmt);
            } else {
                echo "Failed to prepare statement: " . mysqli_error($conn);
            }
        } else {
            echo "Failed to upload file.";
        }
    } else {
        echo "No file uploaded or file upload error.";
    }
}

mysqli_close($conn);
?>
