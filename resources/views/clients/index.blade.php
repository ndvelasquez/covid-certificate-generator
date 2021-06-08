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
                        <td class="border px-4 py-2">
                            <a href="{{ route('clients.edit', $client) }}">Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('clients.destroy', $client) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="bg-red-500 hover:bg-red-700 text-white text-bold text-sm rounded-md cursor-pointer py-2 px-4" value="Eliminar" onclick="return confirm('¿Estas seguro de eliminar el cliente?')">
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