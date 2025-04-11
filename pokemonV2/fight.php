<?php
include_once "Pokemon.php";
include_once "Pokemon2.php";
include_once "attackPokemon.php";

$player1 = $_GET['player1'] ?? 'unknown';
$player2 = $_GET['player2'] ?? 'unknown';

function createPokemon(string $type): Pokemon {
    $pokemons = [
        'eau' => fn(): PokemonEau => new PokemonEau("Carabaffe", 200, "https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/008.png", 20, 90, 3, 40),
        'feu' => fn(): PokemonFeu => new PokemonFeu("Salamèche", 200, "https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/004.png", 35, 95, 2, 50),
        'plante' => fn(): PokemonPlante => new PokemonPlante("Herbizarre", 200, "https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/002.png", 30, 80, 3.5, 30),
        'normal' => fn(): Pokemon => new Pokemon("Rondoudou", 250, "https://www.pokemon.com/static-assets/content-assets/cms2/img/pokedex/full/039.png", 20, 80, 2, 25)
    ];

    return $pokemons[$type]();
}

$fighter1 = createPokemon(strtolower($player1));
$fighter2 = createPokemon(strtolower($player2));

// Définir les coefficients si ce sont des types spécialisés
foreach ([[$fighter1, $fighter2], [$fighter2, $fighter1]] as [$fighter, $opponent]) {
    if (method_exists($fighter, 'setCoef')) {
        $fighter->setCoef($opponent);
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body class="container">
    <div class="bg-primary-subtle titre">
        <h3>Les Combattants</h3>
    </div>
    <?php while(!($fighter1->isDead()|| $fighter2->isDead())) : ?>
    <div class="round">
    <div class="row">
        <div class="col fighter">
            <div class="info"><?= $fighter1->getName() ?>: <img src="<?= $fighter1->getUrl() ?>" class="photo"> </div>
            <div class="info">Points: <?= $fighter1->getHp() ?></div>
            <div class="info">Min Attack Points: <?= $fighter1->attackPokemon->attackMinimal ?></div>
            <div class="info">Max Attack Points: <?= $fighter1->attackPokemon->attackMaximal ?></div>
            <div class="info">Special Attack: <?= $fighter1->attackPokemon->specialAttack ?></div>
            <div class="info" style="border: 0px solid red;">Probability Special Attack:
                <?= $fighter1->attackPokemon->probabilitySpecialAttack ?>%</div>
        </div>

        <div class="col fighter">
            <div class="info"><?= $fighter2->getName() ?>: <img src="<?= $fighter2->getUrl() ?>" class="photo"> </div>
            <div class="info">Points: <?= $fighter2->getHp() ?></div>
            <div class="info">Min Attack Points: <?= $fighter2->attackPokemon->attackMinimal ?></div>
            <div class="info">Max Attack Points: <?= $fighter2->attackPokemon->attackMaximal ?></div>
            <div class="info">Special Attack: <?= $fighter2->attackPokemon->specialAttack ?></div>
            <div class="info" style="border: 0px solid red;">Probability Special Attack:
                <?= $fighter2->attackPokemon->probabilitySpecialAttack ?>%</div>
        </div>
    </div>
    <div class="row bg-danger-subtle">
        <div class="col-12 ">Round 1 </div>
        <div class="col bg-secondary-subtle"><?=$fighter1->attack($fighter2)?></div>
        <div class="col bg-secondary-subtle"><?=$fighter2->attack($fighter1)?></div>
    </div>
    </div>
    <?php endwhile; ?>
    <div class="round">
    <div class="row">
        <div class="col fighter">
            <div class="info"><?= $fighter1->getName() ?>: <img src="<?= $fighter1->getUrl() ?>" class="photo"> </div>
            <div class="info">Points: <?= $fighter1->getHp() ?></div>
            <div class="info">Min Attack Points: <?= $fighter1->attackPokemon->attackMinimal ?></div>
            <div class="info">Max Attack Points: <?= $fighter1->attackPokemon->attackMaximal ?></div>
            <div class="info">Special Attack: <?= $fighter1->attackPokemon->specialAttack ?></div>
            <div class="info" style="border: 0px solid red;">Probability Special Attack:
                <?= $fighter1->attackPokemon->probabilitySpecialAttack ?>%</div>
        </div>

        <div class="col fighter">
            <div class="info"><?= $fighter2->getName() ?>: <img src="<?= $fighter2->getUrl() ?>" class="photo"> </div>
            <div class="info">Points: <?= $fighter2->getHp() ?></div>
            <div class="info">Min Attack Points: <?= $fighter2->attackPokemon->attackMinimal ?></div>
            <div class="info">Max Attack Points: <?= $fighter2->attackPokemon->attackMaximal ?></div>
            <div class="info">Special Attack: <?= $fighter2->attackPokemon->specialAttack ?></div>
            <div class="info" style="border: 0px solid red;">Probability Special Attack:
                <?= $fighter2->attackPokemon->probabilitySpecialAttack ?>%</div>
        </div>
    </div>
    <div class="row bg-success p-2 text-dark bg-opacity-50">
        <div class="col-12 ">Le vainqueur est : <img class="photo" src="<?= $fighter1->gagnant($fighter2)->getUrl()?>"> </div>
    </div>
    </div>
</bod>

</html>
