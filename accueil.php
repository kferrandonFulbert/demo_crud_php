<h2>Bienvenue sur notre catalogue de produits.</h2>
<p>
    Vous pouvez ajouter, modifier, supprimer ou afficher les produits avec un compte.
    Si vous n'avez pas de compte, vous pouvez seulement consulter les produits.
</p>

<?php

$nom = null;
if (isset($_POST['nom']) && !empty($_POST['nom'])) {
    $nom = htmlspecialchars($_POST['nom']);
    //  $nom = "%$nom%";
}

?>

<form id='filtre' class="form-inline" name='filtre' action="index.php?page=accueil" method="post">
    <label for='nom'>Nom du produit ou producteur
        <input type="text" name='nom' id='nom' />
        <button type="submit" class="btn btn-primary mb-2">Enregistrer</button>
    </label>
</form>

<table id="customers">
    <tr>
        <th>Produit</th>
        <th>Producteur</th>
        <th>Certifié le</th>
        <th>Description</th>
        <th>Image</th>
    </tr>
    <?php
    $sql2 = 'SELECT * from produits ';
    // (int) permet de caster directement (transformer en int)
    //si on essaye de faire une injection
    // on aura une exception de levé.
    if (isset($nom)) {
        $sql2 .= ' where nom like :nom or producteur like :nom ';
        $sth2 = $db->prepare($sql2);
        $nom = '%' . $nom . '%';
        $sth2->bindParam(':nom', $nom );
    } else {      
        $sth2 = $db->prepare($sql2);
    }
    $sth2->execute();
    foreach ($sth2->fetchall(PDO::FETCH_ASSOC) as $ligne) {
        ?>
    <tr>
        <td><?= $ligne["nom"] ?></td>
        <td><?= $ligne["producteur"] ?></td>
        <td><?= $ligne["certificat"] ?></td>
        <td><?= $ligne["description"] ?></td>
        <td><img class="img-thumbnail" src='img/<?= $ligne["image"] ?>' alt="<?= $ligne["nom"] ?>" /></td>
    </tr>

    <?php
}
?>

</table>

