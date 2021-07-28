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
            <img src="{{ public_path('images/minsa.png') }}" height="60" width="150" style="margin-bottom: 30px;" alt="">
            <p style="margin-bottom: 20px; font-size: 16px; text-align: center; text-transform: uppercase;">Certificado toma de prueba covid-19</p>
            <p>Autorizado por: Ministerio de salud del Perú</p>
            <p>Ipress: 0026511</p>
            <table style="margin: 10px 0px;">
                <tr>
                    <td style="font-size: 14px;">NOMBRE: {{ $user['name'] }} {{ $user['lastname'] }}</td>
                </tr>
                <tr>
                    <td style="font-size: 14px;">MÉDICO: CARLOS ALBERTO ECHEVARRIA ESCRIBENS</td>
                </tr>
                <tr>
                    <td style="font-size: 14px;">ORIGEN: SAN MIGUEL</td>
                </tr>
                <tr>
                    <td style="font-size: 14px;">FECHA: {{ $user['testDate'] }}</td>
                </tr>
            </table>

            <table class="data" style="margin-bottom: 20px; border-collapse: collapse; border: 1px solid black;">
                <tr>
                    <td colspan="5" style="border: 1px solid black; text-align: center; background-color: rgb(197, 197, 197)">
                        RESULTADOS DEL ANÁLISIS
                    </td>
                </tr>
                <tr>
                    <td style="border: 1px solid black;">
                        {{ $user['docType'] }} Pac:<br>
                        {{ $user['dni'] }}
                        @if ($user['passport'] != null)
                            <br>Pasaporte:<br>
                            {{ $user['passport'] }}
                        @endif
                    </td>
                    <td style="border: 1px solid black;">Ref: {{ $user['reference'] }}</td>
                    <td style="border: 1px solid black;">Sexo: {{ $user['gender'] }}</td>
                    <td style="border: 1px solid black;">
                        Edad: {{ $user['age'] }} <br>
                        Fec. Nacimiento: {{ $user['birthDate'] }}
                    </td>
                    <td style="border: 1px solid black">
                        Aprobado: {{ $user['testDate'] }} <br>
                        Hora Prueba: {{ $user['testHour'] }}
                    </td>
                </tr>
            </table>
            <table class="data" style="border-collapse: collapse; border: 1px solid black; width: 100%;">
                <tr>
                    <td style="border: 1px solid black">ANÁLISIS</td>
                    <td style="border: 1px solid black">RESULTADO</td>
                    <td style="border: 1px solid black">RANGO DE REFERENCIA</td>
                </tr>
                <tr>
                    <td style="border: 1px solid black">PRUEBA INMUNOCROMATOGRAFICA<br>ANTÍGENA SARS COV2
                        <p>&nbsp;</p>
                        <p>CONTROL</p>
                        </td>
                    <td style="border: 1px solid black">{{ $user['result'] }}<p>&nbsp;</p><p>&nbsp;</p>CONFORME</td>
                    <td style="border: 1px solid black">{{ $user['result'] }}</td>
                </tr>
            </table>

            <p style="margin-top: 20px;">La prueba rápida o inmunocromatográfica para detección de Proteína del virus SARS-COV 2 es una prueba de diagnóstico de la fase temprana de la enfermedad que permite detectar rápidamente fragmentos de proteínas que se encuentran sobre o dentro del virus analizando muestras recolectadas provenientes del hisopado nasofaríngeo. Presenta una alta sensibilidad de 94.55% y una muy buena especificidad de 100% a un IC de 95%.</p>
            <p style="margin-top: 20px;"><strong>POSITIVO: </strong>El individuo está infectado por COVID-19 y es transmisor del virus. Se sugiere realizar prueba serológica o inmunocromatográfica para precisar el aislamiento.</p>
            <p style="margin-top: 20px;"><strong>NEGATIVO: </strong>El virus no es detectado. Continúe y mantenga todos los protocolos de prevención para la enfermedad por COVID-19.</p>

            <p style="margin-bottom: 15px;">&nbsp;</p>

            <p><img src="{{ public_path('images/sign.png') }}" alt=""></p>
            <p class="text-xs">Dr. CARLOS ECHEVARRIA ESCRIBENS <br> C.M.P 27834</p>
        </div>
    </body>
</html>
