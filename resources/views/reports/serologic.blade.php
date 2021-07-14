<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <style>
            * {
                margin: 0;
                padding: 0;
            }
            body {
                font-family: Verdana, Geneva, Tahoma, sans-serif;
            }
            p {
                font-size: 12px;
            }
            table, td, th {
                font-size: 14px;
            }

            .data td {
                padding: 2px 10px;
            }
        </style>

        <title>reporte de toma de prueba covid-19</title>

    </head>
    <body style="background-image: url({{ public_path('images/template.png') }})">
        <div style="margin-top: 40px; padding: 60px;">
            <img height="60" width="150" style="margin-bottom: 30px;" src="{{ public_path('images/minsa.png') }}" alt="">
            <p class="text-sm text-left">Autorizado por: Ministerio de salud del Perú</p>
            <p class="text-xs text-left">Ipress: 0026511</p>
            <table style="margin: 10px 0px; width: 100%">
                <tr>
                    <td>PACIENTE: {{ $user['name'] }} {{ $user['lastname'] }}</td>
                    <td style="text-align: right;"><strong>FECHA:</strong> {{ date("d/m/Y") }}</td>
                </tr>
                <tr>
                    <td>
                        DNI/CE/OTRO: {{ $user['dni'] }}
                        @if ($user['passport'] != null)
                            <br>PASAPORTE:<br>
                            {{ $user['passport'] }}
                        @endif
                    </td>
                    <td style="text-align: right;"><strong>SEXO:</strong> {{ $user['gender'] }}</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td style="text-align: right;"><strong>EDAD:</strong> {{ $user['age'] }}</td>
                </tr>
            </table>

            <p style="text-align: center; font-size: 16px"><strong>INMUNOBIOQUIMICA</strong></p>
            <p style="text-align: center; font-size: 16px"><strong>DETECCION DE ANTICUERPOS IGM / IGG DEL SARS COV 2</strong></p>

            <table class="data" style="margin-top: 30px; border-collapse: collapse; width: 100%">
                <tr>
                    <td style="border: 1px solid black; font-weight: bold; text-align: center;">
                        Examen
                    </td>
                    <td style="border: 1px solid black; font-weight: bold; text-align: center;">
                        Resultado
                    </td>
                </tr>
                <tr>
                    <td style="font-weight: bold;">SARS COV 2, ANTICUERPOS-IGM (COVID 19) Inmunocromatografía</td>
                    <td style="color: red; font-weight: bold; text-align: center; text-transform: uppercase;">{{ $user['result'] }}</td>
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
                    <td style="font-weight: bold;">SARS COV 2, ANTICUERPOS-IGG (COVID 19) Inmunocromatografía</td>
                    <td style="color: red; font-weight: bold; text-align: center; text-transform: uppercase;">{{ $user['result'] }}</td>
                </tr>
            </table>
            <table class="data" style="border-collapse: collapse; width:100%; margin-top: 30px;">
                <tr>
                    <td colspan="3" style="color: red; font-weight: bold; text-align: center">CUADRO PARA INTERPRETACION POR EL MEDICO TRATANTE</td>
                </tr>
                <tr>
                    <td colspan="2" style="border: 1px solid black; font-weight: bold; text-align: center;">Resultado de anticuerpos</td>
                    <td rowspan="2" style="border: 1px solid black; font-weight: bold; text-align: center;">Significado clínico</td>
                </tr>
                <tr>
                    <td style="border: 1px solid black; font-weight: bold; text-align: center; color: red;">IgM</td>
                    <td style="border: 1px solid black; font-weight: bold; text-align: center; color: red;">IgG</td>
                </tr>
                <tr>
                    <td style="border: 1px solid black; text-align: center; font-weight: bold; text-transform: uppercase">negativo</td>
                    <td style="border: 1px solid black; text-align: center; font-weight: bold; text-transform: uppercase">negativo</td>
                    <td style="border: 1px solid black;">Paciente puede estar en periodo de ventana o no ha sido expuesto</td>
                </tr>
                <tr>
                    <td style="border: 1px solid black; text-align: center; font-weight: bold; text-transform: uppercase">positivo</td>
                    <td style="border: 1px solid black; text-align: center; font-weight: bold; text-transform: uppercase">negativo</td>
                    <td style="border: 1px solid black;">Paciente puede estar en la etapa inicial de la infección</td>
                </tr>
                <tr>
                    <td style="border: 1px solid black; text-align: center; font-weight: bold; text-transform: uppercase">positivo</td>
                    <td style="border: 1px solid black; text-align: center; font-weight: bold; text-transform: uppercase">positivo</td>
                    <td style="border: 1px solid black;">Paciente está en la etapa activa o en recuperación de la infección</td>
                </tr>
                <tr>
                    <td style="border: 1px solid black; text-align: center; font-weight: bold; text-transform: uppercase">negativo</td>
                    <td style="border: 1px solid black; text-align: center; font-weight: bold; text-transform: uppercase">positivo</td>
                    <td style="border: 1px solid black;">Paciente puede estar en la etapa tardía o puede haber tenido una infección pasada y se ha recuperado</td>
                </tr>
            </table>

            <p style="margin-top: 30px;">&nbsp;</p>

            <p><img src="{{ public_path('images/sign.png') }}" alt=""></p>
            <p class="text-xs">Dr. CARLOS ECHEVARRIA ESCRIBENS <br> C.M.P 27834 - R.N.E. 16271</p>
        </div>
    </body>
</html>
