<?php
require_once "../classes/course.class.php"; 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $course = new Course();
    $course->course_id = $_POST['course_id'];
    $course->c_title = $_POST['c_title'];
    $course->c_desc = $_POST['c_desc'];
    $unit_id = $_POST['unit_id'];
    if ($course->editCourse()) {
        header("Location: admin.coursemodify.php?unit_id=" . $unit_id);
        exit;
    } else {
        echo "Error updating course.";
    }
}

?>
