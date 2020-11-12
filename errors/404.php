<link href="/admin/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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

<div class="container">
  <!-- Jumbotron -->
  <div class="jumbotron">
    <h1><i class="fa fa-frown-o red"></i>404 - Page Not Found</h1>
    <p class="lead">We couldn't find what you're looking for on <em><span id="display-domain"></span></em>.</p>
    <p><a onclick=javascript:checkSite(); class="btn btn-default btn-lg"><span class="green">Take Me To The Homepage</span></a>

      <?php
      error_reporting(1);
      if (defined($_SERVER['HTTP_REFERER'])){
          $url=$_SERVER['HTTP_REFERER'] ;
          echo '
          <div class="alert alert-warning">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Hold On!</strong> We will be taking you to where you should be in a few seconds
    </div>
    <meta http-equiv="refresh" content="4;url='.$url.'">';
      }else{
          $url=$_SERVER['HTTP_REFERER'] ;
          echo '
          <div class="alert alert-warning">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Are you lost?</strong> We could not determine how you got here, so we can take you back to where you were. Try 
      starting at the homepage
    </div>';
      }
      ?>
    <script type="text/javascript">
            function checkSite(){
              var currentSite = window.location.hostname;
                window.location = "https://" + currentSite;
            }
        </script>
    </p>
  </div>
</div>
<div class="container">
  <div class="body-content">
    <div class="row">
      <div class="col-md-6">
        <h2>What happened?</h2>
        <p class="lead">A 404 error status implies that the file, page or resource that you're looking for could not be found.</p>
        <p class="lead">The error could be brought by the following reasons:</p>
        <ul>
          <li>
            You followed an expired link
          </li>
          <li>
            The order you need to access is unavailable, either hidden by the admin or assigned to another writer
          </li>
        </ul>
      </div>
      <div class="col-md-6">
        <h2>What can I do?</h2>
        <p class="lead">If you're a site visitor</p>
        <p>Please use your browser's back button and check that you're in the right place. If you need immediate assistance, please <a href="/chat/index.php">talk to us</a>  instead.</p>
        <p class="lead">If you're the site owner</p>
         <p>Please check that you're in the right place and get in touch with your website host if you believe this to be an error.</p>
     </div>
    </div>
  </div>
</div>