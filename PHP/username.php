<?php
session_start();
if (!isset($_SESSION['login_email'])) {
    header("Location: login.php");
    exit();
}
include 'database.php';

$email = $_SESSION['login_email'];
$sql = "SELECT * FROM registerdb WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

$user = $result->fetch_assoc();
$username = $user['firstname'] . ' ' . $user['lastname']; 

$stmt->close();
$conn->close();
?>