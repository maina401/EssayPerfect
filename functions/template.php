
<?php include('functions.php');
include('class.formr.php');
error_reporting(1);
include('../payments/PaypalExpress.class.php');
if (isset($_POST['register_order'])) {
    registerOrder();
}
function isOfferGiven()
{
    if (isset($_COOKIE['offernotif'])) {
        $state = $_COOKIE['offernotif'];
        if ($state == 'notified') {
            return true;
        } else {
            return false;
        }
    } else {
        setcookie('offernotif', 'unnotified', time() + 30 * 24 * 60 * 60, '/');
        return false;
    }
}

function getContextHeader()
{
    if (isAdmin()) {
        echo getAdminHeader();
    } elseif (isaWriter()) {
        echo getWriterHeader();
    } else {
        echo getHeader();
    }
}

function getHeader()
{
    session_start();

    echo '
    <header class="header-bg" style="background-color: #523406">';

    if (!isOfferGiven()) {
        echo '
        <div class="header-offer">
            <div><span class="offer-none">DON&apos;T MISS OUR SPECIAL</span> <span>
            <a href="/order/?coupon=NEWBIE5">5%OFF</a>
            </span> ON YOUR FIRST ORDER! <span
                        class="offer-none">USE YOUR COUPON:</span> <a href="../home/?coupon=NEWBIE5">
                        
                    <button id="offernotif" onclick="writeCookie(\'offernotif\',\'notified\',30,\'/\')" >NEWBIE5</button>
                </a>
            </div>
            <img src="../images/close.svg" class="close" alt="">
            <style>
                .header-menu .wrap .main-nav {
                    top: 120px;
                }

                @media (max-width: 767px) and (orientation: landscape) {
                    .header-menu .wrap .main-nav {
                        top: 110px;
                    }
                }
            </style>
        </div>';
    }


    echo '<div class="header-menu">
            <div class="wrap">
                <a target="_blank" href="/" class=""><img src="/images/icon_logo.png"  height="50" width="100" alt="Logo"></a>';

    $conn = getConnection();
    $sql = 'select state from hiring';
    $result = $conn->query($sql);
    $state = $result->fetch_assoc();
    if ($state['state'] == '0') {
        echo '<li><a href="/writer/new/"><img src="/images/icon_hiring.png" width="70" height="90"></a></li>';
    }


    echo '
                <a href="tel:+254740283090" class="header-phone"><img src="/images/phonegreen.svg" alt="">+254740283090</a>
                ';
    echo '<div class="main-nav">
                    <div class="header-order__mob">
                        <a href="/Home">
                            <button>ORDER NOW</button>
                        </a>
                    </div>
                    <ul id="nav">';

    echo '
                        <li><a href="/pricing/">Price</a></li>
                        <li><a href="/testimonials/"><img src="/images/icon_testimonials.png" height="30" width="27" href="/testimonials/"> Testimonials</a></li>
                        ';
    if (isLoggedIn()) {
        echo '
                        <li><a href="/writer/new/writer/profile?sid="'.$writer_id.'><img src="/images/icon_manage.png" height="30", width="27" href="/"> My Account</a></li>';
    } else {
        echo '<li><a href=""/pricing/><img src="/images/icon_pricing.png" width="27" height="30" href="/pricing/">Pricing </a></li><li>';
    }
    echo '<a href="/profile/?">';
    if (isset($_SESSION['rating'])) {
        setcookie('ckrt', $_SESSION['rating'], time() + 60 * 10, '/');
        setcookie('ckid', $_SESSION['my_id'], time() + 60 * 10, '/');
        global $writer_rating, $writer_id;
        $writer_rating = $_SESSION['rating'];
        $writer_id = $_SESSION['my_id'];
        $rating = '<img src="/images/star-rating-icon.png" width="9px" height="9px" href="/profile?"' . $writer_id . '">';
        if ($writer_rating == '1') {
            echo $rating;
        } elseif ($writer_rating == '2') {
            echo $rating;
            echo $rating;
        } elseif ($writer_rating == '3') {
            echo $rating;
            echo $rating;
            echo $rating;
        } elseif ($writer_rating == '4') {
            echo $rating;
            echo $rating;
            echo $rating;
            echo $rating;
        } elseif ($writer_rating == '5') {
            echo $rating;
            echo $rating;
            echo $rating;
            echo $rating;
            echo $rating;
        } else {
            echo '<img src="/images/barred_icon.png" width="24px" height="30px" href="/writer/new/writer/profile?sid="' . $writer_id . '">';
        }

    } else {

        echo '<img src="/images/barred_icon.png" width="24px" height="30px" href="/writer/new/writer/profile?sid="' . $writer_id . '">' . $_SESSION['rating'];
        '</a>';
    }


    echo '
                        </li>
                        <li><a href="/order/">ORDER NOW</a></li>';

    if (isLoggedIn()) {
        echo '
                            <strong>';
        $dp = $_SESSION['avatar'];
        $username = $_SESSION['username'];
        if (isset($avatar)) {

            echo '<img src="/images/' . $dp . '" width="24px" height="30" style="border-radius: 50%">';
        } else {
            echo $username;
        }
        echo '</strong>

                            <small>
                                <i>';

        if (isAdmin()) {
            echo '<a href="/admin/"><img src="/images/icon_admin.png" height="28px" width="34px" style="border-radius: 50%"></a> ';
        } else {
            echo '<img src="/images/icon_user.png"height="20px" width="20px">';
        }
        echo '
                             </i>
                                <br>
                                <a href="/logout" style="color: red;">logout</a>
                            </small>';

    } else {
        echo '
                            <li><a href="/accounts/">
                                    <svg version="1.1" id="Layer_1" class="login_ico" xmlns="http://www.w3.org/2000/svg"
                                         xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                         viewBox="0 0 10.3 12" style="enable-background:new 0 0 10.3 12;"
                                         xml:space="preserve" width="11px" height="12px"><g
                                                transform="translate(-933 -97)">
                                            <path class="st0"
                                                  d="M936.4,100.4l4.3,2.6l-4.3,2.5v-1.7H933v-1.7h3.4V100.4z"/>
                                            <path class="st0"
                                                  d="M942.9,97h-7.3v1.7h6v8.6h-6v1.7h7.3c0.2,0,0.4-0.2,0.4-0.4V97.4C943.3,97.2,943.1,97,942.9,97z"/>
                                        </g>
		            </svg>
                                    LOGIN </a></li>';


    }
    echo '
                    </ul>
                    <a href="tel:+254740283090" class="header-phone__mob"><img src="../images/phonegreen.svg" alt="">+254740283090</a>
                </div>
            </div>
        </div>
    </header>
</div>';
}

