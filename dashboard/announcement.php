<?php 
session_start();
    require_once "../dash_chopdown/dash_head.php";
    require_once "../classes/announcement.class.php";

    $objAnnouncement = new Announcements; // Instantiate the class
    $announcement_id = isset($_GET['announcement_id']) ? $_GET['announcement_id'] : 1;
    $ann = $objAnnouncement->each_announcement($announcement_id);
    $announcement = $objAnnouncement->call_announcements();

?>
<link rel="stylesheet" href="../style/announcement.css">
<title>DESCD | Announcement</title>
<?php require_once "../dash_chopdown/dash_nav.php" ?>
<body>
<section class="announcement">
    <div class="container mt-5">
      <div class="row g-4">
        <div class="col-lg-8">
          <div class="main-container">
            <h2 class="fw-bold"><?php echo $ann["a_title"]; ?></h2>
            <p class="date"><i class="fas fa-calendar-alt"></i> <?php echo $ann["a_date"]; ?></p>
            <div class="content-text">
              <p><?php echo $ann["a_description"]; ?></p>
            </div>
            <div class="row g-2 mt-3">
              <div class="col-md-4">
                <div class="image-container">
                  <img src="../imgs/911.jpg" alt="Ceremony Photo">
                </div>
              </div>
              <div class="col-md-4">
                <div class="image-container">
                  <img src="../imgs/cetwmsu.png" alt="Signing of Agreement">
                </div>
              </div>
              <div class="col-md-4">
                <div class="image-container">
                  <img src="../imgs/wmsu.png" alt="Group Photo">
                </div>
              </div>
              <div class="col-md-4">
                <div class="image-container">
                  <img src="../imgs/wmsu.png" alt="Group Photo">
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="sidebar">
            <h3 class="sidebar-title fw-medium">Recent Announcements</h3>
            
            <div class="announcement-list"> 
                <?php foreach ($announcement as $a): ?>
                    <div class="announcement-item">
                        <span class="arrow-icon">→</span>
                        <a href="announcement.php?announcement_id=<?php echo $a['announcement_id']; ?>" class="announcement-link">
                            <?php echo $a["a_title"]; ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php require_once "../courses/js_courses.php" ?>
