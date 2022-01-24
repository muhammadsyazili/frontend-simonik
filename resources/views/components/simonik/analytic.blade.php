@extends('layouts/after-login')

@section('title', 'Analytic(s)')

{{-- ========================================================== --}}
@push('style')
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}"> {{-- required --}}
<!-- Ionicons -->
<link rel="stylesheet" href="https://pre.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> {{-- required --}}
<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('template/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
<!-- Theme Style -->
<link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}"> {{-- required --}}
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> {{-- required --}}
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<!-- Custom Style for Sidebar -->
<style>
  aside {
    color: #ffffff !important;
    background-color: rgb(14,42,71) !important;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='540' height='450' viewBox='0 0 1080 900'%3E%3Cg fill-opacity='.1'%3E%3Cpolygon fill='%23444' points='90 150 0 300 180 300'/%3E%3Cpolygon points='90 150 180 0 0 0'/%3E%3Cpolygon fill='%23AAA' points='270 150 360 0 180 0'/%3E%3Cpolygon fill='%23DDD' points='450 150 360 300 540 300'/%3E%3Cpolygon fill='%23999' points='450 150 540 0 360 0'/%3E%3Cpolygon points='630 150 540 300 720 300'/%3E%3Cpolygon fill='%23DDD' points='630 150 720 0 540 0'/%3E%3Cpolygon fill='%23444' points='810 150 720 300 900 300'/%3E%3Cpolygon fill='%23FFF' points='810 150 900 0 720 0'/%3E%3Cpolygon fill='%23DDD' points='990 150 900 300 1080 300'/%3E%3Cpolygon fill='%23444' points='990 150 1080 0 900 0'/%3E%3Cpolygon fill='%23DDD' points='90 450 0 600 180 600'/%3E%3Cpolygon points='90 450 180 300 0 300'/%3E%3Cpolygon fill='%23666' points='270 450 180 600 360 600'/%3E%3Cpolygon fill='%23AAA' points='270 450 360 300 180 300'/%3E%3Cpolygon fill='%23DDD' points='450 450 360 600 540 600'/%3E%3Cpolygon fill='%23999' points='450 450 540 300 360 300'/%3E%3Cpolygon fill='%23999' points='630 450 540 600 720 600'/%3E%3Cpolygon fill='%23FFF' points='630 450 720 300 540 300'/%3E%3Cpolygon points='810 450 720 600 900 600'/%3E%3Cpolygon fill='%23DDD' points='810 450 900 300 720 300'/%3E%3Cpolygon fill='%23AAA' points='990 450 900 600 1080 600'/%3E%3Cpolygon fill='%23444' points='990 450 1080 300 900 300'/%3E%3Cpolygon fill='%23222' points='90 750 0 900 180 900'/%3E%3Cpolygon points='270 750 180 900 360 900'/%3E%3Cpolygon fill='%23DDD' points='270 750 360 600 180 600'/%3E%3Cpolygon points='450 750 540 600 360 600'/%3E%3Cpolygon points='630 750 540 900 720 900'/%3E%3Cpolygon fill='%23444' points='630 750 720 600 540 600'/%3E%3Cpolygon fill='%23AAA' points='810 750 720 900 900 900'/%3E%3Cpolygon fill='%23666' points='810 750 900 600 720 600'/%3E%3Cpolygon fill='%23999' points='990 750 900 900 1080 900'/%3E%3Cpolygon fill='%23999' points='180 0 90 150 270 150'/%3E%3Cpolygon fill='%23444' points='360 0 270 150 450 150'/%3E%3Cpolygon fill='%23FFF' points='540 0 450 150 630 150'/%3E%3Cpolygon points='900 0 810 150 990 150'/%3E%3Cpolygon fill='%23222' points='0 300 -90 450 90 450'/%3E%3Cpolygon fill='%23FFF' points='0 300 90 150 -90 150'/%3E%3Cpolygon fill='%23FFF' points='180 300 90 450 270 450'/%3E%3Cpolygon fill='%23666' points='180 300 270 150 90 150'/%3E%3Cpolygon fill='%23222' points='360 300 270 450 450 450'/%3E%3Cpolygon fill='%23FFF' points='360 300 450 150 270 150'/%3E%3Cpolygon fill='%23444' points='540 300 450 450 630 450'/%3E%3Cpolygon fill='%23222' points='540 300 630 150 450 150'/%3E%3Cpolygon fill='%23AAA' points='720 300 630 450 810 450'/%3E%3Cpolygon fill='%23666' points='720 300 810 150 630 150'/%3E%3Cpolygon fill='%23FFF' points='900 300 810 450 990 450'/%3E%3Cpolygon fill='%23999' points='900 300 990 150 810 150'/%3E%3Cpolygon points='0 600 -90 750 90 750'/%3E%3Cpolygon fill='%23666' points='0 600 90 450 -90 450'/%3E%3Cpolygon fill='%23AAA' points='180 600 90 750 270 750'/%3E%3Cpolygon fill='%23444' points='180 600 270 450 90 450'/%3E%3Cpolygon fill='%23444' points='360 600 270 750 450 750'/%3E%3Cpolygon fill='%23999' points='360 600 450 450 270 450'/%3E%3Cpolygon fill='%23666' points='540 600 630 450 450 450'/%3E%3Cpolygon fill='%23222' points='720 600 630 750 810 750'/%3E%3Cpolygon fill='%23FFF' points='900 600 810 750 990 750'/%3E%3Cpolygon fill='%23222' points='900 600 990 450 810 450'/%3E%3Cpolygon fill='%23DDD' points='0 900 90 750 -90 750'/%3E%3Cpolygon fill='%23444' points='180 900 270 750 90 750'/%3E%3Cpolygon fill='%23FFF' points='360 900 450 750 270 750'/%3E%3Cpolygon fill='%23AAA' points='540 900 630 750 450 750'/%3E%3Cpolygon fill='%23FFF' points='720 900 810 750 630 750'/%3E%3Cpolygon fill='%23222' points='900 900 990 750 810 750'/%3E%3Cpolygon fill='%23222' points='1080 300 990 450 1170 450'/%3E%3Cpolygon fill='%23FFF' points='1080 300 1170 150 990 150'/%3E%3Cpolygon points='1080 600 990 750 1170 750'/%3E%3Cpolygon fill='%23666' points='1080 600 1170 450 990 450'/%3E%3Cpolygon fill='%23DDD' points='1080 900 1170 750 990 750'/%3E%3C/g%3E%3C/svg%3E");
  }

  aside .brand-link {
    background-color: rgb(14,42,71) !important;
  }
