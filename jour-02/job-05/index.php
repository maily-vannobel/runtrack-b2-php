<?php
function find_full_rooms(): array {
    $db = 'lp_official';
    $rooms = [];

    try {
        // Nouvelle instance PDO pour se connecter à la base de données
        $bdd = new PDO("mysql:host=localhost;port=3307;dbname=$db;charset=utf8mb4", 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);

        $stmt = $bdd->prepare('
            SELECT 
                room.name AS room_name,
                room.capacity,
                COUNT(student.id) AS number_of_students,
                CASE WHEN COUNT(student.id) >= room.capacity THEN "Oui" ELSE "Non" END AS is_full
            FROM room
            LEFT JOIN grade ON room.id = grade.room_id
            LEFT JOIN student ON grade.id = student.grade_id
            GROUP BY room.id
        ');

        $stmt->execute();

        $rooms = $stmt->fetchAll();

    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
    }

    return $rooms;
}
$rooms = find_full_rooms();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job-05 (j2)</title>
</head>
<body>
    <h1>État des Salles</h1>

    <table>
        <thead>
            <tr>
                <th>Nom de la Salle</th>
                <th>Capacité</th>
                <th>Nombre d'Étudiants</th>
                <th>Est Pleine ?</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($rooms as $room) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($room['room_name']) . '</td>';
                echo '<td>' . htmlspecialchars($room['capacity']) . '</td>';
                echo '<td>' . htmlspecialchars($room['number_of_students']) . '</td>';
                echo '<td>' . htmlspecialchars($room['is_full']) . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>
</html>