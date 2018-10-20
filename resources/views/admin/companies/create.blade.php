@extends('admin._layouts.main')

@section('title', config('app.name').' | Empresas')

@section('header', 'Empresas')

@push('styles')

@endpush

@section('description', 'Crear empresa')

@section('content')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::open(['route' => 'companies.store']) !!}

            @include('admin.companies.partials.form')

            {!! Form::close() !!}
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Code -->
    <script>

    </script>
@endpush