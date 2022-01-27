@extends('layouts/after-login')

@section('title', 'Kertas Kerja - Realisasi')

{{-- ========================================================== --}}
@push('metadata')
    <meta name="host" content="{{ env('HOST_SIMONIK') }}">
    <meta name="level" content="{{ request()->query('level') }}">
    <meta name="unit" content="{{ request()->query('unit') }}">
    <meta name="year" content="{{ request()->query('tahun') }}">
@endpush

{{-- ========================================================== --}}
@push('style')
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}"> {{-- required --}}
<!-- Ionicons -->
<link rel="stylesheet" href="https://pre.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> {{-- required --}}
<!-- Theme Style -->
<link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}"> {{-- required --}}
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> {{-- required --}}

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
<!-- End : Custom Style for Sidebar -->

<!-- Custom Style for Navbar -->
<style>
  nav.main-header {
    color: #ffffff !important;
    background-color: rgb(14,42,71) !important;
    background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='540' height='450' viewBox='0 0 1080 900'%3E%3Cg fill-opacity='.1'%3E%3Cpolygon fill='%23444' points='90 150 0 300 180 300'/%3E%3Cpolygon points='90 150 180 0 0 0'/%3E%3Cpolygon fill='%23AAA' points='270 150 360 0 180 0'/%3E%3Cpolygon fill='%23DDD' points='450 150 360 300 540 300'/%3E%3Cpolygon fill='%23999' points='450 150 540 0 360 0'/%3E%3Cpolygon points='630 150 540 300 720 300'/%3E%3Cpolygon fill='%23DDD' points='630 150 720 0 540 0'/%3E%3Cpolygon fill='%23444' points='810 150 720 300 900 300'/%3E%3Cpolygon fill='%23FFF' points='810 150 900 0 720 0'/%3E%3Cpolygon fill='%23DDD' points='990 150 900 300 1080 300'/%3E%3Cpolygon fill='%23444' points='990 150 1080 0 900 0'/%3E%3Cpolygon fill='%23DDD' points='90 450 0 600 180 600'/%3E%3Cpolygon points='90 450 180 300 0 300'/%3E%3Cpolygon fill='%23666' points='270 450 180 600 360 600'/%3E%3Cpolygon fill='%23AAA' points='270 450 360 300 180 300'/%3E%3Cpolygon fill='%23DDD' points='450 450 360 600 540 600'/%3E%3Cpolygon fill='%23999' points='450 450 540 300 360 300'/%3E%3Cpolygon fill='%23999' points='630 450 540 600 720 600'/%3E%3Cpolygon fill='%23FFF' points='630 450 720 300 540 300'/%3E%3Cpolygon points='810 450 720 600 900 600'/%3E%3Cpolygon fill='%23DDD' points='810 450 900 300 720 300'/%3E%3Cpolygon fill='%23AAA' points='990 450 900 600 1080 600'/%3E%3Cpolygon fill='%23444' points='990 450 1080 300 900 300'/%3E%3Cpolygon fill='%23222' points='90 750 0 900 180 900'/%3E%3Cpolygon points='270 750 180 900 360 900'/%3E%3Cpolygon fill='%23DDD' points='270 750 360 600 180 600'/%3E%3Cpolygon points='450 750 540 600 360 600'/%3E%3Cpolygon points='630 750 540 900 720 900'/%3E%3Cpolygon fill='%23444' points='630 750 720 600 540 600'/%3E%3Cpolygon fill='%23AAA' points='810 750 720 900 900 900'/%3E%3Cpolygon fill='%23666' points='810 750 900 600 720 600'/%3E%3Cpolygon fill='%23999' points='990 750 900 900 1080 900'/%3E%3Cpolygon fill='%23999' points='180 0 90 150 270 150'/%3E%3Cpolygon fill='%23444' points='360 0 270 150 450 150'/%3E%3Cpolygon fill='%23FFF' points='540 0 450 150 630 150'/%3E%3Cpolygon points='900 0 810 150 990 150'/%3E%3Cpolygon fill='%23222' points='0 300 -90 450 90 450'/%3E%3Cpolygon fill='%23FFF' points='0 300 90 150 -90 150'/%3E%3Cpolygon fill='%23FFF' points='180 300 90 450 270 450'/%3E%3Cpolygon fill='%23666' points='180 300 270 150 90 150'/%3E%3Cpolygon fill='%23222' points='360 300 270 450 450 450'/%3E%3Cpolygon fill='%23FFF' points='360 300 450 150 270 150'/%3E%3Cpolygon fill='%23444' points='540 300 450 450 630 450'/%3E%3Cpolygon fill='%23222' points='540 300 630 150 450 150'/%3E%3Cpolygon fill='%23AAA' points='720 300 630 450 810 450'/%3E%3Cpolygon fill='%23666' points='720 300 810 150 630 150'/%3E%3Cpolygon fill='%23FFF' points='900 300 810 450 990 450'/%3E%3Cpolygon fill='%23999' points='900 300 990 150 810 150'/%3E%3Cpolygon points='0 600 -90 750 90 750'/%3E%3Cpolygon fill='%23666' points='0 600 90 450 -90 450'/%3E%3Cpolygon fill='%23AAA' points='180 600 90 750 270 750'/%3E%3Cpolygon fill='%23444' points='180 600 270 450 90 450'/%3E%3Cpolygon fill='%23444' points='360 600 270 750 450 750'/%3E%3Cpolygon fill='%23999' points='360 600 450 450 270 450'/%3E%3Cpolygon fill='%23666' points='540 600 630 450 450 450'/%3E%3Cpolygon fill='%23222' points='720 600 630 750 810 750'/%3E%3Cpolygon fill='%23FFF' points='900 600 810 750 990 750'/%3E%3Cpolygon fill='%23222' points='900 600 990 450 810 450'/%3E%3Cpolygon fill='%23DDD' points='0 900 90 750 -90 750'/%3E%3Cpolygon fill='%23444' points='180 900 270 750 90 750'/%3E%3Cpolygon fill='%23FFF' points='360 900 450 750 270 750'/%3E%3Cpolygon fill='%23AAA' points='540 900 630 750 450 750'/%3E%3Cpolygon fill='%23FFF' points='720 900 810 750 630 750'/%3E%3Cpolygon fill='%23222' points='900 900 990 750 810 750'/%3E%3Cpolygon fill='%23222' points='1080 300 990 450 1170 450'/%3E%3Cpolygon fill='%23FFF' points='1080 300 1170 150 990 150'/%3E%3Cpolygon points='1080 600 990 750 1170 750'/%3E%3Cpolygon fill='%23666' points='1080 600 1170 450 990 450'/%3E%3Cpolygon fill='%23DDD' points='1080 900 1170 750 990 750'/%3E%3C/g%3E%3C/svg%3E");
  }
