<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
final class SendMail
{
     function send($email, $name, $message) {
        // Envoi de l'e-mail
        require './vendor/autoload.php'; // Charger l'autoloader de Composer pour PHPMailer

        // Récupérer les données du formulaire
       

        // Créer une nouvelle instance de PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Configurer le serveur SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->Username = 'votre_email@gmail.com'; // Adresse e-mail de l'expéditeur
            $mail->Password = 'votre_mot_de_passe'; // Mot de passe de l'e-mail de l'expéditeur

            // Définir l'expéditeur et le destinataire
            $mail->setFrom($email, $name); // Adresse e-mail de l'expéditeur
            $mail->addAddress('manulol1995@gmail.com'); // Adresse e-mail du destinataire
            $mail->Subject = 'Nouveau message de ' . $name; // Sujet de l'e-mail
            $mail->Body = $message; // Contenu de l'e-mail

            // Envoyer l'e-mail
            $mail->send();
            echo "Le formulaire a été envoyé avec succès";

        } catch (Exception $e) {
            // Attraper les exceptions et afficher un message d'erreur
            echo "Erreur lors de l'envoi de l'e-mail : ", $mail->ErrorInfo;
        }
    }
}
