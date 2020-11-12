<?php
date_default_timezone_set('Africa/Dar_es_salaam');
include $_SERVER['DOCUMENT_ROOT'].'/writer/new/admin/includes/check_user.php';
include '../../includes/uniques.php';
session_start();
if (!isAdmin()) {
    header('location:/Home');

}
if(isset($_GET['order_id'])&&isset($_GET['param'])){
    $order_id=$_GET['order_id'];
    $writer_id=$_GET['writer_id'];
    if (!isAdmin()) {
        header("location:".$_SERVER['HTTP_REFERER']);
    }
    if ($_GET['param']=='49'){
$conn=getConnection();
$sql="SELECT subject as s,Format as f,descri as descri,pages as p, due_date as d,writer_id as w FROM orders WHERE order_id='$order_id'";
$result=$conn->query($sql);
if ($result->num_rows<=0){
    header('location:'.$_SERVER['HTTP_REFERER']);
}while ($row=$result->fetch_assoc()) {
            if ($row['w']!='unassigned') {
                header('location:'.$_SERVER['HTTP_REFERER'].'&err=assigned');
            }
            if ($row['s']=='general') {

                $sql="SELECT writer_id,email_address FROM writers  ORDER BY rating DESC limit 1";

            }else{
            $subject=$row['s'];
                $sql="SELECT writer_id, email_addressFROM writers WHERE subject1='$subject' AND format1='$format' ORDER BY rating,rand() DESC limit 1";

            }
            $format=$row['f'];
            $desc=$row['descri'];
            $pages=$row['p'];
            $date=date('M j Y g:i A',strtotime($row['d']));
        }
$result=$conn->query($sql);
if ($result->num_rows==0){
    $sql="SELECT writer_id, email_address FROM writers WHERE subject1='$subject'  ORDER BY rating,rand() DESC limit 1";
    $result=$conn->query($sql);
    if ($result->num_rows==0){
        $sql="SELECT email_address as email FROM writers WHERE subject1='$subject'  ORDER BY rating DESC limit 50";
        $result=$conn->query($sql);
        while ($row=$result->fetch_assoc()) {

            $body="
            <h2>Dear writer, You are invited to express your interest on the following order.</h2>
            <h1>Order Details</h1>
    
<h3>Order ID:</h3>	#".$order_id."<br>
<h3>Title:</h3>		".$title."<br>
<h3>Description:</h3>		".$desc."<br>
<h3>Date:</h3>	".$date."<br>
<h3>Pages:</h3>	".$pages."<br>
<div class='alert-info'>To view and bid on this order, <a class='btn-success' href='".$_SERVER['SERVER_NAME']."/writer/orderDetails.php?order_id=".$order_id."'>Click here</a> </div>
            ";
            $sent=sendQuickMail($row['email'],'Invitation For Order '.$order_id,$body);
            if ($sent) {
                header('location:'.$_SERVER['HTTP_REFERER'].'&success=true');
            }else{
                header('location:'.$_SERVER['HTTP_REFERER'].'&err=failed');
            }
        }
    }else{
        while ($row=$result->fetch_assoc()){
        $randomWriter=$row['writer_id'];
        $email=$row['email_address'];
        $sql = "UPDATE `orders` SET `state` = 'progress', `solution` = 'unavailable', `writer_id` = '$randomWriter' WHERE `orders`.`order_id` = $order_id";
        $assigned=$conn->query($sql);}
        if ($assigned) {
            $body="
            <h2>Dear writer ".$randomWriter.", The following order has been auto assigned to you by the system.</h2>
            <h1>Order Details</h1>
    
<h3>Order ID:</h3>	#".$order_id."<br>
<h3>Title:</h3>		".$title."<br>
<h3>Description:</h3>		".$desc."<br>
<h3>Date:</h3>	".$date."<br>
<h3>Pages:</h3>	".$pages."<br>
<div class='alert-info'>To view, reject or upload solution <a class='btn-success' href='".$_SERVER['SERVER_NAME']."/writer/orderDetails.php?order_id=".$order_id."'>Click here</a> </div>
            ";
            addNotification($randomWriter,'Congratulations!! Order '.$order_id.' has been assigned to you',$body,'0');
            $sent=sendQuickMail($email,'Congratulations!! Order '.$order_id.' has been assigned to you',$body);
            if ($sent) {
                header('location:'.$_SERVER['HTTP_REFERER'].'&success=false');
            }else{
                header('location:'.$_SERVER['HTTP_REFERER'].'&err=failed');
            }
        }
    }
}else{
    while ($row=$result->fetch_assoc()){
    $randomWriter=$row['writer_id'];

    $email=$row['email_address'];
    $sql = "UPDATE `orders` SET `state` = 'progress', `solution` = 'unavailable', `writer_id` = '$randomWriter' WHERE `orders`.`order_id` = $order_id";
    $assigned=$conn->query($sql);}
    if ($assigned) {
        $body="
            <h2>Dear writer ".$randomWriter.", The following order has been auto assigned to you by the system.</h2>
            <h1>Order Details</h1>
    
<h3>Order ID:</h3>	#".$order_id."<br>
<h3>Title:</h3>		".$title."<br>
<h3>Description:</h3>		".$desc."<br>
<h3>Date:</h3>	".$date."<br>
<h3>Pages:</h3>	".$pages."<br>
<div class='alert-info'>To view, reject or upload solution <a class='btn-success' href='".$_SERVER['SERVER_NAME']."/writer/orderDetails.php?order_id=".$order_id."'>Click here</a> </div>
            ";
        $sent=sendQuickMail($email,'Congratulations!! Order '.$order_id.' has been assigned to you',$body);
        if ($sent) {
            header('location:'.$_SERVER['HTTP_REFERER'].'&success=true');
        }else{
            header('location:'.$_SERVER['HTTP_REFERER'].'&success=false');
        }
    }
}

    } elseif ($_GET['param']=='44') {


        $sql="SELECT * FROM writers WHERE writer_id='$writer_id'";
        $result=$conn->query($sql);
        if ($result->num_rows>0){
            $row=$result->fetch_assoc();
            $email=$row['email_address'];

            $sql="SELECT *  FROM orders WHERE order_id='$order_id' ";
            $result=$conn->query($sql);
            while ($row=$result->fetch_assoc()) {

                $body="
            <h2>Dear writer".$writer_id.", You have been assigned the following order.</h2>
            <h1>Order Details</h1>
    
<h3>Order ID:</h3>	#".$order_id."<br>
<h3>Title:</h3>		".$title."<br>
<h3>Description:</h3>		".$row['descri']."<br>
<h3>Date:</h3>	".$date."<br>
<h3>Pages:</h3>	".$pages."<br>
<div class='alert-info'>Start Working immediately. To view and download order attachments, <a class='btn-success' href='".$_SERVER['SERVER_NAME']."/writer/orderDetails.php?order_id=".$order_id."'>Click here</a> </div>
            ";
                $sql="UPDATE ORDERS set writer_id='$writer_id' where order_id='$order_id'";
                $assigned=$conn->query($sql);
                if ($assigned) {
                    $sql="UPDATE bids set status='lost' where order_id='$order_id' AND writer_id<>'$writer_id'";
                   $conn->query($sql);
                    $sql="UPDATE bids set status='won' where order_id='$order_id' AND writer_id='$writer_id'";
$conn->query($sql);
                    addNotification($writer_id,'Order Assigned','You were assigned Order '.$order_id,'0');
                    addNotification('1','Order Assigned','You assigned order '.$order_id.' to writer '.$writer_id,'0');
                    $sent=sendQuickMail($email,'Congratulations! '.$order_id,$body);
                    if ($sent) {
                        header('location:'.$_SERVER['HTTP_REFERER'].'&success=true');
                    }else{
                        header('location:'.$_SERVER['HTTP_REFERER'].'&err=failed');
                    }


                }else{
                    header('location:'.$_SERVER['HTTP_REFERER'].'&err=failed');
                }

            }
        }
    }

}else {
    $exam_id = $_POST['examid'];
    $exam = ucwords(mysqli_real_escape_string($conn, $_POST['exam']));
    $duration = mysqli_real_escape_string($conn, $_POST['duration']);
    $passmark = mysqli_real_escape_string($conn, $_POST['passmark']);
    $attempts = mysqli_real_escape_string($conn, $_POST['attempts']);
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $terms = ucfirst(mysqli_real_escape_string($conn, $_POST['instructions']));

    $sql = "SELECT * FROM tbl_examinations WHERE exam_name = '$exam' AND subject = '$subject' AND category = '$category' AND exam_id != '$exam_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            header("location:../examinations.php?rp=1185");
        }
    } else {

        $sql = "UPDATE tbl_examinations SET category = '$category', subject = '$subject', exam_name = '$exam', date = '$date', duration = '$duration', passmark = '$passmark', re_exam = '$attempts', terms = '$terms' WHERE exam_id='$exam_id'";

        if ($conn->query($sql) === TRUE) {
            header("location:../edit-exam.php?rp=7823&eid=$exam_id");
        } else {
            header("location:../edit-exam.php?rp=1298&eid=$exam_id");
        }


    }
}
$conn->close();
?>
