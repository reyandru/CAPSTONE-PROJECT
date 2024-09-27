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
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Acme&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <title>Real Deal Gym</title>
  <link rel="icon" href="assets/logs.png">
  <link rel="stylesheet" href="../CSS/Home.css" />
</head>
<body>
  <header>
    <div class="logo">
      <a href="#"><img src="../assets/logs.png" alt="Logo" height="80"></a>
     <h6>REAL DEAL GYM</h6>
    </div>

    <div class="left-container">
      <div class="userProfil">
        <a href="profile.php">
          <img src="../assets/defProf.webp" height="50" alt="" class="img-container">
          <p class="userName"><?php echo htmlspecialchars($username); ?></p> 
        </a>
        
        <div class="consts-dropDown">
          <button class="dropDown" onclick=""> <img src="../assets/dropdown.png" alt="" height="50" width="45px"></button>
        </div>
      </div>
      <div class="DD-container">
        <a href="first.html"> <button class="logOutBtn">LOG OUT</button></a>
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
        <a href="workoutplan.php"> <img src="../assets/DB.png" alt="" height="45"> Workout Plan</a>
        <a href="progress.php"> <img src="../assets/prog.png" alt="" height="45"> Progress</a>
        <a href="records.php"> <img src="../assets/records.png" alt="" height="45"> Records</a>
        <a href="profile.php"> <img src="../assets/profile.png" alt="" height="45"> Profile</a>
        <a href="equipments.php"> <img src="../assets/equipments.png" alt="" height="45">Equipments</a>
      </div>
    </aside>

    <main class="main">
      <div class="conts1">
        <div class="page"> 
          <p><img src="../assets/homes.png" alt="" height="15">Home</p>
        </div>
        <div class="memberName">
          <p>Welcome, <?php echo htmlspecialchars($username); ?>!</p>
        </div>
      </div>

      <div class="conts2">
        <div class="carousel">
        <div class="carousel-cont">

          <div class="mySlides fade">
            <div class="numbertext">1 / 3</div>
            <img class="carousel-img" src="../assets/logs.png">
            <div class="text"></div>
          </div>

          <div class="mySlides fade">
            <div class="numbertext">2 / 3</div>
            <img class="carousel-img" src="../assets/area.jpg" >
            <div class="text"></div>
          </div>

          <div class="mySlides fade">
            <div class="numbertext">3 / 3</div>
            <img class="carousel-img" src="../assets/dbBG.png">
            <div class="text"></div>
          </div>

          <a class="prev" onclick="plusSlides(-1)">❮</a>
          <a class="next" onclick="plusSlides(1)">❯</a>


          </div>
          <div style="text-align:center; position: absolute; margin-top: 465px;" class="threeDots" >
          <span class="dot" onclick="currentSlide(1)"></span> 
          <span class="dot" onclick="currentSlide(2)"></span> 
          <span class="dot" onclick="currentSlide(3)"></span> 
          </div>
        </div>
        <div class="four">
        <a href="profile.php" class="profiles hero">
          <img src="../assets/prof.png" alt="" height="100">Profile 
        </a>
       <a href="workoutplan.php" class="WP hero">
        <img src="../assets/DB.png" alt="" height="100"> Workout
        </a> 

        <a href="progress.php" class="progs hero">  
          <img src="../assets/progs.png" alt="" height="100">Progress 
        </a> 

       <a href="calendar.php" class="calender hero"> 
        <img src="../assets/cal.png" alt="" height="100">Calendar 
      </a> 
        </div>
      </div>
    </main>
  </div>

  <script src="../Javascript/home.js"></script>
</body>
</html>
