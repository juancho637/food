@extends('admin._layouts.main')

@section('title', config('app.name').' | Roles')

@section('header', 'Roles')

@push('styles')

@endpush

@section('description', 'Página para gestión de roles')

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Roles</h3>
            <div class="box-tools pull-right">
                @can('roles.create')
                    <a type="button" class="btn btn-primary btn-sm" href="{{ route('roles.create') }}">
                        <i class="fa fa-plus"></i> Nuevo rol
                    </a>
                @endcan
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Slug</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $role)
                    <tr>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->slug }}</td>
                        <td>{{ $role->description }}</td>
                        <td>
                            @can('roles.show')
                                <a href="{{ route('roles.show', $role) }}" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
                            @endcan
                            @can('roles.edit')
                                <a href="{{ route('roles.edit', $role) }}" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                            @endcan
                            @can('roles.destroy')
                                <form method="post" action="{{ route('roles.destroy', $role) }}" style="display: inline">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" onclick="return confirm('¿Estas seguro de querer eliminar este rol?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $roles->render() }}
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Code -->
    <script>

    </script>
@endpush