<?php
require_once "../classes/announcement.class.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["announcement_id"])) {
    $announcementId = $_POST["announcement_id"];
    $announcement = new Announcements();

    if ($announcement->delete_announcement($announcementId)) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "invalid";
}
?>
