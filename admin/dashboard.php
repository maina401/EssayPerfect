<?php include('../functions/template.php');
session_start();
if (!isAdmin()) {
    header('location:../errors/403.html');
} ?>
<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">

    <meta name="author" content="">

    <title>Control Panel</title>

    <?php getBootsrap(); ?>


</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">

<!-- Navigation-->

<?php getAdminHeader(); ?>


<div class="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->

        <ol class="breadcrumb">

            <li class="breadcrumb-item">

                <a href="#">Dashboard</a>

            </li>

            <li class="breadcrumb-item active">My Dashboard</li>

        </ol>

        <!-- Icon Cards-->

        <?php
        $conn = getConnection();

        $sqll = "SELECT  count(*) from writers ";

        if (mysqli_query($conn, $sqll)) {

            echo "";

        } else {

            echo "Error: " . $sqll . "<br>" . mysqli_error($conn);

        }

        $result = mysqli_query($conn, $sqll);

        if (mysqli_num_rows($result) > 0)

        {

        // output data of each row

        while ($row = mysqli_fetch_assoc($result))

        {

        ?>

        <div class="row">

            <div class="col-xl-3 col-sm-6 mb-3">

                <div class="card text-white bg-primary o-hidden h-100">

                    <div class="card-body">

                        <div class="card-body-icon">

                            <i class="fa fa-fw fa-comments"></i>

                        </div>

                        <div class="mr-5"><?php echo $row['count(*)']; ?> Writers</div>

                    </div>

                    <a class="card-footer text-white clearfix small z-1" href="/writer/new/admin/writers.php">

                        <span class="float-left text-dark">View Details</span>

                        <span class="float-right">

<i class="fa fa-angle-right"></i>

</span>

                    </a>

                </div>

            </div>

            <div class="col-xl-3 col-sm-6 mb-3">

                <div class="card text-white bg-warning o-hidden h-100">

                    <div class="card-body">

                        <div class="card-body-icon">

                            <i class="fa fa-fw fa-list"></i>

                        </div>

                        <div class="mr-5"><?php
                            $sqll = 'SELECT SUM(revenue) from orders';
                            if (mysqli_query($conn, $sqll)) {

                                echo "";

                            } else {

                                echo "Error: " . $sqll . "<br>" . mysqli_error($conn);

                            }

                            $result = mysqli_query($conn, $sqll);

                            if (mysqli_num_rows($result) > 0) {

                                // output data of each row

                                while ($row = mysqli_fetch_assoc($result)) {


                                    echo '$' . $row['SUM(revenue)']; ?> Revenue<?php }
                            } ?></div>

                    </div>

                    <?php

                    }

                    }

                    else {

                        echo '0 results';

                    }

                    ?>

                    <a class="card-footer text-white clearfix small z-1" href="data/?param=sales">

                        <span class="float-left text-dark">View Details</span>

                        <span class="float-right">

<i class="fa fa-angle-right"></i>

</span>

                    </a>

                </div>

            </div>

            <div class="col-xl-3 col-sm-6 mb-3">

                <div class="card text-white bg-success o-hidden h-100">

                    <div class="card-body">

                        <div class="card-body-icon">

                            <i class="fa fa-fw fa-shopping-cart"></i>

                        </div>

                        <div class="mr-5"><?php
                            $conn = getConnection();

                            $sqll = "SELECT  count(*) from orders where state='available'";

                            if (mysqli_query($conn, $sqll)) {

                                echo "";

                            } else {

                                echo "Error: " . $sqll . "<br>" . mysqli_error($conn);

                            }

                            $result = mysqli_query($conn, $sqll);

                            if (mysqli_num_rows($result) > 0) {

                                // output data of each row

                                while ($row = mysqli_fetch_assoc($result)) {

                                    echo $row['count(*)']; ?> New Orders!<?php
                                }
                            }
                            ?></div>

                    </div>

                    <a class="card-footer text-white clearfix small z-1" href="/writer/new/admin/orders.php">

                        <span class="float-left text-dark">View Details</span>

                        <span class="float-right">

<i class="fa fa-angle-right"></i>

