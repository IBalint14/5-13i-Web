
<?php

class DataBase {

    private $servername = "mysql.nethely.hu";
    private $username = "ibalint";
    private $password = "sTzyL3k1*d2o9m!@m0xU";
    private $dbname = "ibalint";

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