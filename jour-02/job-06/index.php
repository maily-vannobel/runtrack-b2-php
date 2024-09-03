<?php
function find_ordered_students(): array {
    $db = 'lp_official';
    $students = [];

    try {
        // Nouvelle instance PDO pour se connecter à la base de données
        $bdd = new PDO("mysql:host=localhost;port=3307;dbname=$db;charset=utf8mb4", 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
        ]);

        // Requête SQL pour obtenir les promotions et leurs étudiants, triées par taille de promotion
        $stmt = $bdd->prepare('
            SELECT 
                grade.name AS grade_name,
                student.id AS student_id,
                student.fullname AS student_fullname,
                student.email AS student_email,
                student.birthdate AS student_birthdate,
                student.grade_id,
                COUNT(student.id) OVER (PARTITION BY grade.id) AS student_count
            FROM grade
            LEFT JOIN student ON grade.id = student.grade_id
            ORDER BY student_count DESC, grade.name
        ');

        $stmt->execute();

        $students = $stmt->fetchAll();

    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
    }

    return $students;
}

$students = find_ordered_students();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job-06 (j2)</title>
</head>
<body>
    <h1>Liste des Étudiants par Promotion</h1>

    <table>
        <thead>
            <tr>
                <th>Nom de la Promotion</th>
                <th>ID Étudiant</th>
                <th>Nom Complet de l'Étudiant</th>
                <th>Email de l'Étudiant</th>
                <th>Date de Naissance</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
            <tr>
                <td><?= htmlspecialchars($student['grade_name']) ?></td>
                <td><?= htmlspecialchars($student['student_id']) ?></td>
                <td><?= htmlspecialchars($student['student_fullname']) ?></td>
                <td><?= htmlspecialchars($student['student_email']) ?></td>
                <td><?= htmlspecialchars($student['student_birthdate']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>