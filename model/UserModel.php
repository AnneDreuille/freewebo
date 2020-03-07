<?php
require_once(__DIR__.'/Model.php');

class UserModel extends Model {

//insérer un nouveau user
  public function signUp($userType,$firstName,$lastName,$mail,$phone,$password)
    $db= $this->dbConnect();

    $req = $db->prepare('INSERT INTO user (userType,firstName,lastName,mail,phone,password,signUpDate) VALUES (?,?,?,?,?,?,NOW())');

    return $req->execute(array($userType,$firstName,$lastName,$mail,$phone,$password));
  }

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

  //récupérer la liste des clients
    public function listClient() {
      $db= $this->dbConnect();

      $req = $db->prepare('SELECT id,firstName,lastName,mail,phone,DATE_FORMAT(signUpDate, "%d/%m/%Y à %Hh%i") AS signUpDate_fr, DATE_FORMAT(blacklistDate, "%d/%m/%Y à %Hh%i") AS blacklistDate_fr FROM user ORDER BY signUpDate ASC ');

      $req->execute();
      return $req->fetchAll();
    }

//récupérer la liste des développeurs
    public function listDev() {
      $db= $this->dbConnect();

      $req = $db->prepare('SELECT id,firstName,lastName,mail,phone,DATE_FORMAT(signUpDate, "%d/%m/%Y à %Hh%i") AS signUpDate_fr, DATE_FORMAT(blacklistDate, "%d/%m/%Y à %Hh%i") AS blacklistDate_fr FROM user ORDER BY signUpDate ASC ');

      $req->execute();
      return $req->fetchAll();
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
