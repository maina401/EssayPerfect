<?php include ("../functions/template.php");
session_start();
if (isAdmin()){
    header('location:dashboard');
}else{
    header('location: /errors/403.html');
}