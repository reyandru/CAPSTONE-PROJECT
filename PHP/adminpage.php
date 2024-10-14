<?php
session_start();
include 'database.php';

// Check if the user is logged in and has admin privileges
if (!isset($_SESSION['login_email']) || !isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$message = "";

// Handle role change requests
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

// Logout functionality
if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}

// Fetch users to display
$sql = "SELECT id, email, firstname, lastname, role FROM registerdb";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/adminpage.css"> <!-- External CSS file for better organization -->
    <title>Admin Portal</title>
    <link rel="icon" href="../assets/logs.png">
</head>
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
            <h1>Manage Users</h1>
            
            <?php if ($message): ?>
                <p class="message"><?php echo htmlspecialchars($message); ?></p>
            <?php endif; ?>
            
            <table>
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Current Role</th>
                        <th>Change Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <form action="" method="post">
                                <td><?php echo htmlspecialchars($row['email']); ?></td>
                                <td><?php echo htmlspecialchars($row['firstname']); ?></td>
                                <td><?php echo htmlspecialchars($row['lastname']); ?></td>
                                <td><?php echo htmlspecialchars($row['role']); ?></td>
                                <td>
                                    <select name="role">
                                        <option value="user" <?php if ($row['role'] == 'user') echo 'selected'; ?>>User</option>
                                        <option value="admin" <?php if ($row['role'] == 'admin') echo 'selected'; ?>>Admin</option>
                                    </select>
                                    <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                                    <input type="submit" name="change_role" value="Change Role">
                                </td>
                            </form>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
