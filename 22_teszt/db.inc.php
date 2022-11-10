
<?php

class DataBase {

    private $servername = "localhost";
         private $username = "phptest";
         private $password = "USM4!0v4Xm6T]AqO";
         private $dbname = "phpteszt";

    private $conn;

    function __construct() {
        // Create connection
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $this->conn = $conn;
    }

    /**
     * 
     */
    public function dbSelect($sql) {
        if($result = $this->conn->query($sql)) {
            if ($result->num_rows > 0) {
                return $result; 
              }
              else {
                  return NULL;
              }
        }
        elseif($this->conn->error) {
            die("SQL hiba: " . $this->conn->error);
        }
    }
}


?>