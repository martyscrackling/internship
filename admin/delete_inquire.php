<?php
require_once "../classes/inquire.class.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $id = $_POST['delete_id'];
    $objInquire = new Inquire;

    if ($objInquire->delete_inquiries($id)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Deletion failed']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'ID not provided']);
}

?>
