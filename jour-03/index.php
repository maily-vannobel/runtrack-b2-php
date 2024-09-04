<?php
require_once 'class/Student.php';

//instances de 'Student' avec valeurs par défaut puis choisies
$student1 = new Student();  
$student2 = new Student(1, 2, "student2@example.com", "Alice Smith", new DateTime('2000-05-15'), "female");

echo "Student 1: ID = " . $student1->getId() . ", Grade ID = " . $student1->getGradeId() . ", Email = " . $student1->getEmail() . ", Fullname = " . $student1->getFullname() . ", Birthdate = " . $student1->getBirthdate()->format('Y-m-d') . ", Gender = " . $student1->getGender() . "<br>";
echo "Student 2: ID = " . $student2->getId() . ", Grade ID = " . $student2->getGradeId() . ", Email = " . $student2->getEmail() . ", Fullname = " . $student2->getFullname() . ", Birthdate = " . $student2->getBirthdate()->format('Y-m-d') . ", Gender = " . $student2->getGender() . "<br>";

?>
