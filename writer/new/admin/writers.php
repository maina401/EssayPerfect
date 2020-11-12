<?php
include 'includes/check_user.php';
include 'includes/check_reply.php';
?>
<!DOCTYPE html>
<html>

<head>

    <title><?php echo $_SERVER['SERVER_NAME']; ?> | Manage writers</title>

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
                <li class="active"><a href="writers.php" class="waves-effect waves-button"><span
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
            <h3>Manage writers</h3>


        </div>
        <div id="main-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="panel panel-white">
                                <div class="panel-body">
                                    <div role="tabpanel">

                                        <ul class="nav nav-tabs" role="tablist">

                                            <li role="presentation" class="active"><a href="#tab5" role="tab"
                                                                                      data-toggle="tab">All writers</a></li>
                                            <li role="presentation"><a href="#tabo6" role="tab" data-toggle="tab">Active Writers</a></li>
                                            <li role="presentation"><a href="#tabo7" role="tab" data-toggle="tab">New Applications</a></li>
                                            <li role="presentation"><a href="#tabo8" role="tab" data-toggle="tab">Suspended Writers</a></li>
                                            <li role="presentation"><a href="#tabo9" role="tab" data-toggle="tab">Legendary</a></li>
                                            <li role="presentation"><a href="#tab6" role="tab" data-toggle="tab">Other
                                                    Actions</a></li>


                                        </ul>

                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active fade in" id="tab5">
                                                <div class="table-responsive">
                                                    <?php
                                                    $conn=getConnection();
                                                    $sql = "SELECT * FROM writers ORDER BY Fname ASC";
                                                    $result = $conn->query($sql);

                                                    if ($result->num_rows > 0) {
                                                        print '
										<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
												<th>Gender</th>
												<th>Category</th>
                                                <th>Status</th>
                                                <th>Date of Birth</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
												<th>Gender</th>
												<th>Category</th>
                                                <th>Status</th>
                                                <th>Date of Birth</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>';

                                                        while ($row = $result->fetch_assoc()) {

                                                            $status = $row['acc_state'];
                                                            if ($status == "active") {
                                                                $st = '<p class="text-success">ACTIVE</p>';
                                                                $stl = '<a href="pages/make_sd_in.php?id=' . $row['writer_id'] . '">Make Inactive</a>';
                                                            } else {
                                                                $st = '<p class="text-danger">'.$row['acc_state'].'</p>';
                                                                $stl = '<a href="pages/make_sd_ac.php?id=' . $row['writer_id'] . '">Make Active</a>';
                                                            }
                                                            print '
										       <tr>
                                                <td>' . $row['Fname'] . ' ' . $row['Lname'] . '</td>
												<td>' . $row['gender'] . '</td>
                                                <td>' . $row['subject1'] . '</td>
                                                <td>' . $st . '</td>
												<td>' . $row['date of birth'] . '</td>
                                                <td><div class="btn-group" role="group">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    Select Action
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>' . $stl . '</li>
													<li><a href="edit-writer.php?sid=' . $row['writer_id'] . '">Edit writer</a></li>
													<li><a href="view-writer.php?sid=' . $row['writer_id'] . '">View writer</a></li>
                                                    <li><a'; ?> onclick = "return confirm('Drop <?php echo $row['first_name']; ?> ?')" <?php print ' href="pages/drop_sd.php?id=' . $row['user_id'] . '">Drop writer</a></li>
                                                </ul>
                                            </div></td>
          
                                            </tr>';
                                                        }

                                                        print '
									   </tbody>
                                       </table>  ';
                                                    } else {
                                                        print '
												<div class="alert alert-info" role="alert">
                                        Nothing was found in database.
                                    </div>';

                                                    }
                                                    $conn->close();

                                                    ?>


                                                </div>

                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="tabo6">
                                                <div class="table-responsive">
                                                    <?php
                                                    $conn=getConnection();
                                                    $sql = "SELECT * FROM writers WHERE acc_state='active' ORDER BY Fname desc";
                                                    $result = $conn->query($sql);

                                                    if ($result->num_rows > 0) {
                                                        print '
										<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
												<th>Gender</th>
												<th>Category</th>
                                                <th>Status</th>
                                                <th>Date of Birth</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
												<th>Gender</th>
												<th>Category</th>
                                                <th>Status</th>
                                                <th>Date of Birth</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>';

                                                        while ($row = $result->fetch_assoc()) {

                                                            $status = $row['acc_state'];
                                                            if ($status == "active") {
                                                                $st = '<p class="text-success">ACTIVE</p>';
                                                                $stl = '<a href="pages/make_sd_in.php?id=' . $row['writer_id'] . '">Make Inactive</a>';
                                                            } else {
                                                                $st = '<p class="text-danger">'.$row['acc_state'].'</p>';
                                                                $stl = '<a href="pages/make_sd_ac.php?id=' . $row['writer_id'] . '">Make Active</a>';
                                                            }
                                                            print '
										       <tr>
                                                <td>' . $row['Fname'] . ' ' . $row['Lname'] . '</td>
												<td>' . $row['gender'] . '</td>
                                                <td>' . $row['subject1'] . '</td>
                                                <td>' . $st . '</td>
												<td>' . $row['date of birth'] . '</td>
                                                <td><div class="btn-group" role="group">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    Select Action
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>' . $stl . '</li>
													<li><a href="edit-writer.php?sid=' . $row['writer_id'] . '">Edit writer</a></li>
													<li><a href="view-writer.php?sid=' . $row['writer_id'] . '">View writer</a></li>
                                                    <li><a'; ?> onclick = "return confirm('Drop <?php echo $row['first_name']; ?> ?')" <?php print ' href="pages/drop_sd.php?id=' . $row['user_id'] . '">Drop writer</a></li>
                                                </ul>
                                            </div></td>
          
                                            </tr>';
                                                        }

                                                        print '
									   </tbody>
                                       </table>  ';
                                                    } else {
                                                        print '
												<div class="alert alert-info" role="alert">
                                        Nothing was found in database.
                                    </div>';

                                                    }
                                                    $conn->close();

                                                    ?>


                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="tabo7">
                                                <div class="table-responsive">
                                                    <?php
                                                    $conn=getConnection();
                                                    $sql = "SELECT * FROM writers WHERE acc_state='probation' or acc_state='pending' ORDER BY Fname DESC";
                                                    $result = $conn->query($sql);

                                                    if ($result->num_rows > 0) {
                                                        print '
										<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
												<th>Gender</th>
												<th>Category</th>
                                                <th>Status</th>
                                                <th>Date of Birth</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
												<th>Gender</th>
												<th>Category</th>
                                                <th>Status</th>
                                                <th>Date of Birth</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>';

                                                        while ($row = $result->fetch_assoc()) {

                                                            $status = $row['acc_state'];
                                                            if ($status == "active") {
                                                                $st = '<p class="text-success">ACTIVE</p>';
                                                                $stl = '<a href="pages/make_sd_in.php?id=' . $row['writer_id'] . '">Make Inactive</a>';
                                                            } else {
                                                                $st = '<p class="text-danger">'.$row['acc_state'].'</p>';
                                                                $stl = '<a href="pages/make_sd_ac.php?id=' . $row['writer_id'] . '">Make Active</a>';
                                                            }
                                                            print '
										       <tr>
                                                <td>' . $row['Fname'] . ' ' . $row['Lname'] . '</td>
												<td>' . $row['gender'] . '</td>
                                                <td>' . $row['subject1'] . '</td>
                                                <td>' . $st . '</td>
												<td>' . $row['date of birth'] . '</td>
                                                <td><div class="btn-group" role="group">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    Select Action
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>' . $stl . '</li>
													<li><a href="edit-writer.php?sid=' . $row['writer_id'] . '">Edit writer</a></li>
													<li><a href="view-writer.php?sid=' . $row['writer_id'] . '">View writer</a></li>
                                                    <li><a'; ?> onclick = "return confirm('Drop <?php echo $row['first_name']; ?> ?')" <?php print ' href="pages/drop_sd.php?id=' . $row['user_id'] . '">Drop writer</a></li>
                                                </ul>
                                            </div></td>
          
                                            </tr>';
                                                        }

                                                        print '
									   </tbody>
                                       </table>  ';
                                                    } else {
                                                        print '
												<div class="alert alert-info" role="alert">
                                        Nothing was found in database.
                                    </div>';

                                                    }
                                                    $conn->close();

                                                    ?>


                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="tabo8">
                                                <div class="table-responsive">
                                                    <?php
                                                    $conn=getConnection();
                                                    $sql = "SELECT * FROM writers WHERE acc_state='suspended' or acc_state='blocked' ORDER BY Fname DESC";
                                                    $result = $conn->query($sql);

                                                    if ($result->num_rows > 0) {
                                                        print '
										<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
												<th>Gender</th>
												<th>Category</th>
                                                <th>Status</th>
                                                <th>Date of Birth</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
												<th>Gender</th>
												<th>Category</th>
                                                <th>Status</th>
                                                <th>Date of Birth</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>';

                                                        while ($row = $result->fetch_assoc()) {

                                                            $status = $row['acc_state'];
                                                            if ($status == "active") {
                                                                $st = '<p class="text-success">ACTIVE</p>';
                                                                $stl = '<a href="pages/make_sd_in.php?id=' . $row['writer_id'] . '">Make Inactive</a>';
                                                            } else {
                                                                $st = '<p class="text-danger">'.$row['acc_state'].'</p>';
                                                                $stl = '<a href="pages/make_sd_ac.php?id=' . $row['writer_id'] . '">Make Active</a>';
                                                            }
                                                            print '
										       <tr>
                                                <td>' . $row['Fname'] . ' ' . $row['Lname'] . '</td>
												<td>' . $row['gender'] . '</td>
                                                <td>' . $row['subject1'] . '</td>
                                                <td>' . $st . '</td>
												<td>' . $row['date of birth'] . '</td>
                                                <td><div class="btn-group" role="group">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    Select Action
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>' . $stl . '</li>
													<li><a href="edit-writer.php?sid=' . $row['writer_id'] . '">Edit writer</a></li>
													<li><a href="view-writer.php?sid=' . $row['writer_id'] . '">View writer</a></li>
                                                    <li><a'; ?> onclick = "return confirm('Drop <?php echo $row['first_name']; ?> ?')" <?php print ' href="pages/drop_sd.php?id=' . $row['user_id'] . '">Drop writer</a></li>
                                                </ul>
                                            </div></td>
          
                                            </tr>';
                                                        }

                                                        print '
									   </tbody>
                                       </table>  ';
                                                    } else {
                                                        print '
												<div class="alert alert-info" role="alert">
                                        Nothing was found in database.
                                    </div>';

                                                    }
                                                    $conn->close();

                                                    ?>


                                                </div>
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="tabo9">
                                                <div class="table-responsive">
                                                    <?php
                                                    $conn=getConnection();
                                                    $sql = "SELECT * FROM writers WHERE acc_state='active' ORDER BY orders_completed,rating,takes,warnings asc";
                                                    $result = $conn->query($sql);

                                                    if ($result->num_rows > 0) {
                                                        print '
										<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
												<th>Rating</th>
												<th>Category</th>
                                                <th>Orders Completed</th>
                                                <th>Reviews</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
												<th>Rating</th>
												<th>Category</th>
                                                <th>Orders Completed</th>
                                                <th>Takes</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>';

                                                        while ($row = $result->fetch_assoc()) {

                                                            $status = $row['acc_state'];
                                                            if ($status == "active") {
                                                                $st = '<p class="text-success">ACTIVE</p>';
                                                                $stl = '<a href="pages/make_sd_in.php?id=' . $row['writer_id'] . '">Make Inactive</a>';
                                                            } else {
                                                                $st = '<p class="text-danger">'.$row['acc_state'].'</p>';
                                                                $stl = '<a href="pages/make_sd_ac.php?id=' . $row['writer_id'] . '">Make Active</a>';
                                                            }
                                                            print '
										       <tr>
                                                <td>' . $row['Fname'] . ' ' . $row['Lname'] . '</td>
												<td>' . $row['rating'] . '</td>
                                                <td>' . $row['subject1'] . '</td>
                                                <td>' . $row['orders_completed'] . '</td>
												<td>' . $row['Takes'] . '</td>
                                                <td><div class="btn-group" role="group">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    Select Action
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>' . $stl . '</li>
													<li><a href="edit-writer.php?sid=' . $row['writer_id'] . '">Edit writer</a></li>
													<li><a href="view-writer.php?sid=' . $row['writer_id'] . '">View writer</a></li>
                                                    <li><a'; ?> onclick = "return confirm('Drop <?php echo $row['first_name']; ?> ?')" <?php print ' href="pages/drop_sd.php?id=' . $row['user_id'] . '">Drop writer</a></li>
                                                </ul>
                                            </div></td>
          
                                            </tr>';
                                                        }

                                                        print '
									   </tbody>
                                       </table>  ';
                                                    } else {
                                                        print '
												<div class="alert alert-info" role="alert">
                                        Nothing was found in database.
                                    </div>';

                                                    }
                                                    $conn->close();

                                                    ?>


                                                </div>
                                            </div>

                                        </div>
                                    </div>
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