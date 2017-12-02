<?php

class SQLConnection {
    
    private $serverName = 'localhost';
    private $userName = 'root';
    private $password = '';
    public $db = 'SyncLabDB';
    
    /*public function __construct()
    {
        $this->$serverName = 'localhost';
        $this->$userName = 'root';
        $this->$password = '';
        $this->$db = 'S-CoolDB';
    }*/
    function connection()
    {
        $con = null;
        if(!isset($con)){
            $con = new mysqli($this->serverName, $this->userName, $this->password, $this->db);
            
        }

        if($con === false) {  
            echo " ".mysqli_connect_error(); 
        }
        
        return $con;
    }
}