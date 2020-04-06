<?php
require_once(__DIR__.'/Model.php');

class ProjectModel extends Model {

//FRONT

  //créer un nouveau projet en décrivant le besoin
  public function need($name,$idClient,$description){
    $db= $this->dbConnect();

    $req = $db->prepare('INSERT INTO project (name,idClient,description,needDate) VALUES (?,?,?,NOW())');

    return $req->execute(array($name,$idClient,$description));
  }

  //récupérer les données d'un projet en fonction d'un user
  public function dataProject($idUser, $userType) {
    $db= $this->dbConnect();

    $sql= 'SELECT id,name,idClient,idDev,description,DATE_FORMAT(needDate, "%d/%m/%Y à %Hh%i") AS needDate_fr, DATE_FORMAT(assignDate, "%d/%m/%Y à %Hh%i") AS assignDate_fr, modelFile, DATE_FORMAT(modelDate, "%d/%m/%Y à %Hh%i") AS modelDate_fr, DATE_FORMAT(startDate, "%d/%m/%Y à %Hh%i") AS startDate_fr, urlName, DATE_FORMAT(urlDate, "%d/%m/%Y à %Hh%i") AS urlDate_fr, DATE_FORMAT(endDate, "%d/%m/%Y à %Hh%i") AS endDate_fr, ratingClient, ratingDev FROM project WHERE ';

    if ($userType=='client'){
      $sql.='idClient=?';
    } elseif ($userType=='dev'){
      $sql.='idDev=?';
    }

    $req = $db->prepare($sql);

    $req->execute(array($idUser));
    return $req->fetch();
  }

  //mettre à jour les données d'1 projet / désignation d'un dév
  public function assign($idDev, $id) {
    $db= $this->dbConnect();

    $req = $db->prepare('UPDATE project SET idDev=? ,assignDate=NOW() WHERE id=?');

    return $req->execute(array($idDev, $id));
  }

  //mettre à jour les données d'1 projet / dépôt du modèle
  public function modelFile($modelFile, $id) {
    $db= $this->dbConnect();

    $req = $db->prepare('UPDATE project SET modelFile= ?, modelDate=NOW() WHERE id=?');

    return $req->execute(array($modelFile, $id));
  }

  //mettre à jour les données d'1 projet / validation du modèle
  public function validModel($id) {
    $db= $this->dbConnect();

    $req = $db->prepare('UPDATE project SET startDate=NOW() WHERE id=?');

    return $req->execute(array($id));
  }

  //mettre à jour les données d'1 projet / dépôt URL
  public function urlName($urlName, $id) {
    $db= $this->dbConnect();

    $req = $db->prepare('UPDATE project SET urlName=?, urlDate=NOW() WHERE id=?');

    return $req->execute(array($urlName, $id));
  }

  //mettre à jour les données d'1 projet / rating Client
  public function ratingClient($ratingClient, $id) {
    $db= $this->dbConnect();

    $req = $db->prepare('UPDATE project SET ratingClient=? WHERE id=?');

    return $req->execute(array($ratingClient, $id));
  }

  //mettre à jour les données d'1 projet / rating Dev
  public function ratingDev($ratingDev, $id) {
    $db= $this->dbConnect();

    $req = $db->prepare('UPDATE project SET ratingDev=? WHERE id=?');

    return $req->execute(array($ratingDev, $id));
  }


//BACK

  //lister les projets
  public function listProject() {
    $db= $this->dbConnect();

    $req = $db->prepare('SELECT id,name,idClient,idDev,description,DATE_FORMAT(needDate, "%d/%m/%Y à %Hh%i") AS needDate_fr, DATE_FORMAT(assignDate, "%d/%m/%Y à %Hh%i") AS assignDate_fr, modelFile, DATE_FORMAT(modelDate, "%d/%m/%Y à %Hh%i") AS modelDate_fr, DATE_FORMAT(startDate, "%d/%m/%Y à %Hh%i") AS startDate_fr, urlName, DATE_FORMAT(urlDate, "%d/%m/%Y à %Hh%i") AS urlDate_fr, DATE_FORMAT(endDate, "%d/%m/%Y à %Hh%i") AS endDate_fr, ratingClient, ratingDev FROM project ORDER BY needDate ASC');

    $req->execute();
    return $req->fetchAll();
  }

  //récupérer les données d'un projet en fonction de son id
    public function project($id) {
    $db= $this->dbConnect();

    $req = $db->prepare('SELECT id,name,idClient,idDev,description,DATE_FORMAT(needDate, "%d/%m/%Y à %Hh%i") AS needDate_fr, DATE_FORMAT(assignDate, "%d/%m/%Y à %Hh%i") AS assignDate_fr, modelFile, DATE_FORMAT(modelDate, "%d/%m/%Y à %Hh%i") AS modelDate_fr, DATE_FORMAT(startDate, "%d/%m/%Y à %Hh%i") AS startDate_fr, urlName, DATE_FORMAT(urlDate, "%d/%m/%Y à %Hh%i") AS urlDate_fr, DATE_FORMAT(endDate, "%d/%m/%Y à %Hh%i") AS endDate_fr, ratingClient, ratingDev FROM project WHERE id=?');

    $req->execute(array($id));
    return $req->fetch();
  }

  //mettre à jour les données d'1 projet / endDate
  public function endDate() {
    $db= $this->dbConnect();

    $req = $db->prepare('UPDATE project SET endDate=NOW()');

    return $req->execute();
  }

}
