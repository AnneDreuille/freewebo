<?php
require_once(__DIR__.'/Model.php');

class ProjectModel extends Model {

//insérer un nouveau projet
  public function need($name,$idClient,$description){
    $db= $this->dbConnect();

    $req = $db->prepare('INSERT INTO project (name,idClient,description,needDate) VALUES (?,?,?,NOW())');

    return $req->execute(array($name,$idClient,$description));
  }

//récupérer les données d'un projet
  public function dataProject($idClient) {
    $db= $this->dbConnect();

    $req = $db->prepare('SELECT id,name,idClient,idDev,description,DATE_FORMAT(needDate, "%d/%m/%Y à %Hh%i") AS needDate_fr, DATE_FORMAT(assignDate, "%d/%m/%Y à %Hh%i") AS assignDate_fr, DATE_FORMAT(modelDate, "%d/%m/%Y à %Hh%i") AS modelDate_fr, DATE_FORMAT(startDate, "%d/%m/%Y à %Hh%i") AS startDate_fr, DATE_FORMAT(urlDate, "%d/%m/%Y à %Hh%i") AS urlDate_fr, DATE_FORMAT(endDate, "%d/%m/%Y à %Hh%i") AS endDate_fr, ratingClient, ratingDev FROM project WHERE idClient=?');

    $req->execute(array($idClient));
    return $req->fetch();
  }


//NON ENCORE UTILISE

//mettre à jour les données d'1 projet

//lister les projets
  public function listProject() {
    $db= $this->dbConnect();

    $req = $db->prepare('SELECT id,name,idClient,idDev,description,DATE_FORMAT(needDate, "%d/%m/%Y à %Hh%i") AS needDate_fr, DATE_FORMAT(assignDate, "%d/%m/%Y à %Hh%i") AS assignDate_fr, DATE_FORMAT(modelDate, "%d/%m/%Y à %Hh%i") AS modelDate_fr, DATE_FORMAT(startDate, "%d/%m/%Y à %Hh%i") AS startDate_fr, DATE_FORMAT(urlDate, "%d/%m/%Y à %Hh%i") AS urlDate_fr, DATE_FORMAT(endDate, "%d/%m/%Y à %Hh%i") AS endDate_fr, ratingClient, ratingDev FROM project ORDER BY needDate ASC');

    $req->execute(array($id));
    return $req->fetchAll();
  }

}
