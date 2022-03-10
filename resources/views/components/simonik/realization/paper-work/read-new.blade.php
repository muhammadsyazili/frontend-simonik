@extends('layouts/after-login')

@section('title', 'Kertas Kerja - Realisasi')

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

    {{-- Table Header Fixed --}}
    <style>
        .table-responsive {
            height: 100vh;
            overflow: scroll;
        }

        thead tr.first th,
        thead tr.first td {
            color: #ffffff !important;
            background-color: #135b96 !important;
            position: sticky;
            position: -webkit-sticky;
            /* Safari */
            top: 0;
            z-index: 10;
        }

        thead tr.second th,
        thead tr.second td {
            color: #ffffff !important;
            background-color: #135b96 !important;
            position: sticky;
            position: -webkit-sticky;
            /* Safari */
            top: 0;
            z-index: 10;
        }

    </style>
    {{-- End : Table Header Fixed --}}

    <!-- Change Color Row Table on Click -->
    <style>
        .table tbody tr.highlight td {
            background-color: rgb(30, 41, 59);
            color: rgb(255, 255, 255);
        }

    </style>
    <!-- End : Change Color Row Table on Click -->
@endpush

{{-- ========================================================== --}}

@push('script')
    <!-- jQuery -->
    <script src="{{ asset('template/plugins/jquery/jquery.js') }}"></script> {{-- required --}}
    <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script> {{-- required --}}
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> {{-- required --}}
    <!-- bs-custom-file-input -->
    <script src="{{ asset('template/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('template/dist/js/adminlte.min.js') }}"></script> {{-- required --}}
    <!-- AdminLTE For Demo Purposes -->
    <script src="{{ asset('template/dist/js/demo.js') }}"></script> {{-- required --}}

    {{-- Change Color Row Table on Click --}}
    <script>
        $('#table').on('click', 'tbody tr', function(event) {
            $(this).addClass('highlight').siblings().removeClass('highlight');
        });
    </script>
    {{-- End : Change Color Row Table on Click --}}

    {{-- Table Header Fixed --}}
    <script>
        $(document).ready(function() {
            let firstheight = $('.first').height();
            $("thead tr.second th, thead tr.second td").css("top", firstheight);
        });
    </script>
    {{-- End : Table Header Fixed --}}

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
            }, 2000);
        });

        $('select[name="level"]').click(function() {
            units($(this).val());
        });

        function levels() {
            let host = $('meta[name="host"]').attr('content');
            let user = $('meta[name="user"]').attr('content');

            $.ajax({
                type: 'GET',
                url: `${host}/user/${user}/levels`,
                data: {
                    "with-super-master": "false"
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
                            let html = '';
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

    {{-- Request locked/un-locked --}}
    <script>
        $(document).on('click', '.lock-action', function() {
            let host = $('meta[name="host"]').attr('content');
            let id = $(this).data('id');
            let month = $(this).data('month');

            $.ajax({
                type: 'GET',
                headers: {
                    'X-User-Id': $('meta[name="user"]').attr('content')
                },
                url: `${host}/realizations/paper-work/${id}/${month}/lock/change`,
                success: function(res) {
                    location.reload();
                },
                error: function(res) {
                    console.log(`Error : ${res.responseJSON.message}`);
                }
            });
        });
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

            {{-- section: template download/upload --}}
            @if (!is_null($response))
                @if (!empty($response->data->indicators))
                    <div class="col-md-12">
                        <div class="card border-0 shadow rounded">
                            <!-- card-header -->
                            <div class="card-header">
                                <h3 class="card-title">ADD REALISASI VIA EXCEL</h3>
                            </div>
                            <!-- end : card-header -->

                            <!-- card-body -->
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
                                        <a href="{{ route('simonik.realizations.paper-work.export', ['level' => request()->query('level'),'unit' => request()->query('unit'),'tahun' => request()->query('tahun')]) }}" class="btn btn-info btn-block" data-toggle="tooltip" data-placement="bottom" title="Download Template"><i class="fas fa-file-download"></i></a>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
                                        <form action="#" method="post">
                                            <div class="form-group form-group-sm">
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" id="template">
                                                        <label class="custom-file-label" for="template">Choose file</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <button type="submit" class="btn btn-info btn-block" data-toggle="tooltip" data-placement="buttom" title="Upload File"><i class="fas fa-file-upload"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- end : card-body -->
                        </div>
                    </div>
                @endif
            @endif
            {{-- end section: template download/upload --}}

            {{-- section: table --}}
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <!-- card-header -->
                    <div class="card-header">
                        <h3 class="card-title">KERTAS KERJA - REALISASI
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
                                <form action="{{ route('simonik.realizations.paper-work.index') }}" method="get">
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

                                        <form action="{{ route('simonik.realizations.paper-work.update') }}"
                                            method="post">
                                            @csrf
                                            @method('put')

                                            <a href="#table"><span class="badge badge-pill badge-info">Focus on table</span></a>

                                            <div class="table-responsive">
                                                <table class="table table-bordered table-sm" id="table">
                                                    <thead class="small">
                                                        <tr class="first">
                                                            <th class="text-center" rowspan="2">KPI</th>
                                                            <th class="text-center" rowspan="2">FORMULA</th>
                                                            <th class="text-center" rowspan="2">SATUAN</th>
                                                            <th class="text-center" rowspan="2">POLARITAS</th>
                                                            <th class="text-center" rowspan="2">BERLAKU</th>
                                                            <th class="text-center" rowspan="2">BOBOT</th>
                                                            <th class="text-center" colspan="12">TARGET (T) & REALISASI (R)</th>
                                                        </tr>
                                                        <tr class="second">
                                                            <th class="text-center">Jan</th>
                                                            <th class="text-center">Feb</th>
                                                            <th class="text-center">Mar</th>
                                                            <th class="text-center">Apr</th>
                                                            <th class="text-center">May</th>
                                                            <th class="text-center">Jun</th>
                                                            <th class="text-center">Jul</th>
                                                            <th class="text-center">Aug</th>
                                                            <th class="text-center">Sep</th>
                                                            <th class="text-center">Oct</th>
                                                            <th class="text-center">Nov</th>
                                                            <th class="text-center">Dec</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-nowrap small" id="myTable">
                                                        @foreach ($response->data->indicators as $indicator)
                                                            <tr style="background-color: rgb({{ $indicator->bg_color->r }}, {{ $indicator->bg_color->g }}, {{ $indicator->bg_color->b }}); @if ($indicator->bg_color->r < 127.5 && $indicator->bg_color->g < 127.5 && $indicator->bg_color->b < 127.5) color: white; @endif">
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
                                                                {{-- ------------------------------------------------------------------------------ --}}
                                                                <td class="text-center">
                                                                    @if (!is_null($indicator->realizations->jan->value))
                                                                        @if (!is_null($indicator->targets->jan->value))
                                                                            <div class="input-group input-group-sm mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text">T</span>
                                                                                </div>
                                                                                <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->targets->jan->value }}" style="width: 200px;" readonly>
                                                                            </div>
                                                                        @endif

                                                                        <div class="input-group input-group-sm mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">R</span>
                                                                            </div>
                                                                            <input type="number" step="any" min="0" class="form-control" name="realizations[{{ $indicator->id }}][jan]" value="{{ $indicator->realizations->jan->value }}" style="width: 200px;" @if ($indicator->realizations->jan->readonly) readonly @endif>
                                                                            @if ($indicator->change_lock)
                                                                                <div class="input-group-append">
                                                                                    <button class="btn @if ($indicator->realizations->jan->locked){{ 'btn-success' }}@else{{ 'btn-danger' }}@endif lock-action" type="button" data-id="{{ $indicator->id }}" data-month="jan" data-toggle="tooltip" data-placement="bottom" title="@if ($indicator->realizations->jan->locked) ststus: locked @else status: un-locked @endif">@if ($indicator->realizations->jan->locked) <i class="fas fa-lock"></i> @else <i class="fas fa-lock-open"></i> @endif</button>
                                                                                </div>
                                                                            @endif
                                                                        </div>

                                                                        <p class="text-info small">Last update: {{ $indicator->realizations->jan->updated_at }}</p>
                                                                    @endif
                                                                </td>

                                                                <td class="text-center">
                                                                    @if (!is_null($indicator->realizations->feb->value))
                                                                        @if (!is_null($indicator->targets->feb->value))
                                                                            <div class="input-group input-group-sm mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text">T</span>
                                                                                </div>
                                                                                <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->targets->feb->value }}" style="width: 200px;" readonly>
                                                                            </div>
                                                                        @endif

                                                                        <div class="input-group input-group-sm mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">R</span>
                                                                            </div>
                                                                            <input type="number" step="any" min="0" class="form-control" name="realizations[{{ $indicator->id }}][feb]" value="{{ $indicator->realizations->feb->value }}" style="width: 200px;" @if ($indicator->realizations->feb->readonly) readonly @endif>
                                                                            @if ($indicator->change_lock)
                                                                                <div class="input-group-append">
                                                                                    <button class="btn @if ($indicator->realizations->feb->locked){{ 'btn-success' }}@else{{ 'btn-danger' }}@endif lock-action" type="button" data-id="{{ $indicator->id }}" data-month="feb" data-toggle="tooltip" data-placement="bottom" title="@if ($indicator->realizations->feb->locked) ststus: locked @else status: un-locked @endif">@if ($indicator->realizations->feb->locked) <i class="fas fa-lock"></i> @else <i class="fas fa-lock-open"></i> @endif</button>
                                                                                </div>
                                                                            @endif
                                                                        </div>

                                                                        <p class="text-info small">Last update: {{ $indicator->realizations->feb->updated_at }}</p>
                                                                    @endif
                                                                </td>

                                                                <td class="text-center">
                                                                    @if (!is_null($indicator->realizations->mar->value))
                                                                        @if (!is_null($indicator->targets->mar->value))
                                                                            <div class="input-group input-group-sm mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text">T</span>
                                                                                </div>
                                                                                <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->targets->mar->value }}" style="width: 200px;" readonly>
                                                                            </div>
                                                                        @endif

                                                                        <div class="input-group input-group-sm mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">R</span>
                                                                            </div>
                                                                            <input type="number" step="any" min="0" class="form-control" name="realizations[{{ $indicator->id }}][mar]" value="{{ $indicator->realizations->mar->value }}" style="width: 200px;" @if ($indicator->realizations->mar->readonly) readonly @endif>
                                                                            @if ($indicator->change_lock)
                                                                                <div class="input-group-append">
                                                                                    <button class="btn @if ($indicator->realizations->mar->locked){{ 'btn-success' }}@else{{ 'btn-danger' }}@endif lock-action" type="button" data-id="{{ $indicator->id }}" data-month="mar" data-toggle="tooltip" data-placement="bottom" title="@if ($indicator->realizations->mar->locked) ststus: locked @else status: un-locked @endif">@if ($indicator->realizations->mar->locked) <i class="fas fa-lock"></i> @else <i class="fas fa-lock-open"></i> @endif</button>
                                                                                </div>
                                                                            @endif
                                                                        </div>

                                                                        <p class="text-info small">Last update: {{ $indicator->realizations->mar->updated_at }}</p>
                                                                    @endif
                                                                </td>

                                                                <td class="text-center">
                                                                    @if (!is_null($indicator->realizations->apr->value))
                                                                        @if (!is_null($indicator->targets->apr->value))
                                                                            <div class="input-group input-group-sm mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text">T</span>
                                                                                </div>
                                                                                <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->targets->apr->value }}" style="width: 200px;" readonly>
                                                                            </div>
                                                                        @endif

                                                                        <div class="input-group input-group-sm mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">R</span>
                                                                            </div>
                                                                            <input type="number" step="any" min="0" class="form-control" name="realizations[{{ $indicator->id }}][apr]" value="{{ $indicator->realizations->apr->value }}" style="width: 200px;" @if ($indicator->realizations->apr->readonly) readonly @endif>
                                                                            @if ($indicator->change_lock)
                                                                                <div class="input-group-append">
                                                                                    <button class="btn @if ($indicator->realizations->apr->locked){{ 'btn-success' }}@else{{ 'btn-danger' }}@endif lock-action" type="button" data-id="{{ $indicator->id }}" data-month="apr" data-toggle="tooltip" data-placement="bottom" title="@if ($indicator->realizations->apr->locked) ststus: locked @else status: un-locked @endif">@if ($indicator->realizations->apr->locked) <i class="fas fa-lock"></i> @else <i class="fas fa-lock-open"></i> @endif</button>
                                                                                </div>
                                                                            @endif
                                                                        </div>

                                                                        <p class="text-info small">Last update: {{ $indicator->realizations->apr->updated_at }}</p>
                                                                    @endif
                                                                </td>

                                                                <td class="text-center">
                                                                    @if (!is_null($indicator->realizations->may->value))
                                                                        @if (!is_null($indicator->targets->may->value))
                                                                            <div class="input-group input-group-sm mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text">T</span>
                                                                                </div>
                                                                                <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->targets->may->value }}" style="width: 200px;" readonly>
                                                                            </div>
                                                                        @endif

                                                                        <div class="input-group input-group-sm mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">R</span>
                                                                            </div>
                                                                            <input type="number" step="any" min="0" class="form-control" name="realizations[{{ $indicator->id }}][may]" value="{{ $indicator->realizations->may->value }}" style="width: 200px;" @if ($indicator->realizations->may->readonly) readonly @endif>
                                                                            @if ($indicator->change_lock)
                                                                                <div class="input-group-append">
                                                                                    <button class="btn @if ($indicator->realizations->may->locked){{ 'btn-success' }}@else{{ 'btn-danger' }}@endif lock-action" type="button" data-id="{{ $indicator->id }}" data-month="may" data-toggle="tooltip" data-placement="bottom" title="@if ($indicator->realizations->may->locked) ststus: locked @else status: un-locked @endif">@if ($indicator->realizations->may->locked) <i class="fas fa-lock"></i> @else <i class="fas fa-lock-open"></i> @endif</button>
                                                                                </div>
                                                                            @endif
                                                                        </div>

                                                                        <p class="text-info small">Last update: {{ $indicator->realizations->may->updated_at }}</p>
                                                                    @endif
                                                                </td>

                                                                <td class="text-center">
                                                                    @if (!is_null($indicator->realizations->jun->value))
                                                                        @if (!is_null($indicator->targets->jun->value))
                                                                            <div class="input-group input-group-sm mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text">T</span>
                                                                                </div>
                                                                                <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->targets->jun->value }}" style="width: 200px;" readonly>
                                                                            </div>
                                                                        @endif

                                                                        <div class="input-group input-group-sm mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">R</span>
                                                                            </div>
                                                                            <input type="number" step="any" min="0" class="form-control" name="realizations[{{ $indicator->id }}][jun]" value="{{ $indicator->realizations->jun->value }}" style="width: 200px;" @if ($indicator->realizations->jun->readonly) readonly @endif>
                                                                            @if ($indicator->change_lock)
                                                                                <div class="input-group-append">
                                                                                    <button class="btn @if ($indicator->realizations->jun->locked){{ 'btn-success' }}@else{{ 'btn-danger' }}@endif lock-action" type="button" data-id="{{ $indicator->id }}" data-month="jun" data-toggle="tooltip" data-placement="bottom" title="@if ($indicator->realizations->jun->locked) ststus: locked @else status: un-locked @endif">@if ($indicator->realizations->jun->locked) <i class="fas fa-lock"></i> @else <i class="fas fa-lock-open"></i> @endif</button>
                                                                                </div>
                                                                            @endif
                                                                        </div>

                                                                        <p class="text-info small">Last update: {{ $indicator->realizations->jun->updated_at }}</p>
                                                                    @endif
                                                                </td>

                                                                <td class="text-center">
                                                                    @if (!is_null($indicator->realizations->jul->value))
                                                                        @if (!is_null($indicator->targets->jul->value))
                                                                            <div class="input-group input-group-sm mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text">T</span>
                                                                                </div>
                                                                                <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->targets->jul->value }}" style="width: 200px;" readonly>
                                                                            </div>
                                                                        @endif

                                                                        <div class="input-group input-group-sm mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">R</span>
                                                                            </div>
                                                                            <input type="number" step="any" min="0" class="form-control" name="realizations[{{ $indicator->id }}][jul]" value="{{ $indicator->realizations->jul->value }}" style="width: 200px;" @if ($indicator->realizations->jul->readonly) readonly @endif>
                                                                            @if ($indicator->change_lock)
                                                                                <div class="input-group-append">
                                                                                    <button class="btn @if ($indicator->realizations->jul->locked){{ 'btn-success' }}@else{{ 'btn-danger' }}@endif lock-action" type="button" data-id="{{ $indicator->id }}" data-month="jul" data-toggle="tooltip" data-placement="bottom" title="@if ($indicator->realizations->jul->locked) ststus: locked @else status: un-locked @endif">@if ($indicator->realizations->jul->locked) <i class="fas fa-lock"></i> @else <i class="fas fa-lock-open"></i> @endif</button>
                                                                                </div>
                                                                            @endif
                                                                        </div>

                                                                        <p class="text-info small">Last update: {{ $indicator->realizations->jul->updated_at }}</p>
                                                                    @endif
                                                                </td>

                                                                <td class="text-center">
                                                                    @if (!is_null($indicator->realizations->aug->value))
                                                                        @if (!is_null($indicator->targets->aug->value))
                                                                            <div class="input-group input-group-sm mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text">T</span>
                                                                                </div>
                                                                                <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->targets->aug->value }}" style="width: 200px;" readonly>
                                                                            </div>
                                                                        @endif

                                                                        <div class="input-group input-group-sm mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">R</span>
                                                                            </div>
                                                                            <input type="number" step="any" min="0" class="form-control" name="realizations[{{ $indicator->id }}][aug]" value="{{ $indicator->realizations->aug->value }}" style="width: 200px;" @if ($indicator->realizations->aug->readonly) readonly @endif>
                                                                            @if ($indicator->change_lock)
                                                                                <div class="input-group-append">
                                                                                    <button class="btn @if ($indicator->realizations->aug->locked){{ 'btn-success' }}@else{{ 'btn-danger' }}@endif lock-action" type="button" data-id="{{ $indicator->id }}" data-month="aug" data-toggle="tooltip" data-placement="bottom" title="@if ($indicator->realizations->aug->locked) ststus: locked @else status: un-locked @endif">@if ($indicator->realizations->aug->locked) <i class="fas fa-lock"></i> @else <i class="fas fa-lock-open"></i> @endif</button>
                                                                                </div>
                                                                            @endif
                                                                        </div>

                                                                        <p class="text-info small">Last update: {{ $indicator->realizations->aug->updated_at }}</p>
                                                                    @endif
                                                                </td>

                                                                <td class="text-center">
                                                                    @if (!is_null($indicator->realizations->sep->value))
                                                                        @if (!is_null($indicator->targets->sep->value))
                                                                            <div class="input-group input-group-sm mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text">T</span>
                                                                                </div>
                                                                                <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->targets->sep->value }}" style="width: 200px;" readonly>
                                                                            </div>
                                                                        @endif

                                                                        <div class="input-group input-group-sm mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">R</span>
                                                                            </div>
                                                                            <input type="number" step="any" min="0" class="form-control" name="realizations[{{ $indicator->id }}][sep]" value="{{ $indicator->realizations->sep->value }}" style="width: 200px;" @if ($indicator->realizations->sep->readonly) readonly @endif>
                                                                            @if ($indicator->change_lock)
                                                                                <div class="input-group-append">
                                                                                    <button class="btn @if ($indicator->realizations->sep->locked){{ 'btn-success' }}@else{{ 'btn-danger' }}@endif lock-action" type="button" data-id="{{ $indicator->id }}" data-month="sep" data-toggle="tooltip" data-placement="bottom" title="@if ($indicator->realizations->sep->locked) ststus: locked @else status: un-locked @endif">@if ($indicator->realizations->sep->locked) <i class="fas fa-lock"></i> @else <i class="fas fa-lock-open"></i> @endif</button>
                                                                                </div>
                                                                            @endif
                                                                        </div>

                                                                        <p class="text-info small">Last update: {{ $indicator->realizations->sep->updated_at }}</p>
                                                                    @endif
                                                                </td>

                                                                <td class="text-center">
                                                                    @if (!is_null($indicator->realizations->oct->value))
                                                                        @if (!is_null($indicator->targets->oct->value))
                                                                            <div class="input-group input-group-sm mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text">T</span>
                                                                                </div>
                                                                                <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->targets->oct->value }}" style="width: 200px;" readonly>
                                                                            </div>
                                                                        @endif

                                                                        <div class="input-group input-group-sm mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">R</span>
                                                                            </div>
                                                                            <input type="number" step="any" min="0" class="form-control" name="realizations[{{ $indicator->id }}][oct]" value="{{ $indicator->realizations->oct->value }}" style="width: 200px;" @if ($indicator->realizations->oct->readonly) readonly @endif>
                                                                            @if ($indicator->change_lock)
                                                                                <div class="input-group-append">
                                                                                    <button class="btn @if ($indicator->realizations->oct->locked){{ 'btn-success' }}@else{{ 'btn-danger' }}@endif lock-action" type="button" data-id="{{ $indicator->id }}" data-month="oct" data-toggle="tooltip" data-placement="bottom" title="@if ($indicator->realizations->oct->locked) ststus: locked @else status: un-locked @endif">@if ($indicator->realizations->oct->locked) <i class="fas fa-lock"></i> @else <i class="fas fa-lock-open"></i> @endif</button>
                                                                                </div>
                                                                            @endif
                                                                        </div>

                                                                        <p class="text-info small">Last update: {{ $indicator->realizations->oct->updated_at }}</p>
                                                                    @endif
                                                                </td>

                                                                <td class="text-center">
                                                                    @if (!is_null($indicator->realizations->nov->value))
                                                                        @if (!is_null($indicator->targets->nov->value))
                                                                            <div class="input-group input-group-sm mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text">T</span>
                                                                                </div>
                                                                                <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->targets->nov->value }}" style="width: 200px;" readonly>
                                                                            </div>
                                                                        @endif

                                                                        <div class="input-group input-group-sm mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">R</span>
                                                                            </div>
                                                                            <input type="number" step="any" min="0" class="form-control" name="realizations[{{ $indicator->id }}][nov]" value="{{ $indicator->realizations->nov->value }}" style="width: 200px;" @if ($indicator->realizations->nov->readonly) readonly @endif>
                                                                            @if ($indicator->change_lock)
                                                                                <div class="input-group-append">
                                                                                    <button class="btn @if ($indicator->realizations->nov->locked){{ 'btn-success' }}@else{{ 'btn-danger' }}@endif lock-action" type="button" data-id="{{ $indicator->id }}" data-month="nov" data-toggle="tooltip" data-placement="bottom" title="@if ($indicator->realizations->nov->locked) ststus: locked @else status: un-locked @endif">@if ($indicator->realizations->nov->locked) <i class="fas fa-lock"></i> @else <i class="fas fa-lock-open"></i> @endif</button>
                                                                                </div>
                                                                            @endif
                                                                        </div>

                                                                        <p class="text-info small">Last update: {{ $indicator->realizations->nov->updated_at }}</p>
                                                                    @endif
                                                                </td>

                                                                <td class="text-center">
                                                                    @if (!is_null($indicator->realizations->dec->value))
                                                                        @if (!is_null($indicator->targets->dec->value))
                                                                            <div class="input-group input-group-sm mb-3">
                                                                                <div class="input-group-prepend">
                                                                                    <span class="input-group-text">T</span>
                                                                                </div>
                                                                                <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->targets->dec->value }}" style="width: 200px;" readonly>
                                                                            </div>
                                                                        @endif

                                                                        <div class="input-group input-group-sm mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">R</span>
                                                                            </div>
                                                                            <input type="number" step="any" min="0" class="form-control" name="realizations[{{ $indicator->id }}][dec]" value="{{ $indicator->realizations->dec->value }}" style="width: 200px;" @if ($indicator->realizations->dec->readonly) readonly @endif>
                                                                            @if ($indicator->change_lock)
                                                                                <div class="input-group-append">
                                                                                    <button class="btn @if ($indicator->realizations->dec->locked){{ 'btn-success' }}@else{{ 'btn-danger' }}@endif lock-action" type="button" data-id="{{ $indicator->id }}" data-month="dec" data-toggle="tooltip" data-placement="bottom" title="@if ($indicator->realizations->dec->locked) ststus: locked @else status: un-locked @endif">@if ($indicator->realizations->dec->locked) <i class="fas fa-lock"></i> @else <i class="fas fa-lock-open"></i> @endif</button>
                                                                                </div>
                                                                            @endif
                                                                        </div>

                                                                        <p class="text-info small">Last update: {{ $indicator->realizations->dec->updated_at }}</p>
                                                                    @endif
                                                                </td>
                                                                {{-- ------------------------------------------------------------------------------ --}}
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                            <input type="hidden" name="level" value="{{ request()->query('level') }}">
                                            <input type="hidden" name="unit" value="{{ request()->query('unit') }}">
                                            <input type="hidden" name="tahun" value="{{ request()->query('tahun') }}">
                                            <button type="submit" class="btn btn-info btn-sm float-right mt-3">Save</button>
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
