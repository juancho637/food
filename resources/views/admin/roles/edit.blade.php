@extends('admin._layouts.main')

@section('title', config('app.name').' | Roles')

@section('header', 'Roles')

@push('styles')

@endpush

@section('description', 'Editar rol')

@section('content')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::model($role, ['route' => ['roles.update', $role->id], 'method' => 'PUT']) !!}

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