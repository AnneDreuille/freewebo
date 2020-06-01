<?php session_start();

//charger les classes automatiquement
spl_autoload_register(function ($className) {
    include str_replace('\\', DIRECTORY_SEPARATOR, $className ).'.php';
});

//charger le fichier config avec constantes d'accès à la db
require_once(__DIR__.'/app/config.php');

//charger les fichiers controller
require_once(__DIR__.'/controller/frontController.php');
require_once(__DIR__.'/controller/backController.php');

//afficher le nb de like en barre nav
function nbLike(){
    $file = 'clicks.txt';
    $clicks = file_get_contents($file);
    echo $clicks;
}

//tester le paramètre action pour savoir quelle fonction du controleur appeler
try {
    if (isset($_GET['action'])) {

//FRONT
        if($_GET['action']=='clicks') {
            clicks();
        }
        elseif($_GET['action']=='logOut') {
            logOut();
        }
        elseif ($_GET['action']=='errorPage') {
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
        elseif($_GET['action']=='dev') {
            dev();
        }

//BACK
        elseif($_GET['action']=='admin') {
            admin();
        }
        elseif($_GET['action']=='updateUser') {
            updateUser();
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
    }
    //afficher par défaut la page d'accueil
    else {
        homepage();
    }
}
catch(Exception $e) {
  echo 'Erreur : ' .$e->getMessage();
}
