
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
    
    <form action="{{route('customer.store')}}" method="post">
      @csrf
        <div class="app-info">
          <img class="app-logo" src="assets\app-logo.png" alt="logo.png">
            <h1>Mooney</h1>
        </div>
        <h2>Sign up a new account!</h2>
    
        {{-- username field --}}
        <label for="username">Username</label>
        <input type="text" id="username" name="username" value="{{old('name')}}">
        {{-- validation error --}}
        @error('username')
        <div class="alert alert-danger">
          <strong>{{$message}}</strong>
        </div>     
        @enderror
    
        {{-- email field --}}
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="{{old('email')}}">
        {{-- validation error --}}
        @error('email')
        <div class="alert alert-danger">
          <strong>{{$message}}</strong> 
        </div>     
        @enderror
    
        {{-- password field --}}
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
        {{-- validation error --}}
        @error('password')
        <div class="alert alert-danger">
          <strong>{{$message}}</strong> 
        </div>     
        @enderror
    
        <button type="submit" class="btn-primary">Submit</button>
    
      </form>
    
      <div class="exception">Already have an account?</div>
      <a class="signup-button" href="{{ route('loginForm') }}"><button>Log in</button></a>

  </div>

  
</body>
</html>