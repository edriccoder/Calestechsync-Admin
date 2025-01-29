<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include 'conn.php';

if (isset($_POST['update_username'])) {
    $user_id = $_POST['id'];
    $new_username = $_POST['new_username'];

    // Update the username in the database
    $query = "UPDATE users SET username='$new_username' WHERE id='$user_id'";
    $run = mysqli_query($conn, $query);

    if ($run) {
        echo "<script>alert('Username updated successfully!')</script>";
        echo "<script>window.location.href='index.php';</script>"; // Redirect to the main page after updating username
    } else {
        echo "<script>alert('Failed to update username. Please try again.')</script>";
    }
}

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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
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
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo $_SESSION['name'] ?>
                                </span>
                                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                            </a>
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
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        See Users
                    </h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>UserNumber</th>
                                            <th>Fullname</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Archive</th>
                                            <th>Show Report and Other Info</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>UserNumber</th>
                                            <th>Fullname</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Archive</th>
                                            <th>Show Report and Other Info</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                            if (isset($_SESSION['name'])) {
                                                // Query to retrieve all users from the user table
                                                $query = "SELECT * FROM user;";
                                                $run = mysqli_query($conn, $query);

                                                if (mysqli_num_rows($run) > 0) {
                                                    $i = 0;
                                                    while ($result = mysqli_fetch_assoc($run)) {
                                                        $i++;
                                                        $archive_status = $result['archive'] ? 'Archived' : 'Not Archived'; 
                                                        $archive_value = $result['archive'] ? 0 : 1; // Toggle archive status
                                                        
                                                        echo "<tr>
                                                            <td>" . $i . "</td>   
                                                            <td>" . htmlspecialchars($result['fullname']) . "</td>  
                                                            <td>" . htmlspecialchars($result['username']) . "</td>  
                                                            <td>" . htmlspecialchars($result['email']) . "</td>  
                                                            <td>
                                                                <form method='POST' action='archive_update.php'>
                                                                    <input type='hidden' name='user_id' value='" . htmlspecialchars($result['id']) . "'> 
                                                                    <button type='submit' name='archive' value='" . $archive_value . "' class='btn btn-primary btn-user btn-block'>" . $archive_status . "</button>
                                                                </form>
                                                            </td>
                                                            <td>
                                                                <form method='POST' action='fetch_report.php'>
                                                                    <input type='hidden' name='username' value='" . htmlspecialchars($result['username']) . "'>
                                                                    <button type='submit' class='btn btn-info btn-user btn-block'>Show Report and Info</button>
                                                                </form>
                                                            </td>
                                                        </tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='6'>No records found.</td></tr>";
                                                }                                            
                                            }
                                        ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
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
            </div>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

        <!-- Bootstrap JavaScript -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript -->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages -->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/datatables-demo.js"></script>

</body>

</html>
