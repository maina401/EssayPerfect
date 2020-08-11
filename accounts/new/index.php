<?php
include $_SERVER['DOCUMENT_ROOT'].'/functions/newtemplate.php';
getStartingBlock('Writer Registration |'.$_SERVER['SERVER_NAME'],'Start Earning from your writing today! Up To $20 per page','writer academic freelance writing earn money online register','writer academic freelance writing register');

$categories=getCategories();
    $subjects=getSubjects();

getRegForm($subjects,$categories);
?>

<?php
getEndingBlock();
?>