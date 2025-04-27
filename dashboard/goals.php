<?php
    require_once "../dash_chopdown/dash_head.php";
    require_once "../dash_chopdown/dash_nav.php" ;
    require_once "../classes/about.class.php" ;


    $objAbout = new About;
    $show = $objAbout->showAbout();


    
?>
<title>Goals</title>
<link rel="stylesheet" href="../style/about.css">
<section class="first">
    <div class="course"></div>
    <div class="content">
        <div class="about">
        <div class="header-wrapper text-center">
          <h1 class="header">Goals</h1>
        </div>
        <p class="cont mt-4 text-center">
          <?php echo $show["a_goals"] ?>
        </p>
        </div>
    </div>
</section>

<section class="second">
  <div class="objectives">
    <div class="content">
      <div class="obj">
        <h1 class="fw-bold">OBJECTIVES</h1>
        <p>
          <?php echo $show["a_objectives"] ?>
        </p>
      </div>
    </div>
    <div class="img">
      <img src="../imgs/backgrounds/two.JPG" alt="DESCD">
    </div>
  </div>
</section>



<section class="third pb-5">
  <div class="agenda">
    <h2 class="agenda-title  fs-1">EXTENSION AGENDA</h2>
    <p class="agenda-text">
      <?php echo $show["a_agenda"] ?>
    </p>
  </div>
</section>
 
<!-- <section class="framework">
  <div class="framework-container">
    <h2 class="framework-title">Extension Services Department Framework</h2>
    <p class="framework-description">
      The Extension Services Department serves as a bridge between the university and the community by extending knowledge, technologies, and expertise to promote sustainable development, empowerment, and social transformation.
    </p>

    <div class="framework-structure">
      <div class="framework-box">University Vision & Mission</div>
      <div class="arrow">↓</div>
      <div class="framework-box">Extension Goals</div>
      <div class="arrow">↓</div>
      <div class="framework-box">Programs & Projects</div>
      <div class="arrow">↓</div>
      <div class="framework-box">Community Impact & Feedback</div>
    </div>
  </div>
</section> -->



