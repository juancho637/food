@extends('admin._layouts.main')

@section('title', config('app.name').' | Reservaciones')

@section('header', 'Reservaciones')

@push('styles')

@endpush

@section('description', 'Página para gestión de reservaciones')

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Reservaciones</h3>
            <div class="box-tools pull-right">
                @can('reservations.create')
                    <a type="button" class="btn btn-primary btn-sm" href="{{ route('reservations.create') }}">
                        <i class="fa fa-plus"></i> Nueva reservación
                    </a>
                @endcan
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Nombre del cliente</th>
                    <th>Empresa</th>
                    <th>Sucursal</th>
                    <th>Producto</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($reservations as $reservation)
                    <tr>
                        <td>{{ $reservation->date }}</td>
                        <td>{{ $reservation->user->name }}</td>
                        <td>{{ $reservation->product->branch->company->name }}</td>
                        <td>{{ $reservation->product->branch->name }}</td>
                        <td>{{ $reservation->product->name }}</td>
                        <td>
                            @can('reservations.show')
                                <a href="{{ route('reservations.show', $reservation) }}" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
                            @endcan
                            @can('reservations.edit')
                                <a href="{{ route('reservations.edit', $reservation) }}" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                            @endcan
                            @can('reservations.destroy')
                                <form method="post" action="{{ route('reservations.destroy', $reservation) }}" style="display: inline">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" onclick="return confirm('¿Estas seguro de querer eliminar esta reservación?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $reservations->render() }}
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Code -->
    <script>

    </script>
@endpush