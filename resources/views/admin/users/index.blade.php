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
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Empresa</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->company_id ? $user->company->name : 'cliente' }}</td>
                        <td>
                            @can('users.show')
                                <a href="{{ route('users.show', $user) }}" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
                            @endcan

                            {{--@if(Auth::user()->id === $user->id)
                            @endif--}}
                            @can('users.edit')
                                <a href="{{ route('users.edit', $user) }}" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                            @endcan

                            {{--@if(Auth::user()->id !== $user->id)
                            @endif--}}
                            @can('users.destroy')
                                <form method="post" action="{{ route('users.destroy', $user) }}" style="display: inline">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" onclick="return confirm('¿Estas seguro de querer eliminar este usuario?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $users->render() }}
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Code -->
    <script>

    </script>
@endpush