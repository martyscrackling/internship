<?php
require_once "../classes/unit.class.php";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["unit_id"])) {
    $unitId = $_POST["unit_id"];
    $unit = new Units();

    if ($unit->delete_unit($unitId)) {
        echo "success";
    } else {
        echo "error";
    }
} else {
    echo "invalid";
}
?>
