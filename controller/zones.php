<?php

require_once '../model/zones.php';



// Ajout Zone
if(isset($_POST['btn_ajout'])){
        $nomZone=$_POST['nom'];
        $ob_zone=new Zones();
    if($ob_zone->saveZone( $nomZone)){
        header("location:../?page=zones&success_insersion");
    }else{
        header("location:../?page=zones&erreur_insersion");
    }
    
    
}


// modifier Zone
if(isset($_POST['btn_modif_zone'])){
    $id=$_POST['idZone_modif'];
    $nomZone=$_POST['nom_modif'];
    $ob_zone=new Zones();
    if($ob_zone->modifZone($id,$nomZone)){
        header("location:../?page=zones&success_modif");
    }else{
        header("location:../?page=zones&erreur_modif");
    }
}



//supression Zone


if (isset($_GET['idsup'])) {
    $id = $_GET['idsup'];
    $user = new Zones();
    if ($user->delZone($id)) {
        header("location:../model/zones.php");
    } else {
        echo "<script>alert('Erreur lors de la selection!');</script>";
    }
}




?>