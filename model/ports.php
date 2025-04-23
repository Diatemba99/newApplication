<?php
require_once 'db.php';
class  Ports {
 public $id;
 public $nomPort;
 public $idZone;
 


    // function de recuperation des Ports

    function getPort()
    {
        $ob_connexion=new Connexion();
        $db=$ob_connexion->getDB();
        $allports=null;
        if (!is_null($db))
         {
            $sql="SELECT * from port";
            $result=$db->query($sql);
            $allports=$result->fetchAll(PDO::FETCH_ASSOC);
         }
      return $allports;
    }

    
 
// fonction pour enregistrer un port dans la base de donnee
    function savePort($nomPort, $idZone) : bool
    {
      $ob_connexion=new Connexion();
      $db=$ob_connexion->getDB();
      $ret=false;
      if (!is_null($db))
       {
          $sql="INSERT INTO port
          (nom,idzone)values
          (:nom,:idzone)";
          $element=$db->prepare($sql);
          $element->execute(array(
            ':nom'=>$nomPort,
            ':idzone'=>$idZone,
            
             ));
          $ret=true;
        }else{
          echo "erreur de connexion a la basse";
        }
        return $ret;
    }



   //Modifier Port
   public function modifPort($id,$nomPort,$idZone){
    $ob_connexion=new Connexion();
    $db=$ob_connexion->getDB();
    $ret=0;
    if (!is_null($db))
     {
        $sql="UPDATE `port` SET   `nom`='$nomPort',`idzone`='$idZone'  WHERE id=$id";
        $result=$db->query($sql);
        $ret=$result;
     }else{
       echo "erreur de connexion a la base";
    }
    return $ret;
    }



  //Supprimer Port
  function delPort($id)
    {
        $ob_connexion = new Connexion();
        $db = $ob_connexion->getDB();
        if (!is_null($db)) {
            $sql = "DELETE FROM port WHERE id=$id";
            $query = $db->prepare($sql);
            $query->execute();

            echo "<script>alert('Supression effectuées!');</script>";
            echo '<script>window.location.href="../?page=ports";</script>';
        } else {
            echo "<script>alert('Erreur Suppression!');</script>";
        }
    }
 
 
}


?>