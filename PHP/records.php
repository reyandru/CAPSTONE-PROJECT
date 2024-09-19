<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
   
    <title>Dr. ACE Fitness Gym</title>
    <link rel="icon" href="assets/logs.png">
    <link rel="stylesheet" href="../CSS/records.css" />
  </head>
  <body>
    <header>
      <div class="logo">
        <a href="../HTML/Home.html"><img src="../assets/logs.png" alt="Logo" height="80"></a>
      <h6>DR. ACE Fitness Gym</h6></div>

<div class="left-container">
  <div class="userProfil">

    <a href="profile.html">
      <img src="../assets/defProf.webp" height="50" alt="" class="img-container">
      <p class="userName"><?php echo htmlspecialchars($username); ?></p> 
    </a>

  <div class="consts-dropDown">
    <button class="dropDown" onclick=""> <img src="../assets/dropdown.png" alt="" height="50"
      width="45px"></button>
  </div>
  </div>
  <div class="DD-container">
    <button class="logOutBtn">LOG OUT</button>
  </div>
</div>
     
 
    
    </header>
<div class="container">
  <aside class="nav">
    <div class="hamburger" id="hamburger" onclick="myFunction(this)">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
    </div>
    <div class="menu" id="menu">

        <a href="home.php"> <img src="../assets/home.png" alt="" height="45"> Home</a>

        <a href="workoutplan.php"> <img src="../assets/DB.png" alt="" height="45">  Workout Plan</a>

        <a href="progress.php"> <img src="../assets/prog.png" alt="" height="45">  Progress</a>

        <a href="records.php"> <img src="../assets/records.png" alt="" height="45"> Records</a>
        
        <a href="profile.php"> <img src="../assets/profile.png" alt="" height="45">  Profile</a>

        <a href="equipments.php"> <img src="../assets/equipments.png" alt="" height="45">Equipments</a>
    </div>
  </aside>

  <main class="main">
    <div class="conts1">
      <div class="page"> 
        <a href="home.php"><img src="../assets/homes.png" alt="" height="15">Home |</a><p>Progress</p>
      </div>
    </div>
    <div class="conts2">
      <div class="recordsConts">
        <h1>CHECK-INS</h1>
        <div class="head"><span>MEMBER</span> <span>DATE</span><span>TIME IN</span></div>
        <div id="ciRecords">
          <div class="sample"></div>
        </div>
      </div>
    </div>
  </main>

</div>
   
    <script src="../Javascript/records.js"></script>
  </body>
</html>
