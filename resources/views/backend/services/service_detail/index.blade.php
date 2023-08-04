@extends('backend.layouts.app')
@section('title')
    {{ translate('service_detail') }}
@endsection
@section('breadcrumb')
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ translate('dashboard') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ translate('service_detail') }}</li>
        </ol>
    </nav>
@endsection



@section('content')
    <div class="widget row mt-5 mb-5 d-flex">
        <h4 class="col-6">{{ translate('service_detail') }}</h4>
        <div class="col-6 text-end">
            <a href="{{ route('service_detail.create') }}" class="btn btn-primary  ">{{ translate('add_new_service') }}</a>
        </div>
    </div>
    <div class="row layout-spacing">
        <div class="col-lg-12">
            <div class="statbox  box box-shadow">
                <div class="widget-content widget-content-area p-3">

                        {{ $dataTable->table(['class' => 'table style-1 dt-table-hover non-hover dataTable no-footer']) }}
                </div>
            </div>
        </div>
    </div>
    {{-- {{ $dataTable->table() }} --}}
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush
