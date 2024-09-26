@extends('layout')

<link rel="stylesheet" href="/styles/walletDetails.css">

@section('content')
  
  <div class="details-top">
    <div class="top-left">
      <h3 class="wallet-name">{{$wallet->name}}</h3>
      <div class="member">
        <li class="member-list">
          @foreach ($memberDetails as $member)
            <ul class="member-card">
              <img class="member-picture" src="assets\dummy-pp.png" alt="pp">
              <div class="member-details">
                <p>{{$member->username}}</p>
                <div>{{$member->email}}</div>
              </div>
            </ul>
          @endforeach
        </li>
      </div>
    </div>

    <div class="top-right">
      <h3 class="balance">RP {{$balance}}</h3>
    </div>
  </div>

  <div class="details-header">
    <div class="header-pie">Income/Outcome Chart</div>
    <div class="header-bar">Category Chart</div>
    <div class="header-table">Transaction Details</div>
  </div>

  <section class="transaction-details">
    <section class="chart-left">
      <div class="pie-chart">
        <canvas id="transactions-pie" width="100" height="200"></canvas>
      </div>
    </section>

    <section class="chart-mid">
      <div class="chart">
        <canvas id="income-transactions-bar" width="300" height="400"></canvas>
      </div>
    
      <div class="chart">
        <canvas id="outcome-transactions-bar" width="300" height="400"></canvas>
      </div>
    </section>
    
    <section class="details-right">
      <table class="transaction-table" border="1">
        <thead>
          <td>Username</td>
          <td>Transaction Type</td>
          <td>Transaction Categories</td>
          <td>Amount</td>
          <td>Time</td>
        </thead>
        @foreach ($transactions as $transaction)
            <tr>
              <td>{{ $transaction->customer->username }}</td>
              <td>{{ $transaction->transactionType->name }}</td>
              <td>{{ $transaction->transactionCategory->name }}</td>
              <td>{{$transaction->amount}}</td>
              <td>{{$transaction->updated_at}}</td>
            </tr>
          @endforeach
      </table>

      <form class="transaction-form" action="{{route('transaction.store')}}" method="post">
        @csrf
        <label class="form-title">Input a new transaction</label>
        <div class="amount">
          <label for="amount">Transaction amount</label>
          <input type="number" name="amount" id="" placeholder="Please input amount">
        </div>

        {{-- validation amount error --}}
        @error('amount')
        <div class="alert alert-danger">
          <strong>{{$message}}</strong> 
        </div>     
        @enderror

        <label for="transactionType">Transaction Type</label>

        <div class="type-radio">
          <div class="radio-1">
            <input type="radio" name="transactionType" id="income" value="1">
            <label for="income">Income</label>
          </div>
          <div class="radio-2">
            <input type="radio" name="transactionType" id="outcome" value="2">
            <label for="outcome">Outcome</label>
          </div>
        </div>

        {{-- validation transactionType error --}}
        @error('transactionType')
        <div class="alert alert-danger">
          <strong>{{$message}}</strong> 
        </div>     
        @enderror

        <div class="category">
          <label for="transactionCategory">Transaction Category</label>
          <select name="transactionCategory" id="">
            @foreach ($all_categories as $category)
              <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
        </div>

        {{-- validation transactionCategory error --}}
        @error('transactionCategory')
        <div class="alert alert-danger">
          <strong>{{$message}}</strong> 
        </div>     
        @enderror

        <input type="submit" value="input">
      </form>

      {{-- Display success message if it exists --}}
      @if(session('success'))
        <div class="custom-alert-success">
          {{ session('success') }} 
        </div>
      @endif 

      @if ($transactions->isEmpty())
        <div class="custom-alert-danger">
          This wallet doesn't have any recorded transaction yet!
        </div>
      @endif
    </section>

    

  </section>


  {{-- CDN for chart.js --}}
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    // ini untuk passing variabel ke script dibawah
    const incomeTransactions = @json($incomeTransactions);
    const outcomeTransactions = @json($outcomeTransactions);
    const incomeCategories  = @json($income_categories);
    const outcomeCategories  = @json($outcome_categories);
  </script>

  {{-- pie chart js --}}
  <script src="/scripts/transactions-pie.js">
  </script>

  {{-- bar chart js --}}
  <script src="/scripts/income-transactions-bar.js"></script>

  {{-- bar chart js --}}
  <script src="/scripts/outcome-transactions-bar.js"></script>

@endsection