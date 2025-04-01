<?php 
session_start();
require_once "admin-chopdown/head.php";
require_once '../tools/clean.php';
require_once "../classes/announcement.class.php";

$objAnnouncement = new Announcements;
$ann = $objAnnouncement->call_announcements();

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $a_title = isset($_POST['a_title']) ? clean_input($_POST['a_title']) : '';
    $a_description = isset($_POST['a_description']) ? clean_input($_POST['a_description']) : '';
    $a_date = date('F j, Y'); // Store as "April 1, 2025"

    $objAnnouncement->a_title = $a_title;
    $objAnnouncement->a_description = $a_description;
    $objAnnouncement->a_date = $a_date;
    
    if ($objAnnouncement->addAnnouncement()) {
        echo '
        <div class="alert alert-success alert-dismissible fade show" style="margin-left: 18%; max-width: 81%;" role="alert">
            <strong>Success!</strong> Announcement posted successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
    } else {
        echo '
        <div class="alert alert-danger alert-dismissible fade show ms-lg-5 ms-md-4" role="alert">
            <strong>Error!</strong> Failed to post announcement.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
    }
}

?>


<div class="navbar-custom">
    <header class="px-1 shadow-sm">
        <div class="container-fluid d-flex justify-content-between">
            <button class="btn btn-toggle">
            <button id="menu-toggle" class="btn d-lg-none">
                <i class="bi bi-list fs-2"></i>
            </button>
                <h1 class="navtext">Announcements</h1>
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
        <div class="page-title-box">
            <h4 class="page-title fw-bold">Post</h4>
        </div>

        <div class="row justify-content-center">
    <!-- add announcement 1 -->
    <div class="col-12 mb-4 d-flex">
        <div class="card shadow-lg border-0 rounded-4 h-100 d-flex flex-column w-100">
            <form method="POST" action="">
                <div class="card-body flex-grow-1">
                    <div class="d-flex align-items-center mb-3">
                        <img src="../imgs/descd.png" alt="Admin" class="rounded-circle border me-3" width="55" height="55">
                        <div>
                            <h6 class="mb-1 fw-bold text-dark">Admin Team</h6>
                            <small class="text-muted"><?php echo $a_date; ?></small>
                        </div>
                    </div>
                    <!-- Textarea for announcement -->
                    <input type="text" class="form-control mb-2" name="a_title" placeholder="Title">
                    <textarea class="form-control mb-2" name="a_description" rows="4" placeholder="Description"></textarea>
                    
                    <!-- Icons for adding images -->
                    <div class="d-flex align-items-center"> 
                        <label class="btn btn-outline-primary btn-sm me-2">
                            <i class="bi bi-image"></i> Add Image
                            <input type="file" class="d-none" accept="image/*">
                        </label>
                        <label class="btn btn-outline-secondary btn-sm">
                            <i class="bi bi-camera"></i> Take Photo
                            <input type="file" class="d-none" accept="image/*" capture="camera">
                        </label>
                    </div>
                </div>
                <div class="card-footer bg-light d-flex justify-content-end">
                    <button type="submit" class="btn btn-success btn-sm px-4 fw-semibold">
                        <i class="bi bi-send"></i> Post
                    </button>
                </div>
            </form>
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

        <div class="row justify-content-center align-items-stretch">
    <?php foreach ($ann as $a): ?>
    <div class="col-12 col-md-6 mb-4 d-flex">
        <div class="card shadow-lg border-0 rounded-4 d-flex flex-column announcement-card">
            <div class="card-body flex-grow-1 announcement-body">
                <div class="d-flex align-items-center mb-3">
                    <img src="../imgs/descd.png" alt="Admin" class="rounded-circle border me-3" width="55" height="55">
                    <div>
                        <h6 class="mb-1 fw-bold text-dark">Admin Team</h6>
                        <small class="text-muted"><?php echo $a["a_date"]; ?></small>
                    </div>
                </div>
                <p class="text-secondary announcement-text">
                    <strong><?php echo $a["a_title"]; ?></strong> 
                    <?php echo substr($a["a_description"], 0, 255) . (strlen($a["a_description"]) > 255 ? '...' : ''); ?>
                </p>
                <img src="../imgs/descd.jpeg" alt="" class="img-fluid">
            </div>
            <div class="card-footer bg-light d-flex justify-content-around announcement-footer">
                <button class="btn btn-warning btn-sm px-4 fw-semibold">
                    <i class="bi bi-pencil-square"></i> Edit
                </button>
                <button class="btn btn-danger btn-sm px-4 fw-semibold">
                    <i class="bi bi-trash"></i> Delete
                </button>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
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
<script>
    // Set the date input to today's date by default
    document.addEventListener("DOMContentLoaded", function() {
        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
        const day = String(today.getDate()).padStart(2, '0');
        
        const formattedDate = `${year}-${month}-${day}`;
        document.getElementById('date').value = formattedDate;
    });
</script>
<script>
   setTimeout(function() {
    var alert = document.querySelector('.alert');
    if (alert) {
        let bsAlert = new bootstrap.Alert(alert);
        bsAlert.close();
    }
}, 3000); // 3000ms = 3 seconds
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../vendor/bootstrap-5.3.3/js/bootstrap.bundle.min.js"></script>
<script src="../vendor/jQuery-3.7.1/jquery-3.7.1.min.js"></script>
<script src="../vendor/chartjs-4.4.5/chart.js"></script>
<script src="../vendor/datatable-2.1.8/datatables.min.js"></script>
<script src="../js/admin.js"></script>
<script src="../js/product.js"></script>