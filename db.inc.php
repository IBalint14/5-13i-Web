<?php

    class DataBase{
    // phpteszter jelszava: HfblLxoQi75hdL1d
         private $servername = "localhost";
         private $username = "phpteszter";
         private $password = "HfblLxoQi75hdL1d";
         private $dbname = "phpteszt";

         private $conn;

         function __construct(){
        // Create connection
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
	
        // Check connection
        if ($conn->connect_error) {
	         die("Connection failed: " . $conn->connect_error);
            }  
             $this->conn = $conn;
        }

        private function connect(){

        }
        public function dbSelect($sql){
            $result = $this->conn->query($sql);
                if($result->num_rows > 0){
                    return $result;
                    }
            else{
                return NULL;
                }
            }
    }

  
?>