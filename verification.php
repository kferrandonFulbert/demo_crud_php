<?php

session_start();
require_once 'connexion.php';

if (isset($_POST['mail']) && isset($_POST['password'])) {

    $username = htmlspecialchars($_POST['mail']);
    $password = htmlspecialchars($_POST['password']);

    // si le user et mdp est renseigné
    if ($username !== "" && $password !== "") {
        // le quote place des guillemets simples autour d'une chaîne d'entrée
        // préféré utiliser le bindParam
        $requete = "SELECT id, nom,  mail, mdp from utilisateurs where nom=" . $db->quote($username);
        /*  $db = $pdo->prepare($requete);
          $db->bindParam(':nom', $username, PDO::PARAM_STR);
         */
        //   var_dump($requete);die;
        $res = $db->query($requete);

        foreach ($res as $user) {
            $mdp = $user['mdp'];
            $name = $user['nom'];
            $role = "admin";
            $id = $user['id'];
        }
        //  var_dump(password_verify($password, $mdp));
      //  Vérifie que le hachage fourni correspond bien au mot de passe fourni.
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