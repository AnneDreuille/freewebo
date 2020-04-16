<?php session_start(); ?>

<?php

//charger les classes automatiquement
spl_autoload_register(function ($className) {
    include $className . '.php';
});

//charger le fichier config avec définition des constantes d'accès à la db
require_once(__DIR__.'/app/config.php');

//charger les fichiers controller
require_once(__DIR__.'/controller/frontController.php');
require_once(__DIR__.'/controller/backController.php');

//BOUTON LIKE
function nbLike(){
    $file = 'clicks.txt';
    $clicks = file_get_contents($file);
    echo $clicks;
}

//tester le paramètre action pour savoir quelle fonction du controleur appeler
try {

    if (isset($_GET['action'])) {

//FRONT
        if ($_GET['action']=='errorPage') {
            errorPage();
        }

        elseif ($_GET['action']=='privacyPolicy') {
            privacyPolicy();
        }

        elseif ($_GET['action']=='signUp') {
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

        elseif($_GET['action']=='modelFile') {
            modelFile();
        }

        elseif($_GET['action']=='validModel') {
            validModel();
        }

        elseif($_GET['action']=='urlName') {
            urlName();
        }

        elseif($_GET['action']=='ratingClient') {
            ratingClient();
        }

        elseif($_GET['action']=='ratingDev') {
            ratingDev();
        }

        elseif($_GET['action']=='addMessage') {
            addMessage();
        }

        elseif($_GET['action']=='listMessage') {
            listMessage();
        }

        elseif($_GET['action']=='clicks') {
            clicks();
        }

        elseif($_GET['action']=='logOut') {
            logOut();
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

        elseif($_GET['action']=='endDate') {
            endDate();
        }

        elseif($_GET['action']=='updateUser') {
            updateUser();
        }

    }
    //afficher par défaut la page d'accueil
    else {
        homepage();
    }
}
catch(Exception $e) {
  echo 'Erreur : ' .$e->getMessage();
}
