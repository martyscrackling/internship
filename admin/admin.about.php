<?php 
    session_start();
    require_once "admin-chopdown/head.php";
    require_once "../classes/about.class.php";
    require_once "../tools/clean.php";
    require_once "admin-chopdown/sidebar.php";


    $objAbout = new About;
    $existingAbout = $objAbout->showAbout();
    $a_goals = $a_objectives = $a_agenda = "";

    if ($existingAbout) {
        header("Location: admin.showabout.php");
        exit(); 
    }
    

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $a_goals = isset($_POST['a_goals']) ? clean_input($_POST['a_goals']) : '';
        $a_objectives = isset($_POST['a_objectives']) ? clean_input($_POST['a_objectives']) : '';
        $a_agenda = isset($_POST['a_agenda']) ? clean_input($_POST['a_agenda']) : '';

        $objAbout->a_goals = $a_goals;
        $objAbout->a_objectives = $a_objectives;
        $objAbout->a_agenda = $a_agenda;

        if ($objAbout->addAbout()) {
           header("Location: admin.showabout.php");
        } else {
            echo '
            <div class="alert alert-danger alert-dismissible fade show ms-lg-5 ms-md-4" role="alert">
                <strong>Error!</strong> Failed to post announcement.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
        }
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

<div class="content-page px-3">
    <div class="container-fluid ">
        <div class="row">
            <div class="container px-6">
            <div class="third ">          
                        <h4 class="page-title fw-bold text-center">Please Complete the Form Below</h4>           
                        <div class="row justify-content-center">
                        <div class="col-12 mb-4 d-flex">
                            <div class="card shadow-lg border-0 rounded-4 h-100 d-flex flex-column w-100">
                            <form action="" method="POST">
                                <div class="card-body flex-grow-1">
                                    <textarea class="form-control mb-2" name="a_goals" rows="4" placeholder="What are the goals of DESCD" required></textarea>
                                    <textarea class="form-control mb-2" name="a_objectives" rows="4" placeholder="What are the objectives of DESCD" required></textarea>
                                    <textarea class="form-control mb-2" name="a_agenda" rows="4" placeholder="Agenda of DESCD" required></textarea> 
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