<?php
require_once '../model/cargaison.php';

// Ajout Info Navire
if(isset($_POST['btn_ajout_etape6'])){
   $idNavire=$_POST['idNavire'];
   $pcargaison=$_POST['pcargaison'];
   $pcargaisonA=$_POST['pcargaisonA'];
   $pcargaisonMMG=$_POST['pcargaisonMMG'];
   $intervalleC=$_POST['intervalleC'];
   
   
   
    $ob_infoNavirer=new Cargaison();
    if($ob_infoNavirer->saveCargaison($idNavire,$pcargaison,$pcargaisonA,$pcargaisonMMG,$intervalleC)){
        header("location:../?page=infodraftfinal&id=$idNavire&success_insersion");
    }else{
        header("location:../?page=infodraftfinal&id=$idNavire&erreur_insersion");
    }
}