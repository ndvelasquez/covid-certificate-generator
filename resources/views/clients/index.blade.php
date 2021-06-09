@extends('layout')

@section('content')
<h1 class="font-semibold text-xl text-center text-gray-800 leading-tight">Listado de clientes</h1>
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <p class="text-right mb-4">
            <a class="bg-blue-500 hover:bg-blue-700 cursor-pointer py-2 px-4 rounded-md text-white font-bold text-xs" href="{{ route('clients.create') }}">Añadir nuevo cliente</a>
        </p>
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
            <table>
                <thead>
                    <th class="border px-4 py-2">Tipo doc.</th>
                    <th class="border px-4 py-2">N° Doc.</th>
                    <th class="border px-4 py-2">Nombre</th>
                    <th class="border px-4 py-2">Teléfono</th>
                    <th colspan="2" class="border px-4 py-2">Acciones</th>
                </thead>
                <tbody>
                    @forelse ($clients as $client)
                    <tr>
                        <td class="border px-4 py-2">{{ $client->document_type }}</td>
                        <td class="border px-4 py-2">{{ $client->document_number }}</td>
                        <td class="border px-4 py-2">{{ $client->FullName }}</td>
                        <td class="border px-4 py-2">{{ $client->phone }}</td>
                        <td class="border-l border-b px-4 py-2">
                            <a href="{{ route('clients.edit', $client) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                        </td>
                        <td class="border-r border-b px-4 py-2">
                            <form action="{{ route('clients.destroy', $client) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="py-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5">No hay clientes creados</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection