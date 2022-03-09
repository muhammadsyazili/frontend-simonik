@extends('layouts/before-login')

@section('title', 'Dashboard')

{{-- ========================================================== --}}
@push('metadata')
    <meta name="host" content="{{ env('HOST_SIMONIK') }}">

    <meta name="level" content="{{ request()->query('level') }}">
    <meta name="unit" content="{{ request()->query('unit') }}">
    <meta name="tahun" content="{{ request()->query('tahun') }}">
    <meta name="bulan" content="{{ request()->query('bulan') }}">
@endpush

@push('style')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}"> {{-- required --}}
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> {{-- required --}}
    <!-- Theme Style -->
    <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}"> {{-- required --}}
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    {{-- required --}}

    <!-- Custom Bootstrap -->
    <style>
        .login-box,
        .register-box {
            width: 95% !important;
        }

        .login-logo #icon-brand,
        .register-logo #icon-brand {
            width: 200px;
        }

        @media (max-width:576px) {

            .login-box,
            .register-box {
                margin-top: .5rem !important;
                width: 90% !important;
            }

            .login-logo #icon-brand,
            .register-logo #icon-brand {
                width: 100px;
            }
        }

        body {
            color: #000000 !important;
            background-repeat: no-repeat !important;
            background-position: center !important;
            background-size: cover !important;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' width='1440' height='560' preserveAspectRatio='none' viewBox='0 0 1440 560'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1138%26quot%3b)' fill='none'%3e%3crect width='1440' height='560' x='0' y='0' fill='%230e2a47'%3e%3c/rect%3e%3cpath d='M1374.8182567559304 661.4409779065415L1453.3798268815526 530.6925686452272 1322.6314176202382 452.1309985196051 1244.0698474946162 582.8794077809195z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M934.4512916068126 321.8816379401076L862.2644895457714 389.1969198820617 999.3308134892231 463.8194820026464z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M438.88544005857284 460.0383138094142L288.2001814823287 470.5752535485345 298.737121221449 621.2605121247786 449.4223797976931 610.7235723856584z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M89.06744240727258 539.9768609581446L153.84907151254077 472.89352024290196 86.76573079729813 408.1118911376338 21.984101692029952 475.1952318528764z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M850.0034095659664 197.5665106521741L744.3863204198994 95.57327323601918 748.0101721498115 303.1835997982411z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M184.6 275.33 a132.73 132.73 0 1 0 265.46 0 a132.73 132.73 0 1 0 -265.46 0z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M525.4318405287888 222.01693709847356L401.81233024632576 179.45132616687587 359.24671931472807 303.0708364493389 482.86622959719114 345.6364473809366z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M1021.8364710537625 199.0850522053059L1092.2452023898177 260.29042858220447 1148.8489012871378 124.07464338967233z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M658.0456392911732-3.913775668647151L670.0753212483417 133.58611828737233 807.5752152043611 121.55643633020391 795.5455332471927-15.943457625815592z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M1286.1380878402058 19.96910337089388L1254.2847903639565 183.84011282422892 1418.1557998172916 215.69341030047818 1450.009097293541 51.82240084714313z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M930.3130614551949 80.42124873023403L978.4892609323159 183.7354419127688 1081.8034541148506 135.55924243564783 1033.6272546377297 32.24504925311304z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M-106.98 419.92 a180.78 180.78 0 1 0 361.56 0 a180.78 180.78 0 1 0 -361.56 0z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M993.7317628424735 592.6140403970359L1066.2539337400456 480.939690332091 954.5795836751007 408.4175194345189 882.0574127775286 520.0918694994638z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M1187.9161541892993 273.1227693371701L1271.8613330786775 327.63740592025556 1311.6606985086166 174.46231929464568z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M438.66 158.74 a115.46 115.46 0 1 0 230.92 0 a115.46 115.46 0 1 0 -230.92 0z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M176.33384872292797 321.0647714100061L319.88264625092546 263.06729252159414 261.8851673625135 119.51849499359662 118.33636983451602 177.51597388200858z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M1170.6673767451232 244.52771647821774L1174.366170338619 350.44730666279014 1280.2857605231914 346.7485130692943 1276.5869669296956 240.82892288472192z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M1080.9347644499032 409.6937798650966L1083.0494612226125 530.8446768342935 1202.0856614191002 407.57908309238735z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M1125.7092519155563 329.2096135246319L1157.4697919100074 426.95850459735067 1255.2186829827262 395.19796460289945 1223.458142988275 297.4490735301806z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M1108.5971888074737 275.6585627335174L1059.4824483550333 403.606836001444 1187.43072162296 452.7215764538844 1236.5454620754003 324.77330318595773z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float3'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1138'%3e%3crect width='1440' height='560' fill='white'%3e%3c/rect%3e%3c/mask%3e%3cstyle%3e %40keyframes float1 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(-10px%2c 0)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float1 %7b animation: float1 5s infinite%3b %7d %40keyframes float2 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(-5px%2c -5px)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float2 %7b animation: float2 4s infinite%3b %7d %40keyframes float3 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(0%2c -10px)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float3 %7b animation: float3 6s infinite%3b %7d %3c/style%3e%3c/defs%3e%3c/svg%3e") !important;
        }

        .lockscreen-footer {
            color: #ffffff !important;
        }

    </style>
    <!-- End : Custom Bootstrap -->

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
            height: 350px;
        }
        #container-2 {
            height: 300px;
        }
        #container-3 {
            height: 300px;
        }
        #container-4 {
            height: 350px;
        }
        #container-5 {
            height: 300px;
        }
        #container-6 {
            height: 300px;
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

    {{-- highcharts --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script src="https://code.highcharts.com/highcharts-more.js"></script>

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

                let container2Name = 'KPI 100%';
                Highcharts.chart('container-2', {
                    chart: {
                        type: 'gauge',
                        plotBackgroundColor: null,
                        plotBackgroundImage: null,
                        plotBorderWidth: 0,
                        plotShadow: false
                    },
                    title: {
                        text: container2Name
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
                    },
                    series: [{
                        name: container2Name,
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
                            inc = parseFloat($('#KPI_100').val());

                        newVal = point.y + inc;
                        if (newVal < 0 || newVal > 200) {
                            newVal = point.y - inc;
                        }

                        point.update(newVal);
                    }
                });

                let container3Name = 'PI 100%';
                Highcharts.chart('container-3', {
                    chart: {
                        type: 'gauge',
                        plotBackgroundColor: null,
                        plotBackgroundImage: null,
                        plotBorderWidth: 0,
                        plotShadow: false
                    },
                    title: {
                        text: container3Name
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
                    },
                    series: [{
                        name: container3Name,
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
                            inc = parseFloat($('#PI_100').val());

                        newVal = point.y + inc;
                        if (newVal < 0 || newVal > 200) {
                            newVal = point.y - inc;
                        }

                        point.update(newVal);
                    }
                });

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

                let container5Name = 'KPI 110%';
                Highcharts.chart('container-5', {
                    chart: {
                        type: 'gauge',
                        plotBackgroundColor: null,
                        plotBackgroundImage: null,
                        plotBorderWidth: 0,
                        plotShadow: false
                    },
                    title: {
                        text: container5Name
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
                    },
                    series: [{
                        name: container5Name,
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
                            inc = parseFloat($('#KPI_110').val());

                        newVal = point.y + inc;
                        if (newVal < 0 || newVal > 200) {
                            newVal = point.y - inc;
                        }

                        point.update(newVal);
                    }
                });

                let container6Name = 'PI 110%';
                Highcharts.chart('container-6', {
                    chart: {
                        type: 'gauge',
                        plotBackgroundColor: null,
                        plotBackgroundImage: null,
                        plotBorderWidth: 0,
                        plotShadow: false
                    },
                    title: {
                        text: container6Name
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
                    },
                    series: [{
                        name: container6Name,
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
                            inc = parseFloat($('#PI_110').val());

                        newVal = point.y + inc;
                        if (newVal < 0 || newVal > 200) {
                            newVal = point.y - inc;
                        }

                        point.update(newVal);
                    }
                });
            }
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
                $('select[name="bulan"] option').each(function() {
                    if ($(this).val() == $('meta[name="bulan"]').attr('content'))
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

            $.ajax({
                type: 'GET',
                url: `${host}/open/levels`,
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
                        $('.dynamic-option').remove();

                        if (res.data.length > 0) {
                            let html = '';
                            for (let i = 0; i < res.data.length; i++) {
                                html += `<option class="dynamic-option" value="${res.data[i].slug}">${res.data[i].name}</option>`;
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
    <div class="login-box">
        @if (session()->has('danger_message'))
            @include('_alert-danger',['message' => session()->get('danger_message')])
        @else
            @if (session()->has('danger_message'))
                <div class="alert alert-danger alert-dismissible">
                    <h1 class="text-center"><i class="icon fas fa-ban"></i> {{ session()->get('danger_message') }}</h1>
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $errorV)
                        <p class="small">{{ $errorV }}</p>
                    @endforeach
                </div>
            @endif

            <div class="card border-0 shadow rounded mt-3">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="float-left"><h3 class="card-title">DASHBOARD</h3></div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="float-right"><a href="{{ route('login.form') }}"> Login</a></div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            <form action="{{ route('simonik.dashboard.before') }}" method="get">
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
                                            <p class="text-center">UNIT KERJA : {{ request()->query('unit') == null ? '-' : cast_to_upper(request()->query('unit')) }} - TAHUN : {{ request()->query('tahun') == null ? '-' : cast_to_upper(request()->query('tahun')) }} - BULAN : {{ request()->query('bulan') == null ? '-' : 's.d. '.cast_to_upper(request()->query('bulan')) }} </p>
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
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="float-left"><i class="far fa-copyright"></i> PT. PLN(Persero) UIW S2JB - RENUS</div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="float-right">{{ now()->year }}</div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
