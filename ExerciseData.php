<!DOCTYPE html>
<html lang="en">
<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['name'])) {
    // Display a message and redirect the user to the login page
    echo "You must be logged in.";
    header("Location: notLoggedIn.php");
    exit;
}
?>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

    <?php include 'sidebar.php'; ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['name'] ?></span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">
                        <i class= "fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Exercise Records</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-flex mb-0">
                                <!-- Category Dropdown -->
                                <div class="dropdown mr-1">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="categoryDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Select Category
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="categoryDropdown">
                                        <a class="dropdown-item" href="#" data-category="Abs">Abs</a>
                                        <a class="dropdown-item" href="#" data-category="Arms">Arms</a>
                                        <a class="dropdown-item" href="#" data-category="Back">Back</a>
                                        <a class="dropdown-item" href="#" data-category="Cardio">Cardio</a>
                                        <a class="dropdown-item" href="#" data-category="Chest">Chest</a>
                                        <a class="dropdown-item" href="#" data-category="Legs">Legs</a>
                                    </div>
                                </div>
                            
                                <!-- Level Dropdown -->
                                <div class="dropdown mr-1">
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="levelDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Select Level
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="levelDropdown">
                                        <a class="dropdown-item" href="#" data-diff="all">All</a>
                                        <a class="dropdown-item" href="#" data-diff="Beginner">Beginner</a>
                                        <a class="dropdown-item" href="#" data-diff="Intermediate">Intermediate</a>
                                        <a class="dropdown-item" href="#" data-diff="Advance">Advance</a>
                                    </div>
                                </div>
                            
                                <!-- Reset Filter Button -->
                                <button class="btn btn-primary mr-1" id="resetFilter">Reset Filter</button>
                            
                                <!-- Add Exercise Button -->
                                <button class="btn btn-primary mr-1" data-toggle="modal" data-target="#addExerciseModal">Add Exercise</button>
                            
                                <!-- Search Bar -->
                                <input type="text" class="form-control" id="searchInput" placeholder="Search for..." style="max-width: 250px;">
                            </div>
                            
                        </div>  
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <?php 
                                    include 'conn.php';  

                                    // Check if the form for updating exercise is submitted
                                    if(isset($_POST['update'])) {
                                        $excid = $_POST['excid'];
                                        $exname = $_POST['exname'];
                                        $exdesc = $_POST['exdesc'];
                                        $exdifficulty = $_POST['exdifficulty'];
                                        $focusbody = $_POST['focusbody'];
                                        $other_focus = $_POST['other_focus'];
                                        $loseWeight = $_POST['LoseWeightEdit']; 
                                        $buildMuscle = $_POST['BuildMuscleEdit']; 
                                        $keepFit = $_POST['KeepFitEdit']; 

                                        $query = "UPDATE exercise_records SET exname=?, exdesc=?, exdifficulty=?, focusbody=?, other_focus=?, LossWeight=?, BuildMuscle=?, KeepFit=? WHERE excid=?";
                                        $stmt = mysqli_prepare($conn, $query);
                                        mysqli_stmt_bind_param($stmt, "sssssssi", $exname, $exdesc, $exdifficulty, $focusbody, $loseWeight, $buildMuscle, $keepFit, $excid); // Adjusted binding
                                        $result = mysqli_stmt_execute($stmt);

                                        if($result) {
                                            // Set success message for modal
                                            echo "<script>$('#updateSuccessModal').modal('show');</script>";
                                        } else {
                                            // Set error message for modal
                                            $updateMessage = 'Failed to update exercise. Please try again.';
                                            echo "<script>$('#notUpdateSuccessModal').modal('show');</script>";
                                        }
                                    }

                                        if (isset($_SESSION['name'])) {
                                        ?>
                                        <thead>
                                        <tr>
                                            <th>Exercise Number</th>
                                            <th>Exercise</th>
                                            <th>Exercise Description</th>
                                            <th>Exercise Image</th>
                                            <th>Exercise Difficulty</th>
                                            <th>Focus Body</th>
                                            <th>Other Focus Body</th>
                                            <th>Loss Weight</th>
                                            <th>Build Muscle</th>
                                            <th>Keep Fit</th>
                                            <th>Edit</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Exercise Number</th>
                                                <th>Exercise</th>
                                                <th>Exercise Description</th>
                                                <th>Exercise Image</th>
                                                <th>Exercise Difficulty</th>
                                                <th>Focus Body</th>
                                                <th>Other Focus Body</th>
                                                <th>Loss Weight</th>
                                                <th>Build Muscle</th>
                                                <th>Keep Fit</th>
                                                <th>Category</th>
                                                <th>Edit</th>
                                            </tr>
                                        </tfoot>
                                    <tbody>
                                    <?php   
                                        $i = 0; 
                                        $query = "SELECT * FROM exercise_records";  
                                        $run = mysqli_query($conn, $query);  
                                        if ($run && mysqli_num_rows($run) > 0) {  
                                            while ($result = mysqli_fetch_assoc($run)) {  
                                                $i++;
                                        ?>
                                        <tr class='data' data-category='<?php echo $result['focusbody']; ?>' data-difficulty='<?php echo $result['exdifficulty']; ?>'>
                                            <td><?php echo $i; ?></td>   
                                            <td><?php echo $result['exname']; ?></td>  
                                            <td><?php echo $result['exdesc']; ?></td>  
                                            <td><img src='<?php echo $result['eximg']; ?>' style='max-width: 100px;' alt='Exercise Image'></td>
                                            <td><?php echo $result['exdifficulty']; ?></td> 
                                            <td><?php echo $result['focusbody']; ?></td>
                                            <td><?php echo $result['other_focus']; ?></td>
                                            <td><?php echo $result['LossWeight']; ?></td>
                                            <td><?php echo $result['BuildMuscle']; ?></td>
                                            <td><?php echo $result['KeepFit']; ?></td>
                                            <td>
                                            <button class='btn btn-primary editBtn' 
                                                data-toggle='modal' 
                                                data-target='#editExercise' 
                                                data-excid='<?php echo $result['excid']; ?>' 
                                                data-exname='<?php echo $result['exname']; ?>' 
                                                data-exdesc='<?php echo $result['exdesc']; ?>' 
                                                data-exdifficulty='<?php echo $result['exdifficulty']; ?>' 
                                                data-focusbody='<?php echo $result['focusbody']; ?>'
                                                data-lossweight='<?php echo $result['LossWeight']; ?>'
                                                data-buildmuscle='<?php echo $result['BuildMuscle']; ?>'
                                                data-keepfit='<?php echo $result['KeepFit']; ?>'>
                                            Edit Exercise
                                        </button>
                                            </td>
                                        </tr>
                                        <?php
                                            }  
                                        } else {
                                            echo "<tr><td colspan='6'>No records found.</td></tr>";
                                        }
                                        ?>
                                    <?php
                                    } else {
                                        ?>  
                                        <div class="text-center">
                                        <h1 class="m-0 font-weight-bold">Error</h1>
                                        <p class="text-gray-500 mb-0">You Must Login First</p>
                                        <a href="login.php">&larr; Go to Login</a>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Are you sure you want to logout?</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                    <a class="btn btn-primary" href="logoutFunc.php">Yes</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Add Exercise Modal-->
    <div class="modal fade" id="addExerciseModal" tabindex="-1" role="dialog" aria-labelledby="addExerciseModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addExerciseModalLabel">Add Exercise</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addExerciseForm" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Exercise Name</label>
                            <input type="text" name="exname" class="form-control" required="required"/>
                        </div>
                        <div class="form-group">
                            <label>Exercise Description</label>
                            <textarea type="text" name="exdesc" class="form-control" required="required"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Upload Image</label>
                            <input type="file" name="eximg" id="image" accept=".jpg, .jpeg, .png, .gif" required="required" />
                        </div>
                        <div class="form-group">
                            <label>Exercise Difficulty</label>
                            <select name="exdifficulty" class="form-control" required="required">
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Advance">Advance</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Main Focus Body</label> 
                            <select name="focusbody" id="mainFocusBody" class="form-control" required="required">
                                <option value="Abs">Abs</option>
                                <option value="Arms">Arms</option>
                                <option value="Back">Back</option>
                                <option value="Chest">Chest</option>
                                <option value="Legs">Legs</option>
                            </select>
                        </div>
                        <div class="form-group" id="otherFocusAreas">
                            <label>Other Focus Areas</label>
                            <div>
                                <!-- Checkboxes will be dynamically populated here -->
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="LoseWeightEdit">Recommended sets and reps for Lose Weight category</label>
                            <textarea name="LoseWeight" id="LoseWeightEdit" class="form-control" rows="1" required="required"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="BuildMuscleEdit">Recommended sets and reps for Build Muscle category</label>
                            <textarea name="BuildMuscle" id="BuildMuscleEdit" class="form-control" rows="1" required="required"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="KeepFitEdit">Recommended sets and reps for Keep Fit category</label>
                            <textarea name="KeepFit" id="KeepFitEdit" class="form-control" rows="1" required="required"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="save" class="btn btn-primary">Save</button>
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Exercise Modal -->
    <div class="modal fade" id="editExercise" tabindex="-1" role="dialog" aria-labelledby="editExerciseModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editExerciseModalLabel">Edit Exercise</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="updateExerciseForm" method="POST" enctype="multipart/form-data">
                        <!-- Hidden input for exercise ID -->
                        <input type="hidden" name="excid" id="excid">
    
                        <!-- Exercise Name -->
                        <div class="form-group">
                            <label>Exercise Name</label>
                            <input type="text" name="exname" id="exnameEdit" class="form-control" required="required"/>
                        </div>
    
                        <!-- Exercise Description -->
                        <div class="form-group">
                            <label>Exercise Description</label>
                            <textarea name="exdesc" id="exdescEdit" class="form-control" required="required"></textarea>
                        </div>
    
                        <!-- Upload Image -->
                        <div class="form-group">
                            <label>Upload Image</label>
                            <input type="file" name="eximg" id="eximgEdit" accept=".jpg, .jpeg, .png, .gif" />
                            <small>Leave this blank if you don't want to change the image.</small>
                        </div>
    
                        <!-- Exercise Difficulty -->
                        <div class="form-group">
                            <label>Exercise Difficulty</label>
                            <select name="exdifficulty" id="exdifficultyEdit" class="form-control" required="required">
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Advance">Advance</option>
                            </select>
                        </div>
    
                        <!-- Main Focus Body -->
                        <div class="form-group">
                            <label>Main Focus Body</label>
                            <select name="focusbody" id="mainFocusBodyEdit" class="form-control" required="required">
                                <option value="Abs">Abs</option>
                                <option value="Arms">Arms</option>
                                <option value="Back">Back</option>
                                <option value="Chest">Chest</option>
                                <option value="Legs">Legs</option>
                            </select>
                        </div>
    
                        <!-- Other Focus Areas -->
                        <div class="form-group" id="otherFocusAreasEdit">
                            <label>Other Focus Areas</label>
                            <div>
                                <!-- Checkboxes will be dynamically populated here -->
                            </div>
                        </div>
    
                        <!-- Recommended sets and reps for Lose Weight -->
                        <div class="form-group">
                            <label for="LoseWeightEdit">Recommended sets and reps for Lose Weight category</label>
                            <textarea name="LoseWeight" id="LoseWeightEdit" class="form-control" rows="1" required="required"></textarea>
                        </div>
    
                        <!-- Recommended sets and reps for Build Muscle -->
                        <div class="form-group">
                            <label for="BuildMuscleEdit">Recommended sets and reps for Build Muscle category</label>
                            <textarea name="BuildMuscle" id="BuildMuscleEdit" class="form-control" rows="1" required="required"></textarea>
                        </div>
    
                        <!-- Recommended sets and reps for Keep Fit -->
                        <div class="form-group">
                            <label for="KeepFitEdit">Recommended sets and reps for Keep Fit category</label>
                            <textarea name="KeepFit" id="KeepFitEdit" class="form-control" rows="1" required="required"></textarea>
                        </div>
    
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="submit" name="update" class="btn btn-primary">Update</button>
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Msg -->
    <div class="modal fade" id="updateSuccessModal" tabindex="-1" role="dialog" aria-labelledby="updateSuccessModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Inserted successfully!</div>
                <div class="modal-footer">
                    <a class="btn btn-primary" href="ExerciiseData.php">Okay</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="notUpdateSuccessModal" tabindex="-1" role="dialog" aria-labelledby="notUpdateSuccessModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Inserted unsuccessfully!</div>
                <div class="modal-footer">
                    <a class="btn btn-primary" href="ExerciiseData.php">Okay</a>
                </div>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    

<!-- Improved JavaScript Code -->
<script>
$(document).ready(function() {
    // Handle category filter by displaying elements with matching category data attributes
    $('.dropdown-item[data-category]').click(function() {
        const category = $(this).data('category');
        if (category === 'all') {
            $('.data').show();
        } else {
            $('.data').hide();
            $('[data-category="' + category + '"]').show();
        }
    });

    // Filter by difficulty
    $('.dropdown-item[data-diff]').click(function() {
        const difficulty = $(this).data('diff');
        if (difficulty === 'all') {
            $('.data').show();
        } else {
            $('.data').hide();
            $('[data-difficulty="' + difficulty + '"]').show();
        }
    });

    // Populate edit modal with exercise details on button click
    $('.editBtn').click(function() {
        const excid = $(this).data('excid');
        const exname = $(this).data('exname');
        const exdesc = $(this).data('exdesc');
        const exdifficulty = $(this).data('exdifficulty');
        const focusbody = $(this).data('focusbody');
        const lossweight = $(this).data('lossweight');
        const buildmuscle = $(this).data('buildmuscle');
        const keepfit = $(this).data('keepfit');

        // Set form fields with the exercise data
        $('#excid').val(excid);
        $('#exnameEdit').val(exname);
        $('#exdescEdit').val(exdesc);
        $('#exdifficultyEdit').val(exdifficulty);
        $('#mainFocusBodyEdit').val(focusbody);
        $('#LoseWeightEdit').val(lossweight);
        $('#BuildMuscleEdit').val(buildmuscle);
        $('#KeepFitEdit').val(keepfit);
        
        // Open the edit modal
        $('#editExercise').modal('show');
    });

    // Reset filter and display all items
    $('#resetFilter').click(function() {
        $('.data').show();
        $('#categoryDropdown').text('Select Category');
        $('#levelDropdown').text('Select Level');
    });

    // Form submission for updating exercise
    $('#updateExerciseForm').on('submit', function(event) {
        event.preventDefault();
        const formData = new FormData(this);
        formData.append('update', true);

        $.ajax({
            url: 'exercise_edit_func.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                const res = JSON.parse(response);
                if (res.status === 'success') {
                    Swal.fire({
                        title: 'Good job!',
                        text: res.message,
                        icon: 'success'
                    }).then(() => {
                        $('#editExercise').modal('hide');
                        location.reload();
                    });
                } else {
                    Swal.fire({
                        title: 'Error!',
                        text: res.message,
                        icon: 'error'
                    });
                }
            },
            error: function() {
                Swal.fire({
                    title: 'Error!',
                    text: 'Something went wrong, please try again.',
                    icon: 'error'
                });
            }
        });
    });

    // Set dropdown selections on category and level
    $('#categoryDropdownContainer .dropdown-item').click(function(event) {
        event.preventDefault();
        const category = $(this).data('category');
        $('#categoryDropdown').text(category);
    });

    $('#levelDropdownContainer .dropdown-item').click(function(event) {
        event.preventDefault();
        const level = $(this).data('diff');
        $('#levelDropdown').text(level);
    });

    // Functionality to dynamically show specific checkboxes for selected main focus body part
    const focusMappings = {
        'Abs': ['Transversus abdominis', 'Internal oblique', 'External oblique', 'Rectus abdominis'],
        'Arms': ['Biceps brachii', 'Coracobrachialis', 'Brachialis', 'Triceps long', 'Triceps medial', 'Triceps lateral'],
        'Back': ['Intrinsic', 'Superficial', 'Intermediate'],
        'Chest': ['Pectoralis major', 'Pectoralis minor', 'Serratus anterior', 'Subclavius'],
        'Legs': ['Quadriceps', 'Hamstrings', 'Hip flexors', 'Adductors/Abductors', 'Calves']
    };

    $('#mainFocusBodyEdit').change(function() {
        const selectedFocus = $(this).val();
        const allowedFocuses = focusMappings[selectedFocus];

        // Uncheck and hide all checkboxes initially
        $('.otherFocus').prop('checked', false).parent().hide();

        // Show and append only relevant checkboxes for the selected focus area
        $('#otherFocusAreasEdit div').empty();
        allowedFocuses.forEach(focus => {
            const checkboxLabel = `<label><input type="checkbox" class="otherFocus" value="${focus}"> ${focus}</label><br>`;
            $('#otherFocusAreasEdit div').append(checkboxLabel);
        });
    });

    // Search functionality for exercises table
    $('#searchInput').on('keyup', function() {
        const input = $(this).val().toLowerCase();
        $('#dataTable tr').each(function(i) {
            if (i === 0) return; // Skip header row
            const txtName = $(this).find('td').eq(1).text().toLowerCase();
            const txtDifficulty = $(this).find('td').eq(4).text().toLowerCase();
            const txtFocus = $(this).find('td').eq(5).text().toLowerCase();

            $(this).toggle(txtName.includes(input) || txtDifficulty.includes(input) || txtFocus.includes(input));
        });
    });
});
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
</html>