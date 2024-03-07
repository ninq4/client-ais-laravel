<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Models\Client;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('services.client.index', [
            'clients' => SpladeTable::for(Client::class)
                ->withGlobalSearch(columns:['name'])
                ->column('name', label: "Имя клиента", sortable: true)
//            ->column('image',  label: 'Фото')
                ->column('action', label: "Действие", canBeHidden: false)
                ->paginate(10)

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('services.client.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request)
    {
        $client = new Client();

        $client -> name = $request -> input('name');

        $client -> save();
        Toast::title('Клиент добавлен');
        $client_id = $client -> id;

        return redirect()->route('request.create', compact('client_id'));
    }

    /**
     * Display the specified resource.
     */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        return view ('services.client.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientRequest $request, Client $client)
    {
        $client -> name = $request -> input('name');

        $client -> save();

        Toast::title('Клиент обновлен');

        return redirect() -> route('client.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client -> delete();

        Toast::title('Клиент удален');

        return redirect() -> route('client.index');
    }
}
