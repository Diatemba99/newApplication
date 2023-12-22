<?php
require_once '../model/cmmfinal.php';

// Ajout Info Navire
if(isset($_POST['btn_ajout_etape4'])){
   $idNavire=$_POST['idNavire'];
   $x1=$_POST['x1'];
   $x2=$_POST['x2'];
   $mad=$_POST['mad'];
   $y1=$_POST['y1'];
   $y2=$_POST['y2'];
   $deplacementMad=$_POST['deplacementMad'];
   $t1=$_POST['t1'];
   $t2=$_POST['t2'];
   $lcf=$_POST['lcf'];
   $y1tpc=$_POST['y1LCF'];
   $y2tcp=$_POST['y2LCF'];
   $lcfto=$_POST['lcfto'];
   $y1tpcmad=$_POST['y1tpcmad'];
   $y2tpcmad=$_POST['y2tpcmad'];
   $tpcmad=$_POST['tpcmad'];
   $firstTrimCorrection=$_POST['firstTrimCorrection'];
   $x1secondtrim=$_POST['x1secondtrim'];
   $x2secondtrim=$_POST['x2secondtrim'];
   $y1secondTrim=$_POST['y1secondtrim'];
   $y2secondtrim=$_POST['y2secondtrim'];
   $mtc1=$_POST['mtc1'];
   $x1secondtrim2=$_POST['x1secondtrim2'];
   $x2secondtrim2=$_POST['x2secondtrim2'];
   $y1secondTrim2=$_POST['y1secondtrim2'];
   $y2secondTrim2=$_POST['y2secondtrim2'];
   $mtc2=$_POST['mtc2'];
   $secondTrimCorrection=$_POST['secondTrimCorrection'];

    $ob_infoNavirer=new Cmmfinal();
    if($ob_infoNavirer->saveCmmfinal($idNavire,$x1,$x2,$mad,$y1,$y2,$deplacementMad,$t1,$t2,$lcf,$y1tpc,$y2tcp,$lcfto,$y1tpcmad,$y2tpcmad,$tpcmad,$firstTrimCorrection,$x1secondtrim,$x2secondtrim,$y1secondTrim,$y2secondtrim,$mtc1,$x1secondtrim2,$x2secondtrim2,$y1secondTrim2,$y2secondTrim2,$mtc2,$secondTrimCorrection)){
        header("location:../?page=infodraftfinal&id=$idNavire&success_insersion");
    }else{
        header("location:../?page=infodraftfinal&id=$idNavire&erreur_insersion");
    }
}
