<?php
require_once 'db.php';
class  Utilisateur {
 public $idUser;
 public $typeUser;
 public $nom;
 public $prenom;
 public $email;
 public $telephone;
 public $datenaiss;
 public $lieunaiss;
 public $datecreation;
 public $mot_de_passe;
 public $etat;
 public $dateModification;


    // function de recuperation de tous les Utilisateur

    function getAllUtilisateur()
    {
        $ob_connexion=new Connexion();
        $db=$ob_connexion->getDB();
        $allutilisateur=null;
        if (!is_null($db))
         {
            $sql="SELECT * from users";
            $result=$db->query($sql);
            $allutilisateur=$result->fetchAll(PDO::FETCH_ASSOC);
         }
      return $allutilisateur;
    }

    
 
// fonction pour enregistrer un utilisateur dans la base de donnee
    function saveUtilisateur($typeUser,$nom,$prenom,$email,$mot_de_passe) : bool
    {
      $ob_connexion=new Connexion();
      $db=$ob_connexion->getDB();
      $ret=false;
      if (!is_null($db))
       {
          $sql="INSERT INTO users
          (first_name,last_name,email,password,type)values
          (:first_name,:last_name,:email,:password,:type)";
          $element=$db->prepare($sql);
          $element->execute(array(
            ':first_name'=>$prenom,
            ':last_name'=>$nom,
            ':email'=>$email, 
            ':password'=>$mot_de_passe,
            ':type'=>$typeUser,
             ));
          $ret=true;
        }else{
          echo "erreur de connexion a la basse";
        }
        return $ret;
    }

    //  methode de verification de l'utilisateur 
 
   public static function verifieUtilisateur($email,$mot_de_passe) :bool
   {
       $ob_connexion=new Connexion();
           $db=$ob_connexion->getDB();
           $return=false;
           if (!is_null($db)) {
           $sql="SELECT * from users WHERE email=:email and password=:motdepasse and activated=1";
           $element=$db->prepare($sql);
           $element->execute(array(
           ":email" => $email,
           ":motdepasse" => $mot_de_passe
           ));
           $result=$element->fetchAll(PDO::FETCH_ASSOC);
           $nb_ligne=$element->rowCount();
           if($nb_ligne==1 )
           {
           session_start();
           $_SESSION["CURRENT_user"]=$result[0];
           $return=true;
           
           }
           }else{
           echo " votre connexion a la base de donner est null";
           }
           return $return;
   }

   //Modifier Utilisateur
   public function ModifUtilisateur($idUser,$prenom,$nom,$email,$mot_de_passe,$typeUser){
    $ob_connexion=new Connexion();
    $db=$ob_connexion->getDB();
    $ret=0;
    if (!is_null($db))
     {
        $sql="UPDATE `users` SET   `first_name`='$prenom', `last_name`='$nom', `email`='$email', `password`='$mot_de_passe', `type`='$typeUser' WHERE id=$idUser";
        $result=$db->query($sql);
        $ret=$result;
     }else{
       echo "erreur de connexion a la base";
    }
    return $ret;
    }


  // Etat utilisateur
  public function etatUser($etat, $idUser) 
  {
    $ob_connexion= new Connexion();
    $db = $ob_connexion->getDB();
    $ret =0;
    if (!is_null($db)){
      $sql = "UPDATE users set `activated`='$etat' where id=$idUser";
      $result = $db->query($sql);
      $ret = $result;

    }else {
      echo "erreur de connexion a la base";
    }
    return $ret;
  }

  //Supprimer User
  function delUser($idUser)
    {
        $ob_connexion = new Connexion();
        $db = $ob_connexion->getDB();
        if (!is_null($db)) {
            $sql = "DELETE FROM users WHERE id=$idUser";
            $query = $db->prepare($sql);
            $query->execute();

            echo "<script>alert('Supression effectuées!');</script>";
            echo '<script>window.location.href="../?page=liste_personnel";</script>';
        } else {
            echo "<script>alert('Erreur Suppression!');</script>";
        }
    }
 
 
}


?>