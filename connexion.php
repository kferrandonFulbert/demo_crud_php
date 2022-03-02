<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=catalogue',
            "root", "",  array (1002 => 'SET NAMES utf8' ));
    // set the PDO error mode to exception
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
?>
