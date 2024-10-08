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
      <a href="#"><img src="../assets/logs.png" alt="Logo" height="80"></a>
     <h6>REAL DEAL GYM</h6>
    </div>

    <div class="left-container">
      <div class="userProfil">
        <a href="profile.php">
          <img src="<?php echo !empty($user['profile_pic']) ? $user['profile_pic'] : '../assets/defProf.webp'; ?>" height="70" width="70"  alt="" class="img-container">
          <p class="userName"><?php echo htmlspecialchars($username); ?></p> 
        </a>

        <div class="consts-dropDown">
    <button class="dropDown" onclick=""> <img src="../assets/dropdown.png" alt="" height="50"
      width="45px"></button>
  </div>
  </div>
  <div class="DD-container">
        <a href="login.php"> <button class="logOutBtn">LOG OUT</button></a>
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

        <a href="Home.php"> <img src="../assets/home.png" alt="" height="45"> Home</a>

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
        <a href="home.php"><img src="../assets/homes.png" alt="" height="15">Home |</a><p>Equipments</p>
      </div>
    </div>
    <div class="conts2">
     <div class="equipments_contianer">
      <div class="title">  <h1>GYM EQUIPMENTS AND GUIDES</h1></div>

      <div class="equipmentsList">

        <div class="equipment_name">  <button onclick="showEquipment('Equipment1')"> <img src="../assets/Equipment1.png" alt="" height="230" width="270"></button></div>

        <div class="equipment_name">  <button onclick="showEquipment('Equipment2')"> <img src="../assets/Equipment2.png" alt="" height="230" width="270"></button></div>

        <div class="equipment_name">  <button onclick="showEquipment('Equipment3')"> <img src="../assets/Equipment3.png" alt="" height="230" width="270"></button></div>

        <div class="equipment_name">  <button onclick="showEquipment('Equipment4')"> <img src="../assets/Equipment4.png" alt="" height="230" width="270"></button></div>

        <div class="equipment_name">  <button onclick="showEquipment('Equipment5')"> <img src="../assets/Equipment5.png" alt="" height="230" width="270"></button></div>

        <div class="equipment_name">  <button onclick="showEquipment('Equipment6')"> <img src="../assets/Equipment6.png" alt="" height="230" width="270"></button></div>

        <div class="equipment_name">  <button onclick="showEquipment('Equipment7')"> <img src="../assets/Equipment7.png" alt="" height="230" width="270"></button></div>

        <div class="equipment_name">  <button onclick="showEquipment('Equipment8')"> <img src="../assets/Equipment8.png" alt="" height="230" width="270"></button></div>

        <div class="equipment_name">  <button onclick="showEquipment('Equipment9')"> <img src="../assets/Equipment9.png" alt="" height="230" width="270"></button></div>

        <div class="equipment_name">  <button onclick="showEquipment('Equipment10')"> <img src="../assets/Equipment10.png" alt="" height="230" width="270"></button></div>

        <div class="equipment_name">  <button onclick="showEquipment('Equipment11')"> <img src="../assets/Equipment11.png" alt="" height="230" width="270"></button></div>
        
        <div class="equipment_name">  <button onclick="showEquipment('Equipment12')"> <img src="../assets/Equipment12.png" alt="" height="230" width="270"></button></div>
        <div class="equipment_name">  <button onclick="showEquipment('Equipment13')"> <img src="../assets/Equipment13.png" alt="" height="230" width="250"></button></div>

        <div class="equipment_name">  <button onclick="showEquipment('Equipment14')"> <img src="../assets/Equipment14.png" alt="" height="230" width="250"></button></div>

        <div class="equipment_name">  <button onclick="showEquipment('Equipment15')"> <img src="../assets/Equipment15.png" alt="" height="230" width="250"></button></div>

        <div class="equipment_name">  <button onclick="showEquipment('Equipment16')"> <img src="../assets/Equipment16.png" alt="" height="230" width="250"></button></div>

        <div class="equipment_name">  <button onclick="showEquipment('Equipment17')"> <img src="../assets/Equipment17.png" alt="" height="230" width="250"></button></div>

        <div class="equipment_name">  <button onclick="showEquipment('Equipment18')"> <img src="../assets/Equipment18.png" alt="" height="230" width="250"></button></div>
       
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
