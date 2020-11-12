<?php
include $_SERVER['DOCUMENT_ROOT'].'/writer/new/admin/includes/check_user.php';
$sdid = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "DELETE FROM tbl_users WHERE user_id='$sdid'";

if ($conn->query($sql) === TRUE) {
    header("location:../writers.php?rp=7823");
} else {
    header("location:../writers.php?rp=1298");
}

$conn->close();
?>
