<?php   
    require_once 'db.inc.php';
    class Szemely {

        private $szemelyId;
        private $nev;

        private $db;

        function __construct($db){
            $this->db = $db;
        }

        public function getNev($szemelyId){
            $sql = "SELECT szemelyId,nev FROM szemelyek WHERE szemelyId = ".$szemelyId;
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
            if($result = $this->db->dbSelect($sql)){
                while($row = $result->fetch_assoc()){
                    $talalatok[$row['szemelyId']]= $row['nev'];
                }
            }
            return $talalatok; 
        }

        public function getOsztaly($szemelyId){

            $sql = "SELECT osztalyId FROM sorok WHERE (";
		for($i=1;$i<=5;$i++){
			$sql.= "nev$i = ".$szemelyId;
			if($i < 5) $sql .= " OR ";
			else $sql .= " )";
		}
		if($result = $this->db->dbSelect($sql)){
			if($row = $result-> fetch_assoc()){
				return $row['osztalyId'];
			}
		}

        }
    }
?>