<?php
// sendMessage.php

require_once 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize POST parameters
    $sender = isset($_POST['sender']) ? trim($_POST['sender']) : '';
    $receiver = isset($_POST['receiver']) ? trim($_POST['receiver']) : '';
    $message = isset($_POST['message']) ? trim($_POST['message']) : '';

    // Validate inputs
    if ($sender === '' || $receiver === '' || $message === '') {
        echo "Error: Sender, receiver, and message are required.";
        exit;
    }

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO messages (sender, receiver, message) VALUES (?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("sss", $sender, $receiver, $message);
        
        if ($stmt->execute()) {
            echo "Message sent successfully";
        } else {
            // Log SQL execution error
            error_log("SQL Execution Error in sendMessage: " . $stmt->error);
            echo "Error: Unable to send message.";
        }
        
        $stmt->close();
    } else {
        // Log SQL preparation error
        error_log("SQL Preparation Error in sendMessage: " . $conn->error);
        echo "Error: Unable to prepare statement.";
    }
} else {
    echo "Error: Invalid request method.";
}
?>
