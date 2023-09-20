<?php
require_once 'db.php';
class  Ctmafinal {
 public $idNavire;
 public $teavbd;
 public $teavtb;
 public $teav;
 public $tearbd;
 public $teartb;
 public $tear;
 public $tembd;
 public $temtb;
 public $tem;
 public $apparentTrim;
 public $l;
 public $l1;
 public $l2;
 public $l3;
 public $lL;
 public $corrAv;
 public $corrAr;
 public $corrM;
 public $tAv;
 public $tAr;
 public $tM;
 public $trueTrim;
 public $date;
 public $heure;

    // fonction pour enregistrer calcul tirants moyens apparents Draft initial
    function saveCtmaInitial($idNavire,$teavbd,$teavtb,$teav,$tearbd,$teartb,$tear,$tembd,$temtb,$tem,$apparentTrim,$l,$l1,$l2,$l3,$lL,$corrAv,$corrAr,$corrM,$tAv,$tAr,$tM,$trueTrim,$date,$heure): bool
    {
      $ob_connexion=new Connexion();
      $db=$ob_connexion->getDB();
      $ret=false;
      if (!is_null($db))
       {
          $sql="INSERT INTO ctma_final
          (id,tEavbd,tEavtb,tEav,tEarbd,tEartb,tEar,tEmbd,tEmtb,tEm,apparentTrim,l,l1,l2,l3,lL,corrAvant,corrArr,corrMil,tav,tar,tM,trueTrim,dateFinal,heureFinal)values
          (:idNavire,:tEavbd,:tEavtb,:tEav,:tEarbd,:tEartb,:tEar,:tEmbd,:tEmtb,:tEm,:apparentTrim,:l,:l1,:l2,:l3,:lL,:corrAvant,:corrArr,:corrMil,:tav,:tar,:tM,:trueTrim,:dateFinal,:heureFinal)";
          $element=$db->prepare($sql);
          $element->execute(array(
            ':idNavire'=>$idNavire,
            ':tEavbd'=>$teavbd,
            ':tEavtb'=>$teavtb,
            ':tEav'=>$teav,
            ':tEarbd'=>$tearbd,
            ':tEartb'=>$teartb,
            ':tEar'=>$tear,
            ':tEmbd'=>$tembd,
            ':tEmtb'=>$temtb,
            ':tEm'=>$tem,
            ':apparentTrim'=>$apparentTrim,
            ':l'=>$l,
            ':l1'=>$l1,
            ':l2'=>$l2,
            ':l3'=>$l3,
            ':lL'=>$lL,
            ':corrAvant'=>$corrAv,
            ':corrArr'=>$corrAr,
            ':corrMil'=>$corrM,
            ':tav'=>$tAv,
            ':tar'=>$tAr,
            ':tM'=>$tM,
            ':trueTrim'=>$trueTrim,
            ':dateFinal'=>$date,
            ':heureFinal'=>$heure,
             ));
          $ret=true;
        }else{
          echo "erreur de connexion a la basse";
        }
        return $ret;
    }

    // function de recuperation de ctma by id

    function getCtmaInitialByID($idNavire)
    {
        $ob_connexion=new Connexion();
        $db=$ob_connexion->getDB();
        $ctmaInitial=null;
        if (!is_null($db))
         {
            $sql="SELECT * from ctma_final where id=$idNavire";
            $result=$db->query($sql);
            $ctmaInitial=$result->fetchAll(PDO::FETCH_ASSOC);
         }
      return $ctmaInitial;
    }
}
?>