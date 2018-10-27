{{ Form::label('product_id', 'Producto') }}
@if($products)
    {{ Form::select('product_id', $products,  null, ['class' => 'form-control select2']) }}
@else
    {{ Form::select('product_id', [null => 'Seleccione un producto...'], null, ['class' => 'form-control select2']) }}
@endif
