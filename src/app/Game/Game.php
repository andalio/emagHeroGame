<?php

namespace App\Game;

use App\Player\Beast;
use App\Player\Hero;
use App\Player\PlayerBuilder;
use App\Player\PlayerInterface;
use App\Player\Skills;
use App\Traits\DisplayTrait;
use App\Traits\LuckTrait;

class Game implements GameInterface
{
    use DisplayTrait, LuckTrait;

    public PlayerInterface $hero;
    public PlayerInterface $beast;

    /**
     * @param array $config
     * @return void
     */
    public function createPlayers(array $config)
    {
        $this->hero = new PlayerBuilder($config['hero']);
        $this->beast = new PlayerBuilder($config['beast']);
    }

    /**
     * @param PlayerInterface $attacker
     * @param PlayerInterface $defender
     * @param $round
     * @param $attack_skills
     * @param $defence_skills
     * @return void
     */
    public function battle(PlayerInterface $attacker, PlayerInterface $defender, $round, $attack_skills = null, $defence_skills = null): void
    {
        $skills = new Skills();

        // Defender status
        $health = $defender->getHealth();

        // Init lucky status
        $lucky = 0;

        // Display the round number
        echo '<h3><br>Round ' . $round . ' &#x25BC;</h3>';

        // If defender is lucky the Attacker miss the hit
        if (!$this->imLucky($defender->getLuck())) {

            // Calculate damage
            $damage = $attacker->getStrength() - $defender->getDefence();

            //  magicShield Skill
            if ($defender->getType() == 'hero') {
                $use_skill = $skills->magicShield($damage, $defender->getName(), $defence_skills);
                if ($use_skill['damage']) {
                    $damage = $use_skill['damage'];
                    $this->message($use_skill['msg']);
                }
            }

            // rapidStrike Skill
            if ($attacker->getType() == 'hero') {
                $use_skill = $skills->rapidStrike($damage, $attacker->getName(), $attack_skills);
                if ($use_skill['damage']) {
                    $damage = $use_skill['damage'];
                    $this->message($use_skill['msg']);
                }
            }

            // Change defender Health
            $defender->setHealth($health - $damage);
        } else {
            $damage = 0;
            $lucky = 1;
        }

        $this->message('<font color=#F00><b>Damage: </b>' . ($damage ? $damage : '0') . ($lucky ? ', defender was lucky' : '') . '</font><br><br>');
        $this->message('<b>Attacker:</b> ' . $attacker->getName() . ' - <b>Health:</b> ' . $attacker->getHealth() . '<br>');
        $this->message('<b>Defender:</b> ' . $defender->getName() . ' - <b>Health:</b> ' . ($defender->getHealth() >= 0 ? $defender->getHealth() : 0) . '<br>');

        // Game over
        if ($this->gameOver($attacker, $defender, $round)) {

            $this->message('<h2>Game Over</h2>');

            // Find the winner
            if ($defender->getHealth() <= 0) {
                $winner = $attacker;
            } elseif ($attacker->getHealth() <= 0) {
                $winner = $defender;
            } elseif ($round == 20) {
                if ($defender->getHealth() > $attacker->getHealth()) {
                    $winner = $defender;
                } else {
                    $winner = $attacker;
                }
            }

            // Show winner
            $this->message('<h3>The WINNER is ' . $winner->getName() . '</h3>');
            exit;
        }

    }

    /**
     * @param PlayerInterface $attacker
     * @param PlayerInterface $defender
     * @param $round
     * @return bool
     */
    public function gameOver(PlayerInterface $attacker, PlayerInterface $defender, $round): bool
    {
        if($defender->getHealth() <= 0 || $attacker->getHealth() <= 0 || $round == 20){
            return true;
        } else {
            return false;
        }
    }

}
