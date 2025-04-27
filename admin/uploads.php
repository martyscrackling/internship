<?php
session_start();
require_once "../classes/faculty&staff.class.php";


$objFacultyStaff = new FacultyStaff;
$id = $objFacultyStaff->getFacultyStaff_id($facultystaff_id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_FILES['profilepicture'])) {
        echo "<script>alert('No file uploaded!'); window.location.href = 'addprofile.php';</script>";
        exit();
    }

    $id = $_SESSION['user']['facultystaff_id']; // Make sure this exists
    $file = $_FILES['profilepicture'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];

    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'webp'];

    if (in_array($fileExt, $allowed)) {
        if ($fileError === 0) {
            if ($fileSize < 10 * 1024 * 1024) { // 10MB max
                $fileNameNew = $id . "_profile.jpg";
                $uploadDir = __DIR__ . '/uploads/';
                $fileDestination = $uploadDir . $fileNameNew;

                // Ensure uploads folder exists
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }

                if (move_uploaded_file($fileTmpName, $fileDestination)) {
                    // Update database
                    $fs = new FacultyStaff();
                    $fs->updateProfilePicture($facultystaff_id, $fileNameNew);
                    header("Location: admin.units.php?uploadsuccess");
                    exit();
                } else {
                    echo "<script>alert('Failed to move uploaded file.'); window.location.href = 'addprofile.php';</script>";
                }
            } else {
                echo "<script>alert('File is too large. Max 10MB.'); window.location.href = 'addprofile.php';</script>";
            }
        } else {
            echo "<script>alert('Upload error.'); window.location.href = 'addprofile.php';</script>";
        }
    } else {
        echo "<script>alert('Invalid file type.'); window.location.href = 'addprofile.php';</script>";
    }
}
?>
