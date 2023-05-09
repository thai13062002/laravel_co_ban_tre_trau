<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Đổi mật khẩu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
</head>
<body>
    <h2>Weekly Coding Challenge #1: Sign in/up Form</h2>

<div class="container" id="container">
  <div class="form-container sign-in-container">
    <form method="POST" action="{{route('user.activeChangePass')}}">
        @csrf
      <h1>Đổi mật khẩu</h1>
      <div class="social-container">
        <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
        <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
      </div>
      @error('current_password')
      <span class="text-danger" >
          <strong>{{ $message }}</strong>
      </span>
  @enderror
      <span>or use your account</span>
      <input name="password_old" type="text" placeholder="password old" />

      @if ($errors->has('password_old'))
      <span class="text-danger">{{$errors->first('password_old')}}</span>

@endif
      <input name="password" type="password" placeholder="password new" />
      @if ($errors->has('password'))
            <span class="text-danger">{{$errors->first('password')}}</span>

      @endif
      <input name="password_comfirm" type="password" placeholder="Password reapear" />
      @if ($errors->has('password_comfirm'))
      <span class="text-danger">{{$errors->first('password_comfirm')}}</span>

    @endif
      <button type="submit">Đổi</button>
    </form>
  </div>
  <div class="overlay-container">
    <div class="overlay">
      <div class="overlay-panel overlay-left">
        <h1>Welcome Back!</h1>
        <p>To keep connected with us please login with your personal info</p>
        <button class="ghost" id="signIn">Sign In</button>
      </div>
      <div class="overlay-panel overlay-right">
        <h1>Hello, Friend!</h1>
        <p>Enter your personal details and start journey with us</p>
        <button class="ghost" id="signUp">Sign Up</button>
      </div>
    </div>
  </div>
</div >

<footer>
  <p>
    Created with <i class="fa fa-heart"></i> by
    <a target="_blank" href="https://florin-pop.com">Florin Pop</a>
    - Read how I created this and how you can join the challenge
    <a target="_blank" href="https://www.florin-pop.com/blog/2019/03/double-slider-sign-in-up-form/">here</a>.
  </p>
</footer>

</body>
</html>