function getAdminHeader()
{getBootsrap();;

    echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">

    <a class="navbar-brand" href="/chat/index.php/site_admin/">Manage Live chat & Support</a>

    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
            data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
            aria-label="Toggle navigation">

        <span class="navbar-toggler-icon"></span>

    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">

        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">

                <a class="nav-link" href="/admin/">

                    <i class="fa fa-fw fa-dashboard"></i>

                    <span class="nav-link-text">Dashboard</span>

                </a>

            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">

                <a class="nav-link" href="/order/neworder">

                    <img src="/admin/img/icon_add.png" width="10px" height="22px">

                </a>
                
                    <span class="nav-link-text"> New Order</span>


            </li>

            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">

                <a class="nav-link" href="/writer/new/admin/writers.php">

                    <img src="/admin/img/user_manage.png" width="25px" height="22px">

                    <span class="nav-link-text">Manage Users</span>

                </a>

            </li>

        </ul>

        <ul class="navbar-nav sidenav-toggler">

            <li class="nav-item">

                <a class="nav-link text-center" id="sidenavToggler">

                    <i class="fa fa-fw fa-angle-left"></i>

                </a>

            </li>

        </ul>

        <ul class="navbar-nav ml-auto">
        

            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">

                    <i class="fa fa-fw fa-envelope"></i>

                    <span class="d-lg-none">Messages

<span class="badge badge-pill badge-primary">12 New</span>

</span>

                    <span class="indicator text-primary d-none d-lg-block">

<i class="fa fa-fw fa-circle"></i>

</span>

                </a>

                <div class="dropdown-menu" aria-labelledby="messagesDropdown">

                    <h6 class="dropdown-header">New Messages:</h6>';
    if (isAdmin()) {
        $conn = getConnection();
        $sql = "SELECT * FROM notification WHERE target= 1 ORDER BY `time` DESC";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $heading = $row['heading'];
            $body = $row['message'];
            $time = date('M j Y g:i A', strtotime($row['time']));
            echo '
                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="#">

                        <strong>' . $heading . '</strong>

                        <span class="small float-right text-muted">' . $time . '</span>

                        <div class="dropdown-message small">' . $body . '</div>

                    </a>';

        }
    }
    echo '<div class="dropdown-divider"></div>
 <div class="dropdown-divider"></div>

                    <a class="dropdown-item small" href="#">View all messages</a>

                </div>

            </li>

            <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">

                    <i class="fa fa-fw fa-bell"></i>

                    <span class="d-lg-none">Alerts

