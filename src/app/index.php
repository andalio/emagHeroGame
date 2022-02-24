<?php

require __DIR__ . '/../vendor/autoload.php';

$configPath = __DIR__ . '/config.php';
if (is_file($configPath)) {
    $config = include $configPath;
} else {
    die('There is a problem with file: ' . $configPath);
}

use App\Game\Game;

// Init
$game = new Game();

echo '<h2>Start game</h2>';

// Play game
$game->createPlayers($config);

$game->hero->showPlayerInfo();
$game->beast->showPlayerInfo();

// Attacker establish
if ($game->hero->getSpeed() > $game->beast->getSpeed()) {
    $attacker = 'hero';
} elseif ($game->hero->getSpeed() < $game->beast->getSpeed()) {
    $attacker = 'beast';
} else {
    if ($game->hero->getLuck() > $game->beast->getLuck()) {
        $attacker = 'hero';
    } else {
        $attacker = 'beast';
    }
}

for ($i = 1; $i <= $config['game']['max_rounds']; $i++) {

    if ($attacker == 'hero') {
        // attacker -> ( defender )
        $game->battle($game->hero, $game->beast, $i, $config['hero']['attack_skills'], $config['hero']['defence_skills']);

        // Change roles
        $attacker = 'beast';
    } else {
        // attacker -> ( defender )
        $game->battle($game->beast, $game->hero, $i,  $config['hero']['attack_skills'], $config['hero']['defence_skills']);

        // Change roles
        $attacker = 'hero';
    }

}
