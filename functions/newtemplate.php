<?php
include 'template.php';
function retry_verification(){
    getStartingBlock('Verify Your Email','Verify your email to access our system','Email Verification','email, verify,');
    echo '<<div class="form-group">
      <label for="">Enter your email address</label>
      <input type="email" class="form-control" name="" id="" aria-describedby="emailHelpId" placeholder="">
      <small id="emailHelpId" class="form-text text-muted">Help text</small>
    </div>'
    ;
    getEndingBlock();
}

function getStartingBlock($title, $description, $h1, $keywords)
{
   
    echo '<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
          name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
   ';
    setPageProperties($title, $description, $keywords);
    echo '
    <link rel="shortcut icon" href="/favicon.ico" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/functions/build/css/intlTelInput.css" />
    
    <style type="text/css">
        .nav-buttons {
            border-radius: 40%;
            font-family: Algerian, fantasy;
            font-size: inherit;
            text-decoration-color: #1c7430;
            background-color: transparent;

        }
        .nav-buttons:hover {
            font-family: Calibri;
            background-color: silver;
            border-radius: 20%;
        }
        .h1-hidden{
        text-decoration-color: transparent;
        font-size: 0;
        }


        .carousel, .slide,
        .carousel .carousel-inner,
        .carousel .carousel-item,
        .carousel .carousel-item img,
        .carousel .carousel-control {
            border-radius: 12%;
            overflow: hidden;
        }

        .nav-item {
            padding-right: 20px;
            padding-left: 20px;
        }
        .nav-item:hover{
        text-decoration: wheat;
        }

        .card {
            background-color: transparent;
        }
        .card:hover{
            zoom: normal;
        }

        body {
            scrollbar-shadow-color: #002a80;
            
        }

        #wrapper {
            display: flex;
        }

        .pt-50 {
            padding-top: 80px;
        }

        .courosel {
            height: 317px;
            width: 400px;
        }

        .text-custom {
            text-decoration-color: #1dc116;
        }
        .btn-register-custom:hover{
            background-color: darkred;
            border-radius: 40%;
        }

    </style>
</head>
<body class="align-content-center dusty-grass-gradient">
<header>
    <nav class="navbar wow fadeInLeft navbar-expand-lg navbar-light fixed-top slow">
        <a class="navbar-brand" href="#"><img alt="Logo" height="40px" src="/images/icon_logo.png" width="40"/></a>
        <button aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler"
                data-target="#navbarTogglerDemo02" data-toggle="collapse" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="btn btn-outline-alert nav-buttons" href="/"> <i class="fa fa-home"> </i>
                        Home </a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-alert nav-buttons nav-item" href="#"><i class="fa fa-user"></i>
                        About</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-alert nav-buttons nav-item" href="#"><i class="fa fa-question-circle"></i>
                        FAQs</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-alert nav-buttons nav-item" href="#"><i
                            class="fa fa-money-bill-wave-alt"></i>
                        Prices</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-alert nav-buttons nav-item" href="#"><i class="fa fa-quote-left"></i>
                        Testimonials <i class="fa fa-quote-right"></i></a>
                </li>
            </ul>
            <ul class="nav navbar-nav">
                <li class="nav-pills ">
                    <a class="btn btn-outline-dark " href="/accounts/new/"><i
                            class="fa fa-sign-in-alt"></i>
                        Sign Up</a>
                    <a class="btn btn-outline-danger" href="/accounts/"><i
                            class="fa fa-sign-in-alt"></i>
                        Login</a>

                </li>


            </ul>
        </div>
    </nav>
    <h1 class="h1-hidden">' . $h1 . '</h1>
</header>

<hr>';
    if(isset($_COOKIE['ckid'])){
        $id=e($_COOKIE['ckid']);
        if(!isVerified($id)){
echo '<<div class="container pt-5" style="position: sticky; top: 20px">
	<div class="alert alert-warning alert-dismissible offset-8 align-content-between" role="alert" >
    <strong>You need to verify your email. Check your inbox or Spam folder</strong>
</div>
</div>';
        }
    }

}

