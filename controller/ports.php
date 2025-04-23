<?php

require_once '../model/ports.php';



// Ajout Port
if(isset($_POST['btn_ajout'])){
        $nomPort=$_POST['nom'];
        $idZone=$_POST['idZone'];
        $ob_port=new Ports();
    if($ob_port->savePort($nomPort,$idZone)){
        header("location:../?page=ports&success_insersion");
    }else{
        header("location:../?page=ports&erreur_insersion");
    }
    
    
}


// modifier Port
if(isset($_POST['btn_modif_port'])){
    $id=$_POST['idPort_modif'];
    $nomPort=$_POST['nom_modif'];
    $idZone=$_POST['idZone_modif'];
    $ob_port=new Ports();
    if($ob_port->modifPort($id,$nomPort,$idZone)){
        header("location:../?page=ports&success_modif");
    }else{
        header("location:../?page=ports&erreur_modif");
    }
}



//supression Port


if (isset($_GET['idsup'])) {
    $id = $_GET['idsup'];
    $user = new Ports();
    if ($user->delPort($id)) {
        header("location:../model/ports.php");
    } else {
        echo "<script>alert('Erreur lors de la selection!');</script>";
    }
}




?>