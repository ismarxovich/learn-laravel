<?php

namespace App\Http\Controllers;

class MVCTestController extends Controller
{
    public function getData()
    {
        return view('mvc', ['data' => ['test' => 'data', 'test2' => 'data2']]);
    }
}
