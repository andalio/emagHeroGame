<?php

declare(strict_types=1);

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Game\Game;
use App\Player\Player;

final class PlayerTest extends TestCase
{
    protected Game $game;
    protected Player $hero;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $config = include __DIR__ . '/../config.php';

        $this->game = new Game();
        $this->game->createPlayers($config);
    }

    /**
     * @return void
     */
    public function testPlayerHealth()
    {
        $this->assertGreaterThanOrEqual(70, $this->game->hero->getHealth());
        $this->assertLessThan(100, $this->game->hero->getHealth());
    }


}