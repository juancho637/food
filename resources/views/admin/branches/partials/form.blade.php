@if(Auth::user()->isRole('su'))
    <div class="form-group">
        {{ Form::label('company_id', 'Empresa') }}
        {{ Form::select('company_id', $companies, null, ['class' => 'form-control select2']) }}
    </div>
@endif
<div class="form-group">
    {{ Form::label('name', 'Nombre') }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('address', 'Dirección') }}
    {{ Form::text('address', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}
</div>