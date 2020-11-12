<?php
$writer_id = $_POST['writer_id'];
include $_SERVER['DOCUMENT_ROOT'].'/writer/new/admin/includes/check_user.php';
$fname = ucwords(mysqli_real_escape_string($conn, $_POST['fname']));
$lname = ucwords(mysqli_real_escape_string($conn, $_POST['lname']));
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$department = mysqli_real_escape_string($conn, $_POST['department']);
$category = mysqli_real_escape_string($conn, $_POST['category']);
$address = ucwords(mysqli_real_escape_string($conn, $_POST['address']));
$dob = mysqli_real_escape_string($conn, $_POST['dob']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);

$sql = "SELECT * FROM tbl_users WHERE email = '$email' AND user_id !='$writer_id' OR phone = '$phone' AND user_id !='$writer_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $sem = $row['email'];
	$sph = $row['phone'];
	if ($sem == $email) {
	 header("location:../edit-writer.php?rp=1189&sid=$writer_id");	
	}else{
	
	if ($sph == $phone) {
	 header("location:../edit-writer.php?rp=2074&sid=$writer_id");	
	}else{
		
	}
	
	}
	
    }
} else {

$sql = "UPDATE tbl_users SET first_name = '$fname', last_name = '$lname', gender = '$gender', dob = '$dob', address = '$address', email = '$email', phone = '$phone', department = '$department', category = '$category' WHERE user_id='$writer_id'";

if ($conn->query($sql) === TRUE) {
  header("location:../edit-writer.php?rp=7823&sid=$writer_id");
} else {
  header("location:../edit-writer.php?rp=1298&sid=$writer_id");
}


}

$conn->close();
?>