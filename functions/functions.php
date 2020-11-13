<?php
include $_SERVER['DOCUMENT_ROOT']."/writer/new/pages/authentication.php";
include $_SERVER['DOCUMENT_ROOT'].'/functions/mail/PHPMailerAutoload.php';
// connect to database

$db=getConnection();
//if ($db->connect_error) {
//    die("Connection failed: " . $db->connect_error);
//}
if (isset($_GET['action'])) {
    if (!isAdmin()) {
        header('location:'.$_SERVER['HTTP_REFERER']);
    }else{
        $actions=['active','probation','pending','blocked','suspended'];
        $action=$_GET['action'];
        if (!in_array($_GET['action'],$actions)) {
            header('location:'.$_SERVER['HTTP_REFERER']);
        }else{


        if(isset($_GET['writer_id'])&&!empty($_GET['writer_id'])){
            $writer_id=$_GET['writer_id'];
            $sql="UPDATE writers set acc_state='$action'";
$conn=getConnection();
$updated=$conn->query($sql) or die($conn->error);
            if ($updated) {
                header('location:'.$_SERVER['HTTP_REFERER'].'&update=complete');
            }

        }
        }
    }
}

$username = "";
$email    = "";
$errors   = array(); 

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
	
}
if (isset($_POST['delete'])) {
    delete();

}
if (isset($_POST['order_btn'])) {
    header('location: /Home/');

}
if (isset($_POST['upload'])) {
	upload();
	
}

if (isset($_POST['give_feedback'])) {
    giveFeedback();

}
function isaWriter(){
    global $db;
    $email=$_SESSION['email_address'];
    $sql="SELECT writer_id FROM writers WHERE email_address='$email'";
    $result=$db->query($sql);
    if (mysqli_num_rows($result)==1){

        return true;
    }else{
        return false;
    }

}

if (isset($_POST['admin_register_btn'])) {
	adminCreateUser();
}
if (isset($_POST['enroll_btn'])) {
	enroll();
}
function userAloowsCookies(){
    if (isset($_COOKIE['ges_cookie_notif'])){
        $state=$_COOKIE['ges_cookie_notif'];
        if ($state=='notified'){
            return true;
        }else{
            return false;
        }
    }else{
        setcookie('ges_cookie_notif','unnotified',time()+30*24*60*60,'/');
        return false;
    }
}

if (isset($_POST['offernotif'])){
    setcookie('offernotif','notified',time()+30*24*60*60,'/');
}


if (isset($_POST['login_btn'])) {
	login();
}
function sendQuickMail($recipient, $Heading, $Body)
{
    $mailErr = "";
    $mail = new PHPMailer;
    //$mail->SMTPDebug = 4;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'elijah.michaelson.it@gmail.com';                 // SMTP username
    $mail->Password = '0788237478';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to

    $mail->setFrom('noreply@' . $_SERVER['SERVER_NAME'], 'HR| ' . $_SERVER['SERVER_NAME']);
    $mail->addAddress($recipient, 'Writer');     // Add a recipient
    // Name is optional
    $mail->addReplyTo('support@mywriter.epizy.com.com', 'Support');
    // Add attachments
    $mail->addAttachment('../../images/icon_admin.png', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = $Heading;
    $mail->Body = $Body;
    //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if (!$mail->send()) {
        $mail = 'Message could not be sent: ';
        return false;
    } else {
        $mailErr = 'Message has been sent';
        return true;
    }
}
function addNotification($target,$heading,$message,$sender_id){
    $conn=getConnection();
    $sql = "INSERT INTO `notification` (`message`, `state`, `sender`, `target`, `heading`, `notif_id`,`time`) VALUES ('$message', 'unread', '$sender_id', '$target', '$heading', NULL,CURRENT_TIMESTAMP )";

    $conn->query($sql) or die($conn->error);
}
function upload(){
    global $errors,$query,$email,$comments,$name,$subId,$title,$db;
$currentDir = getcwd();
    $uploadDirectory = "../uploads/";
    $email    =  e($_POST['email']);
    $title   =  e($_POST['title']);
    $comments=e($_POST['comments']);
    $name=ucfirst($_SESSION['user']['username']);

    $errors =array();

    $fileExtensions = ['doc','docx','pdf','pptx']; // Get all the file extensions

    $fileName = $_FILES['myfile']['name'];
    $fileSize = $_FILES['myfile']['size'];
    $fileTmpName  = $_FILES['myfile']['tmp_name'];
    $fileType = $_FILES['myfile']['type'];
    $tmp = explode('.', $fileName);
    $file_extension = end($tmp);
    $fileExtension = strtolower(end($tmp));

    $subId = rand () ;


    $uploadPath = $currentDir.$uploadDirectory.basename($fileName);
if (! in_array($fileExtension,$fileExtensions)) {

            array_push($errors, "This file extension is not allowed. Please upload a .doc ,.docx ,.pdf or .pptx file");
        }
    if ($fileSize > 8000000) {

        array_push($errors, "This file is more than 8MB. Sorry, it has to be less than or equal to 8MB");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }

    if (empty($comments)) {
        array_push($errors, "Please enter a message");
    }
    if (empty($comments)) {
        array_push($errors, "Please enter a message");
    }

        if (count($errors) == 0) {
            $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

            if ($didUpload) {
                $query="INSERT INTO submissions(subID,username,dte,email,title,comments,feedback)VALUES('$subId','$name',CURRENT_TIMESTAMP ,'$email','$fileName','$comments','');";
                $db->query($query);
                echo "The file " . basename($title) . " has been uploaded";
                header('location: success.html');
            } else {
                echo "An error occurred somewhere. Try again or contact the admin";
            }
        }

}
function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}
// REGISTER USER
function getUserById($table,$id){

	global $db;
    $table_name=mysqli_real_escape_string($db,$table);
    $uId=mysqli_real_escape_string($db,$id);
	$query = "SELECT * FROM $table_name WHERE id=$uId";
    $result = mysqli_query($db, $query);
    if ($result->num_rows>0) {
        return mysqli_fetch_assoc($result);
    }else{
        return false;
    }
    function isVerified($id){
        $id=mysqli_real_escape_string($id);
        $db=getConnection();

      $resultse=  $db->query("SELECT v.verified_at as verified, w.lname as lastname from writers as w inner join verifier v on w.writer_id = v.writer_id where w.writer_id={$id}");
if(!$resultse==null){
    while($reow=$resultse->fetch_assoc()){
        if (!$reow['verified']==null) {

            return true;
        }
        else{return  false;}
    }

}else{
        return false;}
    }
	
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}
function isLoggedIn()
{
    
	if ($_SESSION['login']) {
	    return true;
    }
        else{
	        return false;
        }
	
	
}

