<?php 
include 'includes/check_user.php'; 
include 'includes/check_reply.php';
session_start();
$writer_id=$_SESSION['my_id'];
?>
<!DOCTYPE html>
<html>
   
<head>
        
        <title><?php $_COOKIE['ckid']; ?> | My Subjects</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Writer registration" />
        <meta name="keywords" content="<?php $_SERVER['SERVER_NAME']; ?>" />
        <meta name="author" content="Moffat Mugwanjira" />

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
        <link href="../assets/plugins/x-editable/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" type="text/css">
        <link href="../assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>
		<link href="../assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/images/icon.png" rel="icon">
        <link href="../assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/themes/green.css" class="theme-color" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/custom.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/css/snack.css" rel="stylesheet" type="text/css"/>
        <script src="../assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <script src="../assets/plugins/offcanvasmenueffects/js/snap.svg-min.js"></script>
		

        
    </head>
    <body <?php if ($ms == "1") { print 'onload="myFunction()"'; } ?>  class="page-header-fixed">
        <div class="overlay"></div>
        <div class="menu-wrap">
            <nav class="profile-menu">
                <div class="profile">
				<?php 
				if ($myavatar == NULL) {
				print' <img width="60" src="../assets/images/'.$mygender.'.png" alt="'.$myfname.'">';
				}else{
				echo '<img src="data:image/jpeg;base64,'.base64_encode($myavatar).'" width="60" alt="'.$myfname.'"/>';	
				}
						
				?>
				<span><?php echo "$myfname"; ?> <?php echo "$mylname"; ?></span></div>
                <div class="profile-menu-list">
                    <a href="profile.php"><i class="fa fa-user"></i><span>Profile</span></a>
                    <a href="logout.php"><i class="fa fa-sign-out"></i><span>Logout</span></a>
                </div>
            </nav>
            <button class="close-button" id="close-button">Close Menu</button>
        </div>
        <main class="page-content content-wrap">
            <div class="navbar">
               <?php getContextHeader();?>

                <div class="page-inner">
                    <div class="page-title">
                        <h3>My Orders</h3>


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

                                                        <li role="presentation" class="active"><a href="#tabo5" role="tab"
                                                                                                  data-toggle="tab">Available
                                                                Orders</a></li>
                                                        <li role="presentation"><a href="#tabo6" role="tab" data-toggle="tab">In
                                                                progress</a></li>
                                                        <li role="presentation"><a href="#tabo7" role="tab" data-toggle="tab">Completed</a>
                                                        </li>
                                                        <li role="presentation"><a href="#tabo8" role="tab" data-toggle="tab">Pending Approval</a></li>
                                                        <li role="presentation"><a href="#tabo9" role="tab" data-toggle="tab">Failed orders</a></li>
                                                        <li role="presentation"><a href="#tabu1" role="tab" class="alert-danger" data-toggle="tab">For
                                                                revison</a></li>


                                                    </ul>

                                                    <div class="tab-content">
                                                        <div role="tabpanel" class="tab-pane active fade in" id="tabo5">
                                                            <div class="table-responsive">
                                                                <?php
                                                                $conn = getConnection();
                                                                $sql = "SELECT * FROM orders WHERE state='available' ORDER BY due_date DESC";
                                                                $result = $conn->query($sql);

                                                                if ($result->num_rows > 0) {
                                                                    print '
										<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
												<th>Title</th>
												<th>Subject</th>
                                                <th>Format</th>
                                                <th>Additional information</th>
                                                <th>Pages</th>
                                                <th>Cost per Page</th>
                                                <th>Order Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Order ID</th>
												<th>Title</th>
												<th>Subject</th>
                                                <th>Format</th>
                                                <th>Additional information</th>
                                                <th>Pages</th>
                                              <th>Cost per Page</th>
                                                <th>Order Total</th>
                                                
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>';

                                                                    while ($row = $result->fetch_assoc()) {

                                                                        $status = $row['state'];
                                                                        if ($status == "available") {

                                                                            $stl = '<a href="/writer/orderDetails.php?order_id=' . $row['order_id'] . '">View Order</a>';
                                                                        } else {
                                                                            $st = '<p class="text-danger">' . $row['state'] . '</p>';
                                                                            $stl = '<a href="/writer/orderDetails.php?order_id=' . $row['order_id'] . '">Upload Solution</a>';
                                                                        }
                                                                        print '
										       <tr>
                                                <td>' . $row['order_id'] . ' </td>
                                                <td>' . $row['title'] . '</td>
                                                <td>' . $row['subject'] . '</td>
                                                <td>' . $row['Format'] . '</td>
												<td>' . $row['descri'] . '</td>
                                                <td>' . $row['pages'] . '</td>
                                                <td>' . $row['order_total']/$row['pages'] * 0.4. '</td>
                                                <td>'.$row['order_total']*0.4.'</td>
												
                                                <td><div class="btn-group" role="group">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    Select Action
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>' . $stl . '</li>
													<li><a href="/writer/orderDetails.php?order_id=' . $row['order_id'] . '">View Order Details</a></li>
													
                                                    
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
                                                        <div role="tabpanel" class="tab-pane fade in" id="tabo6">
                                                            <div class="table-responsive">
                                                                <?php
                                                                $conn = getConnection();
                                                                $sql = "SELECT * FROM orders WHERE state='progress' and writer_id=$writer_id ORDER BY due_date DESC";
                                                                $result = $conn->query($sql);

                                                                if ($result->num_rows > 0) {
                                                                    print '
										<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
												<th>Title</th>
												<th>Subject</th>
                                                <th>Format</th>
                                                <th>Additional information</th>
                                                <th>Pages</th>
                                                <th>Cost per Page</th>
                                                <th>Order Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Order ID</th>
												<th>Title</th>
												<th>Subject</th>
                                                <th>Format</th>
                                                <th>Additional information</th>
                                                <th>Pages</th>
                                              <th>Cost per Page</th>
                                                <th>Order Total</th>
                                                
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>';

                                                                    while ($row = $result->fetch_assoc()) {

                                                                        $status = $row['state'];
                                                                        if ($status == "available") {

                                                                            $stl = '<a href="/writer/orderDetails.php?order_id=' . $row['order_id'] . '">View Order</a>';
                                                                        } else {
                                                                            $st = '<p class="text-danger">' . $row['state'] . '</p>';
                                                                            $stl = '<a href="/writer/orderDetails.php?order_id=' . $row['order_id'] . '">Upload Solution</a>';
                                                                        }
                                                                        print '
										       <tr>
                                                <td>' . $row['order_id'] . ' </td>
                                                <td>' . $row['title'] . '</td>
                                                <td>' . $row['subject'] . '</td>
                                                <td>' . $row['Format'] . '</td>
												<td>' . $row['descri'] . '</td>
                                                <td>' . $row['pages'] . '</td>
                                                <td>' . $row['order_total']/$row['pages'] * 0.4. '</td>
                                                <td>'.$row['order_total']*0.4.'</td>
												
                                                <td><div class="btn-group" role="group">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    Select Action
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>' . $stl . '</li>
													<li><a href="/writer/orderDetails.php?order_id=' . $row['order_id'] . '">View Order Details</a></li>
													
                                                    
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
                                                        <div role="tabpanel" class="tab-pane fade in" id="tabo7">
                                                            <div class="table-responsive">
                                                                <?php
                                                                $conn = getConnection();
                                                                $sql = "SELECT * FROM orders WHERE state='completed' and writer_id=$writer_id ORDER BY due_date DESC";
                                                                $result = $conn->query($sql);

                                                                if ($result->num_rows > 0) {
                                                                    print '
										<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
												<th>Title</th>
												<th>Subject</th>
                                                <th>Format</th>
                                                <th>Additional information</th>
                                                <th>Pages</th>
                                                <th>Cost per Page</th>
                                                <th>Order Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Order ID</th>
												<th>Title</th>
												<th>Subject</th>
                                                <th>Format</th>
                                                <th>Additional information</th>
                                                <th>Pages</th>
                                              <th>Cost per Page</th>
                                                <th>Order Total</th>
                                                
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>';

                                                                    while ($row = $result->fetch_assoc()) {

                                                                        $status = $row['state'];
                                                                        if ($status == "available") {

                                                                            $stl = '<a href="/writer/orderDetails.php?order_id=' . $row['order_id'] . '">View Order</a>';
                                                                        } else {
                                                                            $st = '<p class="text-danger">' . $row['state'] . '</p>';
                                                                            $stl = '<a href="/writer/orderDetails.php?order_id=' . $row['order_id'] . '">Upload Solution</a>';
                                                                        }
                                                                        print '
										       <tr>
                                                <td>' . $row['order_id'] . ' </td>
                                                <td>' . $row['title'] . '</td>
                                                <td>' . $row['subject'] . '</td>
                                                <td>' . $row['Format'] . '</td>
												<td>' . $row['descri'] . '</td>
                                                <td>' . $row['pages'] . '</td>
                                                <td>' . $row['order_total']/$row['pages'] * 0.4. '</td>
                                                <td>'.$row['order_total']*0.4.'</td>
												
                                                <td><div class="btn-group" role="group">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    Select Action
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>' . $stl . '</li>
													<li><a href="/writer/orderDetails.php?order_id=' . $row['order_id'] . '">View Order Details</a></li>
													
                                                    
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
                                                        <div role="tabpanel" class="tab-pane fade in" id="tabo8">
                                                            <div class="table-responsive">
                                                                <?php
                                                                $conn = getConnection();
                                                                $sql = "SELECT * FROM orders WHERE state='pending' and writer_id=$writer_id ORDER BY due_date DESC";
                                                                $result = $conn->query($sql);

                                                                if ($result->num_rows > 0) {
                                                                    print '
										<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
												<th>Title</th>
												<th>Subject</th>
                                                <th>Format</th>
                                                <th>Additional information</th>
                                                <th>Pages</th>
                                                <th>Cost per Page</th>
                                                <th>Order Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Order ID</th>
												<th>Title</th>
												<th>Subject</th>
                                                <th>Format</th>
                                                <th>Additional information</th>
                                                <th>Pages</th>
                                              <th>Cost per Page</th>
                                                <th>Order Total</th>
                                                
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>';

                                                                    while ($row = $result->fetch_assoc()) {

                                                                        $status = $row['state'];
                                                                        if ($status == "available") {

                                                                            $stl = '<a href="/writer/orderDetails.php?order_id=' . $row['order_id'] . '">View Order</a>';
                                                                        } else {
                                                                            $st = '<p class="text-danger">' . $row['state'] . '</p>';
                                                                            $stl = '<a href="/writer/orderDetails.php?order_id=' . $row['order_id'] . '">Upload Solution</a>';
                                                                        }
                                                                        print '
										       <tr>
                                                <td>' . $row['order_id'] . ' </td>
                                                <td>' . $row['title'] . '</td>
                                                <td>' . $row['subject'] . '</td>
                                                <td>' . $row['Format'] . '</td>
												<td>' . $row['descri'] . '</td>
                                                <td>' . $row['pages'] . '</td>
                                                <td>' . $row['order_total']/$row['pages'] * 0.4. '</td>
                                                <td>'.$row['order_total']*0.4.'</td>
												
                                                <td><div class="btn-group" role="group">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    Select Action
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>' . $stl . '</li>
													<li><a href="/writer/orderDetails.php?order_id=' . $row['order_id'] . '">View Order Details</a></li>
													
                                                    
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
                                                        <div role="tabpanel" class="tab-pane fade in" id="tabo9">
                                                            <div class="table-responsive">
                                                                <?php
                                                                $conn = getConnection();
                                                                $sql = "SELECT * FROM orders WHERE state='failed' and writer_id=$writer_id ORDER BY due_date DESC";
                                                                $result = $conn->query($sql);

                                                                if ($result->num_rows > 0) {
                                                                    print '
										<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
												<th>Title</th>
												<th>Subject</th>
                                                <th>Format</th>
                                                <th>Additional information</th>
                                                <th>Pages</th>
                                                <th>Cost per Page</th>
                                                <th>Order Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Order ID</th>
												<th>Title</th>
												<th>Subject</th>
                                                <th>Format</th>
                                                <th>Additional information</th>
                                                <th>Pages</th>
                                              <th>Cost per Page</th>
                                                <th>Order Total</th>
                                                
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>';

                                                                    while ($row = $result->fetch_assoc()) {

                                                                        $status = $row['state'];
                                                                        if ($status == "available") {

                                                                            $stl = '<a href="/writer/orderDetails.php?order_id=' . $row['order_id'] . '">View Order</a>';
                                                                        } else {
                                                                            $st = '<p class="text-danger">' . $row['state'] . '</p>';
                                                                            $stl = '<a href="/writer/orderDetails.php?order_id=' . $row['order_id'] . '">Upload Solution</a>';
                                                                        }
                                                                        print '
										       <tr>
                                                <td>' . $row['order_id'] . ' </td>
                                                <td>' . $row['title'] . '</td>
                                                <td>' . $row['subject'] . '</td>
                                                <td>' . $row['Format'] . '</td>
												<td>' . $row['descri'] . '</td>
                                                <td>' . $row['pages'] . '</td>
                                                <td>' . $row['order_total']/$row['pages'] * 0.4. '</td>
                                                <td>'.$row['order_total']*0.4.'</td>
												
                                                <td><div class="btn-group" role="group">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    Select Action
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>' . $stl . '</li>
													<li><a href="/writer/orderDetails.php?order_id=' . $row['order_id'] . '">View Order Details</a></li>
													
                                                    
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
                                                        <div role="tabpanel" class="tab-pane fade in" id="tabu1">
                                                            <div class="table-responsive">
                                                                <?php
                                                                $conn = getConnection();
                                                                $sql = "SELECT * FROM orders WHERE state='revision' and writer_id=$writer_id ORDER BY due_date DESC";
                                                                $result = $conn->query($sql);

                                                                if ($result->num_rows > 0) {
                                                                    print '
										<table id="example" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th>Order ID</th>
												<th>Title</th>
												<th>Subject</th>
                                                <th>Format</th>
                                                <th>Additional information</th>
                                                <th>Pages</th>
                                                <th>Cost per Page</th>
                                                <th>Order Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Order ID</th>
												<th>Title</th>
												<th>Subject</th>
                                                <th>Format</th>
                                                <th>Additional information</th>
                                                <th>Pages</th>
                                              <th>Cost per Page</th>
                                                <th>Order Total</th>
                                                
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>';

                                                                    while ($row = $result->fetch_assoc()) {

                                                                        $status = $row['state'];
                                                                        if ($status == "available") {

                                                                            $stl = '<a href="/writer/orderDetails.php?order_id=' . $row['order_id'] . '">View Order</a>';
                                                                        } elseif($status=='progress') {
                                                                            $st = '<p class="text-danger">' . $row['state'] . '</p>';
                                                                            $stl = '<a href="/writer/orderDetails.php?order_id=' . $row['order_id'] . '">Upload Solution</a>';
                                                                        }elseif ($status=='revision'){

                                                                        }elseif ('pending'){

                                                                        }
                                                                        print '
										       <tr>
                                                <td>' . $row['order_id'] . ' </td>
                                                <td>' . $row['title'] . '</td>
                                                <td>' . $row['subject'] . '</td>
                                                <td>' . $row['Format'] . '</td>
												<td>' . $row['descri'] . '</td>
                                                <td>' . $row['pages'] . '</td>
                                                <td>' . $row['order_total']/$row['pages'] * 0.4. '</td>
                                                <td>'.$row['order_total']*0.4.'</td>
												
                                                <td><div class="btn-group" role="group">
                                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    Select Action
                                                    <span class="caret"></span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li>' . $stl . '</li>
													<li><a href="/writer/orderDetails.php?order_id=' . $row['order_id'] . '">View Order Details</a></li>
													
                                                    
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
?> <div class="alert alert-success" id="snackbar"><?php echo "$description"; ?></div> <?php	
}else{
	
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
		

		<script>
function myFunction() {
    var x = document.getElementById("snackbar")
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
}
</script></body>

</html>