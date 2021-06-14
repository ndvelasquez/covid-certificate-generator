<?php

namespace App\Http\Controllers;

use App\Http\Requests\TestRequest;
use App\Models\Client;
use App\Models\Test;
use Barryvdh\DomPDF\Facade as PDF;
class TestController extends Controller
{
    public function index()
    {
        $tests = Test::latest()->get();

        return view('certificates.index', compact('tests'));
    }

    public function create()
    {
        $clients = Client::orderBy('last_name', 'asc')->get();
        return view('certificates.create', compact('clients'));
    }

    public function store(TestRequest $request)
    {
        Test::create($request->validated());

        return redirect()->route('certificates.index');
    }

    public function generatePdf(Test $test)
    {
        if ($test->test_type == 'antigeno') {
            $pdf = PDF::loadView('reports.antigen', compact('test'));
        }
        else {
            $pdf = PDF::loadView('reports.serologic', compact('test'));
        }

        return $pdf->stream(date('Ymd'). '-' .  $test->client->first_name . '-' . $test->client->last_name . '.pdf');
    }
}
