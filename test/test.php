<?php 
    session_start();
    require_once "admin-chopdown/head.php";
    require_once "../classes/faculty&staff.class.php";
    require_once "admin-chopdown/sidebar.php";
    require_once '../tools/clean.php';

    $objFacultyStaff = new FacultyStaff;
    $firstname = $middleinitial = $lastname = $role = "";

    // Handle update
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
    
    // Handle deletion
    if (isset($_GET['delete_id'])) {
        $deleteId = clean_input($_GET['delete_id']);
        if ($objFacultyStaff->delete_facultysfaff($deleteId)) {
            $_SESSION['success_msg'] = "Faculty/Staff removed successfully.";
        } else {
            $_SESSION['error_msg'] = "Failed to delete Faculty/Staff.";
        }
    
        header("Location: admin.facultystaff.php");
        exit();
    }
    
    // Handle adding new faculty/staff
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add_faculty'])) {
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

        header("Location: admin.facultystaff.php");
        exit();
    } 

    // Get all faculty/staff
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

<style>
    .card {
        border-radius: 1rem;
        background-color: #f8f9fa;
    }
    .card h4 {
        font-weight: 600;
        color: #2e5f3e;
    }
    .member-card {
        transition: transform 0.3s;
    }
    .member-card:hover {
        transform: scale(1.05);
    }
    .select-faculty-btn {
        margin-top: 10px;
    }
</style>

<!-- Success/Error Messages -->
<?php if (isset($_SESSION['success_msg'])): ?>
    <div class="alert alert-success alert-dismissible fade show" style="margin-left: 18%; max-width: 81%;" role="alert">
        <?= $_SESSION['success_msg']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['success_msg']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['error_msg'])): ?>
    <div class="alert alert-danger alert-dismissible fade show ms-lg-5 ms-md-4" role="alert">
        <?= $_SESSION['error_msg']; ?>
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
                <button class="btn btn-success me-2" data-bs-toggle="modal" data-bs-target="#addFacultyModal">
                    <i class="bi bi-plus-circle"></i> Add Faculty/Staff
                </button>
                <a href="../auth/logout.php" class="d-flex align-items-center gap-2 px-3 py-2 text-decoration-none text-dark">
                    <i class="bi bi-box-arrow-right fs-5"></i>
                    <span class="fw-semibold">Logout</span>
                </a>
            </div>
        </div>
    </header>
</div>

<body>
<section id="team" class="team section">    
    <div class="custom-container" style="width: 70%; margin-left: 340px;">
        <div class="container section-title mb-0" data-aos="fade-up" style="margin-bottom: 5px !important;">
            <h2 class="text-success fw-bold mt-4">Faculty and Staff</h2>
            <p class="text-muted">Select a faculty/staff member to assign them to a task or view details</p>
        </div>

        <!-- Supervisor In Charge Section -->
        <?php if (!empty($supervisorInCharge)): ?>
            <h4 class="mt-4 mb-3">Supervisor In Charge</h4>
            <div class="row gy-5">
                <?php foreach($supervisorInCharge as $fs): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card p-3">
                            <div class="profile-card text-center">
                                <img src="../imgs/smily.jpg" class="img-fluid rounded-circle mb-3" style="width: 180px; height: 180px; object-fit: cover;">
                                <div class="member-info-pre">
                                    <h4><?= htmlspecialchars($fs['firstname'] . ' ' . $fs['middleinitial'] . ' ' . $fs['lastname']) ?></h4>
                                    <span class="badge bg-primary"><?= htmlspecialchars($fs['role']) ?></span>
                                    <div class="mt-3 d-flex justify-content-center gap-2">
                                        <button class="btn btn-sm btn-warning edit-btn" data-id="<?= $fs['facultystaff_id'] ?>">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </button>
                                        <a href="?delete_id=<?= $fs['facultystaff_id'] ?>" onclick="return confirm('Are you sure you want to delete this entry?');" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i> Delete
                                        </a>
                                        <button class="btn btn-sm btn-info select-faculty-btn" 
                                            data-id="<?= $fs['facultystaff_id'] ?>"
                                            data-name="<?= htmlspecialchars($fs['firstname'] . ' ' . $fs['middleinitial'] . ' ' . $fs['lastname']) ?>"
                                            data-role="<?= htmlspecialchars($fs['role']) ?>">
                                            <i class="bi bi-check-circle"></i> Select
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <!-- Other Faculty/Staff Section -->
        <?php if (!empty($otherRoles)): ?>
            <h4 class="mt-5 mb-3">Faculty and Staff Members</h4>
            <div class="row">
                <?php foreach($otherRoles as $fs): ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card member-card p-3">
                            <div class="member-pic text-center">
                                <img src="../imgs/grannycat.jpg" class="img-fluid rounded-circle mb-3" style="width: 120px; height: 120px; object-fit: cover;">
                                <div class="member-info">
                                    <h5><?= htmlspecialchars($fs['firstname'] . ' ' . $fs['middleinitial'] . ' ' . $fs['lastname']) ?></h5>
                                    <span class="badge bg-secondary"><?= htmlspecialchars($fs['role']) ?></span>
                                    <div class="mt-3 d-flex justify-content-center gap-2 flex-wrap">
                                        <button class="btn btn-sm btn-warning edit-btn" data-id="<?= $fs['facultystaff_id'] ?>">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <a href="?delete_id=<?= $fs['facultystaff_id'] ?>" onclick="return confirm('Are you sure you want to delete this entry?');" class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        <button class="btn btn-sm btn-info select-faculty-btn" 
                                            data-id="<?= $fs['facultystaff_id'] ?>"
                                            data-name="<?= htmlspecialchars($fs['firstname'] . ' ' . $fs['middleinitial'] . ' ' . $fs['lastname']) ?>"
                                            data-role="<?= htmlspecialchars($fs['role']) ?>">
                                            <i class="bi bi-check-circle"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- Add Faculty Modal -->
