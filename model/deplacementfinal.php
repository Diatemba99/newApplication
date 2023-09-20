<?php
require_once 'db.php';
class  Deplacementfinal {
 public $idNavire;
 public $densiteTable;
 public $densiteMesure;
 public $deplacementFinal;
 public $fuelOil;
 public $dieselOil;
 public $lubrifiantOil;
 public $freshWater;
 public $ballastWater;
 public $lsLightship;
 public $others;
 public $constantes;


    // fonction pour enregistrer calcul tirants moyens apparents Draft initial
    function saveDeplacementInitial($idNavire,$densiteTable,$densiteMesure,$deplacementFinal,$fuelOil,$dieselOil,$lubrifiantOil,$freshWater,$ballastWater,$lsLightship,$others,$constantes): bool
    {
      $ob_connexion=new Connexion();
      $db=$ob_connexion->getDB();
      $ret=false;
      if (!is_null($db))
       {
          $sql="INSERT INTO deplacement_final
          (id,densiteTableHydrostatique,densitemesure,deplacementFinal,fuelOil,dieselOil,lubrifiantOil,freshWater,ballastWater,ls,others,constantes)values
          (:idNavire,:densiteTableHydrostatique,:densitemesure,:deplacementFinal,:fuelOil,:dieselOil,:lubrifiantOil,:freshWater,:ballastWater,:ls,:others,:constantes)";
          $element=$db->prepare($sql);
          $element->execute(array(
            ':idNavire'=>$idNavire,
            ':densiteTableHydrostatique'=>$densiteTable,
            ':densitemesure'=>$densiteMesure,
            ':deplacementFinal'=>$deplacementFinal,
            ':fuelOil'=>$fuelOil,
            ':dieselOil'=>$dieselOil,
            ':lubrifiantOil'=>$lubrifiantOil,
            ':freshWater'=>$freshWater,
            ':ballastWater'=>$ballastWater,
            ':ls'=>$lsLightship,
            ':others'=>$others,
            ':constantes'=>$constantes,
             ));
          $ret=true;
        }else{
          echo "erreur de connexion a la basse";
        }
        return $ret;
    }

    function getDeplacementitialByID($idNavire)
    {
        $ob_connexion=new Connexion();
        $db=$ob_connexion->getDB();
        $deplacementInitial=null;
        if (!is_null($db))
         {
            $sql="SELECT * from deplacement_final where id=$idNavire";
            $result=$db->query($sql);
            $deplacementInitial=$result->fetchAll(PDO::FETCH_ASSOC);
         }
      return $deplacementInitial;
    }
}
?>