<?php

//charger les classes
require_once(__DIR__.'/../model/UserModel.php');
require_once(__DIR__.'/../model/ChatModel.php');
// require_once(__DIR__.'/../model/ProjectModel.php');

//rediriger vers homepage
function homepage(){
    require(__DIR__.'/../view/front/homepage.php');
}

//renseigner le formulaire d'inscription
function signUp() {

  //vérifier que le formulaire a bien reçu les paramètres

    $message= "Complèter SVP le formulaire !";

    if (empty($_POST['userType'])) {
        $message;
    } elseif (empty($_POST['lastName'])) {
        $message;
    } elseif (empty($_POST['firstName'])) {
        $message;
    } elseif (empty($_POST['mail'])) {
        $message;
    } elseif (!preg_match('#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#is', $_POST['mail'])){
        $message;
    } elseif (!empty ($_POST['phone']) && !preg_match('[0-9]{10}', $_POST['phone'])) {
        $message;
    } elseif (empty($_POST['password'])) {
        $message;
    } else {

        //créer l'objet
        $userModel= new UserModel();

        //crypter le password
        $password_hash= password_hash($_POST['password'], PASSWORD_DEFAULT);

        //appeler la fonction de cet objet
        $addData= $userModel->signUp($_POST['userType'], $_POST['lastName'], $_POST['firstName'], $_POST['mail'], $_POST['phone'], $password_hash);

        if ($addData===false){
            throw new Exception("Impossible d'ajouter les données du formulaire");
        }
    }
    //charger le fichier en vue de l'affichage dans la page html
    require(__DIR__.'/../view/front/signUp.php');
}

//se connecter à l'espace membre
function signIn() {

    // $_SESSION['mail']= htmlspecialchars($_POST['mail']);
    // $_SESSION['password']= $password_hash;

    //diriger le membre déjà inscrit vers l'espace membre
    // if (isset($_SESSION['mail']) && isset($_SESSION['password']))
    // {
    //     header('location: /freewebo/view/front/member.php');
    // }

    //vérifier que le formulaire a bien reçu les paramètres
    if (!empty($_POST['mail']) && !empty($_POST['password'])) {

        //créer l'objet
        $userModel= new UserModel();

        //appeler la fonction de cet objet
        $member= $userModel->signIn($_POST['mail']);

        //ajout ctrl sur le mail existe sur var signIn est différent de false

        //comparer le password entré haché avec celui dans la db
        $password_OK = password_verify($_POST['password'], $member['password']);

        if (!$password_OK) {
            // echo 'Saisir SVP un mot de passe correct !';
            header('location: index.php');
            die();
        } else {
            $_SESSION['idUser'] = $member['id'];
        }

        //diriger le membre inscrit vers l'espace membre
        header('location: index.php?action=member');
        die();
    }
    header('location: index.php');
    die();
}

function member (){
    var_dump($_SESSION);
    require (__DIR__.'/../view/front/member.php');
}
