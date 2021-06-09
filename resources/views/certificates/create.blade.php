@extends('layout')

@section('content')
<h1 class="text-lg font-bold">Agregar nuevo cliente</h1>
<p class="float-right mb-4">
    <a class="flex items-center space-x-2" href="{{ route('certificates.index') }}">
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
        <form class="max-w-xs" action="{{ route('certificates.store') }}" method="POST">
        @csrf
        <p class="block font-medium text-sm text-gray-700">Tipo de prueba:</p>
        <input type="radio" id="rapid" name="test_type" value="serologica">
        <label for="rapid">Serologica</label>
        <input type="radio" id="antigen" name="test_type" checked value="antigeno">
        <label for="antigen">Antigeno</label>
        <p class="block font-medium text-sm text-gray-700">Cliente:</p>
        <select class="form-input w-full rounded-md shadow-sm" name="client_id" required>
            <option value="0">Seleccione un cliente</option>
            @forelse ($clients as $client)
                <option value="{{ $client->id }}">{{ $client->FullName }}</option>
            @empty
                <option value="null">no hay ningun cliente</option>
            @endforelse
        </select>
        <p class="block font-medium text-sm text-gray-700">Referencia:</p>
        <input type="radio" id="domicilio" name="reference" checked value="domicilio">
        <label for="domicilio">Domicilio</label>
        <input type="radio" id="corporativo" name="reference" value="dorporativo">
        <label for="corporativo">Corporativo</label>
        <label class="block font-medium text-sm text-gray-700" for="test_date">Fecha de la prueba:</label>
        <input class="form-input w-full rounded-md shadow-sm" id="test_date" type="date" name="test_date" value="{{ date('Y-m-d') }}" required>
        <label class="block font-medium text-sm text-gray-700" for="test_time">Hora de la prueba:</label>
        <input class="form-input w-full rounded-md shadow-sm" id="test_time" type="time" name="test_time" required>
        <p class="block font-medium text-sm text-gray-700">Resultado de la prueba:</p>
        <input type="radio" id="negative" name="test_result" checked value="negativo">
        <label for="negative">Negativo</label>
        <input type="radio" id="positive" name="test_result" value="positivo">
        <label for="positive">Positivo</label>
        
        <input type="submit" class="block border-2 cursor-pointer text-white bg-green-500 hover:bg-green-700 rounded-md my-2 py-2 px-4" value="Guardar">
        </form>
    </div>
@endsection