</span>

                    </a>

                </div>

            </div>
            <div class="col-xl-3 col-sm-6 mb-3">

                <div class="card text-white bg-info o-hidden h-100">

                    <div class="card-body">

                        <div class="card-body-icon">
                            <i class="fa fa-fw fa-podcast"></i>
                        </div>

                        <?php $conn=getConnection();
                        $sql="SELECT COUNT(*) as newbies FROM writers WHERE acc_state='pending'";
                        $result=$conn->query($sql);
                        $row=$result->fetch_assoc();
                        echo $row['newbies'];
                        ?> New Applications
                    </div>


                    <a class="card-footer text-white clearfix small z-1" href="/writer/new/admin/writers.php">

                        <span class="float-left text-dark">View Details</span>

                        <span class="float-right">

<i class="fa fa-angle-right"></i>

</span>

                    </a>

                </div>

            </div>

            <div class="col-xl-3 col-sm-6 mb-3">

                <div class="card text-white bg-danger o-hidden h-100">

                    <div class="card-body">

                        <div class="card-body-icon">

                            <i class="fa fa-fw fa-support"></i>

                        </div>

                        <div class="mr-5"><?php
                            $conn = getConnection();

                            $sqll = "SELECT  count(*) from clients where status='new'";

                            if (mysqli_query($conn, $sqll)) {

                                echo "";

                            } else {

                                echo "Error: " . $sqll . "<br>" . mysqli_error($conn);

                            }

                            $result = mysqli_query($conn, $sqll);

                            if (mysqli_num_rows($result) > 0) {

                                // output data of each row

                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo $row['count(*)'];
                                    ?> New Clients!<?php
                                }
                            }
                            ?></div>
                    </div>

                    <a class="card-footer text-white clearfix small z-1" href="/writer/new/admin">

                        <span class="float-left text-dark">View Details</span>

                        <span class="float-right">

<i class="fa fa-angle-right"></i>

