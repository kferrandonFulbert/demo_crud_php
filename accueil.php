<h2>Bienvenue sur notre catalogue de produits.</h2>
<p>
    Vous pouvez ajouter, modifier, supprimer ou afficher les produits avec un compte.
    Si vous n'avez pas de compte, vous pouvez seulement consulter les produits.
</p>

<?php
/** gestion d'une pagination
 * Je récupère la pagination demandé 0, N
 * Dans mon cas, je veux afficher 5 éléments par page,
 * PS: le mieux serait de récupérer ca du paramétrage de l'utilisateur.
 */
$nom = null;
if (isset($_POST['nom']) && !empty($_POST['nom'])) {
    $nom = htmlspecialchars($_POST['nom']);
    //  $nom = "%$nom%";
}
$debut = (isset($_GET["pagination"])) ? $_GET["pagination"] : 0;
$fin = $debut + 5;
$sql = "SELECT COUNT(*) FROM produits";
if (isset($nom)) {
    $sql .= " where nom like '%:nom%'";
    $sth = $db->prepare($sql);

    $sth->bindParam(':nom', $nom, PDO::PARAM_STR, 50);
} else {
    $sth = $db->prepare($sql);
}

$sth->execute();
$count = $sth->fetchColumn();
$nbPage = $count / 5;
?>

<form id='filtre' class="form-inline" name='filtre' action="index.php?page=accueil" method="post">
    <label for='nom'>Nom du produit ou producteur
        <input type="text" name='nom' id='nom' />
        <button type="submit" class="btn btn-primary mb-2">Enregistrer</button>
    </label>
</form>
<ul class="list-group list-group-horizontal">
    <li class="list-group-item"><a href="index.php?page=accueil&pagination=0"><<</a></li>
    <?php
    for ($i = 0; $i < $nbPage; $i++) {
        $nb = ($i != 0) ? $i * 5 : 0;
        ?>
        <li class="list-group-item"><a href="index.php?page=accueil&pagination=<?= $nb; ?>"><?= $i; ?></a></li>
        <?php
    }
    ?>
    <li class="list-group-item"><a href="index.php?page=accueil&pagination=<?= $count - 5; ?>">>></a></li>
</ul>   
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
        $sql2 .= ' where nom like :nom or producteur like :nom limit ' . (int) $debut . ', ' . (int) $fin;
        $sth2 = $db->prepare($sql2);
        $nom = '%' . $nom . '%';
        $sth2->bindParam(':nom', $nom );
    } else {
        $sql2 .= ' limit ' . (int) $debut . ', ' . (int) $fin;
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

