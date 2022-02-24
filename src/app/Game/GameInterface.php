<?php

namespace App\Game;

use App\Player\PlayerInterface;

interface GameInterface
{
    /**
     * @param array $config
     */
    public function createPlayers(array $config);

    /**
     * @param PlayerInterface $attacker
     * @param PlayerInterface $defender
     * @param int $round
     * @param array|null $attack_skills
     * @param array|null $defence_skills
     * @return void
     */
    public function battle(PlayerInterface $attacker, PlayerInterface $defender, int $round, array $attack_skills = null, array $defence_skills = null): void;

    /**
     * @param PlayerInterface $attacker
     * @param PlayerInterface $defender
     * @param $round
     * @return bool
     */
    public function gameOver(PlayerInterface $attacker, PlayerInterface $defender, $round): bool;
}