<?php
require 'conn.php';

$response = array('status' => 'error', 'message' => 'Something went wrong.');

if (isset($_POST['save'])) {
    $exname = $_POST['exname'];
    $exdesc = $_POST['exdesc'];
    $exdifficulty = $_POST['exdifficulty'];
    $focusbody = $_POST['focusbody'];
    $loseWeight = $_POST['LoseWeight'];
    $buildMuscle = $_POST['BuildMuscle'];
    $keepFit = $_POST['KeepFit'];
    
    // Get other focus areas
    $otherFocus = isset($_POST['otherFocus']) ? implode(", ", $_POST['otherFocus']) : ''; // Combine selected values

    // Handle file upload
    $target_dir = "eximg/";
    $target_file = $target_dir . basename($_FILES["eximg"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    if (isset($_POST["save"])) {
        $check = getimagesize($_FILES["eximg"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $response['message'] = 'File is not an image.';
            echo json_encode($response);
            exit;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $response['message'] = 'Sorry, file already exists.';
        echo json_encode($response);
        exit;
    }

    // Check file size (adjusting to 10MB as an example)
    if ($_FILES["eximg"]["size"] > 10000000) {
        $response['message'] = 'Sorry, your file is too large.';
        echo json_encode($response);
        exit;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $response['message'] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
        echo json_encode($response);
        exit;
    }

    // Attempt to move the uploaded file to the specified directory
    if (move_uploaded_file($_FILES["eximg"]["tmp_name"], $target_file)) {
        // File uploaded successfully, now insert into database
        $sql = "INSERT INTO exercise_records (exname, exdesc, eximg, exdifficulty, focusbody, other_Focus, LossWeight, BuildMuscle, KeepFit) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssss", $exname, $exdesc, $target_file, $exdifficulty, $focusbody, $otherFocus, $loseWeight, $buildMuscle, $keepFit);
        if ($stmt->execute()) {
            $response['status'] = 'success';
            $response['message'] = 'Exercise added successfully!';
        } else {
            $response['message'] = 'Error: ' . $conn->error;
        }
    } else {
        $response['message'] = 'Sorry, there was an error uploading your file.';
    }

    echo json_encode($response);
    exit;
}
?><?php
require 'conn.php';

$response = array('status' => 'error', 'message' => 'Something went wrong.');

if (isset($_POST['save'])) {
    $exname = $_POST['exname'];
    $exdesc = $_POST['exdesc'];
    $exdifficulty = $_POST['exdifficulty'];
    $focusbody = $_POST['focusbody'];
    $loseWeight = $_POST['LoseWeight'];
    $buildMuscle = $_POST['BuildMuscle'];
    $keepFit = $_POST['KeepFit'];
    
    // Get other focus areas
    $otherFocus = isset($_POST['otherFocus']) ? implode(", ", $_POST['otherFocus']) : ''; // Combine selected values

    // Handle file upload
    $target_dir = "eximg/";
    $target_file = $target_dir . basename($_FILES["eximg"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is an actual image or fake image
    if (isset($_POST["save"])) {
        $check = getimagesize($_FILES["eximg"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            $response['message'] = 'File is not an image.';
            echo json_encode($response);
            exit;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        $response['message'] = 'Sorry, file already exists.';
        echo json_encode($response);
        exit;
    }

    // Check file size (adjusting to 10MB as an example)
    if ($_FILES["eximg"]["size"] > 10000000) {
        $response['message'] = 'Sorry, your file is too large.';
        echo json_encode($response);
        exit;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $response['message'] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
        echo json_encode($response);
        exit;
    }

    // Attempt to move the uploaded file to the specified directory
    if (move_uploaded_file($_FILES["eximg"]["tmp_name"], $target_file)) {
        // File uploaded successfully, now insert into database
        $sql = "INSERT INTO exercise_records (exname, exdesc, eximg, exdifficulty, focusbody, other_Focus, LossWeight, BuildMuscle, KeepFit) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssssssss", $exname, $exdesc, $target_file, $exdifficulty, $focusbody, $otherFocus, $loseWeight, $buildMuscle, $keepFit);
        if ($stmt->execute()) {
            $response['status'] = 'success';
            $response['message'] = 'Exercise added successfully!';
        } else {
            $response['message'] = 'Error: ' . $conn->error;
        }
    } else {
        $response['message'] = 'Sorry, there was an error uploading your file.';
    }

    echo json_encode($response);
    exit;
}
?>
