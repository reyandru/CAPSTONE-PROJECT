<?php
include('username.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Acme&family=Nunito:wght@200;400;700&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
  <title>Real Deal Gym</title>
  <link rel="icon" href="../assets/logs.png">
  <link rel="stylesheet" href="../CSS/Home.css" />
</head>
<body>
  <header>
    <div class="logo">
      <h1>REAL DEAL GYM</h1>
    </div>
     
    <div class="user-container">
      <div class="user-profile">
        <a href="profile.php">
          <img src="<?php echo !empty($user['profile_pic']) ? $user['profile_pic'] : '../assets/defProf.webp' ; ?>" class="img-container">
          <span class="user-name"><?php echo htmlspecialchars($username); ?></span> 
        </a>
      </div>
      <div class="DD-container">
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

    <main class="main-content">
    <div class="conts1">
      <div class="page"> 
        <a href="home.php"><img src="../assets/homes.png" alt="" height="15">Home </a>| <p>Home</p>
      </div>
    </div>
    
      <div class="welcome-section">
        <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
      </div>

      <div class="carousel-container">
        <div class="carousel">
          <div class="carousel-cont">
            <div class="mySlides fade">
              <div class="numbertext">1 / 3</div>
              <img class="carousel-img" src="../assets/realdeal.png">
              <div class="text"></div>
            </div>

            <div class="mySlides fade">
              <div class="numbertext">2 / 3</div>
              <img class="carousel-img" src="../assets/area.jpg">
              <div class="text"></div>
            </div>

            <div class="mySlides fade">
              <div class="numbertext">3 / 3</div>
              <img class="carousel-img" src="../assets/area1.jpg">
              <div class="text"></div>
            </div>
          </div>
        </div>
        <div class="dots">
          <span class="dot" onclick="currentSlide(1)"></span> 
          <span class="dot" onclick="currentSlide(2)"></span> 
          <span class="dot" onclick="currentSlide(3)"></span> 
        </div>
      </div>

      <div class="quick-links">
        <a href="profile.php" class="link-item profiles"><img src="../assets/svg/iconamoon--profile-fill2.svg" alt="Profile" height="100">Profile</a>
        <a href="workoutplan.php" class="link-item WP"><img src="../assets/svg/gg--gym.svg" alt="Workout" height="100">Workout</a> 
        <a href="progress.php" class="link-item progs"><img src="../assets/svg/game-icons--progression2.svg" alt="Progress" height="100">Progress</a> 
        <a href="calendar.php" class="link-item calender"><img src="../assets/svg/icon-park-solid--calendar.svg" alt="Calendar" height="100">Calendar</a> 
      </div>
    </main>
  </div>

  <script src="../Javascript/home.js"></script>
</body>
</html>
