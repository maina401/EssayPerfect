<?php
include $_SERVER['DOCUMENT_ROOT'].'/functions/newtemplate.php';
getStartingBlock('Writer Registration |'.$_SERVER['SERVER_NAME'],'Start Earning from your writing today! Up To $20 per page','writer academic freelance writing earn money online register','writer academic freelance writing register');

$categories=getCategories();
    $subjects=getSubjects();
    if($_SESSION['universities']==null){
      $_SESSION['universities']=getUiversitites();
    }
$universities=$_SESSION['universities'];
getRegForm($subjects,$categories,$universities);
?>

<?php
getEndingBlock();
?>