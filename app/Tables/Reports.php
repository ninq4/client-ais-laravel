<?php

namespace App\Tables;

use App\Models\Report;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class Reports extends AbstractTable
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
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return Report::query();
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

            ->withGlobalSearch(columns:['title', 'description', 'name'])
            ->column('title', label: "Заголовок", sortable: true)
            ->column('description', label: "Описание", sortable: true)
            ->column('name', label: "Имя клиента", sortable: true)
            ->column('status', 'Cтатус', sortable: true, exportAs: false)
            ->column('action', label: "Действие", canBeHidden: false, exportAs: false)
                ->export()
            ->paginate(10);

            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            // ->bulkAction()
            // ->export()
    }
}
