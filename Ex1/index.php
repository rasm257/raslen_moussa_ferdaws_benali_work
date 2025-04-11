<?php
include "Etudiant.php";
$etudiants = [
    new Etudiant("Aymen", [11, 13, 18, 7, 10, 13, 2, 5, 1]),
    new Etudiant("Skander", [15, 9, 8, 16])
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage des notes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1 class="text-center">Affichage des notes</h1>
    <div class="container">
        <div class="row">
            <?php foreach ($etudiants as $etudiant): ?>
                <div class="col-6">
                    <div class="etudiant">
                        <div class="containerName">
                            <h1 class="nomEtudiant"><?= $etudiant->nom ?></h1>
                        </div>
                        <?php foreach ($etudiant->notes as $note): ?>
                            <?php
                                // Déterminer la classe de couleur pour la ligne
                                $rowClass = '';
                                if ($note < 10) {
                                    $rowClass = 'bg-danger text-white'; // Rouge pour les notes < 10
                                } elseif ($note == 10) {
                                    $rowClass = 'bg-warning text-dark'; // Orange pour les notes = 10
                                } else {
                                    $rowClass = 'bg-success text-white'; // Vert pour les notes > 10
                                }
                            ?>
                            <div class="row <?= $rowClass ?> p-2 mb-2">
                                <div class="col"><?= $note ?></div>
                            </div>
                        <?php endforeach; ?>
                        <div class="moyenne bg-primary-subtle p-2 mt-2">
                             <?= $etudiant->calculMoy() ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>