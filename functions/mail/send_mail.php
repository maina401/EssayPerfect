<?php

include "../template.php";
if (!isset($_COOKIE['ckid'])) {
    echo '<meta http-equiv="refresh" content="0;url=/writer/new/writer/profile.php?vghbnjkm92">';

}

$formid = $_POST['formID'];
$formId = $_GET['formid'];
$conn = getConnection();
//'.$baseURL.'/functions/send_mail.php?pt167=reset&OaAth2Qa='
//.$randomHash.'&email='.$email.'&ht80='.$newPass.'
if (isset($_GET['pt167']) && $_GET['pt167'] == 'reset') {
    $email = $_GET['email'];
    $randomHash = $_GET['OaAth2Qa'];
    $newPass = $_GET['ht80'];
    $sql = "UPDATE writers SET pass='$newPass' where email_address='$email' and pass='$randomHash'";
    $conn->query($sql) or die($conn->error);
    if ($conn->affected_rows > 1) {
        echo '<meta http-equiv="refresh" content="0;url=/writer/new/writer/profile.php?rtoli92=true">';
    } else {
        echo '<meta http-equiv="refresh" content="0;url=/writer/new/writer/profile.php?rtoli92=false">';

    }

}//vghbnjkm92
if (isset($_GET['formid']) && $_GET['formid'] == "vghbnjkm92") {
    $exts = ['png', 'jpg', 'jpeg', 'gif'];
    $updated = uploadFile('imageProfile', $_COOKIE['ckid'], $exts, '/uploads/profiles/', 'profile photo');
    if ($updated) {
        echo '<meta http-equiv="refresh" content="0;url=/writer/new/writer/profile.php?vghbnjkm92=true">';

    } else {
        echo '<meta http-equiv="refresh" content="0;url=/writer/new/writer/profile.php?vghbnjkm92=false">';

    }
}
if (!empty($formid) && $formid == "200470427093550") {
    $writer_id = $_COOKIE['ckid'];

    if (empty($writer_id)) {

        header("location:/errors/expiredsession.html");
    } else {
        if (empty($writer_id)) {
            header("location:/logout/");
        } else {
            updateWriter($writer_id);

        }
    }
}
if ($formId == 'rdxtfcygv567') {
    if (!isset($_COOKIE['ckid']) | empty($_COOKIE['ckid'])) {
        echo '<meta http-equiv="refresh" content="0;url=/logout">';
    }
    $email = $_COOKIE['ifimafalofo'];

    $newPass = md5($_POST['pass1']);
    $randomHash = md5(rand(1000000, 10000000));
    $heading = 'Reset Password Instructions';
    $baseURL = $_SERVER['SERVER_NAME'];

    $body = '<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<style type="text/css">
	/* FONTS */
    @media screen {
		@font-face {
		  font-family: \'Lato\';
		  font-style: normal;
		  font-weight: 400;
		  src: local(\'Lato Regular\'), local(\'Lato-Regular\'), url(https://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format(\'woff\');
		}
		
		@font-face {
		  font-family: \'Lato\';
		  font-style: normal;
		  font-weight: 700;
		  src: local(\'Lato Bold\'), local(\'Lato-Bold\'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format(\'woff\');
		}
		
		@font-face {
		  font-family: \'Lato\';
		  font-style: italic;
		  font-weight: 400;
		  src: local(\'Lato Italic\'), local(\'Lato-Italic\'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format(\'woff\');
		}
		
		@font-face {
		  font-family: \'Lato\';
		  font-style: italic;
		  font-weight: 700;
		  src: local(\'Lato Bold Italic\'), local(\'Lato-BoldItalic\'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format(\'woff\');
		}
    }
    
    /* CLIENT-SPECIFIC STYLES */
    body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
    table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
    img { -ms-interpolation-mode: bicubic; }

    /* RESET STYLES */
    img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
    table { border-collapse: collapse !important; }
    body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }

    /* iOS BLUE LINKS */
    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }

    /* ANDROID CENTER FIX */
    div[style*="margin: 16px 0;"] { margin: 0 !important; }
</style>
</head>
<body style="background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;">

<!-- HIDDEN PREHEADER TEXT -->
<div style="display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: \'Lato\', Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;">
    You requested a password reset. 
</div>

<table border="0" cellpadding="0" cellspacing="0" width="100%">
    <!-- LOGO -->
    <tr>
        <td bgcolor="#7c72dc" align="center">
            <table border="0" cellpadding="0" cellspacing="0" width="480" >
                <tr>
                    <td align="center" valign="top" style="padding: 40px 10px 40px 10px;">
                        <a href="' . $baseURL . '" target="_blank">
                            
                        </a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <!-- HERO -->
    <tr>
        <td bgcolor="#7c72dc" align="center" style="padding: 0px 10px 0px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="480" >
                <tr>
                    <td bgcolor="#ffffff" align="center" valign="top" style="padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: \'Lato\', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;">
                      <h1 style="font-size: 32px; font-weight: 400; margin: 0;">Trouble signing in?</h1>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <!-- COPY BLOCK -->
    <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="480" >
              <!-- COPY -->
              <tr>
                <td bgcolor="#ffffff" align="left" style="padding: 20px 30px 40px 30px; color: #666666; font-family: \'Lato\', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
                  <p style="margin: 0;">You requested a password reset. Once we receive a reset request,Our system automatically resets the password. This means that you might experience dificulties using your old password. Resetting your password is easy. Just press the button below and follow the instructions. We\'ll have you up and running in no time. </p>
                </td>
              </tr>
              <!-- BULLETPROOF BUTTON -->
              <tr>
                <td bgcolor="#ffffff" align="left">
                  <table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td bgcolor="#ffffff" align="center" style="padding: 20px 30px 60px 30px;">
                        <table border="0" cellspacing="0" cellpadding="0">
                          <tr>
                              <td align="center" style="border-radius: 3px;" bgcolor="#7c72dc"><a href="' . $baseURL . '/functions/mail/send_mail.php?pt167=reset&OaAth2Qa=' . $randomHash . '&email=' . $email . '&ht80=' . $newPass . '" target="_blank" style="font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #7c72dc; display: inline-block;">Reset Password</a></td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
        </td>
    </tr>
    <!-- COPY CALLOUT -->
    <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="480" >
                <!-- HEADLINE -->
                <tr>
                  <td bgcolor="#111111" align="left" style="padding: 40px 30px 20px 30px; color: #ffffff; font-family: \'Lato\', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
                    <h2 style="font-size: 24px; font-weight: 400; margin: 0;">Unable to click on the button above?</h2>
                  </td>
                </tr>
                <!-- COPY -->
                <tr>
                  <td bgcolor="#111111" align="left" style="padding: 0px 30px 20px 30px; color: #666666; font-family: \'Lato\', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
                    <p style="margin: 0;">Click on the link below or copy/paste in the address bar.</p>
                  </td>
                </tr>
                <!-- COPY -->
                <tr>
                  <td bgcolor="#111111" align="left" style="padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: \'Lato\', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;" >
                    <p style="margin: 0;"><a href="' . $baseURL . '/functions/mail/send_mail.php?pt167=reset&OaAth2Qa=' . $randomHash . '&email=' . $email . '&ht80=' . $newPass . '" target="_blank" style="color: #7c72dc;">See how easy it is to get started</a></p>
                  </td>
                </tr>
            </table>
        </td>
    </tr>

    <!-- FOOTER -->
    <tr>
        <td bgcolor="#f4f4f4" align="center" style="padding: 0px 10px 0px 10px;">
            <table border="0" cellpadding="0" cellspacing="0" width="480" >
              
              <!-- PERMISSION REMINDER -->
              <tr>
                <td bgcolor="#f4f4f4" align="left" style="padding: 0px 30px 30px 30px; color: #666666; font-family: \'Lato\', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;" >
                  <p style="margin: 0;">You received this email because you requested a password reset. If you did not, <a href="' . $baseURL . '/chat/index.php" target="_blank" style="color: #111111; font-weight: 700;">please contact us.</a>.</p>
                </td>
              </tr>
              
              <!-- ADDRESS -->
              <tr>
                <td bgcolor="#f4f4f4" align="left" style="padding: 0px 30px 30px 30px; color: #666666; font-family: \'Lato\', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;" >
                  <p style="margin: 0;">185, Jiraeul-ro, Jijeong-myeon, Wonju-si, Gangwon-do</p>
                </td>
              </tr>
            </table>
        </td>
    </tr>
</table>

</body>
</html>';
    $wasReset = sendQuickMail($email, $heading, $body);
    if ($wasReset) {
        $sql = "UPDATE writers set pass='$randomHash' where writer_id=$writer_id";
        $conn->query($sql) or die($conn->error);
        echo 'UPDATED!!!!';
        header('location:' . $_SERVER['HTTP_REFERER'] . '?rtoli92=true');
    } else {
        echo 'NOT UPDATED!!!!';
    }

}
function updateWriter($writer_id)
{

    $subjects = $_POST['q97_subjects'];
    $subject1 = $subjects[1];
    $subject2 = $subjects[2];
    $subject3 = $subjects[3];
    $formatting = $_POST['q105_formatingStyles'];
    $formatting1 = $formatting[1];
    $formatting2 = $formatting[0];
    $formatting3 = $formatting[3];
    $address = $_POST['q3_enterYour'];
    $bio = $_POST['q53_skills'];
    $dobMonth = $_POST['q101_yourDate']['month'];
    $dobDay = $_POST['q101_yourDate']['day'];
    $dobYear = $_POST['q101_yourDate']['year'];
    $gender = $_POST['q107_gender'];
    $countrycode = $_POST['q3_yourPhone']['country'];
    $areacode = $_POST['q3_yourPhone']['area'];
    $phonecode = $_POST['q3_yourPhone']['phone'];
    $dob = $dobDay . '-' . $dobMonth . '-' . $dobYear;
    $phone = $countrycode . '-' . $areacode . '-' . $phonecode;
    $University = $_POST['q3_universityAttended'];
    $exts = ['png', 'jpg', 'jpeg', 'gif', 'pdf'];
    $Verific_pic = uploadFile('q3_input3', $writer_id, $exts, '/uploads/IDs/', 'ID');
    $rexts = ['docx', 'doc', 'pdf'];
    $degree = uploadFile('q3_uploadDegree', $writer_id, $rexts, '/uploads/degrees/', 'degree');
    $rexts = ['docx', 'doc', 'pdf'];
    $resume = uploadFile('q8_resume', $writer_id, $rexts, '/uploads/resumes/', 'resume');
    $exts = ['png', 'jpg', 'jpeg', 'gif'];
    $profile_pic = uploadFile('mypic', $writer_id, $exts, '/uploads/profiles/', 'photo');
    $pass = md5($_POST['q3_yourPassword']);
    $pass2 = md5($_POST['q5_confirmPassword']);
    $fname = $_POST['q4_name']['first'];
    $lname = $_POST['q4_name']['last'];
    if (!$pass == $pass2) {
        $errType = 'Password Do not match!!';
        echo '<meta http-equiv="refresh" content="0;url=' . $_SERVER['HTTP_REFERER'] . '?err=602&type=' . $errType . '">';

    }
    if (empty($subject1)) {
        echo '<meta http-equiv="refresh" content="0;url=' . $_SERVER['HTTP_REFERER'] . '?err=7683&type=' . $errType . '">';
    }
    if (empty($subject2)) {
        echo '<meta http-equiv="refresh" content="0;url=' . $_SERVER['HTTP_REFERER'] . '?err=7682&type=' . $errType . '">';
    }
    if (empty($formatting1)) {
        echo '<meta http-equiv="refresh" content="0;url=' . $_SERVER['HTTP_REFERER'] . '?err=9587&type=' . $errType . '">';
    }
    if (empty($formatting2)) {
        echo '<meta http-equiv="refresh" content="0;url=' . $_SERVER['HTTP_REFERER'] . '?err=5803&type=' . $errType . '">';
    }
    if (empty($address)) {
        echo '<meta http-equiv="refresh" content="0;url=' . $_SERVER['HTTP_REFERER'] . '?err=4975&type=' . $errType . '">';
    }
    if (empty($bio)) {
        echo '<meta http-equiv="refresh" content="0;url=' . $_SERVER['HTTP_REFERER'] . '?err=5438&type=' . $errType . '">';
    }
    if (empty($gender)) {
        echo '<meta http-equiv="refresh" content="0;url=' . $_SERVER['HTTP_REFERER'] . '?err=2983&type=' . $errType . '">';
    }
    if (empty($University)) {
        echo '<meta http-equiv="refresh" content="0;url=' . $_SERVER['HTTP_REFERER'] . '?err=4939&type=' . $errType . '">';
    }
    if (empty($dob)) {
        echo '<meta http-equiv="refresh" content="0;url=' . $_SERVER['HTTP_REFERER'] . '?err=1294&type=' . $errType . '">';
    }
    if (empty($Verific_pic)) {
        echo '<meta http-equiv="refresh" content="0;url=' . $_SERVER['HTTP_REFERER'] . '?err=2394&type=' . $errType . '">';
    }
    if (empty($degree)) {
        echo '<meta http-equiv="refresh" content="0;url=' . $_SERVER['HTTP_REFERER'] . '?err=602&type=' . $errType . '">';
    }
    if (empty($profile_pic)) {
        echo '<meta http-equiv="refresh" content="0;url=' . $_SERVER['HTTP_REFERER'] . '?err=3399&type=' . $errType . '">';
    } else {
        //`Fname` = 'James', `Lname` = 'senko', `nationality` = 'ke', `ip_address` = '3279943',
        $sql = "UPDATE `writers` SET  `phone` = '" . $phone . "', profile_pic='$profile_pic', acc_state='evaluation',`national_id` = '" . $Verific_pic . "', `cert` = '" . $degree . "', `subject1` = '" . $subject1 . "', `subject2` = '" . $subject2 . "', `subject3` = '" . $subject3 . "', `format1` = '" . $formatting1 . "', `format2` = '" . $formatting2 . "', `format3` = '" . $formatting3 . "', `address` = '" . $address . "', `date of birth` = '" . $dob . "', `univesity` = '$University', `resume` = '$resume', Fname='$fname',Lname='$lname', pass='$pass2' WHERE `writers`.`writer_id` =$writer_id";
        $conn = getConnection();
        $update = $conn->query($sql) or die($conn->error);
        if ($update) {
            $result = $conn->query('SELECT email_address as email FROM  writers WHERE writer_id=' . $writer_id);
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $email = $row['email'];
                $heading = 'Second Step complete. What\'s Next?';
                $body = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html style="width:100%;font-family:lato, \'helvetica neue\', helvetica, arial, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0;">
 <head> 
  <meta charset="UTF-8"> 
  <meta content="width=device-width, initial-scale=1" name="viewport"> 
  <meta name="x-apple-disable-message-reformatting"> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
  <meta content="telephone=no" name="format-detection"> 
  
  <style type="text/css">
@media only screen and (max-width:600px) {p, ul li, ol li, a { font-size:16px!important; line-height:150%!important } h1 { font-size:30px!important; text-align:center; line-height:120%!important } h2 { font-size:26px!important; text-align:center; line-height:120%!important } h3 { font-size:20px!important; text-align:center; line-height:120%!important } h1 a { font-size:30px!important } h2 a { font-size:26px!important } h3 a { font-size:20px!important } .es-menu td a { font-size:16px!important } .es-header-body p, .es-header-body ul li, .es-header-body ol li, .es-header-body a { font-size:16px!important } .es-footer-body p, .es-footer-body ul li, .es-footer-body ol li, .es-footer-body a { font-size:16px!important } .es-infoblock p, .es-infoblock ul li, .es-infoblock ol li, .es-infoblock a { font-size:12px!important } *[class="gmail-fix"] { display:none!important } .es-m-txt-c, .es-m-txt-c h1, .es-m-txt-c h2, .es-m-txt-c h3 { text-align:center!important } .es-m-txt-r, .es-m-txt-r h1, .es-m-txt-r h2, .es-m-txt-r h3 { text-align:right!important } .es-m-txt-l, .es-m-txt-l h1, .es-m-txt-l h2, .es-m-txt-l h3 { text-align:left!important } .es-m-txt-r img, .es-m-txt-c img, .es-m-txt-l img { display:inline!important } .es-button-border { display:block!important } a.es-button { font-size:20px!important; display:block!important; border-width:15px 25px 15px 25px!important } .es-btn-fw { border-width:10px 0px!important; text-align:center!important } .es-adaptive table, .es-btn-fw, .es-btn-fw-brdr, .es-left, .es-right { width:100%!important } .es-content table, .es-header table, .es-footer table, .es-content, .es-footer, .es-header { width:100%!important; max-width:600px!important } .es-adapt-td { display:block!important; width:100%!important } .adapt-img { width:100%!important; height:auto!important } .es-m-p0 { padding:0px!important } .es-m-p0r { padding-right:0px!important } .es-m-p0l { padding-left:0px!important } .es-m-p0t { padding-top:0px!important } .es-m-p0b { padding-bottom:0!important } .es-m-p20b { padding-bottom:20px!important } .es-mobile-hidden, .es-hidden { display:none!important } .es-desk-hidden { display:table-row!important; width:auto!important; overflow:visible!important; float:none!important; max-height:inherit!important; line-height:inherit!important } .es-desk-menu-hidden { display:table-cell!important } table.es-table-not-adapt, .esd-block-html table { width:auto!important } table.es-social { display:inline-block!important } table.es-social td { display:inline-block!important } }
#outlook a {
	padding:0;
}
.ExternalClass {
	width:100%;
}
.ExternalClass,
.ExternalClass p,
.ExternalClass span,
.ExternalClass font,
.ExternalClass td,
.ExternalClass div {
	line-height:100%;
}
.es-button {
	mso-style-priority:100!important;
	text-decoration:none!important;
}
a[x-apple-data-detectors] {
	color:inherit!important;
	text-decoration:none!important;
	font-size:inherit!important;
	font-family:inherit!important;
	font-weight:inherit!important;
	line-height:inherit!important;
}
.es-desk-hidden {
	display:none;
	float:left;
	overflow:hidden;
	width:0;
	max-height:0;
	line-height:0;
	mso-hide:all;
}
</style> 
 </head> 
 <body style="width:100%;font-family:lato, \'helvetica neue\', helvetica, arial, sans-serif;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;padding:0;Margin:0;"> 
  <div class="es-wrapper-color" style="background-color:#F4F4F4;"> 
   <!--[if gte mso 9]>
			<v:background xmlns:v="urn:schemas-microsoft-com:vml" fill="t">
				<v:fill type="tile" color="#f4f4f4"></v:fill>
			</v:background>
		<![endif]--> 
   <table class="es-wrapper" width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top;"> 
     <tr class="gmail-fix" height="0" style="border-collapse:collapse;"> 
      <td style="padding:0;Margin:0;"> 
       <table width="600" cellspacing="0" cellpadding="0" border="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
         <tr style="border-collapse:collapse;"> 
          <td cellpadding="0" cellspacing="0" border="0" style="padding:0;Margin:0;line-height:1px;min-width:600px;" height="0"><img src="https://esputnik.com/repository/applications/images/blank.gif" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;max-height:0px;min-height:0px;min-width:600px;width:600px;" alt width="600" height="1"></td> 
         </tr> 
       </table></td> 
     </tr> 
     <tr style="border-collapse:collapse;"> 
      <td valign="top" style="padding:0;Margin:0;"> 
       <table cellpadding="0" cellspacing="0" class="es-content" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;"> 
         <tr style="border-collapse:collapse;"> 
          <td align="center" style="padding:0;Margin:0;"> 
           <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;" width="600" cellspacing="0" cellpadding="0" align="center"> 
             <tr style="border-collapse:collapse;"> 
              <td align="left" style="Margin:0;padding-left:10px;padding-right:10px;padding-top:15px;padding-bottom:15px;"> 
               <!--[if mso]><table width="580" cellpadding="0" cellspacing="0"><tr><td width="282" valign="top"><![endif]--> 
               <table class="es-left" cellspacing="0" cellpadding="0" align="left" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:left;"> 
                 <tr style="border-collapse:collapse;"> 
                  <td width="282" align="left" style="padding:0;Margin:0;"> 
                   <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                     <tr style="border-collapse:collapse;"> 
                      <td class="es-infoblock es-m-txt-c" align="left" style="padding:0;Margin:0;line-height:14px;font-size:12px;color:#CCCCCC;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:12px;font-family:arial, \'helvetica neue\', helvetica, sans-serif;line-height:14px;color:#CCCCCC;">HR |</p></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table> 
               <!--[if mso]></td><td width="20"></td><td width="278" valign="top"><![endif]--> 
               <table class="es-right" cellspacing="0" cellpadding="0" align="right" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;float:right;"> 
                 <tr style="border-collapse:collapse;"> 
                  <td width="278" align="left" style="padding:0;Margin:0;"> 
                   <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                     <tr style="border-collapse:collapse;"> 
                      <td align="center" style="padding:0;Margin:0;display:none;"></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table> 
               <!--[if mso]></td></tr></table><![endif]--></td> 
             </tr> 
           </table></td> 
         </tr> 
       </table> 
       <table class="es-header" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:#7C72DC;background-repeat:repeat;background-position:center top;"> 
         <tr style="border-collapse:collapse;"> 
          <td style="padding:0;Margin:0;background-color:#7C72DC;" bgcolor="#7c72dc" align="center"> 
           <table class="es-header-body" width="600" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#7C72DC;"> 
             <tr style="border-collapse:collapse;"> 
              <td align="left" style="Margin:0;padding-bottom:10px;padding-left:10px;padding-right:10px;padding-top:20px;"> 
               <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                 <tr style="border-collapse:collapse;"> 
                  <td width="580" valign="top" align="center" style="padding:0;Margin:0;"> 
                   <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                     <tr style="border-collapse:collapse;"> 
                      <td align="center" style="Margin:0;padding-left:10px;padding-right:10px;padding-top:25px;padding-bottom:25px;"><img src="https://evsoez.stripocdn.email/content/guids/CABINET_3df254a10a99df5e44cb27b842c2c69e/images/7331519201751184.png" alt style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic;" width="40" height="40"></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table></td> 
             </tr> 
           </table></td> 
         </tr> 
       </table> 
       <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;"> 
         <tr style="border-collapse:collapse;"> 
          <td style="padding:0;Margin:0;background-color:#7C72DC;" bgcolor="#7c72dc" align="center"> 
           <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;" width="600" cellspacing="0" cellpadding="0" align="center"> 
             <tr style="border-collapse:collapse;"> 
              <td align="left" style="padding:0;Margin:0;"> 
               <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                 <tr style="border-collapse:collapse;"> 
                  <td width="600" valign="top" align="center" style="padding:0;Margin:0;"> 
                   <table style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;background-color:#FFFFFF;border-radius:4px;" width="100%" cellspacing="0" cellpadding="0" bgcolor="#ffffff" role="presentation"> 
                     <tr style="border-collapse:collapse;"> 
                      <td align="center" style="Margin:0;padding-bottom:5px;padding-left:30px;padding-right:30px;padding-top:35px;"><h1 style="Margin:0;line-height:58px;mso-line-height-rule:exactly;font-family:lato, \'helvetica neue\', helvetica, arial, sans-serif;font-size:48px;font-style:normal;font-weight:normal;color:#111111;">What\'s Next?</h1></td> 
                     </tr> 
                     <tr style="border-collapse:collapse;"> 
                      <td bgcolor="#ffffff" align="center" style="Margin:0;padding-top:5px;padding-bottom:5px;padding-left:20px;padding-right:20px;"> 
                       <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                         <tr style="border-collapse:collapse;"> 
                          <td style="padding:0;Margin:0px;border-bottom:1px solid #FFFFFF;background:rgba(0, 0, 0, 0) none repeat scroll 0% 0%;height:1px;width:100%;margin:0px;"></td> 
                         </tr> 
                       </table></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table></td> 
             </tr> 
           </table></td> 
         </tr> 
       </table> 
       <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;"> 
         <tr style="border-collapse:collapse;"> 
          <td align="center" style="padding:0;Margin:0;"> 
           <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;" width="600" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center"> 
             <tr style="border-collapse:collapse;"> 
              <td align="left" style="padding:0;Margin:0;"> 
               <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                 <tr style="border-collapse:collapse;"> 
                  <td width="600" valign="top" align="center" style="padding:0;Margin:0;"> 
                   <table style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FFFFFF;" width="100%" cellspacing="0" cellpadding="0" bgcolor="#ffffff" role="presentation"> 
                     <tr style="border-collapse:collapse;"> 
                      <td class="es-m-txt-l" bgcolor="#ffffff" align="left" style="Margin:0;padding-bottom:15px;padding-top:20px;padding-left:30px;padding-right:30px;"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:18px;font-family:lato, \'helvetica neue\', helvetica, arial, sans-serif;line-height:27px;color:#666666;">Dear ' . $fname . ', Congratulations for completing the second step towards earning big from your writing. Our QA department demands that all new members to go through our grammar and essay tests before evaluating their application.&nbsp; To proceed with your registration, click the button below.<br>Please note:<br></p> 
                       <ul> 
                        <li style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:18px;font-family:lato, \'helvetica neue\', helvetica, arial, sans-serif;line-height:27px;Margin-bottom:15px;color:#666666;">Once you click the link, you have exactly 15 minutes to complete the grammar test (20 questions)</li> 
                        <li style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:18px;font-family:lato, \'helvetica neue\', helvetica, arial, sans-serif;line-height:27px;Margin-bottom:15px;color:#666666;">After completing the grammar test, You&nbsp;have&nbsp; 3&nbsp; hrs to deliver your test essay, failure to which our system shall automatically&nbsp; decline your application.</li> 
                        <li style="-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:18px;font-family:lato, \'helvetica neue\', helvetica, arial, sans-serif;line-height:27px;Margin-bottom:15px;color:#666666;">On the first login, we&nbsp; will lock your account to your IP address. This means that you will not be able to log in from any other computer.</li> 
                       </ul><strong>Are you ready? <a href="' . $_SERVER['HTTP_HOST'] . '/accounts/index.php?def=gy7hu8ji9&" target="_blank">LOG IN NOW</a></strong><br></td> 
                     </ul><strong>All these links not working? Don\'t worry. I happens. JuST copy paste this link to your browser ' . $_SERVER['DOCUMENT_ROOT'] . '/accounts/index.php?def=gy7hu8ji9& <a href="' . $_SERVER['SERVER_NAME'] . '/accounts/index.php?def=gy7hu8ji9&" target="_blank">LOG IN NOW</a></strong><br></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table></td> 
             </tr> 
             <tr style="border-collapse:collapse;"> 
              <td align="left" style="padding:0;Margin:0;padding-bottom:20px;padding-left:30px;padding-right:30px;"> 
               <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                 <tr style="border-collapse:collapse;"> 
                  <td width="540" valign="top" align="center" style="padding:0;Margin:0;"> 
                   <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                     <tr style="border-collapse:collapse;"> 
                      <td align="center" style="Margin:0;padding-left:10px;padding-right:10px;padding-top:40px;padding-bottom:40px;"><span class="es-button-border" style="border-style:solid;border-color:#7C72DC;background:#7C72DC;border-width:1px;display:inline-block;border-radius:2px;width:auto;"><a href="' . $_SERVER[' SERVER_NAME'] . '/accounts/index.php?def=gy7hu8ji9&" class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, \'helvetica neue\', arial, verdana, sans-serif;font-size:20px;color:#FFFFFF;border-style:solid;border-color:#7C72DC;border-width:15px 25px 15px 25px;display:inline-block;background:#7C72DC;border-radius:2px;font-weight:normal;font-style:normal;line-height:24px;width:auto;text-align:center;">Log In now</a></span></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table></td> 
             </tr> 
           </table></td> 
         </tr> 
       </table> 
       <table class="es-content" cellspacing="0" cellpadding="0" align="center" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;"> 
         <tr style="border-collapse:collapse;"> 
          <td align="center" style="padding:0;Margin:0;"> 
           <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;" width="600" cellspacing="0" cellpadding="0" align="center"> 
             <tr style="border-collapse:collapse;"> 
              <td align="left" style="padding:0;Margin:0;"> 
               <table width="100%" cellspacing="0" cellpadding="0" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                 <tr style="border-collapse:collapse;"> 
                  <td width="600" valign="top" align="center" style="padding:0;Margin:0;"> 
                   <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                     <tr style="border-collapse:collapse;"> 
                      <td align="center" style="Margin:0;padding-top:10px;padding-bottom:20px;padding-left:20px;padding-right:20px;"> 
                       <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;"> 
                         <tr style="border-collapse:collapse;"> 
                          <td style="padding:0;Margin:0px;border-bottom:1px solid #F4F4F4;background:rgba(0, 0, 0, 0) none repeat scroll 0% 0%;height:1px;width:100%;margin:0px;"></td> 
                         </tr> 
                       </table></td> 
                     </tr> 
                   </table></td> 
                 </tr> 
               </table></td> 
             </tr> 
           </table></td> 
         </tr> 
       </table> 
       </table> 
       </td> 
     </tr> 
   </table> 
  </div>  
 </body>
</html>';
                $sent = sendQuickMail($email, $heading, $body);


                if ($sent) {
                    echo '<meta http-equiv="refresh" content="1;url=' . $_SERVER['DOCUMENT_ROOT'] . '/writers/new/writer/take-assessment.php">';
                }
            }
        } else {
            echo 'Writer not updated!!';
        }
    }
}

