<?php 
    session_start();
    require_once "admin-chopdown/head.php";
    require_once "../classes/faculty&staff.class.php";
    require_once "admin-chopdown/sidebar.php";
    require_once '../tools/clean.php';

    $objFacultyStaff = new FacultyStaff;
    $firstname = $middleinitial = $lastname = $role = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $firstname = isset($_POST['firstname']) ? clean_input($_POST['firstname']) : '';
        $middleinitial = isset($_POST['middleinitial']) ? clean_input($_POST['middleinitial']) : '';
        $lastname = isset($_POST['lastname']) ? clean_input($_POST['lastname']) : '';
        
            if (isset($_POST['role']) && $_POST['role'] == 'Others' && isset($_POST['other_role']) && !empty($_POST['other_role'])) {
            $role = clean_input($_POST['other_role']);
        } else {
            $role = isset($_POST['role']) ? clean_input($_POST['role']) : '';
        }

        $objFacultyStaff->firstname = $firstname;
        $objFacultyStaff->middleinitial = $middleinitial;
        $objFacultyStaff->lastname = $lastname;
        $objFacultyStaff->role = $role;

        if ($objFacultyStaff->addFacultyStaff()) {
            echo '
                <div class="alert alert-success alert-dismissible fade show" style="margin-left: 18%; max-width: 81%;" role="alert">
                    <strong>Success!</strong> Faculty/Staff added successfully.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ';
        } else {
            echo '
                <div class="alert alert-danger alert-dismissible fade show ms-lg-5 ms-md-4" role="alert">
                    <strong>Error!</strong> Failed to add Faculty/Staff.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            ';
        }
    }
?>

<style>
    .card {
  border-radius: 1rem;
  background-color: #f8f9fa;
}

.card h4 {
  font-weight: 600;
  color: #2e5f3e;
}

</style>

<div class="navbar-custom">
    <header class="px-1 shadow-sm">
        <div class="container-fluid d-flex justify-content-between">
            <button class="btn btn-toggle">
            <button id="menu-toggle" class="btn d-lg-none">
                <i class="bi bi-list fs-2"></i>
            </button>
                <h1 class="navtext">Faculty and Staff</h1>
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

<div class="container mt-5" style="width: 77%; margin-right: 40px;">
  <div class="card shadow-sm p-4">
    <h4 class="mb-4">Add Faculty or Staff</h4>
    <form action="" method="POST" enctype="multipart/form-data">
    <div class="row mb-3">
        <div class="col-md-4">
          <label for="firstname" class="form-label">First Name</label>
          <input type="text" class="form-control" id="firstname" name="firstname" required>
        </div>
        <div class="col-md-4">
          <label for="middleinitial" class="form-label">Middle Initial</label>
          <input type="text" class="form-control" id="middleinitial" name="middleinitial">
        </div>
        <div class="col-md-4">
          <label for="lastname" class="form-label">Last Name</label>
          <input type="text" class="form-control" id="lastname" name="lastname" required>
        </div>
    </div>
    <div class="mb-3">
    <label for="role" class="form-label">Role</label>
    <select class="form-select" id="role" name="role" required>
        <option value="" disabled selected>Select Role</option>
        <option value="Supervisor-In-Charge">Supervisor-In-Charge</option>
        <option value="Instructor">Instructor</option>
        <option value="Secretary">Secretary</option>
        <option value="Registrar">Registrar</option>
        <option value="Finance Officer">Finance Officer</option>
        <option value="Others">Others</option>
    </select>
</div>


<div class="mb-3" id="other-role-container" style="display: none;">
    <label for="other-role" class="form-label">Please specify other role</label>
    <input type="text" class="form-control" id="other-role" name="other_role" placeholder="Enter custom role">
</div>

