<?php
// getUsers.php

require_once 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Define the admin username
    $adminUser = "Admin";

    // Prepare the SQL query to fetch unique users who have conversed with the admin
    $query = "SELECT DISTINCT sender AS user FROM messages WHERE receiver = ?
              UNION
              SELECT DISTINCT receiver AS user FROM messages WHERE sender = ? AND receiver != ?";

    $stmt = $conn->prepare($query);
    if ($stmt) {
        $stmt->bind_param("sss", $adminUser, $adminUser, $adminUser);
        
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            $users = array();
            
            while ($row = $result->fetch_assoc()) {
                $user = htmlspecialchars($row['user'], ENT_QUOTES, 'UTF-8');
                if ($user !== $adminUser) { // Exclude admin if necessary
                    $users[] = $user;
                }
            }
            
            // Return the users as a JSON array
            header('Content-Type: application/json');
            echo json_encode($users);
        } else {
            // Log SQL execution error
            error_log("SQL Execution Error in getUsers: " . $stmt->error);
            echo json_encode([]);
        }
        
        $stmt->close();
    } else {
        // Log SQL preparation error
        error_log("SQL Preparation Error in getUsers: " . $conn->error);
        echo json_encode([]);
    }
} else {
    echo json_encode([]);
}
?>
