<?php
namespace App\Database\Config;

class DB {
    private $serverName = "localhost";
    private $UserName = "root";
    private $Password = "";
    private $database = "e_commerce";
    public $conn;
    public function __construct() {
        $this->conn = new \mysqli($this->serverName,$this->UserName,$this->Password,$this->database);
    }

    public function __destruct()
    {
        $this->conn->close();
    }

}

// ---------------------- PDO connection ----------------------

// class DB{
//     private $server = "mysql:host=localhost;dbname=e_commerce";
//     private $user="root";
//     private $password="";
//     public $conn;

//         public function __construct(){
//         try{
//             $this->conn = new \PDO($this->server,$this->user,$this->password);

//         }catch (\PDOException $e){
//             echo "Connection Failed: " . $e->getMessage();
//         }
//     }

//     // function select($cols,$table,$condition=1){
//     //     return $this->connection->query("select $cols from $table where $condition");
//     // }

//     public function __destruct(){
//         $this->conn = null;
//   }

// }
