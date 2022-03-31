<?php
session_start();
require 'connexion.php';
try {
    $sql = "DELETE from produits where id=" . $_GET['id'];
    $sth = $db->prepare($sql);
    $sth->execute();
    $_SESSION['FLASH']["message"] = "Produit supprimé";
    $_SESSION['FLASH']["type"] = "success";
    header("location: index.php?page=lister");
} catch (Exception $e) {
    $_SESSION['FLASH']["message"] = "Impossible de supprimer le produit :" . $e->getMessage();
    $_SESSION['FLASH']["type"] = "danger";
    header("location: index.php?page=lister");
    // die;
}

