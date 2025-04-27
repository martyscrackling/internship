<?php 
session_start();
if (isset($_SESSION['announcement_success'])) {
    echo '
    <div class="alert alert-success alert-dismissible fade show" style="margin-left: 18%; max-width: 81%;" role="alert">
        <strong>Success!</strong> Announcement posted successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    unset($_SESSION['announcement_success']);
}

if (isset($_SESSION['announcement_error'])) {
    echo '
    <div class="alert alert-danger alert-dismissible fade show ms-lg-5 ms-md-4" role="alert">
        <strong>Error!</strong> Failed to post announcement.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    unset($_SESSION['announcement_error']);
}

require_once "admin-chopdown/head.php";
require_once '../tools/clean.php';
require_once "../classes/announcement.class.php";

$objAnnouncement = new Announcements;
$ann = $objAnnouncement->call_announcements();
$current_date = date('F j, Y');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $a_title = isset($_POST['a_title']) ? clean_input($_POST['a_title']) : '';
    $a_description = isset($_POST['a_description']) ? clean_input($_POST['a_description']) : '';
    $a_date = date('F j, Y'); 

    $objAnnouncement->a_title = $a_title;
    $objAnnouncement->a_description = $a_description;
    $objAnnouncement->a_date = $a_date;

    if ($objAnnouncement->addAnnouncement()) {
        // Store a success message in session and redirect
        $_SESSION['announcement_success'] = true;
        header("Location: admin.announcement.php");
        exit();
    } else {
        $_SESSION['announcement_error'] = true;
        header("Location: admin.announcement.php");
        exit();
    }
    
}
if (isset($_SESSION['announcement_edit_success'])) {
    echo '
    <div class="alert alert-success alert-dismissible fade show" style="margin-left: 18%; max-width: 81%;" role="alert">
        <strong>Success!</strong> Announcement edited successfully.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    unset($_SESSION['announcement_edit_success']);
}

