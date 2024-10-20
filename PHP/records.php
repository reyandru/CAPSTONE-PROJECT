<?php
include('username.php');

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <title>Real Deal Gym</title>
    <link rel="icon" href="../assets/logs.png">
    <link rel="stylesheet" href="../CSS/records.css" />
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
          <img src="<?php echo !empty($user['profile_pic']) ? $user['profile_pic'] : '../assets/defProf.webp' ; ?>" class="img-container">
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
            <a href="home.php"><img src="../assets/homes.png" alt="" height="15">Home |</a><p>Records</p>
          </div>
        </div>
        
        <div class="conts2">
          <div class="recordsConts">
            <h1>CHECK-INS</h1>
            <div class="head"><span>MEMBER</span> <span>DATE</span><span>TIME IN</span></div>
            <div id="ciRecords">
              <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                  <div class="sample">
                    <div class="memberNames rec"> <?php echo htmlspecialchars($username); ?> </div>
                    <div class="checkins rec"><?php echo htmlspecialchars(date('F d, Y', strtotime($row['login_time']))); ?></div>
                    <div class="timeCheck rec"><?php echo htmlspecialchars(date('h:i A', strtotime($row['login_time']))); ?></div>
                  </div>
                <?php endwhile; ?>
              <?php else: ?>
                <p>No check-in records found.</p>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </main>
    </div>
   
    <script src="../Javascript/records.js"></script>
  </body>
</html>


