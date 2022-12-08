<?php 

$title = $osztalyok[$osztaly];
include 'view/layout/head.php';

echo "<h1>$osztalyok[$osztaly]</h1>";

    // feltöltjük az eredményekkel a tömböt
    $osztalyTerem = array();

    if ($result) {
        while($row = $result->fetch_assoc()) {
            $osztalyTerem[$row['sor']][$row['oszlop']] = $row;
        }
    }

    if ($osztalyTerem) {
        echo '<table>';
        foreach($osztalyTerem as $sor) {
            echo "<tr>";
            for($i=1;$i<7;$i++) {
                if(isset($sor[$i])) {
                    $bg = "";
                    if(isset($_GET['szemelyId'])) {
                        if($_GET['szemelyId'] == $sor[$i]['szemelyId']) {
                            $bg = "background-color: yellow;";
                        }
                    }
                    if(isset($_SESSION['id'])) {
                        if($_SESSION['id'] == $sor[$i]['szemelyId']) {
                            echo "<td style=\"color:rgb(101, 1, 252);$bg\">".$sor[$i]['nev'];
                        }
                        else echo "<td style=\"$bg\">".$sor[$i]['nev'];
                    }
                    else echo "<td style=\"$bg\">".$sor[$i]['nev'];
                    
                    $img = "uploads/".$sor[$i]['szemelyId'].".jpg";
                    if(file_exists($img)) {
                        echo "<br><img src=\"$img\">";
                    }
                }
                else {
                    echo "<td> ";
                }
                echo "</td> ";
            }
            echo "</tr>";
        }
        echo '</table>';
    } 
    else {
        echo "Nincsenek tanulók eben az osztályban";
    } 

include 'view/layout/foot.php';
?>