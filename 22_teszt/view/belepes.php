<?php

$title = "BELÉPÉS";
include 'view/layout/head.php';

    echo $eredmeny;

    if(!isset($_SESSION['id'])) {
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
    }
    else {
        ?>
        <form action="index.php?page=felhasznalo&action=feltoltes" method="post" enctype="multipart/form-data">
            Profilkép feltöltése:
            <input type="file" name="profilkep" id="fileToUpload">
            <input type="submit" value="Feltöltés" name="submit">
        </form>
        <?php
    }
    ?>
    <hr>
    <a href="index.php"><< Vissza</a>
</body>
</html>