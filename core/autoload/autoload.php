<?php
spl_autoload_register(function($class){
    if (false !== strpos($class, '.')) {
        exit;
    }
    if($class != 'core\classes\PDO'){
        $path = $_SERVER['CONTEXT_DOCUMENT_ROOT'].'/'.str_replace("\\","/",$class).".php";
        require $path;    
    }
    
});
?>