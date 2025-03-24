<?php require_once "admin-chopdown/head.php"?>
<link rel="stylesheet" href="../style/descd.css">


<div class="navbar-custom">
    <header class="px-1 shadow-sm">
        <div class="container-fluid d-flex justify-content-between">
            <button class="btn btn-toggle">
            <button id="menu-toggle" class="btn d-lg-none">
                <i class="bi bi-list fs-2"></i>
            </button>
                <h1 class="navtext">Courses</h1>
            </button>
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-end">
                
                <!-- Notification Icon with Badge -->
                <div class="dropdown">
                    <a href="#" class="text-dark position-relative" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-bell fs-4"></i>
                        <!-- Notification Badge -->
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            3 <!-- Change dynamically with PHP/JS -->
                        </span>
                    </a>
                    <!-- Notifications Dropdown -->
                    <ul class="dropdown-menu dropdown-menu-end text-small">
                        <li><strong class="dropdown-header">Notifications</strong></li>
                        <li><a class="dropdown-item" href="#">New order received</a></li>
                        <li><a class="dropdown-item" href="#">System update available</a></li>
                        <li><a class="dropdown-item" href="#">You have a new message</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item text-center" href="#">View all notifications</a></li>
                    </ul>
                </div>

                <!-- Profile Dropdown -->
                <div class="dropdown text-end ms-3">
                    <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="../imgs/descd.png" alt="mdo" width="32" height="32" class="rounded-circle">
                    </a>
                    <ul class="dropdown-menu text-small">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="../auth/logout.php">Sign out</a></li>
                    </ul>   
                </div>
            </div>
        </div>
    </header>
</div>


<?php 
require_once "admin-chopdown/sidebar.php";
require_once "../dash_chopdown/dash_head.php";
?>    



<div class="content-page px-3">
    <div class="container-fluid">
        <div class="row">
        <div class="container px-6">
        <section id="services" class="services relative">
    <!-- Section Title -->
    <div class="third ">
       
    <h4 class="page-title fw-bold text-center">Add a Course</h4>
      
        <div class="row justify-content-center">
                 <!-- add announcement 1 -->
    <div class="col-12 mb-4 d-flex">
        <div class="card shadow-lg border-0 rounded-4 h-100 d-flex flex-column w-100">
            <div class="card-body flex-grow-1">
               
                <!-- Textarea for announcement -->
                <textarea class="form-control mb-3" rows="2" placeholder="Name of course"></textarea>
                <textarea class="form-control mb-2" rows="4" placeholder="Describe the course"></textarea>
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
                <button class="btn btn-success btn-sm px-4 fw-semibold">
                    <i class="fas fa-plus"></i> Add
                </button>
            </div>
        </div>
    </div>
