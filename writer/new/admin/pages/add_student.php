<?php
date_default_timezone_set('Africa/Dar_es_salaam');
include $_SERVER['DOCUMENT_ROOT'].'/writer/new/admin/includes/check_user.php';
include '../../includes/uniques.php';
$writer_id = get_rand_numbers(4).get_rand_numbers(3).get_rand_numbers(4);
$fname = ucwords(mysqli_real_escape_string($conn, $_POST['fname']));
$lname = ucwords(mysqli_real_escape_string($conn, $_POST['lname']));
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$department = mysqli_real_escape_string($conn, $_POST['department']);
$category = mysqli_real_escape_string($conn, $_POST['category']);
$address = ucwords(mysqli_real_escape_string($conn, $_POST['address']));
$dob = mysqli_real_escape_string($conn, $_POST['dob']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);

$sql = "SELECT * FROM writers WHERE email_address = '$email' OR phone = '$phone'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $sem = $row['email'];
	$sph = $row['phone'];
	if ($sem == $email) {
	 header("location:../writers.php?rp=1189");	
	}else{
	
	if ($sph == $phone) {
	 header("location:../writers.php?rp=2074");	
	}else{
		
	}
	
	}
	
    }
} else {

$sql = "INSERT INTO writers (user_id, first_name, last_name, gender, dob, address, email, phone, department, category)
VALUES ('$writer_id', '$fname', '$lname', '$gender', '$dob', '$address', '$email', '$phone', '$department', '$category')";

if ($conn->query($sql) === TRUE) {
  header("location:../writers.php?rp=6310");
} else {
  header("location:../writers.php?rp=9157");
}


}

$conn->close();
?>