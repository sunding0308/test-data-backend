<?php

namespace App\Http\Controllers\Api;

use App\Test;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function uploadData(Request $request)
    {
        $test = Test::create([
            'device' => $request->device,
            'date' => $request->date,
            'type' => $request->testType,
            'cycle' => $request->testCycle,
            'level' => $request->level,
        ]);

        $test->datas()->createMany($request->datas);
        
        return response()->json(['status' => 'success']);
    }
}
