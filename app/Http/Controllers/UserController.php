<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use DateTime;

class UserController extends Controller
{
    public function generateBspPdf(UserRequest $request)
    {
        $user = $request->validated();
        $birthAge = new DateTime($request->age);
        $today = new DateTime();
        $age = $today->diff($birthAge);
        $user['age'] = $age->y;
        if ($request->testType == 'Antigeno') {
            $pdf = PDF::loadView('reports.antigen', compact('user'));
        }
        else {
            $pdf = PDF::loadView('reports.serologic', compact('user'));
        }

        return $pdf->download(date('Ymd'). '-' .  $request->name . '-' . $request->lastname . '.pdf');
    }

    public function generateNovadermPdf(UserRequest $request)
    {
        $user = $request->validated();
        $birthAge = new DateTime($request->age);
        $today = new DateTime();
        $age = $today->diff($birthAge);
        $user['age'] = $age->y;
        if ($request->testType == 'Antigeno') {
            $pdf = PDF::loadView('reports.novadermAntigen', compact('user'));
        }
        else {
            $pdf = PDF::loadView('reports.novadermSerologic', compact('user'));
        }

        return $pdf->download(date('Ymd'). '-' .  $request->name . '-' . $request->lastname . '.pdf');
    }
}
