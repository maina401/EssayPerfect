<?php
include $_SERVER['DOCUMENT_ROOT']."/writer/new/pages/authentication.php";
error_reporting(5);
$randomHash=$_GET['Oauth2A'];
$email=$_GET['email'];
$verification=" SELECT TIMESTAMPDIFF(HOUR,CURRENT_TIMESTAMP,reg_date) as expire FROM writers WHERE pass='".$randomHash."';";
$conn=getConnection();
$result=$conn->query($verification) or  die($conn->error);
if($result->num_rows>0){
while ($row=$result->fetch_assoc()){

    $status=$row['expire'];
    if ($status>='0'){

        $verification="UPDATE writers set acc_state='probation' where pass='".$randomHash."'";
if(!$conn->query($verification)){
    echo "<!DOCTYPE html>
        <html>
        <title>Verification Failed</title>
        <meta http-equiv='refresh' content='1;url=/writer/new/index.php?err=5tfi'>
        <body>
        <p></p>
</body>
</html>";
}
$conn->query($verification);
if(setSessions($email,$randomHash)){

};

    }
    else{
        echo "<!DOCTYPE html>
        <html>
        <title>Verification Failed</title>
        <meta http-equiv='refresh' content='1;url=/writer/new/?err=t6y78i9'>
        <body>
        <p></p>
</body>
</html>";

    }
}}
else{
    echo "<!DOCTYPE html>
        <html>
        <title>Verification Failed</title>
        <meta http-equiv='refresh' content='1;url=/errors/404.php'>
        <body>
        <p></p>
</body>
</html>";
}
