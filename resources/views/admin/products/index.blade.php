@extends('admin._layouts.main')

@section('title', config('app.name').' | Productos')

@section('header', 'Productos')

@push('styles')

@endpush

@section('description', 'Página para gestión de productos')

@section('content')
    <div class="box box-primary">
        <div class="box-header">
            <h3 class="box-title">Productos</h3>
            <div class="box-tools pull-right">
                @can('products.create')
                    <a type="button" class="btn btn-primary btn-sm" href="{{ route('products.create') }}">
                        <i class="fa fa-plus"></i> Nuevo producto
                    </a>
                @endcan
            </div>
        </div>
        <div class="box-body table-responsive">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Producto</th>
                    <th>Empresa</th>
                    <th>Sucursal</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->branch->company->name }}</td>
                        <td>{{ $product->branch->name }}</td>
                        <td>${{ number_format($product->price) }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            @can('products.show')
                                <a href="{{ route('products.show', $product) }}" class="btn btn-xs btn-primary"><i class="fa fa-eye"></i></a>
                            @endcan
                            @can('products.edit')
                                <a href="{{ route('products.edit', $product) }}" class="btn btn-xs btn-warning"><i class="fa fa-pencil"></i></a>
                            @endcan
                            @can('products.destroy')
                                <form method="post" action="{{ route('products.destroy', $product) }}" style="display: inline">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button type="submit" onclick="return confirm('¿Estas seguro de querer eliminar este producto?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></button>
                                </form>
                            @endcan
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $products->render() }}
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Code -->
    <script>

    </script>
@endpush