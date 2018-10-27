{{ Form::label('branch_id', 'Sucursal') }}
@if($branches)
    {{ Form::select('branch_id', $branches, $branch_id ?: null, ['class' => 'form-control select2']) }}
@else
    {{ Form::select('branch_id', [null => 'Seleccione una sucursal...'], null, ['class' => 'form-control select2']) }}
@endif
<script>
    //Initialize Select2 Elements
    $('.select2').select2();
</script>