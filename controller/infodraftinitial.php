<?php
require_once '../model/infodraftinitial.php';

// Ajout Info Navire
if(isset($_POST['btn_ajout_etape2'])){
   $idNavire=$_POST['idNavire'];
   $typeMinerai=$_POST['typeMinerai'];
   $teneurEau=$_POST['teneurEau'];
   $teneurSilice=$_POST['teneurSilice'];
   $teneurAlumin=$_POST['teneurAlumin'];
   $inspecteurMinier=$_POST['inspecteur'];
   $nomPortDepart=$_POST['nomPortDepart'];
   $nomPortDestination=$_POST['nomPortDestination'];
   $nomCapitaine=$_POST['nomCapitaine'];
   $imoNumber=$_POST['imo'];
   $dateEntreNavire=$_POST['dateEntreNavire'];
   $dateSurveyInitial=$_POST['dateSurveyInitial'];
   $heureSurveyInitial=$_POST['heureSurveyInitial'];
   $societeMiniere=$_POST['societeMiniere'];
   $agenceMaritime=$_POST['agenceMaritime'];
   $destinataireEchantillons=$_POST['destinataireEchantillons'];
   $nombreCales=$_POST['nombreCale'];
   $infoComplementaires=$_POST['infoComplémentaire'];
    $ob_infoNavirer=new Infodraftinitial();
    if($ob_infoNavirer->saveInfoDraftInitial($idNavire,$typeMinerai,$teneurEau,$teneurSilice,$teneurAlumin,$inspecteurMinier,$nomPortDepart,$nomPortDestination,$nomCapitaine,$imoNumber,$dateEntreNavire,$dateSurveyInitial,$heureSurveyInitial,$societeMiniere,$agenceMaritime,$destinataireEchantillons,$nombreCales,$infoComplementaires)){
        header("location:../?page=infodraftinitial&id=$idNavire&success_insersion");
    }else{
        header("location:../?page=listessurveyinitial&erreur_insersion");
    }
}
