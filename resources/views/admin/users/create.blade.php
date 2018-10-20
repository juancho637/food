@extends('admin._layouts.main')

@section('title', config('app.name').' | Usuarios')

@section('header', 'Usuarios')

@push('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/plugins/select2/dist/css/select2.min.css') }}">
@endpush

@section('description', 'Crear usuario')

@section('content')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::open(['route' => 'users.store']) !!}
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
            {!! Form::close() !!}
        </div>
    </div>
@endsection

@push('scripts')
    <!-- Select2 -->
    <script src="{{ asset('/plugins/select2/dist/js/select2.full.min.js') }}"></script>

    <!-- Code -->
    <script>
        //Initialize Select2 Elements
        $('.select2').select2();
        let company = $('#company_id');

        searchBranches(company.val()).done(function (response) {
            $('#select_branches').html(response.view);
        });

        company.change(function () {
            searchBranches($(this).val()).done(function (response) {
                $('#select_branches').html(response.view);
            });
        });

        function searchBranches(company_id) {
            let url = "{{ route('companies.branches.index', [':company_id']) }}";
            url = url.replace(':company_id', company_id);

            return $.get(url);
        }
    </script>
@endpush