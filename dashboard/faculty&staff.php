<?php 
    require_once "../dash_chopdown/dash_head.php"; 
    require_once "../dash_chopdown/dash_nav.php";
    require_once "../classes/faculty&staff.class.php";

    $objFacultyStaff = new FacultyStaff;
    $facultystaff = $objFacultyStaff->showFacultyStaff();

    $supervisorInCharge = [];
    $otherRoles = [];

    foreach ($facultystaff as $fs) {
        if ($fs['role'] == 'Supervisor-In-Charge') {
            $supervisorInCharge[] = $fs;
        } else {
            $otherRoles[] = $fs;
        }
    }

    $facultystaffSorted = array_merge($supervisorInCharge, $otherRoles);
?>
<link rel="stylesheet" href="../style/faculty&staff.css">
<title>Faculty and Staff</title>

<body>
<section id="team" class="team section">    
    <div class="container section-title mb-0" data-aos="fade-up" style="margin-bottom: 5px !important;">
        <h2 class="text-success fw-bold mt-4">Faculty and Staff</h2>
    </div>

    <?php foreach($supervisorInCharge as $fs): ?>
        <div class="container">
            <div class="row gy-5">
                <div class="profile-card" style="border: none; padding: 5px; max-width: 346px; margin: 50px auto; text-align: center;">
                    <img src="../imgs/smily.jpg" class="img-fluid" style="width: 280px; height: 300px; object-fit: cover; border-radius: 50%; margin-bottom: 15px;">
                    <div class="member-info-pre text-center" style="font-family: Arial, sans-serif; color: #333;">
                        <h4 class="fw-bold" style=" margin-bottom: 10px;"><?php echo $fs['firstname'] . ' ' . $fs['middleinitial'] . ' ' . $fs['lastname']; ?></h4>
                        <span style="font-size: 1rem; color: #777;"><?php echo $fs['role']; ?></span>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>


    <?php if (!empty($otherRoles)): ?>
        <div class="center-member container pb-5">
            <div class="row justify-content-center">
                <?php foreach($otherRoles as $fs): ?>
                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4 mt-0" data-aos="fade-up" data-aos-delay="100">
                        <div class="member-card">
                            <div class="member-pic">
                                <img src="../imgs/grannycat.jpg" class="img-fluid" alt="Walter White">
                                <div class="member-info text-center">
                                    <h4><?php echo $fs['firstname'] . ' ' . $fs['middleinitial'] . ' ' . $fs['lastname']; ?></h4>
                                    <span><?php echo $fs['role']; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endif; ?>
</section>
</body>

<?php 
    require_once "../dash_chopdown/dash_footer.php";
    require_once "../courses/js_courses.php"; 
?>
