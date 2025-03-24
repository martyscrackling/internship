<?php require_once "admin-chopdown/head.php"?>
<link rel="stylesheet" href="../style/descd.css">


<div class="navbar-custom">
    <header class="px-1 shadow-sm">
        <div class="container-fluid d-flex justify-content-between">
            <button class="btn btn-toggle">
            <button id="menu-toggle" class="btn d-lg-none">
                <i class="bi bi-list fs-2"></i>
            </button>
                <h1 class="navtext">Accounts</h1>
            </button>
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-end">
                
                <!-- Notification Icon with Badge -->
                <div class="dropdown">
                    <a href="#" class="text-dark position-relative" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-bell fs-4"></i>
                        <!-- Notification Badge -->
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            3 <!-- Change dynamically with PHP/JS -->
                        </span>
                    </a>
                    <!-- Notifications Dropdown -->
                    <ul class="dropdown-menu dropdown-menu-end text-small">
                        <li><strong class="dropdown-header">Notifications</strong></li>
                        <li><a class="dropdown-item" href="#">New order received</a></li>
                        <li><a class="dropdown-item" href="#">System update available</a></li>
                        <li><a class="dropdown-item" href="#">You have a new message</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-center" href="#">View all notifications</a></li>
                    </ul>
                </div>

                <!-- Profile Dropdown -->
                <div class="dropdown text-end ms-3">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../imgs/descd.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="../auth/logout.php">Sign out</a></li>
                    </ul>   
                </div>
            </div>
        </div>
    </header>
</div>


<?php 
require_once "admin-chopdown/sidebar.php";
require_once "../dash_chopdown/dash_head.php";
?>    

<body>
<div class="content-page px-4">
    <div class="container mt-4">
        <h4 class="fw-bold mb-3">New Users</h4>
        <div class="row">
            <!-- User Card -->
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card shadow-sm p-3 d-flex flex-row align-items-center">
                    <img src="../imgs/user.png" class="rounded-circle border me-3" width="60" height="60" alt="Profile">
                    <div>
                        <h6 class="fw-bold mb-1 text-dark">John Doe</h6>
                        <small class="text-muted">Joined: March 24, 2025</small>
                        <div class="mt-2">
                            <a href="profile.php?user=johndoe" class="btn btn-primary btn-sm">
                                <i class="bi bi-person"></i> View Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card shadow-sm p-3 d-flex flex-row align-items-center">
                    <img src="../imgs/user.png" class="rounded-circle border me-3" width="60" height="60" alt="Profile">
                    <div>
                        <h6 class="fw-bold mb-1 text-dark">Jane Smith</h6>
                        <small class="text-muted">Joined: March 22, 2025</small>
                        <div class="mt-2">
                            <a href="profile.php?user=janesmith" class="btn btn-primary btn-sm">
                                <i class="bi bi-person"></i> View Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card shadow-sm p-3 d-flex flex-row align-items-center">
                    <img src="../imgs/user.png" class="rounded-circle border me-3" width="60" height="60" alt="Profile">
                    <div>
                        <h6 class="fw-bold mb-1 text-dark">Alice Brown</h6>
                        <small class="text-muted">Joined: March 20, 2025</small>
                        <div class="mt-2">
                            <a href="profile.php?user=alicebrown" class="btn btn-primary btn-sm">
                                <i class="bi bi-person"></i> View Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

   
</body>
</html>