if (isset($_SESSION['announcement_edit_error'])) {
    echo '
    <div class="alert alert-danger alert-dismissible fade show ms-lg-5 ms-md-4" role="alert">
        <strong>Error!</strong> Failed to edit announcement.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
    unset($_SESSION['announcement_edit_error']);
}



    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["announcement_id"])) {
        $id = $_POST["announcement_id"];
    
        $announcement = new Announcements();
        $deleted = $announcement->delete_announcement($id);
    
        if ($deleted) {
            echo "success";
        } else {
            echo "error";
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
                <h1 class="navtext">Announcements</h1>
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



<?php require_once "admin-chopdown/sidebar.php"?>    
<body>
     <div class="content-page px-3">
    <div class="container-fluid">
        <div class="row">
            <div class="page-title-box">
                <h4 class="page-title fw-bold">Post</h4>
            </div>

            <div class="row justify-content-center">
        <!-- add announcement 1 -->
        <div class="col-12 mb-4 d-flex">
            <div class="card shadow-lg border-0 rounded-4 h-100 d-flex flex-column w-100">
                <form method="POST" action="">
                    <div class="card-body flex-grow-1">
                        <div class="d-flex align-items-center mb-3">
                            <img src="../imgs/descd.png" alt="Admin" class="rounded-circle border me-3" width="55" height="55">
                            <div>
                                <h6 class="mb-1 fw-bold text-dark">Admin Team</h6>
                                <small class="text-muted"><?php echo $current_date; ?></small>
                            </div>
                        </div>
                        <!-- Textarea for announcement -->
                        <input type="text" class="form-control mb-2" name="a_title" placeholder="Title">
                        <textarea class="form-control mb-2" name="a_description" rows="4" placeholder="Description"></textarea>
                        
                        <!-- Icons for adding images -->
                        <div class="d-flex align-items-center"> 
                            <label class="btn btn-outline-primary btn-sm me-2">
                                <i class="bi bi-image"></i> Add Image
                                <input type="file" class="d-none" accept="image/*">
                            </label>
                            <label class="btn btn-outline-secondary btn-sm">
                                <i class="bi bi-camera"></i> Take Photo
                                <input type="file" class="d-none" accept="image/*" capture="camera">
                            </label>
                        </div>
                    </div>
                    <div class="card-footer bg-light d-flex justify-content-end">
                        <button type="submit" class="btn btn-success btn-sm px-4 fw-semibold">
                            <i class="bi bi-send"></i> Post
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="page-title-box">
                <h4 class="page-title fw-bold">Announcements:</h4>
            </div>
            <div class="row justify-content-center align-items-stretch">
                <?php foreach ($ann as $a): ?>
                    <div class="col-12 col-md-6 mb-4 d-flex">
                        <div class="card shadow-lg border-0 rounded-4 d-flex flex-column announcement-card">
                            <div class="card-body flex-grow-1 announcement-body">
                                <div class="d-flex align-items-center mb-3">
                                    <img src="../imgs/descd.png" alt="Admin" class="rounded-circle border me-3" width="55" height="55">
                                    <div>
                                        <h6 class="mb-1 fw-bold text-dark">Admin Team</h6>
                                        <small class="text-muted"><?php echo $a["a_date"]; ?></small>
                                    </div>
                                </div>
                                <p class="text-secondary announcement-text">
                                    <strong><?php echo $a["a_title"]; ?></strong> 
                                    <?php echo substr($a["a_description"], 0, 255) . (strlen($a["a_description"]) > 255 ? '...' : ''); ?>
                                </p>
                                <img src="../imgs/descd.jpeg" alt="" class="img-fluid">
                            </div>
                            <div class="card-footer bg-light d-flex justify-content-around announcement-footer">
                            <button 
                            class="btn btn-warning btn-sm px-4 fw-semibold edit-button"
                            data-bs-toggle="modal"
                            data-bs-target="#editAnnouncementModal"
                            data-id="<?php echo $a['announcement_id']; ?>"
                            data-title="<?php echo htmlspecialchars($a['a_title'], ENT_QUOTES); ?>"
                            data-description="<?php echo htmlspecialchars($a['a_description'], ENT_QUOTES); ?>"
                            >
                            <i class="bi bi-pencil-square"></i> Edit
                            </button>

                                <a href="#" 
                                class="btn btn-danger btn-sm px-4 fw-semibold delete-announcement-button" 
                                data-id="<?php echo $a['announcement_id']; ?>">
                                <i class="bi bi-trash"></i> Delete
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    </div>


    <!-- Edit Announcement Modal -->
<div class="modal fade" id="editAnnouncementModal" tabindex="-1" aria-labelledby="editAnnouncementModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="update_announcement.php">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editAnnouncementModalLabel">Edit Announcement</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="announcement_id" id="editAnnouncementId">
          <div class="mb-3">
            <label for="editTitle" class="form-label">Title</label>
            <input type="text" class="form-control" name="a_title" id="editTitle" required>
          </div>
          <div class="mb-3">
            <label for="editDescription" class="form-label">Description</label>
            <textarea class="form-control" name="a_description" id="editDescription" rows="4" required></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Save Changes</button>
        </div>
      </div>
    </form>
  </div>
</div>
</body>
<script>
  document.querySelectorAll('.edit-button').forEach(button => {
    button.addEventListener('click', function () {
      const id = this.getAttribute('data-id');
      const title = this.getAttribute('data-title');
      const description = this.getAttribute('data-description');

      document.getElementById('editAnnouncementId').value = id;
      document.getElementById('editTitle').value = title;
      document.getElementById('editDescription').value = description;
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
    // Set the date input to today's date by default
    document.addEventListener("DOMContentLoaded", function() {
        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0'); // January is 0!
        const day = String(today.getDate()).padStart(2, '0');
        
        const formattedDate = `${year}-${month}-${day}`;
        document.getElementById('date').value = formattedDate;
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
<script>
    document.querySelectorAll('.delete-announcement-button').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();

            const announcementId = this.getAttribute('data-id');
            const card = this.closest('.col-12');

            if (confirm('Are you sure you want to delete this announcement?')) {
                fetch('delete_announcement.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'announcement_id=' + encodeURIComponent(announcementId)
                })
                .then(response => response.text())
                .then(result => {
                    if (result.trim() === 'success') {
                        card.remove();
                    } else {
                        alert('Failed to delete announcement.');
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="../vendor/bootstrap-5.3.3/js/bootstrap.bundle.min.js"></script>
<script src="../vendor/jQuery-3.7.1/jquery-3.7.1.min.js"></script>
<script src="../vendor/chartjs-4.4.5/chart.js"></script>
<script src="../vendor/datatable-2.1.8/datatables.min.js"></script>
<script src="../js/admin.js"></script>
<script src="../js/product.js"></script>