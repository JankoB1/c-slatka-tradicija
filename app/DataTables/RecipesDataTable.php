<?php

namespace App\DataTables;

use App\Models\Recipe;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RecipesDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
//            ->addColumn('title', function(Recipe $recipe) {
//                return $recipe->title;
//            })
            ->addColumn('email', function(Recipe $recipe) {
                if($recipe->user_recipe != null) {
                    return $recipe->user_recipe->email;
                } else {
                    return '';
                }
            })
            ->editColumn('created_at', function(Recipe $recipe) {
                return $recipe->created_at;
            })
            ->addColumn('action', function (Recipe $recipe) {
                return view('auth.admin.columns.action', compact('recipe'));
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(Recipe $model): QueryBuilder
    {
        $query = $model->newQuery()
            ->whereNull('deleted_at') // Using 'whereNull' is more concise than '= null'
            ->orderBy('id', 'desc');

        // If the title column is being searched, add the search filter
        if (request()->has('search') && request('search')['value']) {
            $searchValue = request('search')['value'];
            $query->where('title', 'like', "%{$searchValue}%");
        }

        return $query;
    }


    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('recipes-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->orderBy(1)
            ->selectStyleSingle()
            ->drawCallback("function() {" . file_get_contents(resource_path('views/auth/admin/columns/_draw-scripts.js')) . "}");
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('title')->searchable(true),
            Column::make('email')->title('Korisnik'),
            Column::make('created_at')->name('created_at')->title('Datum objavljivanja'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(60)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Recipes_' . date('YmdHis');
    }
}
