<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Choose The Players</title>
    <link rel="stylesheet" href="choose.css">
</head>
<body>
    <div class="container">
        <h1>Choose The Players</h1>
        <form action="fight.php" method="get">
            <label for="player1">Select Player 1:</label>
            <select name="player1" id="player1" required>
                <option value="">-- Choose Pokémon --</option>
                <option value="feu">Pokémon Feu</option>
                <option value="plante">Pokémon Plante</option>
                <option value="eau">Pokémon Eau</option>
                <option value="normal">Pokémon Normal</option>
            </select>

            <label for="player2">Select Player 2:</label>
            <select name="player2" id="player2" required>
                <option value="">-- Choose Pokémon --</option>
                <option value="feu">Pokémon Feu</option>
                <option value="plante">Pokémon Plante</option>
                <option value="eau">Pokémon Eau</option>
                <option value="normal">Pokémon Normal</option>
            </select>

            <button type="submit">Fight!</button>
        </form>
    </div>
</body>
</html>
