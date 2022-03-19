@extends('layouts/after-login')

@section('title', 'Comparing')

{{-- ========================================================== --}}
@push('metadata')
    <meta name="host" content="{{ env('HOST_SIMONIK') }}">
    <meta name="user" content="{{ request()->cookie('X-User-Id') }}">

    <meta name="id_left" content="{{ request()->query('id_left') }}">
    <meta name="level_left" content="{{ request()->query('level_left') }}">
    <meta name="unit_left" content="{{ request()->query('unit_left') }}">
    <meta name="tahun_left" content="{{ request()->query('tahun_left') }}">
    <meta name="bulan_left" content="{{ request()->query('bulan_left') }}">

    <meta name="id_right" content="{{ request()->query('id_right') }}">
    <meta name="level_right" content="{{ request()->query('level_right') }}">
    <meta name="unit_right" content="{{ request()->query('unit_right') }}">
    <meta name="tahun_right" content="{{ request()->query('tahun_right') }}">
    <meta name="bulan_right" content="{{ request()->query('bulan_right') }}">
@endpush

{{-- ========================================================== --}}
@push('style')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}"> {{-- required --}}
    <!-- Theme Style -->
    <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}"> {{-- required --}}
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> {{-- required --}}
    <!-- Preloader -->
    {{-- <link rel="stylesheet" href="{{ asset('libraries/preloder/dist/prelodr.min.css') }}"> --}}

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

    {{-- Custom Style for Content --}}
    <style>
        thead tr:nth-child(1) th, thead tr:nth-child(2) th {
            color: #ffffff !important;
            background-color: #135b96 !important;
        }

    </style>
    {{-- End : Custom Style for Content --}}
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
    <!-- bs-custom-file-input -->
    <script src="{{ asset('template/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('template/dist/js/adminlte.min.js') }}"></script> {{-- required --}}
    <!-- AdminLTE For Demo Purposes -->
    <script src="{{ asset('template/dist/js/demo.js') }}"></script> {{-- required --}}
    <!-- Preorder -->
    {{-- <script src="{{ asset('libraries/preloder/dist/prelodr.min.js') }}"></script> --}}
@endpush

{{-- ========================================================== --}}

