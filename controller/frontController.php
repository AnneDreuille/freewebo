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
    $error= null;
    $alert= null;

    if (empty($_POST)) {
        $alert= null;
    } elseif (empty($_POST['userType'])) {
        $error= true;
        $alert='Choisir SVP votre statut&nbsp;!';
    } elseif (empty($_POST['lastName'])) {
        $error= true;
        $alert='Indiquer SVP votre nom&nbsp;!';
    } elseif (empty($_POST['firstName'])) {
        $error= true;
        $alert='Indiquer SVP votre prénom&nbsp;!';
    } elseif (empty($_POST['mail'])) {
        $error= true;
        $alert='Indiquer SVP votre mail&nbsp;!';
    } elseif (!preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#is', $_POST['mail'])){
        $error= true;
        $alert='Indiquer SVP une adresse mail correcte&nbsp;!';
    } elseif (!empty ($_POST['phone']) && !preg_match('[0-9]{10}', $_POST['phone'])) {
        $error= true;
        $alert='Indiquer SVP un n° tél correct&nbsp;!';
    } elseif (empty($_POST['password'])) {
        $error= true;
        $alert='Indiquer SVP un mot de passe&nbsp;!';
    } else {

        //créer l'objet
        $userModel= new UserModel();

        //crypter le password
        $password_hash= password_hash($_POST['password'], PASSWORD_DEFAULT);

        //vérifier que le mail n'existe pas déjà
        $no_existing_mail=$userModel->signIn($_POST['mail'] );

        if ($no_existing_mail !== false) {
            $error= true;
            $alert= 'Il y a déjà un compte avec ce mail&nbsp;!';
        } else {
            $error= false;

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

//rediriger un user vers espace membre
function member (){
    //vérifier qu'on a bien un idUser en session
    if (!empty($_SESSION['idUser'])) {

        $idUser= $_SESSION['idUser'];

        //créer l'objet
        $projectModel= new ProjectModel();
        $userModel= new UserModel();

        //appeler la fonction de cet objet
        $dataProject= $projectModel->dataProject($idUser,$_SESSION['userType']);

        $client=$userModel->getUser($dataProject['idClient']);
        $dev=$userModel->getUser($dataProject['idDev']);

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






