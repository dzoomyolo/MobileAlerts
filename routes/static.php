<?php
$path = "/static/:";
$path = explode("/",parse_url($_SERVER['REQUEST_URI'])['path']);
$file_name = $path[3];
$file_ext = $path[2];
if($file_ext == "css"){
    $css_path = "./public/styles/".$file_name.".".$file_ext; 
    if(file_exists($css_path)){
        header("content-type: text/css");
        die(file_get_contents($css_path));
        return 1;
    }
}
if($file_ext == "js"){
    $js_path = "./scripts". "/".$file_name.".".$file_ext;
    if(file_exists($js_path)){
        header("content-type: text/javascript");
        die(file_get_contents($js_path));
        // return 1;
    }
}
if($file_ext == "jpg" || $file_ext == "png" || $file_ext == "svg"){
    $img_path = "./public/image/".$file_name.".".$file_ext;
    if(file_exists($img_path)){
        if($file_ext == "svg"){
            $file_ext = "svg+xml";
        }
        header("Content-Type: image/".$file_ext);
        $img = file_get_contents($img_path);
        die($img);
        return $img;
    }
}