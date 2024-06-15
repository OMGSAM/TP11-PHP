<?php
// create.php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $email = $_POST['email'];

    $sql = "INSERT INTO etudiant (nom, email) VALUES (:nom, :email)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nom' => $nom, 'email' => $email]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Student</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <form method="POST" action="create.php">
        <label>Nom:</label>
        <input type="text" name="nom" required>
        <label>Email:</label>
        <input type="email" name="email" required>
        <button type="submit">Créer</button>
    </form>
</body>
</html>