// LOGIN USER
function login(){
	global $db, $username, $errors;

	// grab form values
	$username = e($_POST['username']);
	$password = md5(e($_POST['password']));

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
	    setSessions($username,$password);
	}
}

function registerOrder(){

    global $errors,$query,$order_id,$title,$pages,$duedate,$order_total,$comments,$db,$additional_files,$format;
    $order_attributes=unserialize($_COOKIE['ordatrrs']);
    $currentDir = getcwd();
    $uploadDirectory = "../uploads/orders/attachments";
    $level    =  $order_attributes['level'];
    $title   =  $order_attributes[''];
    $pages=e($_GET['calc4']);
    $duedate=$order_attributes['due'];
    $order_total=substr($order_attributes['price'],1);
    $desc=$order_attributes['description'];
    $name=$order_attributes['name'];
    $email=$order_attributes['email'];
    


    $errors =array();

    $fileExtensions = ['doc','docx','pdf','pptx']; // Get all the file extensions

    $fileName = $_FILES['myfile']['name'];
    $fileSize = $_FILES['myfile']['size'];
    $fileTmpName  = $_FILES['myfile']['tmp_name'];
    $fileType = $_FILES['myfile']['type'];
    $tmp = explode('.', $fileName);
    $file_extension = end($tmp);
    $fileExtension = strtolower(end($tmp));

    $order_id = rand () ;


    $uploadPath = $currentDir.$uploadDirectory.basename($fileName);
    if (! in_array($fileExtension,$fileExtensions)) {

        array_push($errors, "This file extension is not allowed. Please upload a .doc ,.docx ,.pdf or .ppt file");
    }
    if ($fileSize > 8000000) {

        array_push($errors, "This file is more than 8MB. Sorry, it has to be less than or equal to 8MB");
    }
    if (empty($email)) {
        array_push($errors, "Email is required");
    }
    if (empty($title)) {
        array_push($errors, "Please  enter a title for your submission");
    }
    if (empty($comments)) {
        array_push($errors, "Please enter a message");
    }
    if (empty($comments)) {
        array_push($errors, "Please enter a message");
    }

    if (count($errors) == 0) {
        $didUpload = move_uploaded_file($fileTmpName, $uploadPath);

        if ($didUpload) {
            $query="INSERT INTO orders(order_id,username,title,pages,start_date,due_date,order_total,descri,add_files)
values('$order_id','{$name}','{$title}', 'format',{$pages}',CURRENT_TIMESTAMP ,'{$duedate}','{$order_total}','{$comments}','{$fileName}');";
            $db->query($query);
            echo "The file " . basename($title) . " has been uploaded";
            header('location: success.html');
        } else {
            echo "An error occurred somewhere. Try again or contact the admin";
        }
    }

}
function getSubjects(){global $db;
$data=array();
$sql="Select name from tbl_subjects where status='Active'";
$result=$db->query($sql);
  while ($row=$result->fetch_assoc()){
      array_push($data,$row['name']);
  }
return $data;
}
function getUiversitites(){

    global $db;
    $data=array();
    $sql="Select b.name as name from countries as a inner join linkedin_universities as b on b.country_id=a.id ";
    echo "<script>console.log(\"".$sql."\");</script>";
    $result=$db->query($sql);
    while ($row=$result->fetch_assoc()){
        array_push($data,$row['name']);

    }
    return $data;
}
function getCategories(){
    global $db;
    $data=array();
    $sql='Select category from tbl_subjects';
    $result=$db->query($sql);
    while ($row=$result->fetch_assoc()){
        array_push($data,$row['category']);
    }
    return $data;
}

function isAdmin()
{
	if (isset($_SESSION['user_type']) && $_SESSION['user_type'] == 'admin' ) {
		return true;
	}elseif(isset($_SESSION['role']) && $_SESSION['role'] == 'admin'){
		return true;
	}else{
return false;
}
}
