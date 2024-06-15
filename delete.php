<?php
// delete.php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM etudiant WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id' => $id]);

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Student</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <h2>Êtes-vous sûr de vouloir supprimer cet étudiant?</h2>
    <a href="delete.php?id=<?php echo $_GET['id']; ?>">Oui</a>
    <a href="index.php">Non</a>
</body>
</html>
