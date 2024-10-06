<?php
session_start();
include('database.php'); 
if (!isset($_SESSION['login_email'])) {
  header("Location: login.php"); 
  exit();
}

$email = $_SESSION['login_email'];
$sql = "SELECT * FROM registerdb WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

$user = $result->fetch_assoc();
$username = $user['firstname'] . ' ' . $user['lastname']; 

$login_email = $_SESSION['login_email'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $goalWeight = $_POST['goalWeight'];
    $startingWeight = $_POST['startingWeight'];
    $currentWeight = $_POST['currentWeight'];

    $stmt = $conn->prepare("INSERT INTO progressdb (goalW, startW, currentW) VALUES (?, ?, ?)");
    $stmt->bind_param("ddd", $goalWeight, $startingWeight, $currentWeight); // d for double

    if ($stmt->execute()) {
        echo "<script>alert('Progress data saved successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }


    $stmt->close();
}

// Make sure you close the connection at the end
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <title>Real Deal Gym</title>
    <link rel="icon" href="assets/logs.png">
    <link rel="stylesheet" href="../CSS/Progress.css" />
  </head>
  <body>
    <header>
      <div class="logo"> 
        <a href="../HTML/Home.html"><img src="../assets/logs.png" alt="Logo" height="80"></a>
        <h6>REAL DEAL GYM</h6> </div>

    
      <div class="left-container">
        <div class="userProfil">
          <a href="profile.html">
            <img src="<?php echo !empty($user['profile_pic']) ? $user['profile_pic'] : '../assets/defProf.webp'; ?>" height="50" alt="" class="img-container">
      
            <p class="userName"><?php echo htmlspecialchars($username); ?></p> 
      
          </a>
        <div class="consts-dropDown">
          <button class="dropDown" onclick=""> <img src="../assets/dropdown.png" alt="" height="50" width="45px"></button>
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
          <div class="progress-container">

            <!-- //Weight progress -->
            <div class="weightScale">
              <div class="weights">
                <div class="weightInfo">
                  <h1>Weight</h1>
                  <div class="percentages"> 
                    <div class="outlineB">
                      <div id="circle">0%</div>
                    </div>
                  </div>  
                  <form method="POST" action="progress.php">
                    <div id="goalWeight">      
                      <label for="goal" id="goalWeights">Goal Weight:</label>
                      <input class="inputsWeightProgress" id="goalW" name="goalWeight" type="number" placeholder="">
                    </div>
                </div>

                <div class="weightAdd">
                  <div class="kgs"> </div>
                  <div id="outputWeight"></div>

                  <button id="addBtnWeights" type="button">Weights in kilo<img src="../assets/addBtnWeight.png" alt="" height="30"></button>
                  <div id="inputWeight">
                    <button id="xBtnWeight" type="button">x</button>
                    <div class="weightsNo">
                      <div>
                        <label for="startWeight" id="noOfW">Starting Weight:</label>
                        <input class="inputsWeightProgress" name="startingWeight" id="startW" type="number" placeholder="">
                      </div>
                      <div>
                        <label for="weights" id="noOfW">Current Weight:</label>
                        <input class="inputsWeightProgress" name="currentWeight" id="weights" type="number" placeholder="">
                      </div>

                      <button id="addWeights" type="submit">ADD</button>
                    </div>
                  </div>
                </div>
              </div>
              </form>
</div>
            <!-- //workout progress -->
            <div class="workoutProg">
              <div class="progress-conts">
                <div class="header-progress">
                  <div class="workoutsProg">
                    <h1>Workout Progress</h1>
                  </div>
                  <div class="progress-percentage"> 
                    <div class="outlineBorder">
                      <div id="circleContainer">0%</div>
                    </div>
                  </div>  
                </div>

                <div id="input-WOprogress">
                  <div id="outCont">
                  </div>

                  <div class="workoutProgression">
                    <label for="mon"><input type="checkbox" name="monday" id="mond" value="monday">Monday</label><br>
                    <label for="tues"><input type="checkbox" name="tuesday" id="tues" value="tuesday">Tuesday</label><br>
                    <label for="wed"><input type="checkbox" name="wednesday" id="wed" value="wednesday">Wednesday</label><br>
                    <label for="thurs"><input type="checkbox" name="thursday" id="thurs" value="thursday">Thursday</label><br>
                    <label for="fri"><input type="checkbox" name="friday" id="fri" value="friday">Friday</label><br>
                    <label for="sat"><input type="checkbox" name="saturday" id="sat" value="saturday">Saturday</label><br>
                    <label for="sun"><input type="checkbox" name="sunday" id="sun" value="sunday">Sunday</label><br>

                    <div>
                      <button id="submitWO">Reset</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- //Feedback -->
            <div class="feedback">
              <div class="fb">
                <div class="feedb">
                  <h1>Note</h1>
                  <div class="modal-body">
                    <textarea id="feedback-conts" placeholder="Make a note.."></textarea>
                  </div>        
                  <div id="fb-conts"> </div>
                  <button type="submit"  id ="submit-btn-fb">Submit</button>
                  <button id="edit-btn-fb">Edit</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
   
    <script src="../Javascript/Progress.js"></script>
  </body>
</html>
