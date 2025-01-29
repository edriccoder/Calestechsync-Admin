<!DOCTYPE html>
<html lang="en">
<?php
session_start();
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
    <style>
        .modal-body {
            justify-content: center;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">CalesTechSync</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="UserProfile.php">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    <span>UserProfile</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="ExerciseData.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>ExcerciseRecords</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="ExerciseRecords.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>AddRecords </span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="MessageRequest.php">
                    <i class="fas fa-fw fa-envelope fa-fw"></i>
                    <span>MessageRequest</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

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
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['name'] ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
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
                        See who are archived</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h3 class="m-0 font-weight-bold text-primary">Records</h3>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <div class="dropdown mb-4">
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
                                    <button class="btn btn-primary dropdown-toggle" type="button" id="levelDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Select Level
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="levelDropdown">
                                        <a class="dropdown-item" href="#" data-diff="all">All</a>
                                        <a class="dropdown-item" href="#" data-diff="Beginner">Beginner</a>
                                        <a class="dropdown-item" href="#" data-diff="Intermediate">Intermediate</a>
                                        <a class="dropdown-item" href="#" data-diff="Advance">Advance</a>
                                    </div>
                                    <button class="btn btn-primary" id="resetFilter">Reset Filter</button>
                                    <button class='btn btn-primary editBtn' data-toggle='modal' data-target='#addExerciseModal'>Add Excercise</button>
                                </div>  

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

                                        $query = "UPDATE exercise_records SET exname=?, exdesc=?, exdifficulty=?, focusbody=? WHERE excid=?";
                                        $stmt = mysqli_prepare($conn, $query);
                                        mysqli_stmt_bind_param($stmt, "ssssi", $exname, $exdesc, $exdifficulty, $focusbody, $excid);
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
                                            <th>Exercise Name</th>
                                            <th>Exercise Description</th>
                                            <th>Exercise Image</th>
                                            <th>Exercise Difficulty</th>
                                            <th>Category</th>
                                            <th>Edit</th>
                                        </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Exercise Number</th>
                                                <th>Exercise Name</th>
                                                <th>Exercise Description</th>
                                                <th>Exercise Image</th>
                                                <th>Exercise Difficulty</th>
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
                                            <td>
                                                <button class='btn btn-primary editBtn' data-toggle='modal' data-target='#editExercise' 
                                                data-excid='<?php echo $result['excid']; ?>' 
                                                data-exname='<?php echo $result['exname']; ?>' 
                                                data-exdesc='<?php echo $result['exdesc']; ?>' 
                                                data-exdifficulty='<?php echo $result['exdifficulty']; ?>' 
                                                data-focusbody='<?php echo $result['focusbody']; ?>'>
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
    <!-- Success Modal-->
    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="modal-title" id="successModalLabel">Success!</h5>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary" href="ExerciseData.php">Proceed</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Include jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

    <script>
        $(document).ready(function() {
            // Show the modal when the page loads
            $('#successModal').modal('show');

            // Redirect to ExerciseData.php when the close button is clicked
            $('.close').on('click', function() {
                window.location.href = 'ExerciseData.php';
            });
        });
    </script>
    
    <!-- Add Exercise Modal-->
    <div class="modal fade" id="addExerciseModal" tabindex="-1" role="dialog" aria-labelledby="addExerciseModal"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addExerciseModal">Add Exercise</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="modal-content">
                                <form method="POST" action="exercise_func.php" enctype="multipart/form-data">
                                    <div class="modal-header">
                                        <h3 class="modal-title">Add Exercise</h3>
                                    </div>
                                    <div class="modal-body">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
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
                                                    <option value="Intermidiate">Intermidiate</option>
                                                    <option value="Advance">Advance</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Focus Body</label>
                                                <select name="focusbody" class="form-control" required="required">
                                                    <option value="Abs">Abs</option>
                                                    <option value="Arms">Arms</option>
                                                    <option value="Back">Back</option>
                                                    <option value="Cardio">Cardio</option>
                                                    <option value="Chest">Chest</option>
                                                    <option value="Legs">Legs</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="clear:both;"></div>
                                    <div class="modal-footer">
                                        <button name="save" class="btn btn-primary"><span class="glyphicon glyphicon-save"></span> Save</button>
                                        <button class="btn btn-danger" type="button" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
                                    </div>
                                </form>
                            </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit Exercise Modal -->
    <div class="modal fade" id="editExercise" tabindex="-1" role="dialog" aria-labelledby="editExerciseLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form method="POST" action="" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h3 class="modal-title" id="editExerciseLabel">Edit Exercise</h3>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="excid" id="excid">
                        <div class="form-group">
                            <label>Exercise Name</label>
                            <input type="text" name="exname" id="exname" class="form-control" required="required"/>
                        </div>
                        <div class="form-group">
                            <label for="exdesc">Exercise Description</label>
                            <textarea name="exdesc" id="exdesc" class="form-control" rows="4" required="required"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Upload Image</label>
                            <input type="file" name="eximg" id="image" accept=".jpg, .jpeg, .png, .gif" />
                        </div>
                        <div class="form-group">
                            <label>Exercise Difficulty</label>
                            <select name="exdifficulty" id="exdifficulty" class="form-control" required="required">
                                <option value="Beginner">Beginner</option>
                                <option value="Intermidiate">Intermidiate</option>
                                <option value="Advance">Advance</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Focus Body</label>
                            <select name="focusbody" id="focusbody" class="form-control" required="required">
                                <option value="Abs">Abs</option>
                                <option value="Arms">Arms</option>
                                <option value="Back">Back</option>
                                <option value="Cardio">Cardio</option>
                                <option value="Chest">Chest</option>
                                <option value="Legs">Legs</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" name="update" class="btn btn-primary">Update</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </form>
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
    

    <script>
        $(document).ready(function() {
    // Filter by category
        $('.dropdown-item[data-category]').click(function() {
            var category = $(this).data('category');
            if (category === 'all') {
                $('.data').show();
            } else {
                $('.data').hide();
                $('[data-category="' + category + '"]').show();
            }
        });

        // Filter by difficulty
        $('.dropdown-item[data-diff]').click(function() {
            var difficulty = $(this).data('diff');
            if (difficulty === 'all') {
                $('.data').show();
            } else {
                $('.data').hide();
                $('[data-difficulty="' + difficulty + '"]').show();
            }
        });

        // Edit button click event
        $('.editBtn').click(function(){
            // Get data attributes from the button clicked
            var excid = $(this).data('excid');
            var exname = $(this).data('exname');
            var exdesc = $(this).data('exdesc');
            var exdifficulty = $(this).data('exdifficulty');
            var focusbody = $(this).data('focusbody');

            // Set the values of input fields in the modal
            $('#excid').val(excid);
            $('#exname').val(exname);
            $('#exdesc').val(exdesc);
            $('#exdifficulty').val(exdifficulty);
            $('#focusbody').val(focusbody);
        });

        // Reset filter button
        $('#resetFilter').click(function() {
            $('.data').show();
        });
    });


    </script>


</body>
</html>