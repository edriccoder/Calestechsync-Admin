<?php
require_once('TCPDF-main/tcpdf.php');
include 'conn.php';

if (isset($_GET['username'])) {
    $username = $_GET['username'];
    $currentDate = date('Y-m-d');

    // Initialize variables
    $weightString = $totalCalories = $dailySeconds = $activity = $birthday = $age = $levels = $belowEasySeconds = $easySeconds = $mediumSeconds = $hardSeconds = 'N/A';
    $focusGoals = []; // Initialize as an empty array
    $weeklyGoals = []; // Initialize as an empty array

    // Fetch weight
    $stmt = $conn->prepare("SELECT weight FROM bmi WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($weightString);
    $stmt->fetch();
    $stmt->close();

    // Fetch total calories burned
    $stmt2 = $conn->prepare("SELECT SUM(calories_burned) FROM calories_burned WHERE username = ? AND date = ?");
    $stmt2->bind_param("ss", $username, $currentDate);
    $stmt2->execute();
    $stmt2->bind_result($totalCalories);
    $stmt2->fetch();
    $stmt2->close();

    // Fetch exercise duration
    $stmt3 = $conn->prepare("SELECT daily_seconds FROM exercise_duration_log WHERE username = ? AND date = ?");
    $stmt3->bind_param("ss", $username, $currentDate);
    $stmt3->execute();
    $stmt3->bind_result($dailySeconds);
    $stmt3->fetch();
    $stmt3->close();

    // Fetch activity goal
    $stmt4 = $conn->prepare("SELECT activity FROM activity_goal WHERE username = ?");
    $stmt4->bind_param("s", $username);
    $stmt4->execute();
    $stmt4->bind_result($activity);
    $stmt4->fetch();
    $stmt4->close();

    // Fetch birthday and age
    $stmt5 = $conn->prepare("SELECT birthday, age FROM age WHERE username = ?");
    $stmt5->bind_param("s", $username);
    $stmt5->execute();
    $stmt5->bind_result($birthday, $age);
    $stmt5->fetch();
    $stmt5->close();

    // Fetch focus body goals
    $stmt6 = $conn->prepare("SELECT focusbody FROM focus_goal WHERE username = ?");
    $stmt6->bind_param("s", $username);
    $stmt6->execute();
    $stmt6->store_result();
    $stmt6->bind_result($focusbody);
    while ($stmt6->fetch()) {
        $focusGoals[] = $focusbody; // Populate the array
    }
    $stmt6->close();

    // Fetch levels
    $stmt7 = $conn->prepare("SELECT levels FROM level WHERE username = ?");
    $stmt7->bind_param("s", $username);
    $stmt7->execute();
    $stmt7->bind_result($levels);
    $stmt7->fetch();
    $stmt7->close();

    // Fetch weekly goal days
    $stmt8 = $conn->prepare("SELECT day FROM weekly_goal WHERE username = ?");
    $stmt8->bind_param("s", $username);
    $stmt8->execute();
    $stmt8->store_result();
    $stmt8->bind_result($day);
    while ($stmt8->fetch()) {
        $weeklyGoals[] = $day; // Populate the array
    }
    $stmt8->close();

    // Fetch EMG durations for today
    $stmt9 = $conn->prepare("SELECT below_easy_seconds, easy_seconds, medium_seconds, hard_seconds FROM user_emg_durations WHERE username = ? AND date = ?");
    $stmt9->bind_param("ss", $username, $currentDate);
    $stmt9->execute();
    $stmt9->bind_result($belowEasySeconds, $easySeconds, $mediumSeconds, $hardSeconds);
    $stmt9->fetch();
    $stmt9->close();

    // Create new PDF document
    $pdf = new TCPDF();
    $pdf->AddPage();

    // Set PDF title
    $pdf->SetTitle("User Report for $username");

    // Write HTML content
    $html = "
    <h2>User Report for {$username}</h2>
    <strong>Weight In Today:</strong> " . ($weightString ?? 'N/A') . " kg<br>
    <strong>Total Calories Burned Today:</strong> " . ($totalCalories ?? 'N/A') . " kcal<br>
    <strong>Exercise Duration Today:</strong> " . ($dailySeconds ?? 'N/A') . " seconds<br>
    <strong>Activity Goal:</strong> " . ($activity ?? 'N/A') . "<br>
    <strong>Birthday:</strong> " . ($birthday ?? 'N/A') . "<br>
    <strong>Age:</strong> " . ($age ?? 'N/A') . " years<br>
    <strong>Focus Body Goals:</strong> " . implode(", ", $focusGoals) . "<br>
    <strong>Level:</strong> " . ($levels ?? 'N/A') . "<br>
    <strong>Weekly Goal Days:</strong> " . implode(", ", $weeklyGoals) . "<br>
    <strong>Below Easy Duration:</strong> " . ($belowEasySeconds ?? 'N/A') . " seconds<br>
    <strong>Easy Duration:</strong> " . ($easySeconds ?? 'N/A') . " seconds<br>
    <strong>Medium Duration:</strong> " . ($mediumSeconds ?? 'N/A') . " seconds<br>
    <strong>Hard Duration:</strong> " . ($hardSeconds ?? 'N/A') . " seconds<br>
    ";

    // Output the HTML content
    $pdf->writeHTML($html, true, false, true, false, '');

    // Output PDF to the browser
    $pdf->Output("UserReport_$username.pdf", 'I'); // 'I' for inline output, 'D' for download
} else {
    header("Location: index.php");
    exit;
}
?>
