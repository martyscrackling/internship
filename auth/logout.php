<?php
session_start();
session_destroy();
header('Location: ../dashboard/descd.php');
exit;
?>