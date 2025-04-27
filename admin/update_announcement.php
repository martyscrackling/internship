<?php
session_start();
require_once "../tools/clean.php";
require_once "../classes/announcement.class.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $announcement_id = isset($_POST['announcement_id']) ? clean_input($_POST['announcement_id']) : null;
    $a_title = isset($_POST['a_title']) ? clean_input($_POST['a_title']) : '';
    $a_description = isset($_POST['a_description']) ? clean_input($_POST['a_description']) : '';

    if ($announcement_id) {
        $announcement = new Announcements();
        $announcement->announcement_id = $announcement_id;
        $announcement->a_title = $a_title;
        $announcement->a_description = $a_description;

        if ($announcement->update_announcement()) {
            $_SESSION['announcement_edit_success'] = true;
        } else {
            $_SESSION['announcement_edit_error'] = true;
        }        
    }
}

header("Location: admin.announcement.php");
exit();
