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
        $l = $db->query('SELECT `pass` FROM `user` WHERE `login`= :name',array("name"=>$name));
        if(password_verify($pass,$l['pass'])){
            $id = $db->query('SELECT `id` FROM `user` WHERE `login`=:name AND `pass`=:pass',array("name"=>$name,"pass"=>$l['pass']));
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
}else if($params[3]=="get"){
    $t = htmlspecialchars($_POST['token']);
    if(is_empty($t)){
        $this->createError(400,"Not enought parameters");
    }
    $l = $db->query('SELECT `id` FROM `user` WHERE `ref_token`= :token',array("token"=>$t));
    if(!is_empty($l['id'])){
        $user = $db->query('SELECT `id`,`name`,`lastname`,`middlename`,`privileges`,`shcool_id` FROM `user` WHERE `id`= :id',array("id"=>$l['id']));
        $uA = (object)array();
        $this->answer->user = $user;
    }else{
        $this->createError(403,"Invalid Token");
    }
}else if($params[3]=="alerts"){
    $t = htmlspecialchars($_POST['token']);
    if(is_empty($t)){
        $this->createError(400,"Not enought parameters");
    }
    $l = $db->query('SELECT `id` FROM `user` WHERE `ref_token`= :token',array("token"=>$t));
    if(!is_empty($l['id'])){
        $alerts = $db->queryAll('SELECT * FROM `alerts` WHERE `receiver`= :id ORDER BY `id` DESC',array("id"=>$l['id']));
        $this->answer->alerts = $alerts;
    }else{
        $this->createError(403,"Invalid Token");
    }
}else if($params[3]=="childrens"){
    $t = htmlspecialchars($_POST['token']);
    $s = htmlspecialchars($_POST['s']);
    if(is_empty($t)){
        $this->createError(400,"Not enought parameters");
    }
    $l = $db->query('SELECT `id`,`privileges` FROM `user` WHERE `ref_token`= :token',array("token"=>$t));
    if(!is_empty($l['id'])){
        if($l['privileges'] >=2){
            $u = $db->queryAll('SELECT `id`,`name`,`lastname`,`middlename` FROM `user` WHERE `shcool_id`= :s',array("s"=>$s));
            $this->answer->users = $u;
        }else{
            $this->createError(403,"Not enough privileges");
        }
    }else{
        $this->createError(403,"Invalid Token");
    }
}