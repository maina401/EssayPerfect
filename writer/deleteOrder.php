<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/functions/template.php';
$order_id=$_GET['order_id'];
if (($_GET['param']) && $_GET['param']=='42') {

    if (isAdmin()) {
        $deleted = deleteItem('orders', 'order_id', $order_id);
        $body = 'Order ' . $order_id . ' Was deleted successfully';
        $recipient = 'admin@' . $_SERVER['SERVER_NAME'];
        $heading = 'Order Deleted Successfully';
        if ($deleted) {
addNotification('1','Order Deleted','Order '.$order_id.' was successfully removed from the system','0');
            if (sendQuickMail($recipient, $heading, $body)) {
                header('location:' . $_SERVER['HTTP_REFERER']);
            } else {
                header('location:' . $_SERVER['HTTP_REFERER']);
            }
        } else {
            header('location:' . $_SERVER['HTTP_REFERER']);
        }
    } else {
        header('location:' . $_SERVER['HTTP_REFERER']);
    }
}

function deleteItem($from,$where,$equals)
{
    if (!isAdmin()) {
        header('location:/errors/403.html');
    } else {
        $conn = getConnection();
        $sql = "DELETE FROM $from WHERE $where=$equals";
        echo $sql;
        $state=$conn->query($sql) or die($conn->error);
        if ($state){
            return true;
        }else{
            return false;
        }

}
}
