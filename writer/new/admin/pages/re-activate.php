<?php
include $_SERVER['DOCUMENT_ROOT'].'/writer/new/admin/includes/check_user.php';
$rsid = mysqli_real_escape_string($conn, $_GET['rid']);
$exid = mysqli_real_escape_string($conn, $_GET['eid']);

$sql = "DELETE FROM tbl_assessment_records WHERE record_id='$rsid'";

if ($conn->query($sql) === TRUE) {
    header("location:../view-results.php?rp=7823&eid=$exid");
} else {
     header("location:../view-results.php?rp=1298&eid=$exid");
}

$conn->close();
?>
