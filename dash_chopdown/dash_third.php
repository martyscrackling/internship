<?php 
    require_once "../classes/unit.class.php";

    $objUnits = new Units;
    $unit = $objUnits->showAllUnits();
?>

<section id="services" class="services relative">
    <!-- Section Title -->
    <div class="third">
        <div class="container section-title" data-aos="fade-up">
            <h2 class="courses">Extension Services Units</h2>
        </div>
        <br>
        <br>
        <div class="container">
            <div class="row gy-4">
                <?php  foreach($unit as $u): ?>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                        <div class="service-item position-relative">
                            <div class="icon-box"><i class="bi bi-mortarboard"></i></div>
                            <h3><?php echo $u['u_title']?></h3>
                            <p><?php echo $u['u_description']?></p>
                            <div class="btn-container mt-4">
                                <a class="btn btn-success" href="../dashboard/units.php?unit_id=<?php echo $u['unit_id']; ?>">View More</a>
                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

</section>

