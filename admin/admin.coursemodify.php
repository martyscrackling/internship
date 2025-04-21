<?php 
    session_start();
    require_once "../classes/unit.class.php";
    require_once "../tools/clean.php";
    require_once "../admin/admin-chopdown/head.php";
    require_once "../admin/admin-chopdown/sidebar.php";
    require_once "../dash_chopdown/dash_head.php";

    $objUnits = new Units;
    $unit_id = isset($_GET['unit_id']) ? $_GET['unit_id'] : 1;
    $each = $objUnits->showUnit($unit_id);
    ?>

<link rel="stylesheet" href="../style/admin_course.css">

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



<section class="first">
    <div class="content-page px-3 ">
        <div class="container-fluid">
            <div class="container d-flex justify-content-center" data-aos="fade-up">
                <div class="section-title text-center mb-0">
                    <h2 class="header fs-1 mt-5 mb-4"><?php echo $each["u_title"]; ?></h2>
                    <p class="desc mt-3"><?php echo $each["u_description"]; ?></p>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-center gap-2 mt-3"> 
                <a href="admin.course.php?unit_id=<?php echo $su['unit_id']; ?>" class="btn btn-warning btn-sm px-4 fw-semibold">
                    <i class="bi bi-pencil-square"></i> Edit
                </a>
                <a href="#" class="btn btn-danger btn-sm px-4 fw-semibold">
                    <i class="bi bi-trash"></i> Delete
                </a>
            </div>

            <div class="row">
                <div class="container px-6 pb-5">
                    <div id="services" class="services relative">
                        <div class="third ">          
                            <h4 class="page-title fw-bold text-center">Add a Course</h4>           
                            <div class="row justify-content-center">
                            <div class="col-12 mb-4 d-flex">
                                <div class="card shadow-lg border-0 rounded-4 h-100 d-flex flex-column w-100">
                                <form action="" method="POST">
                                    <div class="card-body flex-grow-1">
                                        <p class="how mt-2 fw-bold">Description</p>
                                        <input class="form-control mb-3" name="u_title" rows="2" placeholder="Name of course" required></input>
                                        <textarea class="form-control mb-2" name="u_description" rows="4" placeholder="Describe the course" required></textarea>
                                        <div class="d-flex justify-content-end mt-4 mb-0">
                                            <input type="submit" class="btn btn-success btn-sm" name="submit" value="Submit">
                                        </div>
                                    </div>
                                </form>        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
