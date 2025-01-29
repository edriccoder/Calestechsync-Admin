<?php   
require 'conn.php'; 

if (isset($_GET['userid'], $_GET['fname'], $_GET['lname'], $_GET['mname'], $_GET['phone'])) {  
    $userid = $_GET['userid']; 
    $fname = $_GET['fname'];
    $lname = $_GET['lname'];
    $mname = $_GET['mname'];
    $phone = $_GET['phone']; 

    // Corrected SQL query
    $insert = mysqli_query($conn, "INSERT INTO `archive_info` (`fname`, `lname`, `mname`, `phone`) SELECT `$fname`, `$lname`, `$mname`, `$phone` FROM `user_info`");

    // Check if the insert was successful before deleting
    if ($insert) {
        $delete = mysqli_query($conn, "DELETE FROM `user_info` WHERE userid = '$userid'");
    } else {
        echo "Error: " . mysqli_error($conn); // Display error message for debugging
    }
}
?>  