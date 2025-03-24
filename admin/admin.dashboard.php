
<?php 
require_once "admin-chopdown/head.php"?>

<div class="navbar-custom">
    <header class="px-1 shadow-sm">
        <div class="container-fluid d-flex justify-content-between">
            <button class="btn btn-toggle">
            <button id="menu-toggle" class="btn d-lg-none">
                <i class="bi bi-list fs-2"></i>
            </button>
                <h1 class="navtext">Dashboard</h1>
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


<?php require_once "admin-chopdown/sidebar.php"?>

<div class="content-page px-3">
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title fw-bold">Inquiries:</h4>
                <div class="page-title-right">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12 col-xl-12 d-flex flex-column">
            <div class="row flex-grow-1">
                <div class="col-12 col-sm-6 col-md-6 col-xl-3 pb-4">
                    <div class="card widget-flat shadow-sm">
                        <div class="card-body d-flex align-items-center">
                        <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">New</span>

                            <!-- Profile Picture -->
                            <img src="../imgs/user.png" alt="Profile" class="rounded-circle border me-3" width="55" height="55">
                            
                            <div class="flex-grow-1">
                                <!-- Sender Name -->
                                <h5 class="fw-bold mb-1 text-dark">John Doe</h5>
                                <!-- Message Preview -->
                                <p class="text-muted mb-1 text-truncate" style="max-width: 170px; font-size: 14px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum, amet!</p>
                                <!-- Timestamp -->
                                <small class="text-muted">2 mins ago</small>
                            </div>
                        </div>
                        <!-- View Message Button -->
                        <div class="card-footer bg-light text-center">
                            <button class="btn btn-success btn-sm w-100" onclick="viewMessage('John Doe', 'Hey, how are you doing?')">
                                <i class="bi bi-envelope-open"></i> View Message
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6 col-xl-3 pb-4">
                    <div class="card widget-flat shadow-sm">
                        <div class="card-body d-flex align-items-center">

                        <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">New</span>

                            <!-- Profile Picture -->
                            <img src="../imgs/user.png" alt="Profile" class="rounded-circle border me-3" width="55" height="55">
                            
                            <div class="flex-grow-1">
                                <!-- Sender Name -->
                                <h5 class="fw-bold mb-1 text-dark">John Doe</h5>
                                <!-- Message Preview -->
                                <p class="text-muted mb-1 text-truncate" style="max-width: 170px; font-size: 14px;">Hey, how are you doing?</p>
                                <!-- Timestamp -->
                                <small class="text-muted">2 mins ago</small>
                            </div>
                        </div>
                        <!-- View Message Button -->
                        <div class="card-footer bg-light text-center">
                            <button class="btn btn-success btn-sm w-100" onclick="viewMessage('John Doe', 'Hey, how are you doing?')">
                                <i class="bi bi-envelope-open"></i> View Message
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-xl-3 pb-4">
                    <div class="card widget-flat shadow-sm">
                        <div class="card-body d-flex align-items-center">
                        <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">New</span>

                            <!-- Profile Picture -->
                            <img src="../imgs/user.png" alt="Profile" class="rounded-circle border me-3" width="55" height="55">
                            
                            <div class="flex-grow-1">
                                <!-- Sender Name -->
                                <h5 class="fw-bold mb-1 text-dark">John Doe</h5>
                                <!-- Message Preview -->
                                <p class="text-muted mb-1 text-truncate" style="max-width: 170px; font-size: 14px;">Hey, how are you doing?</p>
                                <!-- Timestamp -->
                                <small class="text-muted">2 mins ago</small>
                            </div>
                        </div>
                        <!-- View Message Button -->
                        <div class="card-footer bg-light text-center">
                            <button class="btn btn-success btn-sm w-100" onclick="viewMessage('John Doe', 'Hey, how are you doing?')">
                                <i class="bi bi-envelope-open"></i> View Message
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 col-xl-3 pb-4">
                    <div class="card widget-flat shadow-sm position-relative">
                        <div class="card-body d-flex align-items-center">
                            <!-- New Badge -->
                            <span class="badge bg-danger position-absolute top-0 start-100 translate-middle">New</span>

                            <!-- Profile Picture -->
                            <img src="../imgs/user.png" alt="Profile" class="rounded-circle border me-3" width="55" height="55">

                            <div class="flex-grow-1">
                                <!-- Sender Name -->
                                <h5 class="fw-bold mb-1 text-dark">John Doe</h5>
                                <!-- Message Preview -->
                                <p class="text-muted mb-1 text-truncate" style="max-width: 170px; font-size: 14px;">Hey, how are you doing?</p>
                                <!-- Timestamp -->
                                <small class="text-muted">2 mins ago</small>
                            </div>
                        </div>
                        <!-- View Message Button -->
                        <div class="card-footer bg-light text-center">
                            <button class="btn btn-success btn-sm w-100" onclick="viewMessage('John Doe', 'Hey, how are you doing?')">
                                <i class="bi bi-envelope-open"></i> View Message
                            </button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="page-title-box">
            <h4 class="page-title fw-bold">Announcements:</h4>
        </div>

        <div class="row justify-content-center">
            <!-- Announcement 1 -->
            <div class="col-12 col-md-6 mb-4 d-flex">
                <div class="card shadow-lg border-0 rounded-4 h-100 d-flex flex-column">
                    <!-- <div class="card-header bg-success text-white rounded-top-2">
                        <h5 class="mb-0 fw-semibold">🚧 System Maintenance Notice</h5>
                    </div> -->
                    <div class="card-body flex-grow-1">
                        <div class="d-flex align-items-center mb-3">
                            <img src="../imgs/descd.png" alt="Admin" class="rounded-circle border me-3" width="55" height="55">
                            <div>
                                <h6 class="mb-1 fw-bold text-dark">Admin Team</h6>
                                <small class="text-muted">March 24, 2025</small>
                            </div>
                        </div>
                        <p class="text-secondary">
                            ⚠️ <strong>Scheduled Maintenance:</strong> Our platform will be under maintenance on 
                            <strong>March 28, 2025</strong>, from <strong>12:00 AM to 4:00 AM</strong>. Expect temporary service interruptions. 
                            We apologize for any inconvenience.
                        </p>
                        <img src="../imgs/descd.jpeg" alt="" style="height:200px;">
                    </div>
                    <div class="card-footer bg-light d-flex justify-content-around">
                        <button class="btn btn-warning btn-sm px-4 fw-semibold">
                            <i class="bi bi-pencil-square"></i> Edit
                        </button>
                        <button class="btn btn-danger btn-sm px-4 fw-semibold">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </div>
                </div>
            </div>

            <!-- Announcement 2 -->
            <div class="col-12 col-md-6 mb-4 d-flex">
                <div class="card shadow-lg border-0 rounded-4 h-100 d-flex flex-column">
                    <div class="card-body flex-grow-1">
                        <div class="d-flex align-items-center mb-3">
                            <img src="../imgs/descd.png" alt="Admin" class="rounded-circle border me-3" width="55" height="55">
                            <div>
                                <h6 class="mb-1 fw-bold text-dark">Admin Team</h6>
                                <small class="text-muted">March 24, 2025</small>
                            </div>
                        </div>
                        <p class="text-secondary">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat dolorum animi, atque odit obcaecati nobis eius repellendus qui minima ducimus cumque ipsa, nihil debitis! Sint non voluptates magnam libero labore?
                        </p>
                    </div>
                    <div class="card-footer bg-light d-flex justify-content-around">
                        <button class="btn btn-warning btn-sm px-4 fw-semibold">
                            <i class="bi bi-pencil-square"></i> Edit
                        </button>
                        <button class="btn btn-danger btn-sm px-4 fw-semibold">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



</div>




<script>
    document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.getElementById("menu-toggle");
    const sidebar = document.getElementById("sidebar");

    menuToggle.addEventListener("click", function () {
        sidebar.classList.toggle("show");
    });
});

</script>

<script src="../vendor/bootstrap-5.3.3/js/bootstrap.bundle.min.js"></script>
<script src="../vendor/jQuery-3.7.1/jquery-3.7.1.min.js"></script>
<script src="../vendor/chartjs-4.4.5/chart.js"></script>
<script src="../vendor/datatable-2.1.8/datatables.min.js"></script>
<script src="../js/admin.js"></script>
<script src="../js/product.js"></script>