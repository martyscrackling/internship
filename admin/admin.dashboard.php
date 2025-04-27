
<?php 

    require_once "../classes/inquire.class.php";
    require_once "admin-chopdown/head.php";
    require_once "admin-chopdown/sidebar.php";


    $objInquire = new Inquire;
    $inquiries = $objInquire->call_inquiries();



    date_default_timezone_set("Asia/Manila"); 
        $hour = date("H");
        $greeting = "Hello";

        if ($hour >= 5 && $hour < 12) {
            $greeting = "Good Morning, Admin!";
        } elseif ($hour >= 12 && $hour < 18) {
            $greeting = "Good Afternoon, Admin!";
        } elseif ($hour >= 18 && $hour < 22) {
            $greeting = "Good Evening, Admin!";
        } else {
            $greeting = "Good Night, Admin!";
        }

        $today = date("Y-m-d");
        $current_date = date("l, F j, Y");
        
        $current_year = isset($_GET['year']) ? intval($_GET['year']) : date("Y");
        $current_month = isset($_GET['month']) ? intval($_GET['month']) : date("n");
        
        if ($current_month < 1) {
            $current_month = 12;
            $current_year--;
        }
        if ($current_month > 12) {
            $current_month = 1;
            $current_year++;
        }
        
        $prev_month = $current_month - 1;
        $prev_year = $current_year;
        if ($prev_month < 1) {
            $prev_month = 12;
            $prev_year--;
        }
        
        $next_month = $current_month + 1;
        $next_year = $current_year;
        if ($next_month > 12) {
            $next_month = 1;
            $next_year++;
        }
        
        $month_name = date("F", mktime(0, 0, 0, $current_month, 1, $current_year));

?>

