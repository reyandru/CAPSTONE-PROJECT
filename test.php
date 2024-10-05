<?php

include('PHP/database.php');

$sql = "SELECT id, firstname, lastname, age, gender, contactNo, email FROM registerdb";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Display the data in a table
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Contact No</th>
                <th>Email</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["firstname"] . "</td>
                <td>" . $row["lastname"] . "</td>
                <td>" . $row["age"] . "</td>
                <td>" . $row["gender"] . "</td>
                <td>" . $row["contactNo"] . "</td>
                <td>" . $row["email"] . "</td>
              </tr>";
    }
    echo "</table>";

    // Reset the result pointer to access the first row again
    $result->data_seek(0);

    // Fetch the first row for displaying user details
    $row = $result->fetch_assoc();

} else {
    echo "0 results";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="botConts">
        <div class="userNames user userss">
            <h3>Name:</h3>
            <div id="username" class="outpt">
                <?php if (isset($row)) echo htmlspecialchars($row["firstname"] . ' ' . $row["lastname"]); ?>
            </div>
        </div>
        <div class="userAge user usersss">
            <h3>Age:</h3>
            <div id="userage" class="outpt"><?php if (isset($row)) echo htmlspecialchars($row['age']); ?></div>
        </div>
        <div class="userGender user users">
            <h3>Gender:</h3>
            <div id="usergender" class="outpt"><?php if (isset($row)) echo htmlspecialchars($row['gender']); ?></div>
        </div>
        <div class="userAddress user users">
            <h3>Address:</h3>
            <div id="useraddress" class="outpt"><?php if (isset($row)) echo htmlspecialchars($row['address'] ?? ''); ?></div>
        </div>
        <div class="userCn user">
            <h3>Contact No:</h3>
            <div id="usercontacts" class="outpt"><?php if (isset($row)) echo htmlspecialchars($row['contactNo']); ?></div>
        </div>
        <div class="userEmail user userss">
            <h3>Email:</h3>
            <div id="useremail" class="outpt"><?php if (isset($row)) echo htmlspecialchars($row['email']); ?></div>
        </div>
    </div>
</body>
</html>
