<?php

include $_SERVER['DOCUMENT_ROOT'].'/writer/new/writer/includes/check_user.php';
session_start();
$conn=getConnection();
$availableOrders = 0;
$active_bids = 0;
$completed = 0;
$progress = 0;
$pending = 0;
$failed = 0;
$disputed = 0;
$notifications = 0;

$sql = "SELECT * FROM orders WHERE state='available'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $availableOrders++;
    }
} else {

}

$sql = "SELECT * FROM bids WHERE writer_id = '$myid' AND status = 'active'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $active_bids++;
    }
} else {

}


$sql = "SELECT * FROM orders WHERE  status= 'completed' AND writer_id='$myid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $completed++;
    }
} else {

}

$sql = "SELECT * FROM orders WHERE  status= 'failed' AND writer_id='$myid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $failed++;
    }
} else {

}

$sql = "SELECT * FROM orders WHERE  status= 'pending' AND writer_id='$myid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $pending++;
    }
} else {

}


$sql = "SELECT * FROM orders WHERE  status= 'progress' AND writer_id='$myid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $progress++;
    }
} else {

}


$sql = "SELECT * FROM orders WHERE  status= 'disputed' AND writer_id='$myid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $disputed++;
    }
} else {

}

$sql = "SELECT * FROM notifications where target=$myid AND status='unread'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $notifications++;
    }
} else {

}
$conn->close();