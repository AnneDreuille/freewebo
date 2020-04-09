<?php

// namespace model;

require_once(__DIR__.'/Model.php');

class UserModel extends Model {

//FRONT

  //insérer un nouveau user
  public function signUp($userType,$lastName,$firstName,$mail,$phone,$password){
    $db= $this->dbConnect();

    $req = $db->prepare('INSERT INTO user (userType,lastName,firstName,mail,phone,password,signUpDate) VALUES (?,?,?,?,?,?,NOW())');

    return $req->execute(array($userType,$lastName,$firstName,$mail,$phone,$password));
  }

  //récupérer les données d'1 user en fct de son mail
  public function signIn($mail) {
    $db= $this->dbConnect();

    $req = $db->prepare('SELECT id,userType,lastName,firstName,mail,phone,password,DATE_FORMAT(signUpDate, "%d/%m/%Y à %Hh%i") AS signUpDate_fr, DATE_FORMAT(blacklistDate, "%d/%m/%Y à %Hh%i") AS blacklistDate_fr FROM user WHERE mail=?');

    $req->execute(array($mail));
    return $req->fetch();
  }

//récupérer les données d'1 user en fct de son id
  public function getUser($id) {
    $db= $this->dbConnect();

    $req = $db->prepare('SELECT id,userType,lastName,firstName,mail,phone,password,DATE_FORMAT(signUpDate, "%d/%m/%Y à %Hh%i") AS signUpDate_fr, DATE_FORMAT(blacklistDate, "%d/%m/%Y à %Hh%i") AS blacklistDate_fr FROM user WHERE id=?');

    $req->execute(array($id));
    return $req->fetch();
  }


//BACK

  //récupérer la liste des clients
  public function listClient() {
    $db= $this->dbConnect();

    $req = $db->prepare('SELECT id,userType,firstName,lastName,mail,phone,DATE_FORMAT(signUpDate, "%d/%m/%Y à %Hh%i") AS signUpDate_fr, DATE_FORMAT(blacklistDate, "%d/%m/%Y à %Hh%i") AS blacklistDate_fr FROM user WHERE userType="client" ORDER BY signUpDate ASC');

    $req->execute();
    return $req->fetchAll();
  }

  //récupérer la liste des devs
  public function listdev() {
    $db= $this->dbConnect();

    $req = $db->prepare('SELECT id,userType,firstName,lastName,mail,phone,DATE_FORMAT(signUpDate, "%d/%m/%Y à %Hh%i") AS signUpDate_fr, DATE_FORMAT(blacklistDate, "%d/%m/%Y à %Hh%i") AS blacklistDate_fr FROM user WHERE userType="dev" ORDER BY signUpDate ASC');

    $req->execute();
    return $req->fetchAll();
  }



//NON ENCORE UTILISE

  //récupérer le nombre de clients
  public function nbClient() {
    $db= $this->dbConnect();

    $req = $db->prepare('SELECT COUNT(id) AS nbClient FROM user WHERE userType="client"');

    $req->execute();
    return $req->fetchColumn();
  }

  //récupérer le nombre de développeurs
  public function nbDev() {
    $db= $this->dbConnect();

    $req = $db->prepare('SELECT COUNT(id) AS nbDev FROM user WHERE userType="dev"');

    $req->execute();
    return $req->fetchColumn();
  }

  //mettre à jour les données d'1 user
  public function updateUser($mail, $phone, $id) {
    $db= $this->dbConnect();

    $req = $db->prepare('UPDATE user SET mail=?, phone=?, WHERE id=?');

    return $req->execute(array($mail, $phone, $id));
  }

  //blacklister 1 user
  public function blacklist($id) {
    $db= $this->dbConnect();

    $req = $db->prepare('UPDATE user SET blacklistDate=NOW() WHERE id=?');

    return $req->execute(array($id));
  }


}
