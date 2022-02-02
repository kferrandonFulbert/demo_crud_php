<?php
require 'connexion.php';
try{
$sql = "DELETE from produits where id=".$_GET['id'];
$sth = $db->prepare($sql);
$sth->execute();
header("location: index.php?page=lister");
}catch(Exception $e){
    echo $e->getMessage();
    die;
}

