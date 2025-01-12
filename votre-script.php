<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'D:/xwamp/htdocs/CONTACTE_US/lib/PHPMailer-master/src/Exception.php';
require 'D:/xwamp/htdocs/CONTACTE_US/lib/PHPMailer-master/src/PHPMailer.php';
require 'D:/xwamp/htdocs/CONTACTE_US/lib/PHPMailer-master/src/SMTP.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer et sécuriser les données du formulaire
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); // Nettoyer l'e-mail
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Créer une instance de PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuration du serveur SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Serveur SMTP de Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'mohamedkhechai2024@gmail.com'; // Remplacez par votre e-mail Gmail
        $mail->Password = 'fatma8364'; // Remplacez par votre mot de passe Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Chiffrement TLS
        $mail->Port = 587; // Port SMTP pour Gmail

        // Destinataires
        $mail->setFrom($email, $name); // Expéditeur
        $mail->addAddress('mohamedkhechai2024@gmail.com'); // Destinataire

        // Contenu de l'e-mail
        $mail->isHTML(false); // Format texte brut
        $mail->Subject = "Nouveau message de contact : $subject";
        $mail->Body = "Vous avez reçu un nouveau message de contact.\n\n"
            . "Nom : $name\n"
            . "E-mail : $email\n"
            . "Objet : $subject\n"
            . "Message :\n$message\n";

        // Envoyer l'e-mail
        $mail->send();
        echo "Votre message a été envoyé avec succès !";
    } catch (Exception $e) {
        echo "Une erreur s'est produite lors de l'envoi du message : {$mail->ErrorInfo}";
    }
}
?>