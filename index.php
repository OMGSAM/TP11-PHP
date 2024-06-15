<?php
// index.php
include 'db.php';

$sql = "SELECT * FROM etudiant";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$students = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student List</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <?php include 'header.php'; ?>
    <h1>Liste des étudiants</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($students as $student): ?>
        <tr>
            <td><?php echo $student['id']; ?></td>
            <td><?php echo $student['nom']; ?></td>
            <td><?php echo $student['email']; ?></td>
            <td>
                <a href="edit.php?id=<?php echo $student['id']; ?>">Edit</a>
                <a href="delete.php?id=<?php echo $student['id']; ?>">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
