@extends('layouts/after-login')

@section('title', 'Ubah :: Indikator')

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
@endpush

{{-- ========================================================== --}}

@push('script')
    <!-- jQuery -->
    {{-- <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script> --}} {{-- required --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> {{-- required --}}
    <!-- AdminLTE App -->
    <script src="{{ asset('template/dist/js/adminlte.min.js') }}"></script> {{-- required --}}
    <!-- AdminLTE For Demo Purposes -->
    <script src="{{ asset('template/dist/js/demo.js') }}"></script> {{-- required --}}

    {{-- Form Control By Condition --}}
    <script>
        $(document).ready(function() {
            dummy();
            reducing_factor();
        });

        $('input[name="dummy"]').change(function() {
            dummy();
        });

        $('input[name="reducing_factor"]').change(function() {
            reducing_factor();
        });

        function dummy() {
            if ($('input[name="dummy"]:checked').val() == 0) {
                $('input[name="reducing_factor"]').attr("disabled", false);
                $('input[name="polarity"]').attr("disabled", false);
                $('#check-handler').attr("disabled", false);
                $('.validity-group').attr("disabled", false);
                $('.weight-group').prop('disabled', false);
                $('#multiple-add-weight').prop('disabled', false);
            } else {
                $('input[name="reducing_factor"]').attr("disabled", true);
                $('input[name="polarity"]').attr("disabled", true);
                $('#check-handler').attr("disabled", true);
                $('.validity-group').attr("disabled", true);
                $('.weight-group').prop('disabled', true);
                $('#multiple-add-weight').prop('disabled', true);
            }
        }

        function reducing_factor() {
            $('input[name="reducing_factor"]:checked').val() == 0 ? $('input[name="polarity"]').attr("disabled", false) : $('input[name="polarity"]').attr("disabled", true);
        }
    </script>
    {{-- End : Form Control By Condition --}}

    <script>
        $('#check-handler').click(function() {
            $('.check-item').not(this).prop('checked', this.checked);
        });
    </script>

    <script>
        $('#multiple-add-weight').keyup(function() {
            $('.weight-group').val(this.value);
        });
    </script>

    <script>
        $('#multiple-add-weight-counted').keyup(function() {
            $('.weight-group-counted').val(this.value);
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

            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <!-- card-header -->
                    <div class="card-header">
                        <h3 class="card-title">UBAH INDIKATOR</h3>
                    </div>
                    <!-- end : card-header -->

                    <form action="{{ route('semongko.indicators.update', ['id' => $response->data->indicator->id, 'level' => request()->query('level'), 'unit' => request()->query('unit'), 'tahun' => request()->query('tahun')]) }}" method="post">
                        @method('put')
                        @csrf

                        <!-- card-body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group">
                                        <label class="small">Nama Indikator <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control form-control-sm" name="indicator" value="{{ $response->data->indicator->indicator }}">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <label class="small">Tipe <span class="text-danger">*</span></label>
                                </div>
                                <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                    <div class="form-group clearfix">
                                        <div class="d-inline">
                                            <input type="radio" name="type" value="KPI" @if ($response->data->indicator->type === 'KPI') checked @endif>
                                            <label class="small">KPI</label>
                                        </div>
                                        <div class="d-inline">
                                            <input type="radio" name="type" value="PI" @if ($response->data->indicator->type === 'PI') checked @endif>
                                            <label class="small">PI</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <label class="small">Indikator Tidak Memiliki Bobot ? <span class="text-danger">*</span></label>
                                </div>
                                <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                    <div class="form-group clearfix">
                                        <div class="d-inline">
                                            <input type="radio" name="dummy" value="0" @if ($response->data->indicator->dummy === false) checked @endif>
                                            <label class="small">Tidak</label>
                                        </div>
                                        <div class="d-inline">
                                            <input type="radio" name="dummy" value="1" @if ($response->data->indicator->dummy === true) checked @endif>
                                            <label class="small">Ya</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <label class="small">Indikator Faktor Pengurang ? <span class="text-danger">*</span></label>
                                </div>
                                <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                    <div class="form-group clearfix">
                                        <div class="d-inline">
                                            <input type="radio" name="reducing_factor" value="0" @if ($response->data->indicator->reducing_factor === false) checked @endif>
                                            <label class="small">Tidak</label>
                                        </div>
                                        <div class="d-inline">
                                            <input type="radio" name="reducing_factor" value="1" @if ($response->data->indicator->reducing_factor === true) checked @endif>
                                            <label class="small">Ya</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                    <label class="small">Polaritas <span class="text-danger">*</span></label>
                                </div>
                                <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                    <div class="form-group clearfix">
                                        <div class="d-inline">
                                            <input type="radio" name="polarity" value="1" @if ($response->data->indicator->original_polarity === '1') checked @endif>
                                            <label class="small"><i class="fas fa-arrow-up"></i></label>
                                        </div>
                                        <div class="d-inline">
                                            <input type="radio" name="polarity" value="-1" @if ($response->data->indicator->original_polarity === '-1') checked @endif>
                                            <label class="small"><i class="fas fa-arrow-down"></i></label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group">
                                        <label class="small">Formula</label>
                                        <textarea class="form-control form-control-sm" rows="3" name="formula">{{ $response->data->indicator->formula }}</textarea>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <div class="form-group">
                                        <label class="small">Satuan</label>
                                        <input type="text" class="form-control form-control-sm" name="measure" value="{{ $response->data->indicator->measure }}">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <p class="small text-center font-weight-bold">Masa Berlaku <span class="text-danger">*</span></p>
                                    <div class="form-check text-center mb-3">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" id="check-handler"><small>Select All Month</small>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <label class="form-check-label small">
                                                <input type="checkbox" class="form-check-input check-item validity-group" name="validity[jan]" value="1" @if ($response->data->indicator->validity->jan->checked) checked @endif>Jan
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <label class="form-check-label small">
                                                <input type="checkbox" class="form-check-input check-item validity-group" name="validity[feb]" value="1" @if ($response->data->indicator->validity->feb->checked) checked @endif>Feb
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <label class="form-check-label small">
                                                <input type="checkbox" class="form-check-input check-item validity-group" name="validity[mar]" value="1" @if ($response->data->indicator->validity->mar->checked) checked @endif>Mar
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <label class="form-check-label small">
                                                <input type="checkbox" class="form-check-input check-item validity-group" name="validity[apr]" value="1" @if ($response->data->indicator->validity->apr->checked) checked @endif>Apr
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <label class="form-check-label small">
                                                <input type="checkbox" class="form-check-input check-item validity-group" name="validity[may]" value="1" @if ($response->data->indicator->validity->may->checked) checked @endif>May
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <label class="form-check-label small">
                                                <input type="checkbox" class="form-check-input check-item validity-group" name="validity[jun]" value="1" @if ($response->data->indicator->validity->jun->checked) checked @endif>Jun
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <label class="form-check-label small">
                                                <input type="checkbox" class="form-check-input check-item validity-group" name="validity[jul]" value="1" @if ($response->data->indicator->validity->jul->checked) checked @endif>Jul
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <label class="form-check-label small">
                                                <input type="checkbox" class="form-check-input check-item validity-group" name="validity[aug]" value="1" @if ($response->data->indicator->validity->aug->checked) checked @endif>Aug
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <label class="form-check-label small">
                                                <input type="checkbox" class="form-check-input check-item validity-group" name="validity[sep]" value="1" @if ($response->data->indicator->validity->sep->checked) checked @endif>Sep
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <label class="form-check-label small">
                                                <input type="checkbox" class="form-check-input check-item validity-group" name="validity[oct]" value="1" @if ($response->data->indicator->validity->oct->checked) checked @endif>Oct
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <label class="form-check-label small">
                                                <input type="checkbox" class="form-check-input check-item validity-group" name="validity[nov]" value="1" @if ($response->data->indicator->validity->nov->checked) checked @endif>Nov
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <label class="form-check-label small">
                                                <input type="checkbox" class="form-check-input check-item validity-group" name="validity[dec]" value="1" @if ($response->data->indicator->validity->dec->checked) checked @endif>Dec
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <p class="text-center font-weight-bold small">Bobot <span class="text-danger">*</span></p>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <p class="text-center text-info small"><strong>Noted!</strong> bobot akan diabaikan jika masa berlaku tidak dipilih</p>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <p class="text-center text-info small"><small>jika bobot jan s.d dec sama cukup isi field dibawah ini</small></p>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    <input type="number" class="form-control form-control-sm mb-2" id="multiple-add-weight" value="0">
                                </div>
                                <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                    <div class="form-group">
                                        <p class="text-center small">Jan</p>
                                        <input type="number" class="form-control form-control-sm weight-group" name="weight[jan]" value="{{ $response->data->indicator->weight->jan->value }}">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                    <div class="form-group">
                                        <p class="text-center small">Feb</p>
                                        <input type="number" class="form-control form-control-sm weight-group" name="weight[feb]" value="{{ $response->data->indicator->weight->feb->value }}">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                    <div class="form-group">
                                        <p class="text-center small">Mar</p>
                                        <input type="number" class="form-control form-control-sm weight-group" name="weight[mar]" value="{{ $response->data->indicator->weight->mar->value }}">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                    <div class="form-group">
                                        <p class="text-center small">Apr</p>
                                        <input type="number" class="form-control form-control-sm weight-group" name="weight[apr]" value="{{ $response->data->indicator->weight->apr->value }}">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                    <div class="form-group">
                                        <p class="text-center small">May</p>
                                        <input type="number" class="form-control form-control-sm weight-group" name="weight[may]" value="{{ $response->data->indicator->weight->may->value }}">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                    <div class="form-group">
                                        <p class="text-center small">Jun</p>
                                        <input type="number" class="form-control form-control-sm weight-group" name="weight[jun]" value="{{ $response->data->indicator->weight->jun->value }}">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                    <div class="form-group">
                                        <p class="text-center small">Jul</p>
                                        <input type="number" class="form-control form-control-sm weight-group" name="weight[jul]" value="{{ $response->data->indicator->weight->jul->value }}">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                    <div class="form-group">
                                        <p class="text-center small">Aug</p>
                                        <input type="number" class="form-control form-control-sm weight-group" name="weight[aug]" value="{{ $response->data->indicator->weight->aug->value }}">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                    <div class="form-group">
                                        <p class="text-center small">Sep</p>
                                        <input type="number" class="form-control form-control-sm weight-group" name="weight[sep]" value="{{ $response->data->indicator->weight->sep->value }}">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                    <div class="form-group">
                                        <p class="text-center small">Oct</p>
                                        <input type="number" class="form-control form-control-sm weight-group" name="weight[oct]" value="{{ $response->data->indicator->weight->oct->value }}">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                    <div class="form-group">
                                        <p class="text-center small">Nov</p>
                                        <input type="number" class="form-control form-control-sm weight-group" name="weight[nov]" value="{{ $response->data->indicator->weight->nov->value }}">
                                    </div>
                                </div>
                                <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                    <div class="form-group">
                                        <p class="text-center small">Dec</p>
                                        <input type="number" class="form-control form-control-sm weight-group" name="weight[dec]" value="{{ $response->data->indicator->weight->dec->value }}">
                                    </div>
                                </div>

                                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                    @if ($response->data->indicator->label === 'master')
                                        <h1 class="text-center text-danger"><i class="fas fa-exclamation-triangle"></i></h1>
                                        <h5 class="text-center text-danger"><strong>Danger Zone!</strong></h5>
                                        <p class="text-center"><small><strong>Noted!</strong> Aksi ini akan mengubah semua indikator beserta target & realisasi yang bersesuaian di semua unit kerja di level: <strong>{{ $response->data->indicator->level_name }}</strong>.</small></p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- end : card-body -->

                        <!-- card-footer -->
                        <div class="card-footer clearfix">
                            <button type="submit" class="btn btn-sm btn-info float-right">Save</button>
                        </div>
                        <!-- end : card-footer -->
                    </form>
                </div>
            </div>
        @endif
    </div>
@endsection
