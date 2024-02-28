<?php

namespace Tests\Unit;

use App\Services\FileGeneratorService;
use App\Services\RobotService;
use PHPUnit\Framework\TestCase;

class RobotTest extends TestCase
{
    /**
     * Test robot move
     * @return void
     * 
     */
    public function testRobotMove()
    {
        $robot = new RobotService();
        $robot->move('FFRFF');
        $this->assertEquals(1, $robot->getX());
        $this->assertEquals(4, $robot->getY());
    }

    /**
     * Test robot move
     * @return void
     * 
     */
    public function testRobotMoveBackwards()
    {
        $robot = new RobotService();
        $robot->move('FFRFFB');
        $this->assertEquals(1, $robot->getX());
        $this->assertEquals(3, $robot->getY());
    }

    /**
     * Test robot move
     * @return void
     * 
     */
    public function testRobotMoveLeft()
    {
        $robot = new RobotService();
        $robot->move('FFRFFBL');
        $this->assertEquals(0, $robot->getX());
        $this->assertEquals(3, $robot->getY());
    }

    /**
     * Test robot move
     * @return void
     * 
     */
    public function testRobotMoveRight()
    {
        $robot = new RobotService();
        $robot->move('FFRFFBLR');
        $this->assertEquals(1, $robot->getX());
        $this->assertEquals(3, $robot->getY());
    }

    /**
     * Test robot move
     * @return void
     * 
     */
    public function testRobotMoveInvalid()
    {
        $robot = new RobotService();
        $this->expectException(\InvalidArgumentException::class);
        $robot->move('FFRFFBLRG');
    }




}
