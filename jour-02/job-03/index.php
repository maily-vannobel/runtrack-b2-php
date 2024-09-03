<?php
function insert_student(string $email, 
                        string $fullname,
                        string $gender,
                        DateTime $birthdate,
                        int $gradeId): void {
    $db = 'lp_official';
    $students = [];

    try {
        // nouvelle instance PDO > connexion à la bdd
        $bdd = new PDO("mysql:host=localhost;port=3307;dbname=$db;charset=utf8mb4", 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,  
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, 
        ]);
        
        $stmt = $bdd->prepare('INSERT INTO student (email, fullname, gender, birthdate, grade_id) VALUES (:email, :fullname, :gender, :birthdate, :grade_id)');

        // Exécution de la requête préparée avec les paramètres fournis
        $stmt->execute([
            ':email' => $email,
            ':fullname' => $fullname,
            ':gender' => $gender,
            ':birthdate' => $birthdate->format('Y-m-d'),
            ':grade_id' => $gradeId
        ]);

        echo "Étudiant ajouté avec succès.";
        
    } catch (PDOException $e) {
        // Gestion des erreurs de connexion ou d'exécution de la requête
        echo 'Erreur de connexion : ' . $e->getMessage();
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_POST['input-email'], $_POST['input-fullname'], $_POST['input-gender'], $_POST['input-birthdate'], $_POST['input-grade_id'])
    ) {
        $email = $_POST['input-email'];
        $fullname = $_POST['input-fullname'];
        $gender = $_POST['input-gender'];
        $birthdate = DateTime::createFromFormat('Y-m-d', $_POST['input-birthdate']);
        $gradeId = (int)$_POST['input-grade_id'];

        insert_student($email, $fullname, $gender, $birthdate, $gradeId);
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job-03 (j2) </title>
</head>
<body>
    <h1>Ajouter un étudiant  </h1>
    
    <form method="post">
        <label for="input-email">Adresse e-mail :</label>
        <input type="email" id="input-email" name="input-email" required> <br>

        <label for="input-fullname">Nom Complet :</label>
        <input type="text" id="input-fullname" name="input-fullname" required> <br>

        <label for="input-gender">Genre :</label>
        <select id="input-gender" name="input-gender" required>
            <option value="male">Homme</option>
            <option value="female">Femme</option>
        </select> <br>

        <label for="input-birthdate">Date de Naissance :</label>
        <input type="date" id="input-birthdate" name="input-birthdate" required> <br>

        <label for="input-grade_id">ID de la Classe :</label>
        <input type="number" id="input-grade_id" name="input-grade_id" required> <br>

        <button type="submit">Ajouter l'étudiant</button>
    </form>
</body>
</html>