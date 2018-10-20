<div class="form-group">
    {{ Form::label('name', 'Nombre') }}
    {{ Form::text('name', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('email', 'Correo electrónico') }}
    {{ Form::text('email', null, ['class' => 'form-control']) }}
</div>
@if(Auth::user()->isRole('su'))
    <div class="form-group">
        {{ Form::label('company_id', 'Empresa') }}
        {{ Form::select('company_id', $companies, null, ['class' => 'form-control select2']) }}
    </div>
@endif
<div class="form-group" id="select_branches">
    @include('admin.users.partials.selectBranch')
</div>
<hr>
<h3>Lista de roles</h3>
<div class="form-group">
    <ul class="list-unstyled">
        @foreach($roles as $role)
            <li>
                <label>
                    {{ Form::checkbox('roles[]', $role->id, null) }}
                    {{ $role->name }}
                    <em>({{ $role->descrption ?: 'Sin descripción' }})</em><br>
                    @if($role->special)
                        <small class="text-muted">Tiene todos los permisos</small>
                    @else
                        <small class="text-muted">{{ $role->permissions->pluck('name')->implode(', ') }}</small>
                    @endif
                </label>
            </li>
        @endforeach
    </ul>
</div>
<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}
</div>