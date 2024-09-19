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
    <link rel="stylesheet" href="../CSS/profile.css" />
  </head>
  <body>
    <header>
      <div class="logo">
        <a href="../HTML/Home.html"><img src="../assets/logs.png" alt="Logo" height="80"></a>
      <h6>DR. ACE Fitness Gym</h6></div>

<div class="left-container">
  <div class="userProfil">

    <a href="#">
      <img src="../assets/defProf.webp" height="50" alt="" class="img-container">
      <p class="userName"><?php echo htmlspecialchars($username); ?></p> 
    </a>

  <div class="consts-dropDown">
    <button class="dropDown" onclick=""> <img src="../assets/dropdown.png" alt="" height="50"
      width="45px"></button>
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

        <a href="workoutplan.php"> <img src="../assets/DB.png" alt="" height="45">  Workout Plan</a>

        <a href="progress.php"> <img src="../assets/prog.png" alt="" height="45">  Progress</a>

        <a href="records.php"> <img src="../assets/records.png" alt="" height="45"> Records</a>
        
        <a href="profile.php"> <img src="../assets/profile.png" alt="" height="45">  Profile</a>

        <a href="member.php"> <img src="../assets/member.png" alt="" height="45">Members</a>
    </div>
  </aside>

  <main class="main">
    <div class="conts1">
      <div class="page"> 
        <a href="h  ome.php"><img src="../assets/homes.png" alt="" height="15">Home |</a><p>Profile</p> 
      </div>
    </div>



    <div class="conts2">
      <div class="profile1">

        <div id="profile">
          <div class="topConts">

            <div id ="profPics">
              <img src="../assets/defProf.webp" alt="" height="150">
              <h3>My profile</h3>
            </div>

            <div id="editProfs">
              <button id="editbtnProfs">
                <img src="../assets/editBtn.png" alt="" height="30">
              </button>
            </div>
          </div>

          <div class="line"></div>

          <div class="botConts">
            <div class="userNames user userss">
              <h3>Name:</h3>
              <div id="username" class="outpt"> </div>
            </div>
            <div class="userAge user usersss">
              <h3>Age:</h3>
              <div id="userage" class="outpt"> </div>
            </div>
            <div class="userGender user users">
              <h3>Gender:</h3>
              <div id="usergender" class="outpt"> </div>
            </div>
            <div class="userAddress user users">
              <h3>Address:</h3>
              <div id="useraddress" class="outpt"> </div>
            </div>
            <div class="userCn user">
              <h3>Contact No:</h3>
              <div id="usercontacts" class="outpt"> </div>
            </div>
            <div class="userEmail user userss">
              <h3>Email:</h3>
              <div id="useremail" class="outpt"> </div>
            </div>
          </div>
        </div>


        <div id="profileEdit">
          <div class="topEditConts">

            <div id="profPic">
              <img src="../assets/defProf.webp" alt="" height="140">
              <h3>My Profile</h3>
            </div>

          </div>

          <div class="midInfoConts">
            <div class="rightContainer">
              <form action="" class="input1">
                <label for="FN">First name:</label>
                <input type="text" id="FN">

                <label for="age">Age:</label>
                <input type="number" id="age">

                <label for="address" >Address:</label>
                <input type="text" id="address">

              </form>
            </div>

            <div class="leftContainer">
              <form action="" class="input2">
                <label for="LN">Last name:</label>
                <input type="text" id="LN">

                <label for="">Gender</label>
                <div class="radioBtn"> 
              
                  <label for="m"><input type="radio" id="m" value="Male" name="gender"> Male</label>

                
                  <label for="fm"><input type="radio" id="fm" value="Female" name="gender"> Female </label> 
                </div>
      
                <label for="contact" >Contact Number:</label>
                <input type="text" id="contact">

              </form>
            </div>
          </div>

          <div class="bottomConts">
            <div class="emailSubmit">

              <label for="email" >Email:</label>
              <input type="email" id="email" required>

              <button id="sbmt" type="submit">Save</button>

            </div>
          </div>
        </div>
      </div>


      <div class="profile2">
        <div id="qr"></div>
      </div>

    </div>

  </main>

</div>
   
    <script src="../Javascript/profile.js"></script>
  </body>
</html>
