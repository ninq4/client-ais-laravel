<?php

namespace App\Tables;

use App\Models\Request;
//use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class Requests extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
//    public function authorize(Request $request)
//    {
//        return true;
//    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return Request::query();
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(columns: ['title', 'description'])
            ->column('title', label: "Заголовок", sortable: true)
                ->column('description', label: "Описание", sortable: true)
                ->column('client_id', label: "Имя клиента", sortable: true)
                ->column('executer_id', label: "Имя исполнителя", sortable: true)
                ->column('status', 'Cтатус', sortable: true, exportAs: false)
                ->column('action', label: "Действие", canBeHidden: false, exportAs: false)
            ->export()
                ->paginate(10);

            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
//             ->export();
    }
}
