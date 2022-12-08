<?php

$title = "TALÁLATI LISTA";
include 'view/layout/head.php';

if(isset($hiba)) {
    echo $hiba;
}
elseif(isset($talalatok)) {
    if($talalatok) {
        foreach($talalatok as $kulcs => $nev) {
            echo "<h2><a href=\"index.php?szemelyId=$kulcs\">$nev</a></h2>";
        }
    }
    else {
        echo "<h2>Nem taláható ilyen név: ".$_POST['keresettNev']."</h2>";
    }
}

include 'view/layout/foot.php';
?>