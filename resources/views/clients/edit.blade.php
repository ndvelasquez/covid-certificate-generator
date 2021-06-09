@extends('layout')

@section('content')
<h1 class="text-lg font-bold">Editar datos del cliente</h1>
<p class="float-right mb-4">
    <a class="flex items-center space-x-2" href="{{ route('clients.index') }}">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
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
        <form class="max-w-xs" action="{{ route('clients.store') }}" method="POST">
        @csrf
        
        <p class="block font-medium text-sm text-gray-700">Tipo de Documento:</p>
        <select class="form-input w-full rounded-md shadow-sm" id="document_type" onchange="findUser(null)" name="document_type" required>
            <option value="{{ $client->document_type }}">{{ strtoupper($client->document_type) }}</option>
            <option value="dni">DNI</option>
            <option value="ce">Carnet de extranjería</option>
            <option value="pasaporte">Pasaporte</option>
            <option value="otros">Otro</option>
        </select>
        <label class="block font-medium text-sm text-gray-700" for="document_number">N° de documento:</label>
        <input class="form-input w-full rounded-md shadow-sm" onchange="findUser(this)" id="document_number" type="text" name="document_number" required value="{{ $client->document_number }}">
        <label class="block font-medium text-sm text-gray-700" for="first_name">Nombre(s):</label>
        <input class="form-input w-full rounded-md shadow-sm uppercase" id="first_name" type="text" name="first_name" value="{{ $client->first_name }}" required>
        <label class="block font-medium text-sm text-gray-700" for="last_name">Apellido(s):</label>
        <input class="form-input w-full rounded-md shadow-sm uppercase" id="last_name" type="text" name="last_name" value="{{ $client->last_name }}" required>
        <p class="block font-medium text-sm text-gray-700">Sexo:</p>
        <input type="radio" id="male" name="gender" {{ $client->gender == 'masculino' ? 'checked' : '' }} value="masculino">
        <label for="male">Masculino</label>
        <input type="radio" id="female" {{ $client->gender == 'femenino' ? 'checked' : '' }} name="gender" value="femenino">
        <label for="female">Femenino</label>
        <label class="block font-medium text-sm text-gray-700" for="born_date">Fec. Nacimiento:</label>
        <input class="form-input w-full rounded-md shadow-sm" type="date" name="born_date" required value="{{ $client->born_date}}">
        <label class="block font-medium text-sm text-gray-700" for="phone">N° teléfono</label>
        <input class="form-input w-full rounded-md shadow-sm uppercase" type="text" name="phone" value="{{ $client->phone != null ? $client->phone : '' }}">
        
        <input type="submit" class="block border-2 cursor-pointer text-white bg-green-500 hover:bg-green-700 rounded-md my-2 py-2 px-4" value="Guardar">
        </form>
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