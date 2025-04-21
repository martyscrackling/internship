<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/66216b0ead.js" crossorigin="anonymous"></script>

<script>
    let lastScrollTop = 0;
    const navbar = document.querySelector(".navbar");

    window.addEventListener("scroll", function () {
        let scrollTop = window.scrollY;

        if (scrollTop > lastScrollTop) {
            navbar.style.top = "-90px"; 
        } else {
            // Scrolling up - show navbar
            navbar.style.top = "0";
        }
        
        lastScrollTop = scrollTop;
    });
</script>

<!-- ✅ Add the new script for navbar text visibility here -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const navbarText = document.getElementById("navbar-text");
        const secondSection = document.querySelector(".second");

        window.addEventListener("scroll", function () {
            const sectionPosition = secondSection.getBoundingClientRect().top;
            const screenHeight = window.innerHeight;

            if (sectionPosition <= screenHeight / 2) {
                // Show text when section is in view
                navbarText.style.opacity = "1";
                navbarText.style.transition = "opacity 0.5s ease-in-out";
            } else {
                // Hide text when section is out of view
                navbarText.style.opacity = "0";
            }
        });
    });
</script>


    
