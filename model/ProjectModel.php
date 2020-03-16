<?php
require_once(__DIR__.'/Model.php');

class ProjectModel extends Model {

//insérer un nouveau projet
  public function need($name,$idClient,$description, $needDate){
    $db= $this->dbConnect();

    $req = $db->prepare('INSERT INTO project (name,idClient,description,needDate) VALUES (?,?,?,NOW())');

    return $req->execute(array($name,$idClient,$description));
  }
//ou bien ?
  // public function need($name,$idClient,$description, $needDate){
  //   $db= $this->dbConnect();

  //   $req = $db->prepare('INSERT INTO project (name,idClient,description,needDate,idDev,ratingClient,ratingDev) VALUES (?,?,?,NOW()),"","",""');

  //   return $req->execute(array($name,$idClient,$description));
  // }

//mettre à jour les données d'1 projet



}
