<?php
$this->answer = (object)array();
$params = $this->params;
global $db;
if(is_empty($_POST)){
    $this->createError(405,"Method Not Allowed");
}
if($params[3]=="auth"){
    if($params[4]=="login"){
        $name = htmlspecialchars($_POST['u']);
        $pass = htmlspecialchars($_POST['p']);
        if(is_empty($name) || is_empty($pass)){
            $this->createError(400,"Not enought parameters");
        }
        $l = $db->query('SELECT `pass` FROM `users` WHERE `name`= :name',array("name"=>$name));
        if(password_verify($pass,$l['pass'])){
            $id = $db->query('SELECT `id` FROM `users` WHERE `name`=:name AND `pass`=:pass',array("name"=>$name,"pass"=>$l['pass']));
            $token = refreshToken($id['id']);
            $user = (object)array();
            $user->id = $id['id'];
            $user->token=$token;
            $this->answer->user = $user;
        }else{
            $this->createError(403,"Incorrect login or password");
        }
    }else if($params[4]=="registration"){
        //TODO
    }
}