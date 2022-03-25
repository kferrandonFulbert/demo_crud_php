<?php
/** gestion d'une pagination
 * Je récupère la pagination demandé 0, N
 * Dans mon cas, je veux afficher 5 éléments par page,
 * PS: le mieux serait de récupérer ca du paramétrage de l'utilisateur.
 */
$debut = (isset($_GET["pagination"])) ? $_GET["pagination"] : 0;
$fin = $debut + 5;
$sql = "SELECT COUNT(*) FROM produits";
$res = $db->query($sql);
$count = $res->fetchColumn();
$nbPage = $count / 5;
?>
<ul class="list-group list-group-horizontal">
    <li class="list-group-item"><a href="index.php?page=lister&pagination=0"><<</a></li>
<?php
for ($i = 0; $i < $nbPage; $i++) {
    $nb=($i!=0)?$i*5:0;
    ?>
    <li class="list-group-item"><a href="index.php?page=lister&pagination=<?=$nb;?>"><?= $i; ?></a></li>
<?php
}
?>
      <li class="list-group-item"><a href="index.php?page=lister&pagination=<?=$count -5;?>">>></a></li>
</ul>   
<table id="customers">
    <tr>
        <th>Produit</th>
        <th>Producteur</th>
        <th>Certifié le</th>
        <th>Description</th>
        <th>Image</th>
        <th>Action</th>
    </tr>
    <?php
    foreach ($db->query('SELECT * from produits limit ' . $debut . ', ' . $fin, PDO::FETCH_ASSOC) as $ligne) {
        ?>
        <td><?= $ligne["nom"] ?></td>
        <td><?= $ligne["producteur"] ?></td>
        <td><?= $ligne["certificat"] ?></td>
        <td><?= $ligne["description"] ?></td>
        <td><img class="img-thumbnail" src='img/<?= $ligne["image"] ?>' alt="<?= $ligne["nom"] ?>" /></td>
        <td><a href='index.php?page=modifier&id=<?= $ligne["id"] ?>'>Modifier</a> |
            <!--  Je demande confirmation à l'utilisateur en JS avant de réellement supprimer le produit  -->
            <a href='#' onclick='conf_suppression(<?= $ligne["id"] ?>)' >Supprimer</a></td></tr>

    <?php
}
?>

<script>
    function conf_suppression(id){
        var result = confirm("Êtes vous sûre de vouloir supprimer ce produit?");
        if (result) {
            window.location.href = "supprimer.php?id="+id;
        }
    }

</script>
</table>
