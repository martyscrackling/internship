
    function toggleForms() {
        const container = document.querySelector(".container");
        container.classList.toggle("active");
    }

    document.getElementById("showSignup").addEventListener("click", function() {
        document.querySelector(".container").classList.add("active");
    });

    document.getElementById("showLogin").addEventListener("click", function() {
        document.querySelector(".container").classList.remove("active");
    });

