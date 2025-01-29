<?php
$servername = "localhost";
$username = "u766798681_admin_db";
$password = "Limpiado_123";
$db_name = "u766798681_admin_db";

$conn = new mysqli($servername, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $email = $_POST["email"];
    $messages = $_POST["messages"]; 

    $stmt = $conn->prepare("INSERT INTO feedback (username, email, messages) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $user, $email, $messages);

    if ($stmt->execute()) {
        echo "<script>window.location='feedback_sent.php'</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>