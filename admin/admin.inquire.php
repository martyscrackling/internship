<?php 
    session_start();
    require_once "admin-chopdown/head.php";
    require_once "../classes/inquire.class.php";
    $objInquire = new Inquire;
    $inquiries = $objInquire->call_inquiries();
?>

<style>
/* Global Responsive Styles */
body {
    overflow-x: hidden;
}

/* Navbar Styles */
.navbar-custom {
    position: sticky;
    top: 0;
    z-index: 1000;
    background-color: #fff;
}

/* Sidebar Responsive Behavior */
#sidebar {
    transition: all 0.3s ease;
}

@media (max-width: 991px) {
    #sidebar {
        margin-left: -250px;
        position: fixed;
        height: 100%;
        z-index: 1050;
    }
    
    #sidebar.show {
        margin-left: 0;
    }
    
    .content-page {
        width: 100%;
        margin-left: 0;
    }
}

/* Message List Responsive Styles */
.message-item {
    transition: all 0.2s ease;
    border-radius: 8px;
    margin-bottom: 8px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.1);
}

.message-item:hover {
    background-color: #f8f9fa;
}

.user-img {
    border-radius: 50% !important;
    object-fit: cover;
}

.message-content {
    overflow: hidden;
    width: 100%;
}

.message-date {
    font-size: 0.75rem;
    display: block;
}

/* Touch-friendly buttons */
.action-btn {
    padding: 0.375rem 0.75rem;
}

@media (max-width: 767px) {
    .action-btn {
        padding: 0.375rem 0.5rem;
    }
    
    .action-btn-text {
        display: none;
    }
    
    .navbar-custom h1.navtext {
        font-size: 1.5rem;
    }
}

/* Dark mode compatibility and contrast */
@media (prefers-color-scheme: dark) {
    .message-item:hover {
        background-color: rgba(255, 255, 255, 0.05);
    }
}
</style>

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