</style>
<!-- End : Custom Style for Navbar -->

{{-- Table Header Fixed --}}
<style>
    .table-responsive{
        height:500px;
        overflow:scroll;
    }
    thead tr.first th, thead tr.first td{
        background: white;
        position: sticky;
        position: -webkit-sticky; /* Safari */
        top: 0;
        z-index: 10;
    }
    thead tr.second th, thead tr.second td {
        background: white;
        position: sticky;
        position: -webkit-sticky; /* Safari */
        z-index: 10;
   }
</style>
{{-- End : Table Header Fixed --}}

<!-- Custom Style for Content -->
<style>
    .table tbody tr.highlight td {
        background-color: rgb(0, 0, 0);
        color: rgb(255, 255, 255);
    }
</style>
<!-- End : Custom Style for Content -->
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
    $('#drag-drop-table-sorting').on('click', 'tbody tr', function(event) {
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
@endpush

{{-- ========================================================== --}}

@push('ajax-request')
    {{-- Request Unit --}}
    <script>
        $(document).ready(function() {
            getUnits($('meta[name="level"]').attr('content'));

            //mapping option selected in filter from query params
            setTimeout(function(){
                $('select[name="level"] option').each(function(){
                    if ($(this).val() == $('meta[name="level"]').attr('content'))
                    $(this).attr("selected","selected");
                });
                $('select[name="unit"] option').each(function(){
                    if ($(this).val() == $('meta[name="unit"]').attr('content'))
                    $(this).attr("selected","selected");
                });
                $('input[name="tahun"]').val($('meta[name="year"]').attr('content'));
            }, 2000);
        });

        $('select[name="level"]').click(function() {
            getUnits($(this).val());
        });

        function getUnits(level) {
            if (level.length > 0) {
                let host = $('meta[name="host"]').attr('content');
                $.ajax({
                    type: 'GET',
                    url: `${host}/level/${level}/units`,
                    success: function(res) {
                        $('.dynamic-option').remove();

                        if (res.data.length > 0) {
                            let html;
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
    <div class="content-wrapper pt-3">
        @if (session()->has('danger_message'))
            @include('_danger-message-card',['message' => session()->get('danger_message')])
        @else
            @if (session()->has('info_message'))
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <!-- card-header -->
                    <div class="card-header">
                        <h3 class="card-title">Info</h3>
                    </div>
                    <!-- end : card-header -->

                    <!-- card-body -->
                    <div class="card-body">
                        @include('_info-message-card',['message' => session()->get('info_message')])
                    </div>
                    <!-- end : card-body -->
                </div>
            </div>
            @endif

            @if ($errors->any())
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <!-- card-header -->
                    <div class="card-header">
                        <h3 class="card-title">Info</h3>
                    </div>
                    <!-- end : card-header -->

                    <!-- card-body -->
                    <div class="card-body">
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                    </div>
                    <!-- end : card-body -->
                </div>
            </div>
            @endif

            {{-- section: template download/upload --}}
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <!-- card-header -->
                    <div class="card-header">
                        <h3 class="card-title">Add (excel)</h3>
                    </div>
                    <!-- end : card-header -->

                    <!-- card-body -->
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-12 col-sm-2 col-md-2 col-lg-2 col-xl-2">
                                <button type="submit" class="btn btn-info btn-block" data-toggle="tooltip" data-placement="buttom" title="Download Template"><i class="fas fa-file-download"></i></button>
                            </div>
                            <div class="col-12 col-sm-10 col-md-10 col-lg-10 col-xl-10">
                                <form action="#" method="post">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="template">
                                            <label class="custom-file-label" for="template">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                            <button type="submit" class="btn btn-info btn-block" data-toggle="tooltip" data-placement="buttom" title="Upload Template"><i class="fas fa-file-upload"></i></button>
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
            {{-- end section: template download/upload --}}

            {{-- section: table --}}
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <!-- card-header -->
                    <div class="card-header">
                        <h3 class="card-title">Kertas Kerja - Realisasi / Level : {{ request()->query('level') == null ? '-' : strtoupper(str_replace("-", " ", request()->query('level'))) }} / Unit : {{ request()->query('unit') == null ? '-' : strtoupper(str_replace("-", " ", request()->query('unit'))) }} / Tahun : {{ request()->query('tahun') == null ? '-' : strtoupper(str_replace("-", " ", request()->query('tahun'))) }}</h3>
                    </div>
                    <!-- end : card-header -->

                    <!-- card-body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <form action="{{ route('simonik.realizations.paper-work.index') }}" method="get">
                                    <div class="input-group mb-3">
                                        <span class="input-group-append">
                                            <span class="input-group-text">Level</span>
                                        </span>

                                        <select class="custom-select" name="level">
                                            @include('components.simonik.realization.paper-work.read._level-child', [
                                                'levels' => empty($response->object()->data->levels) ? $response->object()->data : $response->object()->data->levels
                                            ])
                                        </select>

                                        <span class="input-group-append">
                                            <span class="input-group-text">Unit</span>
                                        </span>

                                        <select class="custom-select" name="unit"></select>

                                        <span class="input-group-append">
                                            <span class="input-group-text">Tahun</span>
                                        </span>

                                        <input type="text" class="form-control" name="tahun"/>

                                        <span class="input-group-append">
                                            <button type="submit" class="btn btn-info btn-flat" data-toggle="tooltip" data-placement="buttom" title="Search"><i class="fas fa-search"></i></button>
                                        </span>
                                    </div>
                                </form>
                            </div>

                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                @if (empty($response->object()->data->indicators))
                                    <h3 class="text-center font-weight-bold">Data Tidak Tersedia</h3>
                                @else
                                    <form action="{{ route('simonik.realizations.paper-work.update') }}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="drag-drop-table-sorting">
                                                <thead class="thead-dark">
                                                    <tr class="first">
                                                        <th class="text-center" rowspan="2">KPI</th>
                                                        <th class="text-center" rowspan="2">Formula</th>
                                                        <th class="text-center" rowspan="2">Satuan</th>
                                                        <th class="text-center" rowspan="2">Bobot</th>
                                                        <th class="text-center" rowspan="2">Berlaku</th>
                                                        <th class="text-center" rowspan="2">Polaritas</th>
                                                        <th class="text-center" colspan="12">Target (T) & Realisasi (R)</th>
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
                                                <tbody class="text-nowrap">
                                                    @include('components.simonik.realization.paper-work.read._indicator-child',[
                                                        'indicators' => $response->object()->data->indicators,
                                                        'background_color' => ['red' => 255, 'green' => 255, 'blue' => 255],
                                                        'iter' => 0,
                                                    ])
                                                </tbody>
                                            </table>
                                        </div>

                                        <input type="hidden" name="level" value="{{ request()->query('level') }}">
                                        <input type="hidden" name="unit" value="{{ request()->query('unit') }}">
                                        <input type="hidden" name="tahun" value="{{ request()->query('tahun') }}">
                                        <button type="submit" class="btn btn-info btn-sm float-right mt-3">Save</button>
                                    </form>
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
