<?php

namespace App\Http\Controllers;

use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
        $tests = Test::latest()->get();

        return view('tests.index');
    }

    public function create()
    {
        return view('tests.create');
    }

    public function store(Request $request)
    {
        Test::create($request->all());

        return redirect()->route('tests.index');
    }
    
}
