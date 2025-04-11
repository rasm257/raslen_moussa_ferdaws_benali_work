<?php
    class AttackPokemon{
        public $attackMinimal;
        public $attackMaximal;
        public $specialAttack;
        public $probabilitySpecialAttack;
        public function __construct($attackMinimal, $attackMaximal, $specialAttack, $probabilitySpecialAttack) {
            $this->attackMinimal = $attackMinimal;
            $this->attackMaximal = $attackMaximal;
            $this->specialAttack = $specialAttack;
            $this->probabilitySpecialAttack = $probabilitySpecialAttack;
        }
    }
    
    ?>