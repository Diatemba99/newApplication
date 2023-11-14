<?php
require_once '../model/infonavire.php';

// Ajout Info Navire

    if(isset($_POST['btn_ajout'])){
   $nomNavire=$_POST['nomNavire'];
   $imoNumber=$_POST['imoNumber'];
   $inmcNumber=$_POST['inmcNumber'];
   $operators=$_POST['operator'];
   $keelPlate=$_POST['keelPlate'];
   $lbp=$_POST['lbp'];
   $dbpm=$_POST['dbpm'];

   $lightship=$_POST['lightship'];
   $densityRho=$_POST['densityRho'];
   $numbWedges=$_POST['numbWedges'];
   $idUser=$_POST['idUser'];
    $ob_infoNavirer=new InfoNavire();
    if($ob_infoNavirer->saveInfoNavire($nomNavire,$imoNumber,$inmcNumber,$operators,$keelPlate,$lbp,$dbpm,$lightship,$densityRho,$numbWedges,$idUser)){
        header("location:../?page=navire&success_insersion");
    }else{
        header("location:../?page=navire&id=$idNavire&erreur_insersion");
    }
}



// validation de draft initial
if (isset($_GET['id']) && isset($_GET['activated'])){
    $id = $_GET['id'];
    $active = $_GET['activated'];
    if ($active==0){
        $activated=1;
    }
    $ob_infoNavirer= new InfoNavire();
    $ob_infoNavirer->validatedDraft($activated,$id);
    header("location:../?page=infodraftinitial&id=$id");
}

// validation de draft final
if (isset($_GET['id']) && isset($_GET['activated2'])){
    $id = $_GET['id'];
    $active2 = $_GET['activated2'];
    if ($active2==0){
        $activated2=1;
    }
    $ob_infoNavirer= new InfoNavire();
    $ob_infoNavirer->validatedDraftFinal($activated2,$id);
    header("location:../?page=infodraftfinal&id=$id");
}

//supression DraftInitial


if (isset($_GET['idsup'])) {
    $id = $_GET['idsup'];
    $draft = new InfoNavire();
    if ($draft->delDraft($id)) {
        header("location:../model/drafinitial.php");
    } else {
        echo "<script>alert('Erreur lors de la selection!');</script>";
    }
}
