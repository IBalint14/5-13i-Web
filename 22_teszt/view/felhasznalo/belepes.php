<?php

$title = "BELÉPÉS";
include 'view/layout/head.php';

echo $eredmeny;

?>
    <form action="index.php" method="post">
    Felhasználónév:<br>
    <input type="text" name="felhnev" placeholder="Írd be a felhasználóneved" required><br>
    Jelszó:<br>
    <input type="password" name="jelszo" required><br>
    <input type="hidden" name="action" value="belepes">
    <input type="hidden" name="page" value="felhasznalo">
    <input type="submit" value="BELÉPÉS">
<?php
include 'view/layout/foot.php';
?>