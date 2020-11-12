<?php
include $_SERVER['DOCUMENT_ROOT'].'/writer/new/admin/includes/check_user.php';
$sid = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "UPDATE writers SET acc_state='active' WHERE writer_id='$sid'";

if ($conn->query($sql) === TRUE) {
    header("location:../writers.php?rp=7823");
} else {
    header("location:../writers.php?rp=1298");
}

$conn->close();
?>
