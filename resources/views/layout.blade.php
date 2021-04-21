<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- Tailwind CSS --}}
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

        <title>Generador de reportes de covid</title>

    </head>
    <body class="p-4 max-w-7xl mx-auto sm:px-6 lg:px-8 bg-gray-200">
        <h1 class="text-lg font-bold">Generar reporte de resultados de la prueba de COVID-19</h1>
        @yield('content')
    </body>

    <script>
        function ActiveTravelInput(checkbox) 
        {
            if(checkbox.checked) {
                document.getElementById('passportLabel').removeAttribute('style');
                document.getElementById('passportInput').removeAttribute('style');
            }
            else {
                document.getElementById('passportLabel').style.display='none';
                document.getElementById('passportInput').style.display='none';
            }
        }
        function resetForm()
        {
            document.getElementById('myForm').reset();
        }
    </script>
</html>
