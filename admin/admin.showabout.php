<?php 
    session_start();

    
    require_once "admin-chopdown/head.php";
    require_once "../classes/about.class.php";
    require_once "../tools/clean.php";
    require_once "admin-chopdown/sidebar.php";


    $objAbout = new About;
    $show = $objAbout->showAbout();
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        $a_goals = clean_input($_POST["a_goals"]);
        $a_objectives = clean_input($_POST["a_objectives"]);
        $a_agenda = clean_input($_POST["a_agenda"]);
    
        $objAbout->a_goals = $a_goals;
        $objAbout->a_objectives = $a_objectives;
        $objAbout->a_agenda = $a_agenda;
    
        if ($objAbout->updateAbout()) {
            $_SESSION["about_success"] = true;
            header("Location: admin.showabout.php");
            exit();
        }
    }
    if (isset($_SESSION['about_success'])) {
        echo '
        <div class="alert alert-success alert-dismissible fade show" style="margin-left: 18%; max-width: 81%;" role="alert">
            <strong>Success!</strong> About section updated successfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        unset($_SESSION['about_success']);
    }
    
    if (isset($_SESSION['about_error'])) {
        echo '
        <div class="alert alert-danger alert-dismissible fade show ms-lg-5 ms-md-4" role="alert">
            <strong>Error!</strong> Failed to update About section.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        unset($_SESSION['about_error']);
    }
    

    

?>


<div class="navbar-custom">
    <header class="px-1 shadow-sm">
        <div class="container-fluid d-flex justify-content-between">
            <button class="btn btn-toggle">
            <button id="menu-toggle" class="btn d-lg-none">
                <i class="bi bi-list fs-2"></i>
            </button>
                <h1 class="navtext">About</h1>
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
    .content-page {
        color: #212529;
    }
</style>
<body>
    <div class="content-page px-3 pb-5">
    <?php 
        if (isset($_SESSION['about_success'])) {
            echo '
            <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                <strong>Success!</strong> About section updated successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            unset($_SESSION['about_success']);
        }
?>
    <div class="container-fluid">
        <div class="row">
            <div class="container px-6 mt-5 ">
                <div class="container">
                    <div class="card shadow-lg border-0 rounded-4 h-100 d-flex flex-column w-100">
                        <section class="first">
                            <div class="course"></div>
                            <div class="content">
                                <div class="about pt-4">
                                    <div class="header-wrapper text-center">
                                        <h1 class="header fw-bold" style="color: #212529">Goals</h1>
                                    </div>
                                    <p class="cont mt-4 text-center" style="color: #212529">
                                        <?php echo $show["a_goals"] ?>
                                    </p>
                                </div>
                            </div>
                            <div class="content">
                                <div class="about pt-4">
                                    <div class="header-wrapper text-center">
                                        <h1 class="header fw-bold" style="color: #212529">Objectives</h1>
                                    </div>
                                    <p class="cont mt-4 text-center" style="color: #212529">
                                        <?php echo $show["a_objectives"] ?>
                                    </p>
                                </div>
                            </div>
                            <div class="content">
                                <div class="about pt-4">
                                    <div class="header-wrapper text-center">
                                        <h1 class="header fw-bold " style="color: #212529">Agenda</h1>
                                    </div>
                                    <p class="cont mt-4 text-center" style="color: #212529">
                                        <?php echo $show["a_agenda"] ?>
                                    </p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-around mt-5">
                                <button type="button" class="btn btn-warning btn-sm px-4 fw-semibold" data-bs-toggle="modal" data-bs-target="#editModal">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </button>
                                   
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content rounded-4">
      <div class="modal-header">
        <h5 class="modal-title fw-bold" id="editModalLabel">Please Complete the Form Below</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <h5 class="fw-bold">Goals</h5>
          <textarea class="form-control mb-2" name="a_goals" rows="4" placeholder="What are the goals of DESCD" required><?php echo $show["a_goals"]; ?></textarea>
          <h5 class="fw-bold">Objectives</h5>
          <textarea class="form-control mb-2" name="a_objectives" rows="4" placeholder="What are the objectives of DESCD" required><?php echo $show["a_objectives"]; ?></textarea>
          <h5 class="fw-bold">Agenda</h5>
          <textarea class="form-control mb-2" name="a_agenda" rows="4" placeholder="Agenda of DESCD" required><?php echo $show["a_agenda"]; ?></textarea> 
          <div class="d-flex justify-content-end mt-4 mb-0">
            <input type="submit" class="btn btn-success btn-sm" name="submit" value="Submit">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
</body>



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