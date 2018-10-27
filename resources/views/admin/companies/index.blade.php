@extends('admin._layouts.main')

@section('title', config('app.name').' | Empresas')

@section('header', 'Empresas')

@push('styles')

@endpush

@section('description', 'Página para gestión de empresas')

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Empresas</h3>
            <div class="box-tools pull-right">
                @can('companies.create')
                    <a type="button" class="btn btn-primary btn-sm" href="{{ route('companies.create') }}">
                    <i class="fa fa-plus"></i> Nueva empresa
                </a>
                @endcan
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($companies as $company)
                    <tr>
                        <td>{{ $company->name }}</td>
                        <td>
                            @can('companies.show')
                                <a href="{{ route('companies.show', $company) }}" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
                            @endcan
                            @can('companies.edit')
                                <a href="{{ route('companies.edit', $company) }}" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                            @endcan
                            @can('companies.destroy')
                                <form method="post" action="{{ route('companies.destroy', $company) }}" style="display: inline">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" onclick="return confirm('¿Estas seguro de querer eliminar esta empresa?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $companies->render() }}
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Code -->
    <script>

    </script>
@endpush