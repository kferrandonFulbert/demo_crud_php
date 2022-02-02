<div class="row">
    &nbsp;
</div>
<form class="row g-3" method="post" action="verif_ajout.php">
    <div class="mb-3 row">
        <label for="produit" class="col-sm-2 col-form-label">Produit</label>
        <div class="col-sm-10">
            <input type="text" class="form-control"  id="nom"  name="nom">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="producteur" class="col-sm-2 col-form-label">Producteur</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="producteur"  name="producteur">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="certificat" class="col-sm-2 col-form-label">Certifié le</label>
        <div class="col-sm-10">
            <input type="date" class="form-control" id="certificat"  name="certificat">
        </div>
    </div>
    <div class="mb-3 row">
        <label for="description" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <textarea  class="form-control" id="Description" rows="3" name="description"></textarea>
        </div>
    </div>
    <div class="col-12">
        <button class="btn btn-primary" type="submit">Enregistrer</button>
    </div>
</form>