<?php
include_once "Pokemon.php";
include_once 'attackPokemon.php';
class PokemonFeu extends Pokemon
{
    public $coef = 1;
    public $type = "Feu";
    public function __construct($name, $hp, $url, $min, $max, $spec, $proba)
    {
        parent::__construct($name, $hp, $url, $min, $max, $spec, $proba);
    }
    public function whoAmI()
    {
        echo "Je suis un Pokemon de type Feu\n";
        parent::whoAmI();
    }
    public function isDead()
    {   
        return $this->getHp()<=0;
    }
    public function setHp($hp){
        parent:: setHp($hp);
    }
    public function setCoef($target)
    {
        if ($target->type == "Normal") {
            return;
        }
        if ($target->type == "Plante") {
            $this->coef = 2;
        } else {
            $this->coef = 0.5;
        }
    }
    public function attack($target)
    {
        $attack = rand($this->attackPokemon->attackMinimal, $this->attackPokemon->attackMaximal);
        if (rand(0, 100) <= $this->attackPokemon->probabilitySpecialAttack) {
            $attack *= $this->attackPokemon->specialAttack;
        }
        $attack *= $this->coef;
        $target->setHp($target->getHp()-$attack);
        return (string) $attack;
    }
}



class PokemonEau extends Pokemon
{
    public $type = "Eau";
    public $coef = 1;
    public function __construct($name, $hp, $url, $min, $max, $special, $proba)
    {
        parent::__construct($name, $hp, $url, $min, $max, $special, $proba);
    }
    public function whoAmI()
    {
        echo "Je suis un Pokemon de type Eau\n";
        parent::whoAmI();
    }
    public function setHp($hp){
        parent::setHp($hp);
    }
    public function isDead()
    {   
        return $this->getHp()<=0;
    }
    public function setCoef($target)
    {
        if ($target->type == "Normal") {
            return;
        }
        if ($target->type == "Feu") {
            $this->coef = 2;
        } else {
            $this->coef = 0.5;
        }
    }
    public function attack($target)
    {
        $attack = rand($this->attackPokemon->attackMinimal, $this->attackPokemon->attackMaximal);
        if (rand(0, 100) <= $this->attackPokemon->probabilitySpecialAttack) {
            $attack *= $this->attackPokemon->specialAttack;
        }
        $attack*= $this->coef;
        $target->setHp($target->getHp() - $attack);
        return (string) $attack;
    }
}
class PokemonPlante extends Pokemon
{
    public $coef = 1;
    public $type = "Plante";
    public function __construct($name, $hp, $url, $min, $max, $special, $proba)
    {
        parent::__construct($name, $hp, $url, $min, $max, $special, $proba);
    }
    public function whoAmI()
    {
        echo "Je suis un Pokemon de type Plante\n";
        parent::whoAmI();
    }
    public function setHp($hp){
        parent::setHp($hp);
    }
    public function isDead()
    {   
        return $this->getHp()<=0;
    }    public function setCoef($target)
    {
        if ($target->type == "Normal") {
            return;
        }
        if ($target->type == "Eau") {
            $this->coef = 2;
        } else {
            $this->coef = 0.5;
        }
    }
    public function attack($target)
    {
        $attack = rand($this->attackPokemon->attackMinimal, $this->attackPokemon->attackMaximal);
        if (rand(0, 100) <= $this->attackPokemon->probabilitySpecialAttack) {
            $attack *= $this->attackPokemon->specialAttack;
        }
        $attack *= $this->coef;
        $target->setHp($target->getHp() - $attack);
        return (string) $attack;
    }
}
?>