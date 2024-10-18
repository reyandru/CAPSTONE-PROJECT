<?php 
  include 'workout_progress.php';
  include 'weight_progress.php';
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
                </div>
            <div class="containerProgress">  
              <div class="graphProgress">
              <?php
                include 'database.php'; 
                $dates = [];
                $repetitions = [];
                $weights = [];
                $durations = [];

                $query = "
                SELECT DATE(workout_date) AS WorkoutDate, repetitions, weights, duration 
                FROM progressdb 
                WHERE workout_date >= NOW() - INTERVAL 7 DAY
                ORDER BY WorkoutDate
            ";
            

                $result = $conn->query($query);

                if ($result) {
                    while ($row = $result->fetch_assoc()) {
                        $dates[] = $row['WorkoutDate'];
                        $repetitions[] = $row['repetitions'];
                        $weights[] = $row['weights'];
                        $durations[] = $row['duration'];
                    }
                } else {
                    echo "Database error: " . htmlspecialchars($conn->error);
                }
            ?>

                <canvas id="membershipChart" width="400" height="400"></canvas>
              </div>

              <form action="progress.php" method="post">
                <div id="input-WOprogress">
                  <div class="workoutProgression">
                    <div class="progressTable">
                      <table class="tableOfProgress">
                        <tr>
                          <th>Days</th>
                          <th>Repetitions</th>
                          <th>Duration (mins)</th>
                          <th>Weights (kg)</th>
                        </tr>
                        <tr>
                          <th>Day 1</th>
                          <th><input type="number" name="repetitions[]"></th>
                          <th><input type="number" name="duration[]"></th>
                          <th><input type="number" name="weights[]"></th>
                        </tr>
                        <tr>
                          <th>Day 2</th>
                          <th><input type="number" name="repetitions[]"></th>
                          <th><input type="number" name="duration[]"></th>
                          <th><input type="number" name="weights[]"></th>
                        </tr>
                        <tr>
                          <th>Day 3</th>
                            <th><input type="number" name="repetitions[]"></th>
                            <th><input type="number" name="duration[]"></th>
                            <th><input type="number" name="weights[]"></th>
                        </tr>
                        <tr>
                            <th>Day 4</th>
                            <th><input type="number" name="repetitions[]"></th>
                            <th><input type="number" name="duration[]"></th>
                            <th><input type="number" name="weights[]"></th>
                        </tr>
                        <tr>
                            <th>Day 5</th>
                            <th><input type="number" name="repetitions[]"></th>
                            <th><input type="number" name="duration[]"></th>
                            <th><input type="number" name="weights[]"></th>
                        </tr>
                        <tr>
                            <th>Day 6</th>
                            <th><input type="number" name="repetitions[]"></th>
                            <th><input type="number" name="duration[]"></th>
                            <th><input type="number" name="weights[]"></th>
                        </tr>
                        <tr>
                            <th>Day 7</th>
                            <th><input type="number" name="repetitions[]"></th>
                            <th><input type="number" name="duration[]"></th>
                            <th><input type="number" name="weights[]"></th>
                        </tr>
                        </table>
                        </div>
                        <div class="submitBtnProgress">
                          <button type="submit">Submit</button>
                        </div>
                      </div>
                    </div>
              </form>

            </div>
             
              </div>
            </div>

          </div>
        </div>
      </main>
    </div>
   
    <script src="../Javascript/Progress.js"></script>
    <script>
const ctx = document.getElementById('membershipChart').getContext('2d');

const membershipChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?php echo json_encode($dates); ?>,
        datasets: [
            {
                label: 'Repetitions',
                data: <?php echo json_encode($repetitions); ?>,
                borderColor: 'rgba(255, 255, 255, 0.8)',
                borderWidth: 3,
                pointRadius: 5,
                pointBackgroundColor: 'white',
                fill: false, // No fill
                tension: 0 // Straight lines
            },
            {
                label: 'Weights (kg)',
                data: <?php echo json_encode($weights); ?>,
                borderColor: 'rgba(255, 255, 0, 0.8)',
                borderWidth: 3,
                pointRadius: 5,
                pointBackgroundColor: 'yellow',
                fill: false, // No fill
                tension: 0 // Straight lines
            },
            {
                label: 'Duration (mins)',
                data: <?php echo json_encode($durations); ?>,
                borderColor: 'rgba(0, 255, 255, 0.8)',
                borderWidth: 3,
                pointRadius: 5,
                pointBackgroundColor: 'cyan',
                fill: false, // No fill
                tension: 0 // Straight lines
            }
        ]
    },
    options: {
        responsive: true,
        scales: {
            x: {
                ticks: {
                    color: 'white',
                    font: {
                        family: 'Arial',
                        size: 14,
                        weight: 'bold'
                    }
                },
                grid: {
                    color: 'rgba(255, 255, 255, 0.1)'
                }
            },
            y: {
                beginAtZero: true,
                ticks: {
                    color: 'white',
                    font: {
                        family: 'Arial',
                        size: 14,
                        weight: 'bold'
                    }
                },
                grid: {
                    color: 'rgba(255, 255, 255, 0.1)'
                }
            }
        },
        plugins: {
            legend: {
                labels: {
                    color: 'white',
                    font: {
                        family: 'Arial',
                        size: 16,
                        weight: 'bold'
                    }
                }
            },
            tooltip: {
                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                titleColor: 'white',
                bodyColor: 'white',
                bodyFont: {
                    family: 'Arial',
                    size: 14
                }
            }
        },
        layout: {
            padding: {
                left: 20,
                right: 20,
                top: 20,
                bottom: 20
            }
        },
        elements: {
            line: {
                borderJoinStyle: 'round'
            }
        }
    }
});

ctx.canvas.parentNode.style.backgroundColor = 'rgba(50, 50, 50, 1)'; 
</script>


  </body>
</html>
