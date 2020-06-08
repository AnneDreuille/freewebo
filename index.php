<?php session_start();

use \controller\FrontController;
use \controller\BackController;

//charger les classes automatiquement
spl_autoload_register(function ($className) {
    include str_replace('\\', DIRECTORY_SEPARATOR, $className ).'.php';
});

//charger le fichier config avec constantes d'accès à la db
require_once(__DIR__.'/app/config.php');

//afficher le nb de like en barre nav
function nbLike(){
    $file = 'clicks.txt';
    $clicks = file_get_contents($file);
    echo $clicks;
}

//tester le paramètre action pour savoir quelle fonction du controleur appeler
try {
    $frontController = new FrontController();
    $backController = new BackController();

    if (isset($_GET['action'])) {

//FRONT
        if($_GET['action']=='clicks') {
            $frontController->clicks();
        }
        elseif($_GET['action']=='logOut') {
            $frontController->logOut();
        }
        elseif ($_GET['action']=='errorPage') {
            $frontController->errorPage();
        }
        elseif ($_GET['action']=='privacyPolicy') {
            $frontController->privacyPolicy();
        }
        elseif ($_GET['action']=='signUp') {
            $frontController->signUp();
        }
        elseif ($_GET['action']=='signIn') {
            $frontController->signIn();
        }
        elseif($_GET['action']=='member') {
            $frontController->member();
        }
        elseif($_GET['action']=='need') {
            $frontController->need();
        }
        elseif($_GET['action']=='modelFile') {
            $frontController->modelFile();
        }
        elseif($_GET['action']=='validModel') {
            $frontController->validModel();
        }
        elseif($_GET['action']=='urlName') {
            $frontController->urlName();
        }
        elseif($_GET['action']=='ratingClient') {
            $frontController->ratingClient();
        }
        elseif($_GET['action']=='ratingDev') {
            $frontController->ratingDev();
        }
        elseif($_GET['action']=='addMessage') {
            $frontController->addMessage();
        }
        elseif($_GET['action']=='dev') {
            $frontController->dev();
        }

//BACK
        elseif($_GET['action']=='admin') {
            $backController->admin();
        }
        elseif($_GET['action']=='updateUser') {
            $backController->updateUser();
        }
        elseif($_GET['action']=='project') {
            $backController->project();
        }
        elseif($_GET['action']=='assign') {
            $backController->assign();
        }
        elseif($_GET['action']=='endDate') {
            $backController->endDate();
        }
    }
    //afficher par défaut la page d'accueil
    else {
        $frontController->homepage();
    }
}
catch(Exception $e) {
  echo 'Erreur : ' .$e->getMessage();
}
