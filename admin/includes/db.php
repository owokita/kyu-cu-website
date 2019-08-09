<?php


class DATABASE
{
    public $servername;
    private $username ;
    private $password ;
    private $dbname ;
    private $charset ;
 
 
    public function __construct()
    {
        $this->conn();
      
    }

    public function conn()
    {
        $this->servername ="localhost";
        $this->username ="root";
        $this->password ="";
        $this->dbname ="cudb";
        $this->charset  ="utf8mb4";
 
       
        try {
            $dsn =  "mysql:host=".$this->servername.";dbname=".$this->dbname.";charset=".$this->charset ;
            $pdo = new PDO($dsn, $this->username, $this->password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $pdo;
        } catch (PDOExeption $e) {
            echo "Connection failed".$e->getMessage();
        }
    }
    function execute($sql){
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();
        if ( $count === 0) {
            return false;
        } elseif($count > 0) {
            
        }
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }
        return $data;
    }



}

$conn = new DATABASE();




