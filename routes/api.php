<?php

use App\Http\Controllers\RobotController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// move robot
Route::post('/robot/movement', RobotController::class)->name('robot.movement');