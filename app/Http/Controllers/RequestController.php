<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestsRequest;
use App\Models\Client;
use App\Models\Executer;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($client_id)
    {
        return view('services.request.create', compact('client_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RequestsRequest $request, $client_id)
    {
        $Request = new \App\Models\Request();


        $Request -> title = $request -> input('title');
        $Request -> description = $request -> input('description');
        $Request->client_id = $client_id;

        $executer = Executer::inRandomOrder()->first();

        $Request->executer_id = $executer->id;

        $Request -> save();

        return redirect() -> route('request.index');

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
