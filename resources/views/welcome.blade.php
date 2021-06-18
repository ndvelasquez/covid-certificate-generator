<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <title>Laravel</title>
    </head>
    <body class="bg-cover py-10" style="background-image: url({{ asset('/images/background.jpg') }})">
        <img class="w-60 transition animate-pulse transform h-16 mb-2 m-5" src="{{ asset('/images/logo-grande.png') }}" alt="">
        <div class="bg-white transition duration-1000 ease-in-out transform rounded-md shadow-md max-w-md p-5 m-5">
            <h2 class="text-2xl font-bold text-indigo-400 text-left mb-2">Generador de reportes de resultados de pruebas COVID-19</h2>
            <h4 class="text-lg text-indigo-500 text text-center mb-2">Por favor seleccione el proveedor</h4>
            <div class="grid grid-cols-2">
                <a href="{{ route('dermanova.reports') }}">
                    <img class="w-48 h-16 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110" src="{{ asset('/images/logo-dermanova.png') }}" alt="imagen de logo de dermanova">
                </a>
                <a href="{{ route('medical.reports') }}">
                    <img class="w-48 h-16 transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110" src="{{ asset('/images/bsp-logo.jpeg') }}" alt="imagen de logo de bsp">
                </a>
            </div>
        </div>
        <footer class="bg-white shadow-md w-full py-8 absolute bottom-0">
            <p class="text-xs font-semibold mx-12">
                &copy;NgSys. Producto de Ng Computech - 2021 <br>
                Todos los derechos reservados <br>
            </p>
        </footer>
    </body>
</html>
