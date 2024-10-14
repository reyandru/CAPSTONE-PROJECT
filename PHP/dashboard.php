<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/dashboard.css"> 
    <title>Admin Portal</title>
    <link rel="icon" href="../assets/logs.png">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .output-container {
            margin-top: 20px;
            border: 1px solid #ccc;
            padding: 10px;
            border-radius: 5px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .content {
            margin-left: 220px; 
            padding: 20px;
        }
    </style>
</head>
<body>
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
        <h1>Dashboard</h1>
        
        <?php
        include 'database.php'; // Ensure this file sets up $conn

        $data = [];
        $dates = [];
        $counts = [];

        $query = "
            SELECT DATE(date_register) AS JoinDate, COUNT(*) AS MemberCount
            FROM registerdb
            GROUP BY DATE(date_register)
            ORDER BY JoinDate
        ";

        $result = $conn->query($query);

        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $dates[] = $row['JoinDate'];
                $counts[] = $row['MemberCount'];
            }
        } else {
            echo "Database error: " . htmlspecialchars($conn->error);
        }
        ?>

        <canvas id="membershipChart" width="600" height="400"></canvas>

        <div class="output-container">
            <h2>Registration Data</h2>
            <table>
                <thead>
                    <tr>
                        <th>Date Registered</th>
                        <th>Number of Members Registered</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($dates)): ?>
                        <tr>
                            <td colspan="2">No members registered yet.</td>
                        </tr>
                    <?php else: ?>
                        <?php for ($i = 0; $i < count($dates); $i++): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($dates[$i]); ?></td>
                                <td><?php echo htmlspecialchars($counts[$i]); ?></td>
                            </tr>
                        <?php endfor; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <script>
            const ctx = document.getElementById('membershipChart').getContext('2d');
            const membershipChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: <?php echo json_encode($dates); ?>,
                    datasets: [{
                        label: 'New Members',
                        data: <?php echo json_encode($counts); ?>,
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderWidth: 2,
                        fill: true
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    </div>
</body>
</html>
