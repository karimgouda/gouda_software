@extends('backend.layouts.app')

@section('title')
    {{ translate('projects') }}
@endsection
@section('breadcrumb')
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">{{ translate('dashboard') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ translate('projects') }}</li>
        </ol>
    </nav>
@endsection



@section('content')

<div class="row mb-4 layout-spacing layout-top-spacing">
    
    <form class="row g-4" method="POST" action="{{ route('projects.store') }}" enctype="multipart/form-data">
        @csrf
        @include('backend.projects._form')
    </form>

</div>

@endsection
