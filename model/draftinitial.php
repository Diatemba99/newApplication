<?php
require_once 'db.php';
class  Draft {
 public $idNavire;
 public $nomNavire;
 public $callSign;
 public $officialNum;
 public $shipManagement;
 public $operators;
 public $registered;
 public $vsa;
 public $seo;
 public $flag;
 public $portOfReg;
 public $builders;
 public $hullNo;
 public $type;
 public $keelLaid;
 public $delivered;
 public $classSociety;
 public $hmUnderwrirers;
 public $piClub;
 public $loa;
 public $lbp;
 public $breadth_moulded;
 public $depthMoulded;
 public $depthExtreme;
 public $keelplate;
 public $dwt;
 public $disp;
 public $lightship;
 public $draftMoulded;
 public $draftExtreme;
 public $fp_to_fore_draft_mark;
 public $ap_to_fore_draft_mark;
 public $midship_to_mid_draft_mark;
 public $between_draft_mark;
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
            $sql="SELECT * from info_navire_survey";
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
            $sql="SELECT * from info_navire_survey where valide=1";
            $result=$db->query($sql);
            $alldraft=$result->fetchAll(PDO::FETCH_ASSOC);
         }
      return $alldraft;
    }

    // fonction pour enregistrer un noubeau Draft
    function saveInfoNavire($nomNavire,$callSign,$officialNum,$shipManagement,$operators,$registered,$vsa,$seo,$flag,$portOfReg,$builders,$hullNo,$type,$keelLaid,$delivered,$classSociety,$hmUnderwrirers,$piClub,$loa,$lbp,$breadth_moulded,$depthMoulded,$depthExtreme,$keelplate,$dwt,$disp,$lightship,$draftMoulded,$draftExtreme,$fp_to_fore_draft_mark,$ap_to_fore_draft_mark,$midship_to_mid_draft_mark,$between_draft_mark,$idUser
): bool
    {
      $ob_connexion=new Connexion();
      $db=$ob_connexion->getDB();
      $ret=false;
      if (!is_null($db))
       {
          $sql="INSERT INTO info_navire_survey
          (nomNavire,callSign,officialNo,shipManagement,operators,registeredOwners,vsa_cso,seo,flag,portOfReg,builders,hullNo,type,keelLaid,delivered,classSociety,hmUnderwrirers,piClub,loa,lbp,breadth_moulded,depth_moulded,depth_extreme,keelplate,dwt,disp,lightship,draft_moulded,draft_extreme,fp_to_fore_draft_mark,ap_to_fore_draft_mark,midship_to_mid_draft_mark,between_draft_mark,idUser)values
          (:nomNavire,:callSign,:officialNo,:shipManagement,:operators,:registeredOwners,:vsa_cso,:seo,:flag,:portOfReg,:builders,:hullNo,:type,:keelLaid,:delivered,:classSociety,:hmUnderwrirers,:piClub,:loa,:lbp,:breadth_moulded,:depth_moulded,:depth_extreme,:keelplate,:dwt,:disp,:lightship,:draft_moulded,:draft_extreme,:fp_to_fore_draft_mark,:ap_to_fore_draft_mark,:midship_to_mid_draft_mark,:between_draft_mark,:idUser)";
          $element=$db->prepare($sql);
          $element->execute(array(
            ':nomNavire'=>$nomNavire,
            ':callSign'=>$callSign,
            ':officialNo'=>$officialNum,
            ':shipManagement'=>$shipManagement,
            ':operators'=>$operators,
            ':registeredOwners'=>$registered,
            ':vsa_cso'=>$vsa,
            ':seo'=>$seo,
            ':flag'=>$flag,
            ':portOfReg'=>$portOfReg,
            ':builders'=>$builders,
            ':hullNo'=>$hullNo,
            ':type'=>$type,
            ':keelLaid'=>$keelLaid,
            ':delivered'=>$delivered,
            ':classSociety'=>$classSociety,
            ':hmUnderwrirers'=>$hmUnderwrirers,
            ':piClub'=>$piClub,
            ':loa'=>$loa,
            ':lbp'=>$lbp,
            ':breadth_moulded'=>$breadth_moulded,
            ':depth_moulded'=>$depthMoulded,
            ':depth_extreme'=>$depthExtreme,
            ':keelplate'=>$keelplate,
            ':dwt'=>$dwt,
            ':disp'=>$disp,
            ':lightship'=>$lightship,
            ':draft_moulded'=>$draftMoulded,
            ':draft_extreme'=>$draftExtreme,
            ':fp_to_fore_draft_mark'=>$fp_to_fore_draft_mark,
            ':ap_to_fore_draft_mark'=>$ap_to_fore_draft_mark,
            ':midship_to_mid_draft_mark'=>$midship_to_mid_draft_mark,
            ':between_draft_mark'=>$between_draft_mark,
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