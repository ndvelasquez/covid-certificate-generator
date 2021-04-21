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
    <body class="bg-cover" style="background-image: url({{ public_path('images/template-novaderm.png') }})">
        <div class="px-8 mt-20">
            <img class="w-48 h-16 mb-6" src="{{ public_path('images/minsa.png') }}" alt="">
            <p class="text-md mb-4 text-semibold text-center uppercase">Certificado toma de prueba covid-19</p>
            <p class="text-sm text-left">Autorizado por: Ministerio de salud del Perú</p>
            <p class="text-xs text-left">Ipress: 0026511</p>
            <table class="text-sm my-2">
                <tr>
                    <td>NOMBRE: {{ $user['name'] }} {{ $user['lastname'] }}</td>
                </tr>
                <tr>
                    <td>MÉDICO: CARLOS ALBERTO ECHEVERRIA ESCRIBENS</td>
                </tr>
                <tr>
                    <td>ORIGEN: SAN MIGUEL</td>
                </tr>
                <tr>
                    <td>FECHA: {{ date("d/m/Y") }}</td>
                </tr>
            </table>

            <table class="table-fixed w-full my-4">
                <tr>
                    <td colspan="5" class="border text-sm text-center">
                        <div style="background-color: rgb(197, 197, 197)">RESULTADOS DEL ANÁLISIS</div>
                    </td>
                </tr>
                <tr>
                    <td class="border text-sm">
                        DNI Pac:<br>
                        {{ $user['dni'] }}
                        @if ($user['passport'] != null)
                            <br>Pasaporte:<br>
                            {{ $user['passport'] }}
                        @endif
                    </td>
                    <td class="border text-sm">Ref: {{ $user['reference'] }}</td>
                    <td class="border text-sm">Sexo: {{ $user['gender'] }}</td>
                    <td class="border text-sm">Edad: {{ $user['age'] }}</td>
                    <td class="border text-sm">Aprobado: {{ date("d/m/Y") }}</td>
                </tr>
            </table>
            <table class="table w-full my-2">
                <tr>
                    <td class="border text-sm">ANÁLISIS</td>
                    <td class="border text-sm">RESULTADO</td>
                    <td class="border text-sm">RANGO DE REFERENCIA</td>
                </tr>
                <tr>
                    <td class="border text-sm">PRUEBA INMUNOCROMATOGRAFICA<br>ANTÍGENA SARS COV2
                        <p>&nbsp;</p>
                        <p>CONTROL</p>
                        </td>
                    <td class="border text-sm uppercase">{{ $user['result'] }}<p>&nbsp;</p><p>&nbsp;</p>CONFORME</td>
                    <td class="border text-sm uppercase">{{ $user['result'] }}</td>
                </tr>
            </table>

            <p class="my-6 text-sm text-justify">La prueba rápida o inmunocromatográfica para detección de Proteína del virus SARS-COV 2 es una prueba de diagnóstico de la fase temprana de la enfermedad que permite detectar rápidamente fragmentos de proteínas que se encuentran sobre o dentro del virus analizando muestras recolectadas provenientes del hisopado nasofaríngeo. Presenta una alta sensibilidad de 94.55% y una muy buena especificidad de 100% a un IC de 95%.</p>
            <p class="my-4 text-sm"><strong>POSITIVO: </strong>El individuo está infectado por COVID-19 y es transmisor del virus. Se sugiere realizar prueba serológica o inmunocromatográfica para precisar el aislamiento.</p>
            <p class="text-sm"><strong>NEGATIVO: </strong>El virus no es detectado. Continúe y mantenga todos los protocolos de prevención para la enfermedad por COVID-19.</p>

            <p class="my-8">&nbsp;</p>

            <p><img src="{{ public_path('images/sign.png') }}" alt=""></p>
            <p class="text-xs">Dr. CARLOS ECHEVERRIA ESCRIBENS <br> C.M.P 27834</p>
        </div>
    </body>
</html>
