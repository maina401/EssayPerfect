<?php
include $_SERVER['DOCUMENT_ROOT'].'/writer/new/admin/includes/check_user.php';
$ctid = mysqli_real_escape_string($conn, $_GET['id']);

$sql = "DELETE FROM tbl_categories WHERE category_id='$ctid'";

if ($conn->query($sql) === TRUE) {
    header("location:../categories.php?rp=7823");
} else {
    header("location:../categories.php?rp=1298");
}

$conn->close();
?>
