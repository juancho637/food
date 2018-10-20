@extends('admin._layouts.main')

@section('title', config('app.name').' | Sucursales')

@section('header', 'Sucursales')

@push('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/plugins/select2/dist/css/select2.min.css') }}">
@endpush

@section('description', 'Editar sucursal')

@section('content')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::model($branch, ['route' => ['branches.update', $branch->id], 'method' => 'PUT']) !!}

            @include('admin.branches.partials.form')

            {!! Form::close() !!}
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Select2 -->
    <script src="{{ asset('/plugins/select2/dist/js/select2.full.min.js') }}"></script>

    <!-- Code -->
    <script>
        //Initialize Select2 Elements
        $('.select2').select2();

    </script>
@endpush