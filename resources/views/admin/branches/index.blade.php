@extends('admin._layouts.main')

@section('title', config('app.name').' | Sucursales')

@section('header', 'Sucursales')

@push('styles')

@endpush

@section('description', 'Página para gestión de sucursales')

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Sucursales</h3>
            <div class="box-tools pull-right">
                <a type="button" class="btn btn-primary btn-sm" href="{{ route('branches.create') }}">
                    <i class="fa fa-plus"></i> Nueva sucursal
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