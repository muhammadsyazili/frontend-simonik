@extends('layouts/after-login')

@section('title', 'Monitoring')

{{-- ========================================================== --}}
@push('metadata')
    <meta name="host" content="{{ env('HOST_SIMONIK') }}">
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
            overflow-x: scroll;
        }

        thead tr.first th,
        thead tr.first td {
            color: #ffffff !important;
            background-color: #135b96 !important;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='540' height='450' viewBox='0 0 1080 900'%3E%3Cg fill-opacity='.1'%3E%3Cpolygon fill='%23444' points='90 150 0 300 180 300'/%3E%3Cpolygon points='90 150 180 0 0 0'/%3E%3Cpolygon fill='%23AAA' points='270 150 360 0 180 0'/%3E%3Cpolygon fill='%23DDD' points='450 150 360 300 540 300'/%3E%3Cpolygon fill='%23999' points='450 150 540 0 360 0'/%3E%3Cpolygon points='630 150 540 300 720 300'/%3E%3Cpolygon fill='%23DDD' points='630 150 720 0 540 0'/%3E%3Cpolygon fill='%23444' points='810 150 720 300 900 300'/%3E%3Cpolygon fill='%23FFF' points='810 150 900 0 720 0'/%3E%3Cpolygon fill='%23DDD' points='990 150 900 300 1080 300'/%3E%3Cpolygon fill='%23444' points='990 150 1080 0 900 0'/%3E%3Cpolygon fill='%23DDD' points='90 450 0 600 180 600'/%3E%3Cpolygon points='90 450 180 300 0 300'/%3E%3Cpolygon fill='%23666' points='270 450 180 600 360 600'/%3E%3Cpolygon fill='%23AAA' points='270 450 360 300 180 300'/%3E%3Cpolygon fill='%23DDD' points='450 450 360 600 540 600'/%3E%3Cpolygon fill='%23999' points='450 450 540 300 360 300'/%3E%3Cpolygon fill='%23999' points='630 450 540 600 720 600'/%3E%3Cpolygon fill='%23FFF' points='630 450 720 300 540 300'/%3E%3Cpolygon points='810 450 720 600 900 600'/%3E%3Cpolygon fill='%23DDD' points='810 450 900 300 720 300'/%3E%3Cpolygon fill='%23AAA' points='990 450 900 600 1080 600'/%3E%3Cpolygon fill='%23444' points='990 450 1080 300 900 300'/%3E%3Cpolygon fill='%23222' points='90 750 0 900 180 900'/%3E%3Cpolygon points='270 750 180 900 360 900'/%3E%3Cpolygon fill='%23DDD' points='270 750 360 600 180 600'/%3E%3Cpolygon points='450 750 540 600 360 600'/%3E%3Cpolygon points='630 750 540 900 720 900'/%3E%3Cpolygon fill='%23444' points='630 750 720 600 540 600'/%3E%3Cpolygon fill='%23AAA' points='810 750 720 900 900 900'/%3E%3Cpolygon fill='%23666' points='810 750 900 600 720 600'/%3E%3Cpolygon fill='%23999' points='990 750 900 900 1080 900'/%3E%3Cpolygon fill='%23999' points='180 0 90 150 270 150'/%3E%3Cpolygon fill='%23444' points='360 0 270 150 450 150'/%3E%3Cpolygon fill='%23FFF' points='540 0 450 150 630 150'/%3E%3Cpolygon points='900 0 810 150 990 150'/%3E%3Cpolygon fill='%23222' points='0 300 -90 450 90 450'/%3E%3Cpolygon fill='%23FFF' points='0 300 90 150 -90 150'/%3E%3Cpolygon fill='%23FFF' points='180 300 90 450 270 450'/%3E%3Cpolygon fill='%23666' points='180 300 270 150 90 150'/%3E%3Cpolygon fill='%23222' points='360 300 270 450 450 450'/%3E%3Cpolygon fill='%23FFF' points='360 300 450 150 270 150'/%3E%3Cpolygon fill='%23444' points='540 300 450 450 630 450'/%3E%3Cpolygon fill='%23222' points='540 300 630 150 450 150'/%3E%3Cpolygon fill='%23AAA' points='720 300 630 450 810 450'/%3E%3Cpolygon fill='%23666' points='720 300 810 150 630 150'/%3E%3Cpolygon fill='%23FFF' points='900 300 810 450 990 450'/%3E%3Cpolygon fill='%23999' points='900 300 990 150 810 150'/%3E%3Cpolygon points='0 600 -90 750 90 750'/%3E%3Cpolygon fill='%23666' points='0 600 90 450 -90 450'/%3E%3Cpolygon fill='%23AAA' points='180 600 90 750 270 750'/%3E%3Cpolygon fill='%23444' points='180 600 270 450 90 450'/%3E%3Cpolygon fill='%23444' points='360 600 270 750 450 750'/%3E%3Cpolygon fill='%23999' points='360 600 450 450 270 450'/%3E%3Cpolygon fill='%23666' points='540 600 630 450 450 450'/%3E%3Cpolygon fill='%23222' points='720 600 630 750 810 750'/%3E%3Cpolygon fill='%23FFF' points='900 600 810 750 990 750'/%3E%3Cpolygon fill='%23222' points='900 600 990 450 810 450'/%3E%3Cpolygon fill='%23DDD' points='0 900 90 750 -90 750'/%3E%3Cpolygon fill='%23444' points='180 900 270 750 90 750'/%3E%3Cpolygon fill='%23FFF' points='360 900 450 750 270 750'/%3E%3Cpolygon fill='%23AAA' points='540 900 630 750 450 750'/%3E%3Cpolygon fill='%23FFF' points='720 900 810 750 630 750'/%3E%3Cpolygon fill='%23222' points='900 900 990 750 810 750'/%3E%3Cpolygon fill='%23222' points='1080 300 990 450 1170 450'/%3E%3Cpolygon fill='%23FFF' points='1080 300 1170 150 990 150'/%3E%3Cpolygon points='1080 600 990 750 1170 750'/%3E%3Cpolygon fill='%23666' points='1080 600 1170 450 990 450'/%3E%3Cpolygon fill='%23DDD' points='1080 900 1170 750 990 750'/%3E%3C/g%3E%3C/svg%3E");
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
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='540' height='450' viewBox='0 0 1080 900'%3E%3Cg fill-opacity='.1'%3E%3Cpolygon fill='%23444' points='90 150 0 300 180 300'/%3E%3Cpolygon points='90 150 180 0 0 0'/%3E%3Cpolygon fill='%23AAA' points='270 150 360 0 180 0'/%3E%3Cpolygon fill='%23DDD' points='450 150 360 300 540 300'/%3E%3Cpolygon fill='%23999' points='450 150 540 0 360 0'/%3E%3Cpolygon points='630 150 540 300 720 300'/%3E%3Cpolygon fill='%23DDD' points='630 150 720 0 540 0'/%3E%3Cpolygon fill='%23444' points='810 150 720 300 900 300'/%3E%3Cpolygon fill='%23FFF' points='810 150 900 0 720 0'/%3E%3Cpolygon fill='%23DDD' points='990 150 900 300 1080 300'/%3E%3Cpolygon fill='%23444' points='990 150 1080 0 900 0'/%3E%3Cpolygon fill='%23DDD' points='90 450 0 600 180 600'/%3E%3Cpolygon points='90 450 180 300 0 300'/%3E%3Cpolygon fill='%23666' points='270 450 180 600 360 600'/%3E%3Cpolygon fill='%23AAA' points='270 450 360 300 180 300'/%3E%3Cpolygon fill='%23DDD' points='450 450 360 600 540 600'/%3E%3Cpolygon fill='%23999' points='450 450 540 300 360 300'/%3E%3Cpolygon fill='%23999' points='630 450 540 600 720 600'/%3E%3Cpolygon fill='%23FFF' points='630 450 720 300 540 300'/%3E%3Cpolygon points='810 450 720 600 900 600'/%3E%3Cpolygon fill='%23DDD' points='810 450 900 300 720 300'/%3E%3Cpolygon fill='%23AAA' points='990 450 900 600 1080 600'/%3E%3Cpolygon fill='%23444' points='990 450 1080 300 900 300'/%3E%3Cpolygon fill='%23222' points='90 750 0 900 180 900'/%3E%3Cpolygon points='270 750 180 900 360 900'/%3E%3Cpolygon fill='%23DDD' points='270 750 360 600 180 600'/%3E%3Cpolygon points='450 750 540 600 360 600'/%3E%3Cpolygon points='630 750 540 900 720 900'/%3E%3Cpolygon fill='%23444' points='630 750 720 600 540 600'/%3E%3Cpolygon fill='%23AAA' points='810 750 720 900 900 900'/%3E%3Cpolygon fill='%23666' points='810 750 900 600 720 600'/%3E%3Cpolygon fill='%23999' points='990 750 900 900 1080 900'/%3E%3Cpolygon fill='%23999' points='180 0 90 150 270 150'/%3E%3Cpolygon fill='%23444' points='360 0 270 150 450 150'/%3E%3Cpolygon fill='%23FFF' points='540 0 450 150 630 150'/%3E%3Cpolygon points='900 0 810 150 990 150'/%3E%3Cpolygon fill='%23222' points='0 300 -90 450 90 450'/%3E%3Cpolygon fill='%23FFF' points='0 300 90 150 -90 150'/%3E%3Cpolygon fill='%23FFF' points='180 300 90 450 270 450'/%3E%3Cpolygon fill='%23666' points='180 300 270 150 90 150'/%3E%3Cpolygon fill='%23222' points='360 300 270 450 450 450'/%3E%3Cpolygon fill='%23FFF' points='360 300 450 150 270 150'/%3E%3Cpolygon fill='%23444' points='540 300 450 450 630 450'/%3E%3Cpolygon fill='%23222' points='540 300 630 150 450 150'/%3E%3Cpolygon fill='%23AAA' points='720 300 630 450 810 450'/%3E%3Cpolygon fill='%23666' points='720 300 810 150 630 150'/%3E%3Cpolygon fill='%23FFF' points='900 300 810 450 990 450'/%3E%3Cpolygon fill='%23999' points='900 300 990 150 810 150'/%3E%3Cpolygon points='0 600 -90 750 90 750'/%3E%3Cpolygon fill='%23666' points='0 600 90 450 -90 450'/%3E%3Cpolygon fill='%23AAA' points='180 600 90 750 270 750'/%3E%3Cpolygon fill='%23444' points='180 600 270 450 90 450'/%3E%3Cpolygon fill='%23444' points='360 600 270 750 450 750'/%3E%3Cpolygon fill='%23999' points='360 600 450 450 270 450'/%3E%3Cpolygon fill='%23666' points='540 600 630 450 450 450'/%3E%3Cpolygon fill='%23222' points='720 600 630 750 810 750'/%3E%3Cpolygon fill='%23FFF' points='900 600 810 750 990 750'/%3E%3Cpolygon fill='%23222' points='900 600 990 450 810 450'/%3E%3Cpolygon fill='%23DDD' points='0 900 90 750 -90 750'/%3E%3Cpolygon fill='%23444' points='180 900 270 750 90 750'/%3E%3Cpolygon fill='%23FFF' points='360 900 450 750 270 750'/%3E%3Cpolygon fill='%23AAA' points='540 900 630 750 450 750'/%3E%3Cpolygon fill='%23FFF' points='720 900 810 750 630 750'/%3E%3Cpolygon fill='%23222' points='900 900 990 750 810 750'/%3E%3Cpolygon fill='%23222' points='1080 300 990 450 1170 450'/%3E%3Cpolygon fill='%23FFF' points='1080 300 1170 150 990 150'/%3E%3Cpolygon points='1080 600 990 750 1170 750'/%3E%3Cpolygon fill='%23666' points='1080 600 1170 450 990 450'/%3E%3Cpolygon fill='%23DDD' points='1080 900 1170 750 990 750'/%3E%3C/g%3E%3C/svg%3E");
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

    {{-- highcharts --}}
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>

    <script>
        Highcharts.chart('container', {

            title: {
                text: 'Solar Employment Growth by Sector, 2010-2016'
            },

            subtitle: {
                text: 'Source: thesolarfoundation.com'
            },

            yAxis: {
                title: {
                    text: 'Number of Employees'
                }
            },

            xAxis: {
                accessibility: {
                    rangeDescription: 'Range: 2010 to 2017'
                }
            },

            legend: {
                layout: 'horizontal',
                align: 'bottom',
            },

            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    },
                    pointStart: 2010
                }
            },

            series: [{
                name: 'Installation',
                data: [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]
            }, {
                name: 'Manufacturing',
                data: [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434]
            }, {
                name: 'Sales & Distribution',
                data: [11744, 17722, 16005, 19771, 20185, 24377, 32147, 39387]
            }, {
                name: 'Project Development',
                data: [null, null, 7988, 12169, 15112, 22452, 34400, 34227]
            }, {
                name: 'Other',
                data: [12908, 5948, 8105, 11248, 8989, 11816, 18274, 18111]
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
    </script>

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
                        <h3 class="card-title">Monitoring
                            / Level :
                            {{ request()->query('level') == null ? '-' : cast_to_upper(request()->query('level')) }}
                            / Unit :
                            {{ request()->query('unit') == null ? '-' : cast_to_upper(request()->query('unit')) }}
                            / Tahun :
                            {{ request()->query('tahun') == null ? '-' : cast_to_upper(request()->query('tahun')) }}
                            / Bulan :
                            {{ request()->query('bulan') == null ? '-' : 's.d. '.cast_to_upper(request()->query('bulan')) }}
                        </h3>
                    </div>
                    <!-- end : card-header -->

                    <!-- card-body -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <form action="{{ route('simonik.monitoring') }}" method="get">
                                    <div class="input-group mb-3">
                                        <span class="input-group-append">
                                            <span class="input-group-text">Level</span>
                                        </span>

                                        <select class="custom-select" name="level"></select>

                                        <span class="input-group-append">
                                            <span class="input-group-text">Unit</span>
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
                                        {{-- <div id="container"></div> --}}

                                        <input class="form-control form-control-sm mb-3" id="myInput" type="text" placeholder="Cari KPI..">

                                        <a href="#table"><span class="badge badge-pill badge-info">Focus on table</span></a>

                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="table">
                                                <thead>
                                                    <tr class="first">
                                                        <th class="text-center" rowspan="2">KPI</th>
                                                        <th class="text-center" rowspan="2">% PENCAPAIAN</th>
                                                        <th class="text-center" rowspan="2">Status</th>
                                                        <th class="text-center" rowspan="2">Show Chart</th>
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
                                                <tbody id="myTable">
                                                    @foreach ($response->data->indicators as $indicator)
                                                        <tr style="background-color: rgb({{ $indicator->bg_color->r }}, {{ $indicator->bg_color->g }}, {{ $indicator->bg_color->b }}); @if (($indicator->bg_color->r < 127.5) && ($indicator->bg_color->g < 127.5) && ($indicator->bg_color->b < 127.5)) color: white; @endif">
                                                            <td class="small">
                                                                <div style="width: 300px;">
                                                                    <p style="margin: 0">{{ $indicator->indicator }} <span class="badge badge-info">{{ $indicator->type }}</span></p>
                                                                    <p style="margin: 0">Formula: {{ $indicator->formula }}</p>
                                                                    <p style="margin: 0">Satuan: {{ $indicator->measure }}</p>
                                                                    <p style="margin: 0">Polaritas: <span class="badge badge-secondary">{!! $indicator->polarity !!}</span></p>
                                                                    <p style="margin: 0">Berlaku: @forelse ($indicator->validity as $key => $value) <span class="badge badge-secondary">{{ $key }}</span> @empty {{ '-' }} @endforelse</p>
                                                                    <p style="margin: 0">Bobot: @forelse ($indicator->weight as $key => $value) <span class="badge badge-secondary">{{ $key }} : {{ $value }}</span> @empty {{ '-' }} @endforelse</p>
                                                                </div>
                                                            </td>
                                                            <td class="text-center small">
                                                                {{ $indicator->achievement }}
                                                            </td>
                                                            <td class="text-center small">
                                                            </td>
                                                            <td class="text-center small">
                                                                <button type="button" class="btn btn-sm btn-outline-info"><i class="fas fa-chart-bar"></i></button>
                                                            </td>

                                                            <td class="text-center small">
                                                                @if (!is_null($indicator->realizations->jan->value))
                                                                    @if (!is_null($indicator->targets->jan->value))
                                                                        <div class="input-group input-group-sm mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">T</span>
                                                                            </div>
                                                                            <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->targets->jan->value }}" style="width: 150px;" readonly>
                                                                        </div>
                                                                    @endif

                                                                    <div class="input-group input-group-sm mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">R</span>
                                                                        </div>
                                                                        <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->realizations->jan->value }}" style="width: 150px;" readonly>
                                                                    </div>
                                                                @endif
                                                            </td>

                                                            <td class="text-center small">
                                                                @if (!is_null($indicator->realizations->feb->value))
                                                                    @if (!is_null($indicator->targets->feb->value))
                                                                        <div class="input-group input-group-sm mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">T</span>
                                                                            </div>
                                                                            <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->targets->feb->value }}" style="width: 150px;" readonly>
                                                                        </div>
                                                                    @endif

                                                                    <div class="input-group input-group-sm mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">R</span>
                                                                        </div>
                                                                        <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->realizations->feb->value }}" style="width: 150px;" readonly>
                                                                    </div>
                                                                @endif
                                                            </td>

                                                            <td class="text-center small">
                                                                @if (!is_null($indicator->realizations->mar->value))
                                                                    @if (!is_null($indicator->targets->mar->value))
                                                                        <div class="input-group input-group-sm mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">T</span>
                                                                            </div>
                                                                            <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->targets->mar->value }}" style="width: 150px;" readonly>
                                                                        </div>
                                                                    @endif

                                                                    <div class="input-group input-group-sm mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">R</span>
                                                                        </div>
                                                                        <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->realizations->mar->value }}" style="width: 150px;" readonly>
                                                                    </div>
                                                                @endif
                                                            </td>

                                                            <td class="text-center small">
                                                                @if (!is_null($indicator->realizations->apr->value))
                                                                    @if (!is_null($indicator->targets->apr->value))
                                                                        <div class="input-group input-group-sm mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">T</span>
                                                                            </div>
                                                                            <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->targets->apr->value }}" style="width: 150px;" readonly>
                                                                        </div>
                                                                    @endif

                                                                    <div class="input-group input-group-sm mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">R</span>
                                                                        </div>
                                                                        <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->realizations->apr->value }}" style="width: 150px;" readonly>
                                                                    </div>
                                                                @endif
                                                            </td>

                                                            <td class="text-center small">
                                                                @if (!is_null($indicator->realizations->may->value))
                                                                    @if (!is_null($indicator->targets->may->value))
                                                                        <div class="input-group input-group-sm mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">T</span>
                                                                            </div>
                                                                            <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->targets->may->value }}" style="width: 150px;" readonly>
                                                                        </div>
                                                                    @endif

                                                                    <div class="input-group input-group-sm mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">R</span>
                                                                        </div>
                                                                        <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->realizations->may->value }}" style="width: 150px;" readonly>
                                                                    </div>
                                                                @endif
                                                            </td>

                                                            <td class="text-center small">
                                                                @if (!is_null($indicator->realizations->jun->value))
                                                                    @if (!is_null($indicator->targets->jun->value))
                                                                        <div class="input-group input-group-sm mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">T</span>
                                                                            </div>
                                                                            <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->targets->jun->value }}" style="width: 150px;" readonly>
                                                                        </div>
                                                                    @endif

                                                                    <div class="input-group input-group-sm mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">R</span>
                                                                        </div>
                                                                        <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->realizations->jun->value }}" style="width: 150px;" readonly>
                                                                    </div>
                                                                @endif
                                                            </td>

                                                            <td class="text-center small">
                                                                @if (!is_null($indicator->realizations->jul->value))
                                                                    @if (!is_null($indicator->targets->jul->value))
                                                                        <div class="input-group input-group-sm mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">T</span>
                                                                            </div>
                                                                            <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->targets->jul->value }}" style="width: 150px;" readonly>
                                                                        </div>
                                                                    @endif

                                                                    <div class="input-group input-group-sm mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">R</span>
                                                                        </div>
                                                                        <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->realizations->jul->value }}" style="width: 150px;" readonly>
                                                                    </div>
                                                                @endif
                                                            </td>

                                                            <td class="text-center small">
                                                                @if (!is_null($indicator->realizations->aug->value))
                                                                    @if (!is_null($indicator->targets->aug->value))
                                                                        <div class="input-group input-group-sm mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">T</span>
                                                                            </div>
                                                                            <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->targets->aug->value }}" style="width: 150px;" readonly>
                                                                        </div>
                                                                    @endif

                                                                    <div class="input-group input-group-sm mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">R</span>
                                                                        </div>
                                                                        <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->realizations->aug->value }}" style="width: 150px;" readonly>
                                                                    </div>
                                                                @endif
                                                            </td>

                                                            <td class="text-center small">
                                                                @if (!is_null($indicator->realizations->sep->value))
                                                                    @if (!is_null($indicator->targets->sep->value))
                                                                        <div class="input-group input-group-sm mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">T</span>
                                                                            </div>
                                                                            <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->targets->sep->value }}" style="width: 150px;" readonly>
                                                                        </div>
                                                                    @endif

                                                                    <div class="input-group input-group-sm mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">R</span>
                                                                        </div>
                                                                        <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->realizations->sep->value }}" style="width: 150px;" readonly>
                                                                    </div>
                                                                @endif
                                                            </td>

                                                            <td class="text-center small">
                                                                @if (!is_null($indicator->realizations->oct->value))
                                                                    @if (!is_null($indicator->targets->oct->value))
                                                                        <div class="input-group input-group-sm mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">T</span>
                                                                            </div>
                                                                            <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->targets->oct->value }}" style="width: 150px;" readonly>
                                                                        </div>
                                                                    @endif

                                                                    <div class="input-group input-group-sm mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">R</span>
                                                                        </div>
                                                                        <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->realizations->oct->value }}" style="width: 150px;" readonly>
                                                                    </div>
                                                                @endif
                                                            </td>

                                                            <td class="text-center small">
                                                                @if (!is_null($indicator->realizations->nov->value))
                                                                    @if (!is_null($indicator->targets->nov->value))
                                                                        <div class="input-group input-group-sm mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">T</span>
                                                                            </div>
                                                                            <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->targets->nov->value }}" style="width: 150px;" readonly>
                                                                        </div>
                                                                    @endif

                                                                    <div class="input-group input-group-sm mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">R</span>
                                                                        </div>
                                                                        <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->realizations->nov->value }}" style="width: 150px;" readonly>
                                                                    </div>
                                                                @endif
                                                            </td>

                                                            <td class="text-center small">
                                                                @if (!is_null($indicator->realizations->dec->value))
                                                                    @if (!is_null($indicator->targets->dec->value))
                                                                        <div class="input-group input-group-sm mb-3">
                                                                            <div class="input-group-prepend">
                                                                                <span class="input-group-text">T</span>
                                                                            </div>
                                                                            <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->targets->dec->value }}" style="width: 150px;" readonly>
                                                                        </div>
                                                                    @endif

                                                                    <div class="input-group input-group-sm mb-3">
                                                                        <div class="input-group-prepend">
                                                                            <span class="input-group-text">R</span>
                                                                        </div>
                                                                        <input type="number" step="any" min="0" class="form-control" value="{{ $indicator->realizations->dec->value }}" style="width: 150px;" readonly>
                                                                    </div>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
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
