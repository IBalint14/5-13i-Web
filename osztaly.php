<?php

    require_once 'db.inc.php';

    class Osztalyok{
        private $osztalyId;
        private $osztalyNev;

        private $db;

        function __construct($osztId,$db){
            $sql = "SELECT osztalyNev from osztalyok where osztalyId = ".$osztalyId; //át írni saját adatbázis mezőnevekre
                if ($result = $db->dbSelect($sql)) {
                    $osztalySor = $result->fetch_assoc();
                    $this->osztalynev = $osztalySor['osztalyNev'];
                    $this->osztalyId = $osztalyId;
            }
        }

        public function getOsztaly(){
            return $this->$osztalynev;
        }

        public function getAll($db){
            $osztalyok = array();

            $sql = "SELECT osztId,osztNev from osztalyok";  //át írni saját adatbázis mezőnevekre

            if($result = $db->dbSelect($sql)){
                while($row = $result->fetch_assoc()){
                    $osztalyok[$row['osztalyId']] = $row['osztalyNev'];   
                }
            }
            return $osztalyok;
        }
    }

?>