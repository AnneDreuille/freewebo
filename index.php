<?php session_start(); ?>

<?php

//charger le fichier config avec définition des constantes d'accès à la db
require_once(__DIR__.'/app/config.php');

//charger les fichiers controller
require_once(__DIR__.'/controller/frontController.php');
// require_once(__DIR__.'/controller/backController.php');

//tester le paramètre action pour savoir quelle fonction du controleur appeler
try {

    if (isset($_GET['action'])) {

        if ($_GET['action']=='signUp') {
            signUp();
        }

        elseif ($_GET['action']=='signIn') {
            signIn();
        }

        elseif($_GET['action']=='member') {
            member();
        }

        elseif($_GET['action']=='need') {
            need();
        }

    // elseif($_GET['action']=='') {
    //   ();
    // }




    }
    //afficher par défaut la page d'accueil
    else {
        homepage();
    }
}
catch(Exception $e) {
  echo 'Erreur : ' .$e->getMessage();
}
