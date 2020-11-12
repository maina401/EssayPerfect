<?php
session_start();
error_reporting(0);
include $_SERVER['DOCUMENT_ROOT'] . '/functions/configurations.php';
function setSessions($username, $password){
    session_destroy();

    global $privillege;
    $privillege = 'accounts';
    $conn = getConnection();
    $myusername = mysqli_real_escape_string($conn, $username);
    $mypassword = $password;

    $sql = "SELECT writers.* FROM writers WHERE writers.email_address='$myusername' AND writers.pass= '$mypassword';";
    $sql2 = "SELECT clients.* FROM clients WHERE clients.email_address= '$myusername' AND clients.pass= '$mypassword';";
    $sql3 = "SELECT staff.* FROM staff WHERE staff.email_address= '$myusername' AND staff.pass= '$mypassword';";
    $sql4 = "SELECT users.* FROM users WHERE users.email= '$myusername' OR users.username='$myusername' AND users.password= '$mypassword';";
    $result = $conn->query($sql);

//    OR (staff.staff_id = '$myusername' OR staff.email_address= '$myusername' AND staff.pass= '$mypassword')
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            session_start();
            $_SESSION['my_id'] = $row['writer_id'];
            $_SESSION['array']=$row;
            $_SESSION['privillege'] = 'writer';
            $privillege = 'writer';
            $_SESSION['login'] = true;
            $_SESSION['first_name'] = $row['Fname'];
            $_SESSION['last_name'] = $row['Lname'];
            $_SESSION['gender'] = $row['gender'];
            $_SESSION['ip_address'] = $row['ip_address'];
            $_SESSION['address'] = $row['nationality'];
            $_SESSION['email_address'] = $row['email_address'];
            $_SESSION['phone'] = $row['phone'];

            $_SESSION['role'] = 'writer';
            $_SESSION['dob']=$row['date of birth'];
            $_SESSION['avatar'] = $row['profile_pic'];
            setcookie('avatar', $row['profile_pic'], time() + 10 * 24 * 60 * 60, '/');
            setcookie('ckid',$row['writer_id'],time()+60*60,'/');
            setcookie('ifimafalofo',$row['email_address'],time()+60*60,'/');
            $_SESSION['user'] = $row['username'];
            $_SESSION['wallet'] = $row['wallet'];
            $_SESSION['rating'] = $row['rating'];
            $_SESSION['mycategory'] = $row['subject1'];
            $_SESSION['acc_state']=$row['acc_state'];

            if($row['acc_state']=='pending') {
                setcookie('lgist','0',time()+60*10,'/');
                header("location:/errors/pending.html");
            }elseif ($row['acc_state']=='suspended'){
                setcookie('lgist','0',time()+60*10,'/');
                header("location:/errors/403.html");
            }elseif ($row['acc_state']=='blocked'){
                setcookie('lgist','0',time()+60*10,'/');
                header("location:/errors/403.html");
            }
            elseif ($row['acc_state']=='probation'){
                setcookie('lgist','0',time()+60*10,'/');
                header("location:/Accounts/new/Writer_profile.php");
            }
            elseif ($row['acc_state']=='active'){
                setcookie('lgist','2',time()+60*10,'/');
                header("location:/writer/new/writer/");
            }
            elseif ($row['acc_state']=='evaluation'){
                setcookie('lgist','2',time()+60*10,'/');
                header("location:/writer/new/writer/take-assessment.php");
            }
            else{
                setcookie('lgist','1',time()+60*10,'/');
                header("location:/errors/404.php");
            }

return true;
        }
        $result->free();
        return true;} else {
        $result2 = $conn->query($sql2);
        if ($result2->num_rows > 0) {
            session_start();
            $privillege = 'staff';
            while ($row = $result2->fetch_assoc()) {

                $_SESSION['login'] = true;
                $_SESSION['first_name'] = $row['Fname'];
                $_SESSION['last_name'] = $row['Lname'];
                $_SESSION['gender'] = $row['gender'];
                $_SESSION['ip_address'] = $row['ip_address'];
                $_SESSION['address'] = $row['nationality'];
                $_SESSION['email_address'] = $row['email_address'];
                setcookie('lpk_8h2',$row['email_address'],time()+60*60,'/');
                $_SESSION['phone'] = $row['phone'];

                    $_SESSION['role'] = 'client';

                $_SESSION['avatar'] = $row['profile_pic'];
                setcookie('avatar', $row['profile_pic'], time() + 10 * 24 * 60 * 60, '/');
                $_SESSION['my_id'] = $row['writer_id'];
                $_SESSION['user'] = $row['username'];
                $_SESSION['wallet'] = $row['wallet'];
                $_SESSION['rating'] = $row['rating'];

                $accstat = $row['acc_state'];
                if ($accstat == "Active") {
                    setcookie('lgist','0',time()+60*10,'/');
                    header("location:../?rp=5732");
                } else {
                    setcookie('lgist','1',time()+60*10,'/');
                    $location = strtolower($row['role']);
                    header("location:/errors/");
                }

            }
            return true;
            return true;} else {
            $result3 = $conn->query($sql3);
            if ($result3->num_rows > 0) {
                while ($row = $result3->fetch_assoc()) {
                    session_start();
                    $_SESSION['login'] = true;
                    $_SESSION['first_name'] = $row['Fname'];
                    $_SESSION['last_name'] = $row['Lname'];
                    $_SESSION['gender'] = $row['gender'];
                    $_SESSION['ip_address'] = $row['ip_address'];
                    $_SESSION['address'] = $row['nationality'];
                    $_SESSION['email_address'] = $row['email_address'];
                    $_SESSION['phone'] = $row['phone'];
                    if (isAdmin()) {
                        $_SESSION['role'] = 'admin';
                    } else {
                        $_SESSION['role'] = 'accounts';
                    }
                    $_SESSION['avatar'] = $row['profile_pic'];
                    setcookie('avatar', $row['profile_pic'], time() + 10 * 24 * 60 * 60, '/');
                    $_SESSION['my_id'] = $row['writer_id'];
                    $_SESSION['user'] = $row['username'];
                    $_SESSION['wallet'] = $row['wallet'];
                    $_SESSION['rating'] = $row['rating'];
                    return true;
                    $accstat = $row['acc_state'];
                    if ($accstat == "Active") {
                        header("location:../?rp=5732");
                    } else {
                        $location = strtolower($row['role']);
                        header("location:/Home");
                    }

                }
                return true;} else {
                $result4 = $conn->query($sql4);
                if ($result4->num_rows > 0) {
                    while ($row = $result4->fetch_assoc()) {
                        session_start();

                        $_SESSION['login'] = true;
                        $_SESSION['first_name'] = 'Admin';
                        $_SESSION['last_name'] = "Admin";
                        $_SESSION['gender'] = "Male";
                        $_SESSION['ip_address'] = '1234566';
                        $_SESSION['address'] = 'Admin Does not need to set address';
                        $_SESSION['email_address'] = 'admin@thissite.com';
                        $_SESSION['phone'] = '254740283090';
                        $_SESSION['role'] = 'admin';
                        $_SESSION['user_type'] = 'admin';
                        $_SESSION['avatar'] = $row['profile_pic'];
                        setcookie('avatar', $row['profile_pic'], time() + 10 * 24 * 60 * 60, '/');
                        $_SESSION['my_id'] = 'Admin';
                        $_SESSION['user'] = $row['username'];
                        $_SESSION['wallet'] = $row['wallet'];
                        $_SESSION['rating'] = "5";
                        $accstat = 'active';
                        if (!$accstat == "active") {
                            $_SESSION['msg'] = 'Account disabled. Please contact admin';
                            header("location:../?rp=5732");
                        } else {

                            header("location:/admin/dashboard.php");
                        }

                    }
                    return true;} else {
                    return false;
                    header("location:../accounts?rp=0912");
                }

            }
        }
    }
}



