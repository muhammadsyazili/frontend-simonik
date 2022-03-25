@extends('layouts/before-login')

@section('title', 'Welcome')

@push('style')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template/plugins/fontawesome-free/css/all.min.css') }}"> {{-- required --}}
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> {{-- required --}}
    <!-- Theme Style -->
    <link rel="stylesheet" href="{{ asset('template/dist/css/adminlte.min.css') }}"> {{-- required --}}
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet"> {{-- required --}}

    <link href="https://unpkg.com/intro.js/minified/introjs.min.css" rel="stylesheet">

    <style>
        .introjs-tooltip {
            color: #000000;
        }
    </style>

    <!-- Custom Bootstrap -->
    <style>
        .login-box,
        .register-box {
            width: 50vw !important;
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
            color: #ffffff !important;
            background-repeat: no-repeat !important;
            background-position: center !important;
            background-size: cover !important;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' version='1.1' xmlns:xlink='http://www.w3.org/1999/xlink' xmlns:svgjs='http://svgjs.com/svgjs' width='1440' height='560' preserveAspectRatio='none' viewBox='0 0 1440 560'%3e%3cg mask='url(%26quot%3b%23SvgjsMask1138%26quot%3b)' fill='none'%3e%3crect width='1440' height='560' x='0' y='0' fill='%230e2a47'%3e%3c/rect%3e%3cpath d='M1374.8182567559304 661.4409779065415L1453.3798268815526 530.6925686452272 1322.6314176202382 452.1309985196051 1244.0698474946162 582.8794077809195z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M934.4512916068126 321.8816379401076L862.2644895457714 389.1969198820617 999.3308134892231 463.8194820026464z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M438.88544005857284 460.0383138094142L288.2001814823287 470.5752535485345 298.737121221449 621.2605121247786 449.4223797976931 610.7235723856584z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M89.06744240727258 539.9768609581446L153.84907151254077 472.89352024290196 86.76573079729813 408.1118911376338 21.984101692029952 475.1952318528764z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M850.0034095659664 197.5665106521741L744.3863204198994 95.57327323601918 748.0101721498115 303.1835997982411z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M184.6 275.33 a132.73 132.73 0 1 0 265.46 0 a132.73 132.73 0 1 0 -265.46 0z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M525.4318405287888 222.01693709847356L401.81233024632576 179.45132616687587 359.24671931472807 303.0708364493389 482.86622959719114 345.6364473809366z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M1021.8364710537625 199.0850522053059L1092.2452023898177 260.29042858220447 1148.8489012871378 124.07464338967233z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M658.0456392911732-3.913775668647151L670.0753212483417 133.58611828737233 807.5752152043611 121.55643633020391 795.5455332471927-15.943457625815592z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M1286.1380878402058 19.96910337089388L1254.2847903639565 183.84011282422892 1418.1557998172916 215.69341030047818 1450.009097293541 51.82240084714313z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M930.3130614551949 80.42124873023403L978.4892609323159 183.7354419127688 1081.8034541148506 135.55924243564783 1033.6272546377297 32.24504925311304z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M-106.98 419.92 a180.78 180.78 0 1 0 361.56 0 a180.78 180.78 0 1 0 -361.56 0z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M993.7317628424735 592.6140403970359L1066.2539337400456 480.939690332091 954.5795836751007 408.4175194345189 882.0574127775286 520.0918694994638z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M1187.9161541892993 273.1227693371701L1271.8613330786775 327.63740592025556 1311.6606985086166 174.46231929464568z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M438.66 158.74 a115.46 115.46 0 1 0 230.92 0 a115.46 115.46 0 1 0 -230.92 0z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M176.33384872292797 321.0647714100061L319.88264625092546 263.06729252159414 261.8851673625135 119.51849499359662 118.33636983451602 177.51597388200858z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M1170.6673767451232 244.52771647821774L1174.366170338619 350.44730666279014 1280.2857605231914 346.7485130692943 1276.5869669296956 240.82892288472192z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float2'%3e%3c/path%3e%3cpath d='M1080.9347644499032 409.6937798650966L1083.0494612226125 530.8446768342935 1202.0856614191002 407.57908309238735z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float3'%3e%3c/path%3e%3cpath d='M1125.7092519155563 329.2096135246319L1157.4697919100074 426.95850459735067 1255.2186829827262 395.19796460289945 1223.458142988275 297.4490735301806z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float1'%3e%3c/path%3e%3cpath d='M1108.5971888074737 275.6585627335174L1059.4824483550333 403.606836001444 1187.43072162296 452.7215764538844 1236.5454620754003 324.77330318595773z' fill='rgba(28%2c 83%2c 142%2c 0.4)' class='triangle-float3'%3e%3c/path%3e%3c/g%3e%3cdefs%3e%3cmask id='SvgjsMask1138'%3e%3crect width='1440' height='560' fill='white'%3e%3c/rect%3e%3c/mask%3e%3cstyle%3e %40keyframes float1 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(-10px%2c 0)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float1 %7b animation: float1 5s infinite%3b %7d %40keyframes float2 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(-5px%2c -5px)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float2 %7b animation: float2 4s infinite%3b %7d %40keyframes float3 %7b 0%25%7btransform: translate(0%2c 0)%7d 50%25%7btransform: translate(0%2c -10px)%7d 100%25%7btransform: translate(0%2c 0)%7d %7d .triangle-float3 %7b animation: float3 6s infinite%3b %7d %3c/style%3e%3c/defs%3e%3c/svg%3e") !important;
        }

    </style>
    <!-- End : Custom Bootstrap -->

    <!-- Running Text Animation -->
    <style>
        @media (max-width:576px) {
            .ml11 {
                font-weight: 700;
                font-size: 0.75em;
            }
        }

        @media (min-width:576px) {
            .ml11 {
                font-weight: 700;
                font-size: 1.5em;
            }
        }


        .ml11 .text-wrapper {
            position: relative;
            display: inline-block;
            padding-top: 0.1em;
            padding-right: 0.05em;
            padding-bottom: 0.15em;
        }

        .ml11 .line {
            opacity: 0;
            position: absolute;
            left: 0;
            height: 100%;
            width: 3px;
            background-color: #fff;
            transform-origin: 0 50%;
        }

        .ml11 .line1 {
            top: 0;
            left: 0;
        }

        .ml11 .letter {
            display: inline-block;
            line-height: 1em;
        }

    </style>
    <!-- End : Running Text Animation -->
