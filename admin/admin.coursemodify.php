
<?php 
    session_start();
    ob_start();
    require_once "../classes/unit.class.php";
    require_once "../classes/course.class.php";
    require_once "../classes/staff_unit.class.php";
    require_once "../classes/enroll.class.php";
    require_once "../tools/clean.php";
    require_once "../admin/admin-chopdown/head.php";
    require_once "../admin/admin-chopdown/sidebar.php";
    require_once "../dash_chopdown/dash_head.php";
    require_once "../classes/faculty&staff.class.php";


    $objUnits = new Units;
    $objCourse = new Course;
    $objEnroll = new Enroll;
    $unit_id = isset($_GET['unit_id']) ? $_GET['unit_id'] : 1;

    $show = new Show();
    $personnel = $show->showPersonnel($unit_id);
    $objFacultyStaff = new FacultyStaff;
    $facultystaff = $objFacultyStaff->showFacultyStaff();
    $c_title = $c_desc = "";
    $unit_id = isset($_GET['unit_id']) ? $_GET['unit_id'] : 1;
    $showUnit = $objUnits->showAllUnits();
    $each = $objUnits->showUnit($unit_id);
    $course = $objCourse->showCourse($unit_id);
    $steps = $objEnroll->showSteps($unit_id);



    if (isset($_GET['delete_unit_id'])) {
        $unit_id_to_delete = $_GET['delete_unit_id'];
    
        if ($objUnits->delete_unit($unit_id_to_delete)) {
            // $_SESSION['success'] = "Unit deleted successfully!";
        } else {
            $_SESSION['error'] = "Failed to delete unit.";
        }
        header("Location: admin.units.php");
        exit;
    }
    
    

    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        $c_title = isset($_POST['c_title']) ? clean_input($_POST['c_title']) : '';
        $c_desc = isset($_POST['c_desc']) ? clean_input($_POST['c_desc']) : '';
    
    $objCourse->unit_id = $unit_id;
    $objCourse->c_title = $c_title;
    $objCourse->c_desc = $c_desc;
    
    if ($objCourse->addCourse()) {
        $_SESSION['success'] = "Course added successfully!";
    } else {
        $_SESSION['error'] = "Failed to add course.";
    }
    
    header("Location: admin.coursemodify.php?unit_id=" . $unit_id);
    exit;
    
}
if (isset($_SESSION['success'])) {
    echo '
    <div class="alert alert-success alert-dismissible fade show" style="margin-left: 18%; max-width: 81%;" role="alert">
        <strong>Success!</strong> ' . $_SESSION['success'] . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    unset($_SESSION['success']);
}

