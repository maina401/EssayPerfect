<?php include '../functions/template.php';
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Search</title>

	  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="Stylesheet" href="CSS/jquery.dialog.css">
   <style>

 body {
  
font-family: Agency FB;
}




</style>
    <link rel="Stylesheet" href="CSS/jquery.dialog.css">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="js/jquery.dialog.js"></script>
<script type="text/javascript">

function bid(id)
{
    confirmX = $.dialog.confirm;
    $('#placebid').bind('click', function () {
        confirmX("Place Bid?", "Do you want to bid on this order?", function () {


                alertX = $.dialog.alert;

                alertX("Placing Bid", "Placing bid", function () {
                    window.location='BidProduct.php?bid='+id
                });



        });
    });

}

function showOrder(order_id) {
    windowX = $.dialog.window;
    $('#showorder').bind('click', function () {
        windowX("Order "+order_id, "orderDetails.php?order_id="+order_id, "1", function () {

        });
    });
}
</script>

</head>

<body>

<div>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Kinbo.Com</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="Home.php"><b>&nbsp&nbsp&nbsp&nbspHome</b></a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>&nbsp&nbspProducts</b><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="Car.php"><b>Car</b></a></li>
          <li><a href="Mobile.php"><b>Mobile</b></a></li>
          <li><a href="Computer.php"><b>Computer</b></a></li>
        </ul>
		     
      </li>
      

      <form class="navbar-form navbar-left" action="Search" method="POST">
      <div class="input-group">
        <input type="text" class="form-control" name="search" placeholder="Search" size="40">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
    </ul>
	
	
   <ul class="nav navbar-nav navbar-right">
   <li><a href="About Project.php"><b>About site</b></a></li>
      <li><a href="Contact Us.php"><b>Contact Us</b></a></li>
       <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><b>Login</b><span class="caret"></span></a>
        <ul class="dropdown-menu">
         <li><a href="UserLogin.php"><b>User Login</b></a></li>
          <li><a href="writerlogin.php"><b>Admin Login</b></a></li>
        </ul>
      </li>
      <li><a href="Registration.php"><span class="glyphicon glyphicon-user"></span> <b>Sign Up</b></a></li>
     
    </ul>
  </div>
</nav>
</div>


<table align="center">

<?php 

     $connection= getConnection(); 

     $search=$_POST['search'];
     $myid=$_SESSION['my_id'];
     if (empty($search)){
         header('location: Home');
     }
     else {

         $query = "select a.*, b.writer_id from orders a, writers b where a.order_id like '%" . $search . "%' OR a.title like '%" . $search . "%'  or a.state like '%".$search."%' AND a.writer_id=b.writer_id";


         $result = mysqli_query($connection, $query);
         $break = 0;

         if (mysqli_num_rows($result) > 0) {

             while ($row = mysqli_fetch_array($result)) {
                 if ($break == 4) {
                     echo "<tr>";
                     $break = 0;
                 }


                 echo '<td>';
                 echo "<img src='Image/available.png' width='75px' height='100px'><br>";
                 echo '</td>';
                 echo '<td>';
                 echo "<h2>Order ID: " . $row['order_id'] . "</h2>";

                 echo "<h4>";
                 echo "<b>";
                 $name = $row['order_id'];
                 echo 'Title: ' . $row['title'];
                 echo "</b>";
                 echo "</h4>";
                 if (strlen($row['descri']) < 50) {
                     echo 'Order Description: ' . $row['descri'];
                 } else {
                     echo 'Order Description: <a href="javascript:showOrder(' . $row['order_id'] . ')" id="showorder"> <img src="Image/readmore.png" width="80px"
                                                                 height="20px" alt="Bid"/> <span
                  style="color: green;font-size: 20px"><b></b></span> </a>';
                 }
                 echo "<br>";
                 echo "<b>";
                 echo "Price: ";
                 $price = 0.6 * $row['order_total'];
                 echo 'Order Total: ' . $price . '<br>';
                 echo 'Pages: ' . $row['pages'];
                 echo "</b>";

                 echo "<br>";
                 if ($row['state'] == 'available') {

                     echo '
          <a href="javascript:bid(' . $row[0] . ')" id="placebid"> <img src="Image/bidnow.png" width="50px"
                                                                 height="50px" alt="Bid Now"/> <span
                  style="color: green;font-size: 20px"><b></b></span> </a>';
                 } elseif ($row['state'] == 'completed') {
                     echo '
              <a href="javascript:bid(<?php echo $row[0]; ?>)"> <img src="Image/completed.png" width="50px"
                                                                     height="50px" alt="completed"/> <span
                          style="color: green;font-size: 20px"><b></b></span> </a>';
                 }elseif ($row['state'] == 'progress') {
                  echo '
           <a href="javascript:bid(<?php echo $row[0]; ?>)"> <img src="Image/progress.png" width="50px"
                                                                  height="50px" alt="progress"/> <span
                       style="color: green;font-size: 20px"><b></b></span> </a>';
              }
                 $break++;
                 echo "<hr>";
                 echo "<hr>";

                 echo '</td>';

             }
         } else {
             echo "<script>
alertX = $.dialog.alert;

  alertX(\"No Data\", \"What you are looking for was not found! That's all we know\", function () {
    window.location.href='/writer/Home';
  });
</script>";
         }

     }

?>
</body>
</html>