</style>

<!-- Custom Style for Navbar -->
<style>
  nav.main-header {
    color: #ffffff !important;
    background-color: rgb(14,42,71) !important;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='540' height='450' viewBox='0 0 1080 900'%3E%3Cg fill-opacity='.1'%3E%3Cpolygon fill='%23444' points='90 150 0 300 180 300'/%3E%3Cpolygon points='90 150 180 0 0 0'/%3E%3Cpolygon fill='%23AAA' points='270 150 360 0 180 0'/%3E%3Cpolygon fill='%23DDD' points='450 150 360 300 540 300'/%3E%3Cpolygon fill='%23999' points='450 150 540 0 360 0'/%3E%3Cpolygon points='630 150 540 300 720 300'/%3E%3Cpolygon fill='%23DDD' points='630 150 720 0 540 0'/%3E%3Cpolygon fill='%23444' points='810 150 720 300 900 300'/%3E%3Cpolygon fill='%23FFF' points='810 150 900 0 720 0'/%3E%3Cpolygon fill='%23DDD' points='990 150 900 300 1080 300'/%3E%3Cpolygon fill='%23444' points='990 150 1080 0 900 0'/%3E%3Cpolygon fill='%23DDD' points='90 450 0 600 180 600'/%3E%3Cpolygon points='90 450 180 300 0 300'/%3E%3Cpolygon fill='%23666' points='270 450 180 600 360 600'/%3E%3Cpolygon fill='%23AAA' points='270 450 360 300 180 300'/%3E%3Cpolygon fill='%23DDD' points='450 450 360 600 540 600'/%3E%3Cpolygon fill='%23999' points='450 450 540 300 360 300'/%3E%3Cpolygon fill='%23999' points='630 450 540 600 720 600'/%3E%3Cpolygon fill='%23FFF' points='630 450 720 300 540 300'/%3E%3Cpolygon points='810 450 720 600 900 600'/%3E%3Cpolygon fill='%23DDD' points='810 450 900 300 720 300'/%3E%3Cpolygon fill='%23AAA' points='990 450 900 600 1080 600'/%3E%3Cpolygon fill='%23444' points='990 450 1080 300 900 300'/%3E%3Cpolygon fill='%23222' points='90 750 0 900 180 900'/%3E%3Cpolygon points='270 750 180 900 360 900'/%3E%3Cpolygon fill='%23DDD' points='270 750 360 600 180 600'/%3E%3Cpolygon points='450 750 540 600 360 600'/%3E%3Cpolygon points='630 750 540 900 720 900'/%3E%3Cpolygon fill='%23444' points='630 750 720 600 540 600'/%3E%3Cpolygon fill='%23AAA' points='810 750 720 900 900 900'/%3E%3Cpolygon fill='%23666' points='810 750 900 600 720 600'/%3E%3Cpolygon fill='%23999' points='990 750 900 900 1080 900'/%3E%3Cpolygon fill='%23999' points='180 0 90 150 270 150'/%3E%3Cpolygon fill='%23444' points='360 0 270 150 450 150'/%3E%3Cpolygon fill='%23FFF' points='540 0 450 150 630 150'/%3E%3Cpolygon points='900 0 810 150 990 150'/%3E%3Cpolygon fill='%23222' points='0 300 -90 450 90 450'/%3E%3Cpolygon fill='%23FFF' points='0 300 90 150 -90 150'/%3E%3Cpolygon fill='%23FFF' points='180 300 90 450 270 450'/%3E%3Cpolygon fill='%23666' points='180 300 270 150 90 150'/%3E%3Cpolygon fill='%23222' points='360 300 270 450 450 450'/%3E%3Cpolygon fill='%23FFF' points='360 300 450 150 270 150'/%3E%3Cpolygon fill='%23444' points='540 300 450 450 630 450'/%3E%3Cpolygon fill='%23222' points='540 300 630 150 450 150'/%3E%3Cpolygon fill='%23AAA' points='720 300 630 450 810 450'/%3E%3Cpolygon fill='%23666' points='720 300 810 150 630 150'/%3E%3Cpolygon fill='%23FFF' points='900 300 810 450 990 450'/%3E%3Cpolygon fill='%23999' points='900 300 990 150 810 150'/%3E%3Cpolygon points='0 600 -90 750 90 750'/%3E%3Cpolygon fill='%23666' points='0 600 90 450 -90 450'/%3E%3Cpolygon fill='%23AAA' points='180 600 90 750 270 750'/%3E%3Cpolygon fill='%23444' points='180 600 270 450 90 450'/%3E%3Cpolygon fill='%23444' points='360 600 270 750 450 750'/%3E%3Cpolygon fill='%23999' points='360 600 450 450 270 450'/%3E%3Cpolygon fill='%23666' points='540 600 630 450 450 450'/%3E%3Cpolygon fill='%23222' points='720 600 630 750 810 750'/%3E%3Cpolygon fill='%23FFF' points='900 600 810 750 990 750'/%3E%3Cpolygon fill='%23222' points='900 600 990 450 810 450'/%3E%3Cpolygon fill='%23DDD' points='0 900 90 750 -90 750'/%3E%3Cpolygon fill='%23444' points='180 900 270 750 90 750'/%3E%3Cpolygon fill='%23FFF' points='360 900 450 750 270 750'/%3E%3Cpolygon fill='%23AAA' points='540 900 630 750 450 750'/%3E%3Cpolygon fill='%23FFF' points='720 900 810 750 630 750'/%3E%3Cpolygon fill='%23222' points='900 900 990 750 810 750'/%3E%3Cpolygon fill='%23222' points='1080 300 990 450 1170 450'/%3E%3Cpolygon fill='%23FFF' points='1080 300 1170 150 990 150'/%3E%3Cpolygon points='1080 600 990 750 1170 750'/%3E%3Cpolygon fill='%23666' points='1080 600 1170 450 990 450'/%3E%3Cpolygon fill='%23DDD' points='1080 900 1170 750 990 750'/%3E%3C/g%3E%3C/svg%3E");
  }
