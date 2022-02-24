<?php

namespace App\Player;

use App\Traits\DisplayTrait;

class PlayerBuilder extends Player
{
    use DisplayTrait;

    protected string $type;
    protected string $name;

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->type = $config['type'];
        $this->name = $config['name'];

        $stats = $config['stats'];

        $this->setHealth(rand($stats['health']['min'], $stats['health']['max']));
        $this->setStrength(rand($stats['strength']['min'], $stats['strength']['max']));
        $this->setDefence(rand($stats['defence']['min'], $stats['defence']['max']));
        $this->setSpeed(rand($stats['speed']['min'], $stats['speed']['max']));
        $this->setLuck(rand($stats['luck']['min'], $stats['luck']['max']));
    }

    /**
     * @param $type
     * @return void
     */
    public function setType($type): void
    {
        $this->luck = $type;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return void
     */
    public function showPlayerInfo(): void
    {
        $this->message('<h4>' .
            ucfirst($this->type) . ': ' .
            $this->name . ',
            Health:' . $this->health . ',
            Strength:' . $this->strength . ',
            Defence:' . $this->defence . ',
            Speed:' . $this->speed . ',
            Luck:' . $this->luck . '%
            </h4>');
    }
}