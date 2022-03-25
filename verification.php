<?php
/** 
 * Session_start doit se trouver sur toutes les pages qui ont besoin de
 * la super globale $_SESSION[''];
 */
session_start();
require_once 'connexion.php';

if (isset($_POST['mail']) && isset($_POST['password'])) {

    $username = htmlspecialchars($_POST['mail']);
    $password = htmlspecialchars($_POST['password']);

    // si le user et mdp est renseigné
    if ($username !== "" && $password !== "") {
        // le quote place des guillemets simples autour d'une chaîne d'entrée
        // cela ne sécurise pas des attaques, utiliser le bindParam
        $requete = "SELECT id, nom,  mail, mdp from utilisateurs where nom=" . $db->quote($username);
        /*  $db = $pdo->prepare($requete);
          $db->bindParam(':nom', $username, PDO::PARAM_STR);
         */
        $res = $db->query($requete);
        foreach ($res as $user) {
            $mdp = $user['mdp'];
            $name = $user['nom'];
            $role = "admin";
            $id = $user['id'];
        }
      //  Vérifie que le hachage récupéré de la BDD correspond bien au mot de passe saisi par l'utilisateur.
        if (password_verify($password, $mdp)) {
            session_regenerate_id();
            $_SESSION['username'] = $name;
            $_SESSION['role'] = "admin";
            $_SESSION['idUser'] = $id;           
            /**
             * Todo gérer les messages flash
             */
            if ($role == 'admin') {
                header('Location: index.php?page=accueil');
            } else {
                header('Location: index.php');
            }
        } else {
            header('Location: index.php?page=login'); // utilisateur ou mot de passe incorrect
        }
    } else {
        header('Location: index.php?page=login'); // utilisateur ou mot de passe vide
    }
} else {
    //  header('Location: login.php');
    header('Location: index.php?page=login'); //formulaire non renseigne
}
?>