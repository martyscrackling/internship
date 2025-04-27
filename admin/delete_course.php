<?php
require_once "../classes/course.class.php";

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['course_id'])) {
    $course_id = $_POST['course_id'];
    
    $objCourse = new Course();
    if ($objCourse->delete_course($course_id)) {
        echo "success";
    } else {
        echo "error";
    }
}
?>
