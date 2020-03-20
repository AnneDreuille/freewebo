<?php

//charger les classes
require_once(__DIR__.'/../model/UserModel.php');
require_once(__DIR__.'/../model/ChatModel.php');
require_once(__DIR__.'/../model/ProjectModel.php');

//rediriger vers page admin
function admin(){

    //afficher la liste des clients
    //créer l'objet
    $userModel= new UserModel();

    //appeler les fonctions de cet objet
    $listClient= $userModel->listClient();
    $listDev= $userModel->listDev();

    //charger le fichier en vue de l'affichage dans la page html
    require(__DIR__.'/../view/back/admin.php');
}

//nommer 1 dév sur un projet
function assign(){

    //vérifier que le formulaire a bien reçu les paramètres
    if (!empty($_POST['mail'])) {

        //créer les objets
        $userModel= new UserModel();
        $projectModel= new ProjectModel();

        //appeler les fonctions de ces objets
        $member= $userModel->signIn($_POST['mail']);

        $idDev= $member['id'];

        $assign= $projectModel->assign($idDev);

        //charger le fichier en vue de l'affichage dans la page html
        require(__DIR__.'/../view/back/admin.php');

    } else {
        //envoyer une exception dans catch en cas d'erreur
        throw new Exception('Pas de développeur identifié');
    }
}
