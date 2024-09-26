@extends('layout')

<link rel="stylesheet" href="styles\wallets.css">

@section('content')

  {{-- top section --}}
  <section class="top-section">
    <h4>{{explode(' ', $customer->username)[0];}}'s Wallet</h4>

    <a href="{{ route('walletForm') }}"><button>Add Wallet</button></a>

  </section>

  {{-- Display success message if it exists --}}
  @if(session('success'))
    <div class="custom-alert-success">
      {{ session('success') }}
    </div>
  @endif 
  
  <div class="card-container">
    @forelse ($wallet_names as $wallet_name)
      <div class="card">
        <div class="card-top">
          <img src="/assets/wallet-logo1.png" alt="wallet-logo">
        </div>
        <div class="card-bottom">
          <p class="wallet-name">{{$wallet_name->name}}</p>
          <a class="detail-button" href="{{ route('walletDetails',    ['customer_id' => $customer->id, 'wallet_id' => $wallet_name->id]) }}">
            <button>details</button>
          </a>
        </div>
      </div>
    
    @empty
        <div class="no-wallet">
            <h1>Looks like you don't have any wallet yet<h1>
              <a href="{{ route('walletForm') }}"><button class="create-wallet">Create Wallet</button></a>
        </div>
    @endforelse

    
  </div>

  
  
@endsection