<?php
include 'includes/check_user.php';
include 'includes/check_reply.php';

if (isset($_GET['sid'])) {
    $conn=getConnection();
    $writer_id = mysqli_real_escape_string($conn, $_GET['sid']);
    $sql = "SELECT * FROM writers WHERE writer_id = '$writer_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {
            $sdfname = $row['Fname'];
            $sdlname = $row['Lname'];
            $sdgender = $row['gender'];
            $sddob = $row['date of birth'];
            $sdaddress = $row['address'];
            $sdemail = $row['email_address'];
            $sdphone = $row['phone'];
            $sddepartment = $row['subject1'];
            $sdcategory = $row['format1'];
            $sdavatar = $row['profile_pic'];
            $sdstat = $row['acc_state'];
            $sql = "SELECT essay_title as head, essay_sample as body, grammar_test as marks FROM tests WHERE writer_id=" . $writer_id;
            $result = $conn->query($sql) or die($conn->error);
            while ($row2 = $result->fetch_assoc()) {
                $heading = $row2['head'];
                $body = $row2['body'];
                $grammar=$row2['marks'];

            }

            $qrcodetxt = 'ID:' . $writer_id . ', NAME: ' . $sdfname . ' ' . $sdlname . ', GENDER: ' . $sdgender . ', DEPARTMENT : ' . $sddepartment . ', CATEGORY : ' . $sdcategory . '';

        }
    } else {
        header("location:./");
    }

} else {
    header("location:./");
}
?>
<!DOCTYPE html>
<html>

<head>

    <title><?php echo $_SERVER['SERVER_NAME']; ?> | View writer</title>

    <meta content="width=device-width, initial-scale=1" name="viewport"/>
    <meta charset="UTF-8">
    <meta name="description" content="Start Earning Money from your writing today. Earn up to $40 per page"/>
    <meta name="keywords" content="Academic Writing Freelance Writing Essay"/>
    <meta name="author" content="Moffat Mugwanjira"/>

    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600' rel='stylesheet' type='text/css'>
    <link href="../assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
    <link href="../assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/plugins/offcanvasmenueffects/css/menu_cornerbox.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/plugins/x-editable/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"
          type="text/css">
    <link href="../assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/images/icon.png" rel="icon">
    <link href="../assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css"/>
    <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/css/snack.css" rel="stylesheet" type="text/css"/>
    <script src="../assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
    <script src="../assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>


    <link href="../assets/plugins/summernote-master/summernote.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/plugins/bootstrap-colorpicker/css/colorpicker.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css"/>
    <link href="../assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet"
          type="text/css"/>


</head>
<body <?php if ($ms == "1") {
    print 'onload="myFunction()"';
} ?> class="page-header-fixed">
<div class="overlay"></div>
<div class="menu-wrap">
    <nav class="profile-menu">
        <div class="profile">
            <?php
            if ($myavatar == NULL) {
                print' <img width="60" src="../assets/images/' . $mygender . '.png" alt="' . $myfname . '">';
            } else {
                echo '<img src="data:image/jpeg;base64,' . base64_encode($myavatar) . '" width="60" alt="' . $myfname . '"/>';
            }

            ?>
            <span><?php echo "$myfname"; ?><?php echo "$mylname"; ?></span></div>
        <div class="profile-menu-list">
            <a href="profile.php"><i class="fa fa-user"></i><span>Profile</span></a>
            <a href="logout.php"><i class="fa fa-sign-out"></i><span>Logout</span></a>
        </div>
    </nav>
    <button class="close-button" id="close-button">Close Menu</button>
</div>
<form class="search-form" action="search.php" method="GET">
    <div class="input-group">
        <input type="text" name="keyword" class="form-control search-input" placeholder="Search writer..." required>
        <span class="input-group-btn">
                    <button class="btn btn-default close-search waves-effect waves-button waves-classic"
                            type="button"><i class="fa fa-times"></i></button>
                </span>
    </div>
