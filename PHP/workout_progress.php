<?php
include 'database.php'; 

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['repetitions'], $_POST['duration'], $_POST['weights'])) {

    $repetitions = $_POST['repetitions'];
    $durations = $_POST['duration'];
    $weights = $_POST['weights'];

    if (count($repetitions) === count($durations) && count($durations) === count($weights)) {
        for ($i = 0; $i < count($repetitions); $i++) {
            $reps = $repetitions[$i];
            $duration = $durations[$i];
            $weight = $weights[$i];

            $query = "INSERT INTO progressdb (repetitions, duration, weights) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($query);
            $stmt->bind_param('iii', $reps, $duration, $weight);

            if (!$stmt->execute()) {
                echo "Error: " . $conn->error;
            }
        }
        echo '<script>alert("Workout data saved successfully!");</script>';
        
        // Redirect to avoid form resubmission on page reload
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    } else {
        echo '<script>alert("Data mismatch!");</script>';
    }
}

$conn->close();
?>