function  uploadFile($inputID, $writer_id, $allowed_extension, $uploadDir, $fileType)
{
    $fileExtensions = $allowed_extension; // Get all the file extensions

    $fileName = $_FILES[$inputID]['name'];
    echo $fileName;
    $fileSize = $_FILES[$inputID]['size'];
    $fileTmpName = $_FILES[$inputID]['tmp_name'];


    $tmp = explode('.', $fileName);
    $fileExtension = strtolower(end($tmp));
    $newfileName = $writer_id . '.' . $fileExtension;
    $uploadDirectory = $uploadDir;
    $uploadPath = $_SERVER['DOCUMENT_ROOT'] . $uploadDirectory . basename($newfileName);
return $uploadPath;
}

if (isset($_POST['form_id'])&& $_POST['form_id']=='registration') {
    $time = time() + 3 * 60 * 60;

    $email = $_POST['email'];
    if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
        $baseURL = "https://" . $_SERVER['SERVER_NAME'];

    } else {
        $baseURL = "http://" . $_SERVER['SERVER_NAME'];
    }
    $sql = "select * from writers where email_address='" . $email . "';";
    $conn = getConnection() or die($php_errormsg);
    $results = $conn->query($sql);
    if ($results->num_rows > 0) {

        $query1 = "select warnings from writers where email_address='" . $email . "';";

        $result = $conn->query($query1) or die($conn->error);
        $row2 = $result->fetch_assoc();
        while ($row = $results->fetch_assoc()) {
            $writer_id = $row['id'];
            if (!empty($_COOKIE['ckid']) | $writer_id == $_COOKIE['ckid']) {
                $trials = $row2['warnings'] + 1;
                $sql = "UPDATE writers set warnings=" . $trials . " WHERE writer_id=" . $writer_id . ";";
                $conn->query($sql);
                header('location:/Errors/MultipleAccounts.php');
            } else {
                break;
            }
        }

    } else {
        $writer_id = rand(100000, 100000);
        $query = "SELECT writer_id FROM writers where writer_id=" . $writer_id;
        $result = $conn->query($query) or die($conn->error);
        if ($result->num_rows > 0) {
            $writer_id = rand(100000, 1000000);

        }

        $now=time()+(3*3600);
        $heading = "Congratulations! | EssayPerfect";
        $body = "
    <html>
<head>

<style type=\"text/css\">
	/* FONTS */
    @media screen {
		@font-face {
		  font-family: 'Lato';
		  font-style: normal;
		  font-weight: 400;ps://fonts.gstatic.com/s/lato/v11/qIIYRU-oROkIk8vfvxw6QvesZW2xOQ-xsNqO47m55DA.woff) format('woff');
		}
		  src: local('Lato Regular'), local('Lato-Regular'), url(htt
		
		@font-face {
		  font-family: 'Lato';
		  font-style: normal;
		  font-weight: 700;
		  src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v11/qdgUG4U09HnJwhYI-uK18wLUuEpTyoUstqEm5AMlJo4.woff) format('woff');
		}
		
		@font-face {
		  font-family: 'Lato';
		  font-style: italic;
		  font-weight: 400;
		  src: local('Lato Italic'), local('Lato-Italic'), url(https://fonts.gstatic.com/s/lato/v11/RYyZNoeFgb0l7W3Vu1aSWOvvDin1pK8aKteLpeZ5c0A.woff) format('woff');
		}
		
		@font-face {
		  font-family: 'Lato';
		  font-style: italic;
		  font-weight: 700;
		  src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v11/HkF_qI1x_noxlxhrhMQYELO3LdcAZYWl9Si6vvxL-qU.woff) format('woff');
		}
    }
    
    /* CLIENT-SPECIFIC STYLES */
    body, table, td, a { -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; }
    table, td { mso-table-lspace: 0pt; mso-table-rspace: 0pt; }
    img { -ms-interpolation-mode: bicubic; }

    /* RESET STYLES */
    img { border: 0; height: auto; line-height: 100%; outline: none; text-decoration: none; }
    table { border-collapse: collapse !important; }
    body { height: 100% !important; margin: 0 !important; padding: 0 !important; width: 100% !important; }

    /* iOS BLUE LINKS */
    a[x-apple-data-detectors] {
        color: inherit !important;
        text-decoration: none !important;
        font-size: inherit !important;
        font-family: inherit !important;
        font-weight: inherit !important;
        line-height: inherit !important;
    }

    /* ANDROID CENTER FIX */
    div[style*=\"margin: 16px 0;\"] { margin: 0 !important; }
</style>
</head>
<body style=\"background-color: #f4f4f4; margin: 0 !important; padding: 0 !important;\">

<!-- HIDDEN PREHEADER TEXT -->
<div style=\"display: none; font-size: 1px; color: #fefefe; line-height: 1px; font-family: 'Lato', Helvetica, Arial, sans-serif; max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden;\">
    Congratulations for completing the first step towards working at " . $_SERVER['SERVER_NAME'] . ". For you to be a writer, you need to complete 3 simple steps.
    <ul>
    <li>FIll your profile (5 minutes)</li>
    <li>Pass a grammar Test</li>
    <li>Write a quick sample</li>
</ul>

</div>

<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"100%\">
    <!-- LOGO -->
    <tr>
        <td bgcolor=\"#7c72dc\" align=\"center\">
            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"480\" >
                <tr>
                    <td align=\"center\" valign=\"top\" style=\"padding: 40px 10px 40px 10px;\">
            This is a system generated email. Do not reply.              </td>
                </tr>
            </table>
        </td>
    </tr>
    <!-- HERO -->
    <tr>
        <td bgcolor=\"#7c72dc\" align=\"center\" style=\"padding: 0px 10px 0px 10px;\">
            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"480\" >
                <tr>
                    <td bgcolor=\"#ffffff\" align=\"center\" valign=\"top\" style=\"padding: 40px 20px 20px 20px; border-radius: 4px 4px 0px 0px; color: #111111; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 48px; font-weight: 400; letter-spacing: 4px; line-height: 48px;\">
                      <h3 style=\"font-size: 32px; font-weight: 400; margin: 0;\">            Dear Writer " . $writer_id . ", </h3><h6>Congrats on signing up as a writer. <a href='" . $baseURL . "/writer/new/verify.php?Oauth2A=" . $randomHash . "&dap9j=" . $time . "&email=" . $email . "'> VERIFY</a>
      </h6>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <!-- COPY BLOCK -->
    <tr>
        <td bgcolor=\"#f4f4f4\" align=\"center\" style=\"padding: 0px 10px 0px 10px;\">
            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"480\" >
              <!-- COPY -->
              <tr>
                <td bgcolor=\"#ffffff\" align=\"left\" style=\"padding: 20px 30px 40px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;\" >
                  <p style=\"margin: 0;\">To proceed to step 2, you need to verify your email. Click <a href='" . $baseURL . "/writer/new/verify.php?Oauth2A=" . $randomHash . "&dap9j=" . $time . "'> Here </a>to verify your email</p>
                </td>
              </tr>
              <!-- BULLETPROOF BUTTON -->
              <tr>
                <td bgcolor=\"#ffffff\" align=\"left\">
                  <table width=\"100%\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                    <tr>
                      <td bgcolor=\"#ffffff\" align=\"center\" style=\"padding: 20px 30px 60px 30px;\">
                        <table border=\"0\" cellspacing=\"0\" cellpadding=\"0\">
                          <tr>
                              <td align=\"center\" style=\"border-radius: 3px;\" bgcolor=\"#7c72dc\"><a href='" . $baseURL . "/writer/new/verify.php?Oauth2A=" . $randomHash . "&dap9j=" . $time . "' target=\"_blank\" style=\"font-size: 20px; font-family: Helvetica, Arial, sans-serif; color: #ffffff; text-decoration: none; color: #ffffff; text-decoration: none; padding: 15px 25px; border-radius: 2px; border: 1px solid #7c72dc; display: inline-block;\">https://" . $_SERVER['SERVER_NAME'] . "/writer/new/verify?Oauth2A='" . $randomHash . "</a></td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
        </td>
    </tr>
    <!-- COPY CALLOUT -->
    <tr>
        <td bgcolor=\"#f4f4f4\" align=\"center\" style=\"padding: 0px 10px 0px 10px;\">
            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"480\" >
                <!-- HEADLINE -->
                <tr>
                  <td bgcolor=\"#111111\" align=\"left\" style=\"padding: 40px 30px 20px 30px; color: #ffffff; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;\" >
                    <h2 style=\"font-size: 24px; font-weight: 400; margin: 0;\">Better hurry! Your link expires on " .date('l jS \of F Y h:i:s A', $now+3*60*60). " </h2>
                  </td>
                </tr>
                <!-- COPY -->
                <tr>
                  <td bgcolor=\"#111111\" align=\"left\" style=\"padding: 0px 30px 20px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;\" >
                    <p style=\"margin: 0;\">Click on the link below or copy/paste in the address bar.</p>
                  </td>
                </tr>
                <!-- COPY -->
                <tr>
                  <td bgcolor=\"#111111\" align=\"left\" style=\"padding: 0px 30px 40px 30px; border-radius: 0px 0px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;\" >
                   <p style=\"margin: 0;\"><a href='" . $baseURL . "/chat/index.php/\"' target=\"_blank\" style=\"color: #7c72dc;\">See how easy it is to get started</a></p>
             </td>
                </tr>
            </table>
        </td>
    </tr>
    <!-- SUPPORT CALLOUT -->
    <tr>
        <td bgcolor=\"#f4f4f4\" align=\"center\" style=\"padding: 30px 10px 0px 10px;\">
            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"480\" >
                <!-- HEADLINE -->
                <tr>
                  <td bgcolor=\"#C6C2ED\" align=\"center\" style=\"padding: 30px 30px 30px 30px; border-radius: 4px 4px 4px 4px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 18px; font-weight: 400; line-height: 25px;\" >
                    <h2 style=\"font-size: 20px; font-weight: 400; color: #111111; margin: 0;\">Need more help?</h2>
                    <p style=\"margin: 0;\"><a href=\"http://" . $_SERVER['SERVER_NAME'] . "/chat/\" target=\"_blank\" style=\"color: #7c72dc;\">We&rsquo;re here, ready to talk</a></p>
                  </td>
                </tr>
            </table>
        </td>
    </tr>
    <!-- FOOTER -->
    <tr>
        <td bgcolor=\"#f4f4f4\" align=\"center\" style=\"padding: 0px 10px 0px 10px;\">
            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" width=\"480\" >
              
              <!-- PERMISSION REMINDER -->
              <tr>
                <td bgcolor=\"#f4f4f4\" align=\"left\" style=\"padding: 0px 30px 30px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;\" >
                  <p style=\"margin: 0;\">You received this email because you signed up as a writer at " . $_SERVER['SERVER_NAME'] . ". If you did not, <a href=\"http://" . $_SERVER['SERVER_NAME'] . "/chat/index\"
         target=\"_blank\" style=\"color: #111111; font-weight: 700;\">please contact us.</a>.</p>
                </td>
              </tr>
              
              <!-- ADDRESS -->
              <tr>
                <td bgcolor=\"#f4f4f4\" align=\"left\" style=\"padding: 0px 30px 30px 30px; color: #666666; font-family: 'Lato', Helvetica, Arial, sans-serif; font-size: 14px; font-weight: 400; line-height: 18px;\" >
                  <p style=\"margin: 0;\"></p>
                </td>
              </tr>
            </table>
        </td>
    </tr>
</table>

</body>
</html>
";

        if (sendQuickmail($_POST['email'], $heading, $body)) {
            setcookie("ckid", $writer_id, time() + 10 * 30 * 24 * 60 * 60, '/');
            $recipient = $_POST['email'];
            $time = md5(time() + (3 * 60 * 60));

            $randomHash = md5(rand(50000, 100000));
            $firstname =$_POST['firstname'];
            $lastname =$_POST['lastname'];
            $phone =$_POST['phone'];
            $document =['.pdf','.docx','.doc','.png'];
            $degree =uploadFile('degree_upload',$writer_id,$document,'/uploads/degrees/','pdf');
            $photo=['.png','.jpeg','.jpg','.svg'];
            $profile_photo =uploadFile('profile_photo_upload',$writer_id,$photo,'/uploads/profiles/','png');
            $id_photo =uploadFile('id_upload',$writer_id,$photo,'/uploads/IDs/','png');

            $nationality =$_POST['nationality'];
            $ip_address =$_POST['ip_address'];

            $dob =$_POST['dob'];

            $university_from =$_POST['university'];
            $password =$_POST['password'];
            $sql = "INSERT INTO `writers` 
    (`writer_id`, `username`, `Fname`, `Lname`, 
     `email_address`, `phone`, `nationality`, 
     `ip_address`, `national_id`, `cert`, 
     `profile_pic`, `verific_pic`,`subject1`, 
     `subject2`, `subject3`, `format1`, `format2`,
     `format3`, `address`, `date of birth`, 
     `univesity`, `pass`, `orders_completed`,
     `wallet`, `rating`, `payment_details`, `gender`, `acc_state`, `takes`,`reg_date`,`resume`) 
     VALUES (".$writer_id.", '" . $writer_id . "', '".$firstname."', '".$lastname."', '" . $email . "',
      '".$phone."', '".$nationality."', '".$ip_address."', '".$id_photo."', '".$degree."', 
      '".$profile_photo."', '".$id_photo."', 'null', 'null',
       NULL, NULL, NULL, NULL, NULL, '".$dob."', '".$university_from."','" . md5($password) . "', '0', 
       '0', '1', NULL, 'male', 'pending', '3',
       TIMESTAMPADD(HOUR,3,CURRENT_TIMESTAMP),'NULL');";
            $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            echo "<!DOCTYPE html>
        <html>
        <title>Verify Your account</title>
        <meta http-equiv='refresh' content='2;url=/errors/checkmail.html'>
        <body>
        <h3>Generating email</h3>
</body>
</html>";
        }else {
            echo "<!DOCTYPE html>
        <html>
        <title>Failed! </title>
        <meta http-equiv='refresh' content='10;url=/errors/502.html'>
        <body>
        <h3>Failed</h3>
</body>
</html>";

        }


//    while ($row=$result->fetch_assoc()){
//        if ($writer_id==$row['writer_id'])
//
//    }


    }

}
