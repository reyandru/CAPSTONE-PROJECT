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
  <link href="https://fonts.googleapis.com/css2?family=Acme&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <title>Real Deal Gym</title>
  <link rel="icon" href="assets/logs.png">
  <link rel="stylesheet" href="../CSS/equipment.css" />
</head>
<body>
  <header>
    <div class="logo">
      <a href="Home.php "><img src="../assets/logs.png" alt="Logo" height="80"></a>
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
        <a href="home.php"><img src="../assets/homes.png" alt="" height="15">Home |</a><p>Equipments</p>
      </div>
    </div>
    <div class="conts2">
     <div class="equipments_contianer">
      <div class="title">  <h1>GYM EQUIPMENTS AND GUIDES</h1></div>

      <div class="equipmentsList">

        <div class="equipment_name">  <button onclick="showEquipment('Equipment1')"> <img src="../assets/Equipment1.png" alt="" height="230" width="270"> <h2>Suspension trainers</h2></button></div>

        <div class="equipment_name">  <button onclick="showEquipment('Equipment2')"> <img src="../assets/Equipment2.png" alt="" height="230" width="270"><h2>Medicine balls</h2></button></div>

        <div class="equipment_name">  <button onclick="showEquipment('Equipment3')"> <img src="../assets/Equipment3.png" alt="" height="230" width="270"><h2>Yoga mats</h2></button></div>

        <div class="equipment_name">  <button onclick="showEquipment('Equipment4')"> <img src="../assets/Equipment4.png" alt="" height="230" width="270"><h2>Dumbbells</h2></button></div>

        <div class="equipment_name">  <button onclick="showEquipment('Equipment5')"> <img src="../assets/Equipment5.png" alt="" height="230" width="270"><h2>Resistance Bands</h2></button></div>

        <div class="equipment_name">  <button onclick="showEquipment('Equipment6')"> <img src="../assets/Equipment6.png" alt="" height="230" width="270"><h2>Kettlebells</h2></button></div>

        <div class="equipment_name">  <button onclick="showEquipment('Equipment7')"> <img src="../assets/Equipment7.png" alt="" height="230" width="270"><h2>Barbells</h2></button></div>

        <div class="equipment_name">  <button onclick="showEquipment('Equipment8')"> <img src="../assets/Equipment8.png" alt="" height="230" width="270"><h2>Stationary bikes</h2></button></div>

        <div class="equipment_name">  <button onclick="showEquipment('Equipment9')"> <img src="../assets/Equipment9.png" alt="" height="230" width="270"><h2>Elliptical trainers</h2></button></div>

        <div class="equipment_name">  <button onclick="showEquipment('Equipment10')"> <img src="../assets/Equipment10.png" alt="" height="230" width="270"><h2>Treadmills</h2></button></div>

        <div class="equipment_name">  <button onclick="showEquipment('Equipment11')"> <img src="../assets/Equipment11.png" alt="" height="230" width="270"><h2>Rowing machines</h2></button></div>
        
        <div class="equipment_name">  <button onclick="showEquipment('Equipment12')"> <img src="../assets/Equipment12.png" alt="" height="230" width="270"><h2>Plyo Box</h2></button></div>

        <div class="equipment_name">  <button onclick="showEquipment('Equipment13')"> <img src="../assets/Equipment13.png" alt="" height="230" width="270"><h2>Bench</h2></button></div>

        <div class="equipment_name">  <button onclick="showEquipment('Equipment14')"> <img src="../assets/Equipment14.png" alt="" height="230" width="270"><h2>Leg Press Machine</h2></button></div>

        <div class="equipment_name">  <button onclick="showEquipment('Equipment15')"> <img src="../assets/Equipment15.png" alt="" height="230" width="270"><h2>Preacher Curl Bench</h2></button></div>

        <div class="equipment_name">  <button onclick="showEquipment('Equipment16')"> <img src="../assets/Equipment16.png" alt="" height="230" width="270"><h2>Shoulder Press Machine</h2></button></div>

        <div class="equipment_name">  <button onclick="showEquipment('Equipment17')"> <img src="../assets/Equipment17.png" alt="" height="230" width="270"><h2>Tire Flip Machine</h2></button></div>

        <div class="equipment_name">  <button onclick="showEquipment('Equipment18')"> <img src="../assets/Equipment18.png" alt="" height="230" width="270"><h2>Seated Leg Extension Machine</h2></button></div>
       
      </div>
      <div id="description">
        <div id="quitBTN"><button>x</button></div>
  <div class="equip-container"> 
    <img id="equip-image" src="" alt="images"/>
    <p id="equip-text"></p>
    <img id="equip-gif" src="" alt="">
    <img id="equip-form" src="" alt="">
  </div>
        
      </div>
     </div>
    </div>

  </main>

</div>
   
    <script src="../Javascript/equipments.js"></script>
  </body>
</html>
