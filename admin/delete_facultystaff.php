<?php
require_once '../classes/faculty&staff.class.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['facultystaff_id'])) {
    $facultystaff_id = $_POST['facultystaff_id'];

    $faculty = new FacultyStaff();
    if ($faculty->delete_facultysfaff($facultystaff_id)) {
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    echo 'invalid';
}
?>
