<?php
require_once(__DIR__.'/Model.php');

class ChatModel extends Model {

//écrire un nouveau message
  public function addMessage($idSender,$idProject,$message){
    $db= $this->dbConnect();

    $req = $db->prepare('INSERT INTO chat (idSender,idProject,message,postDate) VALUES (?,?,?,NOW())');

    return $req->execute(array($idSender,$idProject,$message));
  }

//récupérer la liste des messages
    public function listMessage() {
      $db= $this->dbConnect();

      $req = $db->prepare('SELECT id,idSender,idProject,message,DATE_FORMAT(postDate, "%d/%m/%Y à %Hh%i") AS postDate_fr FROM chat ORDER BY postDate DESC');

      $req->execute();
      return $req->fetchAll();
    }


}