@endpush

@push('script')
    <!-- jQuery -->
    {{-- <script src="{{ asset('template/plugins/jquery/jquery.min.js') }}"></script> --}} {{-- required --}}
    <!-- Bootstrap 4 -->
    <script src="{{ asset('template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script> {{-- required --}}
    <!-- AdminLTE App -->
    <script src="{{ asset('template/dist/js/adminlte.min.js') }}"></script> {{-- required --}}
    <!-- Running Text Animation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script> {{-- required --}}
    <script>
        let textWrapper = document.querySelector('.ml11 .letters');
        textWrapper.innerHTML = textWrapper.textContent.replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>");

        anime.timeline({
                loop: true
            })
            .add({
                targets: '.ml11 .line',
                scaleY: [0, 1],
                opacity: [0.5, 1],
                easing: "easeOutExpo",
                duration: 700
            })
            .add({
                targets: '.ml11 .line',
                translateX: [0, document.querySelector('.ml11 .letters').getBoundingClientRect().width + 10],
                easing: "easeOutExpo",
                duration: 700,
                delay: 100
            }).add({
                targets: '.ml11 .letter',
                opacity: [0, 1],
                easing: "easeOutExpo",
                duration: 600,
                offset: '-=775',
                delay: (el, i) => 34 * (i + 1)
            }).add({
                targets: '.ml11',
                opacity: 0,
                duration: 1000,
                easing: "easeOutExpo",
                delay: 1000
            });
    </script>
    <!-- End : Running Text Animation -->
    <script src="https://unpkg.com/intro.js/minified/intro.min.js"></script>
    <script>
        introJs().start();
    </script>
@endpush

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <img src="{{ asset('icon-brand.svg') }}" alt="icon-brand" width="30%">
        </div>

        {{-- <h1 class="login-box-msg text-center ml11">
            <span class="text-wrapper">
                <span class="line line1"></span>
                <span class="letters">SISTEM INFORMASI MONITORING KINERJA DAN RESIKO</span>
            </span>
        </h1> --}}

        <div class="text-center font-weight-bold">

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

            <form action="{{ route('login') }}" method="post">
                @method('post')
                @csrf

                <div class="form-group row" data-intro="Isi Username">
                    <label for="username"
                        class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 col-form-label text-left">Username</label>
                    <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
                        <input type="text" class="form-control form-control-sm" name="username" id="username">
                    </div>
                </div>

                <div class="form-group row" data-intro="Isi Password">
                    <label for="password"
                        class="col-12 col-sm-12 col-md-2 col-lg-2 col-xl-2 col-form-label text-left">Password</label>
                    <div class="col-12 col-sm-12 col-md-10 col-lg-10 col-xl-10">
                        <input type="password" class="form-control form-control-sm" name="password" id="password">
                    </div>
                </div>

                {{-- <div class="form-group text-left row">
                    <div class="offset-sm-2 col-sm-10">
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="app" value="simonik" checked>SIMONIK
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="app" value="fdx">4DX
                            </label>
                        </div>
                    </div>
                </div> --}}

                <div class="form-group text-left row">
                    <div class="offset-sm-2 col-sm-10">
                        <input type="hidden" name="app" value="simonik">
                        <button type="submit" class="btn btn-info btn-sm">Sign In</button>
                    </div>
                </div>
            </form>
        </div>

        <div class="lockscreen-footer text-center">
            <i class="far fa-copyright"></i> PT. PLN(Persero) UIW S2JB - RENUS
            <br />
            {{ now()->year }}
        </div>
    </div>
@endsection