<script>
    const roleSelect = document.getElementById('role');
    const otherRoleContainer = document.getElementById('other-role-container');
    const otherRoleInput = document.getElementById('other-role');

    roleSelect.addEventListener('change', function () {
        if (this.value === 'Others') {
            otherRoleContainer.style.display = 'block';
            otherRoleInput.setAttribute('required', true);
        } else {
            otherRoleContainer.style.display = 'none';
            otherRoleInput.removeAttribute('required');
        }
    });
</script>


      <div class="mb-3">
        <label for="profilePic" class="form-label">Profile Picture</label>
        <input class="form-control" type="file" id="profilePic" name="profilepicture" accept="image/*">
      </div>

      <button type="submit" class="btn btn-success" >Add Member</button>
    </form>
  </div>
</div>

<?php 
    require_once "../dash_chopdown/dash_head.php"; 
    require_once "../classes/faculty&staff.class.php";

    $objFacultyStaff = new FacultyStaff;
    $facultystaff = $objFacultyStaff->showFacultyStaff();

    $supervisorInCharge = [];
    $otherRoles = [];

    foreach ($facultystaff as $fs) {
        if ($fs['role'] == 'Supervisor-In-Charge') {
            $supervisorInCharge[] = $fs;
        } else {
            $otherRoles[] = $fs;
        }
    }

    $facultystaffSorted = array_merge($supervisorInCharge, $otherRoles);
?>
<link rel="stylesheet" href="../style/faculty&staff.css">
<title>Faculty and Staff</title>

<body>
<section id="team" class="team section">    
<div class="custom-container" style="width: 70%; margin-left: 340px;">
        <div class="container section-title mb-0" data-aos="fade-up" style="margin-bottom: 5px !important;">
            <h2 class="text-success fw-bold mt-4">Faculty and Staff</h2>
        </div>

        <?php foreach($supervisorInCharge as $fs): ?>
            <div class="container">
                <div class="row gy-5">
                    <div class="profile-card" style="border: none; padding: 5px; max-width: 346px; margin: 50px auto; text-align: center;">
                        <img src="../imgs/smily.jpg" class="img-fluid" style="width: 280px; height: 300px; object-fit: cover; border-radius: 50%; margin-bottom: 15px;">
                        <div class="member-info-pre text-center" style="font-family: Arial, sans-serif; color: #333;">
                            <h4 style="font-size: 1.5rem; margin-bottom: 10px;"><?php echo $fs['firstname'] . ' ' . $fs['middleinitial'] . ' ' . $fs['lastname']; ?></h4>
                            <span style="font-size: 1rem; color: #777;"><?php echo $fs['role']; ?></span>
                            <div class="mt-3 d-flex justify-content-center gap-2">
                                <button class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Edit</button>
                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>


        <?php if (!empty($otherRoles)): ?>
            <div class="center-member container pb-5">
                <div class="row justify-content-center">
                    <?php foreach($otherRoles as $fs): ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 mb-4 mt-0" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-card">
                                <div class="member-pic">
                                    <img src="../imgs/grannycat.jpg" class="img-fluid" alt="Walter White">
                                    <div class="member-info text-center">
                                        <h4><?php echo $fs['firstname'] . ' ' . $fs['middleinitial'] . ' ' . $fs['lastname']; ?></h4>
                                        <span><?php echo $fs['role']; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 d-flex justify-content-center gap-2">
                                <button class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i> Edit</button>
                                <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i> Delete</button>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

</body>

<?php 
    require_once "../courses/js_courses.php"; 
?>




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
   setTimeout(function() {
    var alert = document.querySelector('.alert');
    if (alert) {
        let bsAlert = new bootstrap.Alert(alert);
        bsAlert.close();
    }
}, 3000); // 3000ms = 3 seconds
</script>
<script src="../vendor/bootstrap-5.3.3/js/bootstrap.bundle.min.js"></script>
<script src="../vendor/jQuery-3.7.1/jquery-3.7.1.min.js"></script>
<script src="../vendor/chartjs-4.4.5/chart.js"></script>
<script src="../vendor/datatable-2.1.8/datatables.min.js"></script>
<script src="../js/admin.js"></script>
<script src="../js/product.js"></script>