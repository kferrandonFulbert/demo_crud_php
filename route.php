<?php
require 'connexion.php';

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
if (!isset($page)) {
    header("location: index.php?page=accueil");
}
else if (!isset($pages[$page])) {
    $page = "404";
    header("HTTP/1.1 404 Not Found");
}
?>
