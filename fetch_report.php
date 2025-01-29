<?php
include 'conn.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

$currentDate = date('Y-m-d');
$selectedDate = $currentDate; // Default to today's date

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    
    // Check if a date was submitted and update selectedDate
    if (isset($_POST['date']) && !empty($_POST['date'])) {
        $selectedDate = $_POST['date'];
    }

    // Fetch weight from 'bmi' table
    $stmt1 = $conn->prepare("SELECT weight FROM bmi WHERE username = ?");
    $stmt1->bind_param("s", $username);
    $stmt1->execute();
    $stmt1->store_result();
    $stmt1->bind_result($weightString);
    $stmt1->fetch();
    $stmt1->close();

    // Fetch total calories burned for the selected date
    $stmt3 = $conn->prepare("SELECT SUM(`calories_burned`) AS total_calories FROM `calories_burned` WHERE `username` = ? AND `date` = ?");
    $stmt3->bind_param("ss", $username, $selectedDate);
    $stmt3->execute();
    $stmt3->store_result();
    $stmt3->bind_result($totalCalories);
    $stmt3->fetch();
    $stmt3->close();

    // Fetch total seconds of exercise for the selected date
    $stmt5 = $conn->prepare("SELECT daily_seconds FROM exercise_duration_log WHERE username = ? AND date = ?");
    $stmt5->bind_param("ss", $username, $selectedDate);
    $stmt5->execute();
    $stmt5->store_result();
    $stmt5->bind_result($dailySeconds);
    $stmt5->fetch();
    $stmt5->close();

    // Fetch activity
    $stmt6 = $conn->prepare("SELECT activity FROM activity_goal WHERE username = ?");
    $stmt6->bind_param("s", $username);
    $stmt6->execute();
    $stmt6->store_result();
    $stmt6->bind_result($activity);
    $stmt6->fetch();
    $stmt6->close();

    // Fetch birthday and age
    $stmt7 = $conn->prepare("SELECT birthday, age FROM age WHERE username = ?");
    $stmt7->bind_param("s", $username);
    $stmt7->execute();
    $stmt7->store_result();
    $stmt7->bind_result($birthday, $age);
    $stmt7->fetch();
    $stmt7->close();

    // Fetch focusbody (all rows)
    $stmt8 = $conn->prepare("SELECT focusbody FROM focus_goal WHERE username = ?");
    $stmt8->bind_param("s", $username);
    $stmt8->execute();
    $stmt8->store_result();
    $stmt8->bind_result($focusbody);
    $focusGoals = [];
    while ($stmt8->fetch()) {
        $focusGoals[] = $focusbody;
    }
    $stmt8->close();

    // Fetch levels
    $stmt9 = $conn->prepare("SELECT levels FROM level WHERE username = ?");
    $stmt9->bind_param("s", $username);
    $stmt9->execute();
    $stmt9->store_result();
    $stmt9->bind_result($levels);
    $stmt9->fetch();
    $stmt9->close();

    // Prepare the statement to fetch distinct dates
        $stmt12 = $conn->prepare("SELECT DISTINCT date FROM exercise_duration_log WHERE username = ?");
        $stmt12->bind_param("s", $username);
        $stmt12->execute();
        $stmt12->store_result();
        $stmt12->bind_result($date);
        $dates = []; // Initialize an array to hold the dates

        // Fetch all results
        while ($stmt12->fetch()) {
            $dates[] = $date; // Add each date to the array
        }

        // Check if reset button was pressed
        if (isset($_POST['reset'])) {
            $selectedDate = ""; // Reset the selected date
        } elseif (isset($_POST['date'])) {
            $selectedDate = $_POST['date']; // Set selected date from the form submission
        } else {
            $selectedDate = ""; // Default state
        }


    // Fetch weekly goal days
    $stmt10 = $conn->prepare("SELECT day FROM weekly_goal WHERE username = ?");
    $stmt10->bind_param("s", $username);
    $stmt10->execute();
    $stmt10->store_result();
    $stmt10->bind_result($day);
    $weeklyGoals = [];
    while ($stmt10->fetch()) {
        $weeklyGoals[] = $day;
    }
    $stmt10->close();

    // Fetch weight logs for the last 3 months
    $table = "weight_logs"; // Change this to your actual table name
    $stmt4 = $conn->prepare("SELECT weight, log_date 
                            FROM $table 
                            WHERE username = ? 
                                AND log_date >= DATE_SUB(CURDATE(), INTERVAL 3 MONTH)
                            ORDER BY log_date ASC");
    $stmt4->bind_param("s", $username);
    $stmt4->execute();
    $stmt4->store_result();
    $stmt4->bind_result($weight, $log_date);

    // Fetch EMG durations for the selected date
    $stmt11 = $conn->prepare("SELECT below_easy_seconds, easy_seconds, medium_seconds, hard_seconds 
    FROM user_emg_durations 
    WHERE username = ? AND date = ?");
    $stmt11->bind_param("ss", $username, $selectedDate);
    $stmt11->execute();
    $stmt11->store_result();
    $stmt11->bind_result($belowEasySeconds, $easySeconds, $mediumSeconds, $hardSeconds);
    $stmt11->fetch();
    $stmt11->close();

    // Prepare data for chart
    $weights = [];
    $dates = [];
    while ($stmt4->fetch()) {
        $weights[] = $weight;
        $dates[] = $log_date;
    }
    $stmt4->close();

 

} else {
    // Redirect if no username is set
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Report</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .report-container {
            margin-top: 50px;
            padding: 20px;
            border-radius: 10px;
            background-color: white;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #007bff;
        }
        .report-data {
            font-size: 1.2em;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    

<div class="container report-container">
    
    <h2>User Report for <?php echo htmlspecialchars($username); ?></h2>
    
    <form method="POST" class="mb-3">
        <input type="hidden" name="username" value="<?php echo htmlspecialchars($username); ?>">
        <label for="date">Select Date:</label>
        <select id="date" name="date" required>
            <option value="">-- Select a Date --</option> <!-- Default option -->
            <?php if (!empty($dates)): ?>
                <?php foreach ($dates as $date): ?>
                    <option value="<?php echo htmlspecialchars($date); ?>" <?php echo ($date === $selectedDate) ? 'selected' : ''; ?>>
                        <?php echo htmlspecialchars($date); ?>
                    </option>
                <?php endforeach; ?>
            <?php endif; ?>
        </select>
        <button type="submit" class="btn btn-primary">Filter</button>
        <button type="submit" name="reset" class="btn btn-secondary">Reset Filter</button>
    </form>

    
    <div class="report-data">
        <strong>Weight In Today:</strong> <?php echo htmlspecialchars($weightString ?? 'N/A'); ?> kg
    </div>
    <div class="report-data">
        <strong>Total Calories Burned:</strong> <?php echo htmlspecialchars($totalCalories ?? 'N/A'); ?> kcal
    </div>
    <div class="report-data">
        <strong>Exercise Duration:</strong> <?php echo htmlspecialchars($dailySeconds ?? 'N/A'); ?> seconds
    </div>
    <div class="report-data">
        <strong>Activity Goal:</strong> <?php echo htmlspecialchars($activity ?? 'N/A'); ?>
    </div>
    <div class="report-data">
        <strong>Birthday:</strong> <?php echo htmlspecialchars($birthday ?? 'N/A'); ?>
    </div>
    <div class="report-data">
        <strong>Age:</strong> <?php echo htmlspecialchars($age ?? 'N/A'); ?> years
    </div>
    <div class="report-data">
        <strong>Focus Body Goals:</strong> <?php echo htmlspecialchars(implode(", ", $focusGoals) ?? 'N/A'); ?>
    </div>
    <div class="report-data">
        <strong>Level:</strong> <?php echo htmlspecialchars($levels ?? 'N/A'); ?>
    </div>
    <div class="report-data">
        <strong>Weekly Goal Days:</strong> <?php echo htmlspecialchars(implode(", ", $weeklyGoals) ?? 'N/A'); ?>
    </div>

    <div class="report-data">
        <strong>Below Easy Duration:</strong> <?php echo htmlspecialchars($belowEasySeconds ?? 'N/A'); ?> seconds
    </div>
    <div class="report-data">
        <strong>Easy Duration:</strong> <?php echo htmlspecialchars($easySeconds ?? 'N/A'); ?> seconds
    </div>
    <div class="report-data">
        <strong>Medium Duration:</strong> <?php echo htmlspecialchars($mediumSeconds ?? 'N/A'); ?> seconds
    </div>
    <div class="report-data">
        <strong>Hard Duration:</strong> <?php echo htmlspecialchars($hardSeconds ?? 'N/A'); ?> seconds
    </div>

    <!-- Chart Section -->
    <canvas id="weightChart" width="400" height="200"></canvas>
    
    <a href="UserProfile.php" class="btn btn-primary mt-3">Back to Users</a>
    <a href="generate_report_user.php?username=<?php echo urlencode($username); ?>" class="btn btn-success mt-3">Generate Report</a>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    $(document).ready(function() {
        // Prepare the data for the chart
        var ctx = document.getElementById('weightChart').getContext('2d');
        var weightChart = new Chart(ctx, {
            type: 'line', // Line chart
            data: {
                labels: <?php echo json_encode($dates); ?>,
                datasets: [{
                    label: 'Weight Over Last 3 Months',
                    data: <?php echo json_encode($weights); ?>,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderWidth: 2,
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

</body>
</html>
