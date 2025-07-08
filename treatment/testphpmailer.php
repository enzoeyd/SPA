<?php

$valeur_objet="SPA Haute-Loire Contact";
$valeur_nom_client=$_POST["nom"];
$destinataire=$_POST["mail"];
$valeur_phone=$_POST["phone"];
$valeur_message=$_POST["message"];
$message="<h1>".$valeur_objet."</h1>"."<p>Nom : ".$valeur_nom_client."</p><p>Email : ".$destinataire."</p><p>Téléphone : ".$valeur_phone."</p><p>Message : ".$valeur_message."</p>";



use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';
$mail = new PHPMailer;
try {
    
    /* DONNEES SERVEUR */
    #####################
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.fr';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'accueil@spahauteloire.fr';
    $mail->Password = 'Animaux43,';
    
    /* DONNEES DESTINATAIRES */
    ##########################
    
    $mail->setFrom('accueil@spahauteloire.fr', 'No-Reply');  //adresse de l'expéditeur (pas d'accents)
    $mail->addAddress("spa43accueil@gmail.com", "SPA Haute-Loire");        // Adresse du destinataire 
    
    /* CONTENU DE L'EMAIL*/
    ##########################
    $mail->isHTML(true);                                      // email au format HTML
    $mail->Subject = utf8_decode($valeur_objet);      // Objet du message (éviter les accents là, sauf si utf8_encode)
    $mail->Body    = $message;
    $mail->AltBody = 'Contenu au format texte pour les clients e-mails qui ne le supportent pas'; // ajout facultatif de texte sans balises HTML (format texte)

    $mail->send();
    echo 'Message envoyé.';
    header('Location: ../index.php');
    }
  // si le try ne marche pas > exception ici
  catch (Exception $e) {
    header('Location: ../index.php?erreur=1'); 
  }  


    
?>
