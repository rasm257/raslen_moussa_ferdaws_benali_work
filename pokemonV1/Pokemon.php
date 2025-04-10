<?php
include "attackPokemon.php";

    class Pokemon{
        public $name;
        public $url;
        public $hp;
        public $attackPokemon;
        public function __construct($name,$hp,$url,$min, $max, $spacial, $proba) {
            $this->name = $name;
            $this->hp=$hp;
            $this->url = $url;
            $this->attackPokemon = new AttackPokemon($min, $max, $spacial, $proba);
        }
        public function getName() {
            return $this->name;
        }
        public function getHp() {
            return $this->hp;
        }   
        public function getUrl() {
            return $this->url;
        }
        public function setHp($hp) {
            $this->hp = $hp;
        }  
        public function setName($name) {
            $this->name = $name;
        } 
        public function isDead() {
            return $this->hp <= 0;
        }
        public function attack($target) {
            $attack = rand($this->attackPokemon->attackMinimal, $this->attackPokemon->attackMaximal);
            if (rand(0, 100) <= $this->attackPokemon->probabilitySpecialAttack) {
                $attack *= $this->attackPokemon->specialAttack;
            }
            $target->setHp($target->getHp() - $attack);
            return (string)$attack;
        }
        public function whoAmI() {
            echo "Name: {$this->name}\n";
            echo "HP: {$this->hp}\n";
            echo "URL: {$this->url}\n";
        }
        public function gagnant($target) {
            if($target->getHp() > $this->hp) {
                return $target; }
            else{
                return $this;
            }
    }
    }

?>