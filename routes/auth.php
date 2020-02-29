<?php
$path="/auth/:";
$url = parse_url($_SERVER['REQUEST_URI']);
$url_arr = explode("/",$url['path']);
?>