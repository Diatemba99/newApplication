<?php
require_once 'db.php';
class  Infodraftinitial {
 public $idNavire;
 public $typeMinerai;
 public $teneurEau;
 public $teneurSilice;
 public $teneurAlumin;
 public $inspecteurMinier;
 public $nomPortDepart;
 public $nomPortDestination;
 public $nomCapitaine;
 public $imoNumber;
 public $dateEntreNavire;
 public $dateSurveyInitial;
 public $heureSurveyInitial;
 public $societeMiniere;
 public $agenceMaritime;
 public $destinataireEchantillons;
 public $nombreCales;
 public $infoComplementaires;

 // function de recuperation du navire en fonction de l'ID

    function getInfoNavireByID($id)
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

    // function de recuperation de tous les Draft en fonction de l'inspecteur

    function getDraftInitialbyInspecteur($inspecteur)
    {
        $ob_connexion=new Connexion();
        $db=$ob_connexion->getDB();
        $alldraft=null;
        if (!is_null($db))
         {  
            $sql="SELECT * from info_navire_survey where idUser = $inspecteur";
            $result=$db->query($sql);
            $alldraft=$result->fetchAll(PDO::FETCH_ASSOC);
         }
      return $alldraft;
    }

    // function de recuperation draft initial en fonction de l'ID
    function getInfoDraftByID($id)
    {
        $ob_connexion=new Connexion();
        $db=$ob_connexion->getDB();
        $alldraft=null;
        if (!is_null($db))
         {
            $sql="SELECT * from info_draft_initial where id = $id";
            $result=$db->query($sql);
            $alldraft=$result->fetchAll(PDO::FETCH_ASSOC);
         }
      return $alldraft;
    }

    // fonction pour enregistrer un info Draft initial
    function saveInfoDraftInitial($idNavire,$typeMinerai,$teneurEau,$teneurSilice,$teneurAlumin,$inspecteurMinier,$nomPortDepart,$nomPortDestination,$nomCapitaine,$imoNumber,$dateEntreNavire,$dateSurveyInitial,$heureSurveyInitial,$societeMiniere,$agenceMaritime,$destinataireEchantillons,$nombreCales,$infoComplementaires): bool
    {
      $ob_connexion=new Connexion();
      $db=$ob_connexion->getDB();
      $ret=false;
      if (!is_null($db))
       {
          $sql="INSERT INTO info_draft_initial
          (id,typeMinerai,teneurEau,teneurSilice,teneurAlumin,inspecteurMinier,nomPortDepart,nomPortDestination,nomCapitaine,imoNumber,dateEntreNavire,dateSurveyInitial,heureSurveyInitial,societeMiniere,agenceMaritime,destinataireEchantillons,nombreCales,infoComplementaires)values
          (:idNavire,:typeMinerai,:teneurEau,:teneurSilice,:teneurAlumin,:inspecteurMinier,:nomPortDepart,:nomPortDestination,:nomCapitaine,:imoNumber,:dateEntreNavire,:dateSurveyInitial,:heureSurveyInitial,:societeMiniere,:agenceMaritime,:destinataireEchantillons,:nombreCales,:infoComplementaires)";
          $element=$db->prepare($sql);
          $element->execute(array(
            ':idNavire'=>$idNavire,
            ':typeMinerai'=>$typeMinerai,
            ':teneurEau'=>$teneurEau,
            ':teneurSilice'=>$teneurSilice,
            ':teneurAlumin'=>$teneurAlumin,
            ':inspecteurMinier'=>$inspecteurMinier,
            ':nomPortDepart'=>$nomPortDepart,
            ':nomPortDestination'=>$nomPortDestination,
            ':nomCapitaine'=>$nomCapitaine,
            ':imoNumber'=>$imoNumber,
            ':dateEntreNavire'=>$dateEntreNavire,
            ':dateSurveyInitial'=>$dateSurveyInitial,
            ':heureSurveyInitial'=>$heureSurveyInitial,
            ':societeMiniere'=>$societeMiniere,
            ':agenceMaritime'=>$agenceMaritime,
            ':destinataireEchantillons'=>$destinataireEchantillons,
            ':nombreCales'=>$nombreCales,
            ':infoComplementaires'=>$infoComplementaires,
             ));
          $ret=true;
        }else{
          echo "erreur de connexion a la basse";
        }
        return $ret;
    }
}
?>