<?php
include $_SERVER['DOCUMENT_ROOT'].'/writer/new/admin/includes/check_user.php';
$sbid = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "UPDATE tbl_subjects SET status='Inactive' WHERE subject_id='$sbid'";

if ($conn->query($sql) === TRUE) {
    header("location:../subject.php?rp=7823");
} else {
    header("location:../subject.php?rp=1298");
}

$conn->close();
?>
