<!DOCTYPE html>
<?php include "../../functions/template.php";?>
<html>
    
<head>

        <title>Register As a Writer| <?php echo $_SERVER['SERVER_NAME'];?></title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
    <meta name="description" content="" />
    <meta name="keywords" content="Essay Perfect" />
    <meta name="author" content="Moffat mugwanjira" />

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href="assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
    <link href="assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="assets/images/icon.png" rel="icon">
    <link href="assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css"/>
    <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/snack.css" rel="stylesheet" type="text/css"/>
    <script src="assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
    <script src="assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
<?php getIncludes(); getBootsrap();getHeader();?>
</head>
     <body <?php if ($_COOKIE['lgist'] == "1") { print 'onload="myFunction()"'; } ?>  class="page-login">

        <main class="page-content">

            
 <div class="page-inner">

                <div id="main-wrapper">
                    <div class="row">
                        <div class="col-md-4 center">
                            <div class="login-box">
                                <?php if (isset($_GET['err'])&&$_GET['err']=='t6y78i9'){
                                        echo '<div class="alert-warning alert-dismissable alert-error alert-danger">The link you followed has already expired. Our system only sends one link. <br>Your only option now is to contact the admin via the live chat</div>';
                                    } ?>
                                <a href="./" class="logo-name text-lg text-center">Writer Registration</a>
                                <p class="text-center m-t-md">Enter Your Email (we will send a verification link)</p>
                                <form class="m-t-md" action="/functions/mail/send_mail" method="GET">
                                    <div class="form-group">
                                        <input type="hidden" name="formid" value="q2w3e4r5">
                                        <input type="text" class="form-control" placeholder="Email or Registration No."  autocomplete="off" name="email" id="email" required>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block" id="register" name="register">Login</button>
                                    <a href="forgot_pw.php" class="display-block text-center m-t-md text-sm">Forgot Password?</a>
                                </form>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
			<?php if ($_COOKIE['lgist']== "1") {
?> <div class="alert alert-error" id="snackbar"><?php echo "$description"; ?></div> <?php
}else{
	
}
?>

        <script src="assets/plugins/jquery/jquery-2.1.4.min.js"></script>
        <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>
        <script src="assets/plugins/pace-master/pace.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/plugins/switchery/switchery.min.js"></script>
        <script src="assets/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="assets/plugins/offcanvasmenueffects/js/classie.js"></script>
        <script src="assets/plugins/waves/waves.min.js"></script>
        <script src="assets/js/modern.min.js"></script>
        		<script>
function myFunction() {
    var x = document.getElementById("snackbar")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script></body>

</html>