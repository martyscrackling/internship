<?php 
    session_start();
    require_once "admin-chopdown/head.php";
    require_once "../classes/faculty&staff.class.php";
    require_once "admin-chopdown/sidebar.php";
    require_once '../tools/clean.php';

    $objFacultyStaff = new FacultyStaff;
    $firstname = $middleinitial = $lastname = $role = "";


    if (isset($_POST['update_faculty'])) {
        $objFacultyStaff->facultystaff_id = clean_input($_POST['edit_id']);
        $objFacultyStaff->firstname = clean_input($_POST['edit_firstname']);
        $objFacultyStaff->middleinitial = clean_input($_POST['edit_middleinitial']);
        $objFacultyStaff->lastname = clean_input($_POST['edit_lastname']);
        $objFacultyStaff->role = clean_input($_POST['edit_role']);
    
        if ($objFacultyStaff->updateFaculty()) {
            $_SESSION['success_msg'] = "Faculty/Staff updated successfully.";
        } else {
            $_SESSION['error_msg'] = "Failed to update Faculty/Staff.";
        }
    
        header("Location: admin.facultystaff.php");
        exit();
    }
    

    if (isset($_GET['delete_id'])) {
        $deleteId = clean_input($_GET['delete_id']);
        if ($objFacultyStaff->delete_facultysfaff($deleteId)) {
            $_SESSION['success_msg'] = "Faculty/Staff removed successfully.";
        } else {
            $_SESSION['error_msg'] = "Failed to delete Faculty/Staff.";
        }
    
        // Redirect to the same page (clears the GET parameter from URL)
        header("Location: admin.facultystaff.php");
        exit();
    }
    


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
            $_SESSION['success_msg'] = "Faculty/Staff added successfully.";
        } else {
            $_SESSION['error_msg'] = "Failed to add Faculty/Staff.";
        }

        // Redirect to avoid form resubmission
        header("Location: admin.addprofile.php?facultystaff_id=$facultystaff_id");
        exit();

    } 
    if (isset($_POST['assign_staff']) && isset($_POST['facultystaff_id'])) {
        $unit_id = clean_input($_POST['unit_id']);
        $selected_ids = $_POST['facultystaff_id']; // array of selected staff
    
        $objFacultyStaff->assignFacultyStaff($unit_id, $selected_ids);
        $_SESSION['success_msg'] = "Personnel assigned successfully.";
        header("Location: admin.facultystaff.php");
        exit();
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

<!-- <?php if (isset($_SESSION['success_msg'])): ?>
    <div class="alert alert-success alert-dismissible fade show" style="margin-left: 18%; max-width: 81%;" role="alert">
        <strong>Deleted!</strong> <?= $_SESSION['success_msg']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['success_msg']); ?>
<?php endif; ?> -->

<?php if (isset($_SESSION['error_msg'])): ?>
    <div class="alert alert-danger alert-dismissible fade show ms-lg-5 ms-md-4" role="alert">
        <strong>Error!</strong> <?= $_SESSION['error_msg']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['error_msg']); ?>
<?php endif; ?>
<div class="navbar-custom">
    <header class="px-1 shadow-sm">
        <div class="container-fluid d-flex justify-content-between">
            <button class="btn btn-toggle">
            <button id="menu-toggle" class="btn d-lg-none">
                <i class="bi bi-list fs-2"></i>
            </button>
                <h1 class="navtext">Faculty and Staff</h1>
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


      <!-- <div class="mb-3">
        <label for="profilePic" class="form-label">Profile Picture</label>
        <input class="form-control" type="file" id="profilePic" name="profilepicture" accept="image/*">
      </div> -->

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
                            <button 
                                class="btn btn-sm btn-warning"
                                data-id="<?php echo $fs['facultystaff_id']; ?>"
                                >
                                <i class="bi bi-pencil-square"></i> Edit
                                </button>
                                <a href="?delete_id=<?php echo $fs['facultystaff_id']; ?>" onclick="return confirm('Are you sure you want to delete this entry?');" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Delete
                                </a>
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
                            <button 
                                class="btn btn-sm btn-warning"
                                data-id="<?php echo $fs['facultystaff_id']; ?>"
                                >
                                <i class="bi bi-pencil-square"></i> Edit
                                </button>
                                <a href="?delete_id=<?php echo $fs['facultystaff_id']; ?>" onclick="return confirm('Are you sure you want to delete this entry?');" class="btn btn-sm btn-danger">
                                    <i class="bi bi-trash"></i> Delete
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>
<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" id="editForm">
      <input type="hidden" name="edit_id" id="edit_id">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Faculty/Staff</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <label>First Name</label>
          <input type="text" class="form-control" name="edit_firstname" id="edit_firstname" required>
          <label>Middle Initial</label>
          <input type="text" class="form-control" name="edit_middleinitial" id="edit_middleinitial">
          <label>Last Name</label>
          <input type="text" class="form-control" name="edit_lastname" id="edit_lastname" required>
          <label>Role</label>
          <input type="text" class="form-control" name="edit_role" id="edit_role" required>
        </div>
        <div class="modal-footer">
          <button type="submit" name="update_faculty" class="btn btn-primary">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>

</body>

<?php 
    require_once "../courses/js_courses.php"; 
?>



<script>
    document.querySelectorAll('.btn-warning').forEach(button => {
    button.addEventListener('click', function () {
        const card = this.closest('.profile-card, .col-lg-3');
        const name = card.querySelector('h4').innerText.split(" ");
        const role = card.querySelector('span').innerText;

        document.getElementById('edit_id').value = this.getAttribute('data-id');
        document.getElementById('edit_firstname').value = name[0];
        document.getElementById('edit_middleinitial').value = name[1] || '';
        document.getElementById('edit_lastname').value = name.slice(-1)[0];
        document.getElementById('edit_role').value = role;

        new bootstrap.Modal(document.getElementById('editModal')).show();
    });
});

</script>
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