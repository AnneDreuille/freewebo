<?php

//charger les classes
require_once(__DIR__.'/../model/UserModel.php');
require_once(__DIR__.'/../model/ChatModel.php');
require_once(__DIR__.'/../model/ProjectModel.php');

//rediriger vers homepage
function homepage(){
    require(__DIR__.'/../view/front/homepage.php');
}

//USER

//renseigner le formulaire d'inscription
function signUp() {
    //vérifier que le formulaire a bien reçu les paramètres
    $message= null;

    if (empty($_POST['userType'])) {
        $message= false;
    } elseif (empty($_POST['lastName'])) {
        $message= false;
    } elseif (empty($_POST['firstName'])) {
        $message= false;
    } elseif (empty($_POST['mail'])) {
        $message= false;
    } elseif (!preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#is', $_POST['mail'])){
        $message= false;
    } elseif (!empty ($_POST['phone']) && !preg_match('[0-9]{10}', $_POST['phone'])) {
        $message= false;
    } elseif (empty($_POST['password'])) {
        $message= false;
    } else {

        //créer l'objet
        $userModel= new UserModel();

        //crypter le password
        $password_hash= password_hash($_POST['password'], PASSWORD_DEFAULT);

        $pas_de_mail_existant=$userModel->signIn($_POST['mail'] );

        if ($pas_de_mail_existant !== false) {
            $message= false;

            // echo 'Il y a déjà un compte avec ce mail !';
        } else {
            $message= true;

            //appeler la fonction de cet objet
            $addData= $userModel->signUp($_POST['userType'], $_POST['lastName'], $_POST['firstName'], $_POST['mail'], $_POST['phone'], $password_hash);
        }
    }
    //charger le fichier en vue de l'affichage dans la page html
    require(__DIR__.'/../view/front/signUp.php');
}

//se connecter à l'espace membre
function signIn() {
    //vérifier que le formulaire a bien reçu les paramètres
    if (!empty($_POST['mail']) && !empty($_POST['password'])) {

        //créer l'objet
        $userModel= new UserModel();

        //appeler la fonction de cet objet
        $member= $userModel->signIn($_POST['mail']);

        //comparer le password entré haché avec celui dans la db
        $password_OK = password_verify($_POST['password'], $member['password']);

        if (!$password_OK) {
            header('location: index.php');
            die();
        } else {
            $_SESSION['idUser'] = $member['id'];
            $_SESSION['firstName'] = $member['firstName'];
            $_SESSION['userType'] = $member['userType'];
        }

        //diriger le membre inscrit vers l'espace membre
        header('location: index.php?action=member');
        die();
    }
    header('location: index.php');
    die();
}

//PROJECT

//rediriger un client vers espace membre
function member (){
    //vérifier qu'on a bien un idUser en session et que c'est un client
    if (!empty($_SESSION['idUser'])) {

        $idUser= $_SESSION['idUser'];

        //créer l'objet
        $projectModel= new ProjectModel();

        //appeler la fonction de cet objet
        $dataProject= $projectModel->dataProject($idUser,$_SESSION['userType']);

        if ($_SESSION['userType']=='client') {
            $idUser= $dataProject['idClient'];
        } elseif ($_SESSION['userType']=='dev') {
            $idUser= $dataProject['idDev'];
        }

    } else {
        $dataProject=false;
    }
    require (__DIR__.'/../view/front/member.php');
}

//renseigner le formulaire "need" expression des besoins
function need() {
    //vérifier que le formulaire a bien reçu les paramètres
    if (!empty($_POST['name']) && !empty($_SESSION['idUser']) && !empty($_POST['description'])) {

        //créer l'objet
        $projectModel= new ProjectModel();

        //appeler la fonction de cet objet
        $addData= $projectModel->need($_POST['name'], $_SESSION['idUser'], $_POST['description']);

        if ($addData===false){
            throw new Exception("Impossible d'ajouter les données du formulaire");
        }
    }
    //charger le fichier en vue de l'affichage dans la page html
    require(__DIR__.'/../view/front/need.php');
}






