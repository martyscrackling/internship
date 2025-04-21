
<?php 
    require_once "../classes/inquire.class.php";
    require_once "admin-chopdown/head.php";

    $objInquire = new Inquire;
    $inquiries = $objInquire->call_inquiries();
?>
<style>
    .news-container {
    overflow-x: auto;
    scroll-behavior: smooth;
    padding: 10px 0;

    /* Hide scrollbar for WebKit browsers */
    scrollbar-width: none; /* Firefox */
    -ms-overflow-style: none; /* IE and Edge */
}

.news-container::-webkit-scrollbar {
    display: none; /* Chrome, Safari, Opera */
}

    .news-container {
    overflow-x: auto;
    scroll-behavior: smooth;
    padding: 10px 0;
}

.scroll-button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    z-index: 10;
    background: rgba(0,0,0,0.5);
    color: white;
    border: none;
    padding: 8px 12px;
    cursor: pointer;
    border-radius: 50%;
}

.scroll-left {
    left: 0;
}

.scroll-right {
    right: 0;
}

.wrap-card {
    min-width: 250px;
    margin-right: 1rem;
}

</style>

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
    <section id="inquiries" class="relative section">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
            </div>
            <div class="col-12 position-relative">
                <!-- Scroll Left Button -->
                <button class="scroll-button scroll-left" id="scrollLeftInquiries" style="display: none;">
                    <i class="fas fa-chevron-left"></i>
                </button>

                <!-- Scrollable Container -->
                <div class="news-container" id="inquiriesContainer">
                    <div class="row flex-nowrap">
                        <?php foreach ($inquiries as $inq): ?>
                        <div class="col-md-4 wrap-card">
                            <div class="card widget-flat shadow-sm">
                                <div class="card-body d-flex align-items-center">
                                    <img src="../imgs/user.png" alt="Profile" class="rounded-circle border me-3" width="55" height="55">
                                    <div class="flex-grow-1">
                                        <h5 class="fw-bold mb-1 text-dark">
                                            <?php echo ($inq["firstname"] . " " . $inq["lastname"]); ?>
                                        </h5>
                                        <p class="text-muted mb-1 text-truncate" style="max-width: 170px; font-size: 14px;">
                                            <?php echo substr($inq["message"], 0, 50) . (strlen($inq["message"]) > 30 ? "..." : ""); ?>
                                        </p>
                                        <small class="text-muted"><?php echo $inq["date"]; ?></small>
                                    </div>
                                </div>
                                <div class="card-footer bg-light text-center">
                                <a href="admin.inquire.php" 
                                class="btn btn-success btn-sm w-100">
                                    <i class="bi bi-envelope-open"></i> View Message
                                </a>
                            </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Scroll Right Button -->
                <button class="scroll-button scroll-right" id="scrollRightInquiries">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const scrollContainer = document.getElementById("inquiriesContainer");
        const scrollLeft = document.getElementById("scrollLeftInquiries");
        const scrollRight = document.getElementById("scrollRightInquiries");

        function updateScrollButtons() {
            scrollLeft.style.display = scrollContainer.scrollLeft > 0 ? "block" : "none";
            scrollRight.style.display = (scrollContainer.scrollLeft + scrollContainer.clientWidth) < scrollContainer.scrollWidth ? "block" : "none";
        }

        scrollContainer.addEventListener("scroll", updateScrollButtons);

        scrollLeft.addEventListener("click", () => {
            scrollContainer.scrollBy({ left: -300, behavior: "smooth" });
        });

        scrollRight.addEventListener("click", () => {
            scrollContainer.scrollBy({ left: 300, behavior: "smooth" });
        });

        updateScrollButtons(); // Initial check
    });
</script>

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