<span class="badge badge-pill badge-warning">6 New</span>

</span>

                    <span class="indicator text-warning d-none d-lg-block">

<i class="fa fa-fw fa-circle"></i>

</span>

                </a>

                <div class="dropdown-menu" aria-labelledby="alertsDropdown">

                    <h6 class="dropdown-header">New Alerts:</h6>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="#">

<span class="text-success">

<strong>

<i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>

</span>

                        <span class="small float-right text-muted">11:21 AM</span>

                        <div class="dropdown-message small">This is an automated server response message. All systems
                            are online.
                        </div>

                    </a>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="#">

<span class="text-danger">

<strong>

<i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>

</span>

                        <span class="small float-right text-muted">11:21 AM</span>

                        <div class="dropdown-message small">This is an automated server response message. All systems
                            are online.
                        </div>

                    </a>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="#">

<span class="text-success">

<strong>

<i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>

</span>

                        <span class="small float-right text-muted">11:21 AM</span>

                        <div class="dropdown-message small">This is an automated server response message. All systems
                            are online.
                        </div>

                    </a>

                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item small" href="#">View all alerts</a>

                </div>

            </li>

            <li class="nav-item">

                <form class="form-inline my-2 my-lg-0 mr-lg-2">

                    <div class="input-group">

                        <input class="form-control" type="text" placeholder="Search for...">

                        <span class="input-group-append">

<button class="btn btn-primary" type="button">

<i class="fa fa-search"></i>

</button>

</span>

                    </div>

                </form>

            </li>

            <li class="nav-item">

                <a class="nav-link" data-toggle="modal" data-target="#exampleModal">

                    <i class="fa fa-fw fa-sign-out"></i>Logout</a>

            </li>

        </ul>

    </div>

</nav>


<script src="/admin/vendor/jquery/jquery.min.js"></script>

<script src="/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->

<script src="/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Page level plugin JavaScript-->

<script src="/admin/vendor/chart.js/Chart.min.js"></script>

<script src="/admin/vendor/datatables/jquery.dataTables.js"></script>

<script src="/admin/vendor/datatables/dataTables.bootstrap4.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<!-- Custom scripts for all pages-->

<script src="/admin/js/sb-admin.min.js"></script>

<!-- Custom scripts for this page-->

<script src="/admin/js/sb-admin-datatables.min.js"></script>

<script src="/admin/js/sb-admin-charts.min.js"></script>


';
}

function getIncludes()
{
    echo '<meta content="text/html; charset=utf-8" http-equiv="Content-Type"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
    <script type="text/javascript" src="/js/"></script>
    <link rel="manifest" href="/manifest.json">
    <link rel="icon" type="image/png" href="/favicon.ico"/>
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/fonts.css">
    <link rel="stylesheet" type="text/css" href="/css/slick.css">
    <link rel="stylesheet" type="text/css" href="/css/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="/css/tcal.css"/>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/jquery.jscrollpane.css">
    <style type="text/css">
    #myFooter{
        justify-content: center;
      background-color: blueviolet;
        font-family: "Berlin Sans FB Demi";
        text-decoration-color: #990000;
        border-radius: 27%;
        text-align: center;
        max-height: inherit;
        align-items: center;
        align-content: center;
        align-self: center;
    }
    .form-card{
        height: fit-content;
    }
    .custom-icons{
        padding: 27px;
    }
</style>

    
<script src="/js/jquery.mousewheel.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jScrollPane/2.2.1/script/jquery.jscrollpane.min.js"></script>
<link rel="stylesheet" href="../css/notify.css" />
<script src="../js/libs/jquery.min.js"></script>
<script src="../js/notify.js"></script>
';


}

