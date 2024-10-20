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
    <link rel="stylesheet" href="../CSS/workoutPlan.css" />
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
        <a href="home.php"><img src="../assets/homes.png" alt="" height="15">Home |</a><p>Workout Plan</p> 
      </div>
      
    </div>
<div class="conts2">
    <div>

      <div class="days"></div>
      <div class="activity-area">
        <h1>Activities</h1>
        <div class="daysButton">
          <button id="monday-btn" onclick="setDay('monday')">Monday</button>
          <button id="tuesday-btn" onclick="setDay('tuesday')">Tuesday</button>
          <button id="wednesday-btn" onclick="setDay('wednesday')">Wednesday</button>
          <button id="thursday-btn" onclick="setDay('thursday')">Thursday</button>
          <button id="friday-btn" onclick="setDay('friday')">Friday</button>
          <button id="saturday-btn" onclick="setDay('saturday')">Saturday</button>
        </div>
         
          <div id="workout-container">
            <input type="text" id="day-title" placeholder="">
            <table id="workout-table">
                <tr>
                    <th>Workout</th>
                    <th>Repetitions</th>
                    <th>Sets</th>
                    <th>Kilo</th>
                    <th>Minutes</th>
                </tr>
                <tr>
                    <td><input type="text" id="workout1" class="workoutInputs"></td>
                    <td><input type="number" id="reps1" class="workoutInputs"></td>
                    <td><input type="number" id="sets1" class="workoutInputs"></td>
                    <td><input type="number" id="kilo1" class="workoutInputs"></td>
                    <td><input type="number" id="minutes1" class="workoutInputs"></td>
                </tr>
                <tr>
                  <td><input type="text" id="workout2" class="workoutInputs"></td>
                  <td><input type="number" id="reps2" class="workoutInputs"></td>
                  <td><input type="number" id="sets2" class="workoutInputs"></td>
                  <td><input type="number" id="kilo2" class="workoutInputs"></td>
                  <td><input type="number" id="minutes2" class="workoutInputs"></td>
              </tr>
              <tr>
                  <td><input type="text" id="workout3" class="workoutInputs"></td>
                  <td><input type="number" id="reps3" class="workoutInputs"></td>
                  <td><input type="number" id="sets3" class="workoutInputs"></td>
                  <td><input type="number" id="kilo3" class="workoutInputs"></td>
                  <td><input type="number" id="minutes3" class="workoutInputs"></td>
              </tr>
              <tr>
                  <td><input type="text" id="workout4" class="workoutInputs"></td>
                  <td><input type="number" id="reps4" class="workoutInputs"></td>
                  <td><input type="number" id="sets4" class="workoutInputs"></td>
                  <td><input type="number" id="kilo4" class="workoutInputs"></td>
                  <td><input type="number" id="minutes4" class="workoutInputs"></td>
              </tr>
              <tr>
                  <td><input type="text" id="workout5" class="workoutInputs"></td>
                  <td><input type="number" id="reps5" class="workoutInputs"></td>
                  <td><input type="number" id="sets5" class="workoutInputs"></td>
                  <td><input type="number" id="kilo5" class="workoutInputs"></td>
                  <td><input type="number" id="minutes5" class="workoutInputs"></td>
              </tr>
              <tr>
                  <td><input type="text" id="workout6" class="workoutInputs"></td>
                  <td><input type="number" id="reps6" class="workoutInputs"></td>
                  <td><input type="number" id="sets6" class="workoutInputs"></td>
                  <td><input type="number" id="kilo6" class="workoutInputs"></td>
                  <td><input type="number" id="minutes6" class="workoutInputs"></td>
              </tr>
              <tr>
                  <td><input type="text" id="workout7" class="workoutInputs"></td>
                  <td><input type="number" id="reps7" class="workoutInputs"></td>
                  <td><input type="number" id="sets7" class="workoutInputs"></td>
                  <td><input type="number" id="kilo7" class="workoutInputs"></td>
                  <td><input type="number" id="minutes7" class="workoutInputs"></td>
              </tr>
              <tr>
                  <td><input type="text" id="workout8" class="workoutInputs"></td>
                  <td><input type="number" id="reps8" class="workoutInputs"></td>
                  <td><input type="number" id="sets8" class="workoutInputs"></td>
                  <td><input type="number" id="kilo8" class="workoutInputs"></td>
                  <td><input type="number" id="minutes8" class="workoutInputs"></td>
              </tr>
              <tr>
                  <td><input type="text" id="workout9" class="workoutInputs"></td>
                  <td><input type="number" id="reps9" class="workoutInputs"></td>
                  <td><input type="number" id="sets9" class="workoutInputs"></td>
                  <td><input type="number" id="kilo9" class="workoutInputs"></td>
                  <td><input type="number" id="minutes9" class="workoutInputs"></td>
              </tr>
              <tr>
                  <td><input type="text" id="workout10" class="workoutInputs"></td>
                  <td><input type="number" id="reps10" class="workoutInputs"></td>
                  <td><input type="number" id="sets10" class="workoutInputs"></td>
                  <td><input type="number" id="kilo10" class="workoutInputs"></td>
                  <td><input type="number" id="minutes10" class="workoutInputs"></td>
              </tr>

            </table>
            <button id="save-btn" onclick="saveData()">Save</button>
        </div>

      </div>
     
    </div>

    </div>

      </div>
  </main>

</div>
   
    <script src="../Javascript/workoutPlan.js"></script>
  </body>
</html>
