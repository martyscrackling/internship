<?php require_once "admin-chopdown/head.php"?>


<div class="navbar-custom">
    <header class="px-1 shadow-sm">
        <div class="container-fluid d-flex justify-content-between">
            <button class="btn btn-toggle">
            <button id="menu-toggle" class="btn d-lg-none">
                <i class="bi bi-list fs-2"></i>
            </button>
                <h1 class="navtext">Inquiries</h1>
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
        <div class="container py-4">
    <h4 class="mb-3 fw-bold">Messages</h4>
    <div class="list-group">
        <!-- Message 1 -->
        <div class="list-group-item list-group-item-action d-flex align-items-center">
            <img src="../imgs/user.png" alt="User" class="rounded-circle border me-3" width="50" height="50">
            <div class="flex-grow-1">
                <h6 class="mb-1 fw-bold">John Doe <span class="badge bg-danger ms-2">New</span></h6>
                <p class="text-muted mb-1 text-truncate" style="max-width: 250px;">Hey, how are you doing? Hope everything is well.</p>
                <small class="text-muted">2 mins ago</small>
            </div>
            <div class="ms-auto">
                <button class="btn btn-outline-primary btn-sm"><i class="bi bi-eye"></i></button>
                <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
            </div>
        </div>

        <!-- Message 2 -->
        <div class="list-group-item list-group-item-action d-flex align-items-center">
            <img src="../imgs/user.png" alt="User" class="rounded-circle border me-3" width="50" height="50">
            <div class="flex-grow-1">
                <h6 class="mb-1 fw-bold">Jane Smith</h6>
                <p class="text-muted mb-1 text-truncate" style="max-width: 250px;">Can we meet up later to discuss the project details?</p>
                <small class="text-muted">10 mins ago</small>
            </div>
            <div class="ms-auto">
                <button class="btn btn-outline-primary btn-sm"><i class="bi bi-eye"></i></button>
                <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
            </div>
        </div>

        <!-- Message 3 -->
        <div class="list-group-item list-group-item-action d-flex align-items-center">
            <img src="../imgs/user.png" alt="User" class="rounded-circle border me-3" width="50" height="50">
            <div class="flex-grow-1">
                <h6 class="mb-1 fw-bold">Michael Lee</h6>
                <p class="text-muted mb-1 text-truncate" style="max-width: 250px;">Don't forget about the meeting at 3 PM!</p>
                <small class="text-muted">30 mins ago</small>
            </div>
            <div class="ms-auto">
                <button class="btn btn-outline-primary btn-sm"><i class="bi bi-eye"></i></button>
                <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
            </div>
        </div>
         <!-- Message 4 -->
         <div class="list-group-item list-group-item-action d-flex align-items-center">
            <img src="../imgs/user.png" alt="User" class="rounded-circle border me-3" width="50" height="50">
            <div class="flex-grow-1">
                <h6 class="mb-1 fw-bold">John Doe </h6>
                <p class="text-muted mb-1 text-truncate" style="max-width: 250px;">Hey, how are you doing? Hope everything is well.</p>
                <small class="text-muted">2 mins ago</small>
            </div>
            <div class="ms-auto">
                <button class="btn btn-outline-primary btn-sm"><i class="bi bi-eye"></i></button>
                <button class="btn btn-outline-danger btn-sm"><i class="bi bi-trash"></i></button>
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