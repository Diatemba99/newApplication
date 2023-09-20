<?php
require_once 'db.php';
class  Tcpfinal {
 public $idNavire;
 public $x1MTC1;
 public $x2MTC1;
 public $y1MTC1;
 public $y2MTC1;
 public $mtc1;
 public $x1MTC2;
 public $x2MTC2;
 public $y1MTC2;
 public $y2MTC2;
 public $mtc2;
 public $hellCorrection;
 public $deplCorrige;

    // fonction pour enregistrer calcul tirants moyens apparents Draft initial
    function saveTcpInitial($idNavire,$x1MTC1,$x2MTC1,$y1MTC1,$y2MTC1,$mtc1,$x1MTC2,$x2MTC2,$y1MTC2,$y2MTC2,$mtc2,$hellCorrection,$deplCorrige): bool
    {
      $ob_connexion=new Connexion();
      $db=$ob_connexion->getDB();
      $ret=false;
      if (!is_null($db))
       {
          $sql="INSERT INTO tpc_tembd_temtd_final
          (id,x1TPCMbd,x2TPCMbd,y1TPCMbd,y2TPCMbd,TPCMbd,x1TPCMtd,x2TPCMtd,y1TPCMtd,y2TPCMtd,TPCMtd,hellCorrection,deplCorrige)values
          (:idNavire,:x1TPCMbd,:x2TPCMbd,:y1TPCMbd,:y2TPCMbd,:TPCMbd,:x1TPCMtd,:x2TPCMtd,:y1TPCMtd,:y2TPCMtd,:TPCMtd,:hellCorrection,:deplCorrige)";
          $element=$db->prepare($sql);
          $element->execute(array(
            ':idNavire'=>$idNavire,
            ':x1TPCMbd'=>$x1MTC1,
            ':x2TPCMbd'=>$x2MTC1,
            ':y1TPCMbd'=>$y1MTC1,
            ':y2TPCMbd'=>$y2MTC1,
            ':TPCMbd'=>$mtc1,
            ':x1TPCMtd'=>$x1MTC2,
            ':x2TPCMtd'=>$x2MTC2,
            ':y1TPCMtd'=>$y1MTC2,
            ':y2TPCMtd'=>$y2MTC2,
            ':TPCMtd'=>$mtc2,
            ':hellCorrection'=>$hellCorrection,
            ':deplCorrige'=>$deplCorrige,
            
             ));
          $ret=true;
        }else{
          echo "erreur de connexion a la basse";
        }
        return $ret;
    }

    // function de recuperation de tpc by id

    function getTpcnitialByID($idNavire)
    {
        $ob_connexion=new Connexion();
        $db=$ob_connexion->getDB();
        $tpcInitial=null;
        if (!is_null($db))
         {
            $sql="SELECT * from tpc_tembd_temtd_final where id=$idNavire";
            $result=$db->query($sql);
            $tpcInitial=$result->fetchAll(PDO::FETCH_ASSOC);
         }
      return $tpcInitial;
    }
}
?>