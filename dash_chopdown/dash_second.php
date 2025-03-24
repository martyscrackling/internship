<div class="button">
    <a href="#about" id="scrollToSecond"><i class="fas fa-arrow-up"></i></a>
  </div>
<section id="about" class="second relative section">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
                <h3 class="about">About Us</h3>
                <p>
                    Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laudantium laboriosam tempora minima nulla eos excepturi nostrum id similique voluptate at ipsum deleniti omnis cumque exercitationem blanditiis earum aliquid dolorum, dolores vitae veniam? Ipsa similique vel at quo nesciunt aut praesentium quod aperiam ex sunt, quasi iste necessitatibus laborum fugiat explicabo!
                </p>
            </div>
            <!-- Carousel Section -->
            <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
                <div id="teamCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                    <!-- Carousel Items -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="../photos/orientation.jpg" class="d-block w-100 rounded shadow carousel-img" alt="Group Image">
                        </div>
                        <div class="carousel-item">
                            <img src="../photos/welding1.jpg" class="d-block w-100 rounded shadow carousel-img" alt="Group Image">
                        </div>
                        <div class="carousel-item">
                            <img src="../photos/practicalelectricity1.jpg" class="d-block w-100 rounded shadow carousel-img" alt="Group Image">
                        </div>
                        <div class="carousel-item">
                            <img src="../photos/plumbing1.jpg" class="d-block w-100 rounded shadow carousel-img" alt="Group Image">
                        </div>
                        <div class="carousel-item">
                            <img src="../photos/graduation.jpg" class="d-block w-100 rounded shadow carousel-img" alt="Group Image">
                        </div>
                        <div class="carousel-item">
                            <img src="../photos/gardening.jpg" class="d-block w-100 rounded shadow carousel-img" alt="Group Image">
                        </div>
                        <div class="carousel-item">
                            <img src="../photos/foodprocessing.jpg" class="d-block w-100 rounded shadow carousel-img" alt="Group Image">
                        </div>
                        <div class="carousel-item">
                            <img src="../photos/computerrepair.jpg" class="d-block w-100 rounded shadow carousel-img" alt="Group Image">
                        </div>
                        <div class="carousel-item">
                            <img src="../photos/breadpastry.jpg" class="d-block w-100 rounded shadow carousel-img" alt="Group Image">
                        </div>
                        <div class="carousel-item">
                            <img src="../photos/cookery.jpg" class="d-block w-100 rounded shadow carousel-img" alt="Group Image">
                        </div>
                        <div class="carousel-item">
                            <img src="../photos/beauty.jpg" class="d-block w-100 rounded shadow carousel-img" alt="Group Image">
                        </div>
                    </div>
                    <!-- Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#teamCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#teamCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

        </div>
    </div>
</section>
<script>
    document.getElementById("scrollToSecond").addEventListener("click", function(event) {
        event.preventDefault(); // Prevent default anchor behavior
        document.querySelector(".second").scrollIntoView({ behavior: "smooth" });
    });
</script>
<script>
  let lastScrollTop = 0;
  const scrollButton = document.querySelector(".button");

  window.addEventListener("scroll", function () {
    let scrollTop = window.scrollY || document.documentElement.scrollTop;

    if (scrollTop < lastScrollTop) {
      // Scrolling down, show button
      scrollButton.style.opacity = "1";
      scrollButton.style.pointerEvents = "auto";
    } else {
      // Scrolling up, hide button
      scrollButton.style.opacity = "0";
      scrollButton.style.pointerEvents = "none";
    }

    lastScrollTop = scrollTop;
  });
</script>
