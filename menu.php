  <ul class="nav">
  <li class="nav-item">
    <a class="nav-link <?= ($page=="accueil")?"active":""; ?>" aria-current="page"
       href="index.php?page=accueil">Accueil</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?= ($page=="ajouter")?"active":""; ?>"
       href="index.php?page=ajouter">Ajouter</a>
  </li>
  <li class="nav-item">
    <a class="nav-link <?= ($page=="lister")?"active":""; ?>"
       href="index.php?page=lister">Lister</a>
  </li>

</ul>