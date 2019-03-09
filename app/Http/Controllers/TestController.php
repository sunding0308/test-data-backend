<?php

namespace App\Http\Controllers;

use App\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tests = Test::orderBy('date', 'desc')->paginate(10);
        
        return view('index', compact('tests'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        $datas = collect(json_decode($test->datas));

        $durations = $datas->pluck('duration')->map(function ($item, $key) {
            return $item / 1000;
        })->toJson();
        $currents = $datas->pluck('current')->map(function ($item, $key) {
            return intval($item);
        })->toJson();

        return view('show', compact('test', 'durations', 'currents'));
    }
}
