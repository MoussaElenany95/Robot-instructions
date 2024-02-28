<?php

namespace App\Http\Controllers;

use App\Http\Requests\MoveRobotRequest;
use App\Services\FileGeneratorService;
use App\Services\RobotService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RobotController extends Controller
{
    /**
     * __invoke
     * @param  MoveRobotRequest  $request
     * @return JsonResponse
     */
    public function __invoke(MoveRobotRequest $request): JsonResponse
    {
        // Create a new robot
        $robot = new RobotService();
        // Move the robot
        $robot->move($request->move);

        // Generate file with robot's final position
        $file = FileGeneratorService::generateFile($request->move, $robot->getX(), $robot->getY());

        // Return response
        return response()->json([
            'message' => 'File generated successfully', 
            'file'    =>  asset($file)
        ]);
    }
}
