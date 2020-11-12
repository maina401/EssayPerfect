<?php
include $_SERVER['DOCUMENT_ROOT'].'/writer/new/admin/includes/check_user.php';
$sbid = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "DELETE FROM tbl_subjects WHERE subject_id='$sbid'";

if ($conn->query($sql) === TRUE) {
    header("location:../subject.php?rp=7823");
} else {
    header("location:../subject.php?rp=1298");
}

$conn->close();
?>
