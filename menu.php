<ul class="nav">
  <li class="nav-item">
      <!-- si je suis sur la page qui correspond à mon lien,
      j'ajoute la classe css active pour que l'utilisateur comprenne ou il se trouve -->
    <a class="nav-link <?= ($page=="accueil")?"active":""; ?>" aria-current="page"
       href="index.php?page=accueil">Accueil</a>
  </li>
  <?php
  if(isset($_SESSION['role'])){
    if($_SESSION["role"]=="admin"){
        ?>
  <li class="nav-item">
    <a class="nav-link <?= ($page=="ajouter")?"active":""; ?>"
       href="index.php?page=ajouter">Ajouter</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?= ($page=="lister")?"active":""; ?>"
       href="index.php?page=lister">Lister</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?= ($page=="deconnecter")?"active":""; ?>"
       href="index.php?page=deconnecter">Deconnexion</a>
  </li>
  <?php
    }
}else{
  ?>
  
  <li class="nav-item">
    <a class="nav-link <?= ($page=="login")?"active":""; ?>"
       href="index.php?page=login">Se connecter</a>
  </li>

<?php } ?>
</ul>