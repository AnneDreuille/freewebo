<?php session_start(); ?>

<?php

//charger le fichier config avec définition des constantes d'accès à la db
require_once(__DIR__.'/app/config.php');

//charger les fichiers controller
require_once(__DIR__.'/controller/frontController.php');
require_once(__DIR__.'/controller/backController.php');

//tester le paramètre action pour savoir quelle fonction du controleur appeler
try {

    if (isset($_GET['action'])) {

//FRONT
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

//BACK
        elseif($_GET['action']=='admin') {
            admin();
        }

        elseif($_GET['action']=='project') {
            project();
        }

        elseif($_GET['action']=='assign') {
            assign();
        }

        // elseif($_GET['action']=='') {
        //      ();
        // }

        // elseif($_GET['action']=='') {
        //      ();
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
