
@extends('auth.layout.app')
@section('authtitle','User Login')

@section("user")

<div class="limiter">
  <div class="container-login100" style="background-image: url('Login/images/bg-01.jpg');">
    <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
      <form method="post" action="{{route('login')}}" class="login100-form validate-form flex-sb flex-w">
        @csrf
        <span class="login100-form-title p-b-53">
          Sign In With
        </span>

        <a href="#" class="btn-face m-b-20">
          <i class="fa fa-facebook-official"></i>
          Facebook
        </a>

        <a href="#" class="btn-google m-b-20">
          <img src="{{asset('Login/images/icons/icon-google.png')}}" alt="GOOGLE">
          Google
        </a>
        
        <div class="p-t-31 p-b-9">
          <span class="txt1">
            Email
          </span>
        </div>
        <div class="wrap-input100 validate-input" data-validate = "Email is required">
          <input class="input100" type="email" name="email" >
          <span class="focus-input100"></span>
        </div>
        
        <div class="p-t-13 p-b-9">
          <span class="txt1">
            Password
          </span>

          <a href="#" class="txt2 bo1 m-l-5">
            Forgot?
          </a>
        </div>
        <div class="wrap-input100 validate-input" data-validate = "Password is required">
          <input class="input100" type="password" name="password" >
          <span class="focus-input100"></span>
        </div>

        <div class="container-login100-form-btn m-t-17">
          <button type="submit" class="login100-form-btn">
            Sign In
          </button>
        </div>

        <div class="w-full text-center p-t-55">
          <span class="txt2">
            Not a member?
          </span>

          <a href="{{route('register')}}" class="txt2 bo1">
            Sign up now
          </a>
        </div>
      </form>
    </div>
  </div>
</div>


<div id="dropDownSelect1"></div>

@if(session()->has('msg'))
@push('js')
  <script>
     Swal.fire({
        position: 'center',
        icon: '{{session('cls')}}',
        toast: 'true',
        title: '{{session('msg')}}',
        showConfirmButton: false,
        timer: 3000
      })
  </script>
@endpush
@endif

@endsection


