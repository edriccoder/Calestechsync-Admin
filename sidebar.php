<!-- sidebar.php -->

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3">CalesTechSync</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item <?php echo (basename($_SERVER['REQUEST_URI']) == 'index.php') ? 'active' : ''; ?>">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <li class="nav-item <?php echo (basename($_SERVER['REQUEST_URI']) == 'UserProfile.php') ? 'active' : ''; ?>">
        <a class="nav-link" href="UserProfile.php">
            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
            <span>User Profile</span></a>
    </li>
    <li class="nav-item <?php echo (basename($_SERVER['REQUEST_URI']) == 'ExerciseData.php') ? 'active' : ''; ?>">
        <a class="nav-link" href="ExerciseData.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Excercise Records</span></a>
    </li>
    <li class="nav-item <?php echo (basename($_SERVER['REQUEST_URI']) == 'MessageRequest.php') ? 'active' : ''; ?>">
        <a class="nav-link" href="messageinquiries.php">
            <i class="fas fa-fw fa-envelope fa-fw"></i>
            <span>Message Request</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
</ul>
<!-- End of Sidebar -->