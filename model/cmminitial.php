<?php
require_once 'db.php';
class  Cmminitial {
 public $idNavire;
 public $x1;
 public $x2;
 public $mad;
 public $y1;
 public $y2;
 public $deplacementMad;
 public $t1;
 public $t2;
 public $lcf;
 public $y1tpc;
 public $y2tpc;
 public $lcfto;
 public $y1tpcmad;
 public $y2tpcmad;
 public $tpcmad;
 public $firstTrimCorrection;
 public $x1secondtrim;
 public $x2secondtrim;
 public $y1secondTrim;
 public $y2secondtrim;
 public $mtc1;
 public $x1secondtrim2;
 public $x2secondtrim2;
 public $y1secondTrim2;
 public $y2secondtrim2;
 public $mtc2;
 public $secondTrimCorrection;

    // fonction pour enregistrer calcul tirants moyens apparents Draft initial
    

    public function saveCmmInitial($idNavire,$x1,$x2,$mad,$y1,$y2,$deplacementMad,$t1,$t2,$lcf,$y1tpc,$y2tcp,$lcfto,$y1tpcmad,$y2tpcmad,$tpcmad,$firstTrimCorrection,$x1secondtrim,$x2secondtrim,$y1secondTrim,$y2secondtrim,$mtc1,$x1secondtrim2,$x2secondtrim2,$y1secondTrim2,$y2secondTrim2,$mtc2,$secondTrimCorrection): bool
    {
      $ob_connexion=new Connexion();
      $db=$ob_connexion->getDB();
      $ret=false;
      if (!is_null($db))
       {
          $sql="INSERT INTO `cmm_initial`(`id`, `x1Mmoyenne`, `x2Mmoyenne`, `mad`, `y1Deplacement`, `y2Deplacement`, `deplacementMad`, `t1`, `t2`, `choixFinal`, `y1LCF`, `y2LCF`, `lcf`, `y1TPCmad`, `y2TPCmad`, `TPC`, `firstTrimCorrection`, `x1MCTC1`, `x2MCTC1`, `y1MCTC1`, `y2MCTC1`, `MCTC1`, `x1MCTC2`, `x2MCTC2`, `y1MCTC2`, `y2MCTC2`, `MCTC2`, `secondTrimCorrection`)values('$idNavire','$x1','$x2','$mad','$y1','$y2','$deplacementMad','$t1','$t2','$lcf','$y1tpc','$y2tcp','$lcfto','$y1tpcmad','$y2tpcmad','$tpcmad','$firstTrimCorrection','$x1secondtrim','$x2secondtrim','$y1secondTrim','$y2secondtrim','$mtc1','$x1secondtrim2','$x2secondtrim2','$y1secondTrim2','$y2secondTrim2','$mtc2','$secondTrimCorrection')";
          $ret=$db->query($sql);
            $ret = true;
        }else{
          echo "erreur de connexion a la basse";
        }
        return $ret;
    }

    // function de recuperation de cmm by id

    function getCmmInitialByID($idNavire)
    {
        $ob_connexion=new Connexion();
        $db=$ob_connexion->getDB();
        $cmmInitial=null;
        if (!is_null($db))
         {
            $sql="SELECT * from cmm_initial where id=$idNavire";
            $result=$db->query($sql);
            $cmmInitial=$result->fetchAll(PDO::FETCH_ASSOC);
         }
      return $cmmInitial;
    }

    
}
?>