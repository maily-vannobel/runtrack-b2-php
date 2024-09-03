<?php
function find_all_students(): array {
    $host = 'localhost';
    $db = 'lp_official';
    $students = [];

    try {
        // nouvelle instance PDO > connexion à la bdd
        $bdd = new PDO("mysql:host=$host;port=3307;dbname=$db;charset=utf8mb4", 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
        ]);
        
        $stmt = $bdd->prepare('SELECT * FROM student');
        $stmt->execute();

        $students = $stmt->fetchAll();

    } catch (PDOException $e) {
        // Gestion des erreurs de connexion ou d'exécution de la requête
        echo 'Erreur de connexion : ' . $e->getMessage();
    }

    // Retourner le tableau des étudiants
    return $students;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job-01 (j2)</title>
</head>
<body>
    <h1>Tableau des élèves</h1>
    <table >
        <thead> 
            <tr>
                <th>ID</th>
                <th> Classe(id) </th>
                <th>Email</th>
                <th>Nom Complet</th>
                <th>Date de Naissance</th>
                <th>Genre</th>
            </tr>
        </thead>
        <tbody>

            <?php
            $students = find_all_students();

            foreach ($students as $student) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($student['id']) . '</td>';
                echo '<td>' . htmlspecialchars($student['grade_id']) . '</td>';
                echo '<td>' . htmlspecialchars($student['email']) . '</td>';
                echo '<td>' . htmlspecialchars($student['fullname']) . '</td>';
                echo '<td>' . htmlspecialchars($student['birthdate']) . '</td>';
                echo '<td>' . htmlspecialchars($student['gender']) . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>
