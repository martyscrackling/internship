<?php
    require_once "../classes/announcement.class.php";

    $objAnnouncement = new Announcements;
    $announcement = $objAnnouncement->call_announcements();

?>

<div class="button">
    <a href="#about" id="scrollToSecond"><i class="fas fa-arrow-up"></i></a>
</div>

<section id="about" class="second relative section">
    <div class="container">
        <div class="row gy-4">
            <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
                <h3 class="about">Announcements</h3>
            </div>
            <div class="col-12 position-relative">
                <!-- Scroll Left Button -->
                <button class="scroll-button scroll-left" id="scrollLeft" style="display: none;"><i class="fas fa-chevron-left"></i></button>
                
                <div class="news-container" id="newsContainer">
                    <div class="row flex-nowrap">
                        <?php foreach ($announcement as $ann): ?>
                        <div class="col-md-4 wrap-card">
                            <div class="card news-card">
                             <a href="announcement.php?announcement_id=<?php echo $ann['announcement_id']; ?>" class="announcement-link">
                                    <img src="../imgs/cetwmsu.png" alt="News Image">
                                    <div class="news-content">
                                        <div class="combine">
                                            <p class="news-category"><?php echo ($ann["a_title"]); ?></p>
                                            <p class="date"><i class="fas fa-calendar-alt"></i> <?php echo ($ann["a_date"]); ?></p>
                                        </div>
                                        <p class="news-title"><?php echo ($ann["a_description"]); ?></p>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <!-- Scroll Right Button -->
                <button class="scroll-button scroll-right" id="scrollRight"><i class="fas fa-chevron-right"></i></button>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll(".news-title").forEach(title => {
            let words = title.innerText.split(" ");
            if (words.length > 15) {
                title.innerText = words.slice(0, 15).join(" ") + "...";
            }
        });

        // Scroll functionality
        const scrollContainer = document.getElementById("newsContainer");
        const scrollLeft = document.getElementById("scrollLeft");
        const scrollRight = document.getElementById("scrollRight");

        function updateScrollButtons() {
            scrollLeft.style.display = scrollContainer.scrollLeft > 0 ? "block" : "none";
            scrollRight.style.display = (scrollContainer.scrollLeft + scrollContainer.clientWidth) < scrollContainer.scrollWidth ? "block" : "none";
        }

        scrollContainer.addEventListener("scroll", updateScrollButtons);

        scrollLeft.addEventListener("click", () => {
            scrollContainer.scrollBy({ left: -300, behavior: "smooth" });
        });

        scrollRight.addEventListener("click", () => {
            scrollContainer.scrollBy({ left: 300, behavior: "smooth" });
        });

        updateScrollButtons(); // Initial check
    });
</script>