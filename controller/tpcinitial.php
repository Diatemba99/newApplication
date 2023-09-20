<?php
require_once '../model/tpcinitial.php';

// Ajout Info Navire
if(isset($_POST['btn_ajout_etape5'])){
   $idNavire=$_POST['idNavire'];
   $x1MTC1=$_POST['x1MTC1'];
   $x2MTC1=$_POST['x2MTC1'];
   $y1MTC1=$_POST['y1MTC1'];
   $y2MTC1=$_POST['y2MTC1'];
   $mtc1=$_POST['mtc1'];
   $x1MTC2=$_POST['x1MTC2'];
   $x2MTC2=$_POST['x2MTC2'];
   $y1MTC2=$_POST['y1MTC2'];
   $y2MTC2=$_POST['y2MTC2'];
   $mtc2=$_POST['mtc2'];
   $hellCorrection=$_POST['hellCorrection'];
   $deplCorrige=$_POST['deplCorrige'];
   
    $ob_infoNavirer=new Tcpinitial();
    if($ob_infoNavirer->saveTcpInitial($idNavire,$x1MTC1,$x2MTC1,$y1MTC1,$y2MTC1,$mtc1,$x1MTC2,$x2MTC2,$y1MTC2,$y2MTC2,$mtc2,$hellCorrection,$deplCorrige)){
        header("location:../?page=infodraftinitial&id=$idNavire&success_insersion");
    }else{
        header("location:../?page=infodraftinitial&id=$idNavire&erreur_insersion");
    }
}
