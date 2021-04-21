@extends('layout')

@section('content')
    @if ($errors->any())
    <ul class="list-none bg-red-100 text-red-500 p-4 mb-4">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    @endif

    <div class="grid md:grid-cols-6 gap-4">
        <form id="myForm" action="{{ route('novadermReports.pdf') }}" method="POST">
        @csrf
        <p class="block font-medium text-sm text-gray-700">Tipo de prueba:</p>
        <input type="radio" id="rapid" name="testType" value="Serologica">
        <label for="rapid">Serologica</label>
        <input type="radio" id="antigen" name="testType" checked value="Antigeno">
        <label for="antigen">Antigeno</label>
        <input type="checkbox" onchange="ActiveTravelInput(this)" class="form-input rounded-md" name="traveling" id="traveling" value="travel">
        <label for="traveling" class="text-sm font-medium text-gray-700">Muestra para viaje</label>
        <label class="block font-medium text-sm text-gray-700" for="dni">Documento de identidad:</label>
        <input class="form-input w-full rounded-md shadow-sm" type="text" name="dni" required>
        <label class="block font-medium text-sm text-gray-700" id="passportLabel" style="display: none" for="passport">Pasaporte:</label>
        <input class="form-input w-full rounded-md shadow-sm" id="passportInput" style="display: none" type="text" name="passport">
        <label class="block font-medium text-sm text-gray-700" for="name">Nombre(s):</label>
        <input class="form-input w-full rounded-md shadow-sm" type="text" name="name" required>
        <label class="block font-medium text-sm text-gray-700" for="lastname">Apellido(s):</label>
        <input class="form-input w-full rounded-md shadow-sm" type="text" name="lastname" required>
        <p class="block font-medium text-sm text-gray-700">Sexo:</p>
        <input type="radio" id="male" name="gender" value="Masculino">
        <label for="male">Masculino</label>
        <input type="radio" id="female" name="gender" value="Femenino">
        <label for="female">Femenino</label>
        <label class="block font-medium text-sm text-gray-700" for="age">Fec. Nacimiento:</label>
        <input class="form-input w-full rounded-md shadow-sm" type="date" name="age" required>
        <p class="block font-medium text-sm text-gray-700">Referencia:</p>
        <input type="radio" id="home" name="reference" value="Domicilio">
        <label for="home">Domicilio</label>
        <input type="radio" id="corporate" name="reference" value="Corporativo">
        <label for="corporate">Corporativo</label>
        <p class="block font-medium text-sm text-gray-700">Resultado de la prueba:</p>
        <input type="radio" id="negative" name="result" value="Negativo">
        <label for="negative">Negativo</label>
        <input type="radio" id="positive" name="result" value="Positivo">
        <label for="positive">Positivo</label>

        <input type="submit" class="border-2 cursor-pointer text-white bg-green-500 hover:bg-green-700 rounded-md my-2 py-2 px-4" value="Generar" onclick="setTimeout(resetForm, 20000)">
        </form>
    </div>
@endsection