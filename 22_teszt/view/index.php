<?php 

$title = $osztalyok[$osztaly];
include 'view/layout/head.php';

echo "<h1>$osztalyok[$osztaly]</h1>";

?>
    <form method="post" action="lista.php">
        <input type="text" name="keresettNev">
        <input type="submit" value="KERES">
    </form>
    <?php

    foreach($osztalyok as $kulcs => $ertek) {
        if($kulcs != $osztaly) {
            echo "<h2><a href=\"index.php?osztalyId=$kulcs\">$ertek</a></h2>";
        }  
    }
    
    if ($result) {
        echo '<table>';
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            for($i=1; $i<6; $i++) {
                $nev = "-";
                $mezoNev = 'nev'.$i;
                if($row[$mezoNev] != null) {
                    $nev = $szemely->getNev($row[$mezoNev]);
                }
                $bg = "";
                if(isset($_GET['szemelyId'])) {
                    if($_GET['szemelyId'] == $row[$mezoNev]) {
                        $bg = "background-color: yellow;";
                    }
                }
                if(isset($_SESSION['id'])) {
                    if($_SESSION['id'] == $row[$mezoNev]) {
                        echo "<td style=\"color:rgb(101, 1, 252);$bg\">".$nev;
                    }
                    else echo "<td style=\"$bg\">".$nev;
                }
                else echo "<td style=\"$bg\">".$nev;
                
                $img = "uploads/".$row[$mezoNev].".jpg";
                if(file_exists($img)) {
                    echo "<br><img src=\"$img\">";
                }
                echo "</td>\n";
            }
            echo "</tr>";
        }
        echo '</table>';
    } 
    else {
        echo "Nincsenek tanulók eben az osztályban";
    } 
    ?>
</body>
</html>