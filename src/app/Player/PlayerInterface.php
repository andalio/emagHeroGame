<?php

namespace App\Player;

interface PlayerInterface
{
    /**
     * @param $int
     * @return void
     */
    public function setHealth($int): void;

    /**
     * @param $int
     * @return void
     */
    public function setStrength($int): void;

    /**
     * @param $int
     * @return void
     */
    public function setDefence($int): void;

    /**
     * @param $int
     * @return void
     */
    public function setSpeed($int): void;

    /**
     * @param $int
     * @return void
     */
    public function setLuck($int): void;

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return int
     */
    public function getHealth(): int;

    /**
     * @return int
     */
    public function getStrength(): int;

    /**
     * @return int
     */
    public function getDefence(): int;

    /**
     * @return int
     */
    public function getSpeed(): int;

    /**
     * @return int
     */
    public function getLuck(): int;

    /**
     * @return void
     */
    public function showPlayerInfo(): void;
}