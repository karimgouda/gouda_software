<?php

namespace App\DataTables;

use App\Models\Recruitment;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class RecruitmentDataTable extends DataTable
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
                return view('backend.recruitments._action', compact('id'));
            })
            ->addColumn('job', function ($query) {
                return $query->job ? $query->job->job_name : '~' ;
            })
            ->editColumn('record_no', function ($query) {
                return '<div class="form-check form-check-primary d-block new-control">
                <input class="form-check-input child-chk" name="ids[]"value="'.$query->id.'" type="checkbox" id="form-check-default">
            </div>';
            })
            ->editColumn('testimonials', function ($query) {

                return view('backend.recruitments._testimonials',compact('query'));
            })
            ->editColumn('cv', function ($query) {
                return view('backend.recruitments._cv', compact('query'));

            });



        return $table->rawColumns(['action', 'job', 'record_no', 'testimonials', 'cv'])->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Recruitment $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Recruitment $model): QueryBuilder
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
                    ->setTableId('recruitment-table')
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
            ['name' => 'record_no',          'data' => 'record_no', 'title' => $this->chk_parent(), 'width' => 20,'class' => 'checkbox-column dt-no-sorting sorting_asc', 'orderable' => false, 'searchable' => false],
            ['name' => 'name',               'data' => 'name',  'title'=> translate('name')],
            ['name' => 'email',              'data' => 'email',  'title'=> translate('email')],
            ['name' => 'phone',              'data' => 'phone',  'title'=> translate('phone')],
            ['name' => 'specialization',     'data' => 'specialization',  'title'=> translate('specialization')],
            ['name' => 'testimonials',       'data' => 'testimonials',  'title'=> translate('testimonials')],
            ['name' => 'cv',                 'data' => 'cv',  'title'=> translate('cv')],
            ['name' => 'job',                'data' => 'job',  'title'=> translate('job')],
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
        return 'Recruitment_' . date('YmdHis');
    }
}