function getEndingBlock()
{
    echo '<!-- JQuery -->
<script src="/js/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/web-animations/2.2.2/web-animations.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js"></script>
<script src="/functions/build/js/intlTelInput-jquery.min.js"></script>
<script src="/functions/build/js/intlTelInput.min.js"></script>
<script src="/functions/build/js/utils.js"></script>
<script type="text/javascript" src="/js/mdb.min.js"></script>
<script src="https://blueimp.github.io/jQuery-File-Upload/js/vendor/jquery.ui.widget.js"></script>
<script src="https://blueimp.github.io/jQuery-File-Upload/js/jquery.fileupload.js"></script>

<script>
    $(document).ready(function () {
       
        new WOW().init();
     $(\'#dob\').pickadate();
     $(\'.mdb-select\').materialSelect();
        function changeClass() {
            document.getElementById("applyNow").classList.add(\'zoomIn\');
            document.getElementById("applyNow").classList.add(\'slower\');
            await
            new Promise(r => setTimeout(r, 10000));
            document.getElementById("applyNow").classList.remove(\'zoomIn\');
            document.getElementById("applyNow").classList.add(\'hinge\');

        }
        var navListItems = $(\'div.setup-panel div a\'),
            allWells = $(\'.setup-content\'),
            allNextBtn = $(\'.nextBtn\');

    allWells.hide();

    navListItems.click(function (e) {
        e.preventDefault();
        var $target = $($(this).attr(\'href\')),
                $item = $(this);

        if (!$item.hasClass(\'disabled\')) {
            allWells.hide()
            $target.show();
            $target.find(\'input:eq(0)\').focus();
            
        }
    });

    allNextBtn.click(function(){
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $(\'div.setup-panel div a[href="#\' + curStepBtn + \'"]\').parent().next().children("a"),
            curInputs = curStep.find("input[type=\'text\'],input[type=\'url\']"),
            isValid = true;

       
        for(var i=0; i<curInputs.length; i++){
            if (!curInputs[i].validity.valid){
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }
       if(v.form()){
             $(".form-group").removeClass("has-error");
             allWells.hide()
             nextStepWizard.removeAttr(\'disabled\').trigger(\'click\');
           
            
        }else {
             $(curInputs[i]).closest(".form-group").addClass("has-error");
     nextStepWizard.addClass(\'disabled\');
        }
       
            
    });

    $(\'div.setup-panel div a.btn-primary\').trigger(\'click\');
    });
     var input = document.querySelector("#phone"),
  errorMsg = document.querySelector("#error-msg"),
  validMsg = document.querySelector("#valid-msg");

// here, the index maps to the error code returned from getValidationError - see readme
var errorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];

// initialise plugin
var iti = window.intlTelInput(input, {
    initialCountry: "auto",
  geoIpLookup: function(callback) {
    $.get(\'https://ipinfo.io?token=014f73659b755f\', function() {}, "jsonp").always(function(resp) {
      var countryCode = (resp && resp.country) ? resp.country : "";
    console.log(resp.ip);
   $("#ip_address").val(resp.ip);
   $("#nationality").val(resp.region+" "+resp.city+", "+resp.country+"");
      callback(countryCode);
    });
  },
    utilsScript: "/functions/build/js/utils.js?1562189064761"
});

var reset = function() {
  input.classList.remove("error");
  errorMsg.innerHTML = "";
  errorMsg.classList.add("hide");
  validMsg.classList.add("hide");
};
 $.validator.addMethod("pageRequired", function(value, element) {
			
		}, $.validator.messages.required);

		var v = $("#registration").validate({
			errorClass: "alert-warning",
			onkeyup: false,
			onfocusout: reset(),
			rules: {
					firstname: "required",
					lastname: "required",
					password: {
						required: true,
						minlength: 8
					},
					confirm_password: {
						required: true,
						minlength: 8,
						equalTo: "#password"
					},
					email: {
						required: true,
						email: true
					},
					phone: "required",
					agree: "required"
				},
				messages: {
					firstname: "Please enter your first tname",
					lastname: "Please enter your last name",
				password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long"
					},
					confirm_password: {
						required: "Please provide a password",
						minlength: "Your password must be at least 5 characters long",
						equalTo: "Please enter the same password as above"
					},
					email: "Please enter a valid email address",
					agree: "Please accept our policy"
					
				},
			submitHandler: function() {
				alert("Submitted, Check Your Email Inbox/Spam folders!");
				$("#submit").attr("disabled","disabled");
                form.submit();
			}
		});
function goNext(step){
   document.getElementById(step).classList.remove(\'disabled\');
}
// on blur: validate
input.addEventListener(\'blur\', function() {
  reset();
  if (input.value.trim()) {
    if (iti.isValidNumber()) {
      validMsg.classList.remove("hide");
    } else {
      input.classList.add("error");
      var errorCode = iti.getValidationError();
      errorMsg.innerHTML = errorMap[errorCode];
      validMsg.classList.add("hide");
      errorMsg.classList.remove("hide");
    }
  }
});
// on keyup / change flag: reset
input.addEventListener(\'change\', reset);
input.addEventListener(\'keyup\', reset);
</script>';

    echo '
</body>
</html>';

}

function getRegForm($subjects, $categories,$universities)
{
    getRegisterStyles();


    echo '
<style>

.stepwizard-step p {
    margin-top: 30px;
}

.stepwizard-row {
    display: table-row;
}
.alert-danger{
background-color: orangered;
text-decoration-color: silver;
}
.divider-new{
text-decoration-color: black;
font-family: Calibri;
font-size: large;
}
.stepwizard {
    display: table;
    width: 100%;
    position: relative;
}



.stepwizard-row:before {
    top: 14px;
    bottom: 0;
    position: absolute;
    content: " ";
    width: 100%;
    height: 1px;
    background-color: #ccc;
    z-order: 0;

}

.stepwizard-step {
    display: table-cell;
    text-align: center;
    position: relative;
}

.btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
  
}
.btn_disabled{
background: red;
}
option:disabled {
  background: red;
}
.stepwizard-step button[disabled] {
    opacity: 1 !important;
    filter: alpha(opacity=100) !important;
}
#step2{
padding-top: 30px;
}
</style>
<div class="container ">
<div class="stepwizard pt-50">
    <div class="stepwizard-row setup-panel">
        <div class="stepwizard-step">
            <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
            <p>Personal Information</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-2" class="btn btn-danger btn-sm btn-rounded disabled" role="button" id="step2">2</a>
            <p>Education</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-3" type="button" class="btn btn-default btn-circle disabled" disabled="disabled" id="step3">3</a>
            <p>Uploads</p>
        </div>
        <div class="stepwizard-step">
            <a href="#step-4" type="button" class="btn btn-default btn-circle disabled" disabled="disabled" id="step4">4</a>
            <p>Finalize</p>
        </div>
    </div>
</div>
<style>
.pt-50{
padding-top: 50px;
}
</style>
<div class="hide" id="applyNow"></div>
<form role="form" autocomplete="off" id="registration" action="/functions/mail/send_mail.php" method="POST">
<input type="hidden" class="hidden" value="registration" name="form_id">
<input type="hidden" class="hidden" name="ip_address" id="ip_address">
<input type="hidden" class="hidden" name="nationality" id="nationality">
<div class="row setup-content align-self-center" id="step-4">
<div class="jumbotron dusty-grass-gradient">
	
		<h1 class="display-3">Lastly...</h1>
		<p class="lead"></p>
		<hr class="my-2">
		<p>Before you proceed to use our system, we highly recommend that you read our terms and conditions. Please note that by continuing using this site, we assume that you already accept these terms. </p>
		<p>Please also note that we retain the right to approve or reject your application under whatever circumstances</p>
		<p class="lead">
			<a class="btn btn-primary rounded-circle" href="/terms-and-conditions/" role="button">Terms and Conditions</a>
		</p>
		<p>
		
		<div class="form-check form-check-inline">
  <input type="checkbox" class="form-check-input" id="agree" name="agree" required="required">
  <label class="form-check-label" for="agree">I have read, understood and agreed to these terms and conditions</label>
</div> </p>
<div class="col-lg-7 col-md-7 col-sm-8 form-check form-check-inline"></div><div class="col-lg-5 col-md-5 col-sm-4 form-check form-check-inline"><button type="submit" class="btn btn-warning btn-rounded" form="registration">Submit Application</button></div>
</div>
</div>
    <div class="row setup-content align-self-center" id="step-1">
        <div class="col-xs-12 col-md-6 col-lg-5 col-xl-4">
            <div class="col-md-12">
                <div class="form-group wow rotateInDownRight slower">
                    <label class="control-label">First Name</label>
                    <input  maxlength="100" type="text" required="required" class="form-control" placeholder="Enter First Name" id="firstname" name="firstname" data-required=""/>
                </div>
                <div class="form-group wow zoomIn delay-1s">
                    <label class="control-label">Last Name</label>
                    <input maxlength="100" type="text" class="form-control inputclass" placeholder="Enter Last Name" id="lastname" name="lastname" required/>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group wow bounceInLeft delay-2s">
                    <label class="control-label">Email Address</label>
                    <input  maxlength="100" type="email" class="form-control inputclass" placeholder="yourname@example.domain" id="email" name="email" required/>
                </div>
                <div class="form-group col-md-6 wow rollIn">
                    <label class="control-label">Phone Number</label>
                   <input id="phone" type="tel" name="phone">
<span id="valid-msg" class="hide alert-success alert-dismissable"></span>
<span id="error-msg" class="hide alert-success alert-dismissable"></span>
                </div>
              
            </div>
        </div>
        <div class="col-xs-12 col-md-6 col-lg-5 col-xl-4 wow fadeInRight slower delay-3s">
            <div class="col-md-12">
                <div class="form-group">
                    <label class="control-label">Your Strong password</label>
                    <input  maxlength="100" minlength="8" type="password" required="required" class="form-control" placeholder="{ghTy^&WTbsk$mks(`#!"  id="password" name="password"/>
                </div>
                <div class="form-group">
                    <label class="control-label">Confirm your password</label>
                    <input maxlength="100" minlength="8" type="password" required="required" class="form-control" placeholder="{ghTy^&WTbsk$mks(`#!" id="confirm_password" name="confirm_password"/>
                </div>
                <div class="md-form">
                <label class="control-label card-header-pills">Your Date of Birth</label>
  <input placeholder="Your Date of Birth" type="text" id="dob" name="dob" class="form-control datepicker" required>
  <label for="date-picker-example" class="card-header-pills"></label>
</div><button class="btn nav-button nextBtn btn-lg pull-right" type="button" onclick="goNext(\'step2\')">Next</button>
                 </div>
        </div>
    </div>
    <div class="row setup-content align-self-center" id="step-3">
        <div class="col-xs-12 col-md-6 col-lg-5 col-xl-4 pt-5 -align-center">
        <div class="col-10 col-offset-1">
        				<div class="divider-new page-header">
        				Upload your degree
        				</div>
        				</div>
        <div class="col-md-5, col-lg-3,col-sm-8">
            <div class="file-field big">
    <a class="btn-floating btn-lg amber darken-2 mt-0 float-left">
      <i class="fas fa-cloud-upload-alt" aria-hidden="true"></i>
      <input type="file" multiple id="degree_upload" name="degree_upload[]">
    </a>
    <div class="file-path-wrapper">
      <input class="file-path validate pr-5" type="text" placeholder="Upload one or more degrees" required="required">
      </div>
    </div>
   </div>
   </div>
    <div class="col-xs-12 col-md-6 col-lg-5 col-xl-4 pt-5 -align-center">
        <div class="col-10 col-offset-1">
        				<div class="divider-new page-header">
        				Upload your ID (front & Back)
        				</div>
        				</div>
        <div class="col-md-5, col-lg-3,col-sm-8">
            <div class="file-field big">
    <a class="btn-floating btn-lg amber darken-2 mt-0 float-left">
      <i class="fas fa-cloud-upload-alt" aria-hidden="true"></i>
      <input type="file" multiple id="id_upload" name="id_upload[]" >
    </a>
    <div class="file-path-wrapper">
      <input class="file-path validate pr-5 form-cotrol" type="text" placeholder="Upload back and front of your ID" required="required">
      </div>
    </div>
   </div>
    </div>
    <div class="col-xs-12 col-md-6 col-lg-5 col-xl-4 pt-5 -align-center">
        <div class="col-10 col-offset-1">
        				<div class="divider-new page-header">
        				Upload a clear photo of yourself
        				</div>
        				</div>
        <div class="col-md-5, col-lg-3,col-sm-8">
            <div class="file-field">
    <div class="mb-4">
      <img src="https://mdbootstrap.com/img/Photos/Others/placeholder-avatar.jpg"
        class="rounded-circle z-depth-1-half avatar-pic" alt="example placeholder avatar">
    </div>
    <div class="d-flex justify-content-center">
      <div class="btn btn-mdb-color btn-rounded float-left">
        <span>Upload Profile Photo</span>
        <input type="file" id="profile_photo_upload" name="profile_photo_upload[]" class="form-control" required="required">
      </div>
    </div>
    <div>
    <button class="btn nav-button nextBtn btn-lg pull-right" type="button" onclick="goNext(\'step4\')">Next</button>
    </div>
  </div>
   </div>
    </div>
    </div>
    
    <div class="row setup-content" id="step-2">
        <div class="col-sm-12 col-md-6">
        <div class="container wow slideInLeft">
        		<div class="form-group row card">
        			<label for="inputName" class="col-sm-12 col-form-label card-header">What Is your highest Verifiable level of education<i class="fa fa-question-circle align-self-end"></i> </label>
        			<div class="col-sm-12">
        				<div class="form-check">
        				  <select id="academic" name="academic_level" id="academic_level" class="mdb-select md-form colorful-select dropdown-primary" required="required">
                             <option value=""></option>
                             <option value="Highschool">High School</option>
                             <option value="College">College</option>
                             <option value="Bachelors">Bachelors Degree</option>
                             <option value="Masters">Masters Degree</option>
                             <option value="PhD">PhD</option>
                          </select>
        				</div>	
        			</div>
        		<div class="col-sm-12">
                    <div class="form-check">
        				  
        				</div>	
        				
        				</div>
        		</div>
        </div>
        </div>
        <div class="col-10 col-offset-1">
        				<div class="divider-new page-header">
        				Your Proficiency
        				</div>
        				</div>
<div class="col-sm-12 col-md-5">

  <div class="container wow slideInRight">
        		<div class="form-group row card">
        			<label for="inputName" class="col-sm-12 col-form-label card-header">Which University did you attend?<i class="fa fa-question-circle align-self-end"></i> </label>
        			<div class="col-sm-12">
        				<div class="form-check">
        				  <select class="mdb-select md-form" searchable="Start Typing University Name.." name="select_university" required="required">
                             <option value="" disabled selected>Select University</option>';
    foreach ($universities as $university) {
        echo '<option value="' . $university . '">' . $university . '</option>';
    }
    echo '
                          </select>
        				</div>
        			</div>
        		</div>
        				
                <div class="form-group row card">
                    <label for="inputName" class="col-sm-12 col-form-label card-header">Which subjects are you proficient in <i class="fa fa-question-circle align-self-end"></i> </label>
        			<div class="col-sm-12">
        				<div class="form-check">
        				  <div class="row">
                            <div class="col-md-12">
                                <select name="select_subject" id="select_subject" class="mdb-select colorful-select dropdown-primary md-form" multiple searchable="Search here.." required="required">';
    foreach ($categories as $category) {
        echo '<option value="' . $category . '">' . $category . '</option>';
    }
    echo '
                                </select>
                            </div>
                          </div>
        		        </div>
        		     </div>
        	   </div>
        </div>
        
      </div>
      <div class="col-sm-12 col-md-5">
      <div class="form-group row card">
        			<label for="inputName" class="col-sm-12 col-form-label card-header">What did you major in<i class="fa fa-question-circle align-self-end"></i> </label>
        			<div class="col-sm-12">
        				<div class="form-check">
        				  <select name="select_major" class="mdb-select md-form" searchable="Search Major Discipline here.." required="required">
                             <option value="" disabled selected>Choose your Major</option>';
    foreach ($subjects as $subject) {
        echo '<option value="' . $subject . '">' . $subject . '</option>';
    }
    echo '
                          </select>
        				</div>
        			</div>
        		</div>
        		<button class="btn nav-button nextBtn btn-lg pull-right" type="button" onclick="goNext(\'step3\')">Next</button>
              </div>
</form>
</div>
    ';


}

function setPageProperties($title, $description, $keywords)
{
    echo '<meta name="description" content="' . $description . '">
<meta name="keywords" content="' . $keywords . '">
<title>' . $title . '</title>
    ';
}

function getRegisterStyles()
{
    echo '
<style>
.file-field.big .file-path-wrapper {
height: 3.2rem; }
.file-field.big .file-path-wrapper .file-path {
height: 3rem; }
.avatar-pic {
width: 150px;
}
.disabled {
color: darkred;
}

</style>
    <link type="text/css" href="/functions/build/css/intlTelInput.css">
     <link type="text/css" href="/functions/build/css/intlTelInput.min.css">
    ';
}


