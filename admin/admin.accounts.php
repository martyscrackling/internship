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
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-end m-lg-2">
                <a href="../auth/logout.php" class="d-flex align-items-center gap-2 px-3 py-2 text-decoration-none text-dark" >
                    <i class="bi bi-box-arrow-right fs-5"></i>
                    <span class="fw-semibold">Logout</span>
                </a>
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
