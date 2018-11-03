@if(Auth::user()->isRole('su'))
    <div class="form-group {{ $errors->has('company_id') ? 'has-error' : '' }}">
        {{ Form::label('company_id', 'Empresa') }}
        {{ Form::select('company_id', $companies, null, ['class' => 'form-control select2']) }}
        {!! $errors->first('company_id', '<span class="help-block">:message</span>') !!}
    </div>
@endif
<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            {{ Form::label('name', 'Nombre') }}
            {{ Form::text('name', null, ['class' => 'form-control']) }}
            {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
            {{ Form::label('address', 'Dirección') }}
            {{ Form::text('address', null, ['class' => 'form-control']) }}
            {!! $errors->first('address', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('longitude') ? 'has-error' : '' }}">
            {{ Form::label('longitude', 'Longitud') }}
            {{ Form::text('longitude', null, ['class' => 'form-control']) }}
            {!! $errors->first('longitude', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group {{ $errors->has('latitude') ? 'has-error' : '' }}">
            {{ Form::label('latitude', 'Latitud') }}
            {{ Form::text('latitude', null, ['class' => 'form-control']) }}
            {!! $errors->first('latitude', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
</div>
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}
</div>