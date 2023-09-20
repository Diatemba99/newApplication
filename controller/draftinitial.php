<?php
require_once '../model/draftinitial.php';

// Ajout Info Navire
if(isset($_POST['btn_ajout'])){
   $nomNavire=$_POST['nomNavire'];
   $callSign=$_POST['callSign'];
   $officialNum=$_POST['officialN'];
   $shipManagement=$_POST['shipManagement'];
   $operators=$_POST['operators'];
   $registered=$_POST['registeredOwners'];
   $vsa=$_POST['vsa'];
   $seo=$_POST['seo'];
   $flag=$_POST['flag'];
   $portOfReg=$_POST['portOfReg'];
   $builders=$_POST['builders'];
   $hullNo=$_POST['hull'];
   $type=$_POST['type'];
   $keelLaid=$_POST['keelLaid'];
   $delivered=$_POST['delivered'];
   $classSociety=$_POST['class'];
   $hmUnderwrirers=$_POST['hm'];
   $piClub=$_POST['piclub'];
   $loa=$_POST['loa'];
   $lbp=$_POST['lbp'];
   $breadth_moulded=$_POST['breadth'];
   $depthMoulded=$_POST['depthMoulded'];
   $depthExtreme=$_POST['depthExterne'];
   $keelplate=$_POST['keelPlate'];
   $dwt=$_POST['dwt'];
   $disp=$_POST['disp'];
   $lightship=$_POST['lightship'];
   $draftMoulded=$_POST['draftMoulded'];
   $draftExtreme=$_POST['draftExtreme'];
   $fp_to_fore_draft_mark=$_POST['fp'];
   $ap_to_fore_draft_mark=$_POST['ap'];
   $midship_to_mid_draft_mark=$_POST['midship'];
   $between_draft_mark=$_POST['between'];
   $idUser=$_POST['idUser'];
    $ob_infoNavirer=new Draft();
    if($ob_infoNavirer->saveInfoNavire($nomNavire,$callSign,$officialNum,$shipManagement,$operators,$registered,$vsa,$seo,$flag,$portOfReg,$builders,$hullNo,$type,$keelLaid,$delivered,$classSociety,$hmUnderwrirers,$piClub,$loa,$lbp,$breadth_moulded,$depthMoulded,$depthExtreme,$keelplate,$dwt,$disp,$lightship,$draftMoulded,$draftExtreme,$fp_to_fore_draft_mark,$ap_to_fore_draft_mark,$midship_to_mid_draft_mark,$between_draft_mark,$idUser)){
        header("location:../?page=listessurveyinitial&success_insersion");
    }else{
        header("location:../?page=listessurveyinitial&id=$idNavire&erreur_insersion");
    }
}

// validation de draft initial
if (isset($_GET['id']) && isset($_GET['activated'])){
    $id = $_GET['id'];
    $active = $_GET['activated'];
    if ($active==0){
        $activated=1;
    }
    $ob_infoNavirer= new Draft();
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
    $ob_infoNavirer= new Draft();
    $ob_infoNavirer->validatedDraftFinal($activated2,$id);
    header("location:../?page=infodraftfinal&id=$id");
}

//supression DraftInitial


if (isset($_GET['idsup'])) {
    $id = $_GET['idsup'];
    $draft = new Draft();
    if ($draft->delDraft($id)) {
        header("location:../model/drafinitial.php");
    } else {
        echo "<script>alert('Erreur lors de la selection!');</script>";
    }
}
