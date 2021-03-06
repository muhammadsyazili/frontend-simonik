@extends('layouts/after-login')

@section('title', 'Monitoring')

{{-- ========================================================== --}}
@push('metadata')
    <meta name="host" content="{{ SEMONGKO_backend_host() }}">
    <meta name="user" content="{{ request()->cookie('X-User-Id') }}">

    <meta name="level" content="{{ request()->query('level') }}">
    <meta name="unit" content="{{ request()->query('unit') }}">
    <meta name="tahun" content="{{ request()->query('tahun') }}">
    <meta name="bulan" content="{{ request()->query('bulan') }}">

    <meta name="PPK_100" content="{{ empty($response->data->indicators) ?: $response->data->indicators->total->PPK_100->value->original }}">
    <meta name="PPK_110" content="{{ empty($response->data->indicators) ?: $response->data->indicators->total->PPK_110->value->original }}">
@endpush

{{-- ========================================================== --}}
@push('style')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}"> {{-- required --}}
    <!-- Theme Style -->
    <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}"> {{-- required --}}
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> {{-- required --}}

    <style>
        /* Bootstrap Custom Style for Sidebar */
        aside {
            color: #ffffff !important;
            background-color: #135b96 !important;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='540' height='450' viewBox='0 0 1080 900'%3E%3Cg fill-opacity='.1'%3E%3Cpolygon fill='%23444' points='90 150 0 300 180 300'/%3E%3Cpolygon points='90 150 180 0 0 0'/%3E%3Cpolygon fill='%23AAA' points='270 150 360 0 180 0'/%3E%3Cpolygon fill='%23DDD' points='450 150 360 300 540 300'/%3E%3Cpolygon fill='%23999' points='450 150 540 0 360 0'/%3E%3Cpolygon points='630 150 540 300 720 300'/%3E%3Cpolygon fill='%23DDD' points='630 150 720 0 540 0'/%3E%3Cpolygon fill='%23444' points='810 150 720 300 900 300'/%3E%3Cpolygon fill='%23FFF' points='810 150 900 0 720 0'/%3E%3Cpolygon fill='%23DDD' points='990 150 900 300 1080 300'/%3E%3Cpolygon fill='%23444' points='990 150 1080 0 900 0'/%3E%3Cpolygon fill='%23DDD' points='90 450 0 600 180 600'/%3E%3Cpolygon points='90 450 180 300 0 300'/%3E%3Cpolygon fill='%23666' points='270 450 180 600 360 600'/%3E%3Cpolygon fill='%23AAA' points='270 450 360 300 180 300'/%3E%3Cpolygon fill='%23DDD' points='450 450 360 600 540 600'/%3E%3Cpolygon fill='%23999' points='450 450 540 300 360 300'/%3E%3Cpolygon fill='%23999' points='630 450 540 600 720 600'/%3E%3Cpolygon fill='%23FFF' points='630 450 720 300 540 300'/%3E%3Cpolygon points='810 450 720 600 900 600'/%3E%3Cpolygon fill='%23DDD' points='810 450 900 300 720 300'/%3E%3Cpolygon fill='%23AAA' points='990 450 900 600 1080 600'/%3E%3Cpolygon fill='%23444' points='990 450 1080 300 900 300'/%3E%3Cpolygon fill='%23222' points='90 750 0 900 180 900'/%3E%3Cpolygon points='270 750 180 900 360 900'/%3E%3Cpolygon fill='%23DDD' points='270 750 360 600 180 600'/%3E%3Cpolygon points='450 750 540 600 360 600'/%3E%3Cpolygon points='630 750 540 900 720 900'/%3E%3Cpolygon fill='%23444' points='630 750 720 600 540 600'/%3E%3Cpolygon fill='%23AAA' points='810 750 720 900 900 900'/%3E%3Cpolygon fill='%23666' points='810 750 900 600 720 600'/%3E%3Cpolygon fill='%23999' points='990 750 900 900 1080 900'/%3E%3Cpolygon fill='%23999' points='180 0 90 150 270 150'/%3E%3Cpolygon fill='%23444' points='360 0 270 150 450 150'/%3E%3Cpolygon fill='%23FFF' points='540 0 450 150 630 150'/%3E%3Cpolygon points='900 0 810 150 990 150'/%3E%3Cpolygon fill='%23222' points='0 300 -90 450 90 450'/%3E%3Cpolygon fill='%23FFF' points='0 300 90 150 -90 150'/%3E%3Cpolygon fill='%23FFF' points='180 300 90 450 270 450'/%3E%3Cpolygon fill='%23666' points='180 300 270 150 90 150'/%3E%3Cpolygon fill='%23222' points='360 300 270 450 450 450'/%3E%3Cpolygon fill='%23FFF' points='360 300 450 150 270 150'/%3E%3Cpolygon fill='%23444' points='540 300 450 450 630 450'/%3E%3Cpolygon fill='%23222' points='540 300 630 150 450 150'/%3E%3Cpolygon fill='%23AAA' points='720 300 630 450 810 450'/%3E%3Cpolygon fill='%23666' points='720 300 810 150 630 150'/%3E%3Cpolygon fill='%23FFF' points='900 300 810 450 990 450'/%3E%3Cpolygon fill='%23999' points='900 300 990 150 810 150'/%3E%3Cpolygon points='0 600 -90 750 90 750'/%3E%3Cpolygon fill='%23666' points='0 600 90 450 -90 450'/%3E%3Cpolygon fill='%23AAA' points='180 600 90 750 270 750'/%3E%3Cpolygon fill='%23444' points='180 600 270 450 90 450'/%3E%3Cpolygon fill='%23444' points='360 600 270 750 450 750'/%3E%3Cpolygon fill='%23999' points='360 600 450 450 270 450'/%3E%3Cpolygon fill='%23666' points='540 600 630 450 450 450'/%3E%3Cpolygon fill='%23222' points='720 600 630 750 810 750'/%3E%3Cpolygon fill='%23FFF' points='900 600 810 750 990 750'/%3E%3Cpolygon fill='%23222' points='900 600 990 450 810 450'/%3E%3Cpolygon fill='%23DDD' points='0 900 90 750 -90 750'/%3E%3Cpolygon fill='%23444' points='180 900 270 750 90 750'/%3E%3Cpolygon fill='%23FFF' points='360 900 450 750 270 750'/%3E%3Cpolygon fill='%23AAA' points='540 900 630 750 450 750'/%3E%3Cpolygon fill='%23FFF' points='720 900 810 750 630 750'/%3E%3Cpolygon fill='%23222' points='900 900 990 750 810 750'/%3E%3Cpolygon fill='%23222' points='1080 300 990 450 1170 450'/%3E%3Cpolygon fill='%23FFF' points='1080 300 1170 150 990 150'/%3E%3Cpolygon points='1080 600 990 750 1170 750'/%3E%3Cpolygon fill='%23666' points='1080 600 1170 450 990 450'/%3E%3Cpolygon fill='%23DDD' points='1080 900 1170 750 990 750'/%3E%3C/g%3E%3C/svg%3E");
        }

        aside .brand-link {
            background-color: #135b96 !important;
        }
        /* End : Bootstrap Custom Style for Sidebar */

        /* Bootstrap Custom Style for Navbar */
        nav.main-header {
            color: #ffffff !important;
            background-color: #135b96 !important;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='540' height='450' viewBox='0 0 1080 900'%3E%3Cg fill-opacity='.1'%3E%3Cpolygon fill='%23444' points='90 150 0 300 180 300'/%3E%3Cpolygon points='90 150 180 0 0 0'/%3E%3Cpolygon fill='%23AAA' points='270 150 360 0 180 0'/%3E%3Cpolygon fill='%23DDD' points='450 150 360 300 540 300'/%3E%3Cpolygon fill='%23999' points='450 150 540 0 360 0'/%3E%3Cpolygon points='630 150 540 300 720 300'/%3E%3Cpolygon fill='%23DDD' points='630 150 720 0 540 0'/%3E%3Cpolygon fill='%23444' points='810 150 720 300 900 300'/%3E%3Cpolygon fill='%23FFF' points='810 150 900 0 720 0'/%3E%3Cpolygon fill='%23DDD' points='990 150 900 300 1080 300'/%3E%3Cpolygon fill='%23444' points='990 150 1080 0 900 0'/%3E%3Cpolygon fill='%23DDD' points='90 450 0 600 180 600'/%3E%3Cpolygon points='90 450 180 300 0 300'/%3E%3Cpolygon fill='%23666' points='270 450 180 600 360 600'/%3E%3Cpolygon fill='%23AAA' points='270 450 360 300 180 300'/%3E%3Cpolygon fill='%23DDD' points='450 450 360 600 540 600'/%3E%3Cpolygon fill='%23999' points='450 450 540 300 360 300'/%3E%3Cpolygon fill='%23999' points='630 450 540 600 720 600'/%3E%3Cpolygon fill='%23FFF' points='630 450 720 300 540 300'/%3E%3Cpolygon points='810 450 720 600 900 600'/%3E%3Cpolygon fill='%23DDD' points='810 450 900 300 720 300'/%3E%3Cpolygon fill='%23AAA' points='990 450 900 600 1080 600'/%3E%3Cpolygon fill='%23444' points='990 450 1080 300 900 300'/%3E%3Cpolygon fill='%23222' points='90 750 0 900 180 900'/%3E%3Cpolygon points='270 750 180 900 360 900'/%3E%3Cpolygon fill='%23DDD' points='270 750 360 600 180 600'/%3E%3Cpolygon points='450 750 540 600 360 600'/%3E%3Cpolygon points='630 750 540 900 720 900'/%3E%3Cpolygon fill='%23444' points='630 750 720 600 540 600'/%3E%3Cpolygon fill='%23AAA' points='810 750 720 900 900 900'/%3E%3Cpolygon fill='%23666' points='810 750 900 600 720 600'/%3E%3Cpolygon fill='%23999' points='990 750 900 900 1080 900'/%3E%3Cpolygon fill='%23999' points='180 0 90 150 270 150'/%3E%3Cpolygon fill='%23444' points='360 0 270 150 450 150'/%3E%3Cpolygon fill='%23FFF' points='540 0 450 150 630 150'/%3E%3Cpolygon points='900 0 810 150 990 150'/%3E%3Cpolygon fill='%23222' points='0 300 -90 450 90 450'/%3E%3Cpolygon fill='%23FFF' points='0 300 90 150 -90 150'/%3E%3Cpolygon fill='%23FFF' points='180 300 90 450 270 450'/%3E%3Cpolygon fill='%23666' points='180 300 270 150 90 150'/%3E%3Cpolygon fill='%23222' points='360 300 270 450 450 450'/%3E%3Cpolygon fill='%23FFF' points='360 300 450 150 270 150'/%3E%3Cpolygon fill='%23444' points='540 300 450 450 630 450'/%3E%3Cpolygon fill='%23222' points='540 300 630 150 450 150'/%3E%3Cpolygon fill='%23AAA' points='720 300 630 450 810 450'/%3E%3Cpolygon fill='%23666' points='720 300 810 150 630 150'/%3E%3Cpolygon fill='%23FFF' points='900 300 810 450 990 450'/%3E%3Cpolygon fill='%23999' points='900 300 990 150 810 150'/%3E%3Cpolygon points='0 600 -90 750 90 750'/%3E%3Cpolygon fill='%23666' points='0 600 90 450 -90 450'/%3E%3Cpolygon fill='%23AAA' points='180 600 90 750 270 750'/%3E%3Cpolygon fill='%23444' points='180 600 270 450 90 450'/%3E%3Cpolygon fill='%23444' points='360 600 270 750 450 750'/%3E%3Cpolygon fill='%23999' points='360 600 450 450 270 450'/%3E%3Cpolygon fill='%23666' points='540 600 630 450 450 450'/%3E%3Cpolygon fill='%23222' points='720 600 630 750 810 750'/%3E%3Cpolygon fill='%23FFF' points='900 600 810 750 990 750'/%3E%3Cpolygon fill='%23222' points='900 600 990 450 810 450'/%3E%3Cpolygon fill='%23DDD' points='0 900 90 750 -90 750'/%3E%3Cpolygon fill='%23444' points='180 900 270 750 90 750'/%3E%3Cpolygon fill='%23FFF' points='360 900 450 750 270 750'/%3E%3Cpolygon fill='%23AAA' points='540 900 630 750 450 750'/%3E%3Cpolygon fill='%23FFF' points='720 900 810 750 630 750'/%3E%3Cpolygon fill='%23222' points='900 900 990 750 810 750'/%3E%3Cpolygon fill='%23222' points='1080 300 990 450 1170 450'/%3E%3Cpolygon fill='%23FFF' points='1080 300 1170 150 990 150'/%3E%3Cpolygon points='1080 600 990 750 1170 750'/%3E%3Cpolygon fill='%23666' points='1080 600 1170 450 990 450'/%3E%3Cpolygon fill='%23DDD' points='1080 900 1170 750 990 750'/%3E%3C/g%3E%3C/svg%3E");
        }
        /* End : Bootstrap Custom Style for Navbar */

        /* Bootstrap Custom Style for Content */
        .canvas-container {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        /* End : Bootstrap Custom Style for Content */

        /* Table Header Fixed */
        .table-responsive {
            max-height: 100vh;
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
        /* End : Table Header Fixed */

        /* Change Color Row Table on Click */
        .table tbody tr.highlight td {
            background-color: rgb(30, 41, 59);
            color: rgb(255, 255, 255);
        }
        /* End : Change Color Row Table on Click */

        /* Highcharts Custom Style */
        .highcharts-figure,
        .highcharts-data-table table {
            widows: 100%;
            margin: 1em auto;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }
        /* End : Highcharts Custom Style */
    </style>
@endpush

{{-- ========================================================== --}}

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
    <script src="{{ asset('libraries/gauge-chart/gauge.min.js') }}"></script>
    <!-- Highcharts -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script>
        // Change Color Row Table on Click
        $('#table').on('click', 'tbody tr', function(event) {
            $(this).addClass('highlight').siblings().removeClass('highlight');
        });
        // End : Change Color Row Table on Click

        // Table Header Fixed
        $(document).ready(function() {
            let firstheight = $('.first').height();
            $("thead tr.second th, thead tr.second td").css("top", firstheight);
        });
        // End : Table Header Fixed

        // Gauge Chart
        let opts = {
            angle: 0,
            lineWidth: 0.25,
            radiusScale: 1,
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

        // Highcharts
        $('.chart').click(function() {
            let id = $(this).data("id");
            let prefix = $(this).data("prefix");
            let unit = $(this).data("unit");
            let year = $(this).data("year");
            let month = $(this).data("month");
            let status = $(this).data("status");

            let host = $('meta[name="host"]').attr('content');

            $.ajax({
                type: 'GET',
                url: `${host}/monitoring/${id}/${month}`,
                data: {
                    "prefix": prefix
                },
                success: function(res) {
                    Highcharts.chart('chart-container', {
                        chart: {
                            type: 'line'
                        },
                        title: {
                            text: `${res.data.indicator.indicator} - (${res.data.indicator.type})`
                        },
                        subtitle: {
                            text: `Unit Kerja: ${unit} - Bulan: s.d ${month.toUpperCase()} - Tahun: ${year} - Status: ${status}`
                        },
                        yAxis: {
                            title: {
                                text: res.data.indicator.measure
                            }
                        },
                        xAxis: {
                            categories: res.data.indicator.months
                        },
                        legend: {
                            layout: 'vertical',
                            align: 'right',
                            verticalAlign: 'middle'
                        },
                        plotOptions: {
                            line: {
                                dataLabels: {
                                    enabled: true
                                },
                                enableMouseTracking: true
                            }
                        },
                        series: [{
                            name: 'TARGET',
                            data: res.data.indicator.targets
                        }, {
                            name: 'REALISASI',
                            data: res.data.indicator.realizations
                        }],
                        responsive: {
                            rules: [{
                                condition: {
                                    maxWidth: 500
                                },
                                chartOptions: {
                                    legend: {
                                        layout: 'horizontal',
                                        align: 'center',
                                        verticalAlign: 'bottom'
                                    }
                                }
                            }]
                        }
                    });

                    $("#modal-xl").modal("show");
                },
                error: function(res) {
                    console.log(`error : ${res.responseJSON.message}`);
                }
            });
        });
        // End : Highcharts
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
        });

        $('select[name="level"]').click(function() {
            units($(this).val());
        });

        function levels() {
            let host = $('meta[name="host"]').attr('content');
            let user = $('meta[name="user"]').attr('content');

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
    <div class="content-wrapper pt-3">
        <div class="col-md-12">
            @if (session()->has('danger_message'))
                @include('_alert-danger',['message' => session()->get('danger_message')])
            @else
                @if (session()->has('info_message'))
                    <div class="card bg-info">
                        <div class="card-header">
                            <h3 class="card-title">Info</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            @include('_alert-info',['message' => session()->get('info_message')])
                        </div>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="card bg-danger">
                        <div class="card-header">
                            <h3 class="card-title">Alert</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            @foreach ($errors->all() as $errorV)
                                <p class="small">{{ $errorV }}</p>
                            @endforeach
                        </div>
                    </div>
                @endif

                <div class="card border-0 shadow rounded">
                    <div class="card-header">
                        <h3 class="card-title">MONITORING</h3>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <form action="{{ route('semongko.monitoring') }}" method="get">
                                    <div class="row" data-intro="Lakukan <strong>Filter</strong> dahulu !">
                                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="input-group input-group-sm mb-3">
                                                <span class="input-group-append">
                                                    <span class="input-group-text">Level</span>
                                                </span>
                                                <select class="custom-select" name="level" data-intro="Pilih <strong>Level</strong>"></select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="input-group input-group-sm mb-3">
                                                <span class="input-group-append">
                                                    <span class="input-group-text">Unit Kerja</span>
                                                </span>
                                                <select class="custom-select" name="unit" data-intro="Pilih <strong>Unit Kerja</strong>"></select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="input-group input-group-sm mb-3">
                                                <span class="input-group-append">
                                                    <span class="input-group-text">Tahun</span>
                                                </span>
                                                <input type="text" class="form-control" name="tahun" data-intro="Isi <strong>Tahun</strong>" />
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                            <div class="input-group input-group-sm mb-3">
                                                <span class="input-group-append">
                                                    <span class="input-group-text">Bulan</span>
                                                </span>
                                                <select class="custom-select" name="bulan" data-intro="Pilih <strong>Bulan</strong>">
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
                                                    <button type="submit" class="btn btn-info btn-flat" data-toggle="tooltip" data-placement="buttom" title="Search" data-intro="Klik tombol <strong>Search</strong>"><i class="fas fa-search"></i></button>
                                                </span>
                                            </div>
                                        </div>
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
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <p class="reset text-center small">UNIT KERJA : {{ cast_to_upper(request()->query('unit'), '-') }} - TAHUN : {{ cast_to_upper(request()->query('tahun'), '-') }} - BULAN : {{ cast_to_upper(request()->query('bulan'), '-', 's.d. ') }}</p>
                                                <hr>
                                                <p class="reset text-center small"><span class="badge badge-danger">MASALAH : NKO < 95%</span> <span class="badge badge-warning">HATI-HATI : NKO &ge; 95% s.d < 100%</span> <span class="badge badge-success">BAIK : NKO &ge; 100%</span></p>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <p class="text-center reset">NKO 100%</p>
                                                <div class="canvas-container">
                                                    <canvas id="gauge-100"></canvas>
                                                </div>
                                                <div class="text-center reset" id="gauge-label-100"></div>
                                                <p class="text-center small reset"><span class="badge badge-{{ $response->data->indicators->total->PPK_100_color_status }}">{{ $response->data->indicators->total->PPK_100_status }}</span></p>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                                <p class="text-center reset">NKO 110%</p>
                                                <div class="canvas-container">
                                                    <canvas id="gauge-110"></canvas>
                                                </div>
                                                <div class="text-center reset" id="gauge-label-110"></div>
                                                <p class="text-center small reset"><span class="badge badge-{{ $response->data->indicators->total->PPK_110_color_status }}">{{ $response->data->indicators->total->PPK_110_status }}</span></p>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <hr>
                                                <div class="float-left">
                                                    <a class="reset" href="#table"><span class="badge badge-pill badge-info">Focus on table</span></a>
                                                </div>
                                                <div class="float-right">
                                                    <a class="badge badge-pill badge-info" href="{{ route('semongko.exporting', ['level' => request()->query('level'),'unit' => request()->query('unit'),'tahun' => request()->query('tahun'),'bulan' => request()->query('bulan')]) }}">Download hasil monitoring (sesuai filter)</a>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                                <div class="table-responsive">
                                                    <table class="table table-bordered table-sm" id="table">
                                                        <thead class="text-nowrap small">
                                                            <tr class="first">
                                                                <th class="text-center" rowspan="2">INDIKATOR</th>
                                                                <th class="text-center" rowspan="2">BOBOT</th>
                                                                <th class="text-center" rowspan="2">TARGET</th>
                                                                <th class="text-center" rowspan="2">REALISASI</th>
                                                                <th class="text-center" colspan="2">NILAI CAPPING</th>
                                                                <th class="text-center" rowspan="2">PENCAPAIAN | STATUS <span data-toggle="tooltip" data-placement="right" title="????MASALAH : PENCAPAIAN < 95%, ????HATI-HATI : PENCAPAIAN &ge; 95% s.d < 100%, ????BAIK : PENCAPAIAN &ge; 100%"><i class="fas fa-info-circle"></i></span></th>
                                                                <th class="text-center" rowspan="2">CHART</th>
                                                            </tr>
                                                            <tr class="second">
                                                                <th class="text-center">100%</th>
                                                                <th class="text-center">110%</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody class="small" id="myTable">
                                                            @foreach ($response->data->indicators->partials as $indicator)
                                                                <tr style="background-color: rgb({{ $indicator->bg_color->r }}, {{ $indicator->bg_color->g }}, {{ $indicator->bg_color->b }}); @if (($indicator->bg_color->r < 127.5) && ($indicator->bg_color->g < 127.5) && ($indicator->bg_color->b < 127.5)) color: white; @endif">
                                                                    <td>
                                                                        <p class="reset">{{ $indicator->indicator }} | <span class="badge badge-info">{{ $indicator->type }}</span></p>
                                                                        <p class="reset">Satuan: {{ $indicator->measure }} | Polaritas: <span class="badge badge-secondary">{!! $indicator->polarity !!}</span></p>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <p>{{ $indicator->selected_weight }}</p>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <p class="reset">{{ $indicator->selected_target->value->showed }}</p>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <p class="reset">{{ $indicator->selected_realization->value->showed }}</p>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <p class="reset font-weight-bold">{{ $indicator->capping_value_100->value->showed }}</p>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        <p class="reset font-weight-bold">{{ $indicator->capping_value_110->value->showed }}</p>
                                                                    </td>
                                                                    <td class="text-center bg-{{ $indicator->status_color }}">
                                                                        <p class="reset font-weight-bold">{{ $indicator->achievement->value->showed }} | {{ $indicator->status }}</p>
                                                                    </td>
                                                                    <td class="text-center">
                                                                        @if ($indicator->show_chart)
                                                                            <button type="button" class="btn btn-sm btn-outline-info chart" data-id="{{ $indicator->id }}" data-prefix="{{ $indicator->prefix }}" data-unit="{{ cast_to_upper(request()->query('unit')) }}" data-year="{{ request()->query('tahun') }}" data-month="{{ request()->query('bulan') }}" data-status="{{ $indicator->status }}"><i class="fas fa-chart-bar"></i></button>
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                            <tr class="bg-info">
                                                                <td class="text-center">KEY PERFORMANCE INDIKATOR</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td class="text-center">
                                                                    <p class="reset font-weight-bold">{{ $response->data->indicators->total->KPI_100->value->showed }}</p>
                                                                </td>
                                                                <td class="text-center">
                                                                    <p class="reset font-weight-bold">{{ $response->data->indicators->total->KPI_110->value->showed }}</p>
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr class="bg-info">
                                                                <td class="text-center">PERFORMANCE INDIKATOR</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td class="text-center">
                                                                    <p class="reset font-weight-bold">{{ $response->data->indicators->total->PI_100->value->showed }}</p>
                                                                </td>
                                                                <td class="text-center">
                                                                    <p class="reset font-weight-bold">{{ $response->data->indicators->total->PI_110->value->showed }}</p>
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr class="bg-success">
                                                                <td class="text-center">TOTAL</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td class="text-center">
                                                                    <p class="reset font-weight-bold">{{ $response->data->indicators->total->PK_100->value->showed }} %</p>
                                                                </td>
                                                                <td class="text-center">
                                                                    <p class="reset font-weight-bold">{{ $response->data->indicators->total->PK_110->value->showed }} %</p>
                                                                </td>
                                                                <td></td>
                                                                <td></td>
                                                            </tr>
                                                            <tr class="bg-success">
                                                                <td class="text-center">NILAI KINERJA ORGANISASI (NKO)</td>
                                                                <td></td>
                                                                <td></td>
                                                                <td></td>
                                                                <td class="text-center">
                                                                    <p class="reset font-weight-bold">{{ $response->data->indicators->total->PPK_100->value->showed }} %</p>
                                                                </td>
                                                                <td class="text-center">
                                                                    <p class="reset font-weight-bold">{{ $response->data->indicators->total->PPK_110->value->showed }} %</p>
                                                                </td>
                                                                <td></td>
                                                                <td></td>
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
                </div>
            @endif
        </div>

        <div class="modal fade" id="modal-xl">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <div id="chart-container"></div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-sm btn-info" data-dismiss="modal">Close</button>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
    </div>
@endsection
