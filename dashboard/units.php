<?php  
    require_once "../dash_chopdown/dash_head.php";
    require_once "../dash_chopdown/dash_nav.php";
    require_once "../classes/unit.class.php";

    $objUnits = new Units;
    $unit_id = isset($_GET['unit_id']) ? $_GET['unit_id'] : 1;
    $each = $objUnits->showUnit($unit_id);

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
      <!-- Course Card -->
      <div class="col-md-6 col-lg-4 mb-4">
        <div class="course-card p-4 text-center">
          <i class="fas fa-desktop fa-2x text-success mb-3"></i>
          <h5 class="fw-bold">Basic Computer Literacy</h5>
          <p class="text-muted">Intro to computers, typing, and basic office software.</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 mb-4">
        <div class="course-card p-4 text-center">
          <i class="fas fa-hammer fa-2x text-success mb-3"></i>
          <h5 class="fw-bold">Livelihood Skills Training</h5>
          <p class="text-muted">Hands-on skills in crafts, food processing, and trades.</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 mb-4">
        <div class="course-card p-4 text-center">
          <i class="fas fa-coins fa-2x text-success mb-3"></i>
          <h5 class="fw-bold">Entrepreneurship & Financial Literacy</h5>
          <p class="text-muted">Learn how to budget, save, and start a small business.</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 mb-4">
        <div class="course-card p-4 text-center">
          <i class="fas fa-users-cog fa-2x text-success mb-3"></i>
          <h5 class="fw-bold">Community Leadership & Development</h5>
          <p class="text-muted">Build leadership skills and strengthen your community.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<style>
  .steps-wrapper {
  flex-wrap: wrap;
  justify-content: center;
}

.step-box {
  flex: 1 1 150px;
  max-width: 180px;
  min-width: 150px;
  min-height: 220px; /* ensure consistent height */
  padding: 1rem;
  background-color: #f8f9fa;
  border-radius: 12px;
  box-shadow: 0 4px 6px rgba(0,0,0,0.1);
  display: flex;
  flex-direction: column;
  justify-content: flex-start;
}

.step-circle {
  width: 40px;
  height: 40px;
  background-color: #0b4103;
  color: white;
  font-weight: bold;
  border-radius: 50%;
  margin: 0 auto 10px;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 1.2rem;
}

.arrow {
  font-size: 2rem;
  color: #6c757d;
  align-self: center;
}

</style>
<!-- HOW TO AVAIL -->
<section class="mt-5 avail">
  <div class="container" data-aos="fade-up">
    <div class="section-title text-center mb-5">
      <h2 class="head">HOW TO ENROLL</h2>
    </div>
    <div class="steps-wrapper d-flex justify-content-between align-items-center flex-wrap gap-4">
      <div class="step-box text-center">
        <div class="step-circle">1</div>
        <p>Visit the Extension Services Office or our website.</p>
      </div>
      <div class="arrow">→</div>
      <div class="step-box text-center">
        <div class="step-circle">2</div>
        <p>Fill out the online/offline registration form.</p>
      </div>
      <div class="arrow">→</div>
      <div class="step-box text-center">
        <div class="step-circle">3</div>
        <p>Submit the required documents (valid ID, barangay clearance, etc.).</p>
      </div>
      <div class="arrow">→</div>
      <div class="step-box text-center">
        <div class="step-circle">4</div>
        <p>Wait for confirmation and orientation schedule.</p>
      </div>
      <div class="arrow">→</div>
      <div class="step-box text-center">
        <div class="step-circle">5</div>
        <p>ika-fifth na step</p>
      </div>
    </div>
  </div>
</section>



<!-- FUNCTIONS -->
<section class="mt-5 function">
  <div class="container" data-aos="fade-up">
    <div class="section-title text-center">
      <h2 class="head">FUNCTIONS</h2>
    </div>
    <p class="text-center">
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam, sit vitae laboriosam hic beatae sed ipsam distinctio, aspernatur a ipsa tempore fugit iusto facilis. Iusto eos odit reprehenderit amet dolores possimus vero at maxime, ad minus quisquam aspernatur sit, iste ex ea aperiam. Pariatur hic atque blanditiis molestiae magni temporibus fugit esse unde tempore neque cum tenetur eaque officia, dolores, rem molestias repellat cupiditate. Alias ullam nisi officia officiis adipisci, aperiam harum assumenda magni quae accusamus rem beatae temporibus voluptatem libero cumque eos, molestias pariatur sit. Ut sed non reprehenderit quos, quidem laudantium eum iste expedita! Nisi tempore praesentium fuga!
    </p>
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
      <div class="col-md-4 col-lg-3 text-center">
        <div class="person-card p-4 shadow rounded">
          <img src="../imgs/sillycar.jpg" class="img-fluid rounded-circle mb-3" alt="Coordinator" style="width: 120px; height: 120px; object-fit: cover;">
          <h5 class="fw-bold mb-1">Dr. Jane Doe</h5>
          <p class="text-muted mb-0">Extension Services Coordinator</p>
        </div>
      </div>
      <div class="col-md-4 col-lg-3 text-center">
        <div class="person-card p-4 shadow rounded">
          <img src="../imgs/suscat.jpg" class="img-fluid rounded-circle mb-3" alt="Trainer" style="width: 120px; height: 120px; object-fit: cover;">
          <h5 class="fw-bold mb-1">Mr. John Smith</h5>
          <p class="text-muted mb-0">Lead Trainer</p>
        </div>
      </div>
      <div class="col-md-4 col-lg-3 text-center">
        <div class="person-card p-4 shadow rounded">
          <img src="../imgs/grannycat.jpg" class="img-fluid rounded-circle mb-3" alt="Assistant" style="width: 120px; height: 120px; object-fit: cover;">
          <h5 class="fw-bold mb-1">Ms. Anna Reyes</h5>
          <p class="text-muted mb-0">Program Assistant</p>
        </div>
      </div>
    </div>
  </div>
</section>


<?php 
    require_once "../courses/js_courses.php"; 
 ?>

