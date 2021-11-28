<?php
 require_once $_SERVER['DOCUMENT_ROOT'] . "/scripts/connect.php";
 $id = $_REQUEST['id'];
 $msg = "deleted succsesfuly!";
 mysqli_query(connect(), sprintf("DELETE FROM jobs WHERE id='%d'", $id));
 header("Location: /admin.php?msg='sucsess'");
 exit();
?>