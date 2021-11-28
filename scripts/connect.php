<?php 
error_reporting(-1);
ini_set('display_errors', 'On');
 define("HOST", "localhost");
 define("USER", "root");
 define("PASS", "admin");
 define("DB", "project");
 function connect(){
 $link = mysqli_connect(HOST, USER, PASS);
 mysqli_select_db($link, DB);
 return $link;
 }
?>