function getFooter()
{
    $background = '/images/bg_1.jpg';

    echo '
    <footer style="text-decoration-color: #0b0b0b">
        <div class=""  style="text-decoration-color: #0b0b0b; background-image: url(' . $background . ');">
            <div class="footer-top">
                <div class="wrap">
                <img src="/images/icon_logo.png"  height="50" width="100" alt="Logo">
                    <div class="footer-top__subscribe">
                        <p>best bonuses and discounts into your inbox</p>
                        <form id="subscribeForm"><input type="text" name="email" data-type="email" data-required="true"
                                                        data-latine="true" placeholder="Your Email">
                            <button type="submit" id="subscribe">SUBSCRIBE</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="footer-content wrap">
                <div class="footer-item">
                    <div class="footer-item__phone">
                        <a href="tel:+254740283090"><img src="/images/phonegreen.svg" alt=""> +254740283090</a>
                    </div>
                    <div class="footer-item__email">
                        <a href="mailto:support@mywriter.epizy.com"><img src="/images/mail.svg" alt=""> support@essayperfect.com</a>
                    </div>
                    <div class="footer-item__social">
                        <a href="#"><img src="/images/facebook.svg" alt=""></a>
                        <a href="#"><img src="/images/twitter.svg" alt=""></a>
                        <a href="#"><img src="/images/youtube.svg" alt=""></a>
                    </div>
                    <div class="footer-item__pay">
                        <img src="/images/visa.svg" alt="">
                        <img src="/images/mastercard.svg" alt="">
                    </div>
                    
                </div>
                <div class="footer-item">
                    <ul>
                        <li><a href="/">HOME</a></li>
                        <li><a href="/testimonials/">TESTIMONIALS</a></li>
                        <li><a href="/faq/">FAQ</a></li>
                    </ul>
                </div>
                <div class="footer-item">
                    <select name="" id="" onchange="location = this.value;">
                        <option value="#">Menu</option>
                        <option value="/">HOME</option>
                        <option value="/testimonials/">TESTIMONIALS</option>
                        <option value="/faq/">FAQ</option>
                        <option value="/order/">ORDER</option>
                        <option value="/contacts/">CONTACTS</option>
                        <option value="/accounts/">LOG IN</option>
                        <option value="/privacy-policy/">Privacy Policy</option>
                        <option value="/terms-and-conditions/">Terms and Conditions</option>
                        <option value="/refund-policy/">Refund Policy</option>
                        <option value="/revision-policy/">Revision Policy</option>
                        <option value="/cookie-policy/">Cookie Policy</option>
                    </select>
                    <ul>
                        <li><a href="/order/">ORDER</a></li>
                        <li><a href="/contacts/">CONTACTS</a></li>
                        <li><a href="/accounts/">LOG IN</a></li>
                    </ul>
                </div>
                <div class="footer-item">
                    <ul>
                        <li><a href="/privacy-policy/">Privacy Policy</a></li>
                        <li><a href="/terms-and-conditions/">Terms and Conditions</a></li>
                        <li><a href="/refund-policy/">Refund Policy</a></li>
                    </ul>
                </div>
                <div class="footer-item">
                    <ul>
                        <li><a href="/revision-policy/">Revision Policy</a></li>
                        <li><a href="/cookie-policy/">Cookie Policy</a></li>
                    </ul>
                </div>
            
        </div>
        </div>
        
    </footer>
    
  
</div>

<div class="card" id="myFooter">
            <div class="" ><center>
            <p style="text-decoration-color: black; text-align: justify;text-effect: emboss;">Copyright © <?php echo date(\'Y\');?> Perfect Essay. All Rights Reserved | Designed by <a
            href="http://mywriter.epizy.com" target="_blank">Top Solutions</a></p></center></div>
       </div>
    
    ';
    showChat();

}

function getOrderDesc()
{
    getOrderDetails();
    $order = unserialize($_COOKIE['ordatrrs']);
    if (empty($_GET['message'])) {
        $message = 'See attachments';
    } else {
        $message = $_GET['message'];
    }

    if (!isset($_GET['email'])) {
        $email = $_SESSION['email_address'];
    }
    if (!isset($_GET['name'])) {
        $name = $_SESSION['user'];
    }
    $name = $_GET['name'];
    $price = $_COOKIE['ortp'];

    $newOrder = array('description' => $message, 'email' => $email, 'name' => $name, 'price' => $price, 'format' => $_COOKIE['ppfrmt']);

    setcookie('ordatrrs', serialize(array_merge($newOrder, $order)), time() + 3600, '/');
    return array_merge($newOrder, $order);
}

function getOrderDetails()
{
    global $order, $academicLevel, $papertype, $deadline, $page;
    $academicLevel = $_GET['academicLevel'];
    $format = $_GET['format'];
    $papertype = $_GET['typeOfPaper'];
    $deadline = time() + $_GET['deadline'];
    $page = $_GET['page'];
    $title = $_GET['title'];
    $order = array('level' => $academicLevel, 'due' => $deadline, 'pages' => $page, 'type' => $papertype);
    setcookie('ordatrrs', serialize($order), time() + 3600, '/');
    return $order;
}

function showCookieNotif()
{
    if (userAloowsCookies()) {
        echo '';
    } else {
        echo '<div class="cp-banner">
        <div class="cp-banner-content">
             If you continue using our website, you accept our <a
                    href="../cookie-policy/" rel="nofollow">Cookie Policy</a>.
            <button type="button" class="cp-banner-close" id="cookienotif">Accept</button>
        </div>
        <style>
            .coupon {
                bottom: 225px;
            }

            .hw__block {
                bottom: 90px;
            }

            .callback-icon {
                bottom: 100px !important;
            }

            @media all and (min-width: 767px) and (max-width: 1024px) {
                .callback-icon {
                    bottom: 80px !important;
                }
            }
        </style>
    </div>';
    }
}

function getBootsrap()
{
    echo '<link href="/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->

    <link href="/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap core CSS-->

    <link href="/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->

    <link href="/admin/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Page level plugin CSS-->

    <link href="/admin/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->

    <link href="/admin/css/sb-admin.css" rel="stylesheet">
    ';
}

function showChat()
{
    echo '<script type="text/javascript">
var LHCChatOptions = {};
LHCChatOptions.opt = {widget_height:340,widget_width:300,popup_height:520,popup_width:500,domain:\'/\'};
(function() {
var po = document.createElement(\'script\'); po.type = \'text/javascript\'; po.async = true;
var referrer = (document.referrer) ? encodeURIComponent(document.referrer.substr(document.referrer.indexOf(\'://\')+1)) : \'\';
var location  = (document.location) ? encodeURIComponent(window.location.href.substring(window.location.protocol.length)) : \'\';
po.src = \'/chat/index.php/chat/getstatus/(click)/internal/(position)/bottom_right/(ma)/br/(top)/350/(units)/pixels/(department)/1?r=\'+referrer+\'&l=\'+location;
var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(po, s);
})();
</script>';
}

function getWriterIncludes()
{
    echo '<link href=\'http://fonts.googleapis.com/css?family=Open+Sans:400,300,600\' rel=\'stylesheet\' type=\'text/css\'>
    <link href="/writer/new/assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
    <link href="/writer/new/assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
    <link href="/writer/new/assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="/writer/new/assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="/writer/new/assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>
    <link href="/writer/new/assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>
    <link href="/writer/new/assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>
    <link href="/writer/new/assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
    <link href="/writer/new/assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="/writer/new/assets/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/>
    <link href="/writer/new/assets/plugins/weather-icons-master/css/weather-icons.min.css" rel="stylesheet" type="text/css"/>
    <link href="/writer/new/assets/plugins/metrojs/MetroJs.min.css" rel="stylesheet" type="text/css"/>
    <link href="/writer/new/assets/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css"/>
    <link href="/writer/new/assets/images/icon.png" rel="icon">
    <link href="/writer/new/assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
    <link href="/writer/new/assets/css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css"/>
    <link href="/writer/new/assets/css/custom.css" rel="stylesheet" type="text/css"/>
    <link href="/writer/new/assets/css/snack.css" rel="stylesheet" type="text/css"/>
    <script src="/writer/new/assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
    <script src="/writer/new/assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
';
}

function getWriterHeader()

{
    if (!isset($_COOKIE['ckid'])) {
        echo '<meta http-equiv="refresh" content="10;url=/accounts/">';

    }
    $writer_id = $_COOKIE['ckid'];
    $conn = getConnection();
    $sql = "SELECT * FROM writers WHERE writer_id='" . $writer_id . "'";
    $result = $conn->query($sql) or die($conn->error);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {

            $writer_id = $row['writer_id'];

            $fname = $row['Fname'];
            $lname = $row['Lname'];

            $wallet = $row['wallet'];
            $acc_state=$row['acc_state'];


        }
    }

    getWriterIncludes();
    echo '<div class="navbar">
        <div class="navbar-inner">
            <div class="sidebar-pusher">
                <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
            <div class="logo-box">
                <a href="./" class="logo-text"><span><img src="/images/icon_logo.png" alt="LOGO" height="76" width="130"></span></a>
            </div>

            <div class="topmenu-outer">
                <div class="top-menu">
                    <ul class="nav navbar-nav navbar-right">


                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic"
                               data-toggle="dropdown">
                                <span class="user-name">';
    echo $fname . "      " . $lname;
    echo '<i
                                            class="fa fa-angle-down"></i></span>
                                <img src="/images/Wallet-icon.png" height="30px" width="35px"
                                     style="border-radius: 50%">
                                     
                           ';
    echo '$'.$wallet;
    echo '
                       

                            </a>
                            <ul class="dropdown-menu dropdown-list" role="menu">
                                <li role="presentation"><a href="/writer/new/writer/profile.php"><i class="fa fa-user"></i>Profile</a></li>
                                <li role="presentation"><a href="/logout/"><i class="fa fa-sign-out m-r-xs"></i>Log
                                        out</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">

                <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">

                    <i class="fa fa-fw fa-envelope"></i>

                    <span class="d-lg-none">Messages

<span class="badge badge-pill badge-primary">12 New</span>

</span>

                    <span class="indicator text-primary d-none d-lg-block">

<i class="fa fa-fw fa-circle"></i>

</span>

                </a>

                <div class="dropdown-menu" aria-labelledby="messagesDropdown">

                    <h6 class="dropdown-header">New Messages:</h6>';
    if (isaWriter()) {
        $conn = getConnection();
        $sql = "SELECT * FROM notification WHERE target= $writer_id";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $heading = $row['heading'];
            $body = $row['message'];
            $time = date('M j Y g:i A', strtotime($row['time']));
            echo '
                    <div class="dropdown-divider"></div>

                    <a class="dropdown-item" href="#">

                        <strong>' . $heading . '</strong>

                        <span class="small float-right text-muted">' . $time . '</span>

                        <div class="dropdown-message small">'. $body . '</div>

                    </a>';

        }
    }
    echo '<div class="dropdown-divider"></div>
 <div class="dropdown-divider"></div>

                    <a class="dropdown-item small" href="#">View all messages</a>

                </div>

            </li>
                        <li>
                        </li>
                        <li>
                                <span><i class="fa fa-sign-out m-r-xs"></i>Log out</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="page-sidebar sidebar">
        <div class="page-sidebar-inner slimscroll">
            <div class="sidebar-header">
                <div class="sidebar-profile">
                    <a href="javascript:void(0);" id="profile-menu-link">
                        <div class="sidebar-profile-image">
                            <img src="/uploads/profiles/' . $writer_id . '.png" height="80px"
                                 width="90px" style="border-radius: 40%">


                        </div>
                        <div class="sidebar-profile-details">
                            <span>';
    echo $fname . "     " . $lname;
    echo '<br></span>
                        </div>
                    </a>
                </div>
            </div>
            <ul class="menu accordion-menu">';
    if($acc_state=='active'){
        echo ' <li><a href="/writer/new/writer/" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-home"></span><p>Dashboard</p></a></li>
                        <li><a href="/writer/new/writer/subject.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon glyphicon-file"></span><p>Orders </p></a></li>
                        <li><a href="/writer/new/writer/profile.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon glyphicon-user"></span><p>Profile</p></a></li>
                       <li><a href="/writer/new/writer/payments.php" class="waves-effect waves-button"><img src="/images/icon_dollar.jpg" height="30px" width="3opx"/><p>Payments</p></a></li>
                       ';
    }elseif($acc_state=='pending'){
       echo '<meta http-equiv="refresh" content="1;/errors/evaluation.html"';
    }else{
        echo ' <li><a href="/writer/new/writer/examinations.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-book"></span><p>Tests </p></a></li>
                        <li><a href="/writer/new/writer/results.php" class="waves-effect waves-button"><span class="menu-icon glyphicon glyphicon-certificate"></span><p>Exam Results</p></a></li>
';
    }



    echo '</ul>
        </div>
    </div>';
}
