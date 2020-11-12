<?php
include $_SERVER['DOCUMENT_ROOT'].'/functions/template.php';
session_start();
$conn=getConnection();
if (isLoggedIn()) {
	$myfname = $_SESSION['first_name'];
	$mylname = $_SESSION['last_name'];
	$mygender = $_SESSION['gender'];
	$mydob = $_SESSION['dob'];
	$myaddress = $_SESSION['address'];
	$myemail = $_SESSION['email_address'];
	$myphone = '230320-023';
	$mydepartment = 'Adminstrator';
	$myrole = $_SESSION['role'];
	$myavatar = $_SESSION['avatar'];
		$myid = 'Admin';
	$mycategory = '';
    if (!isAdmin()) {
        header("location:".$_SERVER['HTTP_REFERER']."/?rp=9135");
    }


}else{
    header("location:".$_SERVER['HTTP_REFERER']."/?rp=9135");
}

?>