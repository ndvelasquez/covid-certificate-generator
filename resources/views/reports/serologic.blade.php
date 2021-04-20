<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- Tailwind CSS --}}
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

        <style>
            * {
                margin: 0;
                padding: 0;
            }
        </style>

        <title>reporte de toma de prueba covid-19</title>

    </head>
    <body class="bg-cover" style="background-image: url({{ public_path('images/template.png') }})">
        <div class="px-8 mt-20">
            <img class="w-48 h-16 mb-6" src="{{ public_path('images/minsa.png') }}" alt="">
            <p class="text-sm text-left">Autorizado por: Ministerio de salud del Perú</p>
            <p class="text-xs text-left">Ipress: 0026511</p>
            <table class="table-fixed w-full text-sm my-2">
                <tr>
                    <td>PACIENTE: {{ $user['name'] }} {{ $user['lastname'] }}</td>
                    <td class="text-right"><strong>FECHA:</strong> {{ date("d/m/Y") }}</td>
                </tr>
                <tr>
                    <td>
                        DNI/CE/OTRO: {{ $user['dni'] }}
                        @if ($user['passport'] != null)
                            <br>PASAPORTE:<br>
                            {{ $user['passport'] }}
                        @endif
                    </td>
                    <td class="text-right"><strong>SEXO:</strong> {{ $user['gender'] }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td class="text-right"><strong>EDAD:</strong> {{ $user['age'] }}</td>
                </tr>
            </table>

            <p class="text-center text-md font-bold">INMUNOBIOQUIMICA</p>
            <p class="text-center text-md font-bold">DETECCION DE ANTICUERPOS IGM / IGG DEL SARS COV 2</p>

            <table class="table-fixed w-full my-4">
                <tr>
                    <td class="border text-sm text-center font-bold" style="border-color: black">
                        Examen
                    </td>
                    <td class="border text-sm text-center font-bold" style="border-color: black">
                        Resultado
                    </td>
                </tr>
                <tr>
                    <td class="text-sm font-bold">SARS COV 2, ANTICUERPOS-IGM (COVID 19) Inmunocromatografía</td>
                    <td class="text-md font-bold text-center uppercase" style="color: red">{{ $user['result'] }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td class="text-sm font-bold">SARS COV 2, ANTICUERPOS-IGG (COVID 19) Inmunocromatografía</td>
                    <td class="text-md font-bold text-center uppercase" style="color: red">{{ $user['result'] }}</td>
                </tr>
            </table>
            <table class="table-fixed w-full my-8">
                <tr>
                    <td colspan="3" class="text-md font-bold text-center" style="color: red">CUADRO PARA INTERPRETACION POR EL MEDICO TRATANTE</td>
                </tr>
                <tr>
                    <td colspan="2" class="border text-sm font-bold text-center" style="border-color: black">Resultado de anticuerpos</td>
                    <td rowspan="2" class="border text-center text-sm font-bold" style="border-color: black">Significado clínico</td>
                </tr>
                <tr>
                    <td class="border text-sm text-center font-bold" style="border-color: black; color: red">IgM</td>
                    <td class="border text-sm text-center font-bold" style="border-color: black; color: red">IgG</td>
                </tr>
                <tr>
                    <td class="border text-center text-sm font-bold uppercase" style="border-color: black">negativo</td>
                    <td class="border text-center text-sm font-bold uppercase" style="border-color: black">negativo</td>
                    <td class="border text-sm" style="border-color: black">Paciente puede estar en periodo de ventana o no ha sido expuesto</td>
                </tr>
                <tr>
                    <td class="border text-center text-sm font-bold uppercase" style="border-color: black">positivo</td>
                    <td class="border text-center text-sm font-bold uppercase" style="border-color: black">negativo</td>
                    <td class="border text-sm" style="border-color: black">Paciente puede estar en la etapa inicial de la infección</td>
                </tr>
                <tr>
                    <td class="border text-center text-sm font-bold uppercase" style="border-color: black">positivo</td>
                    <td class="border text-center text-sm font-bold uppercase" style="border-color: black">positivo</td>
                    <td class="border text-sm" style="border-color: black">Paciente está en la etapa activa o en recuperación de la infección</td>
                </tr>
                <tr>
                    <td class="border text-center text-sm font-bold uppercase" style="border-color: black">negativo</td>
                    <td class="border text-center text-sm font-bold uppercase" style="border-color: black">positivo</td>
                    <td class="border text-sm" style="border-color: black">Paciente puede estar en la etapa tardía o puede haber tenido una infección pasada y se ha recuperado</td>
                </tr>
            </table>

            <p class="my-8">&nbsp;</p>

            <p><img src="{{ public_path('images/sign.png') }}" alt=""></p>
            <p class="text-xs">Dr. CARLOS ECHEVERRIA ESCRIBENS <br> C.M.P 27834 - R.N.E. 16271</p>
        </div>
    </body>
</html>
