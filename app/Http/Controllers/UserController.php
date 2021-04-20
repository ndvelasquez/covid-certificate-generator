<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use DateTime;

class UserController extends Controller
{
    public function generatePdf(Request $request)
    {
        $user = $request->all();
        // dd($request->age);
        $birthAge = new DateTime($request->age);
        $today = new DateTime();
        $age = $today->diff($birthAge);
        $user['age'] = $age->y;
        // dd($user);
        if ($request->testType == 'Antigeno') {
            $pdf = PDF::loadView('reports.antigen', compact('user'));
        }
        else {
            $pdf = PDF::loadView('reports.serologic', compact('user'));
        }

        return $pdf->download(date('Ymd'). '-' .  $request->name . '-' . $request->lastname . '.pdf');
    }
}
