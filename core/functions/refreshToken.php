<?php
function refreshToken($id){
    global $db;
    $date = $db->query("SELECT `token_date` FROM `user` WHERE id=:id",array("id"=>$id));
    $d = strtotime($date["token_date"]);
    $t = strtotime(date("Y-m-d"));
    $range = $d - $t;
    if(intval($range)<= -604800/*7days in unix*/){
        $token = Token($id);
        $db->update("UPDATE `user` SET ref_token=:token, token_date =:d WHERE id=:id",array("token"=>$token,"d"=>date("Y-m-d"),"id"=>$id));
        return $token;
    }else{
        $r = $db->query("SELECT `ref_token` FROM `user` WHERE id=:id",array("id"=>$id));
        return $r['ref_token'];
    }
}
?>