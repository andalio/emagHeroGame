<?php

namespace App\Player;

abstract class Player implements PlayerInterface
{

    protected string $name;
    protected int $health;
    protected int $strength;
    protected int $defence;
    protected int $speed;
    protected int $luck;

    /**
     * @param $int
     * @return void
     */
    public function setHealth($int): void
    {
        $this->health = (int)$int;
    }

    /**
     * @param $int
     * @return void
     */
    public function setStrength($int): void
    {
        $this->strength = (int)$int;
    }

    /**
     * @param $int
     * @return void
     */
    public function setDefence($int): void
    {
        $this->defence = (int)$int;
    }

    /**
     * @param $int
     * @return void
     */
    public function setSpeed($int): void
    {
        $this->speed = (int)$int;
    }

    /**
     * @param $int
     * @return void
     */
    public function setLuck($int): void
    {
        $this->luck = (int)$int;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getHealth(): int
    {
        return $this->health;
    }

    /**
     * @return int
     */
    public function getStrength(): int
    {
        return $this->strength;
    }

    /**
     * @return int
     */
    public function getDefence(): int
    {
        return $this->defence;
    }

    /**
     * @return int
     */
    public function getSpeed(): int
    {
        return $this->speed;
    }

    /**
     * @return int
     */
    public function getLuck(): int
    {
        return $this->luck;
    }
}
