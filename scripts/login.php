<?php 
require_once 'functions.php';
 if (isset($_REQUEST['uname']) and isset($_REQUEST['pass'])) {
    setcookie('uname', $_REQUEST['uname']);
    setcookie('pass', $_REQUEST['pass']);
    header("Location: admin.php");
    exit();
 }
?>