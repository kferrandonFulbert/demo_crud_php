<?php
require 'connexion.php';

/**
 * Gestion des routes
 * Je créer un tableau associatif (Clef=>valeur)
 * Si le paramètre get page existe 
 * je recherche la clef dans le tableau pages voir s'il existe 
 * Alors je charge la page associé
 */
$pages = [
    'accueil' => 'accueil.php',
    'ajouter' => 'ajouter.php',
    'lister' => 'lister.php',
    'modifier' => 'modifier.php',
    'login' => 'login.php',
    'deconnecter' => 'deconnecter.php',
    '' => 'accueil.php',
    '404' => '404.php'
];
$page = (isset($_GET['page'])) ? $_GET['page'] : null;

// Si le param page n'existe pas je redirige sur l'accueil
if (!isset($page)) {
    header("location: index.php?page=accueil");
}
// Si la page envoyé n'est pas gérer dans mon tableau de route ($pages) alors je génère une 404 manuelement
else if (!isset($pages[$page])) {
    $page = "404";
    header("HTTP/1.1 404 Not Found");
}
?>
