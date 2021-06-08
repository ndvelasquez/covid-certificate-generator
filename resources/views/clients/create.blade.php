@extends('layout')

@section('content')
<h1 class="text-lg font-bold">Agregar nuevo cliente</h1>
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
        <select class="form-input w-full rounded-md shadow-sm" name="document_type" required>
            <option value="DNI">DNI</option>
            <option value="CE">Carnet de extranjería</option>
            <option value="PASAPORTE">Pasaporte</option>
            <option value="OTROS">Otro</option>
        </select>
        <label class="block font-medium text-sm text-gray-700" for="document_number">N° de documento:</label>
        <input class="form-input w-full rounded-md shadow-sm" onchange="findUser(this)" id="document_number" type="text" name="document_number" required>
        <label class="block font-medium text-sm text-gray-700" for="first_name">Nombre(s):</label>
        <input class="form-input w-full rounded-md shadow-sm uppercase" id="first_name" type="text" name="first_name" required>
        <label class="block font-medium text-sm text-gray-700" for="last_name">Apellido(s):</label>
        <input class="form-input w-full rounded-md shadow-sm uppercase" id="last_name" type="text" name="last_name" required>
        <p class="block font-medium text-sm text-gray-700">Sexo:</p>
        <input type="radio" id="male" name="gender" value="Masculino">
        <label for="male">Masculino</label>
        <input type="radio" id="female" name="gender" value="Femenino">
        <label for="female">Femenino</label>
        <label class="block font-medium text-sm text-gray-700" for="born_date">Fec. Nacimiento:</label>
        <input class="form-input w-full rounded-md shadow-sm" type="date" name="born_date" required>
        <label class="block font-medium text-sm text-gray-700" for="phone">N° teléfono</label>
        <input class="form-input w-full rounded-md shadow-sm uppercase" type="text" name="phone" required>
        
        <input type="submit" class="block border-2 cursor-pointer text-white bg-green-500 hover:bg-green-700 rounded-md my-2 py-2 px-4" value="Guardar">
        </form>
    </div>

    <script>
        function findUser(document_number) {
            fetch('https://dniruc.apisperu.com/api/v1/dni/' + document_number.value + '?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJlbWFpbCI6Im5kdmVsYXNxdWV6bEBnbWFpbC5jb20ifQ.XBZTxJdjUtMXsHe9Tu1p0KuCqtWPiX66_72suDg9koQ')
            .then(res => res.json())
            .then(data => {
                document.getElementById('first_name').value = data['nombres'];
                document.getElementById('last_name').value = data['apellidoPaterno'] + ' ' + data['apellidoMaterno'];
            });
        }
    </script>
@endsection