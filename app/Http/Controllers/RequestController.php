<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestsRequest;
use App\Http\Requests\StatusRequest;
use App\Models\Client;
use App\Models\Executer;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view ('services.request.index', [
            'requests' => SpladeTable::for(\App\Models\Request::class)
                ->withGlobalSearch(columns:['title', 'description', 'name'])
                ->column('title', label: "Заголовок", sortable: true)
                ->column('description', label: "Описание", sortable: true)
                ->column('client_id', label: "Имя клиента", sortable: true)
                ->column('executer_id', label: "Имя исполнителя", sortable: true)
                ->column('status', 'Cтатус', sortable: true)
//            ->column('image',  label: 'Фото')
                ->column('action', label: "Действие", canBeHidden: false)
                ->paginate(10)

        ]);
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
        Toast::title('Обращение добавленно добавлен');

        return redirect() -> route('request.index');

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(\App\Models\Request $request )
    {
        return view('services.request.edit', compact( 'request'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, \App\Models\Request  $Request)
    {
        $Request -> title = $request -> input('title');
        $Request -> description = $request -> input('description');
        $Request -> status = $request -> input('status');

        $Request -> client_id = $request -> input('client_id');
        $Request -> executer_id = $request -> input('executer_id');

        $Request -> update();


        Toast::title('Обращение обновлено');

        return redirect()->route('request.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(\App\Models\Request $request)
    {
        $request->delete();
        Toast::title('Обращение удалено');
        return redirect()->route('request.index');

    }
}
