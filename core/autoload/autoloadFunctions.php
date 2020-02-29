<?php
$functions = scandir("./core/functions/");
foreach($functions as $function){
    $path = "./core/functions/".$function;
    if(is_file($path)&&file_exists($path)){
        require $path;
    }
}
?>