<?php
require 'conn.php';

if(isset($_POST['btnReg'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $mname = $_POST['mname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pass = $_POST['pass1'];
    $rpass = $_POST['pass2'];
    $userid = $_POST['userid'];

    if($pass == $rpass) {
        $sql1 = $conn->query("INSERT INTO `user_cred` (`email`, `password`) VALUES ('$email','$pass')");
        $sql2 = $conn->query("INSERT INTO `user_info` (`fname`, `lname`, `mname`, `phone`) VALUES ( '$fname','$lname','$mname','$phone')");

        if($sql1 && $sql2) {
            echo "<script>alert('Register Complete!');window.location='login.php'</script>";
        } else {
            echo "<script>alert('Error');window.location='register.php'</script>";
        }
    } else {
        echo "<script>alert('Passwords do not match!');window.location='register.php'</script>";
    }
}
?>