<?php
namespace core\classes;

use \PDO;

require "./core/database/basedefines.php";

class DatabaseWorker{
    protected $db;
    protected $a;
    protected $op;
    function __construct(){
        $this->getPDOConnection();
        $this->op = 1;
    }
    function getPDOConnection(){
        try{
            $this->db = new PDO(dsn,user,pass,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        }catch (PDOException $e) {
            echo 'connection failed: ' . $e->getMessage();
        }
    }
    public function query($sql,$arr){
        try {
            $result = $this->db->prepare($sql);
            $result->execute($arr);
            $this->a = $result->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e){
        	echo __LINE__.$e->getMessage();
        }
        return $this->returnQuery();
    }
    public function update($sql,$arr){
        try {
            $result = $this->db->prepare($sql);
            $result->execute($arr);
        } catch(PDOException $e){
        	echo __LINE__.$e->getMessage();
        }
    }
    public function queryAll($sql,$arr){
        try {
            $result = $this->db->prepare($sql);
            $result->execute($arr);
            $this->a = $result->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e){
        	echo __LINE__.$e->getMessage();
        }
        return $this->returnQuery();
    }
    function returnQuery(){
        return $this->a;
    }
    function __destruct(){
        $this->db = NULL;
        $this->op = 0;
    }
}

?>