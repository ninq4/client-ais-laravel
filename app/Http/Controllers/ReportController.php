<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClientRequest;
use App\Http\Requests\ReportRequest;
use App\Models\Report;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\Facades\Toast;
use ProtoneMedia\Splade\SpladeTable;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view ('services.report.index', [
            'reports' => SpladeTable::for(Report::class)
                ->withGlobalSearch(columns:['title', 'description', 'name'])
                ->column('title', label: "Заголовок", sortable: true)
                ->column('description', label: "Описание", sortable: true)
                ->column('client_id', label: "Имя клиента", sortable: true)
                ->column('status', 'Cтатус', sortable: true)
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

    public function createClient()
    {
        return view('services.report.createClient');
    }


    public function storeClient(ClientRequest $request)
    {
        $client = new \App\Models\Client();

        $client -> name = $request -> input('name');
        $client -> save();
        $client_id = $client -> id;

        Toast::title('Клиент добавлен');

        return redirect()->route('report.create', compact('client_id'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ReportRequest $request, $client_id)
    {
        $Request = new \App\Models\Request();


        $Request -> title = $request -> input('title');
        $Request -> description = $request -> input('description');
        $Request->client_id = $client_id;


        $Request -> save();
        Toast::title('Репорт добавленно добавлено');

        return redirect() -> route('request.index');

    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report )
    {
        return view('services.report.edit', compact( 'report'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report  $report)
    {
        $report -> title = $request -> input('title');
        $report -> description = $request -> input('description');
        $report -> status = $request -> input('status');

        $report -> client_id = $request -> input('client_id');

        $report -> update();


        Toast::title('Заявка обновлена');

        return redirect()->route('report.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        $report->delete();
        Toast::title('Заявка удалено');
        return redirect()->route('request.index');

    }
}
