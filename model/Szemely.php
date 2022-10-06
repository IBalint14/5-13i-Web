<?php


    require_once 'db.inc.php';


    class Szemely extends DataBase {

        private $szemelyId;
        private $nev;

        private $db;

        private __construct($db){
            $this->db = $db;
        }

        public function getNev($szemelyId){
            $sql = "SELECT nev FROM	szemelyek WHERE szemelyId = ".$szemelyId;
            if($resultNev = $this->db->dbSelect($sql)){
                 $szemelySor = $resultNev->fetch_assoc();
                 $this->nev = $szemelySor['nev']; 
                 $this->szemelyId = $szemelyId;
            }
            return $this->nev;
        }

        public function nevetKeres($szoveg){
            $talalatok = array();
            $sql = "SELECT szemelyId, nev FROM szemelyek WHERE nev LIKE '%$szoveg%'"; 
            if($result = $db->dbSelect($sql)){
                while($row = $result->fetch_assoc()){
                    $talalatok[$row['szemelyId']]= $row['nev'];
                }
            }
            return $talalatok; 
        }
    }






?>