<?php include 'includes/check_user.php';

if (isset($_GET['id'])) {

    $id=mysqli_real_escape_string($conn,$_GET['id']);
$conn=getConnection();
    $mycategory = mysqli_real_escape_string($conn,$_GET['exam_type']);
$exam_id = mysqli_real_escape_string($conn, $_GET['id']);
$record_found = 0;
$sql = "SELECT * FROM tbl_examinations WHERE  exam_id= '$id' ORDER BY RAND() LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        setcookie('current_examid',$id,time()+21*60*60,'/');
        setcookie('start_exam',json_encode(5+time()+$row['duration']),time()+5*60+$row['duration'],'/');
	$subject = $row['subject'];
	$exam_name = $row['exam_name'];
	$deadline = $row['date'];
	$duration = $row['duration'];
	$passmark = $row['passmark'];
	$reexam = $row['re_exam'];
	$terms = $row['terms'];
	$status = $row['status'];
	$today_date = date('Y/m/d');
    $next_retake = date('m/d/Y', strtotime($today_date. ' + '.$reexam.' days'));
	$dcv = date_format(date_create_from_format('m/d/Y', $deadline), 'Y/m/d');
	

	if ($status == "Inactive") {
	header("location:./");	
	}
    }
} else {
header("location:./");
}
$quest = 0;
$sql = "SELECT * FROM tbl_questions WHERE exam_id = '$exam_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
    $quest++;
    }
} else {

}


$sql = "SELECT * FROM tbl_assessment_records WHERE writer_id = '$myid' AND exam_id = '$exam_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
        setcookie(base64_encode('examrecord'),base64_encode('exists'),time()+30*60,'/');
    $record_found = 1;
	$score = $row['score'];
	$status = $row['status'];
	$take_date = $row['date'];
	$retake_date = $row['next_retake'];
	$today_date = date('Y/m/d');
	$retakeconv = date_format(date_create_from_format('m/d/Y', $retake_date), 'Y/m/d');
    $tc = strtotime($today_date);
	$rc = strtotime($retakeconv);
	$dc = strtotime($dcv);
    $td = ($tc - $rc)/86400;
	$dcc = ($tc - $dc)/86400;
	
    }
} else {

    setcookie('rh_ts23_d34d',base64_encode('newbie'),time()+30*60,'/');
}


$conn->close();
}

 ?>
<!DOCTYPE html>
<html>
    
<head>
        
        <title><?php echo $_SERVER['SERVER_NAME'];?> | Take Assessment</title>
        

    </head>
    <body class="page-header-fixed">
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
            <?php getContextHeader();?>
            <div class="page-inner">
                <div class="page-title">
                    <h3>Take Assessment</h3>
                    <div class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li><a href="examinations.php">Assessments</a></li>
                            <li class="active"><?php echo "$exam_name"; ?></li>
                        </ol>
                    </div>
                </div>
                <div id="main-wrapper">
                    <div class="row col-md-12">
                        <div class="col-md-6">
                          
                                <div class="row">
                           <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Tests  Properties</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="table-responsive project-stats">  
                                       <table class="table">
                                           </thead>
                                           <tbody>
                                               <tr>
                                                   <th scope="row">1</th>
                                                   <td>Exam Name</td>
                                                   <td><?php echo "$exam_name"; ?></td>
                                               </tr>
											     <tr>
                                                   <th scope="row">2</th>
                                                   <td>Subject</td>
                                                   <td><?php echo "$subject"; ?></td>
                                               </tr>
											    <tr>
                                                   <th scope="row">3</th>
                                                   <td>Deadline</td>
                                                   <td><?php echo "$deadline"; ?></td>
                                               </tr>
											   
											    <tr>
                                                   <th scope="row">4</th>
                                                   <td>Duration</td>
                                                   <td><?php echo "$duration"; ?> <b>min.</b></td>
                                               </tr>
											   
											  <tr>
                                                   <th scope="row">5</th>
                                                   <td>Next Re-take</td>
                                                   <td><?php 
												   if ($record_found == "1") {
													 echo "$retake_date";  
												   }else{
													 echo "$next_retake";  
												   }
												   
												   ?></td>
                                               </tr>
											   
											   <tr>
                                                   <th scope="row">6</th>
                                                   <td>Passmark</td>
                                                   <td><?php echo "$passmark"; ?>%</td>
                                               </tr>
											   
											   	<tr>
                                                   <th scope="row">6</th>
                                                   <td>Questions</td>
                                                   <td><b><?php echo "$quest"; ?></b></td>
                                               </tr>
                                              
                                           </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
   
                                </div>
                           
                        </div>
						
                           <div class="col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Terms and conditions</h3>
                                </div>
                                <div class="panel-body">
                                    <?php echo "$terms"; ?>
                                </div>
                            </div>
                        </div>
						
						<div class="col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Take Assessment</h3>
                                </div>
                                <div class="panel-body">
								<?php
								if ($record_found == "1") {
									
								if ($td >= 0){
									
								if ($dcc > 1){
								print '<meta http-equiv="refresh" content="4;url=/writer/new/writer/">
								<div class="alert alert-warning" role="alert">
                                Yo have already taken this exam.
                                </div>
                                ';
								}else{

								$_SESSION['current_examid'] = $exam_id;
								$_SESSION['writer_retake'] = 1;
								print '
                                 <div class="alert alert-success" role="alert">
                                  You are good to go.
                                    </div>

									'; ?>
									<a onclick="return confirm('Are you sure you want to begin ?')" class="btn btn-success" href="assessment.php">Retake Assessment</a>
									
									<?php	
								}
                                
								}else{
                                print '
								<div class="alert alert-warning" role="alert">
                                You will be able to retake this exam on '.$retake_date.'
                                </div>';
								}								
									
								}else{
								$_SESSION['current_examid'] = $exam_id;
								$_SESSION['writer_retake'] = 0;
								print '
                                 <div class="alert alert-success" role="alert">
                                  You are good to go.
                                    </div>

									'; ?>
									<a onclick="return confirm('Are you sure you want to begin ?')" class="btn btn-success" href="assessment.php">Begin Assessment</a>
									
									<?php
                  									
									
								}
								
								?>

									
                                </div>
                            </div>
                        </div>
						
						<div class="col-md-6">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Assessment History</h3>
                                </div>
                                <div class="panel-body">
                                <?php
								if ($record_found == "1") {
								print '
                                 <div class="alert alert-info" role="alert">
                                  You attend this exam on <strong>'.$take_date.'</strong> , your score was <strong>'.$score.'%</strong>
                                    </div>';		
								
								}else{
								print '
                                 <div class="alert alert-info" role="alert">
                                  No records found.
                                    </div>';								
									
								}
								
								?>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                
            </div>
        </main>

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
        <script src="../assets/plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../assets/plugins/jquery-counterup/jquery.counterup.min.js"></script>
        <script src="../assets/plugins/toastr/toastr.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.time.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.symbol.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.resize.min.js"></script>
        <script src="../assets/plugins/flot/jquery.flot.tooltip.min.js"></script>
        <script src="../assets/plugins/curvedlines/curvedLines.js"></script>
        <script src="../assets/plugins/metrojs/MetroJs.min.js"></script>
        <script src="../assets/js/modern.js"></script>

		<script src="../assets/js/canvasjs.min.js"></script></body>


</html>