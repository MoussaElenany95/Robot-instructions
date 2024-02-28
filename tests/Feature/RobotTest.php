<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RobotTest extends TestCase
{
   
    /**
     * Test url /robot/movement
     * @return void
     * 
     */
    public function testUserCanCallRobotMovementUrl()
    {
        $response = $this->postJson(route('robot.movement'), ['move' => 'FFRFF']);
        $response->assertStatus(200);
    }

    /**
     * Test url /robot/movement
     * @return void
     * 
     */
    public function testUserCanNotCallRobotMovementUrlWithoutMove()
    {
        $response = $this->postJson(route('robot.movement'), []);
        $response->assertStatus(422);
        $response->assertJson([
            "message" => "The move field is required.",
            "errors" => [
                "move" => [
                    "The move field is required."
                ]
            ]
        ]);
    }

    /**
     * Test url /robot/movement
     * @return void
     * 
     */
    public function testUserCanNotCallRobotMovementUrlWithInvalidMove()
    {
        $response = $this->postJson(route('robot.movement'), ['move' => 'FFRFFG']);
        $response->assertStatus(422);
        $response->assertJson([
            "message" => "The move field must contain only the following characters: F, B, R, L.",
            "errors" => [
                "move" => [
                    "The move field must contain only the following characters: F, B, R, L."
                ]
            ]
        ]);
    }

    /**
     * Test url /robot/movement
     * @return void
     * 
     */
    public function testUserCanMoveRobotForward()
    {
        $response = $this->postJson(route('robot.movement'), ['move' => 'F']);
        $response->assertStatus(200);
        // check if file content is correct
        $this->assertFileExists(storage_path('app/public/robot.txt'));
        $this->assertStringContainsString('F => x=0 y=1', file_get_contents(storage_path('app/public/robot.txt')));
        $response->assertJson([
            "message" => "File generated successfully",
            "file" => "http://localhost/storage/robot.txt"
        ]);
    }

    /**
     * Test url /robot/movement
     * @return void
     * 
     */
    public function testUserCanMoveRobotBackward()
    {
        $response = $this->postJson(route('robot.movement'), ['move' => 'B']);
        $response->assertStatus(200);
        // check if file content is correct
        $this->assertFileExists(storage_path('app/public/robot.txt'));
        $this->assertStringContainsString('B => x=0 y=-1', file_get_contents(storage_path('app/public/robot.txt')));
        $response->assertJson([
            "message" => "File generated successfully",
            "file" => "http://localhost/storage/robot.txt"
        ]);
    }

    /**
     * Test url /robot/movement
     * @return void
     * 
     */
    public function testUserCanMoveRobotLeft()
    {
        $response = $this->postJson(route('robot.movement'), ['move' => 'L']);
        $response->assertStatus(200);
        // check if file content is correct
        $this->assertFileExists(storage_path('app/public/robot.txt'));
        $this->assertStringContainsString('L => x=-1 y=0', file_get_contents(storage_path('app/public/robot.txt')));
        $response->assertJson([
            "message" => "File generated successfully",
            "file" => "http://localhost/storage/robot.txt"
        ]);
    }

    /**
     * Test url /robot/movement
     * @return void
     * 
     */
    public function testUserCanMoveRobotRight()
    {
        $response = $this->postJson(route('robot.movement'), ['move' => 'R']);
        $response->assertStatus(200);
        // check if file content is correct
        $this->assertFileExists(storage_path('app/public/robot.txt'));
        $this->assertStringContainsString('R => x=1 y=0', file_get_contents(storage_path('app/public/robot.txt')));
        $response->assertJson([
            "message" => "File generated successfully",
            "file" => "http://localhost/storage/robot.txt"
        ]);
    }




}
