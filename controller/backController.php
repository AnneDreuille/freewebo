<?php

use \model\UserModel;
use \model\ProjectModel;
use \model\ChatModel;

//afficher les listes clients, devs, projets ds admin
function admin(){

    if (empty($_SESSION['userType']) || $_SESSION['userType'] !=='admin') {
        throw new Exception("Vous n'avez pas accès à cette page");
    }

    //créer les objets
    $userModel= new UserModel();
    $projectModel = new ProjectModel();

    //appeler les fonctions de ces objets
    $listClient= $userModel->listClient();
    $listDev= $userModel->listDev();
    $currentProjectList= $projectModel->currentProjectList();

    //appeler la fonction pour le nb de projets terminés
    $nbProject= $projectModel->nbProject();

    //définir le nb de projets par page et le nb de pages
    $perPage=2;
    $nbPage=ceil($nbProject/$perPage);

    //vérifier qu'on a bien reçu un n° page (p) en paramètre dans l'url
    if (isset ($_GET['p']) && $_GET['p']>0 && $_GET['p']<=$nbProject) {
        $currentPage = ($_GET['p']);
    } else {
        $currentPage =1;
    }

    $endProjectList= $projectModel->endProjectList($currentPage);

    //charger le fichier en vue de l'affichage dans la page html
    require(__DIR__.'/../view/back/admin.php');
}

//afficher les données d'un projet
function project(){

    if (empty($_SESSION['userType']) || $_SESSION['userType'] !=='admin') {
        throw new Exception("Vous n'avez pas accès à cette page");
    }

    //vérifier qu'on a bien reçu un id en paramètre dans l'url
    if (isset($_GET['id']) && $_GET['id']>0) {

        //créer l'objet
        $projectModel = new ProjectModel();

        //appeler la fonction de cet objet
        $project= $projectModel->project($_GET['id']);

        //charger le fichier en vue de l'affichage dans la page html
        require(__DIR__.'/../view/back/project.php');

    } else {
        throw new Exception('Erreur : pas de projet identifié');
    }
}

//nommer 1 dév sur un projet
function assign(){

    //vérifier qu'on a un id projet dans l'url
    if (isset($_GET['id']) && $_GET['id']>0) {

        //vérifier qu'on a le mail dev dans le formulaire
        if (!empty($_POST['mail'])) {

            //créer les objets
            $userModel= new UserModel();
            $projectModel= new ProjectModel();

            //appeler les fonctions de ces objets
            $member= $userModel->signIn($_POST['mail']);

            $idDev= $member['id'];

            $assign= $projectModel->assign($idDev, $_GET['id']);

            //diriger vers la page project
            header('location: index.php?action=project&id='.$_GET['id']);
            die();

        } else {
            //envoyer une exception dans catch en cas d'erreur
            throw new Exception('Pas de développeur identifié');
        }
    } else {
        //envoyer une exception dans catch en cas d'erreur
        throw new Exception('Pas de projet identifié');
    }
}

function endDate(){

    //vérifier qu'on a un id projet dans l'url
    if (isset($_GET['id']) && $_GET['id']>0) {

        //créer l'objet
        $projectModel= new ProjectModel();

        //appeler la fonction de cet objet
        $endDate= $projectModel->endDate($_GET['id']);

        //diriger vers la page project
        header('location: index.php?action=project&id='.$_GET['id']);
        die();

    } else {
        // envoyer une exception dans catch en cas d'erreur
        throw new Exception('Pas de projet identifié');
    }
}