</style>

<!-- Custom Style for Content -->
<style>
</style>

<!-- Highcharts -->
<style>
    .highcharts-figure, .highcharts-data-table table {
        min-width: 360px;
        max-width: 800px;
        margin: 1em auto;
    }

    .highcharts-data-table table {
        font-family: Verdana, sans-serif;
        border-collapse: collapse;
        border: 1px solid #EBEBEB;
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
    .highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
        padding: 0.5em;
    }
    .highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
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
<script src="{{ asset('template/plugins/jquery/jquery.js') }}"></script> {{-- required --}}
<script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script> {{-- required --}}
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Popper -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> {{-- required --}}
<!-- Select2 -->
<script src="{{ asset('template/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('template/dist/js/adminlte.min.js') }}"></script> {{-- required --}}
<!-- AdminLTE For Demo Purposes -->
<script src="{{ asset('template/dist/js/demo.js') }}"></script> {{-- required --}}
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/data.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

{{-- Admin LTE Custom --}}
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
    });
</script>

{{-- Fixed Header Table --}}
<script>
    let $th = $('.table-fix-head-wrap').find('thead th')
    $('.table-fix-head-wrap').on('scroll', function() {
        $th.css('transform', `translateY(${this.scrollTop}px)`);
    });
</script>

{{-- Change Color Row Table on Click --}}
<script>
    $('table').on('click', 'tbody tr', function(event) {
        $(this).addClass('highlight').siblings().removeClass('highlight');
    });
