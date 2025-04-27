<?php  
    require_once "../dash_chopdown/dash_head.php";
    require_once "../dash_chopdown/dash_nav.php";
    require_once "../classes/unit.class.php";
    require_once "../classes/course.class.php";
    require_once "../classes/enroll.class.php";
    require_once "../classes/staff_unit.class.php";

    
    $objUnits = new Units;
    $objEnroll = new Enroll;
    $objCourse = new Course;
    $unit_id = isset($_GET['unit_id']) ? $_GET['unit_id'] : 1;
    $each = $objUnits->showUnit($unit_id);
    $steps = $objEnroll->showSteps($unit_id);
    $course = $objCourse->showCourse($unit_id);
    $show = new Show();
    $personnel = $show->showPersonnel($unit_id);
?>
<link rel="stylesheet" href="../style/units.css">
<title><?php echo $each["u_title"]; ?></title>  

<section class="first">
  <div class="container d-flex justify-content-center" data-aos="fade-up">
    <div class="section-title text-center mb-0">
      <h2 class="header fs-1"><?php echo $each["u_title"]; ?></h2>
      <p class="desc"><?php echo $each["u_description"]; ?></p>
    </div>
  </div>
</section>
 
<!-- COURSES OFFERED -->
<section class="mt-5 offer"> 
  <div class="container " data-aos="fade-up">
    <div class="section-title text-center">
      <h2 class="head fw-ligther">COURSES OFFERED</h2>
    </div>
    <div class="row justify-content-center">
      <?php foreach ($course as $crs): ?>
        <div class="col-md-6 col-lg-4 mb-4">
          <div class="course-card p-4 text-center">
          <i class="fas fa-book-open fa-2x text-success mb-3"></i>
          <h5 class="fw-bold"><?php echo $crs["c_title"]; ?></h5>
          <p class="text-muted"><?php echo $crs["c_desc"]; ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

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
</style>

<!-- HOW TO AVAIL -->
<section class="mt-5 avail">
  <div class="container" data-aos="fade-up">
    <div class="section-title text-center mb-5">
      <h2 class="head">HOW TO ENROLL</h2>
    </div>
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

  </div>
</section>



<!-- FUNCTIONS -->
<section class="mt-5 function">
  <div class="container" data-aos="fade-up">
    <div class="section-title text-center">
      <h2 class="head">FUNCTIONS</h2>
    </div>
    <p class="text-center"><?php echo $each["u_functions"] ?></p>
  </div>
</section>

<!-- PERSONNEL -->
<section class="mt-5 mb-5">
  <div class="container" data-aos="fade-up">
    <div class="section-title text-center mb-4">
      <h2 class="head">PERSONNEL</h2>
      <p class="text-muted">Meet the passionate team behind our Extension Services</p>
    </div>
    <div class="row justify-content-center gy-4">
    <?php if (!empty($personnel)) : ?>
      <?php foreach ($personnel as $p): ?>
        <div class="col-md-4 col-lg-3 text-center">
          <div class="person-card p-4 shadow rounded">
            <img src="../imgs/grannycat.jpg" class="img-fluid rounded-circle mb-3" alt="Assistant" style="width: 120px; height: 120px; object-fit: cover;">
            <h5 class="fw-bold mb-1"><?= htmlspecialchars($p['firstname'] . ' ' . $p['middleinitial'] . ' ' . $p['lastname']) ?></h5>
            <p class="text-muted mb-0"><?= htmlspecialchars($p['role']) ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
    <?php else: ?>
      <p class="text-muted text-center">No personnel assigned to this unit.</p>
    <?php endif; ?>
  </div>
</section>



<?php 
    require_once "../courses/js_courses.php"; 
 ?>

