<?php
include 'config.php';
// include 'helpers/utilities.php';

class DB {
    private $conn;

    public function __construct(){
        $conn = new mysqli($GLOBALS['mysql']['host'],
        $GLOBALS['mysql']['username'],$GLOBALS['mysql']['password'],
        $GLOBALS['mysql']['database'],);
        if ($conn->connect_error){
            die("Connection Failed:" . $conn->connect_error);
        }
        $this->conn = $conn;
        // pd($conn);
    }
    
    //database read query
    public function query($sql){
        $result = $this->conn->query($sql);
        if ($result === TRUE){
            return true;
        }else{
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }

    //read db one data
    public function queryOne($sql){
        $result = $this->conn->query($sql);
        if ($result === TRUE){
            return true;
        }else{
            return $result->fetch_assoc();
        }
    }


    
    private function escape($value){
        return $this->conn->real_escape_string($value);
    }
    public function prepare($params){
        foreach ($params as $key => $value) {
            $params[$key] = $this->escape($value);
        }
        return $params;
    }
    public function insert($sql){
        $result = $this->conn->query($sql);
        if ($result === TRUE){
            return $this->conn->insert_id;
        } else {
            return false;
        }
    }
    public function update($sql){
        $result = $this->conn->query($sql);
        if ($result === TRUE){
            return true;
        } else {
            return false;
        }
    }

    public function _destruct(){
        $this->conn->close();
    }
}