<style> 
    :root {
            --primary: rgb(27, 73, 51); 
            --secondary: rgb(29, 95, 63); 
            --accent:rgb(27, 73, 51); 
            --light: #f0fff0; 
            --dark: #005000; 
            --success: #98fb98; 
            --today: rgb(54, 112, 84); 
            --gray-light:rgb(193, 218, 195); 
            --shadow: rgba(0, 50, 0, 0.1);
            --text: #1b4d3e; 
        }
    .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: linear-gradient(135deg, var(--primary), var(--secondary));
            color: white;
            padding: 1.5rem 2rem;
            border-radius: 12px;
            box-shadow: 0 4px 20px var(--shadow);
            margin-bottom: 2rem;
        }
    .greeting-section {
            flex: 1;
        }
        
        .greeting {
            font-size: 1.8rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .date-display {
            font-size: 1rem;
            opacity: 0.9;
        }
        
        .clock {
            font-size: 2.5rem;
            font-weight: 700;
            padding: 0.5rem 1.5rem;
            border-radius: 8px;
            text-align: center;
            min-width: 180px;
        }
        
        .calendar-wrapper {
            background-color: white;
            border-radius: 12px;
            padding: 1.5rem;
            box-shadow: 0 4px 20px var(--shadow);
            margin-top: 2rem;
        }
        
        .month-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .month-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: rgb(27, 73, 51);
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .calendar-icon {
            color: var(--primary);
        }
        
        .month-navigation {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        .month-selector {
            padding: 0.5rem;
            border: 1px solid var(--gray-light);
            border-radius: 6px;
            font-size: 1rem;
            color: var(--text);
            background-color: white;
        }
        
        .nav-btn {
            background-color: var(--gray-light);
            border: none;
            color: var(--primary);
            font-size: 1.2rem;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s ease;
        }
        
        .nav-btn:hover {
            background-color: var(--primary);
            color: white;
        }
        
        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 0.5rem;
        }
        
        .day-name {
            text-align: center;
            font-weight: 600;
            padding: 0.75rem 0;
            background-color: var(--gray-light);
            border-radius: 8px;
            font-size: 0.9rem;
        }
        
        .day {
            text-align: center;
            padding: 1rem 0;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .day:hover {
            background-color: var(--gray-light);
            transform: translateY(-2px);
        }
        
        .empty {
            background-color: transparent;
        }
        
        .today {
            border: 4px solid var(--today);
            color: var(--today);
            font-weight: 600;
            background-color: transparent;
            box-shadow: none;
        }

        
        .other-month {
            color: #aaa;
        }
        .no-underline {
            text-decoration: none !important;
        }
        @media (max-width: 768px) {
    .header {
        flex-direction: column;
        align-items: flex-start;
        text-align: left;
        padding: 1rem;
    }

    .greeting {
        font-size: 1.4rem;
    }

    .date-display {
        font-size: 0.9rem;
    }

    .clock {
        font-size: 1.5rem;
        padding: 0.5rem 1rem;
        margin-top: 1rem;
        width: 100%;
    }

    .month-header {
        flex-direction: column;
        align-items: flex-start;
        gap: 1rem;
    }

    .month-title {
        font-size: 1.3rem;
    }

    .month-navigation {
        flex-wrap: wrap;
        gap: 0.5rem;
    }

    .month-selector {
        font-size: 0.9rem;
        padding: 0.4rem;
    }

    .calendar {
        grid-template-columns: repeat(7, 1fr);
        gap: 0.3rem;
    }

    .day-name,
    .day {
        font-size: 0.75rem;
        padding: 0.5rem 0;
    }

    .nav-btn {
        width: 32px;
        height: 32px;
        font-size: 1rem;
    }

    .content-page .container-fluid {
        padding: 0;
    }

    .calendar-wrapper {
        padding: 1rem;
    }

    .navbar-custom header {
        padding: 0.75rem 1rem;
    }

    .dropdown-menu {
        font-size: 0.9rem;
    }

    .dropdown img {
        width: 28px;
        height: 28px;
    }
}

</style>


<div class="navbar-custom">
    <header class="px-1 shadow-sm">
        <div class="container-fluid d-flex justify-content-between">
            <button class="btn btn-toggle">
            <button id="menu-toggle" class="btn d-lg-none">
                <i class="bi bi-list fs-2"></i>
            </button>
            <h1 class="navtext">Dashboard</h1>
            </button>
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-end m-lg-2">
                <a href="../auth/logout.php" class="d-flex align-items-center gap-2 px-3 py-2 text-decoration-none text-dark" >
                    <i class="bi bi-box-arrow-right fs-5"></i>
                    <span class="fw-semibold">Logout</span>
                </a>
            </div>
        </div>
    </header>
</div>



<div class="content-page px-3">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
            <div class="rounded-4 p-4 text-start mt-4">
            <div class="header">
        <div class="greeting-section">
            <div class="greeting"><?php echo $greeting; ?></div>
            <div class="date-display"><?php echo $current_date; ?></div>
        </div>
        <div class="clock" id="clock"></div>
    </div>

    <div class="calendar-wrapper">
        <div class="month-header">
            <div class="month-title">
                <?php echo $month_name . " " . $current_year; ?>
            </div>
            <div class="month-navigation">
                <a href="?month=<?php echo $prev_month; ?>&year=<?php echo $prev_year; ?>" class="nav-btn no-underline">
                    <i class="fas fa-chevron-left"></i>
                </a>
                
                <select class="month-selector" id="monthSelector" onchange="changeMonth()">
                    <?php
                        for ($m = 1; $m <= 12; $m++) {
                            $month_text = date("F", mktime(0, 0, 0, $m, 1));
                            $selected = ($m == $current_month) ? "selected" : "";
                            echo "<option value='$m' $selected>$month_text</option>";
                        }
                    ?>
                </select>
                
                <select class="month-selector" id="yearSelector" onchange="changeMonth()">
                    <?php
                        $start_year = date("Y") - 5;
                        $end_year = date("Y") + 5;
                        for ($y = $start_year; $y <= $end_year; $y++) {
                            $selected = ($y == $current_year) ? "selected" : "";
                            echo "<option value='$y' $selected>$y</option>";
                        }
                    ?>
                </select>
                
                <a href="?month=<?php echo $next_month; ?>&year=<?php echo $next_year; ?>" class="nav-btn no-underline">
                    <i class="fas fa-chevron-right"></i>
                </a>

            </div>
        </div>
        
        <div class="calendar">
            <?php
                $days = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
                foreach ($days as $day) {
                    echo "<div class='day-name'>$day</div>";
                }

                // First day of the month
                $first_day_of_month = date("w", mktime(0, 0, 0, $current_month, 1, $current_year));
                
                // Number of days in the month
                $days_in_month = date("t", mktime(0, 0, 0, $current_month, 1, $current_year));
                
                // Days from previous month
                if ($first_day_of_month > 0) {
                    $prev_month_days = date("t", mktime(0, 0, 0, $prev_month, 1, $prev_year));
                    for ($i = $first_day_of_month - 1; $i >= 0; $i--) {
                        $day_num = $prev_month_days - $i;
                        echo "<div class='day other-month'>$day_num</div>";
                    }
                }

                // Days of current month
                for ($day = 1; $day <= $days_in_month; $day++) {
                    $date = sprintf("%04d-%02d-%02d", $current_year, $current_month, $day);
                    $class = ($date === $today) ? "day today" : "day";
                    echo "<div class='$class'>$day</div>";
                }
                
                // Days from next month
                $used_cells = $first_day_of_month + $days_in_month;
                $remaining_cells = 7 - ($used_cells % 7);
                if ($remaining_cells < 7) {
                    for ($day = 1; $day <= $remaining_cells; $day++) {
                        echo "<div class='day other-month'>$day</div>";
                    }
                }
            ?>
        </div>
    </div>
            </div>
            </div>
        </div>
    </div>
</div>
<script>
    function updateClockAndGreeting() {
        const now = new Date();
        const hours = now.getHours();
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const seconds = now.getSeconds().toString().padStart(2, '0');

        const timeString = `${(hours % 12 || 12)}:${minutes}:${seconds} ${hours >= 12 ? 'PM' : 'AM'}`;
        document.getElementById("clock").innerText = timeString;

        // Update greeting and date if available
        const greetingEl = document.querySelector(".greeting");
        const dateDisplayEl = document.querySelector(".date-display");

        if (greetingEl && dateDisplayEl) {
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const currentDateStr = now.toLocaleDateString('en-US', options);

            let greeting = "Hello";
            if (hours >= 5 && hours < 12) {
                greeting = "Good Morning, Admin!";
            } else if (hours >= 12 && hours < 18) {
                greeting = "Good Afternoon, Admin!";
            } else if (hours >= 18 && hours < 22) {
                greeting = "Good Evening, Admin!";
            } else {
                greeting = "Good Night, Admin!";
            }

            greetingEl.textContent = greeting;
            dateDisplayEl.textContent = currentDateStr;
        }
    }

    setInterval(updateClockAndGreeting, 1000);
    updateClockAndGreeting(); // initial call
</script>
<script>
        function updateClock() {
            const now = new Date();
            const options = { hour: '2-digit', minute: '2-digit', second: '2-digit', hour12: true };
            const time = now.toLocaleTimeString('en-US', options);
            document.getElementById("clock").innerText = time;
        }

        function changeMonth() {
            const month = document.getElementById("monthSelector").value;
            const year = document.getElementById("yearSelector").value;
            window.location.href = `?month=${month}&year=${year}`;
        }

        setInterval(updateClock, 1000);
        updateClock(); // initial call
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.getElementById("menu-toggle");
    const sidebar = document.getElementById("sidebar");

    menuToggle.addEventListener("click", function () {
        sidebar.classList.toggle("show");
    });
});

</script>
<script src="../vendor/bootstrap-5.3.3/js/bootstrap.bundle.min.js"></script>
<script src="../vendor/jQuery-3.7.1/jquery-3.7.1.min.js"></script>
<script src="../vendor/chartjs-4.4.5/chart.js"></script>
<script src="../vendor/datatable-2.1.8/datatables.min.js"></script>
<script src="../js/admin.js"></script>
<script src="../js/product.js"></script>