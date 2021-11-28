<?php 
require_once 'scripts/functions.php';
  $user = null;
  $pass = null;
  if (isset($_REQUEST['uname']) and isset($_REQUEST['pass'])) {
    $user = $_REQUEST['uname'];
    $pass = $_REQUEST['pass'];
  }
 if (!isset($_REQUEST['uname']) or !login($user, $pass)){
  ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>administrate</title>
<link rel="stylesheet" href="/styles/adm.css">
</head>
<body>
<form action="/admin.php" method="post" class="reg">
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required class="inp">

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pass" required class="inp">
        
    <button type="submit" class="buttn">Login</button>
    <button type="button" class="buttn cancelbtn">Cancel</button>
  </div>
</form>
</body>
</html>
<?php }else if(login($user, $pass)){
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrate</title>
    <link rel="stylesheet" href="styles/index.css">
    <script>
    function delete_user(id) {
        if (confirm("are you realy want to delete it?")) {
            window.location = "scripts/del_vac.php?id=" + id;
        }
    }
    <?php
         if (isset($_REQUEST['msg'])){
             ?>
    window.onload = function() {
        alert("deleted succsesfuly");
    }
    <?php } ?>
    </script>
</head>

<body>
    <?php require_once "assets/header.html"?>
    <main class="container">
        <?php
        require_once 'scripts/functions.php';
        show_all(true);
        ?>
    </main>
</body>
</html>
<?php }?>  