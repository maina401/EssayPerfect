<?php
include('../../functions/template.php');
session_start();
if (!isAdmin()) {
    header('location:/errors/403.html');
}
?>
<!DOCTYPE html>
<html>
<head><title></title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="/writer/js/jquery.dialog.js"></script>
    <script src="/js/notify.js"></script>
    <link rel="Stylesheet" href="/writer/CSS/jquery.dialog.css">
    <link rel="Stylesheet" href="/css/notify.css">

    <?php getBootsrap(); ?>
    <?php $sqlO="SELECT order_id as id, title as title FROM ORDERS WHERE writer_id='unassigned'";
    $conn=getConnection();
    $resultO=$conn->query($sql);
    while ($rowO=mysqli_fetch_assoc($resultO)){
        $available="<div class=\"form-check form-check-inline\">
  <input class=\"form-check-input\" type=\"checkbox\" id=\"inlineCheckbox1\" value=".$rowO['order_id'].">
  <label class=\"form-check-label\" for=\"inlineCheckbox1\">".$rowO['order_id']."</label>
</div>";
    }
    ?>
</head>
<script>
    function confirmApplication(writer_id)
    {
        Notify.confirm({
            title : 'Confirm Approve account',
            html : '',
            ok : function(){

                window.location='/functions/functions.php?writer_id='+writer_id+'&action=active'


            },
            cancel : function(){
                Notify.alert('cancel');
            }
        });


    }
    function block(writer_id) {
        Notify.confirm({
            title : 'Confirm Lift Ban',
            html : '<b>Are you sure you want to lift this ban?</b>',
            ok : function(){

                window.location='/functions/functions.php?writer_id='+writer_id+'&action=a'


            },
            cancel : function(){
                Notify.alert('cancel');
            }
        });
    }
    function assignOrder(writer_id) {
        Notify.confirm({
            title : 'Assign Order',
            html : '<b>Select the order you wish to assign</b><form class="form-inline">\n' +<?php echo $available;?>
                '  <button type="submit" class="btn btn-primary mb-2">Confirm Assign</button>\n' +
                '</form>',
            ok : function(){

                window.location='/functions/functions.php?writer_id='+writer_id+'&action=a'


            },
            cancel : function(){
                Notify.alert('cancel');
            }
        });
    }
    function sendNotif(writer_id) {
        Notify.confirm({
            title : 'Send Notification',
            html : '<form class="form-inline" action="/functions/functions.php" method="get">' +
                '<div class="container-fluid"> <b>Enter A message</b><br><br><div class="form-card"> \n' +
                    '<input type="text" name="msgtitle" placeholder="Enter the title of your Notification" required=""><br><br>' +
                '<textarea class="form-control form-inline" placeholder="Enter Message"  required="required" name="msgBody"></textarea></div>' +
                '<input type="hidden" value="'+writer_id+'" name="writer_id">'+
                '  <button type="submit" class="btn btn-primary mb-2">Send Notification</button>\n' +
                '</div></form>',
            ok : function(){

            },
            cancel : function(){
                Notify.alert('cancel');
            }
        });

    }
</script>
<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<?php getAdminHeader(); ?>
<div class="content-wrapper">

    <div class="card-body">

        <div class="table-responsive" id="table">
<h3>Showing <?php echo $_GET['writer'];?></h3>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">

                <thead>

                <tr>

                    <th>Writer ID</th>

                    <th>Full Name</th>

                    <th>Display Photo</th>

                    <th>Grammar Test marks</th>

                    <th>Essay test</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Certificate</th>
                    <th>Biography</th>
                    <th>Action</th>

                </tr>

                </thead>

                <tfoot>

                <tr>
                    <th>Writer ID</th>

                    <th>Full Name</th>

                    <th>Display Photo</th>

                    <th>Grammar Test marks</th>

                    <th>Essay test</th>
                    <th>Phone Number</th>
                    <th>Email</th>
                    <th>Certificate</th>
                    <th>Biography</th>
                    <th>Action</th>

                </tr>

                </tfoot>

                <?php
                if (isset($_GET['writer'])) {
                    if ($_GET['writer']=='newbies') {
                        $sql = "SELECT * from writers where acc_state='pending' ORDER BY `writers`.`reg_date` ASC";
                    } elseif ($_GET['writer']=='all') {
                        $sql = "SELECT * from writers ORDER BY `writers`.`reg_date` ASC";
                    }
                    else{
                        $sql = "SELECT * from writers where acc_state='active' ORDER BY `writers`.`reg_date` ASC";

                    }

                } elseif (isset($_GET['param'])) {
                    if ($_GET['param']=='clients') {
                        $sql = 'SELECT * from clients';
                    }
                }
                $conn = getConnection();


                if (mysqli_query($conn, $sql)) {



                } else {

                    echo "Error: " . $sql . "<br>" . $conn->error;

                }

                $count = 1;

                $result = mysqli_query($conn, $sql);


                if (mysqli_num_rows($result) > 0) {
// output data of each row


                while ($row = mysqli_fetch_assoc($result)) {
                    $writer_id = $row['writer_id'];
                    $result2 = $conn->query("SELECT * FROM tests where writer_id=.$writer_id") or die($conn->error);
                    while ($row2 = $result2->fetch_assoc()) {
                        $grammar_test = $row2['grammar_test'];
                        $bio = $row2['bio'];
                        $essay = $row2['essay_title'];
                        $essay_sample = $row2['essay_sample'];
                    }

                } ?>

                        <tbody>

                        <tr>

                            <th>

                                <?php echo $row['writer_id']; ?>

                            </th>

                            <td>

                                <?php echo $row['Fname'] . '&nbsp;&nbsp;' . $row['Lname']; ?>

                            </td>

                            <td>
                                <img src="/uploads/profiles/<?php echo $row['writer_id']; ?>.png" width="40px"
                                     height="40px" style="border-radius: 50%">

                            </td>

                            <td>

                                <?php echo $grammar_test; ?>

                            </td>
                            <td>

                                <?php echo $essay; ?>

                            </td>
                            <td>

                                <?php echo $row['phone']; ?>

                            </td>
                            <td>

                                <?php echo $row['email_address']; ?>

                            </td>
                            <td>

                                <?php echo $row['subject1']; ?>

                            </td>
                            <td>

                                <?php echo date('M j Y g:i A', strtotime($row['reg_date'])); ?>

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
                                        if ($row['acc_state'] == 'pending') {
                                            echo '<a class="dropdown-item" href="#" onclick="confirmApplication('.$writer_id.')">Approve Application</a>';
                                        }elseif ($row['acc_state'] == 'suspended'){
                                            echo '<a class="dropdown-item" href="#" onclick="confirmApplication('.$writer_id.')">Lift Ban</a>';

                                        } elseif ($row['acc_state'] == 'active') {
                                            echo '<a class="dropdown-item" href="#" onclick="blockUser('.$writer_id.')">Block user</a>';

                                        } elseif ($row['acc_state'] == 'probation') {
                                            echo '<a class="dropdown-item" href="#" onclick="confirmApplication('.$writer_id.')">Approve Application</a>';

                                        }
                                        ?><a class="dropdown-item" href="#" onclick="assignOrder(<?php echo $writer_id;?>)">Assign Order</a>
                                        <a class="dropdown-item" href="/functions/mail/">Send Email</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="#" onclick="sendNotif(<?php echo $writer_id;?>)">Send Notification</a>
                                    </div>
                                </div>

                            </td>


                        </tr>

                        </tbody>

                        <?php

                        $count++;



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
</div>
</body>
</html>

