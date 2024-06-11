<?php
session_start();
// Charger l'autoloader de Composer pour PHPMailer
require './vendor/autoload.php';

// Utiliser les classes PHPMailer et Exception
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Récupérer les données du formulaire (vous devrez les définir)
$email = $_SESSION['mail'];
$name = $_SESSION['name'];
$message = $_SESSION['message'];

// Créer une nouvelle instance de PHPMailer
$mail = new PHPMailer(true);

try {
    // Configurer le serveur SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    $mail->Username = "carenjot.manu@gmail.com"; // Adresse e-mail de l'expéditeur
    $mail->Password = "aaix yuat wgwy gfhe"; // Mot de passe de l'e-mail de l'expéditeur

    // Définir l'expéditeur et le destinataire
    $mail->setFrom($email, $name); // Adresse e-mail de l'expéditeur
    $mail->addAddress('carenjot.je@gmail.com'); // Adresse e-mail du destinataire
    $mail->Subject = "Nouveau message de $name"; // Sujet de l'e-mail
    $mail->Body = "Nom: $name\nE-mail: $email\nMessage: $message"; // Contenu de l'e-mail

    // Envoyer l'e-mail
    $mail->send();
    echo "Le formulaire a été envoyé avec succès";

} catch (Exception $e) {
    // Attraper les exceptions et afficher un message d'erreur
    echo "Erreur lors de l'envoi de l'e-mail : ", $mail->ErrorInfo;
}
