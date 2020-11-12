<?php
session_start();
include $_SERVER['DOCUMENT_ROOT'].'/writer/new/admin/includes/check_user.php';
$conn=getConnection();
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
	$myfname = $_SESSION['first_name'];
	$mylname = $_SESSION['last_name'];
	$mygender = $_SESSION['gender'];
	$mydob = $_SESSION['dob'];
	$myaddress = $_SESSION['address'];
	$myemail = $_SESSION['email_address'];
	$myphone = $_SESSION['phone'];
	$mydepartment = $_SESSION['wallet'];
	$myrole = $_SESSION['role'];
	$myavatar = $_SESSION['avatar'];
	$myid = $_SESSION['my_id'];
	$mycategory = $_SESSION['mycategory'];
	if ($myrole == "writer") {
		
	}else{
	header("location:/logout/?rp=9122");
	}
}else{
    $server=$_SERVER['SERVER_NAME'];
	header("location:/logout?rp=9422");
}

?>