@extends('admin._layouts.main')

@section('title', config('app.name').' | Usuarios')

@section('header', 'Usuarios')

@push('styles')

@endpush

@section('description', 'Página para gestión de usuarios')

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Usuarios</h3>
            <div class="box-tools pull-right">
                <a type="button" class="btn btn-primary btn-sm" href="{{ route('users.create') }}">
                    <i class="fa fa-plus"></i> Nuevo usuario
                </a>
            </div>
        </div>
        <div class="box-body table-responsive">

        </div>
    </div>
@endsection

@push('scripts')
    <!-- Code -->
    <script>

    </script>
@endpush