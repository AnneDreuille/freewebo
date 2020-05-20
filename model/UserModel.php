<?php

namespace model;

class UserModel extends Model {

//FRONT

  //insérer un nouveau user
  public function signUp($userType,$lastName,$firstName,$mail,$phone, $password){
    $db= $this->dbConnect();

    $req = $db->prepare('INSERT INTO user (userType,lastName,firstName,mail,phone,password,signUpDate, blacklist) VALUES (?,?,?,?,?,?,NOW(),?)');

    return $req->execute(array($userType,$lastName,$firstName,$mail,$phone,$password,0));
  }

  //récupérer les données d'1 user en fct de son mail
  public function signIn($mail) {
    $db= $this->dbConnect();

    $req = $db->prepare('SELECT id,userType,lastName,firstName,mail,phone,password,DATE_FORMAT(signUpDate, "%d/%m/%Y à %Hh%i") AS signUpDate_fr, blacklist FROM user WHERE mail=? AND blacklist=0');

    $req->execute(array($mail));
    return $req->fetch();
  }

//récupérer les données d'1 user en fct de son id
  public function getUser($id) {
    $db= $this->dbConnect();

    $req = $db->prepare('SELECT id,userType,lastName,firstName,mail,phone,password,DATE_FORMAT(signUpDate, "%d/%m/%Y à %Hh%i") AS signUpDate_fr, blacklist FROM user WHERE id=?');

    $req->execute(array($id));
    return $req->fetch();
  }


//BACK

  //récupérer la liste des clients
  public function listClient() {
    $db= $this->dbConnect();

    $req = $db->prepare('SELECT id,userType,firstName,lastName,mail,phone,DATE_FORMAT(signUpDate, "%d/%m/%Y à %Hh%i") AS signUpDate_fr, blacklist FROM user WHERE userType="client" ORDER BY signUpDate ASC');

    $req->execute();
    return $req->fetchAll();
  }

  //récupérer la liste des devs
  public function listDev() {
    $db= $this->dbConnect();

    $req = $db->prepare('SELECT id,userType,firstName,lastName,mail,phone,DATE_FORMAT(signUpDate, "%d/%m/%Y à %Hh%i") AS signUpDate_fr, blacklist FROM user WHERE userType="dev" ORDER BY signUpDate ASC');

    $req->execute();
    return $req->fetchAll();
  }

  //mettre à jour les données d'1 user
  public function updateUser($lastName, $firstName, $mail, $phone, $password, $blacklist, $id) {
    $db= $this->dbConnect();

    $req = $db->prepare('UPDATE user SET lastName=?, firstName=?, mail=?, phone=?, password=?, blacklist=? WHERE id=?');

    return $req->execute(array($lastName, $firstName, $mail, $phone, $password, $blacklist, $id));
  }

  //récupérer la liste des USERS blacklistés
  public function blacklist() {
    $db= $this->dbConnect();

    $req = $db->prepare('SELECT id,userType,firstName,lastName,mail,phone,DATE_FORMAT(signUpDate, "%d/%m/%Y à %Hh%i") AS signUpDate_fr, blacklist FROM user WHERE blacklist=1');

    $req->execute();
    return $req->fetchAll();
  }

}
