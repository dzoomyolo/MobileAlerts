<?php
$path = "/me";
if(is_empty($_SESSION["name"])) exit(notfound());
$user = qPost("/api/users/get","token=".$_SESSION['token']);
$user = $user->user;
require_once("./temp/head.php");
require_once("./temp/nav.php");
if($user->privileges == 1){
    require_once("./temp/user.php");
}else if($user->privileges == 2){
    require_once("./temp/teacher.php");
}else{
    echo "ОБРАТИТЕСЬ К СВОЕМУ АДМИНИСТРАТОРУ, ПРИВИЛЕГИЯ НЕ ОПРЕДЕЛЕНА; PLEASE CONTACT YOUR ADMINISTRATOR, PRIVILEGES NOT DETERMINED";
}
require_once("./temp/footer.php");
?>