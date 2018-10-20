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
                @can('branches.create')
                    <a type="button" class="btn btn-primary btn-sm" href="{{ route('branches.create') }}">
                        <i class="fa fa-plus"></i> Nueva sucursal
                    </a>
                @endcan
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Empresa</th>
                    <th>Sucursal</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($branches as $branch)
                    <tr>
                        <td>{{ $branch->company->name }}</td>
                        <td>{{ $branch->name }}</td>
                        <td>
                            @can('branches.show')
                                <a href="{{ route('branches.show', $branch) }}" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
                            @endcan
                            @can('branches.edit')
                                <a href="{{ route('branches.edit', $branch) }}" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                            @endcan
                            @can('branches.destroy')
                                <form method="post" action="{{ route('branches.destroy', $branch) }}" style="display: inline">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" onclick="return confirm('¿Estas seguro de querer eliminar esta sucursal?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $branches->render() }}
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Code -->
    <script>

    </script>
@endpush