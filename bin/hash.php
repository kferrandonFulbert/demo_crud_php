<?php
echo "welcome to Catalogue hash\n\rHow to use it?\n\r"
. "php bin\\hash.php mdp nom mail".PHP_EOL;
$mdp =  password_hash($argv[1], PASSWORD_BCRYPT);

if(isset($argv[2]) && isset($argv[3])){
   echo "insert into utilisateur (nom, mail, mdp) values('$argv[2]', '$argv[3]', '$mdp' )"; 
}else{
    echo $mdp;
}

