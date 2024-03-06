<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusRequest;
use App\Models\Status;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class StatusController extends Controller
{
    public function index()
    {
        return view ('services.status.index', [
            'statuses' => SpladeTable::for(Status::class)
                ->withGlobalSearch(columns:['status'])
                ->column('status', label: "Статус", sortable: true)
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
        return view('services.status.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StatusRequest $request)
    {
        $status = new Status();

        $status -> status = $request -> input('status');

        $status -> save();
        Toast::title('Статус добавлен');

        return redirect()->route('status.index');
    }

    /**
     * Display the specified resource.
     */
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Status $status)
    {
        return view ('services.status.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(\App\Http\Requests\StatusRequest $request, Status $status)
    {
        $status -> status = $request -> input('status');

        $status -> save();

        Toast::title('Статус обновлен');

        return redirect() -> route('status.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Status $status)
    {
        $status -> delete();

        Toast::title('Статус удален');

        return redirect() -> route('status.index');
    }
}
