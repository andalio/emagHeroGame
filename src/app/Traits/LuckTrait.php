<?php

namespace App\Traits;

trait LuckTrait
{
    /**
     * @param int $percentage
     * @return bool
     */
    public function imLucky(int $percentage): bool
    {
        return match ($percentage) {
            0 => false,
            100 => true,
            default => $this->calculateLuck($percentage)
        };
    }

    /**
     * @param int $percentage
     * @return bool
     */
    private function calculateLuck(int $percentage): bool
    {
        $randomValue = rand(0, 100);

        if ($randomValue <= $percentage) {
            return true;
        } else {
            return false;
        }
    }
}