<?php

session_start();
require_once 'connexion.php';

//On regarde si les variables existent et sont non vide
if (!isset($_POST["nom"]) || empty($_POST["nom"])) {
    $_SESSION['FLASH']["message"] = "Le nom n'est pas saisi";
    $_SESSION['FLASH']["type"] = "danger";
    header("location: index.php?page=ajouter");
    die;
}
if (!isset($_POST["producteur"]) || empty($_POST["producteur"])) {
    //echo "Le champs producteur est obligatoire.";
    $_SESSION['FLASH']["message"] = "Le champs producteur est obligatoire.";
    $_SESSION['FLASH']["type"] = "warning";
    header("location: index.php?page=ajouter");
    die;
}
try {

    /* Méthode non sécurisé
     * $sql = "INSERT INTO produits(nom,producteur, description, "
      . "certificat) VALUES('".$_POST['nom']."',"
      . " '".$_POST['producteur']."',"
      . "'".$_POST['description']."', '".$_POST['certificat']."')";
      $sth = $db->prepare($sql);
      $sth->execute(); */

    // On passe par un filtre pour sécuriser nos données.
    $nom = filtreChaine($_POST['nom']);
    $description = filtreChaine($_POST['description']);
    $producteur = filtreChaine($_POST['producteur']);
    $certificat = filtreChaine($_POST['certificat']);

    /**
     * Gestion de l'image qu'il faudrait externaliser
     */
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $ImageNameDB = ($_FILES["image"]["name"]) ? $_FILES["image"]["name"] : "";
// Check if image file is a actual image or fake image
    if (isset($_FILES["image"]) && !empty($ImageNameDB)) {
        $check = getimagesize($_FILES["image"]["tmp_name"]);

        //   var_dump($_FILES["image"]);die;
        // si le check est = à false on peut décider de ne pas enregistrer en BDD par exemple
        if ($check !== false) {
            echo "Image OK - " . $check["mime"] . ".";
            $uploadOk = true;
            // de meme si l'image n'a pas été téléchargé sur le serveur
            if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
                echo "Le fichier est valide, et a été téléchargé
           avec succès. Voici plus d'informations :\n";
            } else {
                // cf doc de move_uploaded_file
                echo "Attaque potentielle par téléchargement de fichiers.
          Voici plus d'informations :\n";
            }
        } else {
            echo "L'image est incorrect.";
            $uploadOk = false;
        }
    }


// On prépare et execute notre requete.
    $sql = "INSERT INTO produits(nom,producteur, description, "
            . "certificat, image) VALUES(?, ?, ?, ?, ?)";
    $sth = $db->prepare($sql);
    $sth->bindParam(1, $nom, PDO::PARAM_STR, 45);
    $sth->bindParam(3, $description, PDO::PARAM_STR, 65000);
    $sth->bindParam(2, $producteur, PDO::PARAM_STR, 45);
    $sth->bindParam(4, $certificat, PDO::PARAM_STR, 10);
    $sth->bindParam(5, $ImageNameDB, PDO::PARAM_STR, 200);
    $sth->execute();
//$sth->debugDumpParams(); pour debug en dev vos requetes
    
    $_SESSION['FLASH']["message"] = "Produit ajouté ok";
    $_SESSION['FLASH']["type"] = "success";
    header("location: ./index.php?page=lister");
} catch (Exception $e) {
    $_SESSION['FLASH']["message"] = $e->getMessage();
    $_SESSION['FLASH']["type"] = "danger";
    header("location: ./index.php?page=ajouter");
}

/**
 * Filtre les chaines de caractère
 * @param string $chaine
 * @return string
 */
function filtreChaine(string $chaine): string {
    return filter_var(trim($chaine), FILTER_SANITIZE_STRING);
}