@push('ajax-request')
    {{-- Request Level & Unit --}}
    <script>
        let host = $('meta[name="host"]').attr('content');
        let user = $('meta[name="user"]').attr('content');

        $(document).ready(function() {
            // prelodr.in('Loading...');

            let id_left = $('meta[name="id_left"]').attr('content');
            let level_left = $('meta[name="level_left"]').attr('content');
            let unit_left = $('meta[name="unit_left"]').attr('content');
            let bulan_left = $('meta[name="bulan_left"]').attr('content');
            let tahun_left = $('meta[name="tahun_left"]').attr('content');

            let id_right = $('meta[name="id_right"]').attr('content');
            let level_right = $('meta[name="level_right"]').attr('content');
            let unit_right = $('meta[name="unit_right"]').attr('content');
            let bulan_right = $('meta[name="bulan_right"]').attr('content');
            let tahun_right = $('meta[name="tahun_right"]').attr('content');

            levels('left');
            levels('right')

            units(level_left, 'left');
            units(level_right, 'right');

            indicators(level_left, unit_left, tahun_left, 'left');
            indicators(level_right, unit_right, tahun_right, 'right');

            //mapping option selected in filter from query params
            setTimeout(function() {
                $('select[name="id_left"] option').each(function() {
                    if ($(this).val() == id_left)
                        $(this).attr("selected", "selected");
                });
                $('select[name="level_left"] option').each(function() {
                    if ($(this).val() == level_left)
                        $(this).attr("selected", "selected");
                });
                $('select[name="unit_left"] option').each(function() {
                    if ($(this).val() == unit_left)
                        $(this).attr("selected", "selected");
                });
                $('select[name="bulan_left"] option').each(function() {
                    if ($(this).val() == bulan_left)
                        $(this).attr("selected", "selected");
                });
                $('input[name="tahun_left"]').val(tahun_left);

                $('select[name="id_right"] option').each(function() {
                    if ($(this).val() == id_right)
                        $(this).attr("selected", "selected");
                });
                $('select[name="level_right"] option').each(function() {
                    if ($(this).val() == level_right)
                        $(this).attr("selected", "selected");
                });
                $('select[name="unit_right"] option').each(function() {
                    if ($(this).val() == unit_right)
                        $(this).attr("selected", "selected");
                });
                $('select[name="bulan_right"] option').each(function() {
                    if ($(this).val() == bulan_right)
                        $(this).attr("selected", "selected");
                });
                $('input[name="tahun_right"]').val(tahun_right);
            }, 5000);

            // prelodr.out();
        });

        $('select[name="level_left"]').click(function() {
            units($(this).val(), 'left');

            setTimeout(function() {
                let selected_level = $('select[name="level_left"] option').filter(':selected').val();
                let selected_unit = $('select[name="unit_left"] option').filter(':selected').val();
                let tahun_value = $('input[name="tahun_left"]').val();

                indicators(selected_level, selected_unit, tahun_value, 'left');
            }, 5000);
        });
        $('select[name="level_right"]').click(function() {
            units($(this).val(), 'right');

            setTimeout(function() {
                let selected_level = $('select[name="level_right"] option').filter(':selected').val();
                let selected_unit = $('select[name="unit_right"] option').filter(':selected').val();
                let tahun_value = $('input[name="tahun_right"]').val();

                indicators(selected_level, selected_unit, tahun_value, 'right');
            }, 5000);
        });

        $('select[name="unit_left"]').click(function() {
            let selected_level = $('select[name="level_left"] option').filter(':selected').val();
            let selected_unit = $(this).val();
            let tahun_value = $('input[name="tahun_left"]').val();

            indicators(selected_level, selected_unit, tahun_value, 'left');
        });
        $('select[name="unit_right"]').click(function() {
            let selected_level = $('select[name="level_right"] option').filter(':selected').val();
            let selected_unit = $(this).val();
            let tahun_value = $('input[name="tahun_right"]').val();

            indicators(selected_level, selected_unit, tahun_value, 'right');
        });

        $('input[name="tahun_left"]').keyup(function() {
            let selected_level = $('select[name="level_left"] option').filter(':selected').val();
            let selected_unit = $('select[name="unit_left"] option').filter(':selected').val();
            let tahun_value = $(this).val();

            indicators(selected_level, selected_unit, tahun_value, 'left');
        });
        $('input[name="tahun_right"]').keyup(function() {
            let selected_level = $('select[name="level_right"] option').filter(':selected').val();
            let selected_unit = $('select[name="unit_right"] option').filter(':selected').val();
            let tahun_value = $(this).val();

            indicators(selected_level, selected_unit, tahun_value, 'right');
        });

        function levels(position) {
            $.ajax({
                type: 'GET',
                url: `${host}/levels/user/${user}`,
                data: {
                    "with-super-master": "false"
                },
                success: function(res) {
                    if (res.data.length > 0) {
                        let html = '';
                        for (let i = 0; i < res.data.length; i++) {
                            if (i == 0) {
                                html += `<option value="${res.data[i].slug}" selected>${res.data[i].name}</option>`;
                            } else {
                                html += `<option value="${res.data[i].slug}">${res.data[i].name}</option>`;
                            }
                        }
                        $(`select[name="level_${position}"]`).append(html);
                    }
                },
                error: function(res) {
                    console.log(`Level : ${res.responseJSON.message}`);
                }
            });
        }

        function units(level, position) {
            $(`.unit-dynamic-option-${position}`).remove();

            if (level.length > 0) {
                $.ajax({
                    type: 'GET',
                    url: `${host}/level/${level}/units`,
                    success: function(res) {
                        if (res.data.length > 0) {
                            let html = '';
                            for (let i = 0; i < res.data.length; i++) {
                                if (i == 0) {
                                    html += `<option class="unit-dynamic-option-${position}" value="${res.data[i].slug}" selected>${res.data[i].name}</option>`;
                                } else {
                                    html += `<option class="unit-dynamic-option-${position}" value="${res.data[i].slug}">${res.data[i].name}</option>`;
                                }
                            }
                            $(`select[name="unit_${position}"]`).append(html);
                        }
                    },
                    error: function(res) {
                        console.log(`Unit : ${res.responseJSON.message}`);
                    }
                });
            }
        }

        function indicators(level, unit, year, position) {
            $(`.indicator-dynamic-option-${position}`).remove();

            if (level.length > 0 && unit.length > 0 && year.length > 0) {
                $.ajax({
                    type: 'GET',
                    url: `${host}/indicators/paper-work/${level}/${unit}/${year}/public`,
                    success: function(res) {
                        if (res.data.length > 0) {
                            let html = '';
                            for (let i = 0; i < res.data.length; i++) {
                                if (i == 0) {
                                    html += `<option class="indicator-dynamic-option-${position}" value="${res.data[i].id}" selected>${res.data[i].indicator}</option>`;
                                } else {
                                    html += `<option class="indicator-dynamic-option-${position}" value="${res.data[i].id}">${res.data[i].indicator}</option>`;
                                }
                            }
                            $(`select[name="id_${position}"]`).append(html);
                        }
                    },
                    error: function(res) {
                        console.log(`Level : ${res.responseJSON.message}`);
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

            {{-- section: table --}}
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <!-- card-header -->
                    <div class="card-header">
                        <h3 class="card-title">COMPARING</h3>
                    </div>
                    <!-- end : card-header -->

                    <!-- card-body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <form action="{{ route('simonik.comparing') }}" method="get">
                                    <div class="row" data-intro="Lakukan <strong>Filter</strong> dahulu !">
                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="row">
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <p class="text-center small">Left Filter</p>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="input-group input-group-sm mb-1">
                                                        <span class="input-group-append">
                                                            <span class="input-group-text">Level</span>
                                                        </span>
                                                        <select class="custom-select" name="level_left" data-intro="Pilih <strong>Level</strong>"></select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="input-group input-group-sm mb-1">
                                                        <span class="input-group-append">
                                                            <span class="input-group-text">Unit Kerja</span>
                                                        </span>
                                                        <select class="custom-select" name="unit_left" data-intro="Pilih <strong>Unit Kerja</strong>"></select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="input-group input-group-sm mb-1">
                                                        <span class="input-group-append">
                                                            <span class="input-group-text">Tahun</span>
                                                        </span>
                                                        <input type="text" class="form-control" name="tahun_left" data-intro="Isi <strong>Tahun</strong>" />
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="input-group input-group-sm mb-1">
                                                        <span class="input-group-append">
                                                            <span class="input-group-text">Bulan</span>
                                                        </span>
                                                        <select class="custom-select" name="bulan_left" data-intro="Pilih <strong>Bulan</strong>">
                                                            <option value="jan">s.d. Jan</option>
                                                            <option value="feb">s.d. Feb</option>
                                                            <option value="mar">s.d. Mar</option>
                                                            <option value="apr">s.d. Apr</option>
                                                            <option value="may">s.d. May</option>
                                                            <option value="jun">s.d. Jun</option>
                                                            <option value="jul">s.d. Jul</option>
                                                            <option value="aug">s.d. Aug</option>
                                                            <option value="sep">s.d. Sep</option>
                                                            <option value="oct">s.d. Oct</option>
                                                            <option value="nov">s.d. Nov</option>
                                                            <option value="dec">s.d. Dec</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="input-group input-group-sm mb-1">
                                                        <span class="input-group-append">
                                                            <span class="input-group-text">Indikator</span>
                                                        </span>
                                                        <select class="custom-select" name="id_left" data-intro="Pilih <strong>Indikator</strong>"></select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                            <div class="row">
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <p class="text-center small">Right Filter</p>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="input-group input-group-sm mb-1">
                                                        <span class="input-group-append">
                                                            <span class="input-group-text">Level</span>
                                                        </span>
                                                        <select class="custom-select" name="level_right" data-intro="Pilih <strong>Level</strong>"></select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="input-group input-group-sm mb-1">
                                                        <span class="input-group-append">
                                                            <span class="input-group-text">Unit Kerja</span>
                                                        </span>
                                                        <select class="custom-select" name="unit_right" data-intro="Pilih <strong>Unit Kerja</strong>"></select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="input-group input-group-sm mb-1">
                                                        <span class="input-group-append">
                                                            <span class="input-group-text">Tahun</span>
                                                        </span>
                                                        <input type="text" class="form-control" name="tahun_right" data-intro="Isi <strong>Tahun</strong>" />
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="input-group input-group-sm mb-1">
                                                        <span class="input-group-append">
                                                            <span class="input-group-text">Bulan</span>
                                                        </span>
                                                        <select class="custom-select" name="bulan_right" data-intro="Pilih <strong>Bulan</strong>">
                                                            <option value="jan">s.d. Jan</option>
                                                            <option value="feb">s.d. Feb</option>
                                                            <option value="mar">s.d. Mar</option>
                                                            <option value="apr">s.d. Apr</option>
                                                            <option value="may">s.d. May</option>
                                                            <option value="jun">s.d. Jun</option>
                                                            <option value="jul">s.d. Jul</option>
                                                            <option value="aug">s.d. Aug</option>
                                                            <option value="sep">s.d. Sep</option>
                                                            <option value="oct">s.d. Oct</option>
                                                            <option value="nov">s.d. Nov</option>
                                                            <option value="dec">s.d. Dec</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                    <div class="input-group input-group-sm mb-1">
                                                        <span class="input-group-append">
                                                            <span class="input-group-text">Indikator</span>
                                                        </span>
                                                        <select class="custom-select" name="id_right" data-intro="Pilih <strong>Indikator</strong>"></select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <button type="submit" class="btn btn-info btn-block btn-sm" data-toggle="tooltip" data-placement="buttom" title="Search" data-intro="Klik tombol <strong>Search</strong>"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-5">
                                @if (is_null($response))
                                    <h3 class="text-center font-weight-bold">Lakukan Filter</h3>
                                @else
                                    @if (empty($response->data->indicators))
                                        <h3 class="text-center font-weight-bold">Data Tidak Tersedia</h3>
                                    @else
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <hr>
                                                <p class="reset text-center small"><span class="badge badge-danger">MASALAH : PENCAPAIAN < 95%</span> <span class="badge badge-warning">HATI-HATI : PENCAPAIAN &ge; 95% s.d < 100%</span> <span class="badge badge-success">BAIK : PENCAPAIAN &ge; 100%</span></p>
                                            </div>

                                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <p class="text-center small">Left Result</p>

                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-sm" id="table">
                                                        <thead class="small">
                                                            <tr>
                                                                <th class="text-center small" rowspan="2">INDIKATOR</th>
                                                                <th class="text-center small" rowspan="2">BOBOT</th>
                                                                <th class="text-center small" rowspan="2">TARGET</th>
                                                                <th class="text-center small" rowspan="2">REALISASI</th>
                                                                <th class="text-center small" colspan="2">NILAI CAPPING</th>
                                                                <th class="text-center small" rowspan="2">PENCAPAIAN</th>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-center small">100%</th>
                                                                <th class="text-center small">110%</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="small" id="myTable">
                                                            <tr>
                                                                <td class="small">
                                                                    <p class="reset">{{ $response->data->indicators->left->indicator }} | <span class="badge badge-info">{{ $response->data->indicators->left->type }}</span> | Satuan: {{ $response->data->indicators->left->measure }}</p>
                                                                    <p class="reset">Polaritas: <span class="badge badge-secondary">{!! $response->data->indicators->left->polarity !!}</span></p>
                                                                </td>
                                                                <td class="text-center small">
                                                                    {{ $response->data->indicators->left->selected_weight }}
                                                                </td>
                                                                <td class="text-center small">
                                                                    {{ in_array(gettype($response->data->indicators->left->selected_target), ['double', 'integer']) ? number_format($response->data->indicators->left->selected_target, 2, ',', '') : $response->data->indicators->left->selected_target }}
                                                                </td>
                                                                <td class="text-center small">
                                                                    {{ in_array(gettype($response->data->indicators->left->selected_realization), ['double', 'integer']) ? number_format($response->data->indicators->left->selected_realization, 2, ',', '') : $response->data->indicators->left->selected_realization }}
                                                                </td>
                                                                <td class="text-center small">
                                                                    @if (!is_null($response->data->indicators->left->capping_value_100))
                                                                        <p class="font-weight-bold">{{ in_array(gettype($response->data->indicators->left->capping_value_100), ['double', 'integer']) ? number_format($response->data->indicators->left->capping_value_100, 2, ',', '').' %' : $response->data->indicators->left->capping_value_100 }}</p>
                                                                    @endif
                                                                </td>
                                                                <td class="text-center small">
                                                                    @if (!is_null($response->data->indicators->left->capping_value_110))
                                                                        <p class="font-weight-bold">{{ in_array(gettype($response->data->indicators->left->capping_value_110), ['double', 'integer']) ? number_format($response->data->indicators->left->capping_value_110, 2, ',', '').' %' : $response->data->indicators->left->capping_value_110 }}</p>
                                                                    @endif
                                                                </td>
                                                                <td class="text-center small {{ 'bg-'.$response->data->indicators->left->status_color }}">
                                                                    @if (!is_null($response->data->indicators->left->achievement))
                                                                        <p class="font-weight-bold reset">{{ in_array(gettype($response->data->indicators->left->achievement), ['double', 'integer']) ? number_format($response->data->indicators->left->achievement, 2, ',', '').' %' : $response->data->indicators->left->achievement }}</p>
                                                                    @endif
                                                                    <p class="reset">{{ $response->data->indicators->left->status }}</p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                                <p class="text-center small">Right Result</p>

                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-sm" id="table">
                                                        <thead class="small">
                                                            <tr>
                                                                <th class="text-center small" rowspan="2">INDIKATOR</th>
                                                                <th class="text-center small" rowspan="2">BOBOT</th>
                                                                <th class="text-center small" rowspan="2">TARGET</th>
                                                                <th class="text-center small" rowspan="2">REALISASI</th>
                                                                <th class="text-center small" colspan="2">NILAI CAPPING</th>
                                                                <th class="text-center small" rowspan="2">PENCAPAIAN</th>
                                                            </tr>
                                                            <tr>
                                                                <th class="text-center small">100%</th>
                                                                <th class="text-center small">110%</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="small" id="myTable">
                                                            <tr>
                                                                <td class="small">
                                                                    <p class="reset">{{ $response->data->indicators->right->indicator }} | <span class="badge badge-info">{{ $response->data->indicators->right->type }}</span> | Satuan: {{ $response->data->indicators->right->measure }}</p>
                                                                    <p class="reset">Polaritas: <span class="badge badge-secondary">{!! $response->data->indicators->right->polarity !!}</span></p>
                                                                </td>
                                                                <td class="text-center small">
                                                                    {{ $response->data->indicators->right->selected_weight }}
                                                                </td>
                                                                <td class="text-center small">
                                                                    {{ in_array(gettype($response->data->indicators->right->selected_target), ['double', 'integer']) ? number_format($response->data->indicators->right->selected_target, 2, ',', '') : $response->data->indicators->right->selected_target }}
                                                                </td>
                                                                <td class="text-center small">
                                                                    {{ in_array(gettype($response->data->indicators->right->selected_realization), ['double', 'integer']) ? number_format($response->data->indicators->right->selected_realization, 2, ',', '') : $response->data->indicators->right->selected_realization }}
                                                                </td>
                                                                <td class="text-center small">
                                                                    @if (!is_null($response->data->indicators->right->capping_value_100))
                                                                        <p class="font-weight-bold">{{ in_array(gettype($response->data->indicators->right->capping_value_100), ['double', 'integer']) ? number_format($response->data->indicators->right->capping_value_100, 2, ',', '').' %' : $response->data->indicators->right->capping_value_100 }}</p>
                                                                    @endif
                                                                </td>
                                                                <td class="text-center small">
                                                                    @if (!is_null($response->data->indicators->right->capping_value_110))
                                                                        <p class="font-weight-bold">{{ in_array(gettype($response->data->indicators->right->capping_value_110), ['double', 'integer']) ? number_format($response->data->indicators->right->capping_value_110, 2, ',', '').' %' : $response->data->indicators->right->capping_value_110 }}</p>
                                                                    @endif
                                                                </td>
                                                                <td class="text-center small {{ 'bg-'.$response->data->indicators->right->status_color }}">
                                                                    @if (!is_null($response->data->indicators->right->achievement))
                                                                        <p class="font-weight-bold reset">{{ in_array(gettype($response->data->indicators->right->achievement), ['double', 'integer']) ? number_format($response->data->indicators->right->achievement, 2, ',', '').' %' : $response->data->indicators->right->achievement }}</p>
                                                                    @endif
                                                                    <p class="reset">{{ $response->data->indicators->right->status }}</p>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
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
