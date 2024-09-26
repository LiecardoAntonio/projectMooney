<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Project Software Engineering</title>

  {{-- bootstrap CDN --}}
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  <link rel="stylesheet" href="styles\general.css">

  {{-- icon from fontawesome.com --}}
  <script src="https://kit.fontawesome.com/93528995fc.js" crossorigin="anonymous"></script>

</head>

<body>
  
  {{-- navbar --}}
  <nav class="navbar">
    <div class="app-info">
      <img class="app-logo" src="assets\app-logo.png" alt="logo.png">
      <h1>Mooney</h1>
    </div>

    <div class="navbar-menu">
      <ul>
        {{-- <li class="dashboard">
          <img class="app-logo" src="assets\dashboard-logo.png" alt="dashboard.png">
          <a href="{{route('showDashboard')}}">Dashboard</a>
        </li> --}}
  
        <li class="wallet">
          <img class="app-logo" src="assets\wallet-logo.png" alt="dashboard.png">
          <a href="{{ route('customer.wallet', ['id' => Auth::id()]) }}">Wallet</a>
        </li>
      </ul>
  
      <ul >
        <li>
          <img class="app-logo" src="assets\support-logo.png" alt="dashboard.png">
          <a href="#">Support</a>
        </li>
        <li>
          <form action="{{ route('customer.logout') }}" method="POST" style="display: inline; width: 100%;">
            @csrf
            <button type="submit" style="background: none; border: none; padding: 0; color: inherit; cursor: pointer; width: 100%; display: flex; align-items: center;">
              <img class="app-logo" src="assets/logout-logo.png" alt="logout.png">
              Log out
            </button>
          </form>
        </li>
      </ul>
    </div>

    
  </nav>

  {{-- content --}}
  <section class="content">
    {{-- template header --}}
    <header>
      <h2>Your Wallet</h2>
      <div class="profile">
        <img class="profile-picture" src="assets\dummy-pp.png" alt="pp">
        
        <p class="username">{{Auth::user()->username}}</p>
      </div>
    </header>

    {{-- wallet info --}}
    <section class="wallet-info">
      @yield('content')
    </section>

  </section>

</body>
</html>