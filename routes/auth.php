<?php
$path="/auth/:";
$url = parse_url($_SERVER['REQUEST_URI']);
$url_arr = explode("/",$url['path']);

if($url_arr[2] == 'login'){
    $l = htmlspecialchars($_POST['login']);
    $p = htmlspecialchars($_POST['password']);
    if(!is_empty($_POST['login']) and !is_empty($_POST['password'])){
        $userAuth = qPost("/api/users/auth/login","u=".$l."&p=".$p);
        if(!is_empty($userAuth->user)){
            $_SESSION["name"] = $l;
            $_SESSION["token"] = $userAuth->user->token;
            $_SESSION["id"] = $userAuth->user->id;
            if($_SERVER['HTTP_REFERER']){
                echo '<meta http-equiv="refresh" content="0;URL='.$_SERVER['HTTP_REFERER'].'">';
            }else{
                echo '<meta http-equiv="refresh" content="0;URL=/">';
            }
        }
    }else{
        if(!is_empty($_SESSION['username'])){
            header("Content-Type: application/json");
            $a = new \stdClass;
            $a->auth = 1;
            die(json_encode($a,JSON_UNESCAPED_UNICODE));
        }else{
            $a = new \stdClass;
            $a->auth = 0;
            die(json_encode($a,JSON_UNESCAPED_UNICODE));
        }
    }
}
?>
