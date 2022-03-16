@extends('layouts/after-login')

@section('title', 'Kertas Kerja - KPI')

{{-- ========================================================== --}}
@push('metadata')
    <meta name="host" content="{{ env('HOST_SIMONIK') }}">
    <meta name="user" content="{{ request()->cookie('X-User-Id') }}">

    <meta name="level" content="{{ request()->query('level') }}">
    <meta name="unit" content="{{ request()->query('unit') }}">
    <meta name="tahun" content="{{ request()->query('tahun') }}">
@endpush

{{-- ========================================================== --}}

@push('style')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}"> {{-- required --}}
    <!-- Theme Style -->
    <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}"> {{-- required --}}
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    {{-- required --}}
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

    <!-- Custom Style for Sidebar -->
    <style>
        aside {
            color: #ffffff !important;
            background-color: #135b96 !important;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='540' height='450' viewBox='0 0 1080 900'%3E%3Cg fill-opacity='.1'%3E%3Cpolygon fill='%23444' points='90 150 0 300 180 300'/%3E%3Cpolygon points='90 150 180 0 0 0'/%3E%3Cpolygon fill='%23AAA' points='270 150 360 0 180 0'/%3E%3Cpolygon fill='%23DDD' points='450 150 360 300 540 300'/%3E%3Cpolygon fill='%23999' points='450 150 540 0 360 0'/%3E%3Cpolygon points='630 150 540 300 720 300'/%3E%3Cpolygon fill='%23DDD' points='630 150 720 0 540 0'/%3E%3Cpolygon fill='%23444' points='810 150 720 300 900 300'/%3E%3Cpolygon fill='%23FFF' points='810 150 900 0 720 0'/%3E%3Cpolygon fill='%23DDD' points='990 150 900 300 1080 300'/%3E%3Cpolygon fill='%23444' points='990 150 1080 0 900 0'/%3E%3Cpolygon fill='%23DDD' points='90 450 0 600 180 600'/%3E%3Cpolygon points='90 450 180 300 0 300'/%3E%3Cpolygon fill='%23666' points='270 450 180 600 360 600'/%3E%3Cpolygon fill='%23AAA' points='270 450 360 300 180 300'/%3E%3Cpolygon fill='%23DDD' points='450 450 360 600 540 600'/%3E%3Cpolygon fill='%23999' points='450 450 540 300 360 300'/%3E%3Cpolygon fill='%23999' points='630 450 540 600 720 600'/%3E%3Cpolygon fill='%23FFF' points='630 450 720 300 540 300'/%3E%3Cpolygon points='810 450 720 600 900 600'/%3E%3Cpolygon fill='%23DDD' points='810 450 900 300 720 300'/%3E%3Cpolygon fill='%23AAA' points='990 450 900 600 1080 600'/%3E%3Cpolygon fill='%23444' points='990 450 1080 300 900 300'/%3E%3Cpolygon fill='%23222' points='90 750 0 900 180 900'/%3E%3Cpolygon points='270 750 180 900 360 900'/%3E%3Cpolygon fill='%23DDD' points='270 750 360 600 180 600'/%3E%3Cpolygon points='450 750 540 600 360 600'/%3E%3Cpolygon points='630 750 540 900 720 900'/%3E%3Cpolygon fill='%23444' points='630 750 720 600 540 600'/%3E%3Cpolygon fill='%23AAA' points='810 750 720 900 900 900'/%3E%3Cpolygon fill='%23666' points='810 750 900 600 720 600'/%3E%3Cpolygon fill='%23999' points='990 750 900 900 1080 900'/%3E%3Cpolygon fill='%23999' points='180 0 90 150 270 150'/%3E%3Cpolygon fill='%23444' points='360 0 270 150 450 150'/%3E%3Cpolygon fill='%23FFF' points='540 0 450 150 630 150'/%3E%3Cpolygon points='900 0 810 150 990 150'/%3E%3Cpolygon fill='%23222' points='0 300 -90 450 90 450'/%3E%3Cpolygon fill='%23FFF' points='0 300 90 150 -90 150'/%3E%3Cpolygon fill='%23FFF' points='180 300 90 450 270 450'/%3E%3Cpolygon fill='%23666' points='180 300 270 150 90 150'/%3E%3Cpolygon fill='%23222' points='360 300 270 450 450 450'/%3E%3Cpolygon fill='%23FFF' points='360 300 450 150 270 150'/%3E%3Cpolygon fill='%23444' points='540 300 450 450 630 450'/%3E%3Cpolygon fill='%23222' points='540 300 630 150 450 150'/%3E%3Cpolygon fill='%23AAA' points='720 300 630 450 810 450'/%3E%3Cpolygon fill='%23666' points='720 300 810 150 630 150'/%3E%3Cpolygon fill='%23FFF' points='900 300 810 450 990 450'/%3E%3Cpolygon fill='%23999' points='900 300 990 150 810 150'/%3E%3Cpolygon points='0 600 -90 750 90 750'/%3E%3Cpolygon fill='%23666' points='0 600 90 450 -90 450'/%3E%3Cpolygon fill='%23AAA' points='180 600 90 750 270 750'/%3E%3Cpolygon fill='%23444' points='180 600 270 450 90 450'/%3E%3Cpolygon fill='%23444' points='360 600 270 750 450 750'/%3E%3Cpolygon fill='%23999' points='360 600 450 450 270 450'/%3E%3Cpolygon fill='%23666' points='540 600 630 450 450 450'/%3E%3Cpolygon fill='%23222' points='720 600 630 750 810 750'/%3E%3Cpolygon fill='%23FFF' points='900 600 810 750 990 750'/%3E%3Cpolygon fill='%23222' points='900 600 990 450 810 450'/%3E%3Cpolygon fill='%23DDD' points='0 900 90 750 -90 750'/%3E%3Cpolygon fill='%23444' points='180 900 270 750 90 750'/%3E%3Cpolygon fill='%23FFF' points='360 900 450 750 270 750'/%3E%3Cpolygon fill='%23AAA' points='540 900 630 750 450 750'/%3E%3Cpolygon fill='%23FFF' points='720 900 810 750 630 750'/%3E%3Cpolygon fill='%23222' points='900 900 990 750 810 750'/%3E%3Cpolygon fill='%23222' points='1080 300 990 450 1170 450'/%3E%3Cpolygon fill='%23FFF' points='1080 300 1170 150 990 150'/%3E%3Cpolygon points='1080 600 990 750 1170 750'/%3E%3Cpolygon fill='%23666' points='1080 600 1170 450 990 450'/%3E%3Cpolygon fill='%23DDD' points='1080 900 1170 750 990 750'/%3E%3C/g%3E%3C/svg%3E");
        }

        aside .brand-link {
            background-color: #135b96 !important;
        }
    </style>
    <!-- End : Custom Style for Sidebar -->

    <!-- Custom Style for Navbar -->
    <style>
        nav.main-header {
            color: #ffffff !important;
            background-color: #135b96 !important;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='540' height='450' viewBox='0 0 1080 900'%3E%3Cg fill-opacity='.1'%3E%3Cpolygon fill='%23444' points='90 150 0 300 180 300'/%3E%3Cpolygon points='90 150 180 0 0 0'/%3E%3Cpolygon fill='%23AAA' points='270 150 360 0 180 0'/%3E%3Cpolygon fill='%23DDD' points='450 150 360 300 540 300'/%3E%3Cpolygon fill='%23999' points='450 150 540 0 360 0'/%3E%3Cpolygon points='630 150 540 300 720 300'/%3E%3Cpolygon fill='%23DDD' points='630 150 720 0 540 0'/%3E%3Cpolygon fill='%23444' points='810 150 720 300 900 300'/%3E%3Cpolygon fill='%23FFF' points='810 150 900 0 720 0'/%3E%3Cpolygon fill='%23DDD' points='990 150 900 300 1080 300'/%3E%3Cpolygon fill='%23444' points='990 150 1080 0 900 0'/%3E%3Cpolygon fill='%23DDD' points='90 450 0 600 180 600'/%3E%3Cpolygon points='90 450 180 300 0 300'/%3E%3Cpolygon fill='%23666' points='270 450 180 600 360 600'/%3E%3Cpolygon fill='%23AAA' points='270 450 360 300 180 300'/%3E%3Cpolygon fill='%23DDD' points='450 450 360 600 540 600'/%3E%3Cpolygon fill='%23999' points='450 450 540 300 360 300'/%3E%3Cpolygon fill='%23999' points='630 450 540 600 720 600'/%3E%3Cpolygon fill='%23FFF' points='630 450 720 300 540 300'/%3E%3Cpolygon points='810 450 720 600 900 600'/%3E%3Cpolygon fill='%23DDD' points='810 450 900 300 720 300'/%3E%3Cpolygon fill='%23AAA' points='990 450 900 600 1080 600'/%3E%3Cpolygon fill='%23444' points='990 450 1080 300 900 300'/%3E%3Cpolygon fill='%23222' points='90 750 0 900 180 900'/%3E%3Cpolygon points='270 750 180 900 360 900'/%3E%3Cpolygon fill='%23DDD' points='270 750 360 600 180 600'/%3E%3Cpolygon points='450 750 540 600 360 600'/%3E%3Cpolygon points='630 750 540 900 720 900'/%3E%3Cpolygon fill='%23444' points='630 750 720 600 540 600'/%3E%3Cpolygon fill='%23AAA' points='810 750 720 900 900 900'/%3E%3Cpolygon fill='%23666' points='810 750 900 600 720 600'/%3E%3Cpolygon fill='%23999' points='990 750 900 900 1080 900'/%3E%3Cpolygon fill='%23999' points='180 0 90 150 270 150'/%3E%3Cpolygon fill='%23444' points='360 0 270 150 450 150'/%3E%3Cpolygon fill='%23FFF' points='540 0 450 150 630 150'/%3E%3Cpolygon points='900 0 810 150 990 150'/%3E%3Cpolygon fill='%23222' points='0 300 -90 450 90 450'/%3E%3Cpolygon fill='%23FFF' points='0 300 90 150 -90 150'/%3E%3Cpolygon fill='%23FFF' points='180 300 90 450 270 450'/%3E%3Cpolygon fill='%23666' points='180 300 270 150 90 150'/%3E%3Cpolygon fill='%23222' points='360 300 270 450 450 450'/%3E%3Cpolygon fill='%23FFF' points='360 300 450 150 270 150'/%3E%3Cpolygon fill='%23444' points='540 300 450 450 630 450'/%3E%3Cpolygon fill='%23222' points='540 300 630 150 450 150'/%3E%3Cpolygon fill='%23AAA' points='720 300 630 450 810 450'/%3E%3Cpolygon fill='%23666' points='720 300 810 150 630 150'/%3E%3Cpolygon fill='%23FFF' points='900 300 810 450 990 450'/%3E%3Cpolygon fill='%23999' points='900 300 990 150 810 150'/%3E%3Cpolygon points='0 600 -90 750 90 750'/%3E%3Cpolygon fill='%23666' points='0 600 90 450 -90 450'/%3E%3Cpolygon fill='%23AAA' points='180 600 90 750 270 750'/%3E%3Cpolygon fill='%23444' points='180 600 270 450 90 450'/%3E%3Cpolygon fill='%23444' points='360 600 270 750 450 750'/%3E%3Cpolygon fill='%23999' points='360 600 450 450 270 450'/%3E%3Cpolygon fill='%23666' points='540 600 630 450 450 450'/%3E%3Cpolygon fill='%23222' points='720 600 630 750 810 750'/%3E%3Cpolygon fill='%23FFF' points='900 600 810 750 990 750'/%3E%3Cpolygon fill='%23222' points='900 600 990 450 810 450'/%3E%3Cpolygon fill='%23DDD' points='0 900 90 750 -90 750'/%3E%3Cpolygon fill='%23444' points='180 900 270 750 90 750'/%3E%3Cpolygon fill='%23FFF' points='360 900 450 750 270 750'/%3E%3Cpolygon fill='%23AAA' points='540 900 630 750 450 750'/%3E%3Cpolygon fill='%23FFF' points='720 900 810 750 630 750'/%3E%3Cpolygon fill='%23222' points='900 900 990 750 810 750'/%3E%3Cpolygon fill='%23222' points='1080 300 990 450 1170 450'/%3E%3Cpolygon fill='%23FFF' points='1080 300 1170 150 990 150'/%3E%3Cpolygon points='1080 600 990 750 1170 750'/%3E%3Cpolygon fill='%23666' points='1080 600 1170 450 990 450'/%3E%3Cpolygon fill='%23DDD' points='1080 900 1170 750 990 750'/%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
    <!-- End : Custom Style for Navbar -->

    {{-- Change Color Row Table on Click --}}
    <style>
        .table tbody tr.highlight td {
            background-color: rgb(30, 41, 59);
            color: rgb(255, 255, 255);
        }
    </style>
    {{-- End : Change Color Row Table on Click --}}

    {{-- Table Header Fixed --}}
    <style>
        .table-responsive {
            height: 100vh;
            overflow: scroll;
        }

        thead tr:nth-child(1) th {
            color: #ffffff !important;
            background-color: #135b96 !important;
            position: sticky;
            top: 0;
            z-index: 10;
        }
    </style>
    {{-- End : Table Header Fixed --}}

    {{-- Legend --}}
    <style>
        fieldset.scheduler-border {
            border: 1px groove #ddd !important;
            padding: 0 1.4em 0 1.4em !important;
            -webkit-box-shadow: 0px 0px 0px 0px #000;
            box-shadow: 0px 0px 0px 0px #000;
        }

        legend.scheduler-border {
            font-size: 0.75em !important;
            font-weight: bold !important;
            text-align: left !important;
            width: auto;
            padding: 0 10px;
            border-bottom: none;
            margin-top: -15px;
            background-color: white;
            color: black;
        }
    </style>
    {{-- End : Legend --}}
@endpush

{{-- ========================================================== --}}

@push('script')
    <!-- jQuery -->
    {{-- <script src="{{ asset('template/plugins/jquery/jquery.js') }}"></script> --}} {{-- required --}}
    {{-- <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script> --}} {{-- required --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <!-- Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> {{-- required --}}
    <!-- AdminLTE App -->
    <script src="{{ asset('template/dist/js/adminlte.min.js') }}"></script> {{-- required --}}
    <!-- AdminLTE For Demo Purposes -->
    <script src="{{ asset('template/dist/js/demo.js') }}"></script> {{-- required --}}

    {{-- Drag Drop Table Sorting --}}
    <script src="{{ asset('libraries/tableDnD/jquery.tablednd.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#table').tableDnD();
        });
    </script>
    {{-- End : Drag Drop Table Sorting --}}

    {{-- Change Color Row Table on Click --}}
    <script>
        $('#table').on('click', 'tbody tr', function(event) {
            $(this).addClass('highlight').siblings().removeClass('highlight');
        });
    </script>
    {{-- End : Change Color Row Table on Click --}}

    <script>
        $(document).ready(function() {
            $("#myInput").on("keyup", function() {
                let value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endpush

{{-- ========================================================== --}}

@push('ajax-request')
    {{-- Request Level & Unit --}}
    <script>
        $(document).ready(function() {
            levels();
            units($('meta[name="level"]').attr('content'));

            //mapping option selected in filter from query params
            setTimeout(function() {
                $('select[name="level"] option').each(function() {
                    if ($(this).val() == $('meta[name="level"]').attr('content'))
                        $(this).attr("selected", "selected");
                });
                $('select[name="unit"] option').each(function() {
                    if ($(this).val() == $('meta[name="unit"]').attr('content'))
                        $(this).attr("selected", "selected");
                });
                $('input[name="tahun"]').val($('meta[name="tahun"]').attr('content'));

                disablator($('select[name="level"]').val());
            }, 2000);
        });

        $('select[name="level"]').click(function() {
            disablator($(this).val());
            units($(this).val());
        });

        function disablator(val) {
            let disabled = val == 'super-master' ? true : false;
            $('input[name="tahun"]').prop("disabled", disabled);
        }

        function levels() {
            let host = $('meta[name="host"]').attr('content');
            let user = $('meta[name="user"]').attr('content');

            $.ajax({
                type: 'GET',
                url: `${host}/user/${user}/levels`,
                data: {
                    "with-super-master": "true"
                },
                success: function(res) {
                    if (res.data.length > 0) {
                        let html = '';
                        for (let i = 0; i < res.data.length; i++) {
                            html += `<option value="${res.data[i].slug}">${res.data[i].name}</option>`;
                        }
                        $('select[name="level"]').append(html);
                    }
                },
                error: function(res) {
                    console.log(`Level : ${res.responseJSON.message}`);
                }
            });
        }

        function units(level) {
            if (level.length > 0) {
                let host = $('meta[name="host"]').attr('content');
                $.ajax({
                    type: 'GET',
                    url: `${host}/level/${level}/units`,
                    success: function(res) {
                        $('.option-item').remove();

                        if (res.data.length > 0) {
                            let html = '<option class="option-item" value="master">-- Master --</option>';
                            for (let i = 0; i < res.data.length; i++) {
                                html += `<option class="option-item" value="${res.data[i].slug}">${res.data[i].name}</option>`;
                            }
                            $('select[name="unit"]').append(html);
                        }
                    },
                    error: function(res) {
                        console.log(`Unit : ${res.responseJSON.message}`);
                    }
                });
            }
        }
    </script>
@endpush

{{-- ========================================================== --}}

@section('content')
    <div class="content-wrapper pt-3">
        @if (session()->has('danger_message'))
            @include('_alert-danger',['message' => session()->get('danger_message')])
        @else
            @if (session()->has('info_message'))
                <div class="col-md-12">
                    <div class="card bg-info">
                        <div class="card-header">
                            <h3 class="card-title">Info</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @include('_alert-info',['message' => session()->get('info_message')])
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            @endif

            @if ($errors->any())
                <div class="col-md-12">
                    <div class="card bg-danger">
                        <div class="card-header">
                            <h3 class="card-title">Alert</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            @foreach ($errors->all() as $errorV)
                                <p class="small">{{ $errorV }}</p>
                            @endforeach
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            @endif

            {{-- section: feature --}}
            @if (!is_null(request()->query('level')) && in_array(request()->cookie('X-Role'), ['super-admin', 'admin']))
                <div class="col-md-12">
                    <div class="card border-0 shadow rounded">
                        <!-- card-header -->
                        <div class="card-header">
                            <h3 class="card-title">FITUR</h3>
                        </div>
                        <!-- end : card-header -->

                        <!-- card-body -->
                        <div class="card-body">
                            <div class="row">
                                @if (!is_null($response))
                                    @if (!empty($response->data->permissions) && $response->data->permissions->indicator->create)
                                        <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                            <fieldset class="scheduler-border">
                                                <legend class="scheduler-border"><i class="fas fa-key"></i> KPI</legend>
                                                <a href="{{ route('simonik.indicators.create') }}" class="btn btn-block btn-info btn-sm mb-3" data-toggle="tooltip" data-placement="bottom" title="Create">Create</a>
                                            </fieldset>
                                        </div>
                                    @endif

                                    @if ((!empty($response->data->permissions) && $response->data->permissions->reference->create) || (!empty($response->data->permissions) && $response->data->permissions->reference->edit))
                                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                            <fieldset class="scheduler-border">
                                                <legend class="scheduler-border"><i class="fas fa-link"></i> Referensi - KPI</legend>

                                                <div class="row">
                                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        @if (!empty($response->data->permissions) && $response->data->permissions->reference->create)
                                                            <a href="{{ route('simonik.indicators.paper-work.reference.create') }}" class="btn btn-block btn-info btn-sm mb-3" data-toggle="tooltip" data-placement="bottom" title="Create">Create</a>
                                                        @endif
                                                    </div>
                                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                        @if (!empty($response->data->permissions) && $response->data->permissions->reference->edit && (request()->query('level') === 'super-master' || request()->query('unit') === 'master'))
                                                            <a href="{{ route('simonik.indicators.paper-work.reference.edit', ['level' => request()->query('level'),'unit' => request()->query('unit'),'tahun' => request()->query('tahun')]) }}" class="btn btn-block btn-info btn-sm mb-3" data-toggle="tooltip" data-placement="bottom" title="Edit">Edit</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    @endif

                                    @if ((!empty($response->data->permissions) && $response->data->permissions->paper_work->indicator->create) || (!empty($response->data->permissions) && $response->data->permissions->paper_work->indicator->edit) || (!empty($response->data->permissions) && $response->data->permissions->paper_work->indicator->delete))
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <fieldset class="scheduler-border">
                                                <legend class="scheduler-border"><i class="fas fa-list-ol"></i> Kertas Kerja - KPI</legend>

                                                <div class="row">
                                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                        @if (!empty($response->data->permissions) && $response->data->permissions->paper_work->indicator->create)
                                                            <a href="{{ route('simonik.indicators.paper-work.create') }}" class="btn btn-block btn-info btn-sm mb-3" data-toggle="tooltip" data-placement="bottom" title="Create">Create</a>
                                                        @endif
                                                    </div>

                                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                        @if (!empty($response->data->permissions) && $response->data->permissions->paper_work->indicator->edit)
                                                            @if (request()->query('level') !== 'super-master')
                                                                <a href="{{ route('simonik.indicators.paper-work.edit', ['level' => request()->query('level'),'unit' => request()->query('unit'),'tahun' => request()->query('tahun')]) }}" class="btn btn-block btn-info btn-sm mb-3" data-toggle="tooltip" data-placement="bottom" title="Edit">Edit</a>
                                                            @endif
                                                        @endif
                                                    </div>

                                                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                        @if (!empty($response->data->permissions) && $response->data->permissions->paper_work->indicator->delete)
                                                            @if (request()->query('level') !== 'super-master')
                                                                <a href="{{ route('simonik.indicators.paper-work.delete', ['level' => request()->query('level'),'unit' => request()->query('unit'),'tahun' => request()->query('tahun')]) }}" class="btn btn-block btn-info btn-sm mb-3" data-toggle="tooltip" data-placement="bottom" title="Delete">Delete</a>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <!-- end : card-body -->
                    </div>
                </div>
            @endif
            {{-- end section: feature --}}

            {{-- section: table --}}
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">

                    <!-- card-header -->
                    <div class="card-header">
                        <h3 class="card-title">KERTAS KERJA - KPI
                            / LEVEL :
                            {{ request()->query('level') == null ? '-' : cast_to_upper(request()->query('level')) }}
                            / UNIT :
                            {{ request()->query('unit') == null ? '-' : cast_to_upper(request()->query('unit')) }}
                            / TAHUN :
                            {{ request()->query('tahun') == null ? '-' : cast_to_upper(request()->query('tahun')) }}
                        </h3>
                    </div>
                    <!-- end : card-header -->

                    <!-- card-body -->
                    <div class="card-body">

                        <div class="row">

                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <form action="{{ route('simonik.indicators.paper-work.index') }}" method="get">
                                    <div class="input-group input-group-sm mb-3">
                                        <span class="input-group-append">
                                            <span class="input-group-text">Level</span>
                                        </span>

                                        <select class="custom-select" name="level"></select>

                                        <span class="input-group-append">
                                            <span class="input-group-text">Unit Kerja</span>
                                        </span>

                                        <select class="custom-select" name="unit"></select>

                                        <span class="input-group-append">
                                            <span class="input-group-text">Tahun</span>
                                        </span>

                                        <input type="text" class="form-control" name="tahun" />

                                        <span class="input-group-append">
                                            <button type="submit" class="btn btn-info btn-flat" data-toggle="tooltip" data-placement="buttom" title="Search"><i class="fas fa-search"></i></button>
                                        </span>
                                    </div>
                                </form>
                            </div>

                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                @if (is_null($response))
                                    <h3 class="text-center font-weight-bold">Lakukan Filter</h3>
                                @else
                                    @if (empty($response->data->indicators))
                                        <h3 class="text-center font-weight-bold">Data Tidak Tersedia</h3>
                                    @else
                                        <input class="form-control form-control-sm mb-3" id="myInput" type="text" placeholder="Cari KPI..">

                                        <form action="{{ route('simonik.indicators.paper-work.reorder', ['level' => request()->query('level'),'unit' => request()->query('unit'),'tahun' => request()->query('tahun')]) }}" method="post">
                                            @csrf
                                            @method('put')

                                            <a href="#table"><span class="badge badge-pill badge-info">Focus on table</span></a>

                                            <div class="table-responsive">
                                                <table class="table table-bordered table-sm" id="table">
                                                    <thead class="small">
                                                        <tr>
                                                            <th class="text-center">UBAH URUTAN</th>
                                                            <th class="text-center">KPI</th>
                                                            <th class="text-center">FORMULA</th>
                                                            <th class="text-center">SATUAN</th>
                                                            <th class="text-center">POLARITAS</th>
                                                            <th class="text-center">BERLAKU</th>
                                                            <th class="text-center">BOBOT</th>
                                                            <th class="text-center"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="myTable" class="small">
                                                        @foreach ($response->data->indicators as $indicator)
                                                            <tr style="background-color: rgb({{ $indicator->bg_color->r }}, {{ $indicator->bg_color->g }}, {{ $indicator->bg_color->b }}); @if (($indicator->bg_color->r < 127.5) && ($indicator->bg_color->g < 127.5) && ($indicator->bg_color->b < 127.5)) color: white; @endif">
                                                                <td class="text-center">
                                                                    <span><i class="fas fa-arrows-alt-v"></i></span>
                                                                </td>
                                                                <td>
                                                                    <p>{{ $indicator->indicator }} <span class="badge badge-info">{{ $indicator->type }}</span></p>
                                                                </td>
                                                                <td class="small">
                                                                    {{ $indicator->formula }}
                                                                </td>
                                                                <td class="text-center">
                                                                    {{ $indicator->measure }}
                                                                </td>
                                                                <td class="text-center">
                                                                    <span class="badge badge-secondary">
                                                                        {!! $indicator->polarity !!}
                                                                    </span>
                                                                </td>
                                                                <td class="text-center">
                                                                    @forelse ($indicator->validity as $key => $value)
                                                                        <span class="badge badge-secondary">{{ $key }}</span>
                                                                    @empty
                                                                        <p>-</p>
                                                                    @endforelse
                                                                </td>
                                                                <td class="text-center">
                                                                    @forelse ($indicator->weight as $key => $value)
                                                                        <span class="badge badge-secondary">{{ $key }} : {{ $value }}</span>
                                                                    @empty
                                                                        <p>-</p>
                                                                    @endforelse
                                                                </td>
                                                                <td class="text-center">
                                                                    <div class="btn-group">
                                                                        @if ($response->data->permissions->indicator->edit)
                                                                            <a href="{{ route('simonik.indicators.edit', ['id' => $indicator->id, 'level' => request()->query('level'),'unit' => request()->query('unit'),'tahun' => request()->query('tahun')]) }}" class="btn btn-outline-info btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fas fa-edit"></i></a>
                                                                        @endif
                                                                        @if ($response->data->permissions->indicator->delete)
                                                                            <a href="{{ route('simonik.indicators.delete', ['id' => $indicator->id, 'name' => $indicator->indicator, 'level' => request()->query('level'),'unit' => request()->query('unit'),'tahun' => request()->query('tahun')]) }}" class="btn btn-outline-info btn-sm" data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                                                        @endif
                                                                    </div>

                                                                    <input type="hidden" name="indicators[]" value="{{ $indicator->id }}">
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                            @if ($response->data->permissions->indicator->changes_order)
                                                <button type="submit" class="btn btn-sm btn-info float-right mt-2">Simpan Perubahan Urutan</button>
                                            @endif
                                        </form>
                                    @endif
                                @endif
                            </div>
                        </div>

                    </div>
                    <!-- end : card-body -->

                    <!-- card-footer -->
                    <div class="card-footer clearfix"></div>
                    <!-- end : card-footer -->

                </div>
            </div>
            {{-- end section: table --}}

        @endif
    </div>
@endsection
