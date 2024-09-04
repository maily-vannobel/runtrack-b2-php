<?php

class Student {
    // Déclaration des propriétés privées
    private int $id;
    private int $grade_id;
    private string $email;
    private string $fullname;
    private DateTime $birthdate;
    private string $gender;

    // Création constructeur
    public function __construct(int $id = 0, int $grade_id = 0, string $email = "", string $fullname = "", DateTime $birthdate = null, string $gender = "") {
        $this->id = $id;
        $this->grade_id = $grade_id;
        $this->email = $email;
        $this->fullname = $fullname;
        $this->birthdate = $birthdate ?? new DateTime(); 
    }

    // GETTERS ET SETTERS
    public function getId(): int {
        return $this->id;
    }

    public function getGradeId(): int {
        return $this->grade_id;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getFullname(): string {
        return $this->fullname;
    }

    public function getBirthdate(): DateTime {
        return $this->birthdate;
    }

    public function getGender(): string {
        return $this->gender;
    }
}