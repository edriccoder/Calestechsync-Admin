<?php
include 'conn.php';

if (isset($_POST['excid'])) {
    $excid = $_POST['excid'];

    // Step 1: Retrieve the image filename from the database
    $query = "SELECT eximg FROM exercise_records WHERE excid=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $excid);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $eximg);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    // Step 2: Delete the exercise record
    $query = "DELETE FROM exercise_records WHERE excid=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $excid);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        // Step 3: Delete the image file if it exists
        if ($eximg && file_exists($eximg)) {
            unlink($eximg); // Delete the file
        }
        echo json_encode(array("success" => "Delete successful."));
    } else {
        echo json_encode(array("error" => "Failed to delete exercise. Please try again."));
    }
} else {
    echo json_encode(array("error" => "Exercise ID is not provided."));
}
?>