if (isset($_SESSION['error'])) {
    echo '
    <div class="alert alert-danger alert-dismissible fade show" style="margin-left: 18%; max-width: 81%;" role="alert">
        <strong>Error!</strong> ' . $_SESSION['error'] . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    unset($_SESSION['error']);
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

<link rel="stylesheet" href="../style/admin_course.css">

<div class="navbar-custom">
    <header class="px-1 shadow-sm">
        <div class="container-fluid d-flex justify-content-between">
            <button class="btn btn-toggle">
            <button id="menu-toggle" class="btn d-lg-none">
                <i class="bi bi-list fs-2"></i>
            </button>
                <h1 class="navtext">Units</h1>
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


<section class="first">
    <div class="content-page px-3 ">
        <div class="container-fluid">
        <div class="back mb-3 pt-3 ms-3">
                <!-- <a href="admin.units.php" class="btn btn shadow-sm" style="width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;">
                    <i class="bi bi-arrow-left fs-5 text-success"></i>
                </a> -->
            </div>
            <div class="container d-flex justify-content-center" data-aos="fade-up">
                <div class="section-title text-center mb-0">
                    <h2 class="header fs-1 mt-3 mb-4"><?php echo $each["u_title"]; ?></h2>
                    <p class="desc mt-3"><?php echo $each["u_description"]; ?></p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="px-6 pb-2 mt-2 text-center">
                <div id="services" class="services relative">
                    <div class="section-title text-center mb-2"> 
                        <h4 class="page-title fw-bold text-center mb-1">Function</h4> 
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-12 mb-2 d-flex">
                            <div class="card shadow-lg border-0 rounded-4 h-100 d-flex flex-column w-100 p-4 mt-0"> 
                                <div class="section-title text-center mb-0">
                                    <p class="desc mt-2"><?php echo $each["u_functions"]; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <div class="card-footer d-flex justify-content-center gap-4 mt-1">
            <a href="#" class="btn btn-warning btn-sm px-3 fw-semibold"
                data-bs-toggle="modal"
                data-bs-target="#editModal<?php echo $each['unit_id']; ?>">
                <i class="bi bi-pencil-square"></i> Edit
                </a>

                <a href="?delete_unit_id=<?php echo $each['unit_id']; ?>" class="btn btn-danger btn-sm px-3 fw-semibold" onclick="return confirm('Are you sure you want to delete this unit?');">
                    <i class="bi bi-trash"></i> Delete
                </a>
            </div>
            <div class="modal fade" id="editModal<?php echo $each['unit_id']; ?>" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form action="update_unit.php" method="POST">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Unit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <input type="hidden" name="unit_id" value="<?php echo $each['unit_id']; ?>">

                    <div class="mb-3">
                        <label for="u_title" class="form-label">Title</label>
                        <input type="text" class="form-control" name="u_title" value="<?php echo $each['u_title']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="u_description" class="form-label">Description</label>
                        <textarea class="form-control" name="u_description" required><?php echo $each['u_description']; ?></textarea>
                    </div>

                    <!-- Add functions input if needed -->
                    <div class="mb-3">
                        <label for="u_functions" class="form-label">Functions</label>
                        <textarea class="form-control" name="u_functions"><?php echo $each['u_functions']; ?></textarea>
                    </div>

                    </div>
                    <div class="modal-footer">
                    <button type="submit" name="update_unit" class="btn btn-primary">Update</button>
                    </div>
                </div>
                </form>
            </div>
            </div>

        <div class="row  modify">
            <div class="container px-6 pb-5 mt-5">
                <div id="services" class="services relative">
                    <div class="third ">          
                        <h4 class="page-title fw-bold text-center mt-4">Add a Course</h4>           
                        <div class="row justify-content-center">
                            <div class="col-12 mb-4 d-flex">
                                <div class="card shadow-lg border-0 rounded-4 h-100 d-flex flex-column w-100">
                                    <form action="" method="POST">
                                        <div class="card-body flex-grow-1">
                                            <p class="how mt-2 fw-bold">Description</p>
                                            <input class="form-control mb-3" name="c_title" rows="2" placeholder="Name of course" required></input>
                                            <textarea class="form-control mb-2" name="c_desc" rows="4" placeholder="Describe the course" required></textarea>
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
        <div class="row">
            <div class="container px-6 pb-5">
                <div id="services" class="services relative">
                    <div class="section-title text-center">
                    <h4 class="page-title fw-bold text-center">Course Added</h4>           
                    </div>
                    <div class="row justify-content-center">
                        <?php 
                        if (empty($course)): ?>
                            <div class="text-center">
                                <p class="text-muted">No courses yet added.</p>
                            </div>
                        <?php 
                        else:
                            foreach ($course as $crs): ?>
                                <div class="col-md-6 col-lg-4 mb-4">
                                    <div class="course-card p-4 text-center">
                                        <i class="fas fa-book-open fa-2x text-success mb-3"></i>
                                        <h5 class="fw-bold"><?php echo $crs["c_title"]; ?></h5>
                                        <p class="text-muted"><?php echo $crs["c_desc"]; ?></p>
                                        <div class="card-footer d-flex justify-content-center gap-2 mt-3"> 
                                        <button 
                                            class="btn btn-warning btn-sm px-4 fw-semibold edit-course-button" 
                                            data-id="<?= $crs['course_id']; ?>" 
                                            data-title="<?= htmlspecialchars($crs['c_title']); ?>" 
                                            data-desc="<?= htmlspecialchars($crs['c_desc']); ?>"
                                        >
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </button>
                                            <a href="#" class="btn btn-danger btn-sm px-4 fw-semibold delete-unit-button" data-id="<?= $crs['course_id']; ?>">
                                                <i class="bi bi-trash"></i> Delete
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editCourseModal" tabindex="-1" aria-labelledby="editCourseModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <form id="editCourseForm" method="POST" action="update_course.php">
                <input type="hidden" name="unit_id" id="editUnitId" value="<?= $unit_id; ?>">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="editCourseModalLabel">Edit Course</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="course_id" id="editCourseId">
                        <div class="mb-3">
                            <label for="editCourseTitle" class="form-label">Course Title</label>
                            <input type="text" class="form-control" name="c_title" id="editCourseTitle" required>
                        </div>
                        <div class="mb-3">
                            <label for="editCourseDesc" class="form-label">Course Description</label>
                            <textarea class="form-control" name="c_desc" id="editCourseDesc" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <style>
            .steps-wrapper {
                flex-wrap: wrap;
                justify-content: center;
                gap: 1rem;
            }

            .step-box {
                flex: 1 1 150px;
                max-width: 180px;
                min-width: 150px;
                min-height: 140px;
                padding: 0.75rem;
                background-color: #f8f9fa;
                border-radius: 12px;
                box-shadow: 0 4px 6px rgba(0,0,0,0.1);
                display: flex;
                flex-direction: column;
                justify-content: flex-start;
                text-align: center;
                margin: 0 auto;
            }

            .step-circle {
                width: 30px;
                height: 30px;
                background-color: #0b4103;
                color: white;
                font-weight: bold;
                border-radius: 50%;
                margin: 0 auto 10px;
                display: flex;
                justify-content: center;
                align-items: center;
                font-size: 1.0rem;
            }

            .arrow {
                font-size: 2rem;
                color: #6c757d;
                align-self: center;
            }

            /* Hide arrows and center layout on small screens */
            @media (max-width: 768px) {
                .steps-wrapper {
                justify-content: center;
                text-align: center;
                }

                .arrow {
                display: none;
                }

                .step-box {
                margin: 0 auto;
                }
            }
            .selectable-card {
                cursor: pointer;
                box-shadow: 0 4px 5px rgba(0, 0, 0, 0.1);
                background-color: #fff;
                height: 100%;
                display: flex;
                flex-direction: column;
                align-items: center;
                padding: 1.5rem;
                border-radius: 0.5rem;
            }

            .facultystaff-checkbox:checked + .selectable-card {
                border: 2px solid #198754;
                background-color: #e6ffed;
            }
        </style>
        <div class="row">
            <div class="container px-6 pb-5 pt-5">
                <div id="services" class="services relative">
                    <div class="section-title text-center">
                    <h4 class="page-title fw-bold text-center">Enroll Steps</h4>           
                    </div>
                    <section class="mt-5 avail">
                        <div class="container" data-aos="fade-up">
                            <div class="steps-wrapper d-flex justify-content-between align-items-center flex-wrap gap-4">
                            <?php  
                                $totalSteps = count($steps);
                                $i = 1;
                                foreach ($steps as $st): 
                            ?>
                                <div class="step-box text-center">
                                <div class="step-circle mb-4 mt-2"><?php echo $i; ?></div>
                                <p><?php echo $st['e_steps']; ?></p>
                                </div>

                                <?php if ($i < $totalSteps): ?>
                                <div class="arrow">→</div>
                                <?php endif; ?>

                            <?php 
                                $i++;
                                endforeach; 
                            ?>
                            </div>
                            <div class="card-footer d-flex justify-content-center gap-2 mt-5"> 
                                <a href="admin.addsteps.php?unit_id=<?php echo $unit_id; ?>&action=edit" class="btn btn-warning btn-sm px-4 fw-semibold">
                                 <i class="bi bi-pencil-square"></i> Edit
                                </a>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="container px-6 pb-5 p-5 mt-5">
                <div id="services" class="services relative">
                    <div class="section-title text-center mb-2"> 
                        <h4 class="page-title fw-bold text-center mb-1">Personel</h4> 
                    </div>
                    <div class="row justify-content-center">
                    <div class="col-12 mb-2 d-flex justify-content-center">
                        <div class="card shadow-lg border-0 rounded-4 h-100 d-flex flex-column w-100 p-4 mt-0" style="max-width: 1200px; margin: 0 auto;">
                            <?php if (!empty($personnel)) : ?>
                                <div class="row justify-content-center">
                                    <?php foreach ($personnel as $p): ?>
                                        <div class="col-md-4 col-lg-3 text-center d-flex justify-content-center mb-4">
                                            <div class="selectable-card p-4 rounded w-100 d-flex flex-column align-items-center justify-content-start border">
                                                <img src="../imgs/sillycar.jpg" class="img-fluid rounded-circle mb-3" alt="Faculty/Staff"
                                                    style="width: 120px; height: 120px; object-fit: cover;">
                                                <h5 class="fw-bold mb-1 text-wrap">
                                                    <?= htmlspecialchars($p['firstname'] . ' ' . $p['middleinitial'] . ' ' . $p['lastname']) ?>
                                                </h5>
                                                <span style="font-size: 1rem; color: #777;">
                                                    <?= htmlspecialchars($p['role']) ?>
                                                </span>
                                                <div class=" d-flex justify-content-center mt-3"> 
                                                    <a href="#" class="btn btn-danger btn-sm px-4 fw-semibold delete-staff-button" data-id="<?= $p['facultystaff_id']; ?>">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="d-flex justify-content-center mt-3">
                                <a href="#" class="btn btn-warning btn-sm px-5 fw-semibold" data-bs-toggle="modal" data-bs-target="#assignPersonnelModal">
                                    <i class="bi bi-plus"></i> Add Personnel
                                </a>

                                </div>
                            <?php else: ?>
                                <p class="text-muted text-center">No personnel assigned to this unit.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Assign Personnel Modal -->
        <div class="modal fade" id="assignPersonnelModal" tabindex="-1" aria-labelledby="assignPersonnelModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Assign Existing Personnel</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                <label>Select Faculty/Staff</label>
                <select class="form-select" name="facultystaff_id[]" multiple required>
                    <?php foreach ($facultystaff as $fs): ?>
                    <option value="<?= $fs['facultystaff_id']; ?>">
                        <?= $fs['firstname'] . ' ' . $fs['middleinitial'] . ' ' . $fs['lastname'] . ' - ' . $fs['role']; ?>
                    </option>
                    <?php endforeach; ?>
                </select>
                <!-- If you want to assign to a unit, include hidden input -->
                <input type="hidden" name="unit_id" value="$unit_id_from_context = isset($_GET['unit_id']) ? $_GET['unit_id'] : 1;
">
                </div>
                <div class="modal-footer">
                <button type="submit" name="assign_staff" class="btn btn-success">Assign</button>
                </div>
            </div>
            </form>
        </div>
        </div>
    </div>
</section>

<?php  require_once "../courses/js_courses.php"; ?>
<script>
    function toggleOtherRole(select) {
  const otherRoleInput = document.getElementById('otherRoleInput');
  if (select.value === 'Others') {
    otherRoleInput.style.display = 'block';
  } else {
    otherRoleInput.style.display = 'none';
  }
}

</script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    document.querySelectorAll(".delete-unit-button").forEach(button => {
        button.addEventListener("click", function (e) {
            e.preventDefault();
            const courseId = this.getAttribute("data-id");

            if (confirm("Are you sure you want to delete this course?")) {
                fetch("delete_course.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: "course_id=" + courseId
                })
                .then(response => response.text())
                .then(data => {
                    if (data.trim() === "success") {
                        alert("Course deleted successfully.");
                        location.reload(); // or remove the element from DOM
                    } else {
                        alert("Failed to delete course.");
                    }
                });
            }
        });
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.delete-staff-button');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            const staffId = this.getAttribute('data-id');
            
            if (confirm('Are you sure you want to delete this personnel?')) {
                fetch('delete_facultystaff.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'facultystaff_id=' + staffId
                })
                .then(response => response.text())
                .then(data => {
                    if (data.trim() == 'success') {
                        alert('Personnel deleted successfully!');
                        location.reload(); // Reload to refresh the personnel list
                    } else {
                        alert('Failed to delete personnel.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
            }
        });
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const editButtons = document.querySelectorAll('.edit-course-button');

    editButtons.forEach(button => {
        button.addEventListener('click', function () {
            const courseId = this.getAttribute('data-id');
            const courseTitle = this.getAttribute('data-title');
            const courseDesc = this.getAttribute('data-desc');

            document.getElementById('editCourseId').value = courseId;
            document.getElementById('editCourseTitle').value = courseTitle;
            document.getElementById('editCourseDesc').value = courseDesc;

            // Show the modal
            var myModal = new bootstrap.Modal(document.getElementById('editCourseModal'));
            myModal.show();
        });
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
}, 3000); 
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../vendor/bootstrap-5.3.3/js/bootstrap.bundle.min.js"></script>
<script src="../vendor/jQuery-3.7.1/jquery-3.7.1.min.js"></script>
<script src="../vendor/chartjs-4.4.5/chart.js"></script>
<script src="../vendor/datatable-2.1.8/datatables.min.js"></script>
<script src="../js/admin.js"></script>
<script src="../js/product.js"></script>
