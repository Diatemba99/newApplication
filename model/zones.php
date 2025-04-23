<?php
require_once 'db.php';
class  Zones {
 public $idZone;
 public $nomZone;
 


    // function de recuperation des Zones

    function getZone()
    {
        $ob_connexion=new Connexion();
        $db=$ob_connexion->getDB();
        $allzone=null;
        if (!is_null($db))
         {
            $sql="SELECT * from zones";
            $result=$db->query($sql);
            $allzone=$result->fetchAll(PDO::FETCH_ASSOC);
         }
      return $allzone;
    }

    
 
// fonction pour enregistrer une zone dans la base de donnee
    function saveZone($nomZone) : bool
    {
      $ob_connexion=new Connexion();
      $db=$ob_connexion->getDB();
      $ret=false;
      if (!is_null($db))
       {
          $sql="INSERT INTO zones
          (nom)values
          (:nom)";
          $element=$db->prepare($sql);
          $element->execute(array(
            ':nom'=>$nomZone,
            
             ));
          $ret=true;
        }else{
          echo "erreur de connexion a la basse";
        }
        return $ret;
    }



   //Modifier Zone
   public function modifZone($idZone,$nomZone){
    $ob_connexion=new Connexion();
    $db=$ob_connexion->getDB();
    $ret=0;
    if (!is_null($db))
     {
        $sql="UPDATE `zones` SET   `nom`='$nomZone' WHERE id=$idZone";
        $result=$db->query($sql);
        $ret=$result;
     }else{
       echo "erreur de connexion a la base";
    }
    return $ret;
    }



  //Supprimer Zone
  function delZone($idZone)
    {
        $ob_connexion = new Connexion();
        $db = $ob_connexion->getDB();
        if (!is_null($db)) {
            $sql = "DELETE FROM zones WHERE id=$idZone";
            $query = $db->prepare($sql);
            $query->execute();

            echo "<script>alert('Supression effectuées!');</script>";
            echo '<script>window.location.href="../?page=zones";</script>';
        } else {
            echo "<script>alert('Erreur Suppression!');</script>";
        }
    }
 
 
}


?>