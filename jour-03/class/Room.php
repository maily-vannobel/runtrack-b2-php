<?php

class Room {
    private ?int $id;
    private ?int $floor_id;
    private ?string $name;
    private ?int $capacity;


     public function __construct( ?int $id = null, 
                                 ?int $floor_id = null,
                                 ?string $name = null, //soit string soit null
                                 ?int $capacity = null) //soit int soit null
                            
        {
           $this->id = $id; 
           $this->floor_id = $floor_id; 
           $this->name = $name; 
           $this->capacity = $capacity; 

        }
        public function getId(): ?int {
            return $this->id;
        }
    
        public function getFloorId(): ?int {
            return $this->floor_id;
        }
    
        public function getName(): ?string {
            return $this->name;
        }
    
        public function getCapacity(): ?int {
            return $this->capacity;
        }
    }
    ?>
    }
