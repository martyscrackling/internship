<?php
    $current_page = basename($_SERVER['PHP_SELF']);
?>

<style>
.nav-pills .nav-link.active {
    border-radius: 0px;
    border-left: 4px solid #ffffff;
    background-color:rgb(27, 73, 51) !important; 
    color: white !important;
}
#sidebar {
    transition: all 0.3s ease;
}

#sidebar.show {
    transform: translateX(0);
    opacity: 1;
}

</style>




<div class="sidebar flex-column flex-shrink-0" id="sidebar">
<div style="display: flex; flex-direction: column; align-items: center; margin-top: 40px;">
    <a href="" class="logo">
        <img class="img-fluid" src="../imgs/descd.png" alt="" style="width: 90px;">
    </a>
    <h5 class="logo-text" style="margin-top: 15px; color: white;">DESCD Admin</h5>
</div>
<br>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="side-nav-title">Home</li>
        <li class="nav-item">
            <a href="admin.dashboard.php" id="dashboard-link" class="nav-link  <?php if ($current_page == 'admin.dashboard.php') echo 'active'; ?>">
                <i class="bi bi-grid"></i>
                <span class="fs-6 ms-2">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="admin.announcement.php" id="dashboard-link" class="nav-link  <?php if ($current_page == 'admin.announcement.php') echo 'active'; ?>">
                <i class="bi bi-megaphone"></i>
                <span class="fs-6 ms-2">Announcements</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="admin.inquire.php" class="nav-link  <?php if ($current_page == 'admin.inquire.php') echo 'active'; ?>">
                <i class="bi bi-chat"></i>
                <span class="fs-6 ms-2">Inquiries</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="admin.units.php" class="nav-link  <?php if ($current_page == 'admin.units.php' ||  $current_page == 'admin.addsteps.php' || $current_page == 'admin.coursemodify.php') echo 'active'; ?>">
                <i class="bi bi-book"></i>
                <span class="fs-6 ms-2">Units</span>
            </a>
        </li>
        
        <li class="nav-item">
            <a href="admin.facultystaff.php" class="nav-link  <?php if ($current_page == 'admin.facultystaff.php') echo 'active'; ?>">
                <i class="bi bi-person"></i>
                <span class="fs-6 ms-2">Faculty & Staff</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="admin.about.php" class="nav-link  <?php if ($current_page == 'admin.about.php' ||  $current_page == 'admin.showabout.php') echo 'active'; ?>">
                <i class="bi bi-question-circle"></i>
                <span class="fs-6 ms-2">About</span>
            </a>
        </li>
        
            <!-- <li class="side-nav-title">Settings</li>
            <li class="nav-item">
                <a href="admin.accounts.php" class="nav-link">
                    <i class="bi bi-people"></i>
                    <span class="fs-6 ms-2">Accounts</span>
                </a>
            </li> -->
    </ul>
</div>