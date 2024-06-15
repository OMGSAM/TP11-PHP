<?php
// edit.php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM etudiant WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);
    $student = $stmt->fetch(PDO::FETCH_ASSOC);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $email = $_POST['email'];

    $sql = "UPDATE etudiant SET nom = :nom, email = :email WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nom' => $nom, 'email' => $email, 'id' => $id]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <form method="POST" action="edit.php">
        <input type="hidden" name="id" value="<?php echo $student['id']; ?>">
        <label>Nom:</label>
        <input type="text" name="nom" value="<?php echo $student['nom']; ?>" required>
        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $student['email']; ?>" required>
        <button type="submit">Mettre à jour</button>
    </form>
</body>
</html>
