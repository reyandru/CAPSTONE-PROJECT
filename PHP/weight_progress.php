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
  $username = trim($user['firstname'] . ' ' . $user['lastname']);  

  $stmt->close();

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $goalWeight = $_POST['goalWeight'] ?? null;
      $startWeight = $_POST['startingWeight'] ?? null;
      $currentWeight = $_POST['currentWeight'] ?? null;

      if (is_numeric($goalWeight) && is_numeric($startWeight) && is_numeric($currentWeight)) {
          
          $stmt = $conn->prepare("SELECT * FROM progressdb WHERE username = ?");
          $stmt->bind_param("s", $username);
          $stmt->execute();
          $result = $stmt->get_result();

          if ($result->num_rows > 0) {
              $updateStmt = $conn->prepare("UPDATE progressdb SET goalW = ?, startW = ?, currentW = ? WHERE username = ?");
              $updateStmt->bind_param("ddds", $goalWeight, $startWeight, $currentWeight, $username);

              if ($updateStmt->execute()) {
                  echo "Progress updated successfully.";
              } else {
                  echo "Error updating progress: " . $updateStmt->error;
              }
              $updateStmt->close();
          } else {
              $insertStmt = $conn->prepare("INSERT INTO progressdb (username, goalW, startW, currentW) VALUES (?, ?, ?, ?)");
              $insertStmt->bind_param("sddd", $username, $goalWeight, $startWeight, $currentWeight);

              if ($insertStmt->execute()) {
                  echo "alert('New progress record added.')";
              } else {
                  echo "Error adding new progress: " . $insertStmt->error;
              }
              $insertStmt->close();
          }
      } else {
          echo '<script>alert("Invalid input: Please enter numeric values for weights.");</script>';
      }
  }

  $conn->close();
?>
