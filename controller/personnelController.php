<?php

// require '../PHPMailer/src/Exception.php';
// require '../PHPMailer/src/PHPMAiler.php';
// require '../PHPMailer/src/SMTP.php';


// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;
// use PHPMailer\PHPMailer\SMTP;



require_once '../model/utilisateur.php';





// Ajout utilisateur
if(isset($_POST['btn_ajout'])){
    $typeUser=$_POST['typeUser'];
    $prenom=$_POST['prenom'];
    $nom=$_POST['nom'];
    $email=$_POST['email'];
    $mot_de_passe=$_POST['mot_de_passe'];
    $Cmot_de_passe=$_POST['Cmot_de_passe'];

        
        // $mail = new PHPMailer(true);

        

    if ($mot_de_passe==$Cmot_de_passe){
        $ob_utilisateur=new Utilisateur();
    if($ob_utilisateur->saveUtilisateur($typeUser,$nom,$prenom,$email,$mot_de_passe)){

        // try {
        // $mail->isSMTP();
        
        // $mail->Host = 'smtp.gmail.com';  // Remplacez par le serveur SMTP de votre fournisseur d'e-mail
        // $mail->SMTPAuth = true;
        // $mail->Username = 'aliouneg2d@gmail.com'; // Remplacez par votre adresse e-mail
        // $mail->Password = 'fmckxpgqzijcuomk'; // Remplacez par le mot de passe de votre adresse e-mail
        // $mail->SMTPSecure = 'tls';
        // $mail->Port = 587; // Le port SMTP de votre fournisseur d'e-mail

        // // $mail->Host = 'smtp.mmg-beqq.com';  // Remplacez par le serveur SMTP de votre fournisseur d'e-mail
        // // $mail->SMTPAuth = true;
        // // $mail->Username = 'admin@mmg-beqq.com'; // Remplacez par votre adresse e-mail
        // // $mail->Password = 'Oh#izAM-QHJI'; // Remplacez par le mot de passe de votre adresse e-mail
        // // $mail->SMTPSecure = 'tls';
        // // $mail->Port = 465; // Le port SMTP de votre fournisseur d'e-mail

        // $mail->setFrom('aliouneg2d@gmail.com', 'NIMBA');
        // $mail->addAddress($email, $nom);

        // $mail->isHTML(true);
        // $mail->Subject = 'Informations d\'inscription';
        // $mail->Body = 'Cher utilisateur,

        // Vous avez été enregistré avec succès sur notre application. <br> 
        // Voici vos identifiants : <br>
        // Nom d\'utilisateur : ' . $email . ' <br>
        // Mot de passe : ' . $mot_de_passe . ' <br>
        // <br>    
        // Vous pouvez vous connecter en utilisant ces informations. <br>
        // <br>    
        // Cordialement,<br>
        // Administration NIMBA DRAFT SURVEY';

        // // Envoyer l'e-mail
        //     $mail->send();
        //     echo 'E-mail envoyé avec succès';
        // } catch (Exception $e) {
        //     echo 'Erreur lors de l\'envoi de l\'e-mail : ' . $e->getMessage();
        // }
        

        header("location:../?page=liste_personnel&success_insersion");
    }else{
        header("location:../?page=liste_personnel&erreur_insersion");
    }
    }else{
        header("location:../?page=liste_personnel&erreur_insersionmdp");
        // echo "<script>alert(\"les deux mots de passes ne correspondent pas\")</script>";
        
    }
    
}

// traitement connexion
    if(isset($_POST['btn_connexion'])){
        $email=$_POST['email'];
        $mot_de_passe=$_POST['mot_de_passe'];
       if(Utilisateur::verifieUtilisateur($email,$mot_de_passe)){
           header("location:../?page=dashboard");
        // if ($_SESSION["CURRENT_user"]["type"]==='Administrateur' or $_SESSION["CURRENT_user"]["type"]==='Superviseur'){
        //     header("location:../?page=dashboard");
        // }else{
        //     header("location:../?page=listessurveyinitial");
        // }
       }else{
           header("location:../?erreur=connexion");
       }
    }


// modifier utilisateur
if(isset($_POST['btn_modif_utilisateur'])){
    $idUser=$_POST['idUser_modif'];
    $typeUser=$_POST['typeUser_modif'];
    $prenom=$_POST['prenom_modif'];
    $nom=$_POST['nom_modif'];
    $email=$_POST['email_modif'];
    $mot_de_passe=$_POST['mot_de_passe_modif'];
    $ob_utilisateur=new Utilisateur();
    if($ob_utilisateur->ModifUtilisateur($idUser,$nom,$prenom,$email,$mot_de_passe,$typeUser)){
        header("location:../?page=liste_personnel&success_modif");
    }else{
        header("location:../?page=liste_personnel&erreur_modif");
    }
}

// traitement connexion
    // if(isset($_POST['btn_connexion'])){
    //     $email=$_POST['email'];
    //     $mot_de_passe=$_POST['mot_de_passe'];
    //    if(Utilisateur::verifieUtilisateur($email,$mot_de_passe)){
    //        header("location:../?page=dashboard");
    //    }else{
    //        header("location:../?erreur=connexion");
    //    }
    // }

// Activer ou désactiver un utilisateur
if (isset($_GET['idUser']) && isset($_GET['activated'])) {

    //   $idUser = isset($_GET['idUser']) ? $_GET['idUser'] : 0;

    //    $etat = isset($_GET['etat']) ? $_GET['etat'] : 0;
    $idUser = $_GET['idUser'];
    $etat = $_GET['activated'];
    if ($etat == 1){
        $newetat = 0;
    }else{
        $newetat = 1;
    }
    $ob_utilisateur = new Utilisateur();
    $ob_utilisateur->etatUser($newetat,$idUser);
    header('location:../?page=liste_personnel');

    
}

//supression User


if (isset($_GET['idsup'])) {
    $id = $_GET['idsup'];
    $user = new Utilisateur();
    if ($user->delUser($id)) {
        header("location:../model/utilisateur.php");
    } else {
        echo "<script>alert('Erreur lors de la selection!');</script>";
    }
}




?>