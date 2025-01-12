<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="votre-script.php" method="POST">
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" required>
      
        <label for="email">E-mail :</label>
        <input type="email" id="email" name="email" required>
      
        <label for="subject">Objet :</label>
        <select id="subject" name="subject" required>
          <option value="" disabled selected>Sélectionnez une option</option>
          <option value="support">Support technique</option>
          <option value="sales">Demande commerciale</option>
          <option value="partnership">Partenariat</option>
          <option value="feedback">Feedback ou suggestion</option>
          <option value="other">Autre</option>
        </select>
      
        <label for="message">Message :</label>
        <textarea id="message" name="message" rows="5" required></textarea>
      
        <button type="submit">Envoyer</button>
      </form>
</body>
</html>