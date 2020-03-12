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
        $addData= $userModel->signUp(htmlspecialchars($_POST['userType']), htmlspecialchars($_POST['lastName']), htmlspecialchars($_POST['firstName']), htmlspecialchars($_POST['mail']), htmlspecialchars($_POST['phone']), $password_hash);

        if ($addData===false){
            throw new Exception("Impossible d'ajouter les données du formulaire");
        }
    }
    //charger le fichier en vue de l'affichage dans la page html
    require(__DIR__.'/../view/front/signUp.php');
}
