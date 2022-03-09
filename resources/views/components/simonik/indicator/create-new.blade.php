@extends('layouts/after-login')

@section('title', 'Tambah :: KPI')

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
@endpush

{{-- ========================================================== --}}

@push('script')
    <!-- jQuery -->
    <script src="{{ asset('template/plugins/jquery/jquery.js') }}"></script> {{-- required --}}
    <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script> {{-- required --}}
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
            dummy(1);
            reducing_factor(1);

            $('#btn-del').attr('disabled', true);
            $('#btn-add').click(function() {
                let num = $('.cloned').length;
                let newNum = new Number(num + 1);
                let newElem = $(`#row-${num}`).clone().attr('id', `row-${newNum}`).fadeIn('slow');

                newElem.find('.heading-row').html(newNum);
                newElem.find('.indicator').removeClass(`indicator-${num}`).addClass(`indicator-${newNum}`).attr('data-id', newNum).attr('id', `indicator-${newNum}`);

                newElem.find('.type-kpi').removeClass(`type-${num}`).addClass(`type-${newNum}`).attr('data-id', newNum).attr('id', `type-kpi-${newNum}`);
                newElem.find('.type-pi').removeClass(`type-${num}`).addClass(`type-${newNum}`).attr('data-id', newNum).attr('id', `type-pi-${newNum}`);

                newElem.find('.dummy-no').removeClass(`dummy-${num}`).addClass(`dummy-${newNum}`).attr('data-id', newNum).attr('id', `dummy-no-${newNum}`);
                newElem.find('.dummy-yes').removeClass(`dummy-${num}`).addClass(`dummy-${newNum}`).attr('data-id', newNum).attr('id', `dummy-yes-${newNum}`);

                newElem.find('.reducing_factor-no').removeClass(`reducing_factor-${num}`).addClass(`reducing_factor-${newNum}`).attr('data-id', newNum).attr('id', `reducing_factor-no-${newNum}`);
                newElem.find('.reducing_factor-yes').removeClass(`reducing_factor-${num}`).addClass(`reducing_factor-${newNum}`).attr('data-id', newNum).attr('id', `reducing_factor-yes-${newNum}`);

                newElem.find('.polarity-positive').removeClass(`polarity-${num}`).addClass(`polarity-${newNum}`).attr('data-id', newNum).attr('id', `polarity-positive-${newNum}`);
                newElem.find('.polarity-negative').removeClass(`polarity-${num}`).addClass(`polarity-${newNum}`).attr('data-id', newNum).attr('id', `polarity-negative-${newNum}`);

                newElem.find('.formula').removeClass(`formula-${num}`).addClass(`formula-${newNum}`).attr('data-id', newNum).attr('id', `formula-${newNum}`);

                newElem.find('.measure').removeClass(`measure-${num}`).addClass(`measure-${newNum}`).attr('data-id', newNum).attr('id', `measure-${newNum}`);

                newElem.find('.check-handler').removeClass(`check-handler-${num}`).addClass(`check-handler-${newNum}`).attr('data-id', newNum).attr('id', `check-handler-${newNum}`);

                newElem.find('.validity-jan').removeClass(`validity-group-${num}`).addClass(`validity-group-${newNum}`).attr('data-id', newNum).attr('id', `validity-jan-${newNum}`);
                newElem.find('.validity-feb').removeClass(`validity-group-${num}`).addClass(`validity-group-${newNum}`).attr('data-id', newNum).attr('id', `validity-feb-${newNum}`);
                newElem.find('.validity-mar').removeClass(`validity-group-${num}`).addClass(`validity-group-${newNum}`).attr('data-id', newNum).attr('id', `validity-mar-${newNum}`);
                newElem.find('.validity-apr').removeClass(`validity-group-${num}`).addClass(`validity-group-${newNum}`).attr('data-id', newNum).attr('id', `validity-apr-${newNum}`);
                newElem.find('.validity-may').removeClass(`validity-group-${num}`).addClass(`validity-group-${newNum}`).attr('data-id', newNum).attr('id', `validity-may-${newNum}`);
                newElem.find('.validity-jun').removeClass(`validity-group-${num}`).addClass(`validity-group-${newNum}`).attr('data-id', newNum).attr('id', `validity-jun-${newNum}`);
                newElem.find('.validity-jul').removeClass(`validity-group-${num}`).addClass(`validity-group-${newNum}`).attr('data-id', newNum).attr('id', `validity-jul-${newNum}`);
                newElem.find('.validity-aug').removeClass(`validity-group-${num}`).addClass(`validity-group-${newNum}`).attr('data-id', newNum).attr('id', `validity-aug-${newNum}`);
                newElem.find('.validity-sep').removeClass(`validity-group-${num}`).addClass(`validity-group-${newNum}`).attr('data-id', newNum).attr('id', `validity-sep-${newNum}`);
                newElem.find('.validity-oct').removeClass(`validity-group-${num}`).addClass(`validity-group-${newNum}`).attr('data-id', newNum).attr('id', `validity-oct-${newNum}`);
                newElem.find('.validity-nov').removeClass(`validity-group-${num}`).addClass(`validity-group-${newNum}`).attr('data-id', newNum).attr('id', `validity-nov-${newNum}`);
                newElem.find('.validity-dec').removeClass(`validity-group-${num}`).addClass(`validity-group-${newNum}`).attr('data-id', newNum).attr('id', `validity-dec-${newNum}`);

                newElem.find('.multiple-add-weight').removeClass(`multiple-add-weight-${num}`).addClass(`multiple-add-weight-${newNum}`).attr('data-id', newNum).attr('id', `multiple-add-weight-${newNum}`);

                newElem.find('.weight-jan').removeClass(`weight-group-${num}`).addClass(`weight-group-${newNum}`).attr('data-id', newNum).attr('id', `weight-jan-${newNum}`);
                newElem.find('.weight-feb').removeClass(`weight-group-${num}`).addClass(`weight-group-${newNum}`).attr('data-id', newNum).attr('id', `weight-feb-${newNum}`);
                newElem.find('.weight-mar').removeClass(`weight-group-${num}`).addClass(`weight-group-${newNum}`).attr('data-id', newNum).attr('id', `weight-mar-${newNum}`);
                newElem.find('.weight-apr').removeClass(`weight-group-${num}`).addClass(`weight-group-${newNum}`).attr('data-id', newNum).attr('id', `weight-apr-${newNum}`);
                newElem.find('.weight-may').removeClass(`weight-group-${num}`).addClass(`weight-group-${newNum}`).attr('data-id', newNum).attr('id', `weight-may-${newNum}`);
                newElem.find('.weight-jun').removeClass(`weight-group-${num}`).addClass(`weight-group-${newNum}`).attr('data-id', newNum).attr('id', `weight-jun-${newNum}`);
                newElem.find('.weight-jul').removeClass(`weight-group-${num}`).addClass(`weight-group-${newNum}`).attr('data-id', newNum).attr('id', `weight-jul-${newNum}`);
                newElem.find('.weight-aug').removeClass(`weight-group-${num}`).addClass(`weight-group-${newNum}`).attr('data-id', newNum).attr('id', `weight-aug-${newNum}`);
                newElem.find('.weight-sep').removeClass(`weight-group-${num}`).addClass(`weight-group-${newNum}`).attr('data-id', newNum).attr('id', `weight-sep-${newNum}`);
                newElem.find('.weight-oct').removeClass(`weight-group-${num}`).addClass(`weight-group-${newNum}`).attr('data-id', newNum).attr('id', `weight-oct-${newNum}`);
                newElem.find('.weight-nov').removeClass(`weight-group-${num}`).addClass(`weight-group-${newNum}`).attr('data-id', newNum).attr('id', `weight-nov-${newNum}`);
                newElem.find('.weight-dec').removeClass(`weight-group-${num}`).addClass(`weight-group-${newNum}`).attr('data-id', newNum).attr('id', `weight-dec-${newNum}`);

                $(`#row-${num}`).after(newElem);
                $(`#row-${newNum}`).focus();

                $('#btn-del').attr('disabled', false);
            });

            $('#btn-del').click(function() {
                if (confirm("Anda yakin ?")) {
                    let num = $('.cloned').length;

                    $(`#row-${num}`).slideUp('slow', function() {
                        $(this).remove();

                        if (num - 1 === 1) {
                            $('#btn-del').attr('disabled', true);
                        }

                        $('#btn-add').attr('disabled', false).prop('value', "add section");
                    });
                }
                return false;
            });
        });

        // $('.dummy').change(function() {
        //     dummy($(this).val());
        // });

        $(document).on('change','.dummy',function(){
            console.log($(this).val());
            dummy($(this).val());
        });

        // $('.reducing_factor').change(function() {
        //     reducing_factor($(this).val());
        // });

        $(document).on('change','.reducing_factor',function(){
            reducing_factor($(this).val());
        });

        // $('.check-handler').click(function() {
        //     let id = $(this).val();
        //     $(`.check-item-${id}`).not(this).prop('checked', this.checked);
        // });

        $(document).on('click','.check-handler',function(){
            let id = $(this).val();
            $(`.check-item-${id}`).not(this).prop('checked', this.checked);
        });

        // $('.multiple-add-weight').keyup(function() {
        //     let id = $(this).val();
        //     $(`.weight-group-${id}`).val(this.value);
        // });

        $(document).on('keyup','.multiple-add-weight',function(){
            let id = $(this).val();
            $(`.weight-group-${id}`).val(this.value);
        });

        function dummy(id) {
            console.log('fungsi dummy');
            console.log($(`.dummy-${id}:checked`).val());
            console.log('fungsi dummy end');
            if ($(`.dummy-${id}:checked`).val() == 0) {
                $(`.reducing_factor-${id}`).attr("disabled", false);
                $(`.polarity-${id}`).attr("disabled", false);
                $(`.check-handler-${id}`).attr("disabled", false);
                $(`.validity-group-${id}`).attr("disabled", false);
                $(`.weight-group-${id}`).prop('disabled', false);
                $(`.multiple-add-weight-${id}`).prop('disabled', false);
            } else {
                $(`.reducing_factor-${id}`).attr("disabled", true);
                $(`.polarity-${id}`).attr("disabled", true);
                $(`.check-handler-${id}`).attr("disabled", true);
                $(`.validity-group-${id}`).attr("disabled", true);
                $(`.weight-group-${id}`).prop('disabled', true);
                $(`.multiple-add-weight-${id}`).prop('disabled', true);
            }
        }

        function reducing_factor(id) {
            $(`.reducing_factor-${id}:checked`).val() == 0 ? $(`.polarity-${id}`).attr("disabled", false) : $(`.polarity-${id}`).attr("disabled", true);
        }
    </script>
    {{-- End : Form Control By Condition --}}
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
                        <h3 class="card-title">TAMBAH KPI</h3>
                    </div>
                    <!-- end : card-header -->

                    <form action="{{ route('simonik.indicators.store') }}" method="post">
                        @method('post')
                        @csrf

                        <!-- card-body -->
                        <div class="card-body">
                            <div id="row-1" class="cloned">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <h1 class="text-center font-weight-bold heading-row">1</h1>
                                    </div>

                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group">
                                            <label class="small">KPI <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control form-control-sm indicator indicator-1" id="indicator-1" data-id="1" name="indicator[]" required>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="small">Tipe <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                        <div class="form-group clearfix">
                                            <div class="d-inline">
                                                <input type="radio" class="type type-1 type-kpi" id="type-kpi-1" data-id="1" name="type[]" value="KPI" checked>
                                                <label class="small">KPI</label>
                                            </div>
                                            <div class="d-inline">
                                                <input type="radio" class="type type-1 type-pi" id="type-pi-1" data-id="1" name="type[]" value="PI">
                                                <label class="small">PI</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="small">KPI Dummy <small class="text-info">(KPI tidak memiliki bobot)</small> ? <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                        <div class="form-group clearfix">
                                            <div class="d-inline">
                                                <input type="radio" class="dummy dummy-1 dummy-no" id="dummy-no-1" data-id="1" name="dummy[]" value="0" checked>
                                                <label class="small">Tidak</label>
                                            </div>
                                            <div class="d-inline">
                                                <input type="radio" class="dummy dummy-1 dummy-yes" id="dummy-yes-1" data-id="1" name="dummy[]" value="1">
                                                <label class="small">Ya</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
                                        <label class="small">Faktor Pengurang ? <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-9 col-lg-9 col-xl-9">
                                        <div class="form-group clearfix">
                                            <div class="d-inline">
                                                <input type="radio" class="reducing_factor reducing_factor-1 reducing_factor-no" id="reducing_factor-no-1" data-id="1" name="reducing_factor[]" value="0" checked>
                                                <label class="small">Tidak</label>
                                            </div>
                                            <div class="d-inline">
                                                <input type="radio" class="reducing_factor reducing_factor-1 reducing_factor-yes" id="reducing_factor-yes-1" data-id="1" name="reducing_factor[]" value="1">
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
                                                <input type="radio" class="polarity polarity-1 polarity-positive" id="polarity-positive-1" data-id="1" name="polarity[]" value="1" checked>
                                                <label class="small"><i class="fas fa-arrow-up"></i></label>
                                            </div>
                                            <div class="d-inline">
                                                <input type="radio" class="polarity polarity-1 polarity-negative" id="polarity-negative-1" data-id="1" name="polarity[]" value="-1">
                                                <label class="small"><i class="fas fa-arrow-down"></i></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group">
                                            <label class="small">Formula</label>
                                            <textarea class="form-control form-control-sm formula formula-1" rows="3" id="formula-1" data-id="1" name="formula[]"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <div class="form-group">
                                            <label class="small">Satuan</label>
                                            <input type="text" class="form-control form-control-sm measure measure-1" id="measure-1" data-id="1" name="measure[]">
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <p class="text-center font-weight-bold small">Masa Berlaku <span class="text-danger">*</span></p>
                                        <div class="form-check text-center mb-3">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input check-handler check-handler-1" id="check-handler-1" data-id="1"><small>Select All Month</small>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label small">
                                                    <input type="checkbox" class="form-check-input check-item-1 validity-group validity-group-1 validity-jan" id="validity-jan-1" data-id="1" name="validity[jan][]" value="1">Jan
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label small">
                                                    <input type="checkbox" class="form-check-input check-item-1 validity-group validity-group-1 validity-feb" id="validity-feb-1" data-id="1" name="validity[feb][]" value="1">Feb
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label small">
                                                    <input type="checkbox" class="form-check-input check-item-1 validity-group validity-group-1 validity-mar" id="validity-mar-1" data-id="1" name="validity[mar][]" value="1">Mar
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label small">
                                                    <input type="checkbox" class="form-check-input check-item-1 validity-group validity-group-1 validity-apr" id="validity-apr-1" data-id="1" name="validity[apr][]" value="1">Apr
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label small">
                                                    <input type="checkbox" class="form-check-input check-item-1 validity-group validity-group-1 validity-may" id="validity-may-1" data-id="1" name="validity[may][]" value="1">May
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label small">
                                                    <input type="checkbox" class="form-check-input check-item-1 validity-group validity-group-1 validity-jun" id="validity-jun-1" data-id="1" name="validity[jun][]" value="1">Jun
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label small">
                                                    <input type="checkbox" class="form-check-input check-item-1 validity-group validity-group-1 validity-jul" id="validity-jul-1" data-id="1" name="validity[jul][]" value="1">Jul
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label small">
                                                    <input type="checkbox" class="form-check-input check-item-1 validity-group validity-group-1 validity-aug" id="validity-aug-1" data-id="1" name="validity[aug][]" value="1">Aug
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label small">
                                                    <input type="checkbox" class="form-check-input check-item-1 validity-group validity-group-1 validity-sep" id="validity-sep-1" data-id="1" name="validity[sep][]" value="1">Sep
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label small">
                                                    <input type="checkbox" class="form-check-input check-item-1 validity-group validity-group-1 validity-oct" id="validity-oct-1" data-id="1" name="validity[oct][]" value="1">Oct
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label small">
                                                    <input type="checkbox" class="form-check-input check-item-1 validity-group validity-group-1 validity-nov" id="validity-nov-1" data-id="1" name="validity[nov][]" value="1">Nov
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                        <div class="form-group">
                                            <div class="form-check">
                                                <label class="form-check-label small">
                                                    <input type="checkbox" class="form-check-input check-item-1 validity-group validity-group-1 validity-dec" id="validity-dec-1" data-id="1" name="validity[dec][]" value="1">Dec
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
                                        <p class="text-center text-info small">Jika bobot dari bulan jan-dec sama isi field dibawah ini</p>
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                        <input type="number" class="form-control form-control-sm multiple-add-weight multiple-add-weight-1" id="multiple-add-weight-1" data-id="1" value="0">
                                    </div>
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">
                                        <p class="text-center text-info small">Jika bobot dari bulan jan-dec tidak sama isi field dibawah ini</p>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                        <div class="form-group">
                                            <p class="text-center small">Jan</p>
                                            <input type="number" class="form-control form-control-sm weight-group-1 weight-group-1 weight-jan" id="weight-jan-1" data-id="1" name="weight[jan][]" value="0">
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                        <div class="form-group">
                                            <p class="text-center small">Feb</p>
                                            <input type="number" class="form-control form-control-sm weight-group-1 weight-group-1 weight-feb" id="weight-feb-1" data-id="1" name="weight[feb][]" value="0">
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                        <div class="form-group">
                                            <p class="text-center small">Mar</p>
                                            <input type="number" class="form-control form-control-sm weight-group-1 weight-group-1 weight-mar" id="weight-mar-1" data-id="1" name="weight[mar][]" value="0">
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                        <div class="form-group">
                                            <p class="text-center small">Apr</p>
                                            <input type="number" class="form-control form-control-sm weight-group-1 weight-group-1 weight-apr" id="weight-apr-1" data-id="1" name="weight[apr][]" value="0">
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                        <div class="form-group">
                                            <p class="text-center small">May</p>
                                            <input type="number" class="form-control form-control-sm weight-group-1 weight-group-1 weight-may" id="weight-may-1" data-id="1" name="weight[may][]" value="0">
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                        <div class="form-group">
                                            <p class="text-center small">Jun</p>
                                            <input type="number" class="form-control form-control-sm weight-group-1 weight-group-1 weight-jun" id="weight-jun-1" data-id="1" name="weight[jun][]" value="0">
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                        <div class="form-group">
                                            <p class="text-center small">Jul</p>
                                            <input type="number" class="form-control form-control-sm weight-group-1 weight-group-1 weight-jul" id="weight-jul-1" data-id="1" name="weight[jul][]" value="0">
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                        <div class="form-group">
                                            <p class="text-center small">Aug</p>
                                            <input type="number" class="form-control form-control-sm weight-group-1 weight-group-1 weight-aug" id="weight-aug-1" data-id="1" name="weight[aug][]" value="0">
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                        <div class="form-group">
                                            <p class="text-center small">Sep</p>
                                            <input type="number" class="form-control form-control-sm weight-group-1 weight-group-1 weight-sep" id="weight-sep-1" data-id="1" name="weight[sep][]" value="0">
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                        <div class="form-group">
                                            <p class="text-center small">Oct</p>
                                            <input type="number" class="form-control form-control-sm weight-group-1 weight-group-1 weight-oct" id="weight-oct-1" data-id="1" name="weight[oct][]" value="0">
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                        <div class="form-group">
                                            <p class="text-center small">Nov</p>
                                            <input type="number" class="form-control form-control-sm weight-group-1 weight-group-1 weight-nov" id="weight-nov-1" data-id="1" name="weight[nov][]" value="0">
                                        </div>
                                    </div>
                                    <div class="col-6 col-sm-6 col-md-1 col-lg-1 col-xl-1">
                                        <div class="form-group">
                                            <p class="text-center small">Dec</p>
                                            <input type="number" class="form-control form-control-sm weight-group-1 weight-group-1 weight-dec" id="weight-dec-1" data-id="1" name="weight[dec][]" value="0">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="button" id="btn-add" name="btn-add" class="btn btn-sm btn-info"><i class="fa fa-plus" aria-hidden="true"></i></button>
				            <button type="button" id="btn-del" name="btn-del" class="btn btn-sm btn-danger"><i class="fa fa-minus" aria-hidden="true"></i></button>
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
