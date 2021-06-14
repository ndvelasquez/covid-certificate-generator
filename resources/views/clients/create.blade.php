@extends('layout')

@section('content')
<h1 class="text-lg font-bold">Agregar nuevo cliente</h1>
<p class="float-right mb-4">
    <a class="flex items-center space-x-2" href="{{ route('clients.index') }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm.707-10.293a1 1 0 00-1.414-1.414l-3 3a1 1 0 000 1.414l3 3a1 1 0 001.414-1.414L9.414 11H13a1 1 0 100-2H9.414l1.293-1.293z" clip-rule="evenodd" />
        </svg>
        <span class="font-semibold text-blue-400 hover:text-blue-700">volver</span>
    </a>
</p>
    @if ($errors->any())
    <ul class="list-none bg-red-100 text-red-500 p-4 mb-4">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <div class="grid md:grid-cols-2 gap-4">
        @include('clients.layouts.client')
    </div>

    <script>
        function findUser(document_number) {
            let documentType = document.getElementById("document_type");
            if (documentType.value == 'dni')
            {
            fetch('https://dniruc.apisperu.com/api/v1/dni/' + document_number.value + '?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6Im5kdmVsYXNxdWV6bEBnbWFpbC5jb20ifQ.XBZTxJdjUtMXsHe9Tu1p0KuCqtWPiX66_72suDg9koQ')
            .then(res => res.json())
            .then(data => {
                document.getElementById('first_name').value = data['nombres'];
                document.getElementById('last_name').value = data['apellidoPaterno'] + ' ' + data['apellidoMaterno'];
            });
            }
        }
    </script>
@endsection