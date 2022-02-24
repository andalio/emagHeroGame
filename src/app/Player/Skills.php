<?php

namespace App\Player;

use App\Traits\DisplayTrait;

class Skills implements SkillsInterface
{
    use DisplayTrait;

    /**
     * Rapid Strike Skill
     *
     * @param int $damage
     * @param string $name
     * @param $attack_skills
     * @return array|null
     */
    public function rapidStrike(int $damage, string $name, $attack_skills = null): array|null
    {
        if (rand(0, 100) <= $attack_skills['rapid_strike']) {
            return [
                'damage' => $damage * 2,
                'msg' => '<span style="color:#2196f3">&raquo; Rapid Strike used by ' . $name . '.</span><br><br>'
            ];
        } else {
            return null;
        }
    }

    /**
     * Magic Shield Skill
     *
     * @param int $damage
     * @param string $name
     * @param array|null $defence_skills
     * @return array|null
     */
    public function magicShield(int $damage, string $name, array $defence_skills = null): array|null
    {
        if (rand(0, 100) <= $defence_skills['magic_shield']) {
            return [
                'damage' => (int)round($damage / 2),
                'msg' => '<span style="color:#8bc34a">&raquo; Magic Shiled used by ' . $name . '.</span><br><br>'
            ];
        } else {
            return null;
        }
    }

}
