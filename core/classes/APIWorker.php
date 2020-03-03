<?php

namespace core\classes;

class APIWorker{
    protected $method;
    protected $params;
    protected $answer;
    protected $answerNotJson;
    protected $methods = array();
    function __construct(){
        $this->getRoutesAPI();
    }
    private function getRoutesAPI(){
        $url = parse_url($_SERVER['REQUEST_URI']);
        $path = $url['path'];
        $url_arr = explode("/",$url['path']);
        $methods = scandir("./core/apiMethods/");
        foreach($methods as $method){
            $methodName = explode(".",$method);
            $path = "./core/apiMethods/".$method;
            if(is_file($path)&&file_exists($path)){
                array_push($this->methods,array("method"=>$methodName[0],"methodFile"=>$method));
            }
        }
        $this->params = $url_arr;
        $this->method = array("name"=>$url_arr[2],"success"=>0);
        $this->routeAPI();
    }
    private function routeAPI(){
        foreach($this->methods as $method){
            if($this->method["name"] == $method['method']){
                require_once("./core/apiMethods/".$method['methodFile']);
                $this->method["success"] = 1;
                $this->createAnswer();
            }
        } 
        if($this->method["success"] != 1){
            $this->createError(404,"Metod not found");
        }
    }
    private function createAnswer(){
        if(!is_empty($this->answerNotJson)){
            die($this->answerNotJson);
        }else{
            header("Content-Type: application/json");
            $msg = json_encode($this->answer,JSON_UNESCAPED_UNICODE);
            die($msg); 
        }
    }
    private function createError($errorCode,$msg){
        $err = new \stdClass;
        $err->error=$errorCode;
        $err->message=$msg;
        $err = json_encode($err,JSON_UNESCAPED_UNICODE);
        die($err);
    }
}