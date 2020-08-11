<?php include('../functions/functions.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="refresh" content="900;url=logout.php" />
    <title>Register | <?php echo $_SERVER['SERVER_NAME'];?></title>
    <meta name="description" content="We are always there to give you academic assistance of any kind! Challenging tasks, confusing guidelines and tight deadlines – let all this rest on our shoulders.">
    <meta name="robots" content="noindex,nofollow" />
    <link rel="stylesheet" href="../css/auth2.min.css?v=1583774631">
    <link rel="stylesheet" href="../css/customer-custom.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <script type="text/javascript" src="../js/"></script>
    <link rel="manifest" href="../manifest.json">
    <link rel="icon" type="image/png" href="../favicon.ico" />
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/fonts.css">
    <link rel="stylesheet" type="text/css" href="../css/slick.css">
    <link rel="stylesheet" type="text/css" href="../css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="../css/tcal.css" />
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/jquery.jscrollpane.css">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700,900" rel="stylesheet">
    <link rel="stylesheet" href="../css/fonts/icomoon/style.css">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">

    <link rel="stylesheet" href="../css/jquery.fancybox.min.css">

    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="../css/fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="../css/aos.css">
    <link href="../css/jquery.mb.YTPlayer.min.css" media="all" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" type="text/css" href="../style.css">
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-NZ9TJQ4');</script>
    <!-- End Google Tag Manager -->
	
</head>
<header>

    <div class="header-offer">
        <div><span class="offer-none">DON'T MISS OUR SPECIAL</span>     <span><a href="../order/?coupon=NEWBIE5">5%OFF</a></span>     ON YOUR FIRST ORDER!     <span class="offer-none">USE YOUR COUPON:</span>    <a href="../order/?coupon=NEWBIE5"><button>NEWBIE5</button></a>
        </div>
        <img src="../images/close.svg" class="close" alt="">
        <style>
            .header-menu .wrap .main-nav{
                top:120px;
            }
            @media (max-width:767px) and (orientation: landscape){
                .header-menu .wrap .main-nav {
                    top: 110px;
                }
            }
        </style>
    </div>

    <div class="header-menu">
        <div class="wrap">
            <a href="/" class="header-logo"><img src ="/images/logo_header.svg" alt=""></a>
            <a href="tel:+254740283090" class="header-phone"><img src="/images/phonegreen.svg" alt="">+254740283090</a>
            <div class="header-order">
                <a href="/order/"><button>ORDER NOW</button></a>
            </div>
            <div class="humburger"></div>
            <div class="main-nav">
                <div class="header-order__mob">
                    <a href="../order/new/"><button>ORDER NOW</button></a>
                </div>
                <ul id="nav">
                    <li><a href="/pricing/">Price</a></li>
                    <li><a href="/testimonials/">Testimonials</a></li>
                    <li><a href="/faq/">FAQ</a></li>
                    <!-- 		          <li><a href="/samples/">Samples</a></li> -->
                    <li><a href="/contacts/">Contacts</a></li>
                    <li><a href="/order/">ORDER NOW</a></li>
                    <li><a href="/accounts/"><svg version="1.1" id="Layer_1" class="login_ico" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 10.3 12" style="enable-background:new 0 0 10.3 12;" xml:space="preserve" width="11px" height="12px"><g transform="translate(-933 -97)">
                                    <path class="st0" d="M936.4,100.4l4.3,2.6l-4.3,2.5v-1.7H933v-1.7h3.4V100.4z"/>
                                    <path class="st0" d="M942.9,97h-7.3v1.7h6v8.6h-6v1.7h7.3c0.2,0,0.4-0.2,0.4-0.4V97.4C943.3,97.2,943.1,97,942.9,97z"/>
                                </g>
		            </svg>Login</a></li>
                </ul>
                <a href="tel:+254740283090" class="header-phone__mob"><img src="/images/phonegreen.svg" alt="">+254740283090</a>
            </div>
        </div>
    </div>
</header>
<body>
<div class="header">
	<h2>Register</h2>
</div>
<form method="post" action="register.php">
<?php echo display_error(); ?>
	<div class="input-group">
		<label>Username</label>
		<input type="text" name="username" value="<?php echo $username; ?>">
	</div>
	<div class="input-group">
		<label>Email</label>
		<input type="email" name="email" value="<?php echo $email; ?>">
	</div>
	<div class="input-group">
		<label>Password</label>
		<input type="password" name="password_1" value="">
	</div>
	<div class="input-group">
		<label>Confirm password</label>
		<input type="password" name="password_2">
	</div>
    <div class="">
		<label>Phone Number</label><br>
		<label>Country Code</label>&nbsp;&nbsp;+
<input type="country_code" name="country_code" size="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="Phone" name="Number">
	</div>
<div class="input-group">
		<button type="submit" class="btn" name="register_btn">Register</button>
	</div>
	<p>
		Already a member? <a href="index.php">Sign in</a>
	</p>
</form></body>
</html>