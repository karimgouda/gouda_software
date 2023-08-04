<?php

namespace App\DataTables\Project;

use App\Models\Project;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use App\Services\TranslatableService;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;

class ProjectDataTable extends DataTable
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
                return view('backend.projects._action', compact('id'));
            })
            ->editColumn('record_no', function ($query) {
                return '<div class="form-check form-check-primary d-block new-control">
                <input class="form-check-input child-chk" name="ids[]"value="'.$query->id.'" type="checkbox" id="form-check-default">
            </div>';
            })
            ->editColumn('image', function ($query) {
                return '<a class="profile-img" href="javascript: void(0);">
                                <img src="' . asset($query->image) . '" alt="' . $query->title . '">
                        </a>';
            })
            ->editColumn('created_at', function ($query) {
                return $query->created_at->format('Y-m-d');
            });

        TranslatableService::addTranslatableColumnsToDataTable(new Project, $table);

        return $table->rawColumns(['action', 'image', 'record_no'])->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Project $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Project $model): QueryBuilder
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
                    ->setTableId('project-table')
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
            ['name' => 'record_no',          'data' => 'record_no', 'title' => $this->chk_parent(),'width' => 20, 'class' => 'checkbox-column dt-no-sorting sorting_asc', 'orderable' => false, 'searchable' => false],
            ['name' => 'name',              'data' => 'name',  'title'=> translate('name')],
            ['name' => 'address',          'data' => 'address',  'title'=> translate('address')],
            ['name' => 'image',              'data' => 'image',  'title'=> translate('image')],
            ['name' => 'created_at',         'data' => 'created_at', 'title'=> translate('created_at')],
            ['name' => 'action',             'data' => 'action', 'title'=> translate('action') , 'width' => 150, 'exportable' => false, 'printable' => false, 'orderable' => false, 'searchable' => false],

        ];
    }

    protected function chk_parent()
    {
        return '<div class="form-check form-check-primary d-block new-control">
                    <input class="form-check-input chk-parent" type="checkbox" id="form-check-default">
                </div>';
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Project_' . date('YmdHis');
    }
}
