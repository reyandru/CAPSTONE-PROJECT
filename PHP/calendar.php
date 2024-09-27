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
  <title>Real Deal Gym</title>
  <link rel="icon" href="assets/logs.png">
  <link rel="stylesheet" href="../CSS/calendar.css" />
</head>
<body>
  <header>
    <div class="logo">
      <a href="#"><img src="../assets/logs.png" alt="Logo" height="80"></a>
      <h6>Real Deal Gym</h6>
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
        <a href="logout.php"> <button class="logOutBtn">LOG OUT</button></a>
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
        <a href="home.php"><img src="../assets/homes.png" alt="" height="15">Home |</a><p>Calendar</p> 
        </div>
        <div class="memberName">
          <p>Welcome, <?php echo htmlspecialchars($username); ?>!</p>
        </div>
      </div>
      <div class="const2">
        <div class="wrapper">
          <div class="container-calendar">
              <div id="left">
                  <h1>Workout Calendar</h1>
                  <div id="event-section">
                      <h3>Add Event</h3>
                      <input type="date" id="eventDate">
                      <input type="text"
                          id="eventTitle"
                          placeholder="Event Title">
                      <input type="text"
                          id="eventDescription"
                          placeholder="Event Description">
                      <button id="addEvent" onclick="addEvent()">
                          Add
                      </button>
                  </div>
                  <div id="reminder-section">
                      <h3>Reminders</h3>
                      <!-- List to display reminders -->
                      <ul id="reminderList">
                          <li data-event-id="1">
                              <strong>Event Title</strong>
                              - Event Description on Event Date
                              <button class="delete-event"
                                  onclick="deleteEvent(1)">
                                  Delete
                              </button>
                          </li>
                      </ul>
                  </div>
              </div>
              <div id="right">
                  <h3 id="monthAndYear"></h3>
                  <div class="button-container-calendar">
                      <button id="previous"
                              onclick="previous()">
                          ‹
                      </button>
                      <button id="next"
                              onclick="next()">
                          ›
                      </button>
                  </div>
                  <table class="table-calendar"
                      id="calendar"
                      data-lang="en">
                      <thead id="thead-month"></thead>
                      <!-- Table body for displaying the calendar -->
                      <tbody id="calendar-body"></tbody>
                  </table>
                  <div class="footer-container-calendar">
                      <label for="month">Jump To: </label>
                      <!-- Dropdowns to select a specific month and year -->
                      <select id="month" onchange="jump()">
                          <option value=0>Jan</option>
                          <option value=1>Feb</option>
                          <option value=2>Mar</option>
                          <option value=3>Apr</option>
                          <option value=4>May</option>
                          <option value=5>Jun</option>
                          <option value=6>Jul</option>
                          <option value=7>Aug</option>
                          <option value=8>Sep</option>
                          <option value=9>Oct</option>
                          <option value=10>Nov</option>
                          <option value=11>Dec</option>
                      </select>
                      <!-- Dropdown to select a specific year -->
                      <select id="year" onchange="jump()"></select>
                  </div>
              </div>
          </div>
      </div>

      </div>
  
    <script src="../Javascript/calendar.js"></script>
</body>
</html>
