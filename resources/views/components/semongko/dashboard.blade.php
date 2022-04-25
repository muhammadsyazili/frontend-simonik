@extends('layouts/before-login')

@section('title', 'Dashboard')

{{-- ========================================================== --}}
@push('metadata')
    <meta name="host" content="{{ SEMONGKO_backend_host() }}">

    <meta name="level" content="{{ request()->query('level') }}">
    <meta name="unit" content="{{ request()->query('unit') }}">
    <meta name="tahun" content="{{ request()->query('tahun') }}">
    <meta name="bulan" content="{{ request()->query('bulan') }}">

    <meta name="PPK_100" content="{{ empty($response->data->indicators) ?: $response->data->indicators->total->PPK_100->value->original }}">
    <meta name="PPK_110" content="{{ empty($response->data->indicators) ?: $response->data->indicators->total->PPK_110->value->original }}">
@endpush

@push('style')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}"> {{-- required --}}
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> {{-- required --}}
    <!-- Theme Style -->
    <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}"> {{-- required --}}
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> {{-- required --}}

    <style>
        /* Custom Bootstrap */
        .canvas-container {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        /* End : Custom Bootstrap */

        /* Table Header Fixed */
        thead tr:nth-child(1) th {
            color: #ffffff !important;
            background-color: #135b96 !important;
        }
        /* End : Table Header Fixed */
    </style>
@endpush

@push('script')
    <!-- jQuery -->
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

    <!-- Gauge Chart -->
    <script src="{{ asset('libraries/gauge-chart/gauge.min.js') }}"></script> {{-- required --}}
    <script>
        // Gauge Chart
        let opts = {
            angle: 0,
            lineWidth: 0.25,
            radiusScale: 0.75,
            pointer: {
                length: 0.5,
                strokeWidth: 0.035,
                color: '#000000'
            },
            staticZones: [
                {strokeStyle: "#F03E3E", min: 0, max: 95},
                {strokeStyle: "#FFDD00", min: 95, max: 100},
                {strokeStyle: "#30B32D", min: 100, max: 200}
            ],
            staticLabels: {
                font: "10px sans-serif",
                labels: [0, 25, 50, 75, 100, 125, 150, 175, 200],
                color: "#000000",
                fractionDigits: 0
            },
            renderTicks: {
                divisions: 8,
                divWidth: 1.1,
                divLength: 0.7,
                divColor: '#333333',
                subDivisions: 5,
                subLength: 0.5,
                subWidth: 0.6,
                subColor: '#666666'
            },
            limitMax: false,
            limitMin: false,
            colorStart: '#6FADCF',
            colorStop: '#8FC0DA',
            strokeColor: '#E0E0E0',
            generateGradient: true,
            highDpiSupport: true,
        };

        let target100 = document.getElementById('gauge-100');
        let gauge100 = new Gauge(target100).setOptions(opts);
        gauge100.minValue = 0;
        gauge100.maxValue = 200;
        gauge100.animationSpeed = 50;
        gauge100.set(parseFloat($('meta[name="PPK_100"]').attr('content')));
        gauge100.setTextField(document.getElementById("gauge-label-100"), 2);

        let target110 = document.getElementById('gauge-110');
        let gauge110 = new Gauge(target110).setOptions(opts);
        gauge110.minValue = 0;
        gauge110.maxValue = 200;
        gauge110.animationSpeed = 50;
        gauge110.set(parseFloat($('meta[name="PPK_110"]').attr('content')));
        gauge110.setTextField(document.getElementById("gauge-label-110"), 2);
        // End : Gauge Chart

        // Change Color Row Table on Click
        $('#table').on('click', 'tbody tr', function(event) {
            $(this).addClass('highlight').siblings().removeClass('highlight');
        });
        // End : Change Color Row Table on Click
    </script>
@endpush

{{-- ========================================================== --}}

@push('ajax-request')
    <script>
        // Request Level & Unit
        $(document).ready(function() {
            levels();
            units($('meta[name="level"]').attr('content'));

            $('select[name="bulan"] option').each(function() {
                if ($(this).val() == $('meta[name="bulan"]').attr('content'))
                    $(this).attr("selected", "selected");
            });
            $('input[name="tahun"]').val($('meta[name="tahun"]').attr('content'));

            setInterval(function () {location.reload();}, 3_600_000);
        });

        $('select[name="level"]').click(function() {
            units($(this).val());
        });

        function levels() {
            let host = $('meta[name="host"]').attr('content');

            $.ajax({
                type: 'GET',
                url: `${host}/levels/public`,
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
                },
                complete: function () {
                    $('select[name="level"] option').each(function() {
                        if ($(this).val() == $('meta[name="level"]').attr('content'))
                            $(this).attr("selected", "selected");
                    });
                }
            });
        }

        function units(level) {
            $('.unit-dynamic-option').remove();

            if (level.length > 0) {
                let host = $('meta[name="host"]').attr('content');
                $.ajax({
                    type: 'GET',
                    url: `${host}/level/${level}/units`,
                    success: function(res) {
                        if (res.data.length > 0) {
                            let html = '';
                            for (let i = 0; i < res.data.length; i++) {
                                html += `<option class="unit-dynamic-option" value="${res.data[i].slug}">${res.data[i].name}</option>`;
                            }
                            $('select[name="unit"]').append(html);
                        }
                    },
                    error: function(res) {
                        console.log(`Unit : ${res.responseJSON.message}`);
                    },
                    complete: function () {
                        $('select[name="unit"] option').each(function() {
                            if ($(this).val() == $('meta[name="unit"]').attr('content'))
                                $(this).attr("selected", "selected");
                        });
                    }
                });
            }
        }
        // End : Request Level & Unit
    </script>
