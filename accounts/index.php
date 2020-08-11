<?php include('../functions/newtemplate.php');
getStartingBlock('Log Into Your Acount |'.$_SERVER['SERVER_NAME'],'Log in to your account and start working','Log In Writing working academic writing','writer academic freelance writing register');
?>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <div class="overlay"></div>


    <main class="page order customer">
        <div class="site-section">
            <div class="container">
                <div class="header">
                    <h2>Login</h2>
                </div>
                <form method="post" action="index.php?redir=true&url=/payments">

                    <?php display_error(); ?>

                    <div class="input-group">
                        <label>Email</label>
                        <input type="email" name="username">
                    </div>
                    <div class="input-group">
                        <label>Password</label>
                        <input type="password" name="password">
                    </div>
                    <div class="input-group">
                        <button type="submit" class="btn" name="login_btn">Login</button>
                    </div>
                    <p>
                        Not yet a member? <a href="register.php">Sign up</a>
                    </p>
                </form>


            </div>
        </div>
    </main>
    <?php showChat();?>

    <script src="../js/libs/jquery.min.js" type="text/javascript"></script>

    <script src="../js/libs.min.js"></script>
    <script src="../js/slick.min.js" type="text/javascript" charset="utf-8"></script>
   <link rel="stylesheet" href="/cookie-policy/css/cp-banner.css">
    <script type="text/javascript">
        CP_COOKIE_NAME = "ges_cookie_notif";
    </script>
    <script src="/cookie-policy/js/cp-banner.js"></script>

    <?php showCookieNotif();
    showChat();?>

    </body>

    <!-- Mirrored from <?php echo $_SERVER['SERVER_NAME'];?> /customer/ by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 14 Dec 2019 04:56:30 GMT -->
</html>