</script>

{{-- Highcharts --}}
<script>
    let chart = Highcharts.chart('container', {
        chart: {
            type: 'line'
        },
        title: {
            text: 'KPI'
        },
        subtitle: {
            text: '- Intensifikasi'
        },
        xAxis: {
            title: {
                text: 'Mounth'
            },
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
        },
        yAxis: {
            title: {
                text: 'GWH'
            },
            labels: {
                format: '{value} GWH'
            },
        },
        tooltip: {
            shared: false,
            crosshairs: true
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: true
            }
        },
        series: [
            {
                id: 'palembangT',
                name: 'UP3 Palembang (Target)',
                data: [7.0, 6.9, 9.5, 14.5, 18.4, 21.5, 25.2, 26.5, 23.3, 18.3, 13.9, 9.6]
            },
            {
                id: 'palembangR',
                name: 'UP3 Palembang (Realisasi)',
                data: [7.1, 7.0, 9.6, 14.6, 18.5, 21.6, 25.3, 26.6, 23.4, 18.4, 14.0, 9.7]
            },
            {
                id: 'ogan-ilirT',
                name: 'UP3 Ogan Ilir (Target)',
                data: [3.9, 4.2, 5.7, 8.5, 11.9, 15.2, 17.0, 16.6, 14.2, 10.3, 6.6, 4.8]
            },
            {
                id: 'ogan-ilirR',
                name: 'UP3 Ogan Ilir (Realisasi)',
                data: [4.0, 4.3, 5.8, 8.6, 12.0, 15.3, 17.1, 16.7, 14.3, 10.4, 6.7, 4.9]
            },
            {
                id: 'lahatT',
                name: 'UP3 Lahat (Target)',
                data: [4.0, 4.5, 3.7, 8.1, 10.9, 11.2, 17.4, 16.0, 11.4, 10.8, 6.4, 4.0]
            },
            {
                id: 'lahatR',
                name: 'UP3 Lahat (Realisasi)',
                data: [4.1, 4.6, 3.8, 8.2, 11.0, 11.3, 17.5, 16.1, 11.5, 10.9, 6.5, 4.1]
            },
            {
                id: 'bengkuluT',
                name: 'UP3 Bengkulu (Target)',
                data: [7.5, 6.2, 9.1, 12.5, 14.4, 21.9, 25.0, 21.5, 23.6, 11.3, 13.2, 9.8]
            },
            {
                id: 'bengkuluR',
                name: 'UP3 Bengkulu (Realisasi)',
                data: [7.6, 6.3, 9.2, 12.6, 14.5, 22.0, 25.1, 21.6, 23.7, 11.4, 13.3, 9.9]
            },
            {
                id: 'jambiT',
                name: 'UP3 Jambi (Target)',
                data: [8.9, 4.5, 2.7, 7.5, 21.9, 19.4, 12.6, 16.1, 20.2, 18.2, 11.4, 6.3]
            },
            {
                id: 'jambiR',
                name: 'UP3 Jambi (Realisasi)',
                data: [9.0, 4.6, 2.8, 7.6, 22.0, 19.5, 12.7, 16.2, 20.3, 18.3, 11.5, 6.4]
            },
            {
                id: 'muara-bungoT',
                name: 'UP3 Muara Bungo (Target)',
                data: [1.2, 5.8, 5.3, 6.9, 17.2, 25.2, 14.7, 16.8, 25.2, 12.3, 6.7, 2.6]
            },
            {
                id: 'muara-bungoR',
                name: 'UP3 Muara Bungo (Realisasi)',
                data: [1.3, 5.9, 5.4, 7.0, 17.3, 25.3, 14.8, 16.9, 25.3, 12.4, 6.8, 2.7]
            },
        ]
    });

    let checkboxes = ['palembangT', 'palembangR', 'ogan-ilirT', 'ogan-ilirR', 'lahatT', 'lahatR', 'bengkuluT', 'bengkuluR', 'jambiT', 'jambiR', 'muara-bungoT', 'muara-bungoR'];

    checkboxes.forEach((elem, i) => {
        let checkbox = document.getElementById(elem);
        checkbox.onchange = function() {
            chart.series[i].update({
                showInLegend: chart.series[i].legendItem ? false : true
            });
            chart.series[i].setVisible();
        }
    });
