<?php
include 'conn.php'; // Include your database connection file

if (isset($_POST['archive']) && isset($_POST['user_id'])) {
    $archive_status = $_POST['archive'];
    $user_id = $_POST['user_id'];

    // Update the archive status in the database
    $query = "UPDATE user SET archive='$archive_status' WHERE id='$user_id'";
    $run = mysqli_query($conn, $query);

    if ($run) {
        // Redirect back to the page where the user list is displayed
        header("Location: UserProfile.php");
        exit(); // Stop further execution
    } else {
        echo "Failed to update archive status.";
    }
} else {
    // Redirect back to the page where the user list is displayed if the form data is incomplete
    header("Location: UserProfile.php");
    exit(); // Stop further execution
}
?>
