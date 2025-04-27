<?php 
    session_start();
    require_once "../classes/unit.class.php";
    require_once "../tools/clean.php";
    require_once "../classes/faculty&staff.class.php";
    require_once "admin-chopdown/head.php";

    $objUnits = new Units;
    $objFacultyStaff = new FacultyStaff;
    $showUnit = $objUnits->showAllUnits();
    $facultystaff = $objFacultyStaff->showFacultyStaff();
    $u_title = $u_description = $u_functions = "";


    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        $u_title = isset($_POST['u_title']) ? clean_input($_POST['u_title']) : '';
        $u_description = isset($_POST['u_description']) ? clean_input($_POST['u_description']) : '';
        $u_functions = isset($_POST['u_functions']) ? clean_input($_POST['u_functions']) : '';


    $objUnits->u_title = $u_title;
    $objUnits->u_description = $u_description;
    $objUnits->u_functions = $u_functions;

    $unit_id = $objUnits->addUnit();

if ($unit_id != false) {
    if (!empty($_POST['facultystaff_ids'])) {
        $facultystaff_ids = $_POST['facultystaff_ids'];
        $objUnits->assignFacultyStaff($unit_id, $facultystaff_ids);
    }

    $_SESSION['unit_success'] = "Unit added successfully!";
    header("Location: admin.addsteps.php?unit_id=$unit_id");
    exit();
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
.selectable-card {
    cursor: pointer;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
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

<body>
    <div class="content-page px-3">
    <div class="container-fluid ">
        <div class="row">
            <div class="container px-6">
                <section id="services" class="services relative">
                    <div class="third ">          
                        <h4 class="page-title fw-bold text-center">Add a Unit</h4>           
                        <div class="row justify-content-center">
                        <div class="col-12 mb-4 d-flex">
                            <div class="card shadow-lg border-0 rounded-4 h-100 d-flex flex-column w-100 p-3">
                            <form action="" method="POST">
                                <div class="card-body flex-grow-1">
                                    <input class="form-control mb-3" name="u_title" rows="2" placeholder="Name of Unit" required></input>
                                    <textarea class="form-control mb-2" name="u_description" rows="4" placeholder="Describe the unit" required></textarea>
                                    <textarea class="form-control mb-2" name="u_functions" rows="4" placeholder="Function of the unit" required></textarea> 
                                    <div class="facsta">
                                    <div class="text-center">
                                        <label for="facultystaff" class="form-label">
                                            <p class="fw-bold fs-5 mt-5 mb-2">
                                                Choose Staff
                                            </p>
                                        </label>
                                    </div>
                                        <div class="container" data-aos="fade-up">
                                            <div class="row justify-content-center gy-4">
                                                <?php foreach ($facultystaff as $fs): ?>
                                                    <div class="col-md-4 col-lg-3 text-center d-flex hello">
                                                    <label class="w-100">
                                                        <input type="checkbox" name="facultystaff_ids[]" value="<?php echo $fs['facultystaff_id']; ?>" class="d-none facultystaff-checkbox">
                                                        <div class="selectable-card p-4 rounded w-100 d-flex flex-column align-items-center justify-content-start">
                                                            <img src="../imgs/sillycar.jpg" class="img-fluid rounded-circle mb-3" alt="Coordinator" style="width: 120px; height: 120px; object-fit: cover;">
                                                            <h5 class="fw-bold mb-1 text-wrap"><?php echo $fs['firstname'] . ' ' . $fs['middleinitial'] . ' ' . $fs['lastname']; ?></h5>
                                                            <span style="font-size: 1rem; color: #777;"><?php echo $fs['role']; ?></span>
                                                        </div>
                                                    </label>
                                                </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-4 mb-0">
                                        <input type="submit" class="btn btn-success btn-sm" name="submit" value="Submit">
                                    </div>
                                </div>
                            </form>        
                            </div>
                        </div>
                    </div> 
                    <div class="container">
                            <h4 class="page-title fw-bold text-center">Units added</h4>

                            <?php if (empty($showUnit)): ?>
                                <div class="text-center py-5">
                                    <p class="text-muted fs-5">Nothing yet added</p>
                                </div>
                            <?php else: ?>
                                <div class="row gy-4">
                                    <?php foreach ($showUnit as $su): ?>
                                        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                                            <div class="service-item position-relative h-100">
                                            <a href="admin.coursemodify.php?unit_id=<?php echo $su['unit_id']; ?>" class="text-decoration-none text-dark">
                                                <div class="icon-box mb-4"><i class="bi bi-mortarboard"></i></div>
                                                <h3 >
                                                    <?php echo $su['u_title']; ?>
                                                </h3>
                                                <p class="mb-2"><?php echo $su['u_description']; ?></p>
                                                <div class="card-footer d-flex justify-content-center gap-3 mt-5">
                                                    <a href="admin.coursemodify.php?unit_id=<?php echo $su['unit_id']; ?>" class="btn btn-warning btn-sm px-4 fw-semibold">
                                                        <i class="bi bi-pencil-square"></i> Edit
                                                    </a>
                                                    <a href="#" class="btn btn-danger btn-sm px-4 fw-semibold delete-unit-button" data-id="<?php echo $su['unit_id']; ?>">
                                                        <i class="bi bi-trash"></i> Delete
                                                    </a>
                                                </div>
                                                </a>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        
                    </div>
                </section>
            </div>
        </div>
    </div>
    </div>
</body> 
<script>
document.querySelectorAll('.delete-unit-button').forEach(button => {
    button.addEventListener('click', function(e) {
        e.preventDefault();
        const unitId = this.getAttribute('data-id');
        const card = this.closest('.col-lg-4');

        if (confirm('Are you sure you want to delete this unit?')) {
            fetch('delete_unit.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: 'unit_id=' + encodeURIComponent(unitId)
            })
            .then(response => response.text())
            .then(result => {
                if (result.trim() === 'success') {
                    card.remove();
                } else {
                    alert('Failed to delete unit.');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('An error occurred.');
            });
        }
    });
});
</script>





<?php   require_once "../courses/js_courses.php"; ?>

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