<div class="modal fade" id="addFacultyModal" tabindex="-1" aria-labelledby="addFacultyModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Faculty/Staff</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" name="firstname" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Middle Initial</label>
                        <input type="text" class="form-control" name="middleinitial" maxlength="1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="lastname" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select class="form-select" name="role" id="roleSelect">
                            <option value="Supervisor-In-Charge">Supervisor-In-Charge</option>
                            <option value="Faculty">Faculty</option>
                            <option value="Staff">Staff</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <div class="mb-3" id="otherRoleContainer" style="display: none;">
                        <label class="form-label">Specify Role</label>
                        <input type="text" class="form-control" name="other_role">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="add_faculty" class="btn btn-primary">Add Faculty/Staff</button>
                </div>
            </form>
        </div>
    </div>
</div>

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
                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" class="form-control" name="edit_firstname" id="edit_firstname" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Middle Initial</label>
                        <input type="text" class="form-control" name="edit_middleinitial" id="edit_middleinitial" maxlength="1">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" class="form-control" name="edit_lastname" id="edit_lastname" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Role</label>
                        <select class="form-select" name="edit_role" id="edit_role">
                            <option value="Supervisor-In-Charge">Supervisor-In-Charge</option>
                            <option value="Faculty">Faculty</option>
                            <option value="Staff">Staff</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="update_faculty" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Selection Modal -->
<div class="modal fade" id="selectionModal" tabindex="-1" aria-labelledby="selectionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Faculty/Staff Selected</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <p>You have selected: <strong id="selectedName"></strong></p>
                <p>Role: <span class="badge bg-primary" id="selectedRole"></span></p>
                <div class="mb-3">
                    <label class="form-label">Assign Task/Note</label>
                    <textarea class="form-control" id="taskNote" rows="3"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="confirmSelection">Confirm Selection</button>
            </div>
        </div>
    </div>
</div>

<script src="../vendor/bootstrap-5.3.3/js/bootstrap.bundle.min.js"></script>
<script src="../vendor/jQuery-3.7.1/jquery-3.7.1.min.js"></script>

<script>
    // Toggle other role field
    $('#roleSelect').change(function() {
        if ($(this).val() === 'Others') {
            $('#otherRoleContainer').show();
        } else {
            $('#otherRoleContainer').hide();
        }
    });

    // Edit button functionality
    $(document).on('click', '.edit-btn', function() {
        const id = $(this).data('id');
        
        // You would typically fetch the data via AJAX here, but for simplicity:
        const card = $(this).closest('.card');
        const name = card.find('h4, h5').text().trim().split(' ');
        const role = card.find('.badge').text().trim();
        
        $('#edit_id').val(id);
        $('#edit_firstname').val(name[0]);
        $('#edit_middleinitial').val(name.length > 2 ? name[1] : '');
        $('#edit_lastname').val(name.length > 2 ? name.slice(2).join(' ') : name.slice(1).join(' '));
        $('#edit_role').val(role);
        
        $('#editModal').modal('show');
    });

    // Select faculty functionality
    $(document).on('click', '.select-faculty-btn', function() {
        const id = $(this).data('id');
        const name = $(this).data('name');
        const role = $(this).data('role');
        
        $('#selectedName').text(name);
        $('#selectedRole').text(role);
        $('#selectionModal').modal('show');
        
        // Store the selected faculty ID in a hidden field or variable
        $('#confirmSelection').data('id', id);
    });

    // Confirm selection
    $('#confirmSelection').click(function() {
        const id = $(this).data('id');
        const note = $('#taskNote').val();
        
        // Here you would typically send this data to the server via AJAX
        alert(`Faculty/Staff ID ${id} selected with note: ${note}`);
        
        $('#selectionModal').modal('hide');
    });

    // Menu toggle
    document.addEventListener("DOMContentLoaded", function() {
        const menuToggle = document.getElementById("menu-toggle");
        const sidebar = document.getElementById("sidebar");

        menuToggle.addEventListener("click", function() {
            sidebar.classList.toggle("show");
        });
    });

    // Auto-dismiss alerts
    setTimeout(function() {
        $('.alert').alert('close');
    }, 3000);
</script>
</body>
</html>