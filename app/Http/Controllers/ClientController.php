<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
