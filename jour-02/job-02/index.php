<?php
function find_one_student(string $email): array {
    $db = 'lp_official';
    $students = [];

    try {
        // nouvelle instance PDO > connexion à la bdd
        $bdd = new PDO("mysql:host=localhost;port=3307;dbname=$db;charset=utf8mb4", 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
        ]);
        
        $stmt = $bdd->prepare('SELECT * FROM student WHERE email = :email');
        $stmt->execute([':email' => $email]);
        
        $student = $stmt->fetch ();
    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
    }

    return $student ? $student : [];
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job-02 (j2) </title>
</head>
<body>
    <h1>Recherche d'un étudiant (avec mail exact) </h1>
    
    <form method="get">
        <label for="input-email-student">Email de l'étudiant :</label>
        <input type="text" id="input-email-student" name="input-email-student" required>
        <button type="submit">Rechercher</button>
    </form>

    <?php
    // Vérifier si le formulaire a été soumis et qu'un email a été fourni
    if (isset($_GET['input-email-student'])) {
        $email = $_GET['input-email-student'];
        $student = find_one_student($email);

        if (!empty($student)) {
            echo '<h2>Informations de l\'étudiant</h2>';
            echo '<p>ID: ' . htmlspecialchars($student['id']) . '</p>';
            echo '<p>Classe (ID): ' . htmlspecialchars($student['grade_id']) . '</p>';
            echo '<p>Email: ' . htmlspecialchars($student['email']) . '</p>';
            echo '<p>Nom Complet: ' . htmlspecialchars($student['fullname']) . '</p>';
            echo '<p>Date de Naissance: ' . htmlspecialchars($student['birthdate']) . '</p>';
            echo '<p>Genre: ' . htmlspecialchars($student['gender']) . '</p>';
        } else {
            echo '<p>Aucun étudiant trouvé avec cet email.</p>';
        }
    }
    ?>
</body>
</html>