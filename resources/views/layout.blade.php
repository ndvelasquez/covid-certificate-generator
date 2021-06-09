<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{-- Tailwind CSS --}}
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

        <title>Generador de reportes de covid</title>

    </head>
    <body class="p-4 max-w-7xl mx-auto sm:px-6 lg:px-8 bg-cover" style="background-image: url({{ asset('/images/form-background.jpg') }})">
    <nav class="bg-gray-800 rounded-md">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
            <!-- Mobile menu button-->
                <button type="button" class="mobile-menu-button inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                    <svg class="menu-show block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="menu-close hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
            <div class="flex-shrink-0 flex items-center">
                <img class="block lg:hidden h-8 w-auto" src="{{ asset('/images/logo-grande.png') }}" alt="ngsyss">
                <img class="hidden lg:block h-8 w-auto" src="{{ asset('/images/logo-grande.png') }}" alt="ngsyss">
            </div>
            <div class="hidden sm:block sm:ml-6">
                <div class="flex space-x-4">
                
                <a href="#" class="text-gray-300 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Dashboard</a>
    
                <a href="{{ route('clients.index') }}" class="text-gray-300 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">Clientes</a>
    
                <a href="#" class="text-gray-300 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">Certificados</a>

                </div>
            </div>
            </div>
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
    
        </div>
        </div>
    
        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="mobile-menu hidden sm:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1">
                
                <a href="#" class="text-gray-300 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Dashboard</a>
        
                <a href="{{ route('clients.index') }}" class="text-gray-300 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">Clientes</a>
        
                <a href="#" class="text-gray-300 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">Certificados</a>

            </div>
        </div>
    </nav>
        @yield('content')
    </body>

    <script>
        function ActiveTravelInput(checkbox) 
        {
            if(checkbox.checked) {
                document.getElementById('passportLabel').removeAttribute('style');
                document.getElementById('passportInput').removeAttribute('style');
                document.getElementById('passportInput').setAttribute('required', 'required');
            }
            else {
                document.getElementById('passportLabel').style.display='none';
                document.getElementById('passportInput').style.display='none';
                document.getElementById('passportInput').removeAttribute('required');
            }
        }

        function checkDocumentSelectedIsPassport(passport) {
            if (passport.value == 'PASAPORTE') {
                document.getElementById('traveling').setAttribute('disabled', 'disabled')
            }
            else {
                document.getElementById('traveling').removeAttribute('disabled')
            }
        }

        // grab everything we need
        const btn = document.querySelector("button.mobile-menu-button");
        const menu = document.querySelector(".mobile-menu");
        const menuShow = document.querySelector(".menu-show");
        const menuClose = document.querySelector(".menu-close");

        // add event listeners
        btn.addEventListener("click", () => {
        menu.classList.toggle("hidden");
        menuShow.classList.toggle("hidden");
        menuClose.classList.toggle("hidden");
        });
    </script>
</html>
