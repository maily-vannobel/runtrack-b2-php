<?php

require_once 'class/Grade.php';
require_once 'class/Room.php';
require_once 'class/Floor.php';
require_once 'class/Student.php';

$student = new Student(1, 1, "student1@example.com", "John Doe", new DateTime("2000-01-01"), "Male");

$grade = new Grade(1, 8, "Bachelor 1", new DateTime("2023-01-09"));
$grade = new Grade();

$room = new Room(1, 1, "RDC Food and Drinks", 90);
$room = new Room();

$floor = new Floor(1, "Rez-de-chaussée", 0);
$floor = new Floor();

echo "<strong>Informations de l'élève :</strong><br>" .
    "ID: " . ($student->getId() ?? '') . "<br>" .
    "Grade ID: " . ($student->getGradeId() ?? '') . "<br>" .
    "Nom complet: " . ($student->getFullname() ?? '') . "<br>" .
    "Email: " . ($student->getEmail() ?? '') . "<br>" .
    "Anniversaire: " . ($student->getBirthdate() ? $student->getBirthdate()->format('Y-m-d') : '') . "<br>" .
    "Genre: " . ($student->getGender() ?? '') . "<br><br>";

echo "<strong>Informations du grade :</strong><br>" .
    "Grade 1: " . ($grade->getName() ?? '') . "<br>" .
    "Année: " . ($grade->getYear() ? $grade->getYear()->format('Y-m-d') : '') . "<br><br>";

echo "<strong>Informations de la salle :</strong><br>" .
    "Nom: " . ($room->getName() ?? '') . "<br>" .
    "Capacité: " . ($room->getCapacity() ?? '') . "<br><br>";

echo "<strong>Informations de l'étage :</strong><br>" .
    "Nom: " . ($floor->getName() ?? '') . "<br>" .
    "Étage: " . ($floor->getLevel() ?? '') . "<br><br>";

?>
