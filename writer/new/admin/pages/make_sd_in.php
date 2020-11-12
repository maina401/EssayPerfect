<?php
include $_SERVER['DOCUMENT_ROOT'].'/writer/new/admin/includes/check_user.php';
session_start();
if(!isAdmin()){

header('location:'.$_SERVER['HTTP_REFERER'].'&rp=1298');
}
if (isset($_GET['id'])) {
    if (isset($_GET['param'])&&$_GET['param']=='59') {
        $sid = mysqli_real_escape_string($conn, $_GET['id']);

        $sql = "UPDATE orders SET state='completed', writer_pay_status=order_total*0.5 WHERE order_id='$sid'";

        if ($conn->query($sql) === TRUE) {
            header('location:'.$_SERVER['HTTP_REFERER'].'&rp=7823');
        }
    }

    $sid = mysqli_real_escape_string($conn, $_GET['id']);

    $sql = "UPDATE writers SET acc_state='suspended' WHERE writer_id='$sid'";

    if ($conn->query($sql) === TRUE) {
        header('location:'.$_SERVER['HTTP_REFERER'].'&rp=7823');
    } else {
        header('location:'.$_SERVER['HTTP_REFERER'].'&rp=1298');
    }
}else {
    header("location:../writers.php?rp=1298");
}
$conn->close();
?>
