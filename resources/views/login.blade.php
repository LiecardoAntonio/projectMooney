<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  

  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  <link rel="stylesheet" href="styles/general.css">
  <link rel="stylesheet" href="styles/login.css">

</head>
<body>
  <div class="form-container">
    <form  method="post" action="{{route('customer.login')}}">
      @csrf
      <div class="app-info">
        <img class="app-logo" src="assets\app-logo.png" alt="logo.png">
          <h1>Mooney</h1>
      </div>
      <h2>Log In</h2>

      {{-- Display success message if it exists --}}
      @if(session('success'))
        <div class="custom-alert-success">
          <strong>{{ session('success') }}</strong> 
        </div>
      @endif
  
      {{-- email field --}}
      <label for="email">Email</label>
      <input type="email" id="email" name="email" value="{{old('email')}}">
  
      {{-- password field --}}
      <label for="password">Password</label>
      <input type="password" id="password" name="password">

      {{-- validation error --}}
      @error('error')
      <div class="custom-alert-danger">
        {{$message}}
      </div>     
      @enderror

      <button type="submit" class="btn-primary">Log In</button>
  
    </form>
    <div class="exception">Don't have an account yet?</div>
    <a class="signup-button" href="{{ route('registerForm') }}"><button>Sign Up</button></a>

  </div>
  
</body>
</html>