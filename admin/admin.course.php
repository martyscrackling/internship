<?php 
    session_start();
    require_once "../classes/unit.class.php";
    require_once "../classes/enroll.class.php";
    require_once "../tools/clean.php";
    require_once "admin-chopdown/head.php";

    $objUnits = new Units;
    $objUser = new Enroll;
    $showUnit = $objUnits->showAllUnits();
    $u_title = $u_description = $u_functions = "";


    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        $u_title = isset($_POST['u_title']) ? clean_input($_POST['u_title']) : '';
        $u_description = isset($_POST['u_description']) ? clean_input($_POST['u_description']) : '';
        $u_functions = isset($_POST['u_functions']) ? clean_input($_POST['u_functions']) : '';
    

    $objUnits->u_title = $u_title;
    $objUnits->u_description = $u_description;
    $objUnits->u_functions = $u_functions;

    if ($objUnits->addUnit()) {
        echo '
        <div class="alert alert-success alert-dismissible fade show" style="margin-left: 18%; max-width: 81%;" role="alert">
            <strong>Success!</strong> Unit added successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
    } else {
        echo '
        <div class="alert alert-danger alert-dismissible fade show ms-lg-5 ms-md-4" role="alert">
            <strong>Error!</strong> Failed to add unit.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        ';
    }

    }

?>
<link rel="stylesheet" href="../style/admin_units.css">


<div class="navbar-custom">
    <header class="px-1 shadow-sm">
        <div class="container-fluid d-flex justify-content-between">
            <button class="btn btn-toggle">
            <button id="menu-toggle" class="btn d-lg-none">
                <i class="bi bi-list fs-2"></i>
            </button>
                <h1 class="navtext">Course</h1>
            </button>
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-end">
                
                <!-- Notification Icon with Badge -->
                <div class="dropdown">
                    <a href="#" class="text-dark position-relative" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-bell fs-4"></i>
                        <!-- Notification Badge -->
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

<style>
    a.text-decoration-none {
  display: block;
  height: 100%;
}
.service-item {
  cursor: pointer;
  transition: transform 0.3s ease;
}
.service-item:hover {
  transform: translateY(-5px);
}

</style>

<div class="content-page px-3">
    <div class="container-fluid ">
        <div class="row">
            <div class="container px-6">
                <section id="services" class="services relative">
                    <div class="container">
                    <h4 class="page-title fw-bold text-center">Select Unit to modify</h4>
                    <div class="row gy-4">
                        <?php foreach ($showUnit as $su): ?>
                            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                                <div class="service-item position-relative h-100">
                                    <div class="icon-box"><i class="bi bi-mortarboard"></i></div>
                                    <h3>
                                        <a href="admin.coursemodify.php?unit_id=<?php echo $su['unit_id']; ?>" class="text-decoration-none text-dark">
                                            <?php echo $su['u_title']; ?>
                                        </a>
                                    </h3>
                                    <div class="card-footer d-flex justify-content-around mt-5">
                                        <a href="admin.course.php?unit_id=<?php echo $su['unit_id']; ?>" class="btn btn-warning btn-sm px-4 fw-semibold">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </a>
                                        <a href="" class="btn btn-danger btn-sm px-4 fw-semibold">
                                            <i class="bi bi-trash"></i> Delete
                                        </a>    
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    </div>

                    </div>

                </section>

            </div>

        </div>
    </div>
</div>
<script>
   setTimeout(function() {
    var alert = document.querySelector('.alert');
    if (alert) {
        let bsAlert = new bootstrap.Alert(alert);
        bsAlert.close();
    }
}, 3000); // 3000ms = 3 seconds
   
    <?php   require_once "../courses/js_courses.php"; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../vendor/bootstrap-5.3.3/js/bootstrap.bundle.min.js"></script>
<script src="../vendor/jQuery-3.7.1/jquery-3.7.1.min.js"></script>
<script src="../vendor/chartjs-4.4.5/chart.js"></script>
<script src="../vendor/datatable-2.1.8/datatables.min.js"></script>
<script src="../js/admin.js"></script>
<script src="../js/product.js"></script>