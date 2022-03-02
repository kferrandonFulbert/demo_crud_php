<?php
session_start();
require_once 'connexion.php';

if (isset($_POST['mail']) && isset($_POST['password'])) {
  
    $username = htmlspecialchars($_POST['mail']);
    $password = htmlspecialchars($_POST['password']);
 //   var_dump($password);die;
    $options = [
      //  'cost' => 12,
    ];
     //  $password = password_hash($password, PASSWORD_BCRYPT);
   //    $password = password_hash($password, PASSWORD_BCRYPT, $options);
    // echo $password;die;
    if ($username !== "" && $password !== "") {

        $requete = "SELECT id, nom,  mail, mdp from utilisateurs where nom=" . $db->quote($username);
        //. "and mdp=".$pdo->quote($password);
        /*  $sth = $pdo->prepare($requete);
          $sth->bindParam(':nom', $username, PDO::PARAM_STR);
          $sth->bindParam(':mdp', $password, PDO::PARAM_STR); */
     //   var_dump($requete);die;
$res=$db->query($requete);

        foreach ($res as $user) {
            $mdp = $user['mdp'];
            $name = $user['nom'];
            $role = "admin";
            $id = $user['id'];
        }
      //  var_dump(password_verify($password, $mdp));
        if (password_verify($password, $mdp)) {
            session_regenerate_id();
            $_SESSION['username'] = $name;
            $_SESSION['role'] = "admin";
            $_SESSION['idUser'] = $id;
            if($role=='admin'){
                    header('Location: index.php?page=admin');
            }else{
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