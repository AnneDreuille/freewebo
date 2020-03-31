<?php

//charger les classes
require_once(__DIR__.'/../model/UserModel.php');
require_once(__DIR__.'/../model/ChatModel.php');
require_once(__DIR__.'/../model/ProjectModel.php');

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
    $listProject= $projectModel->listProject();

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
            header('location: index.php?action=project');
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

//déposer le fichier du modèle
function modelFile(){

    //vérifier qu'on a bien un idUser en session
    if (!empty($_SESSION['idUser'])) {

        $idUser= $_SESSION['idUser'];

        //vérifier si le fichier a bien été envoyé et s'il n'y a pas d'erreur
        if (isset($_FILES['modelFile']) && $_FILES['modelFile']['error'] == 0){

            $tmpFileName=$_FILES['modelFile']['tmp_name'];
            // $uniqName= uniqid().basename($_FILES['modelFile']['name']);
            $fileName= basename($_FILES['modelFile']['name']);
            // $fileName = substr($uniqName,13);

            //valider le fichier et le stocker définitivement
            move_uploaded_file($tmpFileName, 'public/uploads/' .$fileName);

            //créer les objets
            $projectModel= new ProjectModel();
            $userModel= new UserModel();

            //appeler les fonctions de ces objets
            $dataProject= $projectModel->dataProject($idUser,$_SESSION['userType']);

            $client=$userModel->getUser($dataProject['idClient']);
            $dev=$userModel->getUser($dataProject['idDev']);
            $idProject= $dataProject['id'];

            $modelFile= $projectModel->modelFile($fileName, $idProject);

            //appeler les fonctions de ces objets
            header('location: index.php?action=member');
            die();

        } else {
            //envoyer une exception dans catch en cas d'erreur
            throw new Exception('Pas de fichier envoyé');
        }
    } else {
        //envoyer une exception dans catch en cas d'erreur
        throw new Exception('Pas de user identifié');
    }
}

//déposer l'url du site créé
function urlName(){

    //vérifier qu'on a bien un idUser en session
    if (!empty($_SESSION['idUser'])) {

        $idUser= $_SESSION['idUser'];

        //vérifier si l'url a bien été entrée
        if (!empty($_POST['urlName'])) {

            //créer les objets
            $projectModel= new ProjectModel();
            $userModel= new UserModel();

            //appeler les fonctions de ces objets
            $dataProject= $projectModel->dataProject($idUser,$_SESSION['userType']);

            $client=$userModel->getUser($dataProject['idClient']);
            $dev=$userModel->getUser($dataProject['idDev']);
            $idProject= $dataProject['id'];

            $urlName= $projectModel->urlName($_POST['urlName'], $idProject);

            //appeler les fonctions de ces objets
            header('location: index.php?action=member');
            die();

        } else {
            //envoyer une exception dans catch en cas d'erreur
            throw new Exception("Pas d'url transmise");
        }
    } else {
        //envoyer une exception dans catch en cas d'erreur
        throw new Exception('Pas de user identifié');
    }
}

