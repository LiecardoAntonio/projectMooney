@extends('layout')

<link rel="stylesheet" href="styles/walletForm.css">

@section('content')

  <div class="form-container">

    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif

    <h2 style="margin-bottom: 5vh">Create a new wallet</h2>
    <form class="wallet-form" action="{{route('wallet.store')}}" method="post">
      @csrf
      <div class="input">
        <label for="wallet_name">Wallet name: </label>
        <input type="text" name="wallet_name" id="wallet_name">
      </div>
      @error('wallet_name')
        <div class="alert alert-danger">
          <strong>{{$message}}</strong>
        </div>     
      @enderror
      <div></div>
      
      <div>Add a friend to this wallet</div>
      
      <select name="customer_ids[]" multiple multiselect-search="true" multiselect-select-all="true">
        @forelse ($customers as $customer)
            @if ($customer->id !== $current_customer->id)
                <option value="{{$customer->id}}">{{$customer->email}}</option>
            @endif
        @empty
        @endforelse
    </select>
    
      
      {{-- <div class="search-box">
        <input id="input-box" type="text" placeholder="search email">
        <button class="search-button"><i class="fa-solid fa-magnifying-glass"></i></button> {{-- icon from fontawesome}}
      </div> --}}

      {{-- <div class="result-box" style="background-color: #1B4242">
      </div> --}}

      <button type="submit">Create</button>
    </form>
  </div>

  <script src="scripts/multiSelect.js"></script>


  {{-- <script>
     const customers = @json($customers);
     
  </script>

  <script src="scripts/walletForm.js">
    
  </script> --}}
@endsection