</span>

                    </a>

                </div>

            </div>

        </div>

        <?php


        $conn = getConnection();

        $sqlll = "SELECT COUNT(order_id) from orders WHERE state='completed'";

        if (mysqli_query($conn, $sqlll)) {

            echo "";

        } else {

            echo "Error: " . $sqlll . "<br>" . mysqli_error($conn);

        }

        $result = mysqli_query($conn, $sqlll);

        $number = array();

        if (mysqli_num_rows($result) > 0) {

// output data of each row

            while ($row = mysqli_fetch_assoc($result)) {

                $number[] = $row['COUNT(order_id)'];

            }

        } else {

            echo "0 results";

        }

        $number_formated = "[" . implode(",", $number) . "]";

        ?>

        <script type="text/javascript">

            function getYAxis() {
                var y = ['1', '2', '3', '4', '5', '6', '7'];
                return y;
            }

            function getXAxis() {
                var x =<?php echo $number_formated; ?>
                return x;
            }

        </script>

        <!-- Area Chart Example-->


    <!-- Example DataTables Card-->

    <div class="card mb-3">

        <div class="card-header">

            <i class="fa fa-optin-monster"></i>
            <form id="myform" action="" method="GET">
                <input type="radio" name="range" onchange='this.form.submit();' value="available">Available</input>&nbsp;&nbsp;|&nbsp;&nbsp;
                <input type="radio" name="range" onchange='this.form.submit();'
                       value="unassigned">Unassigned</input>&nbsp;&nbsp;|&nbsp;&nbsp;
                <input type="radio" name="range" onchange='this.form.submit();' value="assigned">Assigned</input>&nbsp;&nbsp;|&nbsp;&nbsp;
                <input type="radio" name="range" onchange='this.form.submit();' value="completed">Completed</input>&nbsp;&nbsp;|&nbsp;&nbsp;
                <input type="radio" name="range" onchange='this.form.submit();' value="progress">In Progress</input>&nbsp;&nbsp;|&nbsp;&nbsp;
                <input type="radio" name="range" onchange='this.form.submit();' value="failed">Cancelled</input>&nbsp;&nbsp;|&nbsp;&nbsp;
            </form>
        </div>

        <div class="card-body">

            <div class="table-responsive" id="table">

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                    <thead>

                    <tr>

                        <th>Order ID</th>

                        <th>Order Title</th>

                        <th>Total Price</th>

                        <th>Pool Price</th>

                        <th>Pages</th>
                        <th>Subject</th>
                        <th>Format</th>
                        <th>Deadline</th>
                        <th>Additional Files</th>
                        <th>Action</th>

                    </tr>

                    </thead>

                    <tfoot>

                    <tr>

                        <th>Order ID</th>

                        <th>Order Title</th>

                        <th>Total Price</th>

                        <th>Pool Price</th>

                        <th>Pages</th>
                        <th>Subject</th>
                        <th>Format</th>
                        <th>Deadline</th>
                        <th>Additional Files</th>
                        <th>Action</th>

                    </tr>

                    </tfoot>

                    <?php
                    $conn = getConnection();
                    $today = time() - 60;
                    $sql = "SELECT * from orders where state='" . $_GET['range'] . "' ORDER BY `orders`.`start_date` DESC";

                    if (mysqli_query($conn, $sql)) {

                        echo "";

                    } else {

                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);

                    }

                    $count = 1;

                    $result = mysqli_query($conn, $sql) or die($conn->error);

                    if (mysqli_num_rows($result) > 0) {

// output data of each row

                        while ($row = mysqli_fetch_assoc($result)) { ?>

                            <tbody>

                            <tr>

                                <th>

                                    <?php echo $row['order_id']; ?>

                                </th>

                                <td>

                                    <?php echo $row['title']; ?>

                                </td>

                                <td>

                                    <?php echo $row['order_total']; ?>

                                </td>

                                <td>

                                    <?php echo $row['order_total'] * 0.5; ?>

                                </td>
                                <td>

                                    <?php echo $row['pages']; ?>

                                </td>
                                <td>

                                    <?php echo $row['category']; ?>

                                </td>
                                <td>

                                    <?php echo $row['Format']; ?>

                                </td>
                                <td>

                                    <?php echo date('M j Y g:i A', strtotime($row['due_date'])); ?>

                                </td>

                                <td>
                                    <a href="/uploads/<?php echo $row['add_files']; ?>" download=""><img
                                                src="img/icon_add_files.png" height="16" width="25"></a>
                                    <?php echo $row['add_files']; ?>

                                </td>
                                <td>
                                    <!-- Example single danger button -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger dropdown-toggle"
                                                data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                            Action
                                        </button>
                                        <div class="dropdown-menu">
                                            <?php
                                            if ($_GET['range'] == 'completed') {
                                                echo '<a class="dropdown-item" href="/writer/orderDetails.php?njetrp=@ert1qr)^^&access=}4279ewI*3bka&order_id=' . $row['order_id'] . '">Delete Order</a>';
                                            }
                                            if ($_GET['range'] == 'available') {
                                                echo '<a class="dropdown-item" href="/writer/orderDetails.php?njetrp=@ert1qr)^^&access=}4279ewI*3bka&order_id=' . $row['order_id'] . '">View Order</a>';
                                            }
                                            ?>


                                            <a class="dropdown-item" href="/writer/orderDetails.php?njetrp=@ert1qr)^^&access=}4279ewI*3bka&order_id=' . $row['order_id'] . '">View Details</a>
                                            <a class="dropdown-item" href="/writer/new/admin/pages/add_exam.php?order_id=<?php echo $row['order_id'];?>&action=assign">Assign to</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">View Status</a>
                                        </div>
                                    </div>

                                </td>


                            </tr>

                            </tbody>

                            <?php

                            $count++;

                        }

                    } else {

                        echo '0 results';

                    }

                    ?>

                </table>

            </div>

        </div>

        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>

    </div>

</div>

<!-- /.container-fluid-->

<!-- /.content-wrapper-->

<footer class="sticky-footer">

    <div class="container">

        <div class="text-center">

            <small>Copyright © Your Website <?php echo date('Y'); ?></small>

        </div>

    </div>

</footer>

<!-- Scroll to Top Button-->

<a class="scroll-to-top rounded" href="#page-top">

    <i class="fa fa-angle-up"></i>

</a>

<!-- Logout Modal-->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">

    <div class="modal-dialog" role="document">

        <div class="modal-content">

            <div class="modal-header">

                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>

                <button class="close" type="button" data-dismiss="modal" aria-label="Close">

                    <span aria-hidden="true">×</span>

                </button>

            </div>

            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>

            <div class="modal-footer">

                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>

                <a class="btn btn-primary" href="login.html">Logout</a>

            </div>

        </div>

    </div>

</div>

</div>
</body>

</html>