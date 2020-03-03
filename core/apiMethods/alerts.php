<?php
$this->answer = (object)array();
$params = $this->params;
global $db;
if(is_empty($params[3])){
    $this->answerNotJson = "SERVER_ANSWER";    
}
if($params[3]=="register"){
    if(!is_empty($_GET['pushalluserid'])){
        $s_id = $_GET['pushalluserid'];
        $u_time = $_GET['time'];
        $ipAddress = $_SERVER['REMOTE_ADDR'];
        $u = $db->query("SELECT `id` FROM `user` WHERE `ip`=:ip",array("ip"=>$ipAddress));
        $hash = md5("SECRET_CODE".$s_id.$u_time.$ipAddress);
        if(!is_empty($u['id'])){
            if($hash==$_GET['sign']){
                $db->update("INSERT INTO `alerts_config`(user_id,push_id) VALUES(:uid,:rid)",array("uid"=>$u['id'],"rid"=>$s_id));
                $this->answer->success = true;
            }else{
                $this->createError(403,"Incorrect push data");
            }
        }else{
            $this->createError(404,"User not found");
        }
    }    
}

?>