<?php
require_once '../model/ctmafinal.php';

// Ajout Info Navire
if(isset($_POST['btn_ajout_etape3'])){
   $idNavire=$_POST['idNavire'];
   $date=$_POST['dateSurveyFinal'];
   $heure=$_POST['heureSurveyFinal'];
   $teavbd=$_POST['teavbd'];
   $teavtb=$_POST['teavtb'];
   $teav=$_POST['teav'];
   $tearbd=$_POST['tearbd'];
   $teartb=$_POST['teartb'];
   $tear=$_POST['tear'];
   $tembd=$_POST['tembd'];
   $temtb=$_POST['temtb'];
   $tem=$_POST['tem'];
   $apparentTrim=$_POST['apparentTrim'];
   $l=$_POST['L'];
   $l1=$_POST['l1'];
   $l2=$_POST['l2'];
   $l3=$_POST['l3'];
   $lL=$_POST['lL'];
   $corrAv=$_POST['corrAv'];
   $corrAr=$_POST['corrAr'];
   $corrM=$_POST['corrM'];
   $tAv=$_POST['tAv'];
   $tAr=$_POST['tAr'];
   $tM=$_POST['tM'];
   $trueTrim=$_POST['trueTrim'];
    $ob_infoNavirer=new Ctmafinal();
    if($ob_infoNavirer->saveCtmaInitial($idNavire,$teavbd,$teavtb,$teav,$tearbd,$teartb,$tear,$tembd,$temtb,$tem,$apparentTrim,$l,$l1,$l2,$l3,$lL,$corrAv,$corrAr,$corrM,$tAv,$tAr,$tM,$trueTrim,$date,$heure)){
        header("location:../?page=infodraftfinal&id=$idNavire&success_insersion");
    }else{
        header("location:../?page=infodraftfinal&id=$idNavire&erreur_insersion");
    }
}
