<?php
require_once "../classes/unit.class.php";

if (isset($_POST['update_unit'])) {
    $unit = new Units();

    $unit->unit_id = $_POST['unit_id'];
    $unit->u_title = $_POST['u_title'];
    $unit->u_description = $_POST['u_description'];
    $unit->u_functions = $_POST['u_functions'];

    if ($unit->editUnit()) {
        // Success: Redirect back to the same page with the success flag and unit_id
        header("Location: admin.coursemodify.php?unit_id=" . $unit->unit_id . "&success=updated");
        exit();
    } else {
        // Failed: Redirect back with the error flag and unit_id
        header("Location: admin.coursemodify.php?unit_id=" . $unit->unit_id . "&error=update_failed");
        exit();
    }
} else {
    // If accessed directly without form submit, just go back to the list page
    header("Location: admin.coursemodify.php");
    exit();
}
?>
