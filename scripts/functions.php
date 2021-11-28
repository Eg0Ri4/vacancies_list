<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/scripts/connect.php';
function show_job($id){
    $query = sprintf("SELECT caption, pay, short_description FROM jobs WHERE id='%d';", $id);
    $result = mysqli_query(connect(), $query);
    $res = mysqli_fetch_array($result);
    $shablon = '
       <div class="job card card-hover card-visited wordwrap job-link js-hot-block row align-items-center">
    <h2>
        <a href="%s">%s</a>
    </h2>
    <div>
        <b>%s</b>
    </div>

    <p class="overflow text-muted add-top-sm add-bottom">
        %s…⁠
    </p>

    <div class="saved-jobs pull-left" data-id="4214308">
        </a>
    </div>
</div>';
    return sprintf($shablon, '', $res['caption'], $res['pay'], $res['short_description']);
}
function show_all($admin){
    $ids_array = array();
    $result = mysqli_query(connect(), "SELECT id FROM jobs");
    while($row = mysqli_fetch_array($result)){
        $ids_array[] = $row['id'];
    }
    for($i = 0; $i < count($ids_array); $i++){
        if($admin!=true){
            echo show_job($ids_array[$i]);
        }else{
            $cross = "";
            echo "" . show_job($ids_array[$i]) . $cross;
        }
    }
}
function login($name, $pass){
    $query = mysqli_query(connect(), sprintf("SELECT password FROM admins WHERE name='%s'", $name));
    $result = mysqli_fetch_array($query);
    if(isset($result[0])){
      return password_verify($pass, $result[0]);
    }else{
        return false;
    }
}
function del_vac($id){
    $msg = "deleted succsesfuly!";
    mysqli_query(connect(), sprintf("DELETE FROM jobs WHERE id='%d'", $id));
    header("Location: /admin.php?msg='" . $msg . "'");
    exit();
}
?>