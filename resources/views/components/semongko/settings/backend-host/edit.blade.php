@extends('layouts/before-login')

@section('title', 'Host')

{{-- ========================================================== --}}

@push('style')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}"> {{-- required --}}
    <!-- Theme Style -->
    <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}"> {{-- required --}}
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> {{-- required --}}
@endpush

{{-- ========================================================== --}}

@push('script')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Popper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> {{-- required --}}
    <!-- AdminLTE App -->
    <script src="{{ asset('template/dist/js/adminlte.min.js') }}"></script> {{-- required --}}
    <!-- AdminLTE For Demo Purposes -->
    <script src="{{ asset('template/dist/js/demo.js') }}"></script> {{-- required --}}
@endpush

{{-- ========================================================== --}}

@section('content')
    <div class="container-fluid mt-2">
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
                <form action="{{ route('semongko.host.update') }}" method="post">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="form-group">
                                    <label class="small">Host <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control form-control-sm" name="host" value="{{ $host }}" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer clearfix">
                        <button type="submit" class="btn btn-sm btn-info float-right">Save</button>
                    </div>
                </form>
            </div>
        @endif
    </div>
@endsection
