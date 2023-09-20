<?php
require_once 'db.php';
class  DraftDashbords {
 public $idNavire;

    // function de recuperation des draft

    function getAllDraft()
    {
        $ob_connexion=new Connexion();
        $db=$ob_connexion->getDB();
        $drafts=null;
        if (!is_null($db))
         {
            $sql="SELECT * from info_navire_survey";
            $result=$db->query($sql);
            $drafts=$result->fetchAll(PDO::FETCH_ASSOC);
         }
      return $drafts;
    }

    // function de recuperation des draft initial non validé

    function getAllDraftInitialNo()
    {
        $ob_connexion=new Connexion();
        $db=$ob_connexion->getDB();
        $draftsInitial=null;
        if (!is_null($db))
         {
            $sql="SELECT * from info_navire_survey where valide=0";
            $result=$db->query($sql);
            $draftsInitial=$result->fetchAll(PDO::FETCH_ASSOC);
         }
      return $draftsInitial;
    }

    // function de recuperation des draft initial validé

    function getAllDraftInitialValide()
    {
        $ob_connexion=new Connexion();
        $db=$ob_connexion->getDB();
        $draftsInitial=null;
        if (!is_null($db))
         {
            $sql="SELECT * from info_navire_survey where valide=1";
            $result=$db->query($sql);
            $draftsInitial=$result->fetchAll(PDO::FETCH_ASSOC);
         }
      return $draftsInitial;
    }

    // function de recuperation des draft final validé

    function getAllDraftFinalValide()
    {
        $ob_connexion=new Connexion();
        $db=$ob_connexion->getDB();
        $draftsInitial=null;
        if (!is_null($db))
         {
            $sql="SELECT * from info_navire_survey where valide2=1";
            $result=$db->query($sql);
            $draftsInitial=$result->fetchAll(PDO::FETCH_ASSOC);
         }
      return $draftsInitial;
    }
}
?>