<div class="content-page px-2 px-md-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 py-3">
                <div class="list-group">
                    <?php foreach ($inquiries as $inq): ?>
                    <div class="list-group-item list-group-item-action message-item p-3">
                        <div class="d-flex flex-column flex-md-row w-100">
                            <div class="d-flex flex-grow-1">
                                <img src="../imgs/user.png" alt="User" class="user-img me-2 me-sm-3" width="40" height="40">
                                <div class="flex-grow-1 message-content">
                                    <h6 class="fw-bold fs-6 mb-1"><?php echo ($inq["firstname"] . " " . $inq["lastname"]); ?></h6>
                                    <p class="email text-muted small mb-2"><?php echo $inq["email"]; ?></p>
                                    <p class="fw-1 mb-1 message-text"><?php echo substr($inq["message"], 0, 50) . (strlen($inq["message"]) > 30 ? "..." : ""); ?></p>
                                    <small class="text-muted message-date"><?php echo $inq["date"]; ?></small>
                                </div>
                            </div>
                            <div class="d-flex mt-2 mt-md-0 align-items-center justify-content-end">
                                <button class="btn btn-outline-primary btn-sm action-btn me-2 view-message-btn"
                                    data-id="<?php echo $inq['inquire_id']; ?>"
                                    data-firstname="<?php echo htmlspecialchars($inq['firstname'], ENT_QUOTES); ?>"
                                    data-lastname="<?php echo htmlspecialchars($inq['lastname'], ENT_QUOTES); ?>"
                                    data-email="<?php echo htmlspecialchars($inq['email'], ENT_QUOTES); ?>"
                                    data-message="<?php echo htmlspecialchars($inq['message'], ENT_QUOTES); ?>">
                                    <i class="bi bi-eye"></i> <span class="action-btn-text">View</span>
                                </button>
                                <button class="btn btn-outline-danger btn-sm action-btn">
                                    <i class="bi bi-trash"></i> <span class="action-btn-text">Delete</span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fs-5 fs-md-4" id="messageModalLabel">Message Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-3 px-sm-4">
                <div class="container-fluid">
                    <div class="row mb-3">
                        <div class="col-12">
                            <p class="mb-1 fw-semibold text-muted fs-6 fs-md-5">Full Name:</p>
                            <p id="modal-fullname" class="fs-6 fs-md-5 text-break"></p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <p class="mb-1 fw-semibold text-muted fs-6 fs-md-5">Email:</p>
                            <p id="modal-email" class="fs-6 fs-md-5 text-break"></p>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12">
                            <p class="mb-1 fw-semibold text-muted fs-6 fs-md-5">Date:</p>
                            <p id="modal-date" class="fs-6 fs-md-5 text-break"></p>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-12">
                            <p class="mb-1 fw-semibold text-muted fs-6 fs-md-5">Message:</p>
                            <div id="modal-message" class="fs-6 fs-md-5 border rounded p-3 bg-light text-break" style="white-space: pre-line;"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <a id="reply-email-btn" href="https://mail.google.com/mail/u/0/#inbox?compose=new" target="_blank" class="btn btn-danger px-4">
                <i class="bi bi-envelope-fill me-2"></i>Reply on Gmail
            </a>
            </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const viewButtons = document.querySelectorAll('.view-message-btn');
        const messageModal = new bootstrap.Modal(document.getElementById('messageModal'));

        const modalFullname = document.getElementById('modal-fullname');
        const modalEmail = document.getElementById('modal-email');
        const modalMessage = document.getElementById('modal-message');
        const modalDate = document.getElementById('modal-date');


        viewButtons.forEach(button => {
            button.addEventListener('click', function () {
                const firstname = this.getAttribute('data-firstname');
                const lastname = this.getAttribute('data-lastname');
                const email = this.getAttribute('data-email');
                const message = this.getAttribute('data-message');
                const date = this.closest('.message-item').querySelector('.message-date').textContent;
                modalDate.textContent = date;

                modalFullname.textContent = `${firstname} ${lastname}`;
                modalEmail.textContent = email;
                modalMessage.textContent = message;


                const replyBtn = document.getElementById('reply-email-btn');
                replyBtn.href = `https://mail.google.com/mail/?view=cm&fs=1&to=${encodeURIComponent(email)}`;
                messageModal.show();
            });
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const menuToggle = document.getElementById("menu-toggle");
        const sidebar = document.getElementById("sidebar");
        const content = document.querySelector(".content-page");
        
        menuToggle.addEventListener("click", function () {
            sidebar.classList.toggle("show");

            if (sidebar.classList.contains("show") && window.innerWidth < 992) {
                const overlay = document.createElement("div");
                overlay.id = "sidebar-overlay";
                overlay.style.position = "fixed";
                overlay.style.top = "0";
                overlay.style.left = "0";
                overlay.style.width = "100%";
                overlay.style.height = "100%";
                overlay.style.backgroundColor = "rgba(0,0,0,0.3)";
                overlay.style.zIndex = "1040";
                document.body.appendChild(overlay);

                overlay.addEventListener("click", function () {
                    sidebar.classList.remove("show");
                    this.remove();
                });
            } else {
                const existingOverlay = document.getElementById("sidebar-overlay");
                if (existingOverlay) existingOverlay.remove();
            }
        });

        window.addEventListener("resize", function () {
            if (window.innerWidth >= 992) {
                sidebar.classList.remove("show");
                const existingOverlay = document.getElementById("sidebar-overlay");
                if (existingOverlay) existingOverlay.remove();
            }
        });

        if ('ontouchstart' in window) {
            const actionButtons = document.querySelectorAll('.action-btn');
            actionButtons.forEach(button => button.classList.add('py-2'));
        }
    });
</script>

<script src="../vendor/bootstrap-5.3.3/js/bootstrap.bundle.min.js"></script>
<script src="../vendor/jQuery-3.7.1/jquery-3.7.1.min.js"></script>
<script src="../vendor/chartjs-4.4.5/chart.js"></script>
<script src="../vendor/datatable-2.1.8/datatables.min.js"></script>
<script src="../js/admin.js"></script>
<script src="../js/product.js"></script>