</form>
<main class="page-content content-wrap">
    <div class="navbar">
        <div class="navbar-inner">
            <div class="sidebar-pusher">
                <a href="javascript:void(0);" class="waves-effect waves-button waves-classic push-sidebar">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
            <div class="logo-box">
                <a href="./" class="logo-text"><span><img src="/logo.png" alt="" height="76" width="130"></span></a>
            </div>
            <div class="search-button">
                <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i
                            class="fa fa-search"></i></a>
            </div>
            <div class="topmenu-outer">
                <div class="top-menu">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="javascript:void(0);" class="waves-effect waves-button waves-classic show-search"><i
                                        class="fa fa-search"></i></a>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle waves-effect waves-button waves-classic"
                               data-toggle="dropdown">
                                <span class="user-name"><?php echo "$myfname"; ?> <?php echo "$mylname"; ?><i
                                            class="fa fa-angle-down"></i></span>
                                <?php
                                if ($myavatar == NULL) {
                                    print' <img class="img-circle avatar"  width="40" height="40" src="../assets/images/' . $mygender . '.png" alt="' . $myfname . '">';
                                } else {
                                    echo '<img width="40" height="40" src="data:image/jpeg;base64,' . base64_encode($myavatar) . '" class="img-circle avatar"  alt="' . $myfname . '"/>';
                                }

                                ?>
                            </a>
                            <ul class="dropdown-menu dropdown-list" role="menu">
                                <li role="presentation"><a href="profile.php"><i class="fa fa-user"></i>Profile</a></li>
                                <li role="presentation"><a href="logout.php"><i class="fa fa-sign-out m-r-xs"></i>Log
                                        out</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="logout.php" class="log-out waves-effect waves-button waves-classic">
                                <span><i class="fa fa-sign-out m-r-xs"></i>Log out</span>
                            </a>
                        </li>
                        <li>

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
                            <?php
                            if ($myavatar == NULL) {
                                print' <img class="img-circle img-responsive" src="../assets/images/' . $mygender . '.png" alt="' . $myfname . '">';
                            } else {
                                echo '<img src="data:image/jpeg;base64,' . base64_encode($myavatar) . '" class="img-circle img-responsive"  alt="' . $myfname . '"/>';
                            }

                            ?>

                        </div>
                        <div class="sidebar-profile-details">
                            <span><?php echo "$myfname"; ?> <?php echo "$mylname"; ?><br><small><?php echo $_SERVER['SERVER_NAME']; ?> Administrator</small></span>
                        </div>
                    </a>
                </div>
            </div>
            <ul class="menu accordion-menu">
                <li><a href="./" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon-home"></span>
                        <p>Dashboard</p></a></li>
                <li><a href="departments.php" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon-folder-open"></span>
                        <p>Departments</p></a></li>
                <li><a href="categories.php" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon glyphicon-tags"></span>
                        <p>Categories</p></a></li>
                <li><a href="/writer/new/admin/orders.php" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon glyphicon-file"></span>
                        <p>Orders</p></a></li>
                <li><a href="writers.php" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon glyphicon-user"></span>
                        <p>writers</p></a></li>
                <li><a href="examinations.php" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon-book"></span>
                        <p>Tests </p></a></li>
                <li><a href="questions.php" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon-question-sign"></span>
                        <p>Questions</p></a></li>
                <li><a href="notice.php" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon-th-list"></span>
                        <p>Notifications</p></a></li>
                <li><a href="results.php" class="waves-effect waves-button"><span
                                class="menu-icon glyphicon glyphicon-certificate"></span>
                        <p>Exam Results</p></a></li>

            </ul>
        </div>
    </div>
    <div class="page-inner">
        <div class="page-title">
            <h3>View writer - <?php echo "$sdfname"; ?> <?php echo "$sdlname"; ?></h3>


        </div>
        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-5">

                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <div class="col-md-6">
                                        <?php
                                        if ($sdavatar == NULL) {
                                            print' <img class="img-responsive" src="/uploads/profiles/' . $writer_id . '.png" alt="' . $sdfname . '" height="40px" width="50px" style="border-radius: 50%">';
                                        } else {
                                            print' <img  src="/uploads/profiles/' . $writer_id . '.png" alt="' . $sdfname . '" height="120px" width="120px" style="border-radius: 50%">';
                                        }

                                        ?></div>
                                    <div class="col-md-6">
                                        <?php print '<img width="150" src="../assets/qrcode/qr_img.php?d=' . $qrcodetxt . '">'; ?>
                                    </div>

                                </div>
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Registration Number</td>
                                        <td><b><?php echo "$writer_id"; ?></b></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>First Name</td>
                                        <td><b><?php echo "$sdfname"; ?></b></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Last Name</td>
                                        <td><b><?php echo "$sdlname"; ?></b></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>Gender</td>
                                        <td><b><?php echo "$sdgender"; ?></b></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>Date of birth</td>
                                        <td><b><?php echo "$sddob"; ?></b></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">6</th>
                                        <td colspan="2">Address<br><i><?php echo "$sdaddress"; ?></i></td>


                                    </tr>
                                    <tr>
                                        <th scope="row">7</th>
                                        <td>Email Address</td>
                                        <td><b><?php echo "$sdemail"; ?></b></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">8</th>
                                        <td>Phone Number</td>
                                        <td><b><?php echo "$sdphone"; ?></b></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">9</th>
                                        <td>Department</td>
                                        <td><b><?php echo "$sddepartment"; ?></b></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">10</th>
                                        <td>Category</td>
                                        <td><b><?php echo "$sdcategory"; ?></b></td>

                                    </tr>
                                    <tr>
                                        <th scope="row">11</th>
                                        <td>Grammar Test Score</td>
                                        <td><b><?php echo $grammar; ?></b></td>

                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                        <div class="col-md-7 " style="height: auto">
                            <h3>Degree</h3>
                            <div class="panel panel-white h-100 d-inline-block" style="height: auto">
                                <div class="panel-body">
                                    <object data="/uploads/degrees/<?php echo $writer_id; ?>.pdf" type="application/pdf"
                                            height="100%" width="100%">
                                        <embed src="/uploads/degrees/<?php echo $writer_id; ?>.pdf"
                                               type="application/pdf"/>
                                    </object>

                                </div>
                            </div>
                            <h3>National ID</h3>
                            <div class="panel panel-white h-100 d-inline-block" style="height: auto">
                                <div class="panel-body">
                                    <object data="/uploads/IDs/<?php echo $writer_id; ?>.pdf" type="application/pdf"
                                            height="100%" width="100%">
                                        <embed src="/uploads/IDs/<?php echo $writer_id; ?>.pdf" type="application/pdf"/>
                                    </object>

                                </div>
                            </div>
                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <label for="exampleFormControlTextarea1">Test Essay</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="20"
                                              readonly><?php echo "" . $heading . "\n" . $body; ?></textarea>

                                </div>
                            </div>
                        </div>


                    </div>


                </div>
            </div>
        </div>

    </div>
