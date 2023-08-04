<?php

namespace App\DataTables;

use App\Models\ServiceDetail;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use App\Services\TranslatableService;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class ServiceDetailDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        $table =   (new EloquentDataTable($query))
            ->addColumn('action', function ($query) {
                $id = $query->id;
                return view('backend.services.service_detail._action', compact('id'));
            });
            // ->editColumn('record_no', function ($query) {
            //     return '<div class="form-check form-check-primary d-block new-control">
            //     <input class="form-check-input child-chk" name="ids[]"value="'.$query->id.'" type="checkbox" id="form-check-default">
            // </div>';
            // });

        TranslatableService::addTranslatableColumnsToDataTable(new ServiceDetail(), $table);

        return $table->rawColumns(['action','record_no'])->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\ServiceDetail $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(ServiceDetail $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
                    ->setTableId('servicedetail-table')
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
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            ['name' => 'name',               'data' => 'name',  'title'=> translate('name')],
            ['name' => 'action',             'data' => 'action', 'title'=> translate('action') , 'width' => 150, 'exportable' => false, 'printable' => false, 'orderable' => false, 'searchable' => false],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'ServiceDetail_' . date('YmdHis');
    }
}
