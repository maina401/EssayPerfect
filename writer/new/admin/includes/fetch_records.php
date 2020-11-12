<?php

$departments = 0;
$writers = 0;
$examination = 0;
$subjects = 0;
$categories = 0;
$notice = 0;
$questions = 0;
$banned_writers = 0;
$std_fails = 0;
$std_pass = 0;

$sql = "SELECT * FROM tbl_departments";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $departments++;
    }
} else {

}

$sql = "SELECT * FROM tbl_users WHERE role = 'writer'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $writers++;
    }
} else {

}


$sql = "SELECT * FROM tbl_examinations";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $examination++;
    }
} else {

}

$sql = "SELECT * FROM tbl_subjects";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $subjects++;
    }
} else {

}

$sql = "SELECT * FROM tbl_categories";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $categories++;
    }
} else {

}


$sql = "SELECT * FROM tbl_notice";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $notice++;
    }
} else {

}

$sql = "SELECT * FROM tbl_questions";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $questions++;
    }
} else {

}

$sql = "SELECT * FROM tbl_users WHERE role = 'writer' AND acc_stat = '0'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $banned_writers++;
    }
} else {

}

$sql = "SELECT * FROM tbl_assessment_records";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
   
    while($row = $result->fetch_assoc()) {
     $status = $row['status'];
	 if ($status == "PASS"){
		 $std_pass++;
	 }else{
		$std_fails++; 
		 
	 }
	 
    }
} else {

}



$conn->close();
?>