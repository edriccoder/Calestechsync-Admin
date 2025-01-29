<?php

require 'conn.php';
session_start();

// Count rows
if(ISSET($_POST['btnlogin'])){
    $email = $_POST['email_admin'];
    $pass = $_POST['pass_admin'];
    
    $sql = $conn->query("SELECT * FROM user_cred WHERE email = '$email' AND password = '$pass'");

    if(mysqli_num_rows($sql)>0){
        
        // Get user details
        $getuserID = mysqli_fetch_assoc($sql);
        $userID = $getuserID['userid'];

        $sqluserinfo = $conn->query("SELECT * FROM user_info WHERE userid = '$userID'");
        $row = mysqli_fetch_assoc($sqluserinfo);

        $fullname = $row['fname']." ".$row['lname'];
        $_SESSION['name'] =$fullname;
        echo "<script>window.location='index.php'</script>";

        $sql = $conn->query("SELECT COUNT(*) as count FROM exercise_records");
        $rowCount = mysqli_fetch_assoc($sql)['count'];
        $_SESSION['exercise'] = $rowCount;

        $sql2 = $conn->query("SELECT COUNT(*) as count FROM user");
        $rowCount2 = mysqli_fetch_assoc($sql2)['count'];
        $_SESSION['users'] = $rowCount2;

        $sql3 = $conn->query("SELECT COUNT(*) as count FROM feedback");
        $rowCount3 = mysqli_fetch_assoc($sql3)['count'];
        $_SESSION['feedback'] = $rowCount3;


    }else{
        
        echo "<script>alert('Invalid login Try Again!');window.location='login.php'</script>";
    }
}
?>