<?php
require 'connexion.php';

$pages = [
    'accueil' => 'accueil.php',
    'ajouter' => 'ajouter.php',
    'lister' => 'lister.php',
    'modifier' => 'modifier.php',
    '' => 'accueil.php',
    '404' => '404.php'
];
$page = (isset($_GET['page'])) ? $_GET['page'] : "404";
if (!isset($pages[$page])) {
    $page = "404";
    header("HTTP/1.1 404 Not Found");
}
?>
