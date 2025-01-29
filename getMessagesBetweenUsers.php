<?php
// getMessagesBetweenUsers.php

require_once 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['contact'])) {
        $contact = trim($_GET['contact']);
        
        if ($contact === '') {
            echo json_encode([]);
            exit;
        }

        // Define the admin username
        $adminUser = "Admin";

        // Prepare the SQL query to fetch messages between admin and contact
        $query = "SELECT sender, receiver, message, timestamp 
                  FROM messages 
                  WHERE (sender = ? AND receiver = ?) OR (sender = ? AND receiver = ?)
                  ORDER BY timestamp ASC";

        $stmt = $conn->prepare($query);
        if ($stmt) {
            $stmt->bind_param("ssss", $adminUser, $contact, $contact, $adminUser);
            
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                $messages = array();
                
                while ($row = $result->fetch_assoc()) {
                    $messages[] = array(
                        'sender' => htmlspecialchars($row['sender'], ENT_QUOTES, 'UTF-8'),
                        'receiver' => htmlspecialchars($row['receiver'], ENT_QUOTES, 'UTF-8'),
                        'message' => htmlspecialchars($row['message'], ENT_QUOTES, 'UTF-8'),
                        'timestamp' => $row['timestamp']
                    );
                }
                
                // Return the messages as a JSON array
                header('Content-Type: application/json');
                echo json_encode($messages);
            } else {
                // Log SQL execution error
                error_log("SQL Execution Error in getMessagesBetweenUsers: " . $stmt->error);
                echo json_encode([]);
            }
            
            $stmt->close();
        } else {
            // Log SQL preparation error
            error_log("SQL Preparation Error in getMessagesBetweenUsers: " . $conn->error);
            echo json_encode([]);
        }
    } else {
        echo json_encode([]);
    }
} else {
    echo json_encode([]);
}
?>
