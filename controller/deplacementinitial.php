<?php
require_once '../model/deplacementinitial.php';

// Ajout Info Navire
if(isset($_POST['btn_ajout_etape6'])){
   $idNavire=$_POST['idNavire'];
   $densiteTable=$_POST['densiteTable'];
   $densiteMesure=$_POST['densiteMesure'];
   $deplacementInitial=$_POST['deplacementInitial'];
   $fuelOil=$_POST['fuelOil'];
   $dieselOil=$_POST['dieselOil'];
   $lubrifiantOil=$_POST['lubrifiantOil'];
   $freshWater=$_POST['freshWater'];
   $ballastWater=$_POST['ballastWater'];
   $lsLightship=$_POST['lsLightship'];
   $others=$_POST['others'];
   $constantes=$_POST['constantes'];
   
   
    $ob_infoNavirer=new Deplacementinitial();
    if($ob_infoNavirer->saveDeplacementInitial($idNavire,$densiteTable,$densiteMesure,$deplacementInitial,$fuelOil,$dieselOil,$lubrifiantOil,$freshWater,$ballastWater,$lsLightship,$others,$constantes)){
        header("location:../?page=infodraftinitial&id=$idNavire&success_insersion");
    }else{
        header("location:../?page=infodraftinitial&id=$idNavire&erreur_insersion");
    }
}