</main>
<?php if ($ms == "1") {
    ?>
    <div class="alert alert-success" id="snackbar"><?php echo "$description"; ?></div> <?php
} else {

}
?>

<div class="cd-overlay"></div>

<script src="../assets/plugins/jquery/jquery-2.1.4.min.js"></script>
<script src="../assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="../assets/plugins/pace-master/pace.min.js"></script>
<script src="../assets/plugins/jquery-blockui/jquery.blockui.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="../assets/plugins/switchery/switchery.min.js"></script>
<script src="../assets/plugins/uniform/jquery.uniform.min.js"></script>
<script src="../assets/plugins/offcanvasmenueffects/js/classie.js"></script>
<script src="../assets/plugins/offcanvasmenueffects/js/main.js"></script>
<script src="../assets/plugins/waves/waves.min.js"></script>
<script src="../assets/plugins/3d-bold-navigation/js/main.js"></script>
<script src="../assets/plugins/jquery-mockjax-master/jquery.mockjax.js"></script>
<script src="../assets/plugins/moment/moment.js"></script>
<script src="../assets/plugins/datatables/js/jquery.datatables.min.js"></script>
<script src="../assets/plugins/x-editable/bootstrap3-editable/js/bootstrap-editable.js"></script>
<script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="../assets/js/modern.min.js"></script>
<script src="../assets/js/pages/table-data.js"></script>
<script src="../assets/plugins/select2/js/select2.min.js"></script>
<script src="../assets/plugins/summernote-master/summernote.min.js"></script>
<script src="../assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script src="../assets/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="../assets/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
<script src="../assets/js/pages/form-elements.js"></script>


<script>
    function myFunction() {
        var x = document.getElementById("snackbar")
        x.className = "show";
        setTimeout(function () {
            x.className = x.className.replace("show", "");
        }, 3000);
    }
</script>
</body>

</html>