</div>
        <div class="container">
            <div class="row gy-4">
                <!-- Masonry -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-item position-relative">
                        <div class="icon-box"><i class="fas fa-layer-group"></i></div>
                        <h3>Masonry</h3>
                        <p>The 18-week training program teaches participants the fundamentals of masonry, a construction technique that uses bricks, stones, or concrete blocks bound by mortar to create strong and visually appealing structures. Masonry has evolved over centuries, combining traditional craftsmanship with modern innovations. It remains essential in construction for its durability, fire resistance, and energy efficiency.</p>
                        <div class="card-footer  d-flex justify-content-around mt-5 ">
                        <button class="btn btn-warning btn-sm px-4 fw-semibold">
                            <i class="bi bi-pencil-square"></i> Edit
                        </button>
                        <button class="btn btn-danger btn-sm px-4 fw-semibold">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </div>
                    </div>
                </div>

                <!-- Organic Vegetable Garden -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-item position-relative">
                        <div class="icon-box"><i class="fas fa-seedling"></i></div>
                        <h3>Organic Vegetable Gardening</h3>
                        <p>The 18-week training program equips community participants with essential skills in organic vegetable gardening, workplace management, and entrepreneurship. It aims to develop multi-skilled individuals capable of providing technical support to various industries while preparing them for business ventures or employment in the growing organic farming sector.</p>
                        <div class="card-footer  d-flex justify-content-around mt-5 ">
                        <button class="btn btn-warning btn-sm px-4 fw-semibold">
                            <i class="bi bi-pencil-square"></i> Edit
                        </button>
                        <button class="btn btn-danger btn-sm px-4 fw-semibold">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </div>
                    </div>
                </div>

                <!-- Food Processing -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-item position-relative">
                        <div class="icon-box"><i class="fas fa-blender"></i></div>
                        <h3>Food Processing</h3>
                        <p>The 18-weeks training program is designed to teach and train participants the necessary skills and training, equip participant's knowledge in food processing with the necessary acumen to manage the work place, people and enterprise they will engage in. The training course aims to produce participants who posses multi-skills at different levels and can provide technical support to variety of industrial, commercial and other related organizations.</p>
                        <div class="card-footer  d-flex justify-content-around mt-5 ">
                        <button class="btn btn-warning btn-sm px-4 fw-semibold">
                            <i class="bi bi-pencil-square"></i> Edit
                        </button>
                        <button class="btn btn-danger btn-sm px-4 fw-semibold">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </div>
                    </div>
                </div>

                <!-- Electrical and Electronics -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="service-item position-relative">
                        <div class="icon-box"><i class="fas fa-bolt"></i></div>
                        <h3>Electrical and Electronics</h3>
                        <p>The training is 18 weeks program designed to teach and train participants the training for Computer Systems/Repair with the necessary acumen to manage the workplace, people and enterprise they will engage in The training course aims to produce participants who possess multi-skills at different levels and can provide technical support to variety of industrial, commercial and other related organization.</p>
                        <div class="card-footer  d-flex justify-content-around mt-5 ">
                        <button class="btn btn-warning btn-sm px-4 fw-semibold">
                            <i class="bi bi-pencil-square"></i> Edit
                        </button>
                        <button class="btn btn-danger btn-sm px-4 fw-semibold">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </div>
                    </div>
                </div>

                <!-- Plumbing -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="service-item position-relative">
                        <div class="icon-box"><i class="fas fa-wrench"></i></div>
                        <h3>Plumbing</h3>
                        <p>The 18-week training program is designed to teach and train participants the training for plumbing with the necessary acumen to manage the workplace, people and enterprise they will engage in the training course aims to produce participants who possess multi-skills at different levels and can provide technical support to variety of industrial, commercial and other related organization.</p>
                        <div class="card-footer  d-flex justify-content-around mt-5 ">
                        <button class="btn btn-warning btn-sm px-4 fw-semibold">
                            <i class="bi bi-pencil-square"></i> Edit
                        </button>
                        <button class="btn btn-danger btn-sm px-4 fw-semibold">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </div>
                    </div>
                </div>

                <!-- Bread and Pastry Production -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
                    <div class="service-item position-relative">
                        <div class="icon-box"><i class="fas fa-bread-slice"></i></div>
                        <h3>Bread and Pastry Production</h3>
                        <p>The 18-week training program is designed to equip participants from the community with the fundamental skills and knowledge required to create a variety of delicious bread and pastry products. The training course aims to produce dedicated and empowering individuals with the skills and knowledge needed to kickstart their business ventures or secure employment opportunities in the thriving baking industry.</p>
                        <div class="card-footer  d-flex justify-content-around mt-5 ">
                        <button class="btn btn-warning btn-sm px-4 fw-semibold">
                            <i class="bi bi-pencil-square"></i> Edit
                        </button>
                        <button class="btn btn-danger btn-sm px-4 fw-semibold">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </div>
                    </div>
                </div>

                <!-- Shield Metal Arc Welding (SMAW) -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="700">
                    <div class="service-item position-relative">
                        <div class="icon-box"><i class="fas fa-tools"></i></div>
                        <h3>Shield Metal Arc Welding (SMAW)</h3>
                        <p>The 18 week training program is designed to equip participants from the community with the fundamental skills and knowledge in Shielded Metal Arc Welding (SMAW). The training course aims to produce dedicated and empowering individuals with the skills and knowledge needed to kick start their business ventures or secure employment opportunities in the field of Construction and Manufacturing industry.</p>
                        <div class="card-footer  d-flex justify-content-around mt-5 ">
                        <button class="btn btn-warning btn-sm px-4 fw-semibold">
                            <i class="bi bi-pencil-square"></i> Edit
                        </button>
                        <button class="btn btn-danger btn-sm px-4 fw-semibold">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </div>
                    </div>
                </div>

                <!-- Practical Electricity -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="800">
                    <div class="service-item position-relative">
                        <div class="icon-box"><i class="fas fa-lightbulb"></i></div>
                        <h3>Practical Electricity</h3>
                        <p>The training is an 18-weeks program designed to teach and train participants the necessary skills and training, equip participant's knowledge in Practical Electricity with the necessary acumen to manage the workplace, people and enterprise they will engage in. The training course aims to produce participants who possess multi-skills at different levels and can provide technical support to variety of industrial, commercial and other related organizations.</p>
                        <div class="card-footer  d-flex justify-content-around mt-5 ">
                        <button class="btn btn-warning btn-sm px-4 fw-semibold">
                            <i class="bi bi-pencil-square"></i> Edit
                        </button>
                        <button class="btn btn-danger btn-sm px-4 fw-semibold">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </div>
                    </div>
                </div>

                <!-- Cookery -->
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="900">
                    <div class="service-item position-relative">
                        <div class="icon-box"><i class="fas fa-utensils"></i></div>
                        <h3>Cookery</h3>
                        <p>The training is an 18-weeks program designed to teach and train participants the necessary skills and training, equip participant's knowledge in Cookery with the necessary acumen to manage the workplace, people and enterprise they will engage in. The training course aims to produce participants who possess multi-skills at different levels and can provide technical support to variety of industrial, commercial and other related organizations.</p>
                        <div class="card-footer  d-flex justify-content-around mt-5 ">
                        <button class="btn btn-warning btn-sm px-4 fw-semibold">
                            <i class="bi bi-pencil-square"></i> Edit
                        </button>
                        <button class="btn btn-danger btn-sm px-4 fw-semibold">
                            <i class="bi bi-trash"></i> Delete
                        </button>
                    </div>
                    </div>
                </div>

            </div><!-- End Row -->
        </div><!-- End Container -->
    </div><!-- End Third -->

</section>

        </div>

        </div>
    </div>
</div>