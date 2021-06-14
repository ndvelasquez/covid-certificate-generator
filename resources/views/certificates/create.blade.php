@extends('layout')

@section('content')
<h1 class="text-lg font-bold">Agregar nuevo certificado</h1>
<p class="float-right mb-4">
    <a class="flex items-center space-x-2" href="{{ route('certificates.index') }}">
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
        <form class="max-w-xs" action="{{ route('certificates.store') }}" method="POST">
        @csrf
        <p class="block font-medium text-sm text-gray-700">Tipo de prueba:</p>
        <input type="radio" id="rapid" name="test_type" value="serologica">
        <label for="rapid">Serologica</label>
        <input type="radio" id="antigen" name="test_type" checked value="antigeno">
        <label for="antigen">Antigeno</label>
        <p class="block font-medium text-sm text-gray-700">Paciente:</p>
        <div class="flex justify-between">
            <select class="form-input w-full rounded-md shadow-sm" name="client_id" required>
                <option value="0">Seleccione un paciente</option>
                @forelse ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->FullName }}</option>
                @empty
                    <option value="null">no hay ningun paciente</option>
                @endforelse
            </select>
            <!--Open modal button-->
            <button id="buttonmodal" type="button">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd" />
                </svg>
            </button>
        </div>

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

        {{-- MODAL de formulario para agregar nuevo paciente --}}
        <div id="modal"
            class="fixed top-0 left-0 w-screen h-screen flex items-center justify-center bg-gray-600 bg-opacity-90 transform scale-0 transition-transform duration-300">
            <!-- Modal content -->
            <div class="bg-gray-200 p-12 rounded-md shadow-lg"> 
                <!--Close modal button-->
                <button id="closebutton" type="button" class="focus:outline-none">
                    <!-- Hero icon - close button -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </button>
                <!-- Test content -->
                <h2 class="text-lg font-semibold">Agregar nuevo paciente</h2>
                @include('clients.layouts.client')
            </div>
        </div>

    </div>

    <script> 
        const button = document.getElementById('buttonmodal')
        const closebutton = document.getElementById('closebutton')
        const modal = document.getElementById('modal')
    
        button.addEventListener('click',()=>modal.classList.add('scale-100'))
        closebutton.addEventListener('click',()=>modal.classList.remove('scale-100'))

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