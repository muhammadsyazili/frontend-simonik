@extends('layouts/after-login')

@section('title', 'Monitoring')

{{-- ========================================================== --}}
@push('metadata')
    <meta name="host" content="{{ env('HOST_SEMONGKO') }}">
    <meta name="user" content="{{ request()->cookie('X-User-Id') }}">

    <meta name="level" content="{{ request()->query('level') }}">
    <meta name="unit" content="{{ request()->query('unit') }}">
    <meta name="tahun" content="{{ request()->query('tahun') }}">
    <meta name="bulan" content="{{ request()->query('bulan') }}">
@endpush

{{-- ========================================================== --}}
@push('style')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}"> {{-- required --}}
    <!-- Theme Style -->
    <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}"> {{-- required --}}
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> {{-- required --}}

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

        thead tr:nth-child(1) th {
            color: #ffffff !important;
            background-color: #135b96 !important;
            position: sticky;
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

    {{-- highcharts --}}
    <style>
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

    </style>

    <style>
        #container-1 {
            height: 300px;
        }
        #container-2 {
            height: 250px;
        }
        #container-3 {
            height: 250px;
        }
        #container-4 {
            height: 300px;
        }
        #container-5 {
            height: 250px;
        }
        #container-6 {
            height: 250px;
        }

        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 310px;
            max-width: 500px;
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

    </style>
@endpush

{{-- ========================================================== --}}

