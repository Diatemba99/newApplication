<?php
require_once 'db.php';
class  Navires {
 public $id;
 public $nomNavire;
 public $idPort;
 
    // function de recuperation les Navires en fonction du port

    function getNavireByIdPort($idPort) {
    $ob_connexion = new Connexion();
    $db = $ob_connexion->getDB();
    $allnavires = null;

    if (!is_null($db)) {
        $sql = "SELECT * FROM navires WHERE idport = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$idPort]);
        $allnavires = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $allnavires;
}

    // function de recuperation les Navires

    function getNavire()
    {
        $ob_connexion=new Connexion();
        $db=$ob_connexion->getDB();
        $allnavires=null;
        if (!is_null($db))
         {
            $sql="SELECT * from navires";
            $result=$db->query($sql);
            $allnavires=$result->fetchAll(PDO::FETCH_ASSOC);
         }
      return $allnavires;
    }

    
 
// fonction pour enregistrer un navire dans la base de donnee
    function saveNavire($nomNavire, $idPort) : bool
    {
      $ob_connexion=new Connexion();
      $db=$ob_connexion->getDB();
      $ret=false;
      if (!is_null($db))
       {
          $sql="INSERT INTO navires
          (nom,idport)values
          (:nom,:idport)";
          $element=$db->prepare($sql);
          $element->execute(array(
            ':nom'=>$nomNavire,
            ':idport'=>$idPort,
            
             ));
          $ret=true;
        }else{
          echo "erreur de connexion a la basse";
        }
        return $ret;
    }



   //Modifier Port
   public function modifNavire($id,$nomNavire,$idPort){
    $ob_connexion=new Connexion();
    $db=$ob_connexion->getDB();
    $ret=0;
    if (!is_null($db))
     {
        $sql="UPDATE `navires` SET   `nom`='$nomNavire',`idport`='$idPort'  WHERE id=$id";
        $result=$db->query($sql);
        $ret=$result;
     }else{
       echo "erreur de connexion a la base";
    }
    return $ret;
    }



  //Supprimer Port
  function delNavire($id)
    {
        $ob_connexion = new Connexion();
        $db = $ob_connexion->getDB();
        if (!is_null($db)) {
            $sql = "DELETE FROM navires WHERE id=$id";
            $query = $db->prepare($sql);
            $query->execute();

            echo "<script>alert('Supression effectuées!');</script>";
            echo '<script>window.location.href="../?page=navires";</script>';
        } else {
            echo "<script>alert('Erreur Suppression!');</script>";
        }
    }
 
 
}


?>