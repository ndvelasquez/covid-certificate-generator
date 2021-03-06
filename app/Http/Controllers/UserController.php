<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use DateTime;

class UserController extends Controller
{
    public function generateBspPdf(UserRequest $request)
    {
        $user = $request->validated();
        /**
         * Calculo de edad y se añade al array
         * @var number
         */
        $birthDate = new DateTime($request->birthDate);
        $today = new DateTime();
        $age = $today->diff($birthDate);
        $user['age'] = $age->y;
        /**Fin de calculo de edad */
        $user['birthDate'] = Carbon::parse($user['birthDate'])->format('d/m/Y'); //parseo de la fecha a formato español
        $user['testDate'] = Carbon::parse($user['testDate'])->format('d/m/Y'); //parseo de la fecha a formato español
        // dd($user);
        if ($request->testType == 'Antigeno') {
            $pdf = PDF::loadView('reports.antigen', compact('user'));
        }
        else {
            $pdf = PDF::loadView('reports.serologic', compact('user'));
        }

        return $pdf->download(date('Ymd') .'-'. $user['name'] .'-'. $user['lastname'] .'.pdf');
    }

    public function generateNovadermPdf(UserRequest $request)
    {
        $user = $request->validated();
        // $birthDate = new DateTime($request->age);
        // $today = new DateTime();
        // $age = $today->diff($birthDate);
        // $user['age'] = $age->y;
        // if ($request->testType == 'Antigeno') {
        //     $pdf = PDF::loadView('reports.novadermAntigen', compact('user'));
        // }
        // else {
        //     $pdf = PDF::loadView('reports.novadermSerologic', compact('user'));
        // }

        return 'ola k ase';
    }
}
