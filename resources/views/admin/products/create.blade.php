@extends('admin._layouts.main')

@section('title', config('app.name').' | Productos')

@section('header', 'Productos')

@push('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/plugins/select2/dist/css/select2.min.css') }}">
@endpush

@section('description', 'Crear producto')

@section('content')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::open(['route' => 'products.store']) !!}
                <div class="form-group">
                    {{ Form::label('name', 'Nombre') }}
                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('price', 'Precio') }}
                    {{ Form::text('price', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('stock', 'Stock') }}
                    {{ Form::text('stock', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('type', 'Tipo de producto') }}
                    {{ Form::select('type', ['combo' => 'En combo', 'only' => 'Solo'], null, ['class' => 'form-control select2']) }}
                </div>
                @if(Auth::user()->isRole('su'))
                    <div class="form-group">
                        {{ Form::label('company_id', 'Empresa') }}
                        {{ Form::select('company_id', $companies, null, ['class' => 'form-control select2']) }}
                    </div>
                @endif
                <div class="form-group" id="select_branches">
                    @include('admin.products.partials.selectBranch')
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