</script>
@endpush

{{-- ========================================================== --}}

@section('content')
    <div class="content-wrapper pt-3">

        {{-- section: searching --}}
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                {{-- ============================================================ --}}
                <div class="card-header">
                    <h3 class="card-title">Filter</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div>
                        <form action="{{ route('indicator.index') }}" method="get">
                            <div class="input-group mb-3">
                                <span class="input-group-append">
                                    <span class="input-group-text">Level</span>
                                </span>

                                <select class="form-control select2" name="level" style="width: 100px;">
                                    <option value="uiw" @if(request()->get('level') == 'uiw') selected @endif>UIW</option>
                                    <option value="up3" @if(request()->get('level') == 'up3') selected @endif>UP3</option>
                                    <option value="ulp" @if(request()->get('level') == 'ulp') selected @endif>ULP</option>
                                    <option value="up2k" @if(request()->get('level') == 'up2k') selected @endif>UP2K</option>
                                    <option value="up2d" @if(request()->get('level') == 'up2d') selected @endif>UP2D</option>
                                </select>

                                <span class="input-group-append">
                                    <span class="input-group-text">Unit</span>
                                </span>

                                <select class="form-control select2" name="unit">
                                    <option value="ALL" @if(request()->get('unit') == 'ALL') selected @endif @if(!request()->get('unit')) selected @endif>-- Semua --</option>
                                    <option value="palembang" @if(request()->get('unit') == 'palembang') selected @endif>Palembang</option>
                                    <option value="ogan-ilir" @if(request()->get('unit') == 'ogan-ilir') selected @endif>Ogan Ilir</option>
                                    <option value="lahat" @if(request()->get('unit') == 'lahat') selected @endif>Lahat</option>
                                    <option value="bengkulu" @if(request()->get('unit') == 'bengkulu') selected @endif>Bengkulu</option>
                                    <option value="jambi" @if(request()->get('unit') == 'jambi') selected @endif>Jambi</option>
                                    <option value="muara-bungo" @if(request()->get('unit') == 'muara-bungo') selected @endif>Muara Bungo</option>
                                </select>

                                <span class="input-group-append">
                                    <span class="input-group-text">KPI</span>
                                </span>

                                <select class="form-control select2" name="kpi" style="width: 300px;">
                                    <option value="1" @if(request()->get('unit') == '1') selected @endif>- Intensifikasi</option>
                                    <option value="2" @if(request()->get('unit') == '2') selected @endif>- Ekstensifikasi</option>
                                    <option value="3" @if(request()->get('unit') == '3') selected @endif>b. Rupiah Pendapatan Penjualan Tenaga Listrik</option>
                                    <option value="4" @if(request()->get('unit') == '4') selected @endif>Pengendalian Piutang Rata-Rata Tunggakan</option>
                                    <option value="5" @if(request()->get('unit') == '5') selected @endif>Susut Jaringan (Tanpa E-min)</option>
                                </select>

                                <span class="input-group-append">
                                    <span class="input-group-text">Tahun</span>
                                </span>

                                <input type="text" class="form-control" name="tahun" value="@if(request()->get('tahun')) {{ request()->get('tahun') }} @else {{ now()->year }} @endif"/>

                                <span class="input-group-append">
                                    <button type="submit" class="btn btn-info btn-flat" data-toggle="tooltip" data-placement="buttom" title="Search"><i class="fas fa-search"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.card-body -->
                {{-- ============================================================ --}}
            </div>
        </div>

        {{-- section: chart --}}
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                {{-- ============================================================ --}}
                <div class="card-header">
                    <h3 class="card-title">Chart</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div id="container" style="width:100%; height:500px;"></div>

                    {{-- section: table --}}
                    <form action="{{ route('indicator-order-save') }}" method="post">
                        @csrf
                        @method('put')
                        <div class="table-responsive-sm">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="text-center">Unit</th>
                                        <th class="text-center">Bobot</th>
                                        <th class="text-center">Target</th>
                                        <th class="text-center">Realisasi</th>
                                        <th class="text-center">Pecapaian (%)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>UP3 Palembang</td>
                                        <td class="text-center"><span class="badge bg-info">100</span></td>
                                        <td class="text-center"><input id="palembangT" type="checkbox" checked> 0</td>
                                        <td class="text-center"><input id="palembangR" type="checkbox" checked> 0</td>
                                        <td class="text-center">0</td>
                                    </tr>
                                    <tr>
                                        <td>UP3 Ogan Ilir</td>
                                        <td class="text-center"><span class="badge bg-info">100</span></td>
                                        <td class="text-center"><input id="ogan-ilirT" type="checkbox" checked> 0</td>
                                        <td class="text-center"><input id="ogan-ilirR" type="checkbox" checked> 0</td>
                                        <td class="text-center">0</td>
                                    </tr>
                                    <tr>
                                        <td>UP3 Lahat</td>
                                        <td class="text-center"><span class="badge bg-info">100</span></td>
                                        <td class="text-center"><input id="lahatT" type="checkbox" checked> 0</td>
                                        <td class="text-center"><input id="lahatR" type="checkbox" checked> 0</td>
                                        <td class="text-center">0</td>
                                    </tr>
                                    <tr>
                                        <td>UP3 Bengkulu</td>
                                        <td class="text-center"><span class="badge bg-info">100</span></td>
                                        <td class="text-center"><input id="bengkuluT" type="checkbox" checked> 0</td>
                                        <td class="text-center"><input id="bengkuluR" type="checkbox" checked> 0</td>
                                        <td class="text-center">0</td>
                                    </tr>
                                    <tr>
                                        <td>UP3 Jambi</td>
                                        <td class="text-center"><span class="badge bg-info">100</span></td>
                                        <td class="text-center"><input id="jambiT" type="checkbox" checked> 0</td>
                                        <td class="text-center"><input id="jambiR" type="checkbox" checked> 0</td>
                                        <td class="text-center">0</td>
                                    </tr>
                                    <tr>
                                        <td>UP3 Muara Bungo</td>
                                        <td class="text-center"><span class="badge bg-info">100</span></td>
                                        <td class="text-center"><input id="muara-bungoT" type="checkbox" checked> 0</td>
                                        <td class="text-center"><input id="muara-bungoR" type="checkbox" checked> 0</td>
                                        <td class="text-center">0</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
                {{-- ============================================================ --}}
            </div>
        </div>
    </div>
@endsection
