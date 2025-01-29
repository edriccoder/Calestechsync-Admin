<?php
include 'conn.php';

$response = array();

if (isset($_POST['update'])) {
    $excid = $_POST['excid'];
    $exname = $_POST['exname'];
    $exdesc = $_POST['exdesc'];
    $exdifficulty = $_POST['exdifficulty'];
    $focusbody = $_POST['focusbody'];
    $loseWeight = $_POST['LoseWeightEdit']; 
    $buildMuscle = $_POST['BuildMuscleEdit']; 
    $keepFit = $_POST['KeepFitEdit']; 

    // Image handling
    $imageUpdated = false;
    if (isset($_FILES['eximg']['name']) && $_FILES['eximg']['name'] != "") {
        $imageName = $_FILES['eximg']['name'];
        $imageTmpName = $_FILES['eximg']['tmp_name'];
        $imageSize = $_FILES['eximg']['size'];
        $imageError = $_FILES['eximg']['error'];
        $imageExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
        $allowedExts = array('jpg', 'jpeg', 'png', 'gif');

        // Check if the uploaded file is valid
        if (in_array($imageExt, $allowedExts) && $imageError === 0) {
            // Limit the image size (e.g., 5MB)
            if ($imageSize <= 5000000) {
                $newImageName = uniqid('', true) . "." . $imageExt;
                $imageDestination = 'uploads/exercise_images/' . $newImageName;
                move_uploaded_file($imageTmpName, $imageDestination);
                $imageUpdated = true;
            } else {
                $response['status'] = 'error';
                $response['message'] = 'Image size is too large.';
                echo json_encode($response);
                exit;
            }
        } else {
            $response['status'] = 'error';
            $response['message'] = 'Invalid image file.';
            echo json_encode($response);
            exit;
        }
    }

    // Build the query
    if ($imageUpdated) {
        $query = "UPDATE exercise_records SET exname=?, exdesc=?, exdifficulty=?, focusbody=?, LossWeight=?, BuildMuscle=?, KeepFit=?, eximg=? WHERE excid=?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssssssssi", $exname, $exdesc, $exdifficulty, $focusbody, $loseWeight, $buildMuscle, $keepFit, $newImageName, $excid);
    } else {
        $query = "UPDATE exercise_records SET exname=?, exdesc=?, exdifficulty=?, focusbody=?, LossWeight=?, BuildMuscle=?, KeepFit=? WHERE excid=?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "sssssssi", $exname, $exdesc, $exdifficulty, $focusbody, $loseWeight, $buildMuscle, $keepFit, $excid);
    }

    // Check if the query is prepared correctly
    if (!$stmt) {
        $response['status'] = 'error';
        $response['message'] = "Error: " . mysqli_error($conn);
        echo json_encode($response);
        exit;
    }

    // Execute the query
    $result = mysqli_stmt_execute($stmt);

    if (!$result) {
        $response['status'] = 'error';
        $response['message'] = "Error: " . mysqli_error($conn);
        echo json_encode($response);
        exit;
    }

    // If successful
    $response['status'] = 'success';
    $response['message'] = 'Exercise updated successfully!';
    echo json_encode($response);
}
?>