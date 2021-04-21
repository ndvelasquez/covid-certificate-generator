<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home ()
    {
        return view('welcome');
    }

    public function dermanova ()
    {
        return view('dermanovaReport');
    }

    public function medical ()
    {
        return view('bspReport');
    }
}
