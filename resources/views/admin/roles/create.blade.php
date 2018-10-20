@extends('admin._layouts.main')

@section('title', config('app.name').' | Roles')

@section('header', 'Roles')

@push('styles')

@endpush

@section('description', 'Crear rol')

@section('content')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::open(['route' => 'roles.store']) !!}

            @include('admin.roles.partials.form')

            {!! Form::close() !!}
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Code -->
    <script>

    </script>
@endpush