<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExecuterRequest;
use App\Models\Executer;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class ExecuterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('services.executer.index', [
            'executers' => SpladeTable::for(Executer::class)
                ->withGlobalSearch(columns:['name'])
                ->column('name', label: "Имя исполнителя", sortable: true)
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
        return view('services.executer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ExecuterRequest $request)
    {
        $executer = new executer();

        $executer -> name = $request -> input('name');

        $executer -> save();
        Toast::title('Исполнитель добавлен');

        return redirect()->route('executer.index');
    }

    /**
     * Display the specified resource.
     */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Executer $executer)
    {
        return view ('services.executer.edit', compact('executer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ExecuterRequest $request, Executer $executer)
    {
        $executer -> name = $request -> input('name');

        $executer -> save();

        Toast::title('Исполнитель обновлен');

        return redirect() -> route('executer.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(executer $executer)
    {
        $executer -> delete();

        Toast::title('Исполнитель удален');

        return redirect() -> route('executer.index');
    }
}
