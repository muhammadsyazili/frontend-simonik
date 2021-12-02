@extends('../layouts/app-v1')

@section('title', 'Reset Password')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="200px" height="223px" version="1.1" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 1000 1023" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g id="Layer_x0020_1">
        <metadata id="CorelCorpID_0Corel-Layer"/>
        <g id="_1831148959872">
          <g>
          <path fill="#78D4F0" d="M758 217l-435 -143c-65,-8 -93,19 -80,78l99 459 0 -1c16,58 52,76 106,38l345 -313c47,-42 48,-84 -15,-111l-20 -7z"/>
          <path fill="#4BA6C1" d="M784 274l-394 -231c-63,-22 -95,-2 -95,59l0 469 0 0c3,60 35,85 95,59l404 -233c55,-31 64,-72 8,-112l-18 -11z"/>
          <path fill="white" d="M611 315l-141 -82c-22,-8 -33,-1 -33,21l0 166 0 0c1,21 12,30 33,21l144 -83c19,-10 23,-25 3,-39l-6 -4z"/>
          </g>
          <g>
          <rect fill="#4BA6C1" x="152" y="707" width="775" height="190" rx="44" ry="51"/>
          <g>
            <polygon fill="white" points="184,762 211,762 211,768 228,768 254,768 271,768 298,768 298,795 298,858 271,858 271,795 254,795 254,858 228,858 228,795 211,795 211,858 184,858 "/>
            <polygon fill="white" points="308,768 334,768 334,831 351,831 351,768 378,768 378,831 378,858 351,858 334,858 308,858 308,831 "/>
            <polygon fill="white" points="388,768 415,768 458,768 458,795 415,795 415,800 432,800 458,800 458,826 458,831 458,858 432,858 388,858 388,831 432,831 432,826 415,826 388,826 388,800 388,795 "/>
            <rect fill="white" x="548" y="768" width="26.7255" height="89.8947"/>
            <polygon fill="white" points="468,858 468,831 468,768 495,768 495,831 539,831 539,858 495,858 "/>
            <path fill="white" d="M825 795l0 -27 44 0 27 0 0 27 0 36 0 27 -27 0 -17 0 0 27 -27 0 0 -27 0 -27 0 -36zm44 0l-17 0 0 36 17 0 0 -36z"/>
            <polygon fill="white" points="584,761 610,761 610,767 627,767 654,767 671,767 698,767 698,794 698,857 671,857 671,794 654,794 654,857 627,857 627,794 610,794 610,857 584,857 "/>
            <polygon fill="white" points="745,768 772,768 772,831 789,831 789,761 816,761 816,831 816,858 789,858 772,858 745,858 745,831 "/>
            <path fill="white" d="M788 755l30 0c4,-1 5,-3 3,-7l-16 -26 0 0c-2,-3 -5,-4 -7,0l-15 27c-2,3 -1,6 3,6l2 0z"/>
          </g>
          </g>
        </g>
        </g>
    </svg>
  </div>

  <h3 class="login-box-msg font-weight-bold">{{__('Reset Password')}}</h3>

  <hr class="bg-white">

  <p class="login-box-msg">{{__('You are only one step a way from your new password, recover your password now.')}}</p>

  @if (session('status'))
  <div class="alert alert-success" role="alert">
      {{ session('status') }}
  </div>
  @endif

  <form action="{{ route('password.update') }}" method="post">
    @csrf
    @method('POST')

    <input type="hidden" name="token" value="{{ $request->route('token') }}">

    <div class="input-group mb-3">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-envelope"></span>
        </div>
      </div>
      <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" name="email">
    </div>

    @error('email')
        <div class="alert alert-danger mt-2">
            {{ $message }}
        </div>    
    @enderror

    <div class="input-group mb-3">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-lock"></span>
        </div>
      </div>
      <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" name="password" required autocomplete="new-password">
    </div>

    @error('password')
    <div class="alert alert-danger mt-2">
        <strong>{{ $message }}</strong>
    </div>
    @enderror

    <div class="input-group mb-3">
      <div class="input-group-append">
        <div class="input-group-text">
          <span class="fas fa-lock"></span>
        </div>
      </div>
      <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" required autocomplete="new-password">
    </div>
    <div class="row">
      <div class="col-12">
        <button type="submit" class="btn btn-primary btn-block font-weight-bold">{{__('Change password')}}</button>
      </div>
      <!-- /.col -->
    </div>
  </form>

  <p class="mb-0">
    <a href="{{ route('login') }}" class="font-weight-bold">{{__('Sign in')}}</a>
  </p>

  <div class="lockscreen-footer text-center text-white">
      Copyright &copy; {{ now()->year }}
      <b><a href="{{ env('APP_URL') }}">Muslim Up</a></b>
      <br/>
      All rights reserved
  </div>
</div>
@endsection