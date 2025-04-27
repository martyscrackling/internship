<?php 
session_start();
require_once "../classes/unit.class.php";
require_once "../classes/enroll.class.php";
require_once "../tools/clean.php";
require_once "admin-chopdown/head.php";

$e_steps = [];
$objEnroll = new Enroll;

// Check if editing
if (isset($_GET['unit_id']) && isset($_GET['action']) && $_GET['action'] == 'edit') {
    $objEnroll->unit_id = $_GET['unit_id'];
    $existingSteps = $objEnroll->showSteps($_GET['unit_id']);
    foreach ($existingSteps as $step) {
        $e_steps[] = $step['e_steps'];
    }
} else {
    $existingSteps = [];
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $enrollArray = $_POST['e_steps'];
    $unit_id = $_POST['unit_id']; 
    $objEnroll->unit_id = $_GET['unit_id'];

    // Delete old steps first if editing
    if (isset($_GET['action']) && $_GET['action'] == 'edit') {
        $objEnroll->deleteEnroll($objEnroll->unit_id, $enrollArray);
    } else {
        $objEnroll->e_steps = $enrollArray;
        $objEnroll->addSteps();
    }

    header("Location: admin.coursemodify.php?unit_id=" . urlencode($unit_id));
    exit;
}
?>

<link rel="stylesheet" href="../style/admin_units.css">
<?php 
require_once "admin-chopdown/sidebar.php";
require_once "../dash_chopdown/dash_head.php";
?> 
<!-- <div class="alert alert-success alert-dismissible fade show" style="margin-left: 18%; max-width: 81%;" role="alert">
    <strong>Success!</strong> Announcement posted successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>  -->
<div class="navbar-custom">
    <header class="px-1 shadow-sm">
        <div class="container-fluid d-flex justify-content-between">
            <button class="btn btn-toggle">
            <button id="menu-toggle" class="btn d-lg-none">
                <i class="bi bi-list fs-2"></i>
            </button>
                <h1 class="navtext">Unit - Add Steps</h1>
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




<style>

.icon-btn {
    display: inline-flex;
    align-items: center;
    background-color: #198754;
    border: none;
    color: white;
    padding: 0.5rem 1.2rem;
    border-radius: 2rem;
    transition: background-color 0.3s ease, transform 0.2s ease;
    font-weight: 500;
    font-size: 0.95rem;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.icon-btn:hover {
    background-color: #157347;
    transform: translateY(-2px);
}

.icon-btn:active {
    background-color: #14532d;
    transform: translateY(0);
}

.add-icon i {
    font-size: 1.2rem;
}



</style>


<?php 
?>
<section class="first">
    <div class="content-page px-3 ">
        <div class="container-fluid">
            <div class="row">
                <div class="container px-6 pb-5">
                    <div id="services" class="services relative">
                        <div class="third ">          
                            <h4 class="page-title fw-bold text-center">Add steps on how to Enroll</h4>           
                            <div class="row justify-content-center">
                            <div class="col-12 mb-4 d-flex">
                                <div class="card shadow-lg border-0 rounded-4 h-100 d-flex flex-column w-100">
                                <form action="" method="POST">
                                <input type="hidden" name="unit_id" value="<?php echo htmlspecialchars($_GET['unit_id']); ?>">
                                    <div class="card-body flex-grow-1">
                                        <p class="how mt-4 fw-bold">Input steps on how to enroll</p>
                                        <div id="step-container">
                                            <?php if (!empty($e_steps)): ?>
                                                <?php foreach ($e_steps as $index => $step): ?>
                                                    <div class="input-group mb-3 step-wrapper">
                                                        <input class="form-control" name="e_steps[]" value="<?php echo htmlspecialchars($step); ?>" placeholder="Step <?php echo $index + 1; ?>" required>
                                                        <span class="input-group-text remove-btn" onclick="removeStep(this)" style="cursor: pointer;">❌</span>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <div class="input-group mb-3 step-wrapper">
                                                    <input class="form-control" name="e_steps[]" placeholder="Step 1" required>
                                                    <span class="input-group-text remove-btn" onclick="removeStep(this)" style="cursor: pointer;">❌</span>
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <!-- 🔥 Missing Buttons Added Here -->
                                        <div class="add text-center mt-2">
                                            <button type="button" class="icon-btn add-btn" onclick="addInputField()">
                                                <div class="add-icon me-2"><i class="bi bi-plus-circle"></i></div>
                                                <div class="btn-txt">Add More</div>
                                            </button>
                                        </div>

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
<script>
function addInputField() {
    const container = document.getElementById("step-container");

    const wrapper = document.createElement("div");
    wrapper.className = "input-group mb-3 step-wrapper";

    const newInput = document.createElement("input");
    newInput.className = "form-control";
    newInput.name = "e_steps[]";
    newInput.required = true;

    const removeBtn = document.createElement("span");
    removeBtn.className = "input-group-text remove-btn";
    removeBtn.textContent = "❌";
    removeBtn.style.cursor = "pointer";
    removeBtn.onclick = function () {
        removeStep(removeBtn);
    };

    wrapper.appendChild(newInput);
    wrapper.appendChild(removeBtn);
    container.appendChild(wrapper);

    renumberSteps();
}

function removeStep(element) {
    const step = element.closest(".step-wrapper");
    if (step) {
        step.remove();
        renumberSteps();
    }
}

function renumberSteps() {
    const stepInputs = document.querySelectorAll("#step-container .step-wrapper input");
    stepInputs.forEach((input, index) => {
        input.placeholder = `Step ${index + 1}`;
    });
}
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
<?php   require_once "../courses/js_courses.php"; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../vendor/bootstrap-5.3.3/js/bootstrap.bundle.min.js"></script>
<script src="../vendor/jQuery-3.7.1/jquery-3.7.1.min.js"></script>
<script src="../vendor/chartjs-4.4.5/chart.js"></script>
<script src="../vendor/datatable-2.1.8/datatables.min.js"></script>
<script src="../js/admin.js"></script>
<script src="../js/product.js"></script>