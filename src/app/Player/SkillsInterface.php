<?php

namespace App\Player;

interface SkillsInterface
{
    /**
     * @param int $damage
     * @param string $name
     * @param array|null $attack_skills
     * @return array|null
     */
    public function rapidStrike(int $damage, string $name, array $attack_skills = null): array|null;

    /**
     * @param int $damage
     * @param string $name
     * @param array|null $defence_skills
     * @return array|null
     */
    public function magicShield(int $damage, string $name, array $defence_skills = null): array|null;
}