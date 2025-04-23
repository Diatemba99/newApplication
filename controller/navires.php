<?php

require_once '../model/navires.php';



// Ajout Port
if(isset($_POST['btn_ajout'])){
        $nomNavire=$_POST['nom'];
        $idPort=$_POST['idPort'];
        $ob_port=new Navires();
    if($ob_port->saveNavire($nomNavire,$idPort)){
        header("location:../?page=navires&success_insersion");
    }else{
        header("location:../?page=navires&erreur_insersion");
    }
    
    
}


// modifier Port
if(isset($_POST['btn_modif_navire'])){
    $id=$_POST['idNavire_modif'];
    $nomNavire=$_POST['nom_modif'];
    $idPort=$_POST['idPort_modif'];
    $ob_port=new Navires();
    if($ob_port->modifNavire($id,$nomNavire,$idPort)){
        header("location:../?page=navires&success_modif");
    }else{
        header("location:../?page=navires&erreur_modif");
    }
}



//supression Port


if (isset($_GET['idsup'])) {
    $id = $_GET['idsup'];
    $user = new Navires();
    if ($user->delNavire($id)) {
        header("location:../model/navires.php");
    } else {
        echo "<script>alert('Erreur lors de la selection!');</script>";
    }
}




?>