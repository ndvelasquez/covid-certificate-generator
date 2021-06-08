<?php

namespace App\Http\Controllers;

use App\Models\Client;
use DateTime;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::latest()->get();

        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $client = $request->all();
        /*Calculo la edad y la modifico en el objeto*/
        $birthDate = new DateTime($request->birthDate);
        $today = new DateTime();
        $age = $today->diff($birthDate);
        $client['age'] = $age->y;
        /*Fin de calculo de edad */
        dd($client);
        Client::create($client);

        return redirect()->route('clients.index');
    }

    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $client->update($request->all());

        return redirect()->route('clients.index');
    }

    public function destroy(Client $client)
    {
        $client->delete();

        return redirect()->route('clients.index');
    }
}