@push('script')
    <!-- jQuery -->
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

    {{-- highcharts --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script src="https://code.highcharts.com/highcharts-more.js"></script>

    <script>
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
                                enableMouseTracking: false
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
    </script>

    <script>
        $(document).ready(function() {
            if ($('#PPK_100').val() !== undefined && $('#PPK_110').val() !== undefined) {
                let container1Name = 'NKO 100%';
                Highcharts.chart('container-1', {
                    chart: {
                        type: 'gauge',
                        plotBackgroundColor: null,
                        plotBackgroundImage: null,
                        plotBorderWidth: 0,
                        plotShadow: false
                    },
                    title: {
                        text: container1Name
                    },
                    subtitle: {
                        text: $('#PPK_100_status').val()
                    },
                    pane: {
                        startAngle: -90,
                        endAngle: 90,
                        background: [{
                            backgroundColor: '#DDD',
                            borderWidth: 0,
                            outerRadius: '120%',
                            innerRadius: '100%'
                        }]
                    },
                    // the value axis
                    yAxis: {
                        min: 0,
                        max: 200,

                        minorTickInterval: 'auto',
                        minorTickWidth: 1,
                        minorTickLength: 10,
                        minorTickPosition: 'inside',
                        minorTickColor: '#666',

                        tickPixelInterval: 30,
                        tickWidth: 2,
                        tickPosition: 'inside',
                        tickLength: 10,
                        tickColor: '#666',
                        labels: {
                            step: 2,
                            rotation: 'auto'
                        },
                        title: {
                            text: '%'
                        },
                        plotBands: [{
                            from: 0,
                            to: 95,
                            color: '#DF5353' // red
                        }, {
                            from: 95,
                            to: 100,
                            color: '#DDDF0D' // yellow
                        }, {
                            from: 100,
                            to: 200,
                            color: '#55BF3B' // green
                        }]
                    },
                    series: [{
                        name: container1Name,
                        data: [0],
                        tooltip: {
                            valueSuffix: ' %'
                        }
                    }]
                },
                // Add some life
                function (chart) {
                    if (!chart.renderer.forExport) {
                        let point = chart.series[0].points[0],
                            newVal,
                            inc = parseFloat($('#PPK_100').val());

                        newVal = point.y + inc;
                        if (newVal < 0 || newVal > 200) {
                            newVal = point.y - inc;
                        }

                        point.update(newVal);
                    }
                });

                // let container2Name = 'KPI 100%';
                // Highcharts.chart('container-2', {
                //     chart: {
                //         type: 'gauge',
                //         plotBackgroundColor: null,
                //         plotBackgroundImage: null,
                //         plotBorderWidth: 0,
                //         plotShadow: false
                //     },
                //     title: {
                //         text: container2Name
                //     },
                //     pane: {
                //         startAngle: -90,
                //         endAngle: 90,
                //         background: [{
                //             backgroundColor: '#DDD',
                //             borderWidth: 0,
                //             outerRadius: '120%',
                //             innerRadius: '100%'
                //         }]
                //     },
                //     // the value axis
                //     yAxis: {
                //         min: 0,
                //         max: 200,

                //         minorTickInterval: 'auto',
                //         minorTickWidth: 1,
                //         minorTickLength: 10,
                //         minorTickPosition: 'inside',
                //         minorTickColor: '#666',

                //         tickPixelInterval: 30,
                //         tickWidth: 2,
                //         tickPosition: 'inside',
                //         tickLength: 10,
                //         tickColor: '#666',
                //         labels: {
                //             step: 2,
                //             rotation: 'auto'
                //         },
                //         title: {
                //             text: '.'
                //         },
                //     },
                //     series: [{
                //         name: container2Name,
                //         data: [0],
                //         tooltip: {
                //             valueSuffix: ' .'
                //         }
                //     }]
                // },
                // // Add some life
                // function (chart) {
                //     if (!chart.renderer.forExport) {
                //         let point = chart.series[0].points[0],
                //             newVal,
                //             inc = parseFloat($('#KPI_100').val());

                //         newVal = point.y + inc;
                //         if (newVal < 0 || newVal > 200) {
                //             newVal = point.y - inc;
                //         }

                //         point.update(newVal);
                //     }
                // });

                // let container3Name = 'PI 100%';
                // Highcharts.chart('container-3', {
                //     chart: {
                //         type: 'gauge',
                //         plotBackgroundColor: null,
                //         plotBackgroundImage: null,
                //         plotBorderWidth: 0,
                //         plotShadow: false
                //     },
                //     title: {
                //         text: container3Name
                //     },
                //     pane: {
                //         startAngle: -90,
                //         endAngle: 90,
                //         background: [{
                //             backgroundColor: '#DDD',
                //             borderWidth: 0,
                //             outerRadius: '120%',
                //             innerRadius: '100%'
                //         }]
                //     },
                //     // the value axis
                //     yAxis: {
                //         min: 0,
                //         max: 200,

                //         minorTickInterval: 'auto',
                //         minorTickWidth: 1,
                //         minorTickLength: 10,
                //         minorTickPosition: 'inside',
                //         minorTickColor: '#666',

                //         tickPixelInterval: 30,
                //         tickWidth: 2,
                //         tickPosition: 'inside',
                //         tickLength: 10,
                //         tickColor: '#666',
                //         labels: {
                //             step: 2,
                //             rotation: 'auto'
                //         },
                //         title: {
                //             text: '.'
                //         },
                //     },
                //     series: [{
                //         name: container3Name,
                //         data: [0],
                //         tooltip: {
                //             valueSuffix: ' .'
                //         }
                //     }]
                // },
                // // Add some life
                // function (chart) {
                //     if (!chart.renderer.forExport) {
                //         let point = chart.series[0].points[0],
                //             newVal,
                //             inc = parseFloat($('#PI_100').val());

                //         newVal = point.y + inc;
                //         if (newVal < 0 || newVal > 200) {
                //             newVal = point.y - inc;
                //         }

                //         point.update(newVal);
                //     }
                // });

                let container4Name = 'NKO 110%';
                Highcharts.chart('container-4', {
                    chart: {
                        type: 'gauge',
                        plotBackgroundColor: null,
                        plotBackgroundImage: null,
                        plotBorderWidth: 0,
                        plotShadow: false
                    },
                    title: {
                        text: container4Name
                    },
                    subtitle: {
                        text: $('#PPK_110_status').val()
                    },
                    pane: {
                        startAngle: -90,
                        endAngle: 90,
                        background: [{
                            backgroundColor: '#DDD',
                            borderWidth: 0,
                            outerRadius: '120%',
                            innerRadius: '100%'
                        }]
                    },
                    // the value axis
                    yAxis: {
                        min: 0,
                        max: 200,

                        minorTickInterval: 'auto',
                        minorTickWidth: 1,
                        minorTickLength: 10,
                        minorTickPosition: 'inside',
                        minorTickColor: '#666',

                        tickPixelInterval: 30,
                        tickWidth: 2,
                        tickPosition: 'inside',
                        tickLength: 10,
                        tickColor: '#666',
                        labels: {
                            step: 2,
                            rotation: 'auto'
                        },
                        title: {
                            text: '%'
                        },
                        plotBands: [{
                            from: 0,
                            to: 95,
                            color: '#DF5353' // red
                        }, {
                            from: 95,
                            to: 100,
                            color: '#DDDF0D' // yellow
                        }, {
                            from: 100,
                            to: 200,
                            color: '#55BF3B' // green
                        }]
                    },
                    series: [{
                        name: container4Name,
                        data: [0],
                        tooltip: {
                            valueSuffix: ' %'
                        }
                    }]
                },
                // Add some life
                function (chart) {
                    if (!chart.renderer.forExport) {
                        let point = chart.series[0].points[0],
                            newVal,
                            inc = parseFloat($('#PPK_110').val());

                        newVal = point.y + inc;
                        if (newVal < 0 || newVal > 200) {
                            newVal = point.y - inc;
                        }

                        point.update(newVal);
                    }
                });

                // let container5Name = 'KPI 110%';
                // Highcharts.chart('container-5', {
                //     chart: {
                //         type: 'gauge',
                //         plotBackgroundColor: null,
                //         plotBackgroundImage: null,
                //         plotBorderWidth: 0,
                //         plotShadow: false
                //     },
                //     title: {
                //         text: container5Name
                //     },
                //     pane: {
                //         startAngle: -90,
                //         endAngle: 90,
                //         background: [{
                //             backgroundColor: '#DDD',
                //             borderWidth: 0,
                //             outerRadius: '120%',
                //             innerRadius: '100%'
                //         }]
                //     },
                //     // the value axis
                //     yAxis: {
                //         min: 0,
                //         max: 200,

                //         minorTickInterval: 'auto',
                //         minorTickWidth: 1,
                //         minorTickLength: 10,
                //         minorTickPosition: 'inside',
                //         minorTickColor: '#666',

                //         tickPixelInterval: 30,
                //         tickWidth: 2,
                //         tickPosition: 'inside',
                //         tickLength: 10,
                //         tickColor: '#666',
                //         labels: {
                //             step: 2,
                //             rotation: 'auto'
                //         },
                //         title: {
                //             text: '.'
                //         },
                //     },
                //     series: [{
                //         name: container5Name,
                //         data: [0],
                //         tooltip: {
                //             valueSuffix: ' .'
                //         }
                //     }]
                // },
                // // Add some life
                // function (chart) {
                //     if (!chart.renderer.forExport) {
                //         let point = chart.series[0].points[0],
                //             newVal,
                //             inc = parseFloat($('#KPI_110').val());

                //         newVal = point.y + inc;
                //         if (newVal < 0 || newVal > 200) {
                //             newVal = point.y - inc;
                //         }

                //         point.update(newVal);
                //     }
                // });

                // let container6Name = 'PI 110%';
                // Highcharts.chart('container-6', {
                //     chart: {
                //         type: 'gauge',
                //         plotBackgroundColor: null,
                //         plotBackgroundImage: null,
                //         plotBorderWidth: 0,
                //         plotShadow: false
                //     },
                //     title: {
                //         text: container6Name
                //     },
                //     pane: {
                //         startAngle: -90,
                //         endAngle: 90,
                //         background: [{
                //             backgroundColor: '#DDD',
                //             borderWidth: 0,
                //             outerRadius: '120%',
                //             innerRadius: '100%'
                //         }]
                //     },
                //     // the value axis
                //     yAxis: {
                //         min: 0,
                //         max: 200,

                //         minorTickInterval: 'auto',
                //         minorTickWidth: 1,
                //         minorTickLength: 10,
                //         minorTickPosition: 'inside',
                //         minorTickColor: '#666',

                //         tickPixelInterval: 30,
                //         tickWidth: 2,
                //         tickPosition: 'inside',
                //         tickLength: 10,
                //         tickColor: '#666',
                //         labels: {
                //             step: 2,
                //             rotation: 'auto'
                //         },
                //         title: {
                //             text: '.'
                //         },
                //     },
                //     series: [{
                //         name: container6Name,
                //         data: [0],
                //         tooltip: {
                //             valueSuffix: ' .'
                //         }
                //     }]
                // },
                // // Add some life
                // function (chart) {
                //     if (!chart.renderer.forExport) {
                //         let point = chart.series[0].points[0],
                //             newVal,
                //             inc = parseFloat($('#PI_110').val());

                //         newVal = point.y + inc;
                //         if (newVal < 0 || newVal > 200) {
                //             newVal = point.y - inc;
                //         }

                //         point.update(newVal);
                //     }
                // });
            }
        });

    </script>

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
                        <h3 class="card-title">MONITORING</h3>
                    </div>
                    <!-- end : card-header -->

                    <!-- card-body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <form action="{{ route('semongko.monitoring') }}" method="get">
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
                                                <p class="text-center">UNIT KERJA : {{ is_null(request()->query('unit')) ? '-' : cast_to_upper(request()->query('unit')) }} - TAHUN : {{ is_null(request()->query('tahun')) ? '-' : cast_to_upper(request()->query('tahun')) }} - BULAN : {{ is_null(request()->query('bulan')) ? '-' : 's.d. '.cast_to_upper(request()->query('bulan')) }}</p>
                                                <p class="text-center"><span class="badge badge-danger">MASALAH : NKO < 95%</span> <span class="badge badge-warning">HATI-HATI : NKO &ge; 95% s.d < 100%</span> <span class="badge badge-success">BAIK : NKO &ge; 100%</span></p>
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <figure class="highcharts-figure">
                                                    <div id="container-1"></div>
                                                </figure>
                                                <input type="hidden" id="PPK_100" value="{{ number_format($response->data->indicators->total->PPK_100, 2, '.', '') }}">
                                                <input type="hidden" id="PPK_100_status" value="{{ $response->data->indicators->total->PPK_100_status }}">
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <figure class="highcharts-figure">
                                                    <div id="container-2"></div>
                                                </figure>
                                                <input type="hidden" id="KPI_100" value="{{ number_format($response->data->indicators->total->KPI_100, 2, '.', '') }}">
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <figure class="highcharts-figure">
                                                    <div id="container-3"></div>
                                                </figure>
                                                <input type="hidden" id="PI_100" value="{{ number_format($response->data->indicators->total->PI_100, 2, '.', '') }}">
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <figure class="highcharts-figure">
                                                    <div id="container-4"></div>
                                                </figure>
                                                <input type="hidden" id="PPK_110" value="{{ number_format($response->data->indicators->total->PPK_110, 2, '.', '') }}">
                                                <input type="hidden" id="PPK_110_status" value="{{ $response->data->indicators->total->PPK_110_status }}">
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <figure class="highcharts-figure">
                                                    <div id="container-5"></div>
                                                </figure>
                                                <input type="hidden" id="KPI_110" value="{{ number_format($response->data->indicators->total->KPI_110, 2, '.', '') }}">
                                            </div>
                                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                                                <figure class="highcharts-figure">
                                                    <div id="container-6"></div>
                                                </figure>
                                                <input type="hidden" id="PI_110" value="{{ number_format($response->data->indicators->total->PI_110, 2, '.', '') }}">
                                            </div>
                                        </div>

                                        {{-- <input class="form-control form-control-sm mb-3" id="myInput" type="text" placeholder="Cari Indikator.."> --}}

                                        <a href="#table"><span class="badge badge-pill badge-info">Focus on table</span></a>

                                        <div class="table-responsive">
                                            <table class="table table-bordered table-sm" id="table">
                                                <thead class="small">
                                                    <tr>
                                                        <th class="text-center">INDIKATOR</th>
                                                        <th class="text-center">BOBOT</th>
                                                        <th class="text-center">TARGET</th>
                                                        <th class="text-center">REALISASI</th>
                                                        <th class="text-center">NILAI (CAPPING 100%)</th>
                                                        <th class="text-center">NILAI (CAPPING 110%)</th>
                                                        <th class="text-center">PENCAPAIAN & STATUS <span data-toggle="tooltip" data-placement="right" title="MASALAH : < 95%, HATI-HATI : &ge; 95% s.d < 100%, BAIK : &ge; 100%"><i class="fas fa-info-circle"></i></span></th>
                                                        <th class="text-center">CHART</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="small" id="myTable">
                                                    @foreach ($response->data->indicators->partials as $indicator)
                                                        <tr style="background-color: rgb({{ $indicator->bg_color->r }}, {{ $indicator->bg_color->g }}, {{ $indicator->bg_color->b }}); @if (($indicator->bg_color->r < 127.5) && ($indicator->bg_color->g < 127.5) && ($indicator->bg_color->b < 127.5)) color: white; @endif">
                                                            <td>
                                                                <div style="width: 400px;">
                                                                    <p style="margin: 0">{{ $indicator->indicator }} <span class="small text-muted">({{ $indicator->measure }})</span> - <span class="badge badge-info">{{ $indicator->type }}</span></p>
                                                                    <p style="margin: 0">Polaritas: <span class="badge badge-secondary">{!! $indicator->polarity !!}</span></p>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                {{ $indicator->selected_weight }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ in_array(gettype($indicator->selected_target), ['double', 'integer']) ? number_format($indicator->selected_target, 2, ',', '') : $indicator->selected_target }}
                                                            </td>
                                                            <td class="text-center">
                                                                {{ in_array(gettype($indicator->selected_realization), ['double', 'integer']) ? number_format($indicator->selected_realization, 2, ',', '') : $indicator->selected_realization }}
                                                            </td>
                                                            <td class="text-center">
                                                                @if (!is_null($indicator->capping_value_100))
                                                                    <p class="font-weight-bold">{{ in_array(gettype($indicator->capping_value_100), ['double', 'integer']) ? number_format($indicator->capping_value_100, 2, ',', '').' %' : $indicator->capping_value_100 }}</p>
                                                                    {{-- <p class="small">{{ $indicator->capping_value_100 === 'BELUM DINILAI' ? $indicator->capping_value_100 : $indicator->capping_value_100.' %' }}</p> --}}
                                                                @endif
                                                            </td>
                                                            <td class="text-center">
                                                                @if (!is_null($indicator->capping_value_110))
                                                                    <p class="font-weight-bold">{{ in_array(gettype($indicator->capping_value_110), ['double', 'integer']) ? number_format($indicator->capping_value_110, 2, ',', '').' %' : $indicator->capping_value_110 }}</p>
                                                                    {{-- <p class="small">{{ $indicator->capping_value_110 === 'BELUM DINILAI' ? $indicator->capping_value_110 : $indicator->capping_value_110.' %' }}</p> --}}
                                                                @endif
                                                            </td>
                                                            <td class="text-center {{ 'bg-'.$indicator->status_color }}">
                                                                @if (!is_null($indicator->achievement))
                                                                    <p class="font-weight-bold">{{ number_format($indicator->achievement, 2, ',', '') }} %</p>
                                                                    {{-- <p class="small">{{ $indicator->achievement }} %</p> --}}
                                                                @endif
                                                                {{ $indicator->status }}
                                                            </td>
                                                            <td class="text-center">
                                                                @if (!$indicator->dummy)
                                                                    <button type="button" class="btn btn-sm btn-outline-info chart" data-id="{{ $indicator->id }}" data-prefix="{{ $indicator->prefix }}" data-unit="{{ cast_to_upper(request()->query('unit')) }}" data-year="{{ request()->query('tahun') }}" data-month="{{ request()->query('bulan') }}" data-status="{{ $indicator->status }}"><i class="fas fa-chart-bar"></i></button>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr class="bg-info">
                                                        <td class="text-center">KEY PERFORMANCE INDIKATOR</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center">
                                                            <p class="font-weight-bold">{{ number_format($response->data->indicators->total->KPI_100, 2, ',', '') }}</p>
                                                            {{-- <p class="small">{{ $response->data->indicators->total->KPI_100 }}</p> --}}
                                                        </td>
                                                        <td class="text-center">
                                                            <p class="font-weight-bold">{{ number_format($response->data->indicators->total->KPI_110, 2, ',', '') }}</p>
                                                            {{-- <p class="small">{{ $response->data->indicators->total->KPI_110 }}</p> --}}
                                                        </td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                    </tr>
                                                    <tr class="bg-info">
                                                        <td class="text-center">PERFORMANCE INDIKATOR</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center">
                                                            <p class="font-weight-bold">{{ number_format($response->data->indicators->total->PI_100, 2, ',', '') }}</p>
                                                            {{-- <p class="small">{{ $response->data->indicators->total->PI_100 }}</p> --}}
                                                        </td>
                                                        <td class="text-center">
                                                            <p class="font-weight-bold">{{ number_format($response->data->indicators->total->PI_110, 2, ',', '') }}</p>
                                                            {{-- <p class="small">{{ $response->data->indicators->total->PI_110 }}</p> --}}
                                                        </td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                    </tr>
                                                    <tr class="bg-success">
                                                        <td class="text-center">TOTAL</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center">
                                                            <p class="font-weight-bold">{{ number_format($response->data->indicators->total->PK_100, 2, ',', '') }} %</p>
                                                            {{-- <p class="small">{{ $response->data->indicators->total->PK_100 }} %</p> --}}
                                                        </td>
                                                        <td class="text-center">
                                                            <p class="font-weight-bold">{{ number_format($response->data->indicators->total->PK_110, 2, ',', '') }} %</p>
                                                            {{-- <p class="small">{{ $response->data->indicators->total->PK_110 }} %</p> --}}
                                                        </td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                    </tr>
                                                    <tr class="bg-success">
                                                        <td class="text-center">NILAI KINERJA ORGANISASI (NKO)</td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center">
                                                            <p class="font-weight-bold">{{ number_format($response->data->indicators->total->PPK_100, 2, ',', '') }} %</p>
                                                            {{-- <p class="small">{{ $response->data->indicators->total->PPK_100 }} %</p> --}}
                                                        </td>
                                                        <td class="text-center">
                                                            <p class="font-weight-bold">{{ number_format($response->data->indicators->total->PPK_110, 2, ',', '') }} %</p>
                                                            {{-- <p class="small">{{ $response->data->indicators->total->PPK_110 }} %</p> --}}
                                                        </td>
                                                        <td class="text-center"></td>
                                                        <td class="text-center"></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <a href="{{ route('semongko.monitoring.export', ['level' => request()->query('level'),'unit' => request()->query('unit'),'tahun' => request()->query('tahun'),'bulan' => request()->query('bulan')]) }}" class="btn btn-sm btn-info mt-3">Download Hasil Monitoring UNIT KERJA : {{ is_null(request()->query('unit')) ? '-' : cast_to_upper(request()->query('unit')) }} - TAHUN : {{ is_null(request()->query('tahun')) ? '-' : cast_to_upper(request()->query('tahun')) }} - BULAN : {{ is_null(request()->query('bulan')) ? '-' : 's.d. '.cast_to_upper(request()->query('bulan')) }}</a>
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