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
    foreach ($db->query('SELECT * from produits', PDO::FETCH_ASSOC) as $ligne) {
        ?>
    <td><?= $ligne["nom"] ?></td>
    <td><?= $ligne["producteur"] ?></td>
    <td><?= $ligne["certificat"] ?></td>
    <td><?= $ligne["description"] ?></td>
    <td><img class="img-thumbnail" src='img/<?= $ligne["image"] ?>' alt="<?= $ligne["nom"] ?>" /></td>
    <td><a href='index.php?page=modifier&id=<?=$ligne["id"]?>'>Modifier</a> |
    <a href='#' onclick='conf_suppression(<?=$ligne["id"]?>)' >Supprimer</a></td></tr>
      
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
