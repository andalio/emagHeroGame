<?php

declare(strict_types=1);

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Player\Skills;

final class SkillsTest extends TestCase
{
    protected Skills $skills;

    /**
     * @return void
     */
    protected function setUp(): void
    {
        $this->skills = new Skills();
    }

    /**
     * @return void
     */
    public function testMagicShield()
    {
        $use_skill = $this->skills->magicShield(10, 'Orderus', ['magic_shield' => ['chance_percentage' => 20]]);
        $this->assertSame(5, $use_skill['damage']);
    }

    /**
     * @return void
     */
    public function testRapidStrike()
    {
        $use_skill = $this->skills->rapidStrike(10, 'Orderus', ['rapid_strike' => ['chance_percentage' => 10]]);
        $this->assertSame(20, $use_skill['damage']);
    }

}