<?php

use \model\UserModel;
use \model\ProjectModel;
use \model\ChatModel;

//rediriger vers homepage
function homepage(){
    require(__DIR__.'/../view/front/homepage.php');
}

//se déconnecter
function logOut(){
    $_SESSION=array();
    session_destroy();

    header('location: index.php');
    die();
}

//diriger vers errorPage
function errorPage(){
    require(__DIR__.'/../view/front/errorPage.php');
}

//diriger vers privacyPolicy
function privacyPolicy(){
    require(__DIR__.'/../view/front/privacyPolicy.php');
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
        if ($_SESSION['userType']!=='admin'){
            header('location: index.php?action=member');
            die();
        } else {
            header('location: index.php?action=admin');
            die();
        }
    }
    header('location: index.php');
    die();
}

//PROJECT

//diriger un user vers espace membre avec données user et projet
function member (){
    //vérifier qu'on a bien un idUser en session
    if (!empty($_SESSION['idUser'])) {

        $idUser= $_SESSION['idUser'];

        //créer les objets
        $projectModel= new ProjectModel();
        $userModel= new UserModel();
        $chatModel= new ChatModel();

        //connexion différente client ou dev et admin
        if ($_SESSION['userType']!=='admin'){
            $dataProject= $projectModel->dataProject($idUser,$_SESSION['userType']);
        } else {
            $dataProject=$projectModel->project($_GET['id']);
        }

        //appeler les fonctions de ces objets
        $client=$userModel->getUser($dataProject['idClient']);
        $dev=$userModel->getUser($dataProject['idDev']);

        $listMessage= $chatModel->listMessage($dataProject['id']);

    } else {
        $dataProject=false;
    }
    //charger le fichier en vue de l'affichage dans la page html
    require (__DIR__.'/../view/front/member.php');
}

//USER renseigner le formulaire "need" expression des besoins
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

//DEV déposer le fichier du modèle
function modelFile(){
    //vérifier qu'on a bien un idUser en session
    if (!empty($_SESSION['idUser'])) {

        $idUser= $_SESSION['idUser'];

        //vérifier si le fichier a bien été envoyé et s'il n'y a pas d'erreur
        if (isset($_FILES['modelFile']) && $_FILES['modelFile']['error'] == 0){

            $tmpFileName=$_FILES['modelFile']['tmp_name'];
            $uniqName= uniqid().basename($_FILES['modelFile']['name']);

            //valider le fichier et le stocker définitivement
            move_uploaded_file($tmpFileName, 'public/uploads/' .$uniqName);

            //créer les objets
            $projectModel= new ProjectModel();
            $userModel= new UserModel();

            //appeler les fonctions de ces objets
            $dataProject= $projectModel->dataProject($idUser,$_SESSION['userType']);

            $modelFile= $projectModel->modelFile($uniqName, $dataProject['id']);

            //diriger vers la page member
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

//USER valider le modèle
function validModel(){

    //vérifier qu'on a bien un idUser en session
    if (!empty($_SESSION['idUser'])) {

        $idUser= $_SESSION['idUser'];

        //créer les objets
        $projectModel= new ProjectModel();
        $userModel= new UserModel();

        //appeler les fonctions de ces objets
        $dataProject= $projectModel->dataProject($idUser,$_SESSION['userType']);

        $validModel= $projectModel->validModel($dataProject['id']);

        //diriger vers la page member
        header('location: index.php?action=member');
        die();

    } else {
        $dataProject=false;
    }
}

//DEV déposer l'url du site créé
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

            $urlName= $projectModel->urlName($_POST['urlName'], $dataProject['id']);

            //diriger vers la page member
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

//DEV noter le client
function ratingClient(){

    //vérifier qu'on a bien un idUser en session
    if (!empty($_SESSION['idUser'])) {

        $idUser= $_SESSION['idUser'];

        //vérifier si la notation a bien été entrée
        if (!empty($_POST['ratingClient'])) {

        //créer les objets
        $projectModel= new ProjectModel();
        $userModel= new UserModel();

        //appeler les fonctions de ces objets
        $dataProject= $projectModel->dataProject($idUser,$_SESSION['userType']);

        $ratingClient= $projectModel->ratingClient($_POST['ratingClient'], $dataProject['id']);

        //diriger vers la page member
        header('location: index.php?action=member');
        die();

        } else {
            //envoyer une exception dans catch en cas d'erreur
            throw new Exception("Pas de notation indiquée");
        }
    } else {
        //envoyer une exception dans catch en cas d'erreur
        throw new Exception('Pas de user identifié');
    }
}

//CLIENT noter le développeur
function ratingDev(){

    //vérifier qu'on a bien un idUser en session
    if (!empty($_SESSION['idUser'])) {

        $idUser= $_SESSION['idUser'];

        //vérifier si la notation a bien été entrée
        if (!empty($_POST['ratingDev'])) {

        //créer les objets
        $projectModel= new ProjectModel();
        $userModel= new UserModel();

        //appeler les fonctions de ces objets
        $dataProject= $projectModel->dataProject($idUser,$_SESSION['userType']);

        $ratingDev= $projectModel->ratingDev($_POST['ratingDev'], $dataProject['id']);

        //diriger vers la page member
        header('location: index.php?action=member');
        die();

        } else {
            //envoyer une exception dans catch en cas d'erreur
            throw new Exception("Pas de notation indiquée");
        }
    } else {
        //envoyer une exception dans catch en cas d'erreur
        throw new Exception('Pas de user identifié');
    }
}

//CHAT

function addMessage(){
    //vérifier qu'on a bien un idUser en session
    if (!empty($_SESSION['idUser'])) {

        $idUser= $_SESSION['idUser'];

        //vérifier si le msg a bien été posté
        if (!empty($_POST['message'])) {

            //créer les objets
            $projectModel= new ProjectModel();
            $userModel= new UserModel();
            $chatModel= new ChatModel();

            //vérifier qu'on a un id projet dans l'url
            if (isset($_GET['id']) && $_GET['id']>0) {

                $addMessage= $chatModel->addMessage($idUser,$_GET['id'],$_POST['message']);

                //diriger vers la page member
                header('location: index.php?action=member&id='.$_GET['id']);
                die();

            } else {
                $idProject =null;

                $addMessage= $chatModel->addMessage($idUser,$idProject,$_POST['message']);

                //diriger vers la page dev
                header('location: index.php?action=dev&id='.$idUser);
                die();
            }

        } else {
            //envoyer une exception dans catch en cas d'erreur
            throw new Exception("Pas de message posté");
        }

    } else {
        //envoyer une exception dans catch en cas d'erreur
        throw new Exception('Pas de user identifié');
    }
}

//se connecter à l'Espace Dev & afficher les msg
function dev(){

    //créer l'objet
    $chatModel= new ChatModel();

    //appeler la fonction
    $listMessageDev= $chatModel->listMessageDev();

    require(__DIR__.'/../view/front/dev.php');
}

//BOUTON LIKE mise à jour dans le fichier
function clicks(){

    $file = 'clicks.txt';
    //ouvrir le fichier pour lire le contenu existant
    $clicks = file_get_contents($file);
    //ajouter 1
    $clicks ++;
    //écrire le résultat dans le fichier
    file_put_contents($file, $clicks);

    //diriger vers la page html
    header('location: index.php');
    die();
}

