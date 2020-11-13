<?php
include $_SERVER['DOCUMENT_ROOT']."/writer/new/pages/authentication.php";
error_reporting(5);
$randomHash=$_GET['Oauth2A'];
$email=$_GET['email'];
$verification=" SELECT TIMESTAMPDIFF(HOUR,CURRENT_TIMESTAMP,writer.reg_date)as expire,v.writer_id as writerid 
 FROM writers as writer 
     inner join verifier as v 
 on v.writer_id=writer.writer_id 
 WHERE v.email_address={$email} and v.verification_hash='".$randomHash."';";
$conn=getConnection();
$result=$conn->query($verification) or  die($conn->error);
if($result->num_rows>0){
while ($row=$result->fetch_assoc()){

    $status=$row['expire'];
    if ($status>='0'){
        $writer_id=$row['writerid'];

        $verification="UPDATE verifier,writers set writers.acc_state='probation', verifier.verified_at=CURRENT_TIMESTAMP
where writers.writer_id=verifier.writer_id and verifier.writer_id={$writer_id} and verifier.verification_hash='".$randomHash."'";
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
