<?php
require_once '../classes/enroll.class.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $unit_id = $_POST['unit_id'];
    $steps = $_POST['steps'];

    $enroll = new Enroll();
    $enroll->updateEnroll($unit_id, $steps);

    header("admin.coursemodify.php?unit_id=" . $unit->unit_id . "&success=updated"); 
    exit();
}
?>
