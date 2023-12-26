<?php
require_once 'db.php';
class  Cargaison {
 public $idNavire;
 public $pcargaison;
 public $pcargaisonA;
 public $pcargaisonMMG;
 public $intervalleC;



    // fonction pour enregistrer calcul tirants moyens apparents Draft initial
    public function saveCargaison($idNavire,$pcargaison,$pcargaisonA,$pcargaisonMMG): bool
    {
      $ob_connexion=new Connexion();
      $db=$ob_connexion->getDB();
      $ret=false;
      if (!is_null($db))
       {
          // $sql="INSERT INTO cargaison
          // (id,poidsCargaison,poidsCargaisonAdopte,poidsCargaisonMMG,intervalleConfiance)values
          // (:idNavire,:poidsCargaison,:poidsCargaisonAdopte,:poidsCargaisonMMG,:intervalleConfiance)";
          // $element=$db->prepare($sql);
          // $element->execute(array(
          //   ':idNavire'=>$idNavire,
          //   ':poidsCargaison'=>$pcargaison,
          //   ':poidsCargaisonAdopte'=>$pcargaisonA,
          //   ':poidsCargaisonMMG'=>$pcargaisonMMG,
          //   ':intervalleConfiance'=>$intervalleC,
          //    ));
          $sql="INSERT INTO `cargaison`(`id`, `poidsCargaison`, `poidsCargaisonAdopte`, `poidsCargaisonMMG`) VALUES ('$idNavire','$pcargaison','$pcargaisonA','$pcargaisonMMG')";
          $ret=$db->query($sql);
          $ret=true;
        }else{
          echo "erreur de connexion a la basse";
        }
        return $ret;
    }

    function getCargaisonlByID($idNavire)
    {
        $ob_connexion=new Connexion();
        $db=$ob_connexion->getDB();
        $deplacementInitial=null;
        if (!is_null($db))
         {
            $sql="SELECT * from cargaison where id=$idNavire";
            $result=$db->query($sql);
            $deplacementInitial=$result->fetchAll(PDO::FETCH_ASSOC);
         }
      return $deplacementInitial;
    }
}
?>