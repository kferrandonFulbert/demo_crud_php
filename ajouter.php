<?php
/**
 * Une fois la connexion effectuer par l'utilisateur
 * on va donner verifier qu'il ait bien accès à la page ajouter
 * (dans notre cas s'il est admin) 
 * ainsi si un utilisateur ajoute dans l'url index.php?page=ajouter
 * sans s'être authentifié il sera redirigé vers la page de login
 */
if (isset($_SESSION['role'])) {
    if ($_SESSION["role"] == "admin") {
        ?>
        <div class="row">
            &nbsp;
        </div>
        <form id="formAjout" name="formAjout" class="row g-3" method="post" action="verif_ajout.php" enctype="multipart/form-data">
            <div class="mb-3 row">
                <label for="produit" class="col-sm-2 col-form-label">Produit</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"  id="nom"  name="nom" >
                </div>
            </div>
            <div class="mb-3 row">
                <label for="producteur" class="col-sm-2 col-form-label">Producteur</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="producteur"  name="producteur" >
                </div>
            </div>
            <div class="mb-3 row">
                <label for="certificat" class="col-sm-2 col-form-label">Certifié le</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="certificat"  name="certificat" required="required">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea  class="form-control" id="Description" rows="3" name="description"></textarea>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="image" class="col-sm-2 col-form-label">Image</label>
                <div class="col-sm-10">
                    <input type="file"  class="form-control" id="image" name="image" accept="image/png, image/jpeg" />
                </div>
            </div>
            <div class="col-12">
             <!--   <a class="btn btn-primary" href="#" onclick="verifAjout();">Enregistrer</a>-->
                 <button class="btn btn-primary" type="submit">Enregistrer</button>
            </div>
        </form>
        <?php
    } else {
        header("location: index.php?page=login");
    }
} else {
    header("location: index.php?page=login");
}
?>

<script>
    function verifAjout(){
        var form = document.forms["formAjout"]; 
        
        //console.log(form.nom);
    }
</script>