{{ Form::label('branch_id', 'Sucursal') }}
@if($branches)
    {{ Form::select('branch_id', $branches, null, ['class' => 'form-control select2']) }}
@else
    {{ Form::select('branch_id', [null => 'Seleccione una sucursal...'], null, ['class' => 'form-control select2']) }}
@endif