<?php
require_once 'db.php';
class  InfoNavire {
 public $idNavire;
    public $nomNavire;
   public $imoNumber;
   public $inmcNumber;
   public $operators;
   public $keelPlate;
   public $lbp;
   public $dbpm;

  public  $lightship;
   public $densityRho;
   public $numberOfthewedges;
   public $idUser;
   public $complete;
 public $complete2;
 public $valide;
 public $valide2;

 // function de recuperation de tous les Draft

    function getDraftInitial()
    {
        $ob_connexion=new Connexion();
        $db=$ob_connexion->getDB();
        $alldraft=null;
        if (!is_null($db))
         {
            $sql="SELECT * from info_navire";
            $result=$db->query($sql);
            $alldraft=$result->fetchAll(PDO::FETCH_ASSOC);
         }
      return $alldraft;
    }

    

    // function de recuperation de tous les Draft validé

    function getDraftInitialValide()
    {
        $ob_connexion=new Connexion();
        $db=$ob_connexion->getDB();
        $alldraft=null;
        if (!is_null($db))
         {
            $sql="SELECT * from info_navire where valide=1";
            $result=$db->query($sql);
            $alldraft=$result->fetchAll(PDO::FETCH_ASSOC);
         }
      return $alldraft;
    }

    // fonction pour enregistrer un noubeau Draft
    function saveInfoNavire($nomNavire,$imoNumber,$inmcNumber,$operator,$keelPlate,$lbp,$dbpm,$lightship,$densityRho,$numberOfthewedges,$idUser): bool
    {
      $ob_connexion=new Connexion();
      $db=$ob_connexion->getDB();
      $ret=false;
      if (!is_null($db))
       {
          $sql="INSERT INTO info_navire
          (nomNavire,imoNumber,inmcNumber,operator,keelPlate,lbp,dbpm,lightship,densityRho,numberOftheWedges,idUser)values
          (:nomNavire,:imoNumber,:inmcNumber,:operator,:keelPlate,:lbp,:dbpm,:lightship,:densityRho,:numberOftheWedges,:idUser)";
          $element=$db->prepare($sql);
          $element->execute(array(
            ':nomNavire'=>$nomNavire,
            ':imoNumber'=>$imoNumber,
            ':inmcNumber'=>$inmcNumber,
            ':operator'=>$operator,
            ':keelPlate'=>$keelPlate,
            ':lbp'=>$lbp,
            ':dbpm'=>$dbpm,
            ':lightship'=>$lightship,
            ':densityRho'=>$densityRho,
            ':numberOftheWedges'=>$numberOfthewedges,
            ':idUser'=>$idUser,
             ));
          $ret=true;
        }else{
          echo "erreur de connexion a la basse";
        }
        return $ret;
    }

    // Fonction pour valider draft initial
    public function validatedDraft($valide, $idNavire){
      $ob_connexion= new Connexion();
      $db = $ob_connexion->getDB();
      $ret =0;
      if (!is_null($db)){
        $sql="UPDATE info_navire_survey set `valide`='$valide' where id=$idNavire";
        $result = $db->query($sql);
        $ret = $result;
      }
      return $ret;
    }

    // Fonction pour valider draft Final
    public function validatedDraftFinal($valide2, $idNavire){
      $ob_connexion= new Connexion();
      $db = $ob_connexion->getDB();
      $ret =0;
      if (!is_null($db)){
        $sql="UPDATE info_navire_survey set `valide2`='$valide2' where id=$idNavire";
        $result = $db->query($sql);
        $ret = $result;
      }
      return $ret;
    }

    // 
    function getDraftByID($id)
    {
        $ob_connexion=new Connexion();
        $db=$ob_connexion->getDB();
        $alldraft=null;
        if (!is_null($db))
         {
            $sql="SELECT * from info_navire_survey where id = $id";
            $result=$db->query($sql);
            $alldraft=$result->fetchAll(PDO::FETCH_ASSOC);
         }
      return $alldraft;
    }

    //Supprimer Draft
  function delDraft($idDraft)
    {
        $ob_connexion = new Connexion();
        $db = $ob_connexion->getDB();
        if (!is_null($db)) {
            $sql = "DELETE FROM info_navire_survey WHERE id=$idDraft";
            $query = $db->prepare($sql);
            $query->execute();

            echo "<script>alert('Supression effectuées!');</script>";
            echo '<script>window.location.href="../?page=listessurveyinitial";</script>';
        } else {
            echo "<script>alert('Erreur Suppression!');</script>";
        }
    }
}
?>