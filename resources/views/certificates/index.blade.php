@extends('layout')

@section('content')
<h1 class="font-semibold text-xl text-center text-gray-800 leading-tight">Listado de certificados</h1>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <p class="text-right mb-4">
            <a class="bg-blue-500 hover:bg-blue-700 cursor-pointer py-2 px-4 rounded-md text-white font-bold text-xs" href="{{ route('certificates.create') }}">Añadir nuevo certificado</a>
        </p>
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
            <table>
                <thead>
                    <th class="border px-4 py-2">Cliente</th>
                    <th class="border px-4 py-2">Referencia</th>
                    <th class="border px-4 py-2">Fecha de prueba</th>
                    <th class="border px-4 py-2">Resultado</th>
                    <th colspan="2" class="border px-4 py-2">Acciones</th>
                </thead>
                <tbody>
                    @forelse ($tests as $test)
                    <tr>
                        <td class="border px-4 py-2">{{ $test->client->FullName }}</td>
                        <td class="border px-4 py-2">{{ $test->reference }}</td>
                        <td class="border px-4 py-2">{{ $test->DateOfTest }}</td>
                        <td class="border px-4 py-2">{{ $test->test_result }}</td>
                        <td class="border-l border-b px-4 py-2">
                            <a href="{{ route('certificates.edit', $test) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                        </td>
                        <td class="border-r border-b px-4 py-2">
                            <a href="{{ route('certificates.pdf', $test) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">No hay certificados creados</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection