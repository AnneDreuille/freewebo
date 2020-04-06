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
    public function listMessage($idProject) {
      $db= $this->dbConnect();

      $req = $db->prepare('SELECT user.firstName, chat.id, chat.idProject, chat.message, DATE_FORMAT(chat.postDate, "%d/%m/%Y à %Hh%i") AS postDate_fr
        FROM chat
        INNER JOIN user
        ON user.id=chat.idSender
        WHERE idProject=?
        ORDER BY postDate DESC ');

      $req->execute(array($idProject));
      return $req->fetchAll();
    }

}
