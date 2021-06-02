@extends('layout')

@section('content')
    @if ($errors->any())
    <ul class="list-none bg-red-100 text-red-500 p-4 mb-4">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <div class="grid md:grid-cols-2 gap-4">
        <form id="myForm" class="max-w-xs" onsubmit="setTimeout(resetForm, 20000)" action="{{ route('bspReports.pdf') }}" method="POST">
        @csrf
        <p class="block font-medium text-sm text-gray-700">Tipo de prueba:</p>
        <input type="radio" id="rapid" name="testType" value="Serologica">
        <label for="rapid">Serologica</label>
        <input type="radio" id="antigen" name="testType" checked value="Antigeno">
        <label for="antigen">Antigeno</label>
        <input type="checkbox" onchange="ActiveTravelInput(this)" class="form-input rounded-md" name="traveling" id="traveling" value="travel">
        <label for="traveling" class="text-sm font-medium text-gray-700">Muestra para viaje</label>
        <p class="block font-medium text-sm text-gray-700">Tipo de Documento:</p>
        <select class="form-input w-full rounded-md shadow-sm" onchange="checkDocumentSelectedIsPassport(this)" name="docType" required>
            <option value="DNI">DNI</option>
            <option value="CE">Carnet de extranjería</option>
            <option value="PASAPORTE">Pasaporte</option>
            <option value="DNI">Otro</option>
        </select>
        <label class="block font-medium text-sm text-gray-700" for="dni">N° de documento:</label>
        <input class="form-input w-full rounded-md shadow-sm" onchange="findUser(this)" id="dni" type="text" name="dni" required>
        <label class="block font-medium text-sm text-gray-700" id="passportLabel" style="display: none" for="passport">Pasaporte:</label>
        <input class="form-input w-full rounded-md shadow-sm" id="passportInput" style="display: none" type="text" name="passport">
        <label class="block font-medium text-sm text-gray-700" for="name">Nombre(s):</label>
        <input class="form-input w-full rounded-md shadow-sm uppercase" id="name" type="text" name="name" required>
        <label class="block font-medium text-sm text-gray-700" for="lastname">Apellido(s):</label>
        <input class="form-input w-full rounded-md shadow-sm uppercase" id="lastname" type="text" name="lastname" required>
        <p class="block font-medium text-sm text-gray-700">Sexo:</p>
        <input type="radio" id="male" name="gender" value="Masculino">
        <label for="male">Masculino</label>
        <input type="radio" id="female" name="gender" value="Femenino">
        <label for="female">Femenino</label>
        <label class="block font-medium text-sm text-gray-700" for="birthDate">Fec. Nacimiento:</label>
        <input class="form-input w-full rounded-md shadow-sm" type="date" name="birthDate" required>
        <p class="block font-medium text-sm text-gray-700">Referencia:</p>
        <input type="radio" id="home" name="reference" checked value="Domicilio">
        <label for="home">Domicilio</label>
        <input type="radio" id="corporate" name="reference" value="Corporativo">
        <label for="corporate">Corporativo</label>
        <label class="block font-medium text-sm text-gray-700" for="testDate">Fecha de la prueba:</label>
        <input class="form-input w-full rounded-md shadow-sm" id="testDate" type="date" name="testDate" value="{{ date('Y-m-d') }}" required>
        <label class="block font-medium text-sm text-gray-700" for="testHour">Hora de la prueba:</label>
        <input class="form-input w-full rounded-md shadow-sm" id="testHour" type="time" name="testHour" required>
        <p class="block font-medium text-sm text-gray-700">Resultado de la prueba:</p>
        <input type="radio" id="negative" name="result" checked value="Negativo">
        <label for="negative">Negativo</label>
        <input type="radio" id="positive" name="result" value="Positivo">
        <label for="positive">Positivo</label>

        <input type="submit" class="block border-2 cursor-pointer text-white bg-green-500 hover:bg-green-700 rounded-md my-2 py-2 px-4" value="Generar">
        </form>
    </div>
@endsection