<?php
include "functions/newtemplate.php";
getStartingBlock('Start Earning Today! | ' . $_SERVER['SERVER_NAME'], 'Register today and start earning from yout writing! How does it work? Pass a simple grammar test and BOOM! You are Hired','writer academic freelance writing register','writer academic freelance writing register');?>
<h2 class="h1 display-3 pt-50 wow fadeInRight delays-4s slower">Start Earning <img id="applyNow"
                                                                                   href="/accounts/new/"
                                                                                   class="animated zoomIn delay-5s"
                                                                                   src="images/apply_now.png"

                                                                                   width="70px" height="60px"/></h2>
<hr>
<div class="container">
    <div class="row " id="wrapper">
        <div class="col-md-6 wow fadeInLeftBig">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">How It Works:</h3>
                </div>

                <ul class=" wow fadeInUp delay-2s slower"><i class="fa fa-check"></i> Fill in your profile</ul>
                <ul class=" wow fadeInUp delay-3s slower"><i class="fa fa-check"></i> Pass a quick grammar test</ul>
                <ul class=" wow fadeInUp delay-4s slow"><i class="fa fa-check"></i> Start Working</ul>
                <ul class=" wow fadeInUp delay-5s slower"><i class="fa fa-check"></i> Get paid</ul>


            </div>
        </div>
        <div class="col-md-6 wow fadeInLeftBig slower">
            <div class="container-fluid">
                <div class="card text-custom mb-3">
                    <div class="card-header"><i class="fa fa-question-circle"></i>&nbsp;&nbsp;How do i benefit</div>
                    <div class="card-body">
                        <h4 class="card-title fadeIn">Here some of the benefits that our writers enjoy:</h4>
                        <ul class="wow delay-2s tada fast "><i class="fa fa-check"></i> Timely Payments</ul>
                        <ul class="wow delay-3s tada  fast "><i class="fa fa-check"></i> Orders Throughout</ul>
                        <ul class="wow delay-4s jello  slower "><i class="fa fa-check"></i> Friendly Support</ul>
                        <ul class="wow delay-3s bounceInLeft slower "><i class="fa fa-check"></i> High Prices of up to
                            $20 per page
                        </ul>
                        <ul class="wow delay-4s bounceInLeft slower "><i class="fa fa-check"></i> Quick Sign Up</ul>
                        <ul class="wow delay-5s bounceInLeft slower "><i class="fa fa-check"></i> High Prices of up to
                            $20 per page
                        </ul>


                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div id="carouselId" class="carousel wow rotateInDownLeft slower slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselId" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselId" data-slide-to="1"></li>
                    <li data-target="#carouselId" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img data-src="images/icon_skills.png" src="images/icon_skills.png" class="courosel"
                             alt="First slide">
                        <div class="carousel-caption">
                            <h3>Show us your skills</h3>
                            <p>Pass a simple grammar test</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img data-src="images/imge_paid.png" src="images/icon_working.png" class="courosel"
                             alt="Second slide">
                        <div class="carousel-caption">
                            <h3>Start Working</h3>
                            <p>Our QA evaluates your application and you start working immediately</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="courosel" src="images/imge_paid.png" alt="Third slide">
                        <div class="carousel-caption">
                            <h3>Get timely payments</h3>
                            <p>Get timely payments via the method of your choice</p>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselId" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselId" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="row pt-50">
                <div class="container-fluid">
                    <div class="card">
                      <div class="card-header"><i class="fa fa-asterisk alert-danger"></i>
                        What do we require from you?
                      </div>
                      <div class="card-body">

                          <ul class=" wow fadeInUp delay-1s slower"><i class="fa fa-check"></i> Deliver Quality Essays</ul>
                          <ul class=" wow fadeInUp delay-2s slower"><i class="fa fa-check"></i> Meet deadlines</ul>
                          <ul class=" wow fadeInUp delay-3s slower"><i class="fa fa-check"></i> Zero Plagiarism</ul>
                          <ul class=" wow fadeInUp delay-4s slower"><i class="fa fa-check"></i> Follow instructions</ul>

                          <a href="/accounts/new/" class="btn btn-outline-success btn-register-custom" style="background-color: transparent">Register Now</a>
                      </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="container-fluid">
                    
                </div>
            </div>
        </div>


    </div>
</div>
<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.14.0/js/mdb.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script crossorigin="anonymous"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
        src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        changeClass()
        new WOW().init();


        async function changeClass() {
            document.getElementById("applyNow").classList.add('zoomIn');
            document.getElementById("applyNow").classList.add('slower');
            await new Promise(r => setTimeout(r, 10000))
            document.getElementById("applyNow").classList.remove('zoomIn');
            document.getElementById("applyNow").classList.add('hinge');

        }
    });


</script>
</body>
</html>