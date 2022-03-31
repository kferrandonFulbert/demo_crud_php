<?php
// 1) pour la page modifier je vais tester si j'ai bien récupérer l'ID
// du produit a modifier 
// 2) je vais récupérer les informations du produits grâce à l'ID récupéré.
// 3) J'alimente les champs du formulaire a partir des informations récupérés.
// 4) je peux faire le choix de valider mon formulaire sur la même page
//  ou dans une page différente. Ici je choisi la même page. 
//  D'ou le test de la méthode POST (si je viens par la validation du formulaire)
//  ou en GET si je viens de la page Lister. 
require_once 'connexion.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // modification non sécurisé car je ne fait aucune verif sur les champs
        // pour sécurisé voir le fichier verif_ajout.php
        $sql = "update produits set nom='" . $_POST['nom'] . "', producteur='"
                . $_POST['producteur'] . "', description='" . $_POST['description'] . "', "
                . "certificat='" . $_POST['certificat'] . "' where id='" . $_POST['id'] . "'";
        $sth = $db->prepare($sql);
        $sth->execute();
        $sth->debugDumpParams();
        $_SESSION['FLASH']["message"] = "Produit Modifié";
        $_SESSION['FLASH']["type"] = "success";
        header("location: index.php?page=lister");
        die;
    } catch (Exception $e) {
        //  echo $e->getMessage();
        $_SESSION['FLASH']["message"] = "Erreur lors de la modification: " . $e->getMessage();       
        $_SESSION['FLASH']["type"] = "danger";
         header("location: index.php?page=modifier");
        die;
    }
} else {
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        $_SESSION['FLASH']["message"] = "Vous devez choisir un produit valide pour le modifier";       
        $_SESSION['FLASH']["type"] = "danger";
        header("location: index.php?page=lister");
        die;
    } else {
        /**
         * Je récupère mon produit a modifié sous forme d'objet
         * pour remplir mon formulaire.
         */
        $q = $db->prepare("SELECT id, nom, producteur, description, certificat, image FROM `produits` WHERE id=?");
        $q->execute([trim(htmlentities($_GET['id']))]);
        $produit = $q->fetch(PDO::FETCH_OBJ);
        // var_dump($produit);die;
    }
}
?>
<div class="row">
    &nbsp;
</div>
<form class="row g-3" method="post" action="index.php?page=modifier">
    <input type="hidden" class="form-control"  id="id"  name="id" value="<?= $produit->id; ?>">
    <div class="mb-3 row">
        <label for="produit" class="col-sm-2 col-form-label">Produit</label>
        <div class="col-sm-10">
            <input type="text" class="form-control"  id="nom"  name="nom" value="<?= $produit->nom; ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="producteur" class="col-sm-2 col-form-label">Producteur</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="producteur"  name="producteur" value="<?= $produit->producteur; ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="certificat" class="col-sm-2 col-form-label">Certifié le</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" id="certificat"  name="certificat" value="<?= $produit->certificat; ?>">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="description" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <textarea  class="form-control" id="Description" rows="3" name="description"><?=
                $produit->description;
                ;
                ?></textarea>
        </div>
    </div>
    <div class="row">
        <img src="img/<?= $produit->image; ?>" class="img-thumbnail" />
    </div>
    <div class="col-12">
        <button class="btn btn-primary" type="submit">Enregistrer</button>
    </div>

</form>