@endpush

{{-- ========================================================== --}}

@section('content')
    <div class="container-fluid mt-1">
        @if (session()->has('danger_message'))
            @include('_alert-danger',['message' => session()->get('danger_message')])
        @else
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $errorV)
                        <p class="small">{{ $errorV }}</p>
                    @endforeach
                </div>
            @endif

            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="float-right">
                        <a href="{{ route('login.form') }}"> Login</a>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <form action="{{ route('semongko.dashboard') }}" method="get">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-append">
                                        <span class="input-group-text">Level</span>
                                    </span>
                                    <select class="custom-select" name="level"></select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-append">
                                        <span class="input-group-text">Unit Kerja</span>
                                    </span>
                                    <select class="custom-select" name="unit"></select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-append">
                                        <span class="input-group-text">Tahun</span>
                                    </span>
                                    <input type="text" class="form-control" name="tahun" />
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                <div class="input-group input-group-sm mb-3">
                                    <span class="input-group-append">
                                        <span class="input-group-text">Bulan</span>
                                    </span>
                                    <select class="custom-select" name="bulan">
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
                                    <span class="input-group-append">
                                        <button type="submit" class="btn btn-info btn-flat" data-toggle="tooltip" data-placement="buttom" title="Search"><i class="fas fa-search"></i></button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    @if (is_null($response))
                        <h3 class="text-center font-weight-bold">Lakukan Filter</h3>
                    @else
                        @if (empty($response->data->indicators))
                            <h3 class="text-center font-weight-bold">Data Tidak Tersedia</h3>
                        @else
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <p class="text-center reset">NKO 100%</p>
                                        <div class="canvas-container">
                                            <canvas id="gauge-100"></canvas>
                                        </div>
                                        <div class="text-center reset" id="gauge-label-100"></div>
                                        <p class="text-center small reset"><span class="badge badge-{{ $response->data->indicators->total->PPK_100_color_status }}">{{ $response->data->indicators->total->PPK_100_status }}</span></p>
                                        <hr>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <p class="text-center reset">NKO 110%</p>
                                        <div class="canvas-container">
                                            <canvas id="gauge-110"></canvas>
                                        </div>
                                        <div class="text-center reset" id="gauge-label-110"></div>
                                        <p class="text-center small reset"><span class="badge badge-{{ $response->data->indicators->total->PPK_110_color_status }}">{{ $response->data->indicators->total->PPK_110_status }}</span></p>
                                        <hr>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-9 col-xl-9">
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mb-2">
                                            <p class="text-center small reset">UNIT KERJA : {{ cast_to_upper(request()->query('unit'), '-') }} - TAHUN : {{ cast_to_upper(request()->query('tahun'), '-') }} - BULAN : {{ cast_to_upper(request()->query('bulan'), '-', 's.d. ') }}</p>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-sm" id="table">
                                                    <thead class="text-nowrap small">
                                                        <tr>
                                                            <th class="text-center">INDIKATOR PERLU PERHATIAN</th>
                                                            <th class="text-center">PENCAPAIAN | STATUS</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="small" id="myTable">
                                                        @foreach ($response->data->indicators->partials as $indicator)
                                                            @if (in_array($indicator->status_symbol, ['-1', '0'], true))
                                                                <tr style="background-color: rgb({{ $indicator->bg_color->r }}, {{ $indicator->bg_color->g }}, {{ $indicator->bg_color->b }}); @if (($indicator->bg_color->r < 127.5) && ($indicator->bg_color->g < 127.5) && ($indicator->bg_color->b < 127.5)) color: white; @endif">
                                                                    <td>
                                                                        <p class="reset">{{ $indicator->indicator }} | <span class="badge badge-info">{{ $indicator->type }}</span> | Satuan: {{ $indicator->measure }} | Polaritas: <span class="badge badge-secondary">{!! $indicator->polarity !!}</span></p>
                                                                    </td>
                                                                    <td class="text-center {{ 'bg-'.$indicator->status_color }}">
                                                                        <p class="font-weight-bold reset">{{ $indicator->achievement->value->showed }} % | {{ $indicator->status }}</p>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                </div>
            </div>
        @endif
    </div>
@endsection
