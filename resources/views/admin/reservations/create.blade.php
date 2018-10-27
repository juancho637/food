@extends('admin._layouts.main')

@section('title', config('app.name').' | Reservaciones')

@section('header', 'Reservaciones')

@push('styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('/plugins/select2/dist/css/select2.min.css') }}">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="{{ asset('/plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') }}">
@endpush

@section('description', 'Crear reservación')

@section('content')
    <div class="box box-primary">
        <div class="box-body">
            {!! Form::open(['route' => 'reservations.store']) !!}
                <div class="form-group">
                    {{ Form::label('date', 'Fecha') }}
                    {{ Form::text('date', \Carbon\Carbon::now(), ['class' => 'form-control datepicker']) }}
                </div>
                @if(Auth::user()->isRole('su'))
                    <div class="form-group">
                        {{ Form::label('user_id', 'Cliente') }}
                        {{ Form::select('user_id', $users, null, ['class' => 'form-control select2']) }}
                    </div>
                @endif
                @if(Auth::user()->isRole('su'))
                    <div class="form-group">
                        {{ Form::label('company_id', 'Empresa') }}
                        {{ Form::select('company_id', $companies, null, ['class' => 'form-control select2']) }}
                    </div>
                @endif
                <div class="form-group" id="select_branches">
                    {{ Form::label('branch_id', 'Sucursal') }}
                    @if($branches)
                        {{ Form::select('branch_id', $branches, null, ['class' => 'form-control select2']) }}
                    @else
                        {{ Form::select('branch_id', [null => 'Seleccione una sucursal...'], null, ['class' => 'form-control select2']) }}
                    @endif
                </div>
                <div class="form-group" id="select_products">
                    @include('admin.reservations.partials.selectProduct')
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
    <!-- bootstrap datepicker -->
    <script src="{{ asset('/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}" charset="UTF-8"></script>
    <script src="{{ asset('/plugins/bootstrap-datepicker/dist/locales/bootstrap-datepicker.es.min.js') }}"></script>

    <!-- Code -->
    <script>
        //Initialize Select2 Elements
        $('.select2').select2();

        //Initialize Datepicker
        $('.datepicker').datepicker({
            autoclose: true,
            language: 'es',
            format: 'yyyy-mm-dd',
            startDate: new Date(),
        });

        let company = $('#company_id');

        searchBranches(company.val()).done(function (response) {
            $('#select_branches').html(response.view).promise().done(function(){
                searchProducts($('#branch_id').val()).done(function (response) {
                    $('#select_products').html(response.view);
                });
            });
        });

        company.change(function () {
            searchBranches($(this).val()).done(function (response) {
                $('#select_branches').html(response.view).promise().done(function(){
                    searchProducts($('#branch_id').val()).done(function (response) {
                        $('#select_products').html(response.view);
                    });
                });
            });
        });

        function searchBranches(company_id) {
            let url = "{{ route('companies.branches.index', [':company_id']) }}";
            url = url.replace(':company_id', company_id);

            return $.get(url);
        }

        $(document).on('change', '#branch_id', function () {
            searchProducts($(this).val()).done(function (response) {
                $('#select_products').html(response.view);
            });
        });

        function searchProducts(branch_id) {
            let url = "{{ route('branches.products.index', [':branch_id']) }}";
            url = url.replace(':branch_id', branch_id);

            return $.get(url);
        }
    </script>
@endpush