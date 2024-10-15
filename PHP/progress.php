<?php
session_start();

if (!isset($_SESSION['login_email'])) {
    header("Location: login.php");
    exit();
}

include 'database.php';  

$email = $_SESSION['login_email'];
$sql = "SELECT * FROM registerdb WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

$user = $result->fetch_assoc();
$username = trim($user['firstname'] . ' ' . $user['lastname']);  

$stmt->close();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $goalWeight = $_POST['goalWeight'] ?? null;
    $startWeight = $_POST['startingWeight'] ?? null;
    $currentWeight = $_POST['currentWeight'] ?? null;

    if (is_numeric($goalWeight) && is_numeric($startWeight) && is_numeric($currentWeight)) {
        
        $stmt = $conn->prepare("SELECT * FROM progressdb WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $updateStmt = $conn->prepare("UPDATE progressdb SET goalW = ?, startW = ?, currentW = ? WHERE username = ?");
            $updateStmt->bind_param("ddds", $goalWeight, $startWeight, $currentWeight, $username);

            if ($updateStmt->execute()) {
                echo "Progress updated successfully.";
            } else {
                echo "Error updating progress: " . $updateStmt->error;
            }
            $updateStmt->close();
        } else {
            $insertStmt = $conn->prepare("INSERT INTO progressdb (username, goalW, startW, currentW) VALUES (?, ?, ?, ?)");
            $insertStmt->bind_param("sddd", $username, $goalWeight, $startWeight, $currentWeight);

            if ($insertStmt->execute()) {
                echo "alert('New progress record added.')";
            } else {
                echo "Error adding new progress: " . $insertStmt->error;
            }
            $insertStmt->close();
        }
    } else {
        echo '<script>alert("Invalid input: Please enter numeric values for weights.");</script>';
    }
}

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
    <link rel="icon" href="../assets/logs.png">
    <link rel="stylesheet" href="../CSS/Progress.css" />
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
        </div>

        <form method="POST" action="progress.php" class="formWeight">
            <div id="goalWeight">
                <label for="goal" id="goalWeights">Goal Weight:</label>
                <input class="inputsWeightProgress" id="goalW" name="goalWeight" type="number" placeholder="">
            </div>
            <div class="typeGoals" id="chooseTypes">
                <label for="goalType" class="goalTypes">Goal Type:</label>
                <select id="goalType" name="goalType">
                    <option value="lose" class="loseW" id="loseWeights">Lose Weight</option>
                    <option value="gain" class="gainW"id="gainWeights">Gain Weight</option>
                </select>
            </div>
            <div class="weightAdd">
                <div class="kgs"></div>
                <div id="outputWeight"></div>

                <button id="addBtnWeights" type="button">Weights in kilo
                    <img src="../assets/addBtnWeight.png" alt="" height="30">
                </button>

                <div id="inputWeight">
                    <button id="xBtnWeight" type="button">x</button>
                    <div>
                        <label for="weights" id="noOfW">Current Weight:</label>
                        <input class="inputsWeightProgress" name="currentWeight" id="currentWeights" type="number" placeholder="">
                    </div>

                    <button id="addWeights" type="submit">ADD</button>
                </div>
            </div>
        </form>
    </div>
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
