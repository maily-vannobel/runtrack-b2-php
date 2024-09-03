<?php
function find_all_students_grades(): array {
    $db = 'lp_official';
    $students = [];

    try {
        // nouvelle instance PDO > connexion à la bdd
        $bdd = new PDO("mysql:host=localhost;port=3307;dbname=$db;charset=utf8mb4", 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
        ]);
        
        $stmt = $bdd->prepare('SELECT student.email, student.fullname, grade.name AS grade_name FROM student JOIN grade ON student.grade_id = grade.id');
        $stmt->execute();

        $students = $stmt->fetchAll();

    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
    }

    return $students;
}

$students = find_all_students_grades();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job-04 (j2) </title>
</head>
<body>
    <h1>Notes des étudiants </h1>
    
<!-- Tableau pour afficher les résultats -->
<table >
        <thead>
            <tr>
                <th>Email</th>
                <th>Nom Complet</th>
                <th>Promotion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($students as $student) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($student['email']) . '</td>';
                echo '<td>' . htmlspecialchars($student['fullname']) . '</td>';
                echo '<td>' . htmlspecialchars($student['grade_name']) . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>