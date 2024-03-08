<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view ('services.informations.index', [
            'informations' => SpladeTable::for(Information::class)
                ->withGlobalSearch(columns:['title','description'])
                ->column('title', label: "зоголовок", sortable: true)
                ->column('description', label: "текст", sortable: true)
              ->column('action', label: "Действие", canBeHidden: false)
                ->paginate(10)

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('services.informations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $information = new information();

        $information -> title = $request -> input('title');
        $information -> description = $request -> input('description');
        $information -> save();

        Toast::title('Информация добавлена');

        return redirect()->route('information.index');
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
    public function edit(Information $information)
    {
        return view('services.informations.edit', compact('information'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Information $information)
    {

        $information -> title = $request -> input('title');
        $information -> description = $request -> input('description');
        $information -> update();

        Toast::title('Информация обновлена');

        return redirect()->route('information.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Information $information)
    {
        $information->delete();

        Toast::title('Информация удалена');
        return redirect()->route('information.index');

    }
}
