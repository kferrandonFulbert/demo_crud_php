<?php
require_once 'connexion.php';;
if(!isset($_POST["nom"]) || empty($_POST["nom"])){
    echo "Le champs produit est obligatoire."; die;
}
if(!isset($_POST["producteur"])){
    echo "Le champs producteur est obligatoire."; die;
}
try{
    
/* Méthode non sécurisé
 * $sql = "INSERT INTO produits(nom,producteur, description, "
        . "certificat) VALUES('".$_POST['nom']."',"
        . " '".$_POST['producteur']."',"
        . "'".$_POST['description']."', '".$_POST['certificat']."')";
$sth = $db->prepare($sql);
$sth->execute();*/
$nom = filtreChaine($_POST['nom']);
$description = filtreChaine($_POST['description']);
$producteur = filtreChaine($_POST['producteur']);
$certificat = filtreChaine($_POST['certificat']);
$sql = "INSERT INTO produits(nom,producteur, description, "
        . "certificat) VALUES(?, ?, ?, ?)";
$sth = $db->prepare($sql);
$sth->bindParam(1, $nom, PDO::PARAM_STR, 45  );
$sth->bindParam(3, $description, PDO::PARAM_STR, 65000  );
$sth->bindParam(2, $producteur, PDO::PARAM_STR, 45  );
$sth->bindParam(4, $certificat, PDO::PARAM_STR, 10  );
$sth->execute();
$sth->debugDumpParams();
 echo 'Produit ajouté';
 header("location: ./index.php?page=lister");
}catch(Exception $e){
    echo $e->getMessage();
    die;
}


function filtreChaine(string $chaine):string{
    return filter_var(trim($chaine), FILTER_SANITIZE_STRING);
}