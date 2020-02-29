<?php
function Token($id/*id пользователя*/){
    global $db;
    $s  = "....";
    $u = $db->query("SELECT `login` FROM `user` WHERE id=:id",array("id"=>$id));
    return hash('sha512',$s.$u["name"].time());
}
?>