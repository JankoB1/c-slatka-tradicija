<?php

namespace App\DataTables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->filterColumn('name', function($query, $keyword) {
                $sql = "CONCAT(users.name, ' ', users.surname) like ?";
                $query->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->addColumn('name', function(User $user) {
                return $user->name . ' ' . $user->surname;
            })
            ->editColumn('email', function(User $user) {
                return $user->email;
            })
            ->addColumn('phone', function(User $user) {
                return $user->phone;
            })
            ->addColumn('city_2', function(User $user) {
                return $user->city_2;
            })
            ->addColumn('address', function(User $user) {
                return $user->address;
            })
            ->addColumn('zip', function(User $user) {
                return $user->zip;
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(User $model): QueryBuilder
    {
        return $model->newQuery()->select(['users.*']);
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('users-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    //->dom('Bfrtip')
                    ->orderBy(1)
                    ->selectStyleSingle()
                    ->buttons([
                        Button::make('excel'),
                        Button::make('csv'),
                        Button::make('pdf'),
                        Button::make('print'),
                        Button::make('reset'),
                        Button::make('reload')
                    ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('name')->title('Ime i prezime')->searchable(true),
            Column::make('email')->title('Email')->searchable(true),
            Column::make('phone')->title('Telefon'),
            Column::make('city_2')->title('Grad'),
            Column::make('address')->title('Adresa'),
            Column::make('zip')->title('Poštanski broj'),
        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Users_' . date('YmdHis');
    }
}
