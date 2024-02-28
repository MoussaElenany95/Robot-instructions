<?php

namespace App\Services;

use InvalidArgumentException;

class RobotService
{
    private int $x;
    private int $y;
    /**
     * __construct
     * @param  int  $x
     * @param  int  $y
     */
    public function __construct(int $x = 0, int $y = 0)
    {
        $this->x = $x;
        $this->y = $y;
    }

    /**
     * getX
     * @return int
     */
    public function getX(): int
    {
        return $this->x;
    }

    /**
     * getY
     * @return int
     */
    public function getY(): int
    {
        return $this->y;
    }

    /**
     * move
     * @param  string  $move
     * @return void
     */
    public function move(string $move): void
    {
        $length = strlen($move);
        // Loop through each instruction
        for ($i = 0; $i < $length; $i++) {
            $instruction = $move[$i];
            // Update position based on instruction
            switch ($instruction) {
                case 'F':
                    $this->y += 1;
                    break;
                case 'B':
                    $this->y -= 1;
                    break;
                case 'R':
                    $this->x += 1;
                    break;
                case 'L':
                    $this->x -= 1;
                    break;
                default:
                    throw new InvalidArgumentException("Invalid instruction: $instruction");
                    break;
            }
        }
    }
}
