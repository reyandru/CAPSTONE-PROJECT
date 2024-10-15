<?php
session_start();
include 'database.php'; 

// Check if the user is logged in
if (!isset($_SESSION['login_email'])) {
    header("Location: login.php"); 
    exit();
}

$login_email = $_SESSION['login_email'];

// Prepare the SQL statement
$sql = "SELECT firstname, lastname, age, gender, address, contactNo, email, profile_pic FROM registerdb WHERE email = ?";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
    die("Preparation failed: " . mysqli_error($conn));
}

// Bind and execute the SQL statement
mysqli_stmt_bind_param($stmt, "s", $login_email);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);

if ($result && mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    // Initialize the username variable
    $username = htmlspecialchars($user['firstname']) . ' ' . htmlspecialchars($user['lastname']);
} else {
    // If the user is not found, initialize a default username
    $username = "Guest User";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Nunito:wght@200..900&family=Roboto:wght@100..900&display=swap" rel="stylesheet">
    <title>Real Deal Gym</title>
    <link rel="icon" href="../assets/logs.png">
    <link rel="stylesheet" href="../CSS/profile.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.qrcode/1.0/jquery.qrcode.min.js"></script>
    
</head>
<body>
<header>
    <div class="logo">
        <a href="Home.php"><img src="../assets/logs.png" alt="Logo" height="80"></a>
        <h1>REAL DEAL GYM</h1>
    </div>
    <div class="user-container">
        <div class="user-profile">
            <a href="profile.php">
                <img src="<?php echo !empty($user['profile_pic']) ? $user['profile_pic'] : '../assets/defProf.webp'; ?>" class="profile-picture" alt="Profile Picture">
                <span class="user-name"><?php echo htmlspecialchars($username); ?></span>
            </a>
        </div>
        <div class="logout-container">
            <a href="login.php"><button class="logout-btn">LOG OUT</button></a>
        </div>
    </div>
</header>

<div class="container">
<aside class="nav">
      <div class="hamburger" id="hamburger" onclick="myFunction(this)">
        <div class="bar"></div>
        <div class="bar"></div>
        <div class="bar"></div>
      </div>
      <nav class="menu" id="menu">
      <a href="home.php"><img src="../assets/svg/ion--home.svg" alt="home" height="45"> Home</a>
        <a href="workoutPlan.php"><img src="../assets/svg/ph--barbell-fill.svg" alt="" height="45"> Workout Plan</a>
        <a href="progress.php"><img src="../assets/svg/game-icons--progression.svg" alt="Progress Icon" height="45"> Progress</a>
        <a href="records.php"><img src="../assets/svg/quill--paper.svg" alt="Records Icon" height="45"> Records</a>
        <a href="profile.php"><img src="../assets/svg/iconamoon--profile-fill.svg" alt="Profile Icon" height="45"> Profile</a>
        <a href="equipments.php"><img src="../assets/svg/hugeicons--equipment-gym-03.svg" alt="Equipments Icon" height="45"> Equipments</a>
      </nav>
    </aside>
    <main class="main">
        <div class="conts1">
            <div class="page"> 
                <a href="home.php"><img src="../assets/homes.png" alt="" height="15">Home |</a><p>Profile</p> 
            </div>
        </div>

        <div class="conts2">
            <div class="profile1">
                <div id="profile">
                    <div class="topConts">
                        <div id="profPics" class="profile-picture-wrapper">
                            <img id="profileImagePreview" src="<?php echo !empty($user['profile_pic']) ? $user['profile_pic'] : '../assets/defProf.webp'; ?>" alt="Profile Picture" class="profile-picture">
                            
                            <form action="upload_profile_pic.php" method="POST" enctype="multipart/form-data" class="upload-form">
                                <label for="profile_pic" class="upload-label">
                                    <input type="file" name="profile_pic" id="profile_pic" accept="image/*" required onchange="previewImage(event)" style="display: none;">
                                    <span>Choose Profile Picture</span>
                                </label>
                                <input type="submit" value="Upload" class="upload-button" style="background-color: #5c6bc0; color: white; border: none; padding: 10px; border-radius: 5px; cursor: pointer;">
                            </form>
                            <h3>My Profile</h3>
                        </div>
                    </div>


                    <div class="botConts">
                        <div class="userNames user userss">
                            <h3>Name:</h3>
                            <div id="username" class="outpt">
                                <?php if (isset($user)) echo htmlspecialchars($user["firstname"] . ' ' . $user["lastname"]); ?>
                            </div>
                        </div>
                        <div class="userAge user usersss">
                            <h3>Age:</h3>
                            <div id="userage" class="outpt"><?php if (isset($user)) echo htmlspecialchars($user['age']); ?></div>
                        </div>
                        <div class="userGender user users">
                            <h3>Gender:</h3>
                            <div id="usergender" class="outpt"><?php if (isset($user)) echo htmlspecialchars($user['gender']); ?></div>
                        </div>
                        <div class="userAddress user users">
                            <h3>Address:</h3>
                            <div id="useraddress" class="outpt"><?php if (isset($user)) echo htmlspecialchars($user['address'] ?? ''); ?></div>
                        </div>
                        <div class="userCn user">
                            <h3>Contact No:</h3>
                            <div id="usercontacts" class="outpt"><?php if (isset($user)) echo htmlspecialchars($user['contactNo']); ?></div>
                        </div>
                        <div class="userEmail user userss">
                            <h3>Email:</h3>
                            <div id="useremail" class="outpt"><?php if (isset($user)) echo htmlspecialchars($user['email']); ?></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="profile2">
                
                <div id="qr" style="margin-top: 20px;">
                    <h1>My QR Code</h1>
                </div>
            </div>
        </div>
    </main>
</div>

<script src="../Javascript/profile.js"></script>
<script>
function previewImage(event) {
    var reader = new FileReader();
    reader.onload = function() {
        var output = document.getElementById('profileImagePreview');
        output.src = reader.result;
    }
    reader.readAsDataURL(event.target.files[0]);
}

$(document).ready(function() {
    var profileURL = "http://example.com/profile.php?email=" + encodeURIComponent("<?php echo htmlspecialchars($user['email']); ?>");
    
    $("Home.phpqr").qrcode({
        text: profileURL,
        width: 128,
        height: 128
    });
});